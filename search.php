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

if(isset($_POST['title'])){
  $_title = $_POST['Title'];
  $_qualities = $_POST[''];

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