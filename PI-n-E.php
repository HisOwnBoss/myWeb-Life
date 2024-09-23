<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal-Information-and-Education</title>
    <link rel="stylesheet" href="PI-n-E2.css">
    <style>
        .centered-content {
            max-width: 600px; 
            margin: 0 auto; 
            text-align: center; 
            word-wrap: break-word; 
            line-height: 1.6; 
        }

    </style>

</head>
<body>
    <div class="navbar">
        <ul class="nav-list">
            <li class="nav-item"><a href="index.php">HomePage</a></li>
            <li class="nav-item"><a href="WE-n-S.php" class="dropbtn">Work-Experience-and-Skills</a></li>    
            <li class="nav-item"><a href="P-n-CI.php" class="dropbtn">Project-and-Contact-Information</a></li> 
        </ul>
    </div>
    <div class="p">
        <h1>Personal Information and Education</h1>
    </div>
    <div class="content-wrapper">
    <div class="form">
        <h2>Personal - Information :</h2>
        <br>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "userprofiles";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT name, bio FROM userprofile WHERE id = 1"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='centered-content'>";
                echo "<h3>Names: " . $row["name"] . "</h3>";
                echo "</div>";
                echo "<div class='centered-content'>";
                echo "<h3>Bio:</h3>";

                $bio = $row["bio"];
                $sentences = preg_split('/(?<=[.!?])\s+/', $bio, -1, PREG_SPLIT_NO_EMPTY);

                echo "<div class='bio-paragraph'>";
                foreach ($sentences as $sentence) {
                    echo $sentence . "<br>";
                }
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No results found";
        }
        $conn->close();
        ?>
        <br>
        <h2>Education :</h2>
        <?php
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT education FROM userprofile WHERE id = 1"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='centered-content'>";
                echo "<h3> " . $row["education"] . "</h3>";
            }
        } else {
            echo "No results found";
        }
        $conn->close();
        ?>      
    </div>
    <br><br><br><br>
    <div class="link">
        <a href="PI-change.html">CLICK-TO-MAKE-CHANGE</a>
    </div>
    </div>  
</body>
</html>

