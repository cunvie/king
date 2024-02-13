<?php

// Function to generate a unique track code
function generateTrackCode() {
    // Implement your logic to generate a unique track code
    // For example, you can use a combination of date, order ID, and random characters
    return 'TRACK_' . date('YmdHis') . '_' . substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 5);
}

// Function to save the track code in the database (replace with your database logic)
function saveTrackCode($orderID, $trackCode) {
    // Implement your logic to save the track code in your database
    // For example, connect to a database and update the order record with the generated track code
    // Replace the following with your database connection and update query
    // Assume you have a database table named 'orders' with columns 'orderID' and 'trackCode'

    // Sample code (replace with your database query)
    $dbHost = 'your_db_host';
    $dbUser = 'your_db_user';
    $dbPassword = 'your_db_password';
    $dbName = 'your_db_name';

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $updateQuery = "UPDATE orders SET trackCode = '$trackCode' WHERE orderID = '$orderID'";

    if ($conn->query($updateQuery) === TRUE) {
        // Track code updated successfully
    } else {
        // Error updating track code
        echo "Error updating track code: " . $conn->error;
    }

    $conn->close();
}

// Check if the payment was successful (you need to integrate this with your payment success logic)
$paymentSuccess = true; // Replace with your actual payment success check

if ($paymentSuccess && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the order ID from the payment response (you need to integrate this with your payment processing)
    $orderID = 'your_order_id'; // Replace with your actual order ID

    // Generate a unique track code
    $trackCode = generateTrackCode();

    // Save the track code in the database
    saveTrackCode($orderID, $trackCode);

    // Display the track code to the user
    echo '<div style="background-color: #3C091a; color: #d3a140; padding: 20px;">';
    echo '<p>Your order has been successfully placed!</p>';
    echo '<p>Track Code: ' . $trackCode . '</p>';
    echo '<p>Please paste this track code in the track.html page to check your order status.</p>';
    echo '</div>';
} else {
    echo '<p>Payment not successful. Please try again.</p>';
}

?>
