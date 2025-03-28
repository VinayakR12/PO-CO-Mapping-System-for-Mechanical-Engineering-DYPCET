<?php
session_start();

include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['course-name']) && isset($_POST['course-code']) && isset($_POST['total-sessions'])) {
    
        $courseName = $_POST['course-name'];
        $courseCode = $_POST['course-code'];
        $totalSessions = $_POST['total-sessions'];
        
        $check_query = "SELECT * FROM subjects WHERE name='$courseName'";
        $check_result = $conn->query($check_query);
        
        if ($check_result->num_rows > 0) {
            echo '<script>alert("Course already exists.");</script>';
        } else {
            $sql = "INSERT INTO subjects (name, code, sessions) VALUES ('$courseName', '$courseCode', '$totalSessions')";
            
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("New record created successfully");</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        $conn->close();
    } else {
        echo '<script>alert("All form fields are required.");</script>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add Course</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&family=Young+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="coursedetails.css">
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->

    <style>
    *
{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    
}


h2
{
    display: flex;
    justify-content: center;
    margin-top: 100px;
    margin-bottom: 25px;
    color: rgb(37, 37, 96);
}


.container {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    box-sizing: border-box;
    background-color: #fff;
    border: 1px solid #ddd; /* Border around the form */
    border-radius: 5px; /* Rounded corners for the border */
}
.container {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
form.course-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

label {
    font-weight: bold;
    display: flex;
    flex-direction: column;
}

input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

</style>
</head>

<body>

    <?php
        include "../navbar.php";
    ?>

    <h2>COURSE DETAILS</h2>

    <div class="container">
    <form class="course-form" id="course-form" method="post">
        Course Name: <input type="text" id="course-name" name="course-name" required><br>
        Course Code: <input type="text" id="course-code" name="course-code" required><br>
        Total Sessions: <input type="text" id="total-sessions" name="total-sessions" required><br>
        <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" >
    </form>

    </div>

</body>
</html>
