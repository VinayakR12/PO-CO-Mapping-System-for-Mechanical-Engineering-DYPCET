<?php
include "conn.php";

if (isset($_POST['year'])) {
    $selectedYear = $_POST['year'];

    // if (isset($_POST['add_admin'])) {
    //     $teacherId = $_POST['teacher_id'];
    //     $updateQuery = "UPDATE `teachers` SET `isadmin` = 1 WHERE `teacher_id` = $teacherId";
    //     $result = mysqli_query($conn, $updateQuery);
    //     if ($result) {
    //         echo "<script>alert('Admin privileges added successfully!');</script>";
    //     } else {
    //         echo "<script>alert('Failed to add admin privileges!');</script>";
    //     }
    //     exit;
    // }

    // if (isset($_POST['remove_admin']) && isset($_POST['teacher_id'])) {
    //     $teacherId = $_POST['teacher_id'];
    //     $updateQuery = "UPDATE `teachers` SET `isadmin` = 0 WHERE `teacher_id` = $teacherId";
    //     $result = mysqli_query($conn, $updateQuery);
    //     if ($result) {
    //         echo "<script>alert('Admin privileges removed successfully!');</script>";
    //     } else {
    //         echo "<script>alert('Failed to remove admin privileges!');</script>";
    //     }
    //     exit;
    // }

    $getAllocationQuery = "SELECT * FROM `allocation` WHERE `year` = '$selectedYear'";
    $resGetAllocation = mysqli_query($conn, $getAllocationQuery);

    if (!$resGetAllocation) {
        die("Query failed: " . mysqli_error($conn));
    }

    echo "<table class='table'>";
    echo "<tr>";
    echo "<th>Sr. no</th>";
    echo "<th>Faculty</th>";
    echo "<th>Allocated subjects</th>";
    echo "<th>Semester</th>";
    // echo "<th>Authority</th>";
    echo "</tr>";

    $srNo = 1;

    while ($rowDetails = mysqli_fetch_assoc($resGetAllocation)) {

        $teacherId = $rowDetails['teacher_id'];
        $subjectIds = $rowDetails['subject_id'];
        $sem = $rowDetails['phase'];

        $getFacultyNameQuery = "SELECT `name`, `isadmin` FROM `teachers` WHERE teacher_id='$teacherId'";
        $resFacultyName = mysqli_query($conn, $getFacultyNameQuery);
        $facultyData = mysqli_fetch_assoc($resFacultyName);
        $nameOfFaculty = $facultyData['name'];
        $isAdmin = $facultyData['isadmin'];

        $subjectIdArray = explode(",", $subjectIds);
        $allocatedSubjects = "";
        foreach ($subjectIdArray as $subjectId) {
            $selectSubjectsQuery = "SELECT `name` FROM `subjects` WHERE subject_id='$subjectId'";
            $resSubId = mysqli_query($conn, $selectSubjectsQuery);
            while ($subData = mysqli_fetch_assoc($resSubId)) {
                $subName = $subData['name'];
                $allocatedSubjects .= $subName . ", ";
            }
        }
        $allocatedSubjects = rtrim($allocatedSubjects, ", ");

        echo "<tr>";
        echo "<td>" . $srNo . "</td>";
        echo "<td>" . $nameOfFaculty . "</td>";
        echo "<td>" . $allocatedSubjects . "</td>";
        echo "<td>" . $sem . "</td>";
        // echo "<td>";
        // if ($isAdmin == 1) {
        //     echo "<form method='post'>";
        //         echo "<input type='hidden' name='teacher_id' value='$teacherId'>";
        //         echo "<button type='submit' name='remove_admin' class='btn btn-danger'>Remove Admin</button>";
        //     echo "</form>";
        // } else {
        //     echo "<form method='post'>";
        //         echo "<input type='hidden' name='teacher_id' value='$teacherId'>";
        //         echo "<button type='submit' name='add_admin' class='btn btn-primary'>Add Admin</button>";
        //     echo "</form>";
        // }
        // echo "</td>";
        echo "</tr>";

        $srNo++;
    }

    echo "</table>";

    mysqli_close($conn);
} else {
    echo "Year not selected.";
}
?>
    