<?php 
session_start();
if(isset($_POST["logout"])){
    session_destroy();
    setcookie("id","", time() -3600);
    setcookie("qrty","", time() -3600);
    header("Location:login.php");
    exit;
}

?>