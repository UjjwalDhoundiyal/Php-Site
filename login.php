<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        body {
            background-image: url(image/back.png);
            background-repeat: fill;
        }

        .change {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <form action="login_validator.php" method="POST">
        
        <h3>You are back</h3>
        <label>Username</label>
        <input type="text" placeholder="Email or Phone" id="username" name="username">
        <label>Password</label>
        <input type="password" placeholder="Password" id="password" name="password">
        <button type="submit">Log In</button>
        <label>Don't have any Account <a href="registration.php" class="change">Sign Up</a></label>
        <a href="index.php" class="return-btn">Return to Main Page</a>
    </form>
</body>
</html>
