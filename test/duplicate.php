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

</head>
<style>
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

  #popup-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    font-family: 'Poppins', sans-serif;
  }

  #popup {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    width: 650px;
    height: 200px;
    font-family: 'Poppins', sans-serif;
  }

  /* Table Styles */
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

  button:hover {
    background-color: #333;
  }

  button.success {
    background-color: #2ecc71;
    color: #fff;
  }

  button.success:hover {
    background-color: #27ae60;
  }

  /* Close Button Styles */
  .close-btn {
    cursor: pointer;
    position: absolute;
    top: 205px;
    right: 393px;
    font-size: 30px;
    font-weight: bold;
  }

  .close-btn:hover {
    color: #ab350d;

  }
</style>

<body>
  <?php

  include "navbar.php";
  ?>


  <?php
  include "conn.php";

  if (isset($_GET['course_id'])) {
    $co_subject_id = mysqli_real_escape_string($conn, $_GET['course_id']);

    $count_query = "SELECT  * FROM subjects WHERE subject_id = '$co_subject_id'";
    $result = mysqli_query($conn, $count_query);

    if ($result) {
      $sub_data = mysqli_fetch_assoc($result);
      $sub_name = $sub_data['name'];
      // $co_count = $sub_data['co_count'];

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
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">1.1.1: Apply mathematical techniques</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">1.1.2: Apply advanced mathematical techniques</a>
      
  </div>
    <div class="pso-comp">
      <p onclick="openPopup()" style="cursor: pointer;">Design and develop components as per functional requirements with specifications.</p>
    </div>
  </div>

  <!-- <div id="popup-container">
    <div id="popup">
      <span class="close-btn" onclick="closePopup()">&times;</span>
      <h4>PROGRAM INDICATOR 1.1.1</h4>
      <table>
        <thead>
          <tr>
            <th>
              <center>CO1</center>
            </th>
            <th>
              <center>CO2</center>
            </th>
            <th>
              <center>CO3</center>
            </th>
            <th>
              <center>CO4</center>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <td>
              <center>
                <select>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </center>
            </td>
            <td>
              <center>
                <select>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </center>
            </td>
            <td>
              <center>
                <select>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </center>
            </td>
            <td>
              <center>
                <select>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </center>
            </td>

          </tr>

        </tbody>
      </table>
      <center><button type="button" onclick="submitForm()">SUBMIT</button></center>
    </div>
  </div> -->

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
          include "conn.php";

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
                        <select>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
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

          mysqli_close($conn);
          ?>

          <?php

          if ($total_count > 0) {
            echo "<div class='modal-footer'>
  <button type='button' class='btn btn-secondary' data-dismiss='modal'>
    Close
  </button>
  <button type='button' class='btn btn-success' data-dismiss='modal'>
    Submit
  </button>
</div>";
          }
          ?>

        </div>
      </div>
    </div>


</body>

</html>