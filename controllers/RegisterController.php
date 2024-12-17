<?php
//include('config/app.php');
include_once 'config/DatabaseConnection.php';

class RegisterController 
{
    private $conn;

    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn; // Corrected the assignment here
    }

    public function registration($fullname,$email,$phone,$password){
        $role='user';
        $register_query = "INSERT INTO users (fullname,email,phone,role,password) VALUES ('$fullname','$email','$phone','$role', '$password')";
        $result = $this->conn->query($register_query);
        return $result;
    }


    
    

    public function isUserExist($email){
        $checkUser= "SELECT email FROM users WHERE email='$email' LIMIT 1 ";        
        $result = $this->conn->query($checkUser);
        if ($result->num_rows > 0) {
            return true;
        }else{
            return false;
        }
    }

}
?>
