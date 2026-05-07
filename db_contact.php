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
use PhpParser\Node\Expr\Print_;

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
        $generalSetting = "SELECT * FROM general_settings WHERE id = 1";
        $generalSettingResult = mysqli_query($conn, $generalSetting);
        
        $generalSettingRow = mysqli_fetch_assoc($generalSettingResult);
        // Print_r($generalSettingRow); die;
        

        // Execute the query
        if (mysqli_query($conn, $sql)) {        

            $mail = new PHPMailer(true);
             try {
                // 🔹 SMTP CONFIG
                $mail->isSMTP();
                $mail->Host       = $generalSettingRow['smtp_host'];
                $mail->Port       = $generalSettingRow['smtp_port']; // change if needed
                $mail->SMTPAuth   = true;
                $mail->Username   = $generalSettingRow['smtp_username']; // your email
                $mail->Password   = $generalSettingRow['smtp_password']; // Gmail App Password
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                // 🔹 EMAIL SETTINGS
                $mail->setFrom('no-reply@ecosymbiont.org', 'Ecosymbiont Website');
                $mail->addAddress('Greetings@sramani.org');
                $mail->addBCC('deblina@keylines.net');

                // 🔹 CONTENT
                $mail->isHTML(true);
                $mail->Subject = 'New Enquiry From Ecosymbiont Website - ' . htmlspecialchars($full_name);

                $mail->Body = "
                <table width='500' style='background:#fff;padding:10px'>
                    <tr><td>Dear Administrator,</td></tr>
                    <tr><td>A new enquiry has been submitted.</td></tr>
                    <tr><td><strong>Name:</strong> " . htmlspecialchars($full_name) . "</td></tr>
                    <tr><td><strong>Email:</strong> " . htmlspecialchars($email) . "</td></tr>
                    <tr><td><strong>Country:</strong> " . htmlspecialchars($country) . "</td></tr>
                    <tr><td><strong>Subject:</strong> " . htmlspecialchars($subject_string) . "</td></tr>
                    <tr><td><strong>Message:</strong> " . htmlspecialchars($comment) . "</td></tr>
                </table>";

                // 🔹 SEND
                $mail->send();

                $_SESSION['mail_succ'] = 'Your enquiry has been sent successfully.';
                header("Location: contact.php");
                exit();

            } catch (Exception $e) {
                $_SESSION['mail_fail'] = 'Mailer Error: ' . $mail->ErrorInfo;
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
