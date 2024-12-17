<?php
//include('config/app.php');
include_once 'config/DatabaseConnection.php';

class usersController
{
    private $conn;

    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->conn; // Corrected the assignment here
    }



    public function add_demande($type_projet,$montant_demande,$adress_projet,$genre,$besoin,$documents,$date_creation,$user_id){
      
        $etat='encours';
        $adddemande_query = "INSERT INTO demandes (type_projet,montant_demande,etat,adress_projet,genre,besoin,documents,date_creation,user_id) VALUES ('$type_projet','$montant_demande','$etat','$adress_projet', '$genre', '$besoin','$documents', '$date_creation','$user_id')";
        $result = $this->conn->query($adddemande_query);
        return $result;
    }

    
    public function getdemandes()
    {
        $query = "SELECT * FROM demandes";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function getYourDemandes($id)
    {
        
        $query = "SELECT * FROM demandes where user_id = '$id'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


    public function editDemande($id)
    {
        $demande_id=validateInput($this->conn,$id);
        $userquery = "SELECT * FROM demandes wHERE demande_id='$demande_id' LIMIT 1 ";
        $result = $this->conn->query($userquery);
        if ($result->num_rows == 1) {
            $data= $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }
    public function acceptDemande($id)
    {
        $demande_id=validateInput($this->conn,$id);
        $userquery = "UPDATE demandes SET etat='accepter' where demande_id='$demande_id' LIMIT 1  ";
        $result = $this->conn->query($userquery);
        if ($result->num_rows == 1) {
            $data= $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }

    public function refuserDemande($id)
    {
        $demande_id=validateInput($this->conn,$id);
        $userquery = "UPDATE demandes SET etat='refuser' where demande_id='$demande_id' LIMIT 1  ";
        $result = $this->conn->query($userquery);
        if ($result->num_rows == 1) {
            $data= $result->fetch_assoc();
            return $data;
        } else {
            return false;
        }
    }
}

?>
