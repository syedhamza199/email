<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>form</title>
  <?php
  include 'links.php';
  ?>

</head>

<body>
  <h2 class="text-center mt-5">Login</h2>
  <div class="text-center">
    <a href="">Login with Gmail</a>
  </div>
  <div class="text-center">
    <a href="">Login with facebook</a>
  </div>
  <hr>

  <br>
  <div>
    <p>
      <?php
        echo $_SESSION['msg'];
      ?>
    </p>
  </div>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="mx-5">
    <div class="mb-3 mt-3 mx-5">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="email" value="" required>
    </div>
    <div class="mb-3 mx-5">
      <label for="pwd" class="form-label">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="password" value="" required>
    </div>
    <button name="submit" class="btn btn-primary mx-5"> Login </button>
  </form>
  <div class="text-center">
    Don't have an account
    <a href="signup.php">signup</a>
  </div>
</body>

</html>

<?php

include 'conn.php';

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $emailCheck = "SELECT * FROM usersdata WHERE Email = '$email'";
  $result = mysqli_query($connect, $emailCheck);
  $emailCount = mysqli_num_rows($result);

  if ($emailCount) {
    $email_pass = mysqli_fetch_assoc($result);

    $_SESSION['username'] = $email_pass['Name'];
    $dbPass = $email_pass['Password'];

    $passVerify = password_verify($password, $dbPass);
    if ($passVerify) {
      echo 'Login Successfully';
      ?>
      <script>
        location.replace("welcome.php")
    </script>
      
    <?php

    } else {
      echo 'Inccorrect Password';
    }
  } 
  else {
    echo 'Invalid email';
  }
}

?>