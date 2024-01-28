<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "Personal";
    
        $conn = mysqli_connect($server, $user, $password, $database);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $sql = "SELECT Id FROM peoples WHERE Email = '$username' AND Passwords = '$password'";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            $row = mysqli_fetch_assoc($result);
    
            if ($row) {
                $_SESSION['user_id'] = $row['Id'];
                $_SESSION['success_message'] = 'Login successful';
                header("Location: user.php"); 
                exit();
            } else {
                $_SESSION['error_message'] = 'Invalid username or password';
            }
        } else {
            $_SESSION['error_message'] = 'Error: ' . $conn->error;
        }
    
        $conn->close();
        header("Location: login.php");
        exit();
    }    
?>