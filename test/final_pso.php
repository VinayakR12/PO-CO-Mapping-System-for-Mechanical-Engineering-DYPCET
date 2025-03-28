<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PI-PSO1</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&family=Young+Serif&display=swap" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* CSS styles */
    * {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    .direct {
      margin-top: 5%;
    }

    .pso {
      margin: 30px;
      width: 50%;
      border: 0.5px solid #B4B4B4;
      height: 70px;
      border-radius: 5px;
      padding: 5px;
    }

    .pso p {
      margin: 15px 0px;
      text-align: center;
    }

    .pso-comp {
      margin: 20px 50px;
      width: 70%;
      border: 0.5px solid #B4B4B4;
      color: #095899;
      height: 50px;
      border-radius: 5px;
      padding: 5px;
      text-align: left;
      padding: 10px;
      font-weight: bold;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #163b8c;
      color: white;
    }

    button {
      padding: 8px 16px;
      background-color: #249242;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 20px;
    }

    button.success {
      background-color: #2ecc71;
      color: #fff;
    }
  </style>
</head>

<body>
  <?php
  include "../navbar.php";
  ?>

  <?php
  include "../conn.php";

  if (isset($_GET['course_id'])) {
    $co_subject_id = mysqli_real_escape_string($conn, $_GET['course_id']);

    $count_query = "SELECT  * FROM subjects WHERE subject_id = '$co_subject_id'";
    $result = mysqli_query($conn, $count_query);

    if ($result) {
      $sub_data = mysqli_fetch_assoc($result);
      $sub_name = $sub_data['name'];

      echo "<div class='direct'>
                <span>Courses</span> <span> >> </span>
                <span>$sub_name</span> >>
                <span>PSO 1</span>
              </div>";
    } else {
      echo "<script>alert('Error fetching data from the database.')</script>";
    }
  } else {
    echo "<script>alert('Subject ID not provided in the URL.')</script>";
  }
  ?>

  <div class="pso">
    <p>To design and manufacture the components and system as per requirement.</p>
  </div>

  <div>
    <div class="pso-comp">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">Design and develop components as per functional requirements with specifications.</a>
    </div>
    <div class="pso-comp">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">Identify and Select appropriate manufacturing facilities to convert design into functional parts and assemblies. </a>
    </div>
  </div>

  <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1Label">
                        Program Indicator 1.1.1
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php
                    include "../conn.php";

                    if (isset($_GET['course_id'])) {
                        $course_id = mysqli_real_escape_string($conn, $_GET['course_id']);

                        $count_query = "SELECT COUNT(*) AS total_count FROM co WHERE subject_id='$course_id'";
                        $count_result = mysqli_query($conn, $count_query);
                        $count_row = mysqli_fetch_assoc($count_result);
                        $total_count = $count_row['total_count'];

                        if ($total_count > 0) {
                            echo '<table>
                <thead>
                    <tr>';
                            for ($i = 1; $i <= $total_count; $i++) {
                                echo '<th><center>CO' . $i . '</center></th>';
                            }
                            echo '</tr>
                </thead>
                <tbody>
                    <tr>';
                            for ($i = 1; $i <= $total_count; $i++) {
                                echo '<td>
                    <center>
                        <select id="co_' . $i . '_select" onchange="updateHiddenInput(' . $i . ')">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <input type="hidden" id="co_' . $i . '_hidden" name="co_' . $i . '" value="1">
                    </center>
                </td>';
                            }
                            echo '</tr>
                </tbody>
            </table>';
                        } else {
                            echo "No CO found for the provided course ID. Please insert CO to map instead.";
                        }
                    } else {
                        echo "Course ID not provided in the URL.";
                    }

                    ?>


                    <?php

                    if ($total_count > 0) {
                        echo "<div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                <button type='button' class='btn btn-success' onclick='submitValues()' data-dismiss='modal'>Submit</button>
                            </div>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

  <form method="post">
    <div class="map">
      <!-- Input fields for mapping data -->
      <?php
      if (isset($_GET['course_id'])) {
        $course_id = mysqli_real_escape_string($conn, $_GET['course_id']);
        $count_query = "SELECT COUNT(*) AS total_count FROM co WHERE subject_id='$course_id'";
        $count_result = mysqli_query($conn, $count_query);
        $count_row = mysqli_fetch_assoc($count_result);
        $total_count = $count_row['total_count'];

        for ($i = 1; $i <= $total_count; $i++) {
          $input_id = "input_$i";
          echo "<input type='text' id='$input_id' name='$input_id' class='input_1' value='0'><br>";
        }
      }
      ?>
      <input type="submit" name="map_data" value="Map Data" class="btn btn-success">
    </div>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // JavaScript code
    function submitValues() {
      var total_count = <?php echo $total_count; ?>;
      for (var i = 1; i <= total_count; i++) {
        var selectValue = parseInt(document.getElementById("co_" + i + "_select").value);
        var inputValue = parseInt(document.getElementById("input_" + i).value);
        document.getElementById("input_" + i).value = inputValue + selectValue;
      }
    }
  </script>

  <?php
  if (isset($_POST['map_data'])) {
    $year = date("Y");
    for ($i = 1; $i <= $total_count; $i++) {
      $input_id = "input_$i";

      if (!empty($_POST[$input_id])) {
        $input_value = round($_POST[$input_id] * 3 / 5);
      } else {
        $input_value = "";
      }

      $co_id = preg_replace("/[^0-9]/", "", $input_id);

      $check_query = "SELECT * FROM mapping WHERE co_id = ? AND year = ? AND subject_id = ?";
      $check_stmt = mysqli_prepare($conn, $check_query);
      mysqli_stmt_bind_param($check_stmt, "iis", $co_id, $year, $course_id);
      mysqli_stmt_execute($check_stmt);
      $check_result = mysqli_stmt_get_result($check_stmt);

      if ($check_result && mysqli_num_rows($check_result) > 0) {

        $update_query = "UPDATE mapping SET PSO1 = ? WHERE co_id = ? AND year = ? AND subject_id = ?";
        $update_stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($update_stmt, "iiis", $input_value, $co_id, $year, $course_id);
        mysqli_stmt_execute($update_stmt);

        if (mysqli_stmt_affected_rows($update_stmt) > 0) {
          echo "<script>alert('Mapped Successfully')</script>";
        }
      } else {

        $insert_query = "INSERT INTO mapping (PSO1, co_id, year, subject_id) VALUES (?, ?, ?, ?)";
        $insert_stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, "iiis", $input_value, $co_id, $year, $course_id);
        mysqli_stmt_execute($insert_stmt);

        if (mysqli_stmt_affected_rows($insert_stmt) > 0) {
          echo "<script>alert('Mapped Successfully')</script>";
        }
      }
    }
  }
  ?>
</body>

</html>
