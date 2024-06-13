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
        <a onclick="forget()"><p>Forget Password</p></a>
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
    $PASSWORD = $_POST["PASSWORD"];
    $stmt = $con->prepare("SELECT * FROM `data` WHERE `EMAIL` = ? AND `PASSWORD` = ?");
    $stmt->bind_param("ss", $EMAIL, $PASSWORD);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = $result->num_rows;
    if ($num > 0) {
        header("Location: ./land.php");
        exit();
    } else {
        header("Location: ./index.php");
        exit();
    }
}
?>
