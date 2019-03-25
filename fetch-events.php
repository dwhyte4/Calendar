<?php
   
    require "dbconnect.php";
  //echo "Connected successfully";
  $sql = "SELECT * FROM events_table ";
  $result = mysqli_query($conn,$sql); 
  $myArray = array();
  
  if ($result->num_rows > 0) {
  // output data of each row
      while($row = $result->fetch_assoc()) {
          $myArray[] = $row;
      }
  } 
  else 
  {
      echo "0 results";
  }
