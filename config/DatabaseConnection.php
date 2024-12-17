<?php

class DatabaseConnection 
{
public $conn; 
    public function __construct()
    {
        $this->conn = new mysqli(HOST, USER, PASSWORD, DATABASE);

        if ($this->conn->connect_error) {
            die('<h1>Database connection failed: ' . $this->conn->connect_error . '</h1>');
        }


        return $this->conn;
    }


}

?>


<?php include 'includes/footer.php'; ?>


</html>

