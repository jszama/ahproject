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

if(isset($_POST['login'])){
  $_username = $_POST['Username'];
  $_password = $_POST['Password'];

  if(empty(trim($_username)) or empty(trim($_password))){
      $error = "Field(s) are empty.";
  } else {
      // Check login detiails
      $sql = "SELECT * FROM Account WHERE username='$_username' AND password='$_password';";
      $result = $conn->query($sql);

      if ($result->num_rows == 1) {
          $success = 'Correct login! Redirecting';
          header('Location:main.php');
          $_sessionUsername = $_username;
      } else {
          $error = 'Incorrect login details.';
    }
    }
  }

$conn->close();
?>