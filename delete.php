<?php
include 'connection.php';

$id=$_GET['id'];

$sql="DELETE FROM users WHERE id={$id}";
$result=$conn->query($sql) or die("Query Successfull");

header("Location:index.php");
mysql_close($conn);

$conn->close();

?>