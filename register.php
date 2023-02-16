<?php require("validateLogin.php") ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JakubJobs</title>
  <link href="style.css" rel="stylesheet" type="text/css"/>

  <?php
  if($error != null or $success != null){
    ?> <style>
      .errors{
        display:block
      }
      </style> <?php
  } ?>
  
</head>
<body>
<div class="header">
  <h1>JakubJobs</h1>
</div>
<form action="" method="POST">
  <label>Username:</label><br>
  <input type='text' name='Username' value=""/><br>

  <label>Password:</label><br>
  <input type='text' name='Password' value=""/><br>

  <label>Type:</label><br>
  <input type='radio' name='type' value="Job-seeker"/>Job-seeker
  <input type='radio' name='type' value="Employer"/>Employer<br>

  <label>Email:</label><br>
  <input type='text' name='Email' value=""/><br>

  <label>Number:</label><br>
  <input type='text' name='Number' value=""/><br>

  <label>Organisation:</label><br>
  <input type='text' name='Organisation' value=""/><br>
  <p class="errors"><?php echo $error; ?> <?php echo $success; ?></p>

  <input type="submit" name="register" value="Register"/>
</form>
</body>
</html>
