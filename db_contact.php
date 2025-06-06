<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
// Database connection parameters
$servername = "localhost"; // Your database server
$username = "zazqwcsfww"; // Your database username
$password = "SwZJaV446J"; // Your database password
$dbname = "zazqwcsfww"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Include PHPMailer library files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //   print_r($_POST); die;
    $full_name = $_POST['full_name'] ;
    $email = $_POST['email'];
    $country = $_POST['country'];
    $subject = $_POST['subject'];
    $comment = $_POST['message'];
    $subject_string = implode(", ", $subject);; // Or use json_encode($subject)

    // Verify the reCAPTCHA response
    $recaptchaResponse = $_POST['recaptcha_response'];
    // Get the host (domain name)
    $host = $_SERVER['HTTP_HOST']; // e.g., localhost or example.com
    if($host == 'ecosymbiont.keylines.in'){
         // Your Google reCAPTCHA secret key [dev]
    $secretKey = '6Ldum88qAAAAANVww5Xe6aHFL-g_UHLsHl7HGKs5';
    } elseif($host == 'ecosymbiont-uat.keylines.in'){ 
        // Your Google reCAPTCHA secret key [uat]
    $secretKey = '6Lco6wQrAAAAAJksrZFpNTfW07l2QLUKMsQ6bREb';
    } else{
        // Your Google reCAPTCHA secret key [live]
    $secretKey = '6LcIw04qAAAAAJCWh02op84FgNvxexQsh9LLCuqW';
    }    

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => $secretKey,
        'response' => $recaptchaResponse
    );
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $result = json_decode($response);
    

    if ($result->success && $result->score >= 0.5) {
        // echo "verified"; die;
        // Handle the form submission (e.g., save to database, send email, etc.)
        // Prepare the SQL query
        $sql = "INSERT INTO enquiries (name, email, country, subject, message) VALUES ('$full_name', '$email', '$country', '$subject_string', '$comment')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {        
            // Initialize PHPMailer for admin notification           
            $to = "Ecosymbionts.regenerate@gmail.com";
            // $to = "deblinasonaidas1997@gmail.com";
            $subject = 'New Lead From Ecosymbiont Website - ' . htmlspecialchars($full_name);
            $message = "
                <table width='100%' border='0' cellspacing='0' cellpadding='0' style='padding: 10px; background: #fff; width: 500px;'>
                    <tr><td style='padding: 8px 15px'>Dear Administrator,</td></tr>
                    <tr><td style='padding: 8px 15px'>A new enquiry is submitted through the Ecosymbiont Website. Please take a look at the details below.</td></tr>
                    <tr><td style='padding: 8px 15px'><strong>Name: </strong>" . htmlspecialchars($full_name) . "</td></tr>
                    <tr><td style='padding: 8px 15px'><strong>Email: </strong>" . htmlspecialchars($email) . "</td></tr>    
                    <tr><td style='padding: 8px 15px'><strong>Country: </strong>" . htmlspecialchars($country) . "</td></tr>                                         
                    <tr><td style='padding: 8px 15px'><strong>Message: </strong>" . htmlspecialchars($comment) . "</td></tr>
                    <tr><td style='padding: 8px 15px'><strong>Subject: </strong>" . htmlspecialchars($subject_string) . "</td></tr>
                    <tr><td style='padding: 8px 15px'>Thank You,</td></tr>
                    <tr><td style='padding: 8px 15px'>Auto-generated from the Ecosymbiont Website.</td></tr>
                </table>";
            $txt = $message;

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: no-reply@ecosymbiont.org" . "\r\n" .
            "BCC: deblina@keylines.net";

            mail($to,$subject,$txt,$headers);
            $adminSent = true;            
            // Send the email 

            if ($adminSent) {                    
                $_SESSION['mail_succ'] = 'Your enquiry has been sent successfully.';
                header("Location: contact.php");
                exit();
                // $_SESSION['download_flag'] = "true";                                                    
            } else {
                $_SESSION['mail_fail'] = 'admin mail sent failed';
                header("Location: contact.php");
                exit();
            }        
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }            
    } else {
        $_SESSION['mail_fail'] = 'reCAPTCHA verification failed. Please try again.';
        header("Location: contact.php");
        exit();
    }
}
?>
