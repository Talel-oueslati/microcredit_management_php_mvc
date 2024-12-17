<?php
//include('config/app.php');


class editController 
{
    private $conn;

    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn; // Corrected the assignment here
    }

    public function editprofile($inputdata,$id){
        $id = validateInput($this->conn, $id);
        $fullname = $inputdata['fullname'];
        $email = $inputdata['email'];
        $phone = $inputdata['phone'];
        $edit_query = "UPDATE users SET fullname='$fullname', email='$email', phone='$phone' WHERE user_id='$id'";
        $result = $this->conn->query($edit_query);
        if ($result) {
            return true;
        }else {
            return false;
        }
    }

}
?>
