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
    *
{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    /* font-family: 'Young Serif', serif; */
    /* background: #F6F6F6; */
}
.direct{
    margin: 10px;
}
.pso{
    margin: 30px;
    width: 50%;
    border: 0.5px solid #B4B4B4;
    height: 70px;
    border-radius: 5px;
    padding: 5px;
}
    
.pso p{
     margin: 15px 0px; 
    text-align: center;
}
.pso-comp{
    margin: 20px 50px;
    width: 70%;
    border: 0.5px solid #B4B4B4;
    color: #095899;
    height: 20px;
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
      width: 650px; /* Set your desired width */
      height: 200px; /* Set your desired height */
      font-family: 'Poppins', sans-serif; 
    }

    /* Table Styles */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
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

  
.navbar {
    background-color: #095899;
    padding: 10px; 
    display: flex;
    align-items: center;
}

.eng_logo {
    border-radius: 5px;
    height: 56px;
    margin-right: 10px;
}

ul {
    list-style: none;
    margin: 0;
    padding: 0;
   
}

li {
    display: inline-block;
    margin-right: 20px; 

}

nav a {
   position: relative;
   left: 880px;
    background-color: #095899;
    text-decoration: none;
    color: white;
}
.profile{
  color: white;
  position: static;
    font-size: 37px;
    margin: 0px 15px ;
    margin-top: 6px;
}
 

.username {
  color: white;
    margin-left: auto;
    margin-right: 20px;

}
.settings{
  color: #80aaff;
  position: static;
  font-size: 37px;
  margin-top: 4px;
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
  <nav class="navbar">

    <img src="img/eng_logo.png" alt="" class="eng_logo">
   <ul> 
    <li> <a href="/Admin/coursedetails.html" > Add Course</a> </li>
    <li><a href="/Admin/course-detail.html" >Add Teachers</a> </li>  
    </ul>
    <span class="username" th:text{}>shubdha patil ma'am</span>
    <a href="" class="profile"><svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16 9C16 11.2091 14.2091 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5C14.2091 5 16 6.79086 16 9ZM14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 14.0902 3.71255 16.014 4.90798 17.5417C6.55245 15.3889 9.14627 14 12.0645 14C14.9448 14 17.5092 15.3531 19.1565 17.4583C20.313 15.9443 21 14.0524 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12ZM12 21C9.84977 21 7.87565 20.2459 6.32767 18.9878C7.59352 17.1812 9.69106 16 12.0645 16C14.4084 16 16.4833 17.1521 17.7538 18.9209C16.1939 20.2191 14.1881 21 12 21Z" fill="currentColor"></path></svg></a>
   <a href="" class="settings"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M924.8 625.7l-65.5-56c3.1-19 4.7-38.4 4.7-57.8s-1.6-38.8-4.7-57.8l65.5-56a32.03 32.03 0 0 0 9.3-35.2l-.9-2.6a443.74 443.74 0 0 0-79.7-137.9l-1.8-2.1a32.12 32.12 0 0 0-35.1-9.5l-81.3 28.9c-30-24.6-63.5-44-99.7-57.6l-15.7-85a32.05 32.05 0 0 0-25.8-25.7l-2.7-.5c-52.1-9.4-106.9-9.4-159 0l-2.7.5a32.05 32.05 0 0 0-25.8 25.7l-15.8 85.4a351.86 351.86 0 0 0-99 57.4l-81.9-29.1a32 32 0 0 0-35.1 9.5l-1.8 2.1a446.02 446.02 0 0 0-79.7 137.9l-.9 2.6c-4.5 12.5-.8 26.5 9.3 35.2l66.3 56.6c-3.1 18.8-4.6 38-4.6 57.1 0 19.2 1.5 38.4 4.6 57.1L99 625.5a32.03 32.03 0 0 0-9.3 35.2l.9 2.6c18.1 50.4 44.9 96.9 79.7 137.9l1.8 2.1a32.12 32.12 0 0 0 35.1 9.5l81.9-29.1c29.8 24.5 63.1 43.9 99 57.4l15.8 85.4a32.05 32.05 0 0 0 25.8 25.7l2.7.5a449.4 449.4 0 0 0 159 0l2.7-.5a32.05 32.05 0 0 0 25.8-25.7l15.7-85a350 350 0 0 0 99.7-57.6l81.3 28.9a32 32 0 0 0 35.1-9.5l1.8-2.1c34.8-41.1 61.6-87.5 79.7-137.9l.9-2.6c4.5-12.3.8-26.3-9.3-35zM788.3 465.9c2.5 15.1 3.8 30.6 3.8 46.1s-1.3 31-3.8 46.1l-6.6 40.1 74.7 63.9a370.03 370.03 0 0 1-42.6 73.6L721 702.8l-31.4 25.8c-23.9 19.6-50.5 35-79.3 45.8l-38.1 14.3-17.9 97a377.5 377.5 0 0 1-85 0l-17.9-97.2-37.8-14.5c-28.5-10.8-55-26.2-78.7-45.7l-31.4-25.9-93.4 33.2c-17-22.9-31.2-47.6-42.6-73.6l75.5-64.5-6.5-40c-2.4-14.9-3.7-30.3-3.7-45.5 0-15.3 1.2-30.6 3.7-45.5l6.5-40-75.5-64.5c11.3-26.1 25.6-50.7 42.6-73.6l93.4 33.2 31.4-25.9c23.7-19.5 50.2-34.9 78.7-45.7l37.9-14.3 17.9-97.2c28.1-3.2 56.8-3.2 85 0l17.9 97 38.1 14.3c28.7 10.8 55.4 26.2 79.3 45.8l31.4 25.8 92.8-32.9c17 22.9 31.2 47.6 42.6 73.6L781.8 426l6.5 39.9zM512 326c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm79.2 255.2A111.6 111.6 0 0 1 512 614c-29.9 0-58-11.7-79.2-32.8A111.6 111.6 0 0 1 400 502c0-29.9 11.7-58 32.8-79.2C454 401.6 482.1 390 512 390c29.9 0 58 11.6 79.2 32.8A111.6 111.6 0 0 1 624 502c0 29.9-11.7 58-32.8 79.2z"></path></svg></a>
</nav>
    <div class="direct">
       <span>Courses >> Computer Organization & Microprocessors-TH >> PSO 1</span> 
    </div>

    <div class="pso">
        <p>To design and manufacture the components and system as per requirement.</p>
    </div>
    
    <div>
        <div class="pso-comp">
            <p onclick="openPopup()" style="cursor: pointer;">Design and develop components as per functional requirements with specifications.</p>
        </div>
        <div class="pso-comp">
            <p onclick="openPopup()" style="cursor: pointer;">Design and develop components as per functional requirements with specifications.</p>
        </div>
    </div>

    <!-- <button onclick="openPopup()">Open Popup</button> -->

  <!-- Popup Container -->
  <div id="popup-container">
    <div id="popup">
      <span class="close-btn" onclick="closePopup()">&times;</span>
      <h4>PROGRAM INDICATOR 1.1.1</h4>
      <table>
        <thead>
          <tr>
            <th><center>CO1</center></th>
            <th><center>CO2</center></th>
            <th><center>CO3</center></th>
            <th><center>CO4</center></th>
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
  </div>

    
  <script>
    function openPopup() {
      document.getElementById('popup-container').style.display = 'flex';
    }

    function closePopup() {
      document.getElementById('popup-container').style.display = 'none';
    }
    function submitForm() {
        // Add your form submission logic here
        alert('Added Successfully');
      }
  </script>
</body>
</html>