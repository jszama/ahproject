<?php require("validateLogin.php") ?>
<?php require("colourscheme.php")?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JakubJobs</title>
  <link rel="stylesheet" type="text/css" href="style.php">

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
<div class="loginMain">
  <div class="loginForm">
    <form action="" method="POST">
      <label>Username:</label><br>
      <input type='text' name='Username' value=""/><br>

      <label>Password:</label><br>
      <input type='text' name='Password' value=""/><br>
      <p class="errors"><?php echo $error; ?> <?php echo $success; ?></p>

      <input type="submit" name="login" value="Login"/>
      <button><a href='register.php'>Register</a></button>
    </form>
  </div>
</div>
</body>
</html>