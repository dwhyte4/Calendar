<?php
include "dbconnect.php";

if(isset($_POST['title'])){

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

$sqlUpdate = "UPDATE events_table SET start='" . $start . "',end='" . $end . "' WHERE title= '$title' ";

$conn->query($sqlUpdate);
}

$conn->close();

?>