<?php
include "dbconnect.php";



if(isset($_POST['start'])){

//$id = $_POST['id'];
//$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

$sqlUpdate = "UPDATE events_table SET start='" . $start . "',end='" . $end . "' ";

$conn->query($sqlUpdate);
}


$conn->close();

?>