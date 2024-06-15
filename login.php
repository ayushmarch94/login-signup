<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="icon" href="./check.png" />
  <link rel="stylesheet" href="./styles.css" />
</head>

<body>
  <div class="signup">
    <div class="signup-form">
      <div class="heading">
        <h1>Login</h1>
      </div>
      <form id="login-form" action="login.php" method="POST">
        <input type="email" name="EMAIL" required placeholder=" Enter Email" />
        <input type="password" name="PASSWORD" required placeholder=" Enter Password" />
        <button type="submit">Login</button>
        <button onclick="signUp()">Signup</button>
        <a onclick="forget()">
          <p>Forget Password</p>
        </a>
      </form>
    </div>
  </div>
  <script>
    function forget() {
      window.location.href = "./forget.php";
    }

    function signUp() {
      window.location.href = "./index.php";
    }
  </script>
</body>

</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'db.php';

  $EMAIL = $_POST["EMAIL"];
  $EMAIL=strtolower($EMAIL);
  $PASSWORD = $_POST["PASSWORD"];

  $emailDatabase = "SELECT EMAIL FROM data WHERE EMAIL = '$EMAIL'";
  $passwordDatabase = "SELECT PASSWORD FROM data WHERE EMAIL = '$EMAIL'";
  
  $result1 = mysqli_query($con, $emailDatabase);
  $result2 = mysqli_query($con, $passwordDatabase);
  
  $emailRow = $result1->fetch_assoc();
  $passwordRow = $result2->fetch_assoc();
  
  $verify = password_verify($PASSWORD, $passwordRow['PASSWORD']);
  if ($verify == TRUE) {
      header("Location: ./land.php");
      exit();
  } else {
      header("Location: ./index.php");
      exit();
  }
  
}
?>

