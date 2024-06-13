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
                <input type="email" required name="EMAIL" placeholder="Enter Email">
                <button type="submit">Get password on Email</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db.php';
        $email = $_POST['EMAIL'];
        $sql = "SELECT PASSWORD FROM data WHERE EMAIL = '$email'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        echo "Password " . $row["PASSWORD"];   
        mysqli_close($con);
    }
?>








