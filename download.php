<?php
    include "conn.php";

    if(isset($_GET['format']) && isset($_GET['course_id']) && isset($_GET['year'])) {
        $format = $_GET['format'];
        $course_id = $_GET['course_id'];
        $year = $_GET['year'];

        $select_query = "SELECT `id`, `PO1`, `PO2`, `PO3`, `PO4`, `PO5`, `PO6`, `PO7`, `PO8`, `PO9`, `PO10`, `PO11`, `PO12`, `PSO1`, `PSO2`,  `co_id` FROM `mapping` WHERE `year` = $year AND `subject_id` = $course_id AND `co_id` BETWEEN 1 AND 6";
        $result = mysqli_query($conn, $select_query);

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        } else {
            $data = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            if($format == 'csv') {
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="data.csv"');

                $output = fopen('php://output', 'w');

                // Output the column headers
                fputcsv($output, array('CO ID', 'PO1', 'PO2', 'PO3', 'PO4', 'PO5', 'PO6', 'PO7', 'PO8', 'PO9', 'PO10', 'PO11', 'PO12', 'PSO1', 'PSO2'));

                // Output the data
                foreach ($data as $row) {
                    fputcsv($output, $row);
                }

                fclose($output);
            } elseif($format == 'excel') {
                // Logic for generating Excel file
                // You can use PHPExcel or another library for this
                // Example:
                // require_once 'PHPExcel/Classes/PHPExcel.php';
                // Create Excel file using PHPExcel library
            }
        }
    } else {
        echo "Invalid request.";
    }
?>
