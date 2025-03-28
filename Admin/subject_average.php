<?php
session_start();
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CO-PO MAPPING</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&family=Young+Serif&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    h2 {
        display: flex;
        justify-content: center;
        margin-top: 2%;
    }

    table,
    tr,
    td,
    th {
        margin: 20px auto;
        border: 0.5px solid #BEB4B4;
        border-collapse: collapse;
        padding: 10px 15px;
        text-align: center;
    }

    th,
    tr,
    td {
        width: 90px;
        background-color: white;
    }

    th {
        background-color: #E5F2FC;
        color: #095899;
    }

    .rec1 {
        margin-top: 5%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .print-btn {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h6 {
        display: flex;
        justify-content: center;
        align-items: center;
        color: red;
    }
</style>

<body>

    <?php
    include "../navbar.php";
    ?>
    <div class="rec1">
        <div class="dropdown">
            <form method="POST">
                <label for="yearSelection" required>Select Year</label>
                <select id="yearSelection" class="form-select" name="year" aria-label="Default select example">
                    <option value="">Select Year</option>
                    <?php
                    $current_year = date("Y");
                    for ($year = $current_year; $year >= 2022; $year--) {
                        echo "<option value='$year'>$year</option>";
                    }
                    ?>
                </select>
                <input type="submit" class="btn btn-primary" value="Submit" name="get_avg">
            </form>
        </div>
    </div>

    <h2>Average</h2>

    <?php
    if (isset($_POST['get_avg'])) {
        $year = $_POST['year'];
        $get_query = "SELECT * FROM `average` WHERE year = $year";
        $res_query = mysqli_query($conn, $get_query);
        if (mysqli_num_rows($res_query) > 0) {
            echo "
            <style>
            table,
            tr,
            td,
            th {
                margin: 20px auto;
                border: 0.5px solid #BEB4B4;
                border-collapse: collapse;
                padding: 10px 15px;
                text-align: center;
            }
        
            th,
            tr,
            td {
                width: 90px;
                background-color: white;
            }
        
            th {
                background-color: #E5F2FC;
                color: #095899;
            }
            </style>
            <div id='table-container'>
            <table>
            <tr>
                <th>Subjects</th>
                <th>PO1</th>
                <th>PO2</th>
                <th>PO3</th>
                <th>PO4</th>
                <th>PO5</th>
                <th>PO6</th>
                <th>PO7</th>
                <th>PO8</th>
                <th>PO9</th>
                <th>PO10</th>
                <th>PO11</th>
                <th>PO12</th>
                <th>PSO1</th>
                <th>PSO2</th>
            </tr>";

            while ($data = mysqli_fetch_assoc($res_query)) {
                $id = $data['id'];
                $PO1 = $data['PO1'];
                $PO2 = $data['PO2'];
                $PO3 = $data['PO3'];
                $PO4 = $data['PO4'];
                $PO5 = $data['PO5'];
                $PO6 = $data['PO6'];
                $PO7 = $data['PO7'];
                $PO8 = $data['PO8'];
                $PO9 = $data['PO9'];
                $PO10 = $data['PO10'];
                $PO11 = $data['PO11'];
                $PO12 = $data['PO12'];
                $PSO1 = $data['PSO1'];
                $PSO2 = $data['PSO2'];
                $subject_id = $data['subject_id'];

                $get_subject = "SELECT * FROM `subjects` WHERE subject_id = $subject_id";
                $res_subjects = mysqli_query($conn, $get_subject);

                while ($sub_data = mysqli_fetch_assoc($res_subjects)) {
                    $subject_name = $sub_data['name'];

                    echo "
                    <tr>
                        <td>$subject_name</td>
                        <td>$PO1</td>
                        <td>$PO2</td>
                        <td>$PO3</td>
                        <td>$PO4</td>
                        <td>$PO5</td>
                        <td>$PO6</td>
                        <td>$PO7</td>
                        <td>$PO8</td>
                        <td>$PO9</td>
                        <td>$PO10</td>
                        <td>$PO11</td>
                        <td>$PO12</td>
                        <td>$PSO1</td>
                        <td>$PSO2</td>
                    </tr>";
                }
            }

            echo "</table></div>";

            echo "<div class='print-btn' >";
                echo "<button class='btn btn-success m-1' onclick='printTable()'>Export as PDF</button>";

                echo "<form action='export.php' method='post'>";
                    echo "<input type='hidden' name='selected_year' value='$year'>";
                    echo "<input type='submit' class='btn btn-success m-1' value='Export as Excel' name='get_excel'>";
                echo "</form>";
            echo "</div>";

        } else {
            echo "<h6>No record Found</h6>";
            // echo $year;

        }
        mysqli_close($conn);
    }
?>
<script>
    function printTable() {
        var printContents = document.getElementById('table-container').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>