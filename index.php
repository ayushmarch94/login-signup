<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration</title>
  <link rel="icon" href="./check.png" />
  <link rel="stylesheet" href="./styles.css" />
</head>

<body>
  <div class="signup">
    <div class="signup-form">
      <div class="heading">
        <h1>Sign up</h1>
      </div>
      <form id="signup-form" action="index.php" method="POST">
        <input name="EMAIL" type="email" required placeholder="Enter Email" />
        <input name="PASSWORD" type="password" required placeholder="Enter Password" />
        <button type="submit">Sign up</button>
        <button id="go-to-login" type="button" onclick="loginPage()">
          Login
        </button>
      </form>
    </div>
  </div>
  <script>
    function loginPage() {
      window.location.href = "./login.php";
    }
  </script>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include 'db.php';

  $EMAIL = $_POST["EMAIL"];
  $PASSWORD = $_POST["PASSWORD"];
  $stmt = $con->prepare("SELECT * FROM `data` WHERE `EMAIL` = ?");
  $stmt->bind_param("s", $EMAIL);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    echo "<script>
    alert('The email is already registered, Try login.'); 
    window.location.href = 'index.php';
    </script>";

  } else {
    $stmt = $con->prepare("INSERT INTO `data`(`EMAIL`, `PASSWORD`) VALUES (?, ?)");
    $stmt->bind_param("ss", $EMAIL, $PASSWORD);

    if ($stmt->execute()) {
      header("Location: ./land.php");
      exit();
    } else {
      echo "Error: " . $stmt->error;
    }
  }

  $stmt->close();
  $con->close();
}

?>

