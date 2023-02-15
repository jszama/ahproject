<?php
// Database variables
$DBservername = "localhost";
$DBdatabase = "Account";
$DBusername = "root";
$DBpassword = "";

// User variables
$username = $_POST['Username']
$password = $_POST['Password']
  
// Create connection
$conn = new mysqli($DBservername, $DBusername, $DBpassword, $DBdatabase);

// Check connection 
if ($conn->connect_error) {
	die("connectionFailed: " . $conn->connect_error);
}
echo "Connected succesfully<br/>";

$sql = "SELECT * FROM Account WHERE username = $username AND password = $password;";

$conn->close();
?>