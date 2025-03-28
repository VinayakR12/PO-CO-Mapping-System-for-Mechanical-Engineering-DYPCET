<?php

include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_average'])) {
        
        $poAverages = array();
        $psoAverages = array();

        for ($i = 1; $i <= 12; $i++) {
            $poAverages[] = $_POST["po_average_$i"];
        }

        for ($i = 1; $i <= 2; $i++) {
            $psoAverages[] = $_POST["pso_average_$i"];
        }

        $subject_id = $_POST['subject_id'];
        $year = $_POST['year'];

        $check_query = "SELECT * FROM `average` WHERE `subject_id` = '$subject_id' AND `year` = '$year'";
        $check_result = mysqli_query($conn, $check_query);
        $num_rows = mysqli_num_rows($check_result);

        if ($num_rows > 0) {
            
            $update_query = "UPDATE `average` SET `PO1` = '{$poAverages[0]}', `PO2` = '{$poAverages[1]}', `PO3` = '{$poAverages[2]}', `PO4` = '{$poAverages[3]}', `PO5` = '{$poAverages[4]}', `PO6` = '{$poAverages[5]}', `PO7` = '{$poAverages[6]}', `PO8` = '{$poAverages[7]}', `PO9` = '{$poAverages[8]}', `PO10` = '{$poAverages[9]}', `PO11` = '{$poAverages[10]}', `PO12` = '{$poAverages[11]}', `PSO1` = '{$psoAverages[0]}', `PSO2` = '{$psoAverages[1]}' WHERE `subject_id` = '$subject_id' AND `year` = '$year'";
            
            if (mysqli_query($conn, $update_query)) {
                echo "<script>alert('Averages updated successfully.');</script>";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            
            $insert_query = "INSERT INTO `average`(`PO1`, `PO2`, `PO3`, `PO4`, `PO5`, `PO6`, `PO7`, `PO8`, `PO9`, `PO10`, `PO11`, `PO12`, `PSO1`, `PSO2`, `subject_id`, `year`) 
                            VALUES ('" . implode("','", $poAverages) . "','" . implode("','", $psoAverages) . "','$subject_id','$year')";
            
            if (mysqli_query($conn, $insert_query)) {
                echo "<script>alert('Averages submitted successfully.');</script>";
            } else {
                echo "Error inserting record: " . mysqli_error($conn);
            }
        }
        
        header("Location: home.php");
        exit(); 
    }
} else {
    echo "Invalid request method.";
}

?>
