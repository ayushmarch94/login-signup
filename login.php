<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="icon" href="./image/passwords.png">
  <link rel="stylesheet" href="./styles.css" />
</head>

<body>
  <div class="signup">
    <div class="signup-form">
      <div class="heading">
        <h1>Login</h1>
      </div>
      <form id="login-form" action="login.php" method="POST">
        <input type="email" name="EMAIL" required placeholder="Enter Email" />
        <input type="password" name="PASSWORD" required placeholder="Enter Password" />
        <p id="noticeE">Wrong email</p> 
        <p id="noticeP">Wrong password</p> 
        <button type="submit">Login</button>
        <button type="reset" onclick="signUp()">Signup</button>
        <a onclick="forget()">
          <p>Forget Password</p>
        </a>
      </form>
    </div>
  </div>
  <style>
    #noticeP,#noticeE{
      display: none;
    }
  </style>
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
  if($emailRow==null){
    echo "<script>
      document.querySelector('#noticeE').style.display = 'block';
     </script>";
  }
  else{
    $verify = password_verify($PASSWORD, $passwordRow['PASSWORD']);
    if ($verify == TRUE) {
        header("Location: ./firstPage/land.php");
        exit();
    } else {
      echo "<script>
      document.querySelector('#noticeP').style.display = 'block';
     </script>";
    }
  }

  
}
?>


