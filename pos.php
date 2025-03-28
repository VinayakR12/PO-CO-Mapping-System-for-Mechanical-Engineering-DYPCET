

<?php
session_start();

include "conn.php";

if(isset($_POST['save_co'])){
    $co_statement = mysqli_real_escape_string($conn, $_POST['co_statement']);
    if(isset($_GET['course_id'])){
        $co_subject_id = $_GET['course_id'];
        $count_query = "SELECT COUNT(*) AS co_count FROM co WHERE subject_id = '$co_subject_id'";
        $result = mysqli_query($conn, $count_query);
        $row = mysqli_fetch_assoc($result);
        $co_count = $row['co_count'];

        if($co_count < 6) {
            $co_insert_query = "INSERT INTO `co`(`co_statement`, `subject_id`) VALUES ('$co_statement','$co_subject_id')";

            if(mysqli_query($conn, $co_insert_query)){
                echo "<script>alert('CO statement inserted successfully.')</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
            }
        } else {
            echo "<script>alert('Maximum 6 CO statements are allowed.')</script>";
        }
    } else {
        echo "<script>alert('Subject ID not provided in the URL.')</script>";
    }
}

if (isset($_POST['edit_co'])) {
    $co_statement = mysqli_real_escape_string($conn, $_POST['co_statement']);
    $co_id = $_POST['co_id']; 

    $update_query = "UPDATE co SET co_statement = '$co_statement' WHERE id = $co_id";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('CO statement updated successfully.')</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
    }
}

if (isset($_POST['delete_co'])) {
    $co_id = $_POST['co_id']; 

    $delete_query = "DELETE FROM co WHERE id = $co_id";

    if (mysqli_query($conn, $delete_query)) {
        echo "<script>alert('CO statement deleted successfully.')</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Po-Pso</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&family=Young+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <style>
    
  </style>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
}

.input-group {
      margin-bottom: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 95%;
      z-index: 1;
    }
   
   
.courses{
    margin-top: 70px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px;
}

.pos{
    background-color:#E5F2FC;
    width: 100%;
    margin: 10px;
    margin-bottom: 50px;
    border: 0.5px solid #B4B4B4;
    border-radius: 5px;
    padding: 5px;
    display: block;
}

.pos a{
    text-decoration: none;
    color: #095899;
}

.pso a{
    text-decoration: none;
    color: #095899;
}

.po-btn{
    display: block;
    background-color:#E5F2FC ;
    padding: 10px;
   
}
.pos-btn{
    width: 535px;
    margin: 5px 20px;
    border: 0.5px solid black;
    border-radius: 5px;
    padding: 5px;
    font-size: 15px;
    text-align: left;
    font-weight: bold;
}
.pso-btn{
    width: 900px;
    margin: 5px 20px;
    border: 0.5px solid black;
    border-radius: 5px;
    padding: 5px;
    font-size: 15px;
    text-align: left;
    font-weight: bold;
}

  .co{
    display: flex;
    margin: 10px;
    padding: 5px;
    display: block;
   
}
.co-btn-js{
    display: inline;
    width: 535px;
    margin: 5px 20px;
    padding: 5px;
   
}

.edit-co{
    padding: 5px;
}
.btn-success, .btn-danger{
    padding: 6px;
    width: 100px;
    margin: 2px
}
.input-pos{
    width: 1232px;
}

.nav-linka{   
    color: #fff;
}
#dropdown {
    display: none;
}


.modal-dialog {
        display: flex;
    justify-content: center;
    align-items: center;
    height: 80%;
    } 

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .modal.fade .modal-dialog {
      animation: fadeInUp .3s ease-out;
    }

    .btn-success{
        width: 150px;
    }
</style>
<body>
  
    <?php
        include "navbar.php";
    ?>
    
    <div class="courses">
        <div>
            <span>Courses</span> <span> >> </span> <span>Computer Organization & Microprocessors-TH</span>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add CO</button>
    </div>

    <?php

if(isset($_GET['course_id'])) {
    $subject_id = mysqli_real_escape_string($conn, $_GET['course_id']);

    $query = "SELECT * FROM co WHERE subject_id = '$subject_id'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='container'>
            <div class='input-group'>
              <input type='text' class='form-control' value='" . $row['co_statement'] . "' placeholder='Enter text here'>
              <div class='input-group-append'>
                <button class='btn btn-success' type='button'>Save Changes</button>
                <button class='btn btn-danger' type='button'>Delete</button>
              </div>
            </div>
          </div>";
        }
    } else {
        
        echo "No data found for the subject ID: $subject_id";
    }
} else {
    
    echo "Subject ID not provided in the URL.";
}
?>



    <!-- Popup Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter CO Statement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
            <input type="text" class="form-control" id="inputName" name="co_statement" placeholder="Enter CO Statement">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary"  value="Save CO Statement" name="save_co">
        </div>
      </form>
    </div>
  </div>
</div>

    
     
    <div class="pos">
        Program Outcomes
        <div class="po-btn">
        <button class="pos-btn"><a href="POs1.php?course_id=<?php echo $subject_id; ?>">PO 1: Engineering knowledge</a></button><br>
        <button class="pos-btn"><a href="POs1.php?course_id=<?php echo $subject_id; ?>">PO 2: Problem analysis</a></button><br> 
        <button class="pos-btn"><a href="POs1.php?course_id=<?php echo $subject_id; ?>">PO 3: Design/development of solutions</a></button> <br>
        <button class="pos-btn"><a href="POs1.php?course_id=<?php echo $subject_id; ?>">PO 4: Conduct investigations of complex problems</a></button> <br>
        <button class="pos-btn"><a href="POs1.php?course_id=<?php echo $subject_id; ?>">PO 5: Modern tool usage</a></button> <br>
        <button class="pos-btn"><a href="POs1.php?course_id=<?php echo $subject_id; ?>">PO 6: The engineer and society</a></button> <br>
        <button class="pos-btn"><a href="POs1.php?course_id=<?php echo $subject_id; ?>">PO 7: Environment and sustainability</a></button> <br>
        <button class="pos-btn"><a href="POs1.php?course_id=<?php echo $subject_id; ?>">PO 8: Ethics</a></button> <br>
        <button class="pos-btn"><a href="POs1.php?course_id=<?php echo $subject_id; ?>">PO 9: Individual and team work</a></button> <br>
        <button class="pos-btn"><a href="POs.html">PO 9: Individual and team work </a></button> <br>
        <button class="pos-btn"><a href="POs.html">PO 10: Communication</a></button> <br>
        <button class="pos-btn"><a href="POs.html">PO 11: Project management and finance</a></button> <br>
        <button class="pos-btn"><a href="POs.html">PO 12: Life-long learning</a></button> <br>
        <button class="pos-btn"><a href="POs.html">PO 12: Life-long learning</a></button> <br>
        </div>
        
    </div>
    

    <div class="pos">
        Program Specific Outcomes
        <div class="po-btn">
        <button class="pso-btn"><a href="pi-pso1.html">PSO1: To design and manufacture the components and system as per requirement</a></button><br> 
        <button class="pso-btn"><a href="pi-pso2.html">PSO 2: To apply his knowledge in thermal science and management practice as a professional or entrepreneur.</a></button><br> 
        
        </div>
        

    </div>
   
    <button class="btn btn-primary matrix-btn" onclick="window.location.href='mapping.php'">View Matrix</button>
 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>




