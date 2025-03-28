<?php

session_start();
// Cache control headers to prevent caching of login page
// he 

include "conn.php";


if (!isset($_SESSION['username'])) {
  header('location: index.php');
}

$email = $_SESSION['username'];
$name = $_SESSION['name'];
$teacher_id = $_SESSION['teacher_id'];
$is_admin = $_SESSION['isadmin'];
// $password = $_SESSION['password']

?>


  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

a {
  text-decoration: none;
}

li {
  list-style: none;
}

.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  background-color: #095899;
  color: #fff;
}

.nav-links a {
  color: #fff;
}

/* LOGO */
.logo {
  font-size: 25px;
}

/* NAVBAR MENU */
.menu {
  display: flex;
  gap: 1em;
  font-size: 15px;
}

.menu li:hover {
  background-color: #095899;
  border-radius: 5px;
  transition: 0.3s ease;
}

.menu li {
  padding: 5px 14px;
}

/* DROPDOWN MENU */
.services {
  position: relative; 
}

.dropdown {
  background-color: #095899;
  padding: 1em 0;
  position: absolute; /*WITH RESPECT TO PARENT*/
  display: none;
  border-radius: 8px;
  top: 35px;
}

.dropdown li + li {
  margin-top: 10px;
}

.dropdown li {
  padding: 0.5em 1em;
  width: 8em;
  text-align: center;
}

.dropdown li:hover {
  background-color: #095899;
}

.services:hover .dropdown {
  display: block;
}

input[type=checkbox] {
  display: none;
} 

/* HAMBURGER MENU */
.hamburger {
  display: none;
  font-size: 24px;
  user-select: none;
}

/* APPLYING MEDIA QUERIES */
@media (max-width: 768px) {
 .menu {
    display:none;
    position: absolute;
    background-color:#095899;
    right: 0;
    left: 0;
    text-align: center;
    padding: 16px 0;
  }

  .menu li:hover {
    display: inline-block;
    background-color:#095899;
    transition: 0.3s ease;
  }

  .menu li + li {
    margin-top: 12px;
  }

  input[type=checkbox]:checked ~ .menu {
    display: block;
  }

  .hamburger {
    display: block;
  }

  .dropdown {
    left: 50%;
    top: 30px;
    transform: translateX(35%);
  }

  .dropdown li:hover {
    background-color: #095899;
  }
}

.home-link,
  .navbar-link {
    color: var(--navbar-text-color);
    text-decoration: none;
    display: flex;
    font-weight: 400;
    align-items: center;
  }

  .home-link:is(:focus, :hover) {
    color: var(--navbar-text-color-focus);
  }

  .navbar-logo img {
    border-radius: 50%;
    height: 30px;
  }

  .navbar-logo {
    background-color: var(--navbar-text-color-focus);
    border-radius: 50%;
    width: 30px;
    height: 30px;
    margin-right: 0.5em;
  }
  </style>
</head>

<body>
  <nav class="navbar">
    <!-- LOGO -->
    <div class="logo"> 
      <a href="/prathamproject/home.php" class="home-link">
      <div class="navbar-logo">
        <img src="/prathamproject/img/logo.jpg" alt="">
      </div>
      DYPCET
    </a>
  </div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">

      <!-- USING CHECKBOX HACK -->
      <input type="checkbox" id="checkbox_toggle" />
      <label for="checkbox_toggle" class="hamburger">&#9776;</label>

      <!-- NAVIGATION MENUS -->
      <div class="menu">

        <li><a href="home.php">Home</a></li>

        <?php


        if ($is_admin == 1) {
          echo '<li class="services navbar-item">
          <span>Teachers</span>
          <ul class="dropdown">
            <li><a href="/">Add Teacher</a></li>
            <li><a href="/">Allocation</a></li>
          </ul>
</li>';
          echo '<li class="services navbar-item">

          <span>Subjects</span>

          <ul class="dropdown">
            <li><a href="/prathamproject/Admin/add_course.php">Add Course</a></li>
            <li><a href="" class="dropdown-item">All details</a></li>
            <li><a href="/prathamproject/Admin/subject_average.php" class="dropdown-item">Average</a></li>
            
          </ul>
</li>';
          // echo '<li class="navbar-item"><a class="navbar-link" href="/prathamproject/Admin/add_po.php">Add POs</a></li>';  
        }

        ?>

        <li><a href="settings.php">Settings</a></li>
      </div>
    </ul>
  </nav>

