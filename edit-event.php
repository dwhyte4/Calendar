<?php

  if(isset($_POST['submitted'])){ // checks if it actually submits  and if it does does the following below
      include"dbconnect.php";
      $title = $_POST['title'];
      $start = $_POST['start'].' '.$_POST['starttime'].':00';
      $titlenew = $_POST['titlenew'];
      $startnew = $_POST['startnew'].' '.$_POST['starttimenew'].':00';
      $endnew = $_POST['endnew'].' '.$_POST['endtimenew'].':00';
      
      $sqlUpdate = "UPDATE events_table SET title='$titlenew', start='$startnew', end='$endnew' WHERE title='$title' AND start='$start'";

      if(!mysqli_query($conn,$sqlUpdate)){ //nested if statement if there is issue adding to the database

        die("Error editing the data");

      } else{
        //$success = "Entry has been successfully entered"; //PHP variable will be echoed in the html form
        echo "Entry has been edited";
      }

  }
  

?>