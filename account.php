<?php require("update.php");?>
<?php require("colourscheme.php");?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JakubJobs</title>
  <link rel="stylesheet" type="text/css" href="style.php">
  
  <?php 
    if (!isset($_SESSION['Username'])){
		header("Location: loginPage.php");
	}
	
	if (isset($_POST['Logout'])){
		session_destroy();
		header("Location: loginPage.php");
	}
  ?>

<?php
  if($error != null){
    ?><style>
      .errors{
        visibility: visible;
        color: red;
      }
      </style> <?php
  } elseif($success != null) {?>
    <style>
    .errors{
      visibility: visible;
      color: green;
    }
    </style> <?php
  }?>
  <?php
    if($_type == "Job-Seeker"){
      ?>
      <style>
      .seekerFields{
        display:block;
      }
      .employerFields{
        display:none;
      }
      </style> <?php
    } else { ?>
    <style>
      .seekerFields{
        display:none;
      }
      .employerFields{
        display:block;
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
<div class="main update">
  <div class="predisplay update">
    <div class="display update">

        <div class="userinfo">
            Username: <?php echo $_SESSION['Username'];?> <br>
            Type: <?php echo $_type?>
        </div>

        <form class="updatewindow" action="" method="POST">
            <label class="updatetitle">Update information</label><br>
            <div class="seekerFields">
              <label>Email:</label>
              <input type='text' name='Email' value='<?php echo $_email; ?>'/><br>

              <label>Number:</label>
              <input type='text' name='Number' value='<?php echo $_number; ?>'/><br><br>
            </div>
            <div class="employerFields">
              <label>Organisation:</label>
              <input type='text' name='Organisation' value='<?php echo $_organisation; ?>'/><br>
            </div>
            <p class="errors"><?php echo $error; ?> <?php echo $success; ?></p>
           <div style="text-align:center"><input type="submit" name="Submit" value="Submit"/> </div>
        </form>
    </div>
  </div>
</div>
</body>
</html>