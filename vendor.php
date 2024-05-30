<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Database connection details
    $host = 'localhost';
    $username_db = 'root';
    $password_db = 'pentium21S';
    $database = 'wedding';

    // Create a new PDO instance
    $dsn = "mysql:host=$host;dbname=$database";
    $pdo = new PDO($dsn, $username_db, $password_db);

    // Get the vendor data from the form
    $vendor = $_POST['vendor'];

    // Prepare the SQL statement
    $sql = "INSERT INTO vendor (username, vendor) VALUES (:username, :vendor)";
    $stmt = $pdo->prepare($sql);

    // Bind the values to the parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':vendor', $vendor);

    // Execute the query
    if ($stmt->execute()) {
        echo "Vendor saved successfully.";
    } else {
        echo "Error saving vendor.";
    }
} else {
    echo "Username not found in session.";
}
?>
