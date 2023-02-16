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

<div class="loginForm">
<form action="" method="POST">
  <label>Username:</label><br>
  <input type='text' name='Username' value=""/><br><br>

  <label>Password:</label><br>
  <input type='text' name='Password' value=""/><br>
  <p class="errors"><?php echo $error; ?> <?php echo $success; ?></p>

  <input type="submit" name="login" value="Login"/>
  <button><a href='register.php'>Register</a></button>
</form>
</div>
</body>
</html>
