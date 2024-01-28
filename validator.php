<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "Personal";

    $conn = mysqli_connect($server, $user, $password);

    if (!$conn) {
        echo ("Connection Failed " . mysqli_connect_error());
    } else {
        $sql = "CREATE DATABASE IF NOT EXISTS Personal";

        if ($conn->query($sql) === TRUE) {
            mysqli_select_db($conn, "Personal");

            $doctable = "CREATE TABLE IF NOT EXISTS peoples (
                Id INT(6) AUTO_INCREMENT PRIMARY KEY,
                First_Name VARCHAR(50) NOT NULL,
                Last_Name VARCHAR(12) NOT NULL,
                Email VARCHAR(50) NOT NULL,
                Passwords VARCHAR(50) NOT NULL,
                Person_Info VARCHAR(50),
                Age INT(3),
                Referrer VARCHAR(30),
                Bio VARCHAR(500) NOT NULL
            )";

            if (($conn->query($doctable) === TRUE)) {
                if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['info']) && isset($_POST['age']) && isset($_POST['referrer']) && isset($_POST['bio']) && isset($_POST['agree'])) {
                    $fname = $_POST["fname"];
                    $lname = $_POST["lname"];
                    $email = $_POST["email"];
                    $pass = $_POST["pass"];
                    $info = $_POST["info"];
                    $age = $_POST["age"];
                    $referrer = $_POST["referrer"];
                    $bio = $_POST["bio"];
                    $agree = $_POST["agree"];

                    if ($fname == '' || $lname == '' || $email == '' || $pass == '' || $bio == '') {
                        echo "<script>alert('Required fields cannot be empty');</script>";
                        $conn->close();
                    } else {
                        $ins = "INSERT INTO peoples (First_Name, Last_Name, Email, Passwords, Person_Info, Age, Referrer, Bio) VALUES ('$fname', '$lname', '$email', '$pass', '$info', '$age', '$referrer', '$bio')";

                        if (mysqli_query($conn, $ins)) {
                            echo "<script>alert('Details inserted successfully');</script>";
                        } else {
                            echo "<script>alert('Error inserting details: " . mysqli_error($conn) . "');</script>";
                        }
                    }
                } else {
                    echo "<script>alert('Incomplete data submitted');</script>";
                }
            } else {
                echo "Error creating table: " . $conn->error;
            }
        } else {
            echo ("Database Creation Unsuccessful" . $conn->error);
        }
    }
    $conn->close();
    header("Location: registration.php");
    exit();
}
?>
