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
    $work_experience = $_POST['work_experience'];
    $skills = $_POST['skills'];

    // Update data in the database where id = 1
    $sql = "UPDATE userprofile SET work_experience = '$work_experience', skills = '$skills'  WHERE id = 1";
    
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