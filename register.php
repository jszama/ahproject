<?php require("validateRegister.php") ?>
<?php require("colourscheme.php");?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JakubJobs</title>
  <link rel="stylesheet" type="text/css" href="style.php">

  <?php
  if($error != null or $success != null){
    ?> <style>
      .errors{
        visibility: visible;
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
  <style>
      :root {
      --bgColor: <?= $colorSchemes['light']['bgColor']?>;
      --navColor: <?= $colorSchemes['light']['bgColor']?>;
      --mainColor: <?= $colorSchemes['light']['bgColor']?>;
      --secondaryColor: <?= $colorSchemes['light']['bgColor']?>;
      --searchColor: <?= $colorSchemes['light']['bgColor']?>;
      --displayColor: <?= $colorSchemes['light']['bgColor']?>;
      }
  </style>
</head>
<body>
<div class="header">
  <div class="title">JakubJobs</div>
</div>
<div class="registerMain">
  <div class="registerForm">
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
      <button><a href='loginPage.php'>Back to login</a></button>

    </form>
  </div>
</div>
</body>
</html>