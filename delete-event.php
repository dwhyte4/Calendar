<?php
 include "dbconnect.php";

 if(isset($_POST['title'])){
$title = $_POST['title'];

echo $sqlDelete = "DELETE from events_table WHERE title='$title'";


mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);
 }

?>