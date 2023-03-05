<?php require("validateLogin.php")?>
<?php 
$_sessionUsername = $_SESSION['Username'];

$conn = new mysqli($DBservername, $DBusername, $DBpassword, $DBdatabase);

$sessionQUERY = "SELECT * FROM ACCOUNT WHERE Username ='$_sessionUsername';";
$sessionresult = $conn->query($sessionQUERY);

while ($row = mysqli_fetch_assoc($sessionresult)){
    $_type = $row['Type'];
    if ($_type == "Job-Seeker"){
        $_email = $row['Email'];
        $_number = $row['Number'];
    } else {
        $_organisation = $row['Organisation'];
    }
}

if(isset($_POST['Submit']) and $_type == "Job-Seeker"){
    if (isset($_POST['Email'])){
        $_email = $_POST['Email'];
        $_justEmail = true;
    }
    if (isset($_POST['Number'])){
        $_number = $_POST['Number'];
        $_justNumber = true;
    }
    if (str_contains($_email, '@') == False or str_contains($_email, '.') == False){
        $error = "Invalid Email.";
    } elseif (strlen($_number) != 11 or is_numeric($_number) == False) {
        $error = "Invalid number.";
    } else {
        if ($_justEmail & $_justNumber){
            $query1 = "UPDATE ACCOUNT SET Email='$_email', Number='$_number' WHERE Username ='$_sessionUsername';";
            mysqli_query($conn, $query1);
            $success = "Email and Number successfully updated.";
        } elseif ($_justEmail) {
            $query2 = "UPDATE ACCOUNT SET Email='$_email' WHERE Username ='$_sessionUsername';";
            mysqli_query($conn, $query2);
            $success = "Email successfully updated.";
        } else {
            $query3 = "UPDATE ACCOUNT SET Number='$_number' WHERE Username ='$_sessionUsername';";
            mysqli_query($conn, $query3);
            $success = "Number successfully updated.";
        }
    }
} elseif (isset($_POST['Submit']) and $_type == "Employer"){
    if (isset($_POST['Organisation'])){
        $_organisation = $_POST['Organisation'];
    }
    if (empty(trim($_organisation))){
        $error = "Empty organisation.";
    } else {
        $query4 = "UPDATE ACCOUNT SET Organisation='$_organisation' WHERE Username ='$_sessionUsername';";
        mysqli_query($conn, $query4);
        $success = "Organisation successfully updated.";
    }
}
$conn->close();
?>