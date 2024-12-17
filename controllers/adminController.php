<?php
include_once 'config/DatabaseConnection.php';

class adminController
{
    private $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn; // Corrected the assignment here
    }
    public function delete($id){
        $user_id=validateInput($this->conn,$id);
        $delete_query="DELETE FROM users WHERE user_id='$user_id'"; 
        $result=$this->conn->query($delete_query);
        if ($result) {
            return true;
        }else {
            return false;

        }
    
    }

    public function getdata()
    {
        $query = "SELECT * FROM users";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    
    public function edit($id)
    {
        $user_id=validateInput($this->conn,$id);
        $userquery = "SELECT * FROM users wHERE user_id='$user_id'";
        $result = $this->conn->query($userquery);
        if ($result->num_rows == 1) {
            $data= $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    
 
}
