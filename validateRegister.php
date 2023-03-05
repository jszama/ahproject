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
  if (isset($_POST['Type'])){
    $_type = $_POST['Type'];
  }
  if (isset($_POST['Email'])){
    $_email = $_POST['Email'];
  }
  if (isset($_POST['Number'])){
    $_number = $_POST['Number'];
  }
  if (isset($_POST['Organisation'])){
    $_organisation = $_POST['Organisation'];
  }

  $query = "SELECT username FROM Account WHERE username='$_username';";
  $result = $conn->query($query);

  if(empty(trim($_username)) or (5 >= strlen($_username) and strlen($_username) <= 20) or  $result->num_rows != 0){
    $error = "Invalid username";
  } elseif (empty(trim($_password)) or (6 < strlen($_password) and strlen($_password) > 20)){
    $error = "Invalid password";
  } elseif (empty($_type)) {
    $error = "Empty type.";
  } elseif (($_type == "Job-seeker") and (str_contains($_email, '@') == False or str_contains($_email, '.') == False or empty($_email))){
    $error = "Invalid Email.";
  } elseif (($_type == "Job-seeker") and (strlen($_number) != 11 or is_numeric($_number) == False or empty($_number))) {
    $error = "Invalid number.";
  } elseif (($_type == "Employer") and (empty(trim($_organisation)))){
    $error = "Empty organisation.";
  } else {
    $query1 = "INSERT INTO Account (username, password, type, email, number) VALUES ('$_username', '$_password', '$_type', '$_email', '$_number');";
    $query2 = "INSERT INTO Account (username, password, type, organisation) VALUES ('$_username', '$_password', '$_type', '$_organisation');";
    if ($_type == "Job-seeker"){
      mysqli_query($conn, $query1);
      $success = "Account successfully created.";
      header('Location:loginPage.php');
    } elseif ($_type == "Employer") {
      mysqli_query($conn, $query2);
      $success = "Account successfully created.";
      header('Location:loginPage.php');
    }
  }
}

$conn->close();
?>