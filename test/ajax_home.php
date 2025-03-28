<?php
session_start(); 
include "conn.php";

if (!isset($_SESSION['username'])) {
    header('location: index.php');
}

$email = $_SESSION['username'];
$name = $_SESSION['name'];
$teacher_id = $_SESSION['teacher_id'];
$is_admin = $_SESSION['isadmin'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&family=Young+Serif&display=swap" rel="stylesheet">
    
<style>
    
    *
  {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
  }
  .direct{
      margin: 10px;
  }
  
  .rec1{
      color: #095899;
      display: flex;
      margin: 40px auto;
      width: 497px;
      height: 40px;
      background-color: #E5F2FC;
      border-radius: 5px;
      border: 0.5px solid #BEB4B4;
      justify-content: center;
      align-items: center;
  }
  
  .term{
      background-color:#E5F2FC ;
  }
  
  h2
  {
      display: flex;
      justify-content: center;
  }
  table,tr,td,th{
      margin: 20px auto;
      /* justify-content: center; */
      align-items: center;
      /* width: 50%; */
      border: 0.5px solid #BEB4B4;
      border-collapse: collapse;
     padding: 10px 20px;
  
  }
  
  th,tr,td{
      width: 315px;
       background-color: white; 
  }
  th{
      background-color: #E5F2FC;
      color: #095899;
  }
  
  
  
  
  .main  {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 66%;
  }
  .rec1 {
      margin-bottom: 20px; 
  }
  
  .sem {
      width: 200px;  
      font-size: 16px; 
      border: 1px solid #ccc; 
      border-radius: 5px; 
      background-color: #fff; 
      color: #333; 
  }
  
  .sem:focus {
      outline: none; 
      border-color: #007bff; 
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); 
  }
  
  a{
      text-decoration: none;
      color: black;
  }
  
  a:hover{
      text-decoration: underline;
  }
  </style>  
</head>

<body>

    <?php include "navbar.php"; ?>

    <div class="direct">
        <span>Courses</span> 
    </div>
    
    <center>
        <div class="main">
            <div class="rec1">
                <span class="term">Term</span>
                <div class="dropdown">
                    <!-- Dropdown for year (populate dynamically using PHP) -->
                    <select name="year" id="year" class="year">
                        <option value="">Select Year</option>
                        <?php
                        // Generate dynamic year options
                        $currentYear = date('Y');
                        for ($year = $currentYear; $year >= ($currentYear - 5); $year--) {
                            echo "<option value='$year'>$year</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>         
            <div class="rec1">
                <!-- Dropdown for semester (populate dynamically using PHP or predefined values) -->
                <select name="semester" id="semester" class="semester">
                <option value="">Select Semester</option>

                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                </select>
            </div>
        </div>
    </center>

    <h2>Courses</h2>

    <div id="courseTable">
    </div>

    <form id="courseForm">
    <label for="year">Year:</label>
    <input type="text" id="year" name="year" placeholder="Enter Year">
    <label for="semester">Semester:</label>
    <input type="text" id="semester" name="semester" placeholder="Enter Semester">
    <button type="submit">Get Courses</button>
</form>

<div id="courseList"></div>

<script>
document.getElementById('courseForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting
    
    var formData = new FormData(this); // Get form data
    
    // Send form data to PHP script using AJAX
    fetch('fetch_courses.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Display response in the courseList div
        document.getElementById('courseList').innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>
</body>
</html>
