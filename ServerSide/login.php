<?php
session_start();
header("Content-Type: application/json");

require_once 'connection.php';

class Login {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function userLogin($email, $password){

        if(empty($email) || empty($password)){
            echo json_encode(["success" => false, 'title' => 'Fields empty', 'message' => "All the Fields Are Required"]);
            return;
        }
        // validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            echo json_encode(["success" => false, "message" => "Invalid email format"]);
            return;
        }
        // validate password strength
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!*_]).{8,}$/';
        if (!preg_match($pattern, $password)) {
            echo json_encode(["success" => false, "message" => "Invalid password"]);
            return;
        }

        $stmt = $this->conn->prepare("SELECT * FROM students WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['fullname'] = $row['fullname'];
            if(password_verify($password, $row['password'])){
                echo json_encode(['status' => true, 'title' => 'Successful', 'message' => "Login was Successful"]);
                return;
            } else {
                echo json_encode(['status' => false, 'title' => 'Wrong Input', 'message' => 'Incorrect passwords or email']);
                return;
            }
        } else {
            echo json_encode(['status' => false, 'title' => 'No User', 'message' => "Incorrect passwords or email"]);
            return;
        }
            $stmt->close();
        } 
    

    
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $email = stripslashes($_POST['email']);
    $password = stripslashes($_POST['password']);

    $email = $conn->escape_string($_POST['email']);
    $password = $conn->escape_string($_POST['password']);

    $login = new Login($conn);
    $login->userLogin($email,$password);
    
    exit;
}
?>
