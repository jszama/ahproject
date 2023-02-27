<?php require("search.php")?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JakubJobs</title>
  <link href="style.css" rel="stylesheet" type="text/css"/>
  <?php
    // Create connection
    $DBservername = "localhost";
    $DBdatabase = "account";
    $DBusername = "root";
    $DBpassword = "";

    $conn = new mysqli($DBservername, $DBusername, $DBpassword, $DBdatabase);
    $query = "SELECT * FROM Post";
    $result = $conn->query($query);


    if(isset($_POST['create'])){
      if (isset($_POST['quality'])){
        $_userQualities = $_POST['quality'];
      }
      $_userQualitie = implode(", ", $_userQualities);
      $_sessionUsername = $_SESSION['Username'];
      $_title = $_POST['Title'];
      $query2 = "INSERT INTO `post` (`Username`, `Title`, `Qualities`, `Email`, `Number`) VALUES ('$_sessionUsername', '$_title', '$_userQualitie', '$_email', '$_number');";
      mysqli_query($conn, $query2);
      $result = $conn->query($query);
    }
  ?>
  <script>
    function openCreate() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeCreate() {  
        document.getElementById("myForm").style.display = "none";
    }
  </script>
</head>
<body>
<div>
<?php echo $_SESSION['Username']; ?>
<div class="header">
  <h1>JakubJobs</h1>
</div>
<div>
    <ul>
        <li>Home</li>
        <li>Account</li>
    </ul>
</div>
</div>
<div>
    <div>
        <form method="POST">
          <input type="checkbox" name="quality[]" value="Good Communication"/>
          <label>Good Communication</label>
          <input type="checkbox" name="quality[]" value="Good Leadership"/>
          <label>Good Leadership</label>
          <input type="checkbox" name="quality[]" value="Good Problem-solving"/>
          <label>Good Problem-solving</label>
          <input type="submit" name="submit" value="Search"/>
        </form>
        <button class="createButton" onclick="openCreate()">Create</button>
    </div>
    <div>
      <div class="createPopup" id="myForm" style="display: none;">
        <form method="POST">
          <label><b>Title</b></label>
          <input type="text" placeholder="Enter Title" name="Title">

          <label><b>Qualities</b></label>
          <input type="checkbox" name="quality[]" value="Good Communication"/>
          <label>Good Communication</label>
          <input type="checkbox" name="quality[]" value="Good Leadership"/>
          <label>Good Leadership</label>
          <input type="checkbox" name="quality[]" value="Good Problem-solving"/>
          <label>Good Problem-solving</label>

          <input type="submit" name="create" value="Create"/>
          <button type="button" class="button cancel" onclick="closeCreate()">Close</button>
        </form>
      </div>
      <div class="display">
          <?php
              if(isset($_POST['submit'])){
                if (isset($_POST['quality'])){
                  $_qualities = $_POST['quality'];
                }
                $query2 = "SELECT * FROM Post WHERE Qualities IN ('" . implode("', '", $_qualities) . "')";
                $result = $conn->query($query);
              }
  
              while ($row = mysqli_fetch_assoc($result)){
                echo $row['Title'];
                echo $row['Qualities'];
              }
          ?>
      </div>
    </div>
</div>
</body>
</html>
