<?php

// Set database connection parameters
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'inventory';

// Create database connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check if connection was successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Fetch form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare SQL statement to insert data into the contact_us table
$sql = "INSERT INTO contact_us (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

// Execute SQL statement
if (mysqli_query($conn, $sql)) {
   
    ?>
    <script>
        alert("Thank you for contacting us. Your message has been received.")
    </script>
    <?php
    header("location:index.html");
   
} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);

?>
