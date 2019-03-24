<?php
 require_once "db.php";

$id = $_POST['id'];
$sqlDelete = "DELETE from events_table WHERE id=".$id;

mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);

mysqli_close($conn);
?>