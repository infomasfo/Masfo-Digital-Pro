<?php
session_start();
header("Content-Type: application/json");
require_once './connection.php';

class Registration {

    private $conn;
    
    // Constructor to initialize database connection
    public function __construct($conn){
        $this->conn = $conn;
    }

    // Method to validate and store registration data
    public function RegisterUsers($fullname, $email, $password, $confirmPassword){

        // validate input data
        $validationResult = $this->validateData($fullname, $email, $password, $confirmPassword);
        
        if($validationResult === true){

            // hashed password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
           

            $insertSql = $this->conn->prepare("INSERT INTO students (fullname, email, password) VALUES (?, ?, ?)");
            $insertSql->bind_param("sss", $fullname, $email, $hashedPassword);
            
            if($insertSql->execute()) {    
                $insertSql->close();
                
                echo json_encode(["success" => true, "message" => "Registration was successful"]);
            } else {
                echo json_encode(["success" => false, "message" => "Registration failed. Please try again later."]);
            }      
        } 
        
    }

    
    // Method to validate input data
    private function validateData($fullname, $email, $password, $confirmPassword) {
        // Validate Full Name: Only letters and white space
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fullname)){
            echo json_encode(["success" => false, "message" => "Only letters and white space allowed for Full Name"]);
            return;
        }
          
        
        // Check if email already exists
        $sql = $this->conn->prepare("SELECT * FROM students WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $res = $sql->get_result();

        if($res->num_rows > 0){
            echo json_encode(["success" => false, "message" => "This email already exists"]);
            return;
        } 

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo json_encode(["success" => false, "message" => "Invalid email format"]);
            return ;
        } 
        
       
        // Validate Password: Combination of lowercase, uppercase, digit, and special character, minimum length 8
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=!*_]).{8,}$/';
        if (!preg_match($pattern, $password)){
            echo json_encode(["success" => false, "message" => "Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character."]);
            return;
        }

        if ($password !== $confirmPassword){
            echo json_encode(["success" => false, "message" => "Password and Confirm Password must be the same!"]);
            return;
        }
        
        return true;
    }


}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sanitize and retrieve form data
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $fullname = stripslashes($_POST['fullname']);
    $email = stripslashes($_POST['email']);
    $password = stripslashes($_POST['password']);

    $fullname = $conn->escape_string($_POST['fullname']);
    $email = $conn->escape_string($_POST['email']);
    $password = $conn->escape_string($_POST['password']);

    // Instantiate Registration class and submit data
    $registration = new Registration($conn);
    $registration->RegisterUsers($fullname, $email, $password, $confirmPassword);
    exit;
}
?>
