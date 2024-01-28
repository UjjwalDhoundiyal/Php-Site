<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "ujjwaldhoundiyal3@example.com";
    $subject = "New Contact Form Submission";

    $message = "Email: " . $_POST["email"] . "\n";
    $message .= "Phone Number: " . $_POST["phone"] . "\n";
    $message .= "Bio: " . $_POST["bio"] . "\n";

    $headers = "From: " . $_POST["email"];

    mail($to, $subject, $message, $headers);
}
?>