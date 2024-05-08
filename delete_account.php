<?php
session_start();

// Check if user is logged in
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "suniega_icafe";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user's first name
    $fname = $_SESSION["fname"];

    // Prepare and execute SQL statement to delete the user's account
    $stmt = $conn->prepare("DELETE FROM users WHERE fname = ?");
    $stmt->bind_param("s", $fname);

    if ($stmt->execute()) {
        // Account deleted successfully, logout the user
        session_destroy();
        header("Location: logout.php"); // Redirect to logout page
        exit;
    } else {
        echo "Error deleting account: " . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    echo "User not logged in!";
}
?>
