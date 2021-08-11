<?php
$servername = "pamplin-bit2020.mysql.database.azure.com";
$username = "bit4444s21-group08";
$password = "BZUfGTHFg4zvB77j";
$dbname = "bit4444s21-group08";

$conn = new  mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM reservations WHERE id=3";
 if ($conn->query($sql) === TRUE) {
   echo "Record deleted successfully";
 } else {
   echo "Error deleting record: " . $conn->error;
 }

 $conn->close();
 ?>
