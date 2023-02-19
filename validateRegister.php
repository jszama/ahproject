<?php
// Input validation variables
$error = null; 
$success = null;

// Create connection
$DBservername = "localhost";
$DBdatabase = "account";
$DBusername = "root";
$DBpassword = "";


$conn = new mysqli($DBservername, $DBusername, $DBpassword, $DBdatabase);

if(isset($_POST['register'])){
  $_username = $_POST['Username'];
  $_password = $_POST['Password'];
  $_type = $_POST['Type'];
  $_email = $_POST['Email'];
  $_number = $_POST['Number'];
  $_organisation = $_POST['Organisation'];

  $sql1 = "SELECT username FROM Account WHERE username='$_username';";
  $result = $conn->query($sql);

  if(empty(trim($_username)) or (5>= strlen($_username) <= 20) or  $result->num_rows == 0){
    $error = "Invalid username, length(5-20).";
  } elseif (empty(trim($_password)) or (6>= strlen($_password) <= 20)){
    $error = "Invalid password, length (5-20).";
  } elseif (empty($_type)) {
    $error = "Empty type.";
  } elseif (($_type = "Job-seeker") and str_contains($_email, '@') and str_contains($_email, ',')){
    $error = "Invalid email.";
  } elseif (($_type = "Job-seeker") and (strlen($_number) != 11)) {
    $error = "Invalid number.";
  }
  elseif (($_type = "Employer") and (strlen($_number) != 11)) {
    $error = "Invalid number.";
  }

}

$conn->close();
?>