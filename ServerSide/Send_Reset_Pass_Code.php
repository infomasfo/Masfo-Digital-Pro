<?php
session_start();
require_once './connection.php';
header("Content-Type: application/json");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

class SendPassOTP {

    private $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function Send($email) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return ["success" => false, "message" => "Invalid email format"];

        $sql = $this->conn->prepare("SELECT * FROM students WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();

        $res = $sql->get_result();

        if($res->num_rows > 0) {
            $this->SendPassOTPToMail($email);
        } else {
            echo json_encode(["status" => false, "message" => "This email is not registered"]);
        }
    }

    protected function generatePassOTP() {
        $randomNumber = '';
        for ($i = 0; $i < 6; $i++) {
            $randomNumber .= rand(0, 9); // Concatenate single digits into a string
        }
        return $randomNumber; // Return a single string representing the OTP
    }
    

    protected function SendPassOTPToMail($userMail) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'mabdulmalik436@gmail.com'; 
            $mail->Password = 'coyb crdt vutw dbrx'; 
            $mail->Port = 465; // Port for implicit TLS
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

            $generatePassOTP = $this->generatePassOTP();
    
            $mail->setFrom('mabdulmalik436@gmail.com', 'Lambda');
            $mail->addAddress($userMail);
    
            $verificationLink = 'https://www.masfodigitalpro.com.ng/resetPass.php?PassOTP=' . $generatePassOTP;
            $mail->isHTML(true);
            $mail->Subject = 'Pass OTP';
            $mail->Body = 'Please verify your email address by clicking <a href="' . $verificationLink . '">this link</a>.';
    
            $mail->send();
            $message = "OTP Code sent to your email successfully, check!";
            echo json_encode(["status" => true, "message" => $message]);

            $sql = $this->conn->prepare("UPDATE students SET passOTP = ? WHERE email = ?");
            $sql->bind_param("ss", $generatePassOTP, $userMail);
            $sql->execute();
        } catch (Exception $e) {
            error_log('Mailer Error: ' . $mail->ErrorInfo,  3, './debug.txt');
        }
    }

}

$email = $conn->escape_string($_POST['email']);
$email = htmlspecialchars($_POST['email']);
$email = trim($_POST['email']);
$email = stripslashes($_POST['email']);

$send = new SendPassOTP($conn);
$send->Send($email);