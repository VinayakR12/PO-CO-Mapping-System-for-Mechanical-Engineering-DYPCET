<?php

// Assuming you have established a database connection earlier and stored it in $conn

if(isset($_POST['submit_allocation'])){
    // Check if the form for allocation submission is submitted

    $sub = $_POST['Sub'];
    $teacher = $_POST['teacher'];

    // Fetch teacher details
    $select_query_teach = "SELECT * FROM `teachers` WHERE name='$teacher'";
    $res_teach = mysqli_query($conn, $select_query_teach);

    if(mysqli_num_rows($res_teach) > 0) {
        // Fetch the first row as there should be only one teacher with the given name
        $row_data_teach = mysqli_fetch_assoc($res_teach);
        $teacher_id = $row_data_teach['teacher_id'];
    } else {
        echo "Teacher not found!";
        exit; // Stop further execution
    }

    foreach($sub as $subject_id){
        // Loop through each selected subject
        // Fetch subject details
        $select_query_sub = "SELECT * FROM `subjects` WHERE subject_id='$subject_id'";
        $res_sub = mysqli_query($conn, $select_query_sub);

        if(mysqli_num_rows($res_sub) > 0) {
            // Fetch the first row as there should be only one subject with the given ID
            $row_data_sub = mysqli_fetch_assoc($res_sub);
            $subject_name = $row_data_sub['name'];

            // Insert allocation
            $insert_allocation = "INSERT INTO `allocation`(`subject_id`, `teacher_id`) VALUES ('$subject_id','$teacher_id')";
            $allocation_res = mysqli_query($conn, $insert_allocation);

            if($allocation_res){
                echo '<script>alert("Subject Allocated successfully!");</script>';
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Subject not found!";
            exit; 
        }
    }
}



?>