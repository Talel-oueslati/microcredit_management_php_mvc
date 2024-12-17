<?php
//include 'config/app.php';
include_once('controllers/RegisterController.php');
include_once('controllers/loginController.php');

$auth = new loginController;

if (isset($_POST['logout_btn'])) {
    $checkLoggedOut = $auth->logout();
    if($checkLoggedOut){
    redirect("logged succefully","login.php");
    }
}

if (isset($_POST['login_btn'])) {
    $email = validateInput($db->conn,$_POST['email']);
    $password = validateInput($db->conn,$_POST['password']);

    $role="user";
    $checkLogin = $auth->userLogin($email,$password);
    if ($checkLogin && $role == 'user') {
        redirect("logged successfully","index.php");
    }elseif ($checkLogin && $role =='admin') {
        redirect("logged successfully","index.php");
    }
    
    else {
        redirect("invalid email or password","login.php");
    }


}



if (isset($_POST['register_btn'])) {
    $fullname = validateInput($db->conn, $_POST['fullname']);
    $email = validateInput($db->conn, $_POST['email']);
    $phone = validateInput($db->conn, $_POST['phone']);
    $password = validateInput($db->conn, $_POST['password']);


    $register = new RegisterController;

    $resultUser = $register->isUserExist($email);
    if ($resultUser) {
        redirect("alreadyexist", "register.php");
    } else {
        $register_query = $register->registration($fullname,$email,$phone,$password);
        if ($register_query) {
            redirect("registered succesfully", "login.php");
        } else {
            redirect("something went wrong ", "register.php");
        }
    }

}
    
if (isset($_POST['add_user'])) {
    $fullname = validateInput($db->conn, $_POST['fullname']);
    $email = validateInput($db->conn, $_POST['email']);
    $phone = validateInput($db->conn, $_POST['phone']);
    $password = validateInput($db->conn, $_POST['password']);


    $register = new RegisterController;

    $resultUser = $register->isUserExist($email);
    if ($resultUser) {
        redirect("alreadyexist", "add-user.php");
    } else {
        $register_query = $register->registration($fullname,$email,$phone,$password);
        if ($register_query) {
            redirect("user added  succesfully", "user-list.php");
        } else {
            redirect("something went wrong ", "register.php");
        }
    }
}
    
   





