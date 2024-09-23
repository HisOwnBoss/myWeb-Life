<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work-Experience-and-Skills</title>
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
            <li class="nav-item"><a href="P-n-CI.php" class="dropbtn">Project-and-Contact-Information</a></li> 
        </ul>
    </div>
    <div class="p">
        <h1>WORK EXPERIENCE AND SKILLS</h1>
    </div>


    <div class="form">
        <h2>Work - Experience :</h2>
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

        $sql = "SELECT work_experience FROM userprofile WHERE id = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='centered-content'>";

                $work_experience = $row["work_experience"];
                $sentences = preg_split('/(?<=[.!?])\s+/', $work_experience, -1, PREG_SPLIT_NO_EMPTY);

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
        <br><br><br>
        <h2>Skills :</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "userprofiles";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT skills FROM userprofile WHERE id = 1"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='centered-content'>";

                $skills = $row["skills"];
                $sentences = preg_split('/(?<=[.!?])\s+/', $skills, -1, PREG_SPLIT_NO_EMPTY);
                
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
        <br><br><br><br>
    <div class="link">
        <a href="WE-change.html">CLICK-TO-MAKE-CHANGE</a>
    </div>
    </div> 
</body>
</html>

