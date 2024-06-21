<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="icon" href="./image/heart.png">
  <link rel="stylesheet" href="./styles.css" />
</head>

<body>
  <div class="signup">
    <div class="signup-form">
      <div class="heading">
        <h1>Forget password</h1>
      </div>
      <form id="login-form" action="token.php" method="POST">
        <input type="password" name="OTP" required placeholder="Enter OTP sent on email" />
        <input type="password" name="newPassword" required placeholder="Enter new Password" />
        <input type="password" name="ConfirmPASSWORD" required placeholder="Confirm new Password" />
        <p id="tokenP">OTP did not matched</p>
        <p id="passP">Passwords did not matched</p>
        <button type="submit">Login</button>
        <button onclick="resend()" type="button">Resend OTP</button>
        <button onclick="back()" type="button">Back</button>
      </form>
    </div>
  </div>
  <style>
    p{
        display: none;
    }
  </style>
  <script>
    function resend() {
        window.location.href = './forget.php';
    }
    function back() {
        window.location.href = './forget.php';
    }

  </script>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $PASSWORD = $_POST["newPassword"];
    $ConfirmPassword = $_POST["ConfirmPASSWORD"];

    $OTP =$_POST["OTP"];
    session_start();
    $sessionToken = $_SESSION['token'];
    $sessionEmail = $_SESSION['email'];
    
    if($OTP==$sessionToken){
      if($PASSWORD==$ConfirmPassword){

        include 'db.php';
        $hash = password_hash($PASSWORD,PASSWORD_BCRYPT);
        $sql = "UPDATE data SET PASSWORD = '$hash' WHERE EMAIL='$sessionEmail'";
        $resultEnter = mysqli_query($con, $sql);
        header("Location: ./firstPage/land.php");
      }
      else{
        echo "<script>
     document.querySelector('#passP').style.display = 'block';
    </script>";
      }
    }

    else{

      echo "<script>
     document.querySelector('#tokenP').style.display = 'block';
    </script>";
    }

}
?>

