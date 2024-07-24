<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <link rel="icon" href="./image/passwords.png">
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <div class="signup">
        <div class="signup-form">
            <div class="heading">
                <h1>Forget password</h1>
            </div>
            <form id="signup-form" action="forget.php" method="POST">
                <input type="email" required name="EMAIL" placeholder="Enter Email">
                <p>This email is not registered try signup</p>
                <button id="resetPassword" type="submit">Get OTP on email</button>
                <button type="button" onclick="back()"><- Back</button>
            </form>
        </div>
    </div>
    <style>
        p{
            display: none;
        }
    </style>
    <script>
            function back() {
                window.location.href = "./login.php";
            }
    </script>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';
    session_start();
    $EMAIL = $_POST["EMAIL"]; 
    $_SESSION['email'] = $EMAIL;
    $sql = "SELECT EMAIL FROM data WHERE EMAIL = '$EMAIL'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0){
        $token = rand();
        $_SESSION['token'] = $token;
        $emailData= $row['EMAIL'];
        
        $subject="OTP for reset password";
        $message .= "This is your OTP for reset password ".$token;
        $from = "From:ayushkumar.ajstyles@gmail.com";
        mail($emailData,$subject,$message,$from);
    
        header("Location: ./token.php");
    } 

    else {
        echo "<script>
            document.querySelector('p').style.display = 'block';
        </script>";
    }
    
}
?>



