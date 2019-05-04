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


/*
<?php

  if(isset($_POST['submitted'])){ // checks if it actually submits  and if it does does the following below
      include"dbconnect.php";
      $title = $_POST['title'];
      $start = $_POST['start'];
      $titlenew = $_POST['titlenew'];
      $startnew = $_POST['startnew'];
      $endnew = $_POST['endnew'];
      
      $sqlUpdate = "UPDATE events_table SET title='$titlenew', start='$startnew', end='$endnew' WHERE title='$title' AND start='$start'";

      if(!mysqli_query($conn,$sqlUpdate)){ //nested if statement if there is issue adding to the database

        die("Error deleting the data");

      } else{
        //$success = "Entry has been successfully entered"; //PHP variable will be echoed in the html form
        echo "Entry has been successfully deleted";
      }

  }
  

?>
*/