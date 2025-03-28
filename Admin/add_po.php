<?php
session_start();

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

    <h2>Add PO/PSO</h2>

    <div class="container">

<form class="course-form" id="pso_form" method="post">

    <label for="statement">Statement</label>
    <input type="text" id="statement" name="statement" required><br>

    <label for="subject">Select Subjects</label>
    <select name="subject" id="subject">

        <?php
        include "conn.php";

        $select_query = "SELECT * FROM `subjects`";
        $res = mysqli_query($conn, $select_query);

        if ($res) {
            if (mysqli_num_rows($res) > 0) {
                while ($row_data = mysqli_fetch_assoc($res)) {
                    $sub_name = $row_data['name'];
                    $sub_id = $row_data['subject_id'];
                    echo "<option value='$sub_id'>$sub_name</option>";
                }
            } else {
                echo "<option value=''>No Subjects found</option>";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>

    </select>

    <label for="type">Select Type</label>
    <select name="type" id="type">
        <option value="po">PO</option>
        <option value="pso">PSO</option>
    </select>
    <input type="submit" name="submit_po" class="btn btn-success" value="Add">
</form>



    </div>

</body>
</html>



<?php

if(isset($_POST['submit_po'])){
    $statement = $_POST['statement'];
    $sub_id = $_POST['subject'];
    $type = $_POST['type'];

    $insert_into_pso = "INSERT INTO `pos`(`statement`, `subject_id`, `type`) VALUES ('$statement','$sub_id','$type')";
    if ($conn->query($insert_into_pso) === TRUE) {
        echo "<script>alert('Added Successfully')</script>";
    } else {
        echo "Error: " . $insert_into_pso . "<br>" . $conn->error;
    }

    $conn->close();
}

?>
