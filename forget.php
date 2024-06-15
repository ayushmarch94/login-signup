<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <link rel="icon" href="./check.png">
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <div class="signup">
        <div class="signup-form">
            <div class="heading">
                <h1>Get your Password</h1>
            </div>
            <form id="signup-form" action="forget.php" method="POST">
                <p id="notice">Your password will be sent to the email</p>
                <input type="email" required name="EMAIL" placeholder="Enter Email">
                <button id="resetPassword" type="submit">Get password on Email</button>
            </form>
        </div>
    </div>
    <style>
        #notice{
            color: green;
        }
    </style>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';

    $email = $_POST['EMAIL'];
    $EMAIL=strtolower($EMAIL);
    $sql = "SELECT PASSWORD FROM data WHERE EMAIL = '$email'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($con);

    $subject="Requested email";
    $message = "This is your requested password ".$row["PASSWORD"];
    $from = "From:ayushkumar.ajstyles@gmail.com";
    mail($email,$subject,$message,$from);
    
    header("Location: ./login.php");
}

?>