<?php

  session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>POs</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&family=Young+Serif&display=swap" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
  }

  .direct {
    margin-top:5%;
  }

  .po {
    display: flex;
    margin: 15px;
    background-color: #ffffff;
    width: 1475px;
    height: 68px;
    border: 0.5px solid #b4b4b4;
    border-radius: 5px;
    padding: 5px 15px;
  }

  h3 {
    margin: 15px;
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
    font-family: "Poppins", sans-serif;
  }

  #popup {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    width: 650px;
    height: 200px;
    font-family: "Poppins", sans-serif;
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

  button:hover {
    background-color: #163b8c;
    color: #fff;
  }

  button.success {
    background-color: #2ecc71;
    color: #fff;
  }

  button.success:hover {
    background-color: #27ae60;
  }

  #popup-container {
    display: none;
  }

  /* Dropdown Css */

  .dropdown-content {
    width: 75vw;
  }

  .dropdown-menu {
    min-width: 0vw;
  }

  .dropdown-menu a {
    display: block;
    padding: 5px;
    text-decoration: none;
    width: 95vw;
    color: #333;
  }

  .btn-secondary.dropdown-toggle {
    width: 50vw;
  }

  .dropdown button {
    padding: 10px;
    background-color: #ffffff;
    color: #095899;
    border: 0.5px solid #b4b4b4;
    border-radius: 5px;
    width: 75vw;
    text-align: left;
    cursor: pointer;
  }

  .dropdown button:hover {
    background-color: #095899;
  }

  .dropdown-content a:hover {
    background-color: #f1f1f1;
  }

  .dropdown button:hover,
  .dropdown button:focus {
    background-color: #095899;
    color: white;
  }

  .btn-secondary.dropdown-toggle {
    width: 75vw;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 250px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #f1f1f1;
  }

  .dropdown button:hover,
  .dropdown button:focus,
  .dropdown.show .btn-secondary.dropdown-toggle {
    background-color: #095899;
    color: white;
    border-color: #095899;
    outline: none;
    box-shadow: none;
  }

  .btn-secondary.dropdown-toggle {
    width: 95vw;
  }

  .cont {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  /* Model dialog */

  .modal-dialog {
    justify-content: center;
    display: flex;
    align-items: center;
    height: 80%;
  }
</style>

<body>
  <?php
  include "navbar.php";
  ?>
  <div class="direct">
    <span>Courses</span> <span> >> </span>
    <span>Computer Organization & Microprocessors-TH</span> >>
    <span>PO1: Engineering knowledge</span>
  </div>

  <div class="po">
    Apply the knowledge of mathematics, science, engineering fundamentals, and
    an engineering specialization to the solution of complex
  </div>

  <h3>Competancy :</h3>

  <div class="cont mt-5" sty>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        1.1: Demonstrate competence in mathematical modelling
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">1.1.1: Apply mathematical techniques</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">1.1.2: Apply advanced mathematical techniques</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        1.1: Demonstrate competence in mathematical modelling
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">1.1.1: Apply mathematical techniques</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">1.1.2: Apply advanced mathematical techniques</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        1.1: Demonstrate competence in mathematical modelling
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">1.1.1: Apply mathematical techniques</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">1.1.2: Apply advanced mathematical techniques</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        1.1: Demonstrate competence in mathematical modelling
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">1.1.1: Apply mathematical techniques</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">1.1.2: Apply advanced mathematical techniques</a>
      </div>
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
          include "conn.php";

          if (isset($_GET['course_id'])) {
            $course_id = mysqli_real_escape_string($conn, $_GET['course_id']);

            $count_query = "SELECT COUNT(*) AS total_count FROM co WHERE subject_id='$course_id'";
            $count_result = mysqli_query($conn, $count_query);
            $count_row = mysqli_fetch_assoc($count_result);
            $total_count = $count_row['total_count'];

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
            echo "Course ID not provided in the URL.";
          }

          mysqli_close($conn);
          ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-success" data-dismiss="modal">
            Submit
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>