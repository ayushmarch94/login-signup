<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration</title>
  <link rel="icon" href="./image/heart.png">
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
        <input name="age" type="number" required placeholder="Enter your age">
        <p id="emailP">The email is already registered, Try login</p>
        <p id="ageAlert">Your age is less than 18 can't Signup</p>
        <p id="database">Currently database is down try again later on</p>
        <button type="submit">Sign up</button>
        <button id="go-to-login" type="button" onclick="loginPage()">
          Login
        </button>
        <a onclick="forget()">
          <p>Forget Password</p>
        </a>
      </form>
    </div>
  </div>

  <style>
    #emailP {
      display: none;
    }
    #ageAlert{
      display: none;
    }
    #database{
      display: none;
    }
  </style>

  <script>
    function loginPage() {
      window.location.href = "./login.php";
    }

    function forget() {
      window.location.href = "./forget.php";
    }
  </script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'db.php';
  $age = $_POST["age"];
  
  if ($age<18) {
    echo "<script>document.querySelector('#ageAlert').style.display = 'block';</script>";
  } else {
    echo "<script>document.querySelector('#ageAlert').style.display = 'none';</script>";

    $EMAIL = $_POST["EMAIL"];
    $EMAIL = strtolower($EMAIL);
    $PASSWORD = $_POST["PASSWORD"];
    $hash = password_hash($PASSWORD, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM data WHERE EMAIL = '$EMAIL'";  //to detect email is present or not in database
    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
      echo "<script>document.querySelector('#emailP').style.display = 'block';</script>";
    } else {
      $insertData = "INSERT INTO data VALUES ('$EMAIL','$hash')";
      $resultEnter = mysqli_query($con, $insertData);

      if ($resultEnter) {
        header("Location: ./firstPage/land.php");
        exit();
      } 
      else{
        echo "<script>document.querySelector('#database').style.display = 'block';</script>";
      }
    }
  }
}
?>
