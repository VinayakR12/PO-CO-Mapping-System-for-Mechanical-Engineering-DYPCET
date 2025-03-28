<?php

include "../conn.php";
// if (!isset($_SESSION['username'])) {
//     header('Location: index.php');
//     exit();
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses-details</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&family=Young+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/course-detail.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        /* font-family: 'Young Serif', serif; */
    }

    .direct {
        margin-top: 10px;
        margin-left: 90%;
    }


    label {
        font-weight: bold;
    }

    .at {
        font-weight: bold;
        margin: 10px;
        margin-top: 10px;
    }

    .teacher-info {
        margin-top: 50px;
        margin-left: 100px;
    }

    .teacher-info label {
        display: block;
    }

    .teacher-info input {
        margin-left: 100px;
    }

    .teacher-in {

        border: 2px solid black;
        border-radius: 3px;
        margin: 10px;
        padding: 2px;
        width: 20%;
    }

    /* .add{
    background-color: #09995D;
    width: 90px;
    border: none;
    border-radius: 5px;
    padding: 10px;
    color: white;
    font-weight: bold;
    margin-top: 10px;
    margin-left: 119px;
    cursor: pointer;
} */

    p {
        text-align: center;
        color: #095899;
        font-weight: 900;
        font-size: 20px;
    }

    .info {

        height: 180px;
        width: 800px;
        background-color: #E5F2FC;
        padding: 30px;
        margin: 40px auto;


    }

    .course {
        background-color: #E5F2FC;
        margin-left: 20%;
        padding: 5px;
    }

    .course-sel {
        width: 35%;
        border: 0.5px solid #BEB4B4;
        padding: 5px;
        border-radius: 5px;
        margin: 5px;
    }

    .select {
        margin: 10px;
        margin-left: 150px;
        background-color: #E5F2FC;

    }

    .allocate {
        background-color: #09995D;
        width: 90px;
        border: none;
        border-radius: 5px;
        padding: 10px;
        color: white;
        font-weight: bold;
        margin: 20px;
        /* margin-top: 20px; */
        margin-left: 350px;
        cursor: pointer;

    }

    form {
        margin: 20px;
        background-color: #E5F2FC;
    }

    .check {
        margin: 10px;
    }

    .info form {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    /* .sub_input{
        display: none;
    } */
</style>

<body>

    <?php
    include "../navbar.php";
    ?>

    <span class="at">Add teachers >> </span>


    <?php
    include "conn.php";

    if (isset($_POST['submit_without_admin']) || isset($_POST['submit_with_admin'])) {
        $name = $_POST['teacher_name'];
        $email = $_POST['teacher_email'];
        $password = $_POST['teacher_password'];


        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $password = password_hash($password, PASSWORD_DEFAULT);


        $check_query = "SELECT * FROM `teachers` WHERE `email` = ?";
        $check_stmt = mysqli_prepare($conn, $check_query);
        mysqli_stmt_bind_param($check_stmt, 's', $email);
        mysqli_stmt_execute($check_stmt);
        mysqli_stmt_store_result($check_stmt);

        if (mysqli_stmt_num_rows($check_stmt) > 0) {
            echo '<script>alert("Email address already exists!");</script>';
        } else {

            $insert_query = "INSERT INTO `teachers`(`name`, `email`, `password`, `isadmin`) VALUES (?, ?, ?, ?)";
            $insert_stmt = mysqli_prepare($conn, $insert_query);

            $is_admin = isset($_POST['submit_with_admin']) ? '1' : '0';

            mysqli_stmt_bind_param($insert_stmt, 'ssss', $name, $email, $password, $is_admin);
            mysqli_stmt_execute($insert_stmt);

            if (mysqli_stmt_affected_rows($insert_stmt) > 0) {
                echo '<script>alert("Teacher added successfully!");</script>';
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            mysqli_stmt_close($insert_stmt);
        }

        mysqli_stmt_close($check_stmt);
    }

    ?>


    <form action="" method="POST">
        <div class="teacher-info">
            <label for="teacher-name">Teacher name :</label>
            <input type="text" name="teacher_name" id="teacher-name" class="teacher-in" required>

            <label for="teacher-email">Teacher email :</label>
            <input type="email" name="teacher_email" id="teacher-email" class="teacher-in" required>

            <label for="teacher-password">Teacher password :</label>
            <input type="password" name="teacher_password" id="teacher-password" class="teacher-in">
        </div>
        <input type="submit" name="submit_without_admin" class="btn btn-success" value="Add">
        <input type="submit" name="submit_with_admin" class="btn btn-success" value="Add as admin">
    </form>


    <p>Allocate Subject to teacher</p>

    <div class="info">
        <label for="courseSelection" class="course">Teacher Name: </label>

        <select id="courseSelection" name="teacher" class="course-sel">
    <option value="">Select Teacher</option>
    
    <?php
    $select_query = "SELECT * FROM `teachers`";
    $res = mysqli_query($conn, $select_query);

    if ($res) {
        if (mysqli_num_rows($res) > 0) {
            while ($row_data = mysqli_fetch_assoc($res)) {
                $teacher_name = $row_data['name'];
                $teacher_id = $row_data['teacher_id'];
                echo "<option value='$teacher_id'>$teacher_name</option>";
            }
        } else {
            echo "<option value=''>No teachers found</option>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    ?>
</select>



        <br>



        <label for='subjects' class='select'>Select Subjects : </label>
        <form action="" method="post">

            <?php

            $sql = "SELECT subject_id, name FROM subjects";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $subjects = array();
                while ($row = $result->fetch_assoc()) {
                    $subject_id = $row["subject_id"];
                    $name = $row["name"];
                    $subjects[] = array("subject_id" => $subject_id, "name" => $name);
                }

                foreach ($subjects as $subject) {
                    $subject_id = $subject["subject_id"];
                    $name = $subject["name"];
                    echo "<input type='checkbox' name='Sub[]' value='$subject_id' class='check'> $name<br>";
                }
            } else {
                echo "0 results";
            }

            // $conn->close();
            ?>


            <form method="post" action="">
                <input type="text" name="sub_id" class="sub_input">
                <input type="text" name="sub_id" class="sub_input">
            </form>
        <input type="submit" class="allocate" value="Allocate" name="submit_allocation">

        
        </form>
    </div>



</body>
</html>



<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector('.allocate').addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.check:checked');
        var subInput = document.querySelector('.sub_input');
        var teachInput = document.querySelector('.tecah_input');

        var selectedSubjects = [];
        checkboxes.forEach(function(checkbox) {
            selectedSubjects.push(checkbox.value);
        });

        subInput.value = selectedSubjects.join(', ');

        var teacherSelect = document.getElementById('courseSelection'); // Corrected id here
        var selectedTeacher = teacherSelect.options[teacherSelect.selectedIndex].value;
        teachInput.value = selectedTeacher;
    });
});
</script>

