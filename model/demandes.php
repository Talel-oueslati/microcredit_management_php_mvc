<?php

class Demandes
{
    private $demande_id;
    private $type_projet;
    private $montant_demande;
    private $etat;
    private $adress_projet;
    private $genre;
    private $documents;
    private $besoin;
    private $date_creation;
    private $user_id;

  

    public function getDemandeId()
    {
        return $this->demande_id;
    }

    public function getTypeProjet()
    {
        return $this->type_projet;
    }

    public function getMontantDemande()
    {
        return $this->montant_demande;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function getAdressProjet()
    {
        return $this->adress_projet;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getDocuments()
    {
        return $this->documents;
    }

    public function getBesoin()
    {
        return $this->besoin;
    }

    public function getDateCreation()
    {
        return $this->date_creation;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

 
    public function setDemandeId($demande_id)
    {
        $this->demande_id = $demande_id;
    }

    public function setTypeProjet($type_projet)
    {
        $this->type_projet = $type_projet;
    }

    public function setMontantDemande($montant_demande)
    {
        $this->montant_demande = $montant_demande;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    public function setAdressProjet($adress_projet)
    {
        $this->adress_projet = $adress_projet;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function setDocuments($documents)
    {
        $this->documents = $documents;
    }

    public function setBesoin($besoin)
    {
        $this->besoin = $besoin;
    }

    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
}

?>
