<?php
$servername = "localhost";
$username = "root"; // Assuming the default root user, adjust if necessary
$password = ""; // Empty password
$dbname = "userprofiles";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project = $_POST['project'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    // Update data in the database where id = 1
    $sql = "UPDATE userprofile SET project = '$project', phone_number = '$phone_number', email = '$email'  WHERE id = 1";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to the home page
        header("Location: HomePage.php"); // Adjust the path as needed
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>