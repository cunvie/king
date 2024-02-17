<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    // Save $email to your database or perform any necessary validation

    // Send confirmation email
    $to = $email;
    $subject = "Subscription Confirmation";
    $message = "
        <html>
        <head>
            <title style='color: #d3a140;'>Subscription Confirmation</title>
        </head>
        <body style='background-color: #3C091a; color: #d3a140;'>
            <h2>Subscription Confirmation</h2>
            <p>Thank you for subscribing! You'll now receive our latest updates and exclusive offers.</p>
        </body>
        </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to, $subject, $message, $headers);
}
?>
