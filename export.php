<?php
include "conn.php";

if(isset($_POST['export_excel'])){
    $course_id = $_POST['course_id'];
    $year = $_POST['year'];

    $select_query = "SELECT `id`, `PO1`, `PO2`, `PO3`, `PO4`, `PO5`, `PO6`, `PO7`, `PO8`, `PO9`, `PO10`, `PO11`, `PO12`, `PSO1`, `PSO2`,  `co_id` FROM `mapping` WHERE `year` = $year AND `subject_id` = $course_id AND `co_id` BETWEEN 1 AND 6";
    $res = mysqli_query($conn, $select_query);

    $co_data = array(); 

    while($row = mysqli_fetch_assoc($res)){
        $co_data[$row['co_id']][] = $row;
    }

    if (empty($co_data)) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>CO ID</th>";
        echo "<th>PO1</th>";
        echo "<th>PO2</th>";
        echo "<th>PO3</th>";
        echo "<th>PO4</th>";
        echo "<th>PO5</th>";
        echo "<th>PO6</th>";
        echo "<th>PO7</th>";
        echo "<th>PO8</th>";
        echo "<th>PO9</th>";
        echo "<th>PO10</th>";
        echo "<th>PO11</th>";
        echo "<th>PO12</th>";
        echo "<th>PSO1</th>";
        echo "<th>PSO2</th>";
        echo "</tr>";
        for ($i = 1; $i <= 6; $i++) {
            echo "<tr>";
            echo "<td>CO$i</td>";
            for ($j = 1; $j <= 14; $j++) {
                echo "<td>N/A</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        $output = ''; 

        $output .= "<div id='table-container'>";
        $output .= "<table border='1'>";
        $output .= "<tr>";
        $output .= "<th></th>";

        foreach ($co_data[1][0] as $key => $value) { 
            if ($key !== 'id' && $key !== 'co_id') {
                $output .= "<th>$key</th>";
            }
        }
        $output .= "</tr>";

        for ($i = 1; $i <= 6; $i++) {
            if (isset($co_data[$i])) {
                foreach ($co_data[$i] as $co_row) {
                    $output .= "<tr>";
                    $output .= "<td>CO$i</td>";
                    foreach ($co_row as $key => $value) {
                        if ($key !== 'id' && $key !== 'co_id') {
                            $output .= "<td>$value</td>";
                        }
                    }
                    $output .= "</tr>";
                }
            }
        }

        $output .= "<tr>";
        $output .= "<td>Average</td>";

        $poSum = array_fill(1, 12, 0);
        $psoSum = array_fill(1, 2, 0);
        $poCount = array_fill(1, 12, 0);
        $psoCount = array_fill(1, 2, 0);

        for ($i = 1; $i <= 6; $i++) {
            if (isset($co_data[$i])) {
                foreach ($co_data[$i] as $co_row) {
                    foreach ($co_row as $key => $value) {
                        if (strpos($key, 'PO') !== false) {
                            $index = (int)substr($key, 2);
                            if ($value != 0) {
                                $poSum[$index] += $value;
                                $poCount[$index]++;
                            }
                        } elseif (strpos($key, 'PSO') !== false) {
                            $index = (int)substr($key, 3);
                            if ($value != 0) {
                                $psoSum[$index] += $value;
                                $psoCount[$index]++;
                            }
                        }
                    }
                }
            }
        }

        for ($i = 1; $i <= 12; $i++) {
            if ($poCount[$i] > 0) {
                $poAverage = round($poSum[$i] / $poCount[$i]);
            } else {
                $poAverage = 0;
            }
            $output .= "<td>$poAverage</td>";
        }

        for ($i = 1; $i <= 2; $i++) {
            if ($psoCount[$i] > 0) {
                $psoAverage = round($psoSum[$i] / $psoCount[$i]);
            } else {
                $psoAverage = 0;
            }
            $output .= "<td>$psoAverage</td>";
        }

        $output .= "</tr>";
        $output .= "</table>";
        $output .= "</div>";

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=download.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo $output;
    }
}
?>
