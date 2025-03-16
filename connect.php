<?php
// Database connection parameters
$servername = "localhost"; // Assuming MySQL server is running on the default port
$username = "root"; // Change this if you have a different MySQL username
$password = ""; // Change this if you have set a password for MySQL
$database = "formdatabase"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $fullname = $conn->real_escape_string($_POST['name']);
    $fathername = $conn->real_escape_string($_POST['fathername']);
    $age = $conn->real_escape_string($_POST['age']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $password = $conn->real_escape_string($_POST['password']);

    // Insert data into database
    $sql = "INSERT INTO registration (name, fathername, age, contact, email, subject, password)
    VALUES ('$fullname', '$fathername', '$age', '$contact', '$email', '$subject', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
