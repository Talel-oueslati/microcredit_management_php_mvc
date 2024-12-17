<?php
class loginController
{
    private $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;

    }
    public function userLogin($email,$password){
        $checkLogin= "SELECT * FROM users WHERE email='$email' AND password='$password' ";
        $result = $this->conn->query($checkLogin);
    
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $this->userAuthentication($data);
            return true;
        }else {
            return false;
        }
    
    }
    
    private function userAuthentication($data){
        $_SESSION['authenticated'] = true;
       //  $_SESSION['auth_role'] = $data['role_as'];
        $_SESSION['auth_user'] = [
            'user_id'=> $data['user_id'],
            'user_fullname'=> $data['fullname'],
            'user_email'=> $data['email'],
            'user_phone'=> $data['phone'],
            'user_role'=> $data['role'],

        ];
    }
    public function isLoggedIn(){
        if (isset($_SESSION['authenticated']) === TRUE) {
            redirect('you are already logged In','index.php');
        }else {
            return false;
        }
    }


    public function logout(){
        if (isset($_SESSION['authenticated']) === TRUE) {
            unset($_SESSION['authenticated']);
            unset($_SESSION['auth_user']);
            return true;
        } else {
        return false;
    }

}
}


?>