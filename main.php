<?php require("search.php")?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JakubJobs</title>
  <link href="style.css" rel="stylesheet"/>
  <?php
    // Create connection
    $DBservername = "localhost";
    $DBdatabase = "account";
    $DBusername = "root";
    $DBpassword = "";

    $conn = new mysqli($DBservername, $DBusername, $DBpassword, $DBdatabase);
    $query = "SELECT * FROM Post";
    $result = $conn->query($query);

    $_sessionUsername = $_SESSION['Username'];

    $sessionQUERY = "SELECT * FROM ACCOUNT WHERE Username ='$_sessionUsername';";
    $sessionresult = $conn->query($sessionQUERY);

    while ($row = mysqli_fetch_assoc($sessionresult)){
        $_email = $row['Email'];
        $_number = $row['Number'];
    }

    if(isset($_POST['create'])){
      if (isset($_POST['quality'])){
        $_userQuality = $_POST['quality'];
      }
      $_title = $_POST['Title'];
      $query2 = "INSERT INTO `post` (`Username`, `Title`, `Qualities`, `Email`, `Number`) VALUES ('$_sessionUsername', '$_title', '$_userQuality', '$_email', '$_number');";
      mysqli_query($conn, $query2);
      $result = $conn->query($query);
    }
  ?>
  <script>
    function openCreate() {
      document.getElementById("myForm").style.display = "block";
      document.getElementById("createButton").style.display = "none";
    }

    function closeCreate() {  
        document.getElementById("myForm").style.display = "none";
        document.getElementById("createButton").style.display = "block";
    }
  </script>
</head>
<body>
<div class="header">
  <div class="title">JakubJobs</div>
  <div class="info">
    <div class="colourscheme">colour scheme</div>
    <div class="session">Hey <?php echo $_SESSION['Username'];?></div>
    <div class="logout">Logout</div>
  </div>
</div>
<div class="navbar">
    <ul>
        <li><a href="#">Home</a></li>
        <li style="float:right;"><a href="account.php">Account</a></li>
    </ul>
</div>
<div class="main">
    <div class="searchbar">
        <form method="POST">
          <input type="submit" name="search" value="Search"/>
          <input type="checkbox" name="quality[]" value="'Good Communication'"/>
          <label>Good Communication</label>
          <input type="checkbox" name="quality[]" value="'Good Leadership'"/>
          <label>Good Leadership</label>
          <input type="checkbox" name="quality[]" value="'Good Problem-solving'"/>
          <label>Good Problem-solving</label>
        </form>
        <button class="createButton" onclick="openCreate()">Create</button>
    </div>
    <div>
      <div class="createPopup" id="myForm" style="display: none;">
        <form method="POST">
          <label><b>Title</b></label>
          <input type="text" placeholder="Enter Title" name="Title">

          <label><b>Qualities</b></label>
          <input type="checkbox" name="quality" value="Good Communication"/>
          <label>Good Communication</label>
          <input type="checkbox" name="quality" value="Good Leadership"/>
          <label>Good Leadership</label>
          <input type="checkbox" name="quality" value="Good Problem-solving"/>
          <label>Good Problem-solving</label>

          <input type="submit" name="create" value="Create"/>
          <button type="button" class="button cancel" onclick="closeCreate()">Close</button>
        </form>
      </div>
      <div class="display">
          <?php
              if(isset($_POST['search'])){
                  if (isset($_POST['quality'])){
                    $_qualities = $_POST['quality'];
                  }
                  if (count($_qualities) == 1){
                    echo current($_qualities);
                    $_quality = current($_qualities);
                    echo "SELECT * FROM Post WHERE Qualities LIKE '$_quality';";
                    $query2 = "SELECT * FROM post WHERE Qualities LIKE $_quality";
                  } else {
                    echo "SELECT * FROM post WHERE (Qualities LIKE " . implode(' OR Qualities LIKE ', $_qualities) . ");";
                    $query2 = "SELECT * FROM post WHERE (Qualities LIKE " . implode(' OR Qualities LIKE ', $_qualities) . ");";

                  }
                  $result = $conn->query($query2);
              }

              while ($row = mysqli_fetch_assoc($result)){
                echo "<div>
                        <h3>Post Details</h3>
                        <div>"
                          . $row['Title'] .           
                        "</div>
      
                        <div>"
                        . $row['Qualities'] .
                        "</div>
                      </div>";
              }
          ?>
      </div>
    </div>
</div>
</body>
</html>
