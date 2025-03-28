<?php
    session_start();
    // include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allocated subjects</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&family=Young+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    body {
        margin-top: 5%
    }

    table,
    tr,
    td,
    th {
        margin: 20px auto;
        align-items: center;
        border: 0.5px solid #BEB4B4;
        border-collapse: collapse;
        padding: 10px 20px;
        margin-top: 50px;
    }

    th,
    tr,
    td {
        width: 315px;
        background-color: white;
    }

    th {
        background-color: #E5F2FC;
        color: #095899;
        text-align: center;
    }

    td {
        text-align: center;
        cursor: pointer;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .popup button {
        position: absolute;
        top: 81px;
        left: 500px;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 16px;
        color: #095899;
    }

    .closeBtn {
        position: absolute;
        top: -36px;
        right: -19px;
        font-size: 30px;
        cursor: pointer;
        background: transparent;
        font-weight: bolder;
    }

    .closeBtn:hover {
        color: #ab350d;
    }
</style>

<body>

<?php
    include "../navbar.php";
?>

<?php
    include "../conn.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_admin"])) {
            $teacher_id = $_POST["teacher_id"];
            $update_query = "UPDATE `teachers` SET `isadmin` = 1 WHERE teacher_id = $teacher_id";
            $result = mysqli_query($conn, $update_query);
            if (!$result) {
                die("Update failed: " . mysqli_error($conn));
            } else {
                echo "<script>alert('Teacher is now an admin.');</script>";
            }
        } elseif (isset($_POST["remove_admin"])) {
            $teacher_id = $_POST["teacher_id"];
            $update_query = "UPDATE `teachers` SET `isadmin` = 0 WHERE teacher_id = $teacher_id";
            $result = mysqli_query($conn, $update_query);
            if (!$result) {
                die("Update failed: " . mysqli_error($conn));
            } else {
                echo "<script>alert('Admin privileges removed.');</script>";
            }
        }
    }

    $get_teacher_sub = "SELECT * FROM `allocation`";
    $res_get_teacher_sub = mysqli_query($conn, $get_teacher_sub);

    if (!$res_get_teacher_sub) {
        die("Query failed: " . mysqli_error($conn));
    }

    echo "<table>";
    echo "<tr>";
    echo "<th>Sr. no</th>";
    echo "<th>Faculty</th>";
    echo "<th>Allocated subjects</th>";
    echo "<th>Authority</th>";
    echo "</tr>";

    $sr_no = 1;

    while ($row_details = mysqli_fetch_assoc($res_get_teacher_sub)) {
        $subject_ids = $row_details['subject_id'];
        $all_id = $row_details['id'];

        $get_faculty_name = "SELECT `name`, `email`, `password`, `isadmin`, `code`, `teacher_id` FROM `teachers` WHERE teacher_id=$all_id";
        $res_faculty_name = mysqli_query($conn, $get_faculty_name);

        if (!$res_faculty_name) {
            die("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($res_faculty_name) > 0) {
            $faculty_data = mysqli_fetch_assoc($res_faculty_name);
            $name_of_faculty = $faculty_data['name'];
            $is_admin = $faculty_data['isadmin'];
            $teacher_id = $faculty_data['teacher_id'];
        } else {
            $name_of_faculty = "N/A";
        }

        $subject_id_array = explode(",", $subject_ids);
        $allocated_subjects = "";

        foreach ($subject_id_array as $subject_id) {
            $select_subjects_query = "SELECT `subject_id`, `name`, `code`, `sessions` FROM `subjects` WHERE subject_id='$subject_id'";
            $res_sub_id = mysqli_query($conn, $select_subjects_query);

            if (!$res_sub_id) {
                die("Query failed: " . mysqli_error($conn));
            }

            while ($sub_data = mysqli_fetch_assoc($res_sub_id)) {
                $sub_name = $sub_data['name'];
                $allocated_subjects .= $sub_name . ", ";
            }
        }

        $allocated_subjects = rtrim($allocated_subjects, ", ");

        echo "<tr>";
        echo "<td>" . $sr_no . "</td>";
        echo "<td>" . $name_of_faculty . "</td>";
        echo "<td>" . $allocated_subjects . "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='teacher_id' value='$teacher_id'>";
        if ($is_admin == 1) {
            echo "<button type='submit' name='remove_admin' class='btn btn-danger'>Remove Admin</button>";
        } else {
            echo "<button type='submit' name='add_admin' class='btn btn-primary'>Add Admin</button>";
        }
        echo "</form>";
        echo "</td>";
        echo "</tr>";

        $sr_no++;
    }

    echo "</table>";

    mysqli_close($conn);
?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>