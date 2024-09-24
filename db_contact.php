<?php
// include "include/header.php";
session_start();
// Database connection parameters
$servername = "localhost"; // Your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "keyline_ecosymbiont"; // Your database name

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
    $message = $_POST['message'];
    $subject_string = json_encode($subject); // Or use json_encode($subject)

    // Verify the reCAPTCHA response
    $recaptchaResponse = $_POST['recaptcha_response'];
    $secretKey = '6LclkEwqAAAAABtaRIg1Rxp8LK4dFcFyN2Si0Ygj'; // Your secret key

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
        // Handle the form submission (e.g., save to database, send email, etc.)
        // Prepare the SQL query
        $sql = "INSERT INTO enquiries (name, email, country, subject, message) VALUES ('$full_name', '$email', '$country', '$subject_string', '$message')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully!";
            // Initialize PHPMailer for admin notification
            $adminMail = new PHPMailer(true);
            try {
                // Server settings
                $adminMail->SMTPDebug = 3;
                $adminMail->isSMTP();
                $adminMail->Host = 'ecosymbiont.keylines.net.in';
                $adminMail->SMTPAuth = true;
                $adminMail->Username = 'no-reply@ecosymbiont.keylines.net.in';
                $adminMail->Password = 'MpuxHY6Km9&Y';
                $adminMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $adminMail->Port = 465;
        
                // Recipients
                $adminMail->setFrom('no-reply@ecosymbiont.keylines.net.in', 'Ecosymbiont');                
                $adminMail->addAddress('deblina@keylines.net', 'Ecosymbiont');
                $adminMail->addReplyTo('no-reply@ecosymbiont.keylines.net.in', 'Ecosymbiont');
        
                // Content
                $adminMail->isHTML(true);
                $adminMail->Subject = 'New Lead From Ecosymbiont Website - ' . htmlspecialchars($first_name);
        
                $adminMail->Body = "
                <table width='100%' border='0' cellspacing='0' cellpadding='0' style='padding: 10px; background: #fff; width: 500px;'>
                    <tr><td style='padding: 8px 15px'>Dear Administrator,</td></tr>
                    <tr><td style='padding: 8px 15px'>A new lead has contacted you through the Ecosymbiont Website. Please find the details below.</td></tr>
                    <tr><td style='padding: 8px 15px'><strong>Name: </strong>" . htmlspecialchars($first_name) . "</td></tr>
                    <tr><td style='padding: 8px 15px'><strong>Email: </strong>" . htmlspecialchars($email) . "</td></tr>    
                    <tr><td style='padding: 8px 15px'><strong>Country: </strong>" . htmlspecialchars($country) . "</td></tr>                                         
                    <tr><td style='padding: 8px 15px'><strong>Message: </strong>" . htmlspecialchars($message) . "</td></tr>
                    <tr><td style='padding: 8px 15px'><strong>Subject: </strong>" . htmlspecialchars($subject_string) . "</td></tr>
                    <tr><td style='padding: 8px 15px'>Thank You,</td></tr>
                    <tr><td style='padding: 8px 15px'>Auto-generated from the Ecosymbiont Website.</td></tr>
                </table>";
        
                $adminMail->send();
                $adminSent = true;
            } catch (Exception $e) {
                $adminSent = false;
            }

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
