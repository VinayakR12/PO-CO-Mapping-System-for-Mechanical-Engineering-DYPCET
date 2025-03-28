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
    <!-- <link rel="stylesheet" href="CSS/Courses.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->

</head>
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
<body>

    <?php
        include "navbar.php";
    ?>

    <div class="direct">
        <span>Courses</span> 
    </div>
    
<center>
    <div class="main">
        <div class="rec1">
            <span class="term">Term</span>
            <div class="dropdown">
    <!-- <label for="cars">Choose a car:</label> -->


            </div>
        </div>         
        <div class="rec1">
            <!-- <span class="term">Second</span> -->
            <select name="sem" id="sem" class="sem">
                <option value=" SY B Sem III">SY B Sem III</option>
                <option value="SY B Sem III">SY B Sem III</option>
                <option value="SY B Sem III">SY B Sem III</option>
                <option value="SY B Sem III">SY B Sem III</option>
            </select>
        </div>
    </div>
   
</center>

<h2>Courses</h2>

<?php

$get_teacher_sub = "SELECT `id`, `subject_id` FROM `allocation` WHERE teacher_id = $teacher_id;";
$res_get_teacher_sub = mysqli_query($conn, $get_teacher_sub);

$subjects = array(); 

while ($row_details = mysqli_fetch_assoc($res_get_teacher_sub)) {
    $subject_ids = explode(',', $row_details['subject_id']); 
    $all_id = $row_details['id'];
    
    foreach ($subject_ids as $subject_id) {
        
        $select_allocated_subject = "SELECT `name`, `code`, `sessions`, `subject_id` FROM `subjects` WHERE subject_id=$subject_id";
        $res_select_allocated_subject = mysqli_query($conn, $select_allocated_subject);
        
        while ($row_sub = mysqli_fetch_assoc($res_select_allocated_subject)) {
            $subject_name = $row_sub['name'];
            $subject_code = $row_sub['code'];
            $subject_sessions = $row_sub['sessions'];
            $course_id = $row_sub['subject_id'];
            
            $subjects[] = array(
                'code' => $subject_code,
                'name' => $subject_name,
                'sessions' => $subject_sessions,
                'course_id' => $course_id
            );
        }
    }
}

echo "<table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Courses</th>
        </tr>";

foreach ($subjects as $subject) {
    echo "<tr>
            <td>{$subject['code']}</td>
            <td><a href='Pos.php?course_id={$subject['course_id']}'>{$subject['name']}</a></td>
            <td>{$subject['sessions']}</td>
        </tr>";
}

echo "</table>";

?>





    
        
   <!-- <script src="rectangle7.js"></script>
   <script>
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
   </script> -->
</body>
</html>