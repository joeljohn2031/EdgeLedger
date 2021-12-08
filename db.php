<?php
// connect to the database
$con = mysqli_connect('localhost', 'root', '', 'project2021');
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>