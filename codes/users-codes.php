<?php
//include 'config/app.php';

include_once('controllers/editController.php');
include_once('controllers/adminController.php');
include_once('controllers/usersController.php');
if (isset($_POST['delete-btn'])) {
    $id = validateInput($db->conn, $_POST['delete-btn']);
    $admin = new adminController();
    $result = $admin->delete($id);
    if ($result) {
        redirect("User Deleted succesfully", "user-list.php");
    } else {
        redirect("something went wrong ", "user-list.php");
    }
}

if (isset($_POST['edit_btn'])) {
    $id = validateInput($db->conn, $_POST['user_id']);
    $inputdata = [

        'fullname' => validateInput($db->conn, $_POST['fullname']),
        'email' => validateInput($db->conn, $_POST['email']),
        'phone' => validateInput($db->conn, $_POST['phone']),
        'user_id' => validateInput($db->conn, $_POST['user_id']),

    ];

    $edit = new editController;

    $editprofile_query = $edit->editprofile($inputdata, $id);
    if ($editprofile_query) {
        redirect("edited succesfully", "user-list.php");
    } else {
        redirect("something went wrong ", "my-profile.php");
    }
}

if (isset($_POST['add_demande'])) {
    $type_projet = validateInput($db->conn, $_POST['type_projet']);
    $montant_demande = validateInput($db->conn, $_POST['montant_demande']);
    $adress_projet = validateInput($db->conn, $_POST['adress_projet']);
    $genre = validateInput($db->conn, $_POST['genre']);
    $besoin = validateInput($db->conn, $_POST['besoin']);
    $date_creation = validateInput($db->conn, $_POST['date_creation']);
    $user_id = $_SESSION['auth_user']['user_id'];
    $userController = new usersController;
    $pname = rand(1000, 10000) . "-" . $_FILES["file"]["name"];

    $tname = $_FILES["file"]["tmp_name"];

    $uploads_dir = '/assets';
    move_uploaded_file($tname, $uploads_dir . '/' . $pname);
    $demande_query = $userController->add_demande($type_projet, $montant_demande, $adress_projet, $genre, $besoin, $pname, $date_creation, $user_id);
    if ($demande_query) {
        redirect("demande added  succesfully", "demandes-list.php");
    } else {
        redirect("something went wrong ", "add-demandes.php");
    }
}


if (isset($_POST['acceptBtn'])) {
    $id = validateInput($db->conn, $_GET['demande_id']);


    $acc = new usersController;

    $editprofile_query = $acc->acceptDemande($id);
    if ($editprofile_query) {
        redirect("edited succesfully", "demandes-list.php");
    } else {
        redirect("Demande accepter", "demandes-list.php");
    }
}

if (isset($_POST['refuseBtn'])) {
    $id = validateInput($db->conn, $_GET['demande_id']);


    $acc = new usersController;

    $editprofile_query = $acc->refuserDemande($id);
    if ($editprofile_query) {
        redirect("edited succesfully", "demandes-list.php");
    } else {
        redirect("Demande refused", "demandes-list.php");
    }
}
