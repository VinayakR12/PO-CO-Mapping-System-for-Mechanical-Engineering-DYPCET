<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allocated subjects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }



    table,
    tr,
    td,
    th {
        margin: 20px auto;
        align-items: center;
        border: 0.5px solid #BEB4B4;
        border-collapse: collapse;
        padding: 10px 20px;
        margin-top: 50px;
    }

    th,
    tr,
    td {
        width: 315px;
        background-color: white;
    }

    th {
        background-color: #E5F2FC;
        color: #095899;
        text-align: center;
    }

    td {
        text-align: center;
        cursor: pointer;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .popup button {
        position: absolute;
        top: 81px;
        left: 500px;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 16px;
        color: #095899;
    }

    .closeBtn {
        position: absolute;
        top: -36px;
        right: -19px;
        font-size: 30px;
        cursor: pointer;
        background: transparent;
        font-weight: bolder;
    }

    .closeBtn:hover {
        color: #ab350d;
    }

    .container{
        margin-top: 0%;
    }
</style>
</head>
<body>
    <?php include "../navbar.php"; ?>

    <div class="container">
        <h2>Select Year:</h2>
        <select id="yearSelection" class="form-select" aria-label="Default select example" style="margin-top: 80px;">
            <option value="">Select Year</option>
            <?php
            $current_year = date("Y");
            for ($year = $current_year; $year >= 2022; $year--) {

                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select>
        <div id="allocationTable"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#yearSelection').change(function() {
                var selectedYear = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'fetch_allocations.php',
                    data: {
                        year: selectedYear
                    },
                    success: function(response) {
                        $('#allocationTable').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
