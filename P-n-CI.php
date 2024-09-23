<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project-and-Contact-Information</title>
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
            <li class="nav-item"><a href="PI-n-E.php" class="dropbtn">Personal Information and Education</a></li>    
            <li class="nav-item"><a href="WE-n-S.php" class="dropbtn">Work Experiance and Skills</a></li> 
        </ul>
    </div>
    <div class="p">
        <h1>PROJECT AND CONTACT-INFORMATION</h1>
    </div>


    <div class="form">
        <h2>PROJECT :</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "userprofiles";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT project FROM userprofile WHERE id = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='centered-content'>";

                $project = $row["project"];
                $sentences = preg_split('/(?<=[.!?])\s+/', $project, -1, PREG_SPLIT_NO_EMPTY);

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
        <br><br>
        <h2>Contact-Information :</h2>
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

        $sql = "SELECT phone_number, email FROM userprofile WHERE id = 1"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='centered-content'>";
                echo "<h3> Phone-Number : " . $row["phone_number"] . "</h3>";
                echo "<br>";
                echo "<h3> Email : " . $row["email"] . "</h3>";
                echo "</div>";
            }
        } else {
            echo "No results found";
        }
        $conn->close();
        ?>
        <br><br><br>
        <div class="link">
            <a href="P-change.html">CLICK-TO-MAKE-CHANGE</a>
        </div>
    </div>
    
     
</body>
</html>