<?php 
session_start();

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'phpproject');

define('SITE_URL', 'http://localhost:3000/');

include_once('DatabaseConnection.php');
$db = new DatabaseConnection;
function base_url($slug){
    echo SITE_URL.$slug;
}
function redirect($message,$page){
    $redirectTo= SITE_URL.$page;
    $_SESSION['message'] = "$message";
    header("Location: $redirectTo");
    exit(0);
}
function validateInput($dbcon,$input){
    return mysqli_real_escape_string($dbcon,$input);
}
?>