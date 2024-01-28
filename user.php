<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$server = "localhost";
$user = "root";
$password = "";
$database = "Personal";

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM peoples WHERE Id = $user_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $user_data = mysqli_fetch_assoc($result);
} else {
    die("Error: " . mysqli_error($conn));
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <style>
        li{
            padding:5px;
            font-weight:bold;
        }

        body{
            background-color: grey;
            font-family: Arial, sans-serif;
        }
        h1{
            font-size:50px;
            color: black;
        }
        .container{
            margin:10px;
            background-color:#fff;
            padding: 10px;
            border-radius: 15px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid #3498db;
            color: #3498db;
            background-color: #fff;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #3498db;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    if ($user_data) {
        echo "<h1>Welcome {$user_data['First_Name']}</h1>";
        echo "<ul type='none'>";
        echo "<li>Email: <input type='text' value='{$user_data['Email']}'></li>";
        echo "<li>Password: <input type='text' value='{$user_data['Passwords']}' readonly></li>";
        echo "<li>Age: <input type='text' value='{$user_data['Age']}' readonly></li>";
        echo "<li>Bio: <textarea rows=10 cols=100 readonly>{$user_data['Bio']}</textarea></li>";
        echo "</ul>";
    }
    ?>
</div>
    <a href="logout.php" class="button">Logout</a>
    <a href="index.php" class="button">Main Page</a>
</body>
</html>
