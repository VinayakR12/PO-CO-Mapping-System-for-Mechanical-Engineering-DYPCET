<?php
    session_start();
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
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    .direct {
        margin-top: 3%;
    }

    h2 {
        display: flex;
        justify-content: center;
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
        /* Adjusted width */
        background-color: white;
    }

    th {
        background-color: #E5F2FC;
        color: #095899;
    }
</style>

<body>
    <?php

    include "navbar.php";
    ?>

    <div class="direct">
        <span>CO-PO MAPPING</span>
    </div>

    <h2>CO-PO MAPPING</h2>

    <table>
        <tr>
            <th></th>
            <th>PO1</th>
            <th>PO2</th>
            <th>PO3</th>
            <th>PO4</th>
            <th>PO5</th>
            <th>PO5</th>
            <th>PO6</th>
            <th>PO7</th>
            <th>PO8</th>
            <th>PO9</th>
            <th>PO10</th>
            <th>PO11</th>
            <th>PSO1</th>
            <th>PSO2</th>
        </tr>

        <tr>
            <td>CO1</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>0.0</td>
        </tr>
        <tr>
            <td>CO2</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>0.0</td>
        </tr>
        <tr>
            <td>CO3</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>0.0</td>
        </tr>
        <tr>
            <td>CO4</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>0.0</td>
        </tr>
        <tr>
            <td>CO</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>1.0</td>
            <td>0.0</td>
            <td>0.0</td>
        </tr>


    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>