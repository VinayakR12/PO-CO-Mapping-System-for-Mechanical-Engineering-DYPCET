<?php
session_start();
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    .direct {
        margin: 10px;
    }
    
    .term {
        background-color: #E5F2FC;
    }

    h2 {
        display: flex;
        justify-content: center;
    }

    table,tr,td,th {
        margin: 20px auto;
        align-items: center;
        border: 0.5px solid #BEB4B4;
        border-collapse: collapse;
        padding: 10px 20px;

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
    }

    .main form{
        display: flex;
    justify-content: center;
    align-items: center;
    width: 72%;
    }


    a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        text-decoration: underline;
    }

    .para{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .select_course{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .navbar{
        border-radius: 0;
    }

    .rect1{
        margin: 2px;
    }

    .direct{
        margin-top: 5%;
    }

    #new_course{
        position: relative;
        left: 129px;
    }
    
</style>
<body>

    <?php
    include "../navbar.php";
    ?>

    <div class="direct">
        <span>Listed Courses</span>
    </div>

   

    


    <h2>Listed Courses</h2>
       <a href="/prathamproject/Admin/add_course.php"type="button" class="btn btn-primary" id="new_course">New Course</a>
<tr>

           

            <table>
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Course Name</th>
                    <th>Sessions</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                <?php
            $servername = "localhost";
             $username = "root";
             $password = "";
             $database = "mech";
            
            //   Create connection
$connection = new mysqli($servername, $username, $password, $database);
// Check connection
if ($connection->connect_error) {
die("Connection failed: " . $connection->connect_error);
}
// read all row from database table
$sql = "SELECT * FROM subjects";
$result = $connection->query($sql);
if (!$result) {
die ("Invalid query" .  $connection->error); }
 //read data of each row
 while($row = $result ->fetch_assoc()){
echo"

<tr>
<td>$row[code]</td>
<td>$row[name]</td>
<td>$row[sessions]</td>
<td>
<a href=''class='btn btn-primary'>Edit</a>
<a href=''class='btn btn-danger'>Delete</a>
</td>

</tr>
   
";

}
?>
           
                </tbody>
             
             </table>
       
    
    





<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    
</script>
</body>
</html>