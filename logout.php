<?php
session_start();
if(session_destroy()){
    //Redirect to homepage
    header("location: login.php");
}
?>