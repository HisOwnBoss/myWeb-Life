<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Down Menu</title>
    <link rel="stylesheet" href="page.css">
    <style>
        .centered-contentent {
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
            <li class="nav-item"><a href="PI-n-E.php">Personal-Information-and-Education</a></li>
            <li class="nav-item"><a href="WE-n-S.php" class="dropbtn">Work-Experience-and-Skills</a></li>    
            <li class="nav-item"><a href="P-n-CI.php" class="dropbtn">Project-and-Contact-Information</a></li> 
        </ul>
    </div>
    <div class="p">
        <h1>Walcome To The Home-Page</h1>
    </div>

    <div class="content-wrapper">
        <form class="left-content">
            <h3>
                Hi there, my name is DANNY and<br>
                <br>
                this is a website to display my C.V.<br>
                <br>
                For more details or more<br>
                <br>
                information about my C.V, click<br>
                <br>
                one of those links above!!!
            </h3>
        </form>
        
        <div class="right-content">
            <h2>YOUR C.V</h2>
            <br>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "userprofiles";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve data from the database
            $sql = "SELECT name,bio,education,work_experience,skills,phone_number,email,project  FROM userprofile WHERE id = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
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
                    echo "<div class='centered-content'>";
                    echo "<h3>EDUCATION : " . $row["education"] . "</h3>";

                    echo "<div class='centered-content'>";
                    echo "<h3>WORK_EXPERIANCE :</h3>";
                    $work_experience = $row["work_experience"];
                    $sentences = preg_split('/(?<=[.!?])\s+/', $work_experience, -1, PREG_SPLIT_NO_EMPTY);
                    echo "<div class='bio-paragraph'>";
                    foreach ($sentences as $sentence) {
                        echo $sentence . "<br>";
                    }
                    echo "</div>";
                    echo "</div>"; 

                    echo "<div class='centered-content'>";
                    echo "<h3>SKILLS :</h3>";
                    $skills = $row["skills"];
                    $sentences = preg_split('/(?<=[.!?])\s+/', $skills, -1, PREG_SPLIT_NO_EMPTY);
                    echo "<div class='bio-paragraph'>";
                    foreach ($sentences as $sentence) {
                        echo $sentence . "<br>";
                    }
                    echo "</div>";
                    echo "</div>";

                    echo "<div class='centered-content'>";
                    echo "<h3>PROJECTS :</h3>";
                    $project = $row["project"];
                    $sentences = preg_split('/(?<=[.!?])\s+/', $project, -1, PREG_SPLIT_NO_EMPTY);
                    echo "<div class='bio-paragraph'>";
                    foreach ($sentences as $sentence) {
                        echo $sentence . "<br>";
                    }
                    echo "</div>";
                    echo "</div>";

                    echo "<div class='centered-content'>";
                    echo "<h3> Phone-Number : " . $row["phone_number"] . "</h3>";
                    echo "<h3> Email : " . $row["email"] . "</h3>";
                    echo "</div>";
                }
            } else {
                echo "No data found";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>

