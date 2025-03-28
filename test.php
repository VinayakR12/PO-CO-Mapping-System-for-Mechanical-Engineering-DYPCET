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

</head>
<style>
    *
{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
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

    <!-- Popup Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Your Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="inputName" placeholder="Enter your name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
     
      <div class="pos">
        Program Outcomes
        <div class="po-btn">
        <button class="pos-btn"><a href="POs1.php">PO 1: Engineering knowledge</a></button><br> 
        <button class="pos-btn"><a href="POs2.php">PO 2: Problem analysis</a></button><br> 
        <button class="pos-btn"><a href="POs3.php">PO 3: Design/development of solutions</a></button> <br>
        <button class="pos-btn"><a href="POs4.php">PO 4: Conduct investigations of complex problems</a></button> <br>
        <button class="pos-btn"><a href="POs.html">PO 5: Modern tool usage</a></button> <br>
        <button class="pos-btn"><a href="POs.html">PO 6: The engineer and society</a></button> <br>
        <button class="pos-btn"><a href="POs.html">PO 7: Environment and sustainability</a></button> <br>
        <button class="pos-btn"><a href="POs.html">PO 8: Ethics</a></button> <br>
        <button class="pos-btn"><a href="POs.html">PO 9: Individual and team work</a></button> <br>
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
   
    <button class="btn btn-success matrix-btn" onclick="window.location.href='mapping.php'" >View Matrix</button>
 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>