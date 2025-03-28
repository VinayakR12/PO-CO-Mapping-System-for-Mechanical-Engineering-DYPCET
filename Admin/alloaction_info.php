<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allocated subjects</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&family=Young+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<style>
    * {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    
}

table, tr, td, th {
    margin: 20px auto;
    align-items: center;
    border: 0.5px solid #BEB4B4;
    border-collapse: collapse;
    padding: 10px 20px;
    margin-top: 50px;
}

th, tr, td {
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

  .closeBtn:hover{
    color: #ab350d;
}
</style>
<body>
    
    <?php
        include "../navbar.php";
    ?>

    <table>
        
        <tr>
            <th>Sr. no</th>
            <th>Faculty</th>
            <th >Allocated subjects</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Faculty name</td>
            <td onclick="showPopup('Subject 1', 'Faculty 1')">Subjects</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Faculty name</td>
            <td onclick="showPopup('Subject 2', 'Faculty 2')">Subjects</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Faculty name</td>
            <td onclick="showPopup('Subject 3', 'Faculty 3')">Subjects</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Faculty name</td>
            <td onclick="showPopup('Subject 4', 'Faculty 4')">Subjects</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Faculty name</td>
            <td onclick="showPopup('Subject 4', 'Faculty 4')">Subjects</td>
        </tr>
        
        <!-- Add more rows as needed -->
        <!-- <button class="back-btn"  onclick="hidePopup()"></button> -->
    </table>
    <!-- <button class="btn btn-success add-admin-btn">Add as admin</button> -->
    
    <div id="subjectPopup" class="popup"> 
        
    </div>

    <script>
       function showPopup(subject, faculty) {
    const popup = document.getElementById('subjectPopup');
    
    popup.innerHTML = `

    
    <center><h2 style="margin-bottom: 10px; font-size:20px; font-weight: bold;">Allocated Subject</h2></center>
        <h3 style="margin-bottom: 10px; font-size:20px;">Faculty Name: ${faculty}</h3>
        
      
        <table>
            <tr>
                <th>Sr. No</th>
                <th>Course Name</th>
            </tr>
            <tr>
                <td>1</td>
                <td>${subject}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>${subject}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>${subject}</td>
            </tr>
            <tr>
                <td>4</td>
                <td>${subject}</td>
            </tr>
          
        </table>
        <span class="closeBtn" onclick="closePopup()">&times;</span>
        <button class="btn btn-success add-admin-btn">Add as admin</button> `;
    popup.style.display = 'block';
}

function hidePopup() {
    const popup = document.getElementById('subjectPopup');
    popup.style.display = 'none';
}

function closePopup() {
document.getElementById('subjectPopup').style.display = 'none';
}

    </script>

</body>
</html>
