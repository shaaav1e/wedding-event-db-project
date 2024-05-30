<?php
// Check if the required form data is present
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone']) && isset($_POST['address'])) {
  // Retrieve the form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $firstName = $_POST['firstname'];
  $lastName = $_POST['lastname'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  // Connect to the database
  $host = 'localhost';
  $dbUsername = 'root'; // Changed the variable name to avoid conflict
  $dbPassword = 'pentium21S'; // Changed the variable name to avoid conflict
  $database = 'wedding';
  $connection = mysqli_connect($host, $dbUsername, $dbPassword, $database);

  // Check if the connection was successful
  if (!$connection) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
  }

  // Prepare and execute the INSERT query
  $query = "INSERT INTO client (C_USERNAME, C_PASSWORD, C_EMAIL, C_FIRST_NAME, C_LAST_NAME, PHONE, ADDRESS) VALUES ('$username', '$password', '$email', '$firstName', '$lastName', '$phone', '$address')";
  $result = mysqli_query($connection, $query);

  // Check if the query executed successfully
  if ($result) {
    echo "User registered successfully.";
  } else {
    echo "Error: " . mysqli_error($connection);
  }

  // Close the database connection
  mysqli_close($connection);
} else {
  echo "Please fill out all the required fields.";
}
?>
