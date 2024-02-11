<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags and styles remain unchanged -->
</head>

<body>

    <!-- Menu -->
    <div class="menu">
        <!-- Menu items remain unchanged -->
    </div>

    <img class="top-banner" src="kcbanner.png">

    <script>
        // JavaScript banner rotation remains unchanged
    </script>

    <div class="scroll-container">
        <!-- Clothing items remain unchanged -->
    </div>

    <div class="about-us">
        <!-- About us section remains unchanged -->
    </div>

    <div class="subscription" style="background-color: #111214; text-align: center; padding: 20px;">
        <h2 style="color: #d3a140;">Subscribe to our Newsletter</h2>
        <p style="color: #d3a140;">Stay updated with our latest arrivals and exclusive offers!</p>
        <form action="subscribe.php" method="post" style="margin-top: 10px;">
            <input type="email" name="email" placeholder="Enter your email" style="padding: 5px; margin: 10px; width: 200px;">
            <input type="submit" value="Subscribe" style="background-color: #3C091a; color: #d3a140; padding: 5px 10px; border: none; cursor: pointer;">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

            // Validate the email address
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Save the email address to a file (for demonstration)
                $file = "subscribers.txt";
                file_put_contents($file, $email . PHP_EOL, FILE_APPEND);

                echo "<p style=\"color: #d3a140;\">Subscription successful! Thank you for subscribing.</p>";
            } else {
                echo "<p style=\"color: #d3a140;\">Invalid email address. Please try again.</p>";
            }
        }
        ?>
    </div>

    <!-- Additional sections remain unchanged -->

</body>

</html>
