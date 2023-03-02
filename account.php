<?php require("update.php")?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JakubJobs</title>
  <link href="style.css" rel="stylesheet"/>
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
        <li><a href="main.php">Home</a></li>
        <li style="float:right;"><a href="#">Account</a></li>
    </ul>
</div>
<div class="main update">
  <div class="predisplay update">
    <div class="display update">

        <div class="userinfo">
            Username: <?php echo $_SESSION['Username'];?> <br>
            Type: <?php?>
        </div>

        <form class="updatewindow" action="" method="POST">
            <label class="updatetitle">Update information</label><br>
            <label>Email:</label>
            <input type='text' name='Email' value=""/><br>

            <label>Number:</label>
            <input type='text' name='Number' value=""/><br><br>
            <p class="errors"><?php echo $error; ?> <?php echo $success; ?></p>
           <div style="text-align:center"> <input type="submit" name="Submit" value="Submit"/> </div>
        </form>
    </div>
  </div>
</div>
</body>
</html>
