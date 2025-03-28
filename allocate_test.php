
<?php
if (isset($_POST['final-allocate'])) {
    $subject_ids_string = $_POST['sub_id'];
    $teacher_id = $_POST['teach_input'];
    $semester = $_POST['sem_input'];
    $current_year = date("Y");

    if (empty($subject_ids_string) || empty($teacher_id) || empty($semester)) {
        echo '<script>alert("Select All Attributes!");</script>';
    } else {
        // Convert the comma-separated string of subject IDs into an array
        $subject_ids_array = explode(',', $subject_ids_string);

        $is_subject_allocated = false;

        foreach ($subject_ids_array as $subject_id) {
            $check_query = "SELECT * FROM `allocation` WHERE `teacher_id` = '$teacher_id' AND `subject_id` = '$subject_id' AND `year` = '$current_year'";
            $check_result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                // Subject is already allocated for the given teacher in the current year
                $is_subject_allocated = true;
                break;
            }
        }

        if ($is_subject_allocated) {
            echo '<script>alert("Allocation for the current year already exists for this teacher!");</script>';
        } else {
            // Proceed with inserting the allocation since the subject is not already allocated for this teacher in the current year
            $insert_query_into_allocation = "INSERT INTO `allocation`(`subject_id`, `teacher_id`, `year`, `phase`) VALUES ('$subject_id','$teacher_id','$current_year','$semester')";
            $res_allocation_query = mysqli_query($conn, $insert_query_into_allocation);

            if ($res_allocation_query) {
                echo '<script>alert("Subject Allocated successfully!");</script>';
            } else {
                echo '<script>alert("Failed to Allocate Subject!");</script>';
            }
        }
    }
}
?>