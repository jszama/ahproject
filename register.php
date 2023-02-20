<?php require("validateRegister.php") ?>
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
  
  <script>
  function toggleEmployer() {
    document.getElementById('Email').disabled = true;
    document.getElementById('Number').disabled = true;
    document.getElementById('Organisation').disabled = false;
  }

  function toggleJobseeker() {
    document.getElementById('Email').disabled = false;
    document.getElementById('Number').disabled = false;
    document.getElementById('Organisation').disabled = true;
  }

  </script>

</head>
<body>
<div class="header">
  <h1>JakubJobs</h1>
</div>
<div>
<form action="" method="POST">
  <label>Username:</label><br>
  <input type='text' name='Username' value=""/><br>

  <label>Password:</label><br>
  <input type='text' name='Password' value=""/><br>

  <label>Type:</label><br>
  <input type='radio' name='Type' value="Job-seeker" onclick="toggleJobseeker()"/>Job-seeker
  <input type='radio' name='Type' value="Employer" onclick="toggleEmployer()"/>Employer<br>

  <label>Email:</label><br>
  <input type='text' id='Email' name='Email' value=""/><br>

  <label>Number:</label><br>
  <input type='text' id='Number' name='Number' value=""/><br>

  <label>Organisation:</label><br>
  <input type='text' id='Organisation' name='Organisation' value=""/><br>
  <p class="errors"><?php echo $error; ?> <?php echo $success; ?></p>

  <input type="submit" name="register" value="Register"/>
</form>
</div>
</body>
</html>
