<?php

include "conn.php";

$output = '';

if(isset($_POST['get_excel'])){
    $year = $_POST['selected_year']; 

    $sql = "SELECT * FROM `average` WHERE year = $year";
    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res) > 0){
        $output .= '
        <table style="border-collapse: collapse;">
            <tr>
                <th style="border: 1px solid black;">Subjects</th>
                <th style="border: 1px solid black;">PO1</th>
                <th style="border: 1px solid black;">PO2</th>
                <th style="border: 1px solid black;">PO3</th>
                <th style="border: 1px solid black;">PO4</th>
                <th style="border: 1px solid black;">PO5</th>
                <th style="border: 1px solid black;">PO6</th>
                <th style="border: 1px solid black;">PO7</th>
                <th style="border: 1px solid black;">PO8</th>
                <th style="border: 1px solid black;">PO9</th>
                <th style="border: 1px solid black;">PO10</th>
                <th style="border: 1px solid black;">PO11</th>
                <th style="border: 1px solid black;">PO12</th>
                <th style="border: 1px solid     black;">PSO1</th>
                <th style="border: 1px solid black;">PSO2</th>
            </tr>';

        while($row = mysqli_fetch_assoc($res)){

            $sub_id = $row['subject_id'];
            $select_subjects_query = "SELECT * FROM `subjects` WHERE subject_id=$sub_id";
            $sub_res = mysqli_query($conn,$select_subjects_query);
            while($sub_row=mysqli_fetch_assoc($sub_res)){
                $output .= '<tr>
                <td style="border: 1px solid black;">'.$sub_row['name'].'</td>
                <td style="border: 1px solid black;">'.$row['PO1'].'</td>
                <td style="border: 1px solid black;">'.$row['PO2'].'</td>
                <td style="border: 1px solid black;">'.$row['PO3'].'</td>
                <td style="border: 1px solid black;">'.$row['PO4'].'</td>
                <td style="border: 1px solid black;">'.$row['PO5'].'</td>
                <td style="border: 1px solid black;">'.$row['PO6'].'</td>
                <td style="border: 1px solid black;">'.$row['PO7'].'</td>
                <td style="border: 1px solid black;">'.$row['PO8'].'</td>
                <td style="border: 1px solid black;">'.$row['PO9'].'</td>
                <td style="border: 1px solid black;">'.$row['PO10'].'</td>
                <td style="border: 1px solid black;">'.$row['PO11'].'</td>
                <td style="border: 1px solid black;">'.$row['PO12'].'</td>
                <td style="border: 1px solid black;">'.$row['PSO1'].'</td>
                <td style="border: 1px solid black;">'.$row['PSO2'].'</td>
            </tr>';
            }

            
        }

        $output .= '</table>';
        
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=download.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        
        echo $output;
        exit;
    }
}

?>
