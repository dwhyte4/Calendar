<?php
 include "dbconnect.php";

 if(isset($_POST['title'])){
$title = $_POST['title'];

echo $sqlDelete = "DELETE from events_table WHERE title='$title'";


mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);
 }

?>


/*
<?php

  if(isset($_POST['submitted'])){ // checks if it actually submits  and if it does does the following below
      include"dbconnect.php";
      $title = $_POST['title'];
      $start = $_POST['start'];

      $sqlDelete = "DELETE from events_table WHERE title='$title' AND start='$start'";

      if(!mysqli_query($conn,$sqlDelete)){ //nested if statement if there is issue adding to the database

        die("Error deleting the data");

      } else{
        //$success = "Entry has been successfully entered"; //PHP variable will be echoed in the html form
        echo "Entry has been successfully deleted";
      }

  }
  

?>
*/