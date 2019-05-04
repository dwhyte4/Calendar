<?php

  if(isset($_POST['submitted'])){ // checks if it actually submits  and if it does does the following below
      include"dbconnect.php";
      $title = $_POST['title'];
      $start = $_POST['start'].' '.$_POST['starttime'].':00';
      $end = $_POST['end'].' '.$_POST['endtime'].':00';

      $sql = "INSERT INTO events_table (title, start, end)
      VALUES('$title', '$start', '$end')";

      if(!mysqli_query($conn,$sql)){ //nested if statement if there is issue adding to the database

        die("Error adding to the database");

      } else{
        //$success = "Entry has been successfully entered"; //PHP variable will be echoed in the html form
        echo "Entry has been successfully entered";
          
      }

  }
  

?>