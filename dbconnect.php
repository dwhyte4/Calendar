<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendar"; //hey bro,take note of this particular line and make sure it is the same as the database you created 
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>