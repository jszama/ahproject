<?php require("validateLogin.php")?>
<?php require("colourscheme.php")?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JakubJobs</title>
  <link rel="stylesheet" type="text/css" href="style.php">
  <script type="text/javascript">
    function openCreate() {
      document.getElementById("createForm").style.display = "block";
      document.getElementById("createButton").style.display = "none";
    }

    function closeCreate() {  
      document.getElementById("createForm").style.display = "none";
      document.getElementById("createButton").style.display = "block";
    }

    function openContact() {
      document.getElementById("contactInfo").style.display = "block";
      document.getElementById("contactButton").style.display = "none";
    }

    function closeContact() {  
      document.getElementById("contactInfo").style.display = "none";
      document.getElementById("contactButton").style.display = "block";
    }

    function allowSearch() {
      var checkbox1 = document.getElementById("checkbox1").checked;
      var checkbox2 = document.getElementById("checkbox2").checked;
      var checkbox3 = document.getElementById("checkbox3").checked;

      if (checkbox1 == true || checkbox2 == true || checkbox3 == true) {
        document.getElementById("searchButton").disabled = false;
      } else {
        document.getElementById("searchButton").disabled = true;
      }
	  }
  </script>

  <?php
	if (!isset($_SESSION['Username'])){
		header("Location: loginPage.php");
	}
  
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
		  $_type = $row['Type'];
    }

	if (isset($_POST['Logout'])){
		session_destroy();
		header("Location: loginPage.php");
	}
	
    if(isset($_POST['create'])){
      $_title = $_POST['Title'];
      if (isset($_POST['quality'])){
        $_qualities = $_POST['quality'];
      }
      if(empty(trim($_title)) or (strlen($_title) > 30)){
        echo '<script>alert("Incorrect Title")</script>';
      } elseif (!isset($_qualities)) {
        echo '<script>alert("Select a quality")</script>';
      } else {
        echo '<script>alert("Successfully created post")</script>';
        $query2 = "INSERT INTO `post` (`Username`, `Title`, `Qualities`, `Email`, `Number`) VALUES ('$_sessionUsername', '$_title', '$_qualities', '$_email', '$_number');";
        mysqli_query($conn, $query2);
        $result = $conn->query($query);
      }
    }  
  ?>

  <?php
    if($_type == "Employer"){
      ?>
      <style>
        .createButton{
          display:none;
        }
        .contact{
          display:block;
        }
        .info {
          display:block;
        }
        .emailForm{
          display:block;
        }
      </style> <?php
    } else { ?>
      <style>
        .createButton{
          display:block;
        }
        .contact{
          display:none;
        }
        .info {
          display:none;
        }
        .emailForm{
          display:none;
        }
      </style> <?php
    } ?>

<style>
    :root {
      --bgColor: <?= $currentScheme['bgColor']?>;
      --navColor: <?= $currentScheme['navColor']?>;
      --mainColor: <?= $currentScheme['mainColor']?>;
      --secondaryColor: <?= $currentScheme['secondaryColor']?>;
      --searchColor: <?= $currentScheme['searchColor']?>;
      --displayColor: <?= $currentScheme['displayColor']?>;
    }
</style>


</head>
<body>
<div class="header">
  <div class="title">JakubJobs</div>
  <div class="sessionInfo">
    <div class="colourscheme">
      <form action="" method="POST">
        <label for="colorScheme">Color scheme:</label>
        <select id="colorScheme" name="color">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
        </select>
        <input type="submit" name="changeScheme" value="Apply"/>
      </form>
    </div>
    <div class="session">
      Hey <?php echo $_SESSION['Username'];?>
    </div>
    <div class="logout">
		<form method="POST" class="logout">
			<input type="submit" name="Logout" value="Logout"/>
		</form>
	</div>
  </div>
</div>
<div class="navbar">
  <div class="navList">
    <select onchange="window.location.href= (this.options[this.selectedIndex].value)">  
      <option value="">Navigate</option>   
      <option value="main.php">Home</option> 
      <option value="account.php">Account</option> 
    </select> 
  </div>
  <ul>
    <li><a href="main.php">Home</a></li>
    <li style="float:right;"><a href="account.php">Account</a></li>
  </ul>
</div>
<div class="main">
  <div class="predisplay">
    <div class="searchbar">
        <form method="POST">
          <input type="submit" name="search" id="searchButton" value="Search" disabled>
          <input type="checkbox" id="checkbox1" name="quality[]" value="'Good Communication'" onclick="allowSearch()">
          <label>Good Communication</label>
          <input type="checkbox" id="checkbox2" name="quality[]" value="'Good Leadership'" onclick="allowSearch()">
          <label>Good Leadership</label>
          <input type="checkbox" id="checkbox3" name="quality[]" value="'Good Problem-solving'" onclick="allowSearch()">
          <label>Good Problem-solving</label>
        </form>
        <button class="createButton" onclick="openCreate()">Create</button>
    </div>
    <div>
		<div class="createPopup" id="createForm" style="display: none;">
			<form method="POST">
			  <label><b>Title</b></label>
			  <input type="text" placeholder="Enter Title" name="Title">

			  <label><b>Quality</b></label>
			  <input type="radio" name="quality" value="Good Communication"/>
			  <label>Good Communication</label>
			  <input type="radio" name="quality" value="Good Leadership"/>
			  <label>Good Leadership</label>
			  <input type="radio" name="quality" value="Good Problem-solving"/>
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
            $_quality = current($_qualities);
            $query2 = "SELECT * FROM post WHERE Qualities LIKE $_quality";
          } else {
            $query2 = "SELECT * FROM post WHERE (Qualities LIKE " . implode(' OR Qualities LIKE ', $_qualities) . ");";
          }
          $result = $conn->query($query2);
        }

        while ($row = mysqli_fetch_assoc($result)){
          echo "<div class='post'>
                  <h3 class='postHeader'>Post Details</h3>
                  <div class='postTitle'>"
                    . $row['Title'] .          
                  "</div> 

                  <div class='postQuality'>"
                  . $row['Qualities'] .
                  "</div>


                  <div class='info'>
                    <h3>User details</h3>
                      <p>Email:"
                      . $row['Email'] .           
                    "</p><p> Number:"
                      . $row['Number'] .   
                  "</p></div>
                </div>";
        }
      ?>
    </div>
    </div>
  </div>
  <div class="emailForm">
    <form action="https://formsubmit.co/jakubjobsemails@gmail.com" method="POST">
      <h3>Email form</h3>
      <label>From:</label>
      <input type="email" name="email" required><br>
      <label>Text:</label>
      <input type="text" name="name" required><br>
      <label>To:</label>
      <input type="email" name="_cc"><br>
      
      <input type="hidden" name="_captcha" value="false">
      
      <button type="submit">Send</button>
    </form>
  </div>
</div>
</body>
</html>