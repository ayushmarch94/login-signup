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
                <h1>Reset Password</h1>
            </div>
            <form id="signup-form" action="/forget">
                <input required placeholder="Enter OTP">
                <input required placeholder="Enter new password">
                <p>OTP is sent to your email</p>
                <p id="countdown">60s</p>
                <button type="submit">Ok</button>
            </form>
        </div>
    </div>
    <script src="./forget.js"></script>
</body>
</html>
