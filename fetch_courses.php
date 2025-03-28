<?php
include "conn.php"; // Include your database connection file

// Check if teacher_id is set in the URL parameter
if (isset($_GET['teacher_id'])) {
    $teacher_id = $_GET['teacher_id'];

    // Retrieve teacher's allocated subjects for the specified teacher_id
    $get_teacher_sub = "SELECT `id`, `subject_id` FROM `allocation` WHERE teacher_id = $teacher_id";
    $res_get_teacher_sub = mysqli_query($conn, $get_teacher_sub);

    if ($res_get_teacher_sub) {
        // Display the fetched courses in an HTML table
        echo "<table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Sessions</th>
                </tr>";

        while ($row_details = mysqli_fetch_assoc($res_get_teacher_sub)) {
            $subject_ids = explode(',', $row_details['subject_id']);

            foreach ($subject_ids as $subject_id) {
                $select_allocated_subject = "SELECT `name`, `code`, `sessions` FROM `subjects` WHERE subject_id = $subject_id";
                $res_select_allocated_subject = mysqli_query($conn, $select_allocated_subject);

                if ($res_select_allocated_subject) {
                    while ($row_sub = mysqli_fetch_assoc($res_select_allocated_subject)) {
                        echo "<tr>
                                <td>{$row_sub['code']}</td>
                                <td>{$row_sub['name']}</td>
                                <td>{$row_sub['sessions']}</td>
                            </tr>";
                    }
                } else {
                    echo "Error executing query: " . mysqli_error($conn);
                }
            }
        }

        echo "</table>";
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
} else {
    echo "Teacher ID not provided in the URL.";
}

// Close database connection
mysqli_close($conn);
?>
