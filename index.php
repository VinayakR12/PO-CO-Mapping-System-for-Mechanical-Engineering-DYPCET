<?php
session_start(); // Start the session

include "conn.php";

if (isset($_POST['submit'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize user input
    $email = mysqli_real_escape_string($conn, $email);

    $sql_query = "SELECT * FROM `teachers` WHERE email = '$email'";
    $res = mysqli_query($conn, $sql_query);

    if ($res) {
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $stored_password_hash = $row['password'];
            $name = $row['name']; 
            $teacher_id = $row['teacher_id']; 
            $is_admin = $row['isadmin']; 

            if (password_verify($password, $stored_password_hash)) {
                
                $_SESSION['username'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['teacher_id'] = $teacher_id;
                $_SESSION['isadmin'] = $is_admin;
                header("Location: home.php?teacher_id=$teacher_id");

                exit();
            } else {
                // Incorrect password
                echo '<script>alert("Incorrect password.");</script>';
            }
        } else {
            // User not found
            echo '<script>alert("User not found.");</script>';
        }
    } else {
        // Error in query execution
        echo "Error: " . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <title>Login Page</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #fff;

        }

        .container {
            display: flex;
            width: 100%;
            height: 100%;
        }

        .left-side {
            flex: 1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            font-family: 'Poppins', sans-serif;
        }

        .login-form {
            font-family: 'Poppins', sans-serif;
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 0px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="checkbox"] {
            -webkit-appearance: checkbox;
            -moz-appearance: checkbox;
            appearance: checkbox;
            display: inline-block;
            width: auto;
        }

        .remember-forgot-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .forgot-password {
            margin-left: 20px;
            text-align: right;
        }

        .sign-in-btn {
            width: 100%;
            padding: 10px;
            background-color: #2a0653;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error-message {
            color: #ff0000;
            margin-top: 10px;
        }

        .right-side {
            flex: 1;
            background-image: url('./img/mec2.png');
            background-size: cover;
        }

        h1 {
            font-family: 'Times New Roman', Times, serif;
        }

        .brand img {
            width: 100%;
        }

        .brand {
            width: 90px;
            height: 90px;
            overflow: hidden;
            border-radius: 50%;
            margin: 40px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
            position: relative;
            z-index: 1;
        }
    </style>
</head>
</head>

<body>
    <div class="container">
        <div class="left-side">
            <div class="login-form">
                <div class="brand">
                    <img src="img/logo.jpg" alt="logo">
                </div>
                <center>
                    <h1>Department of Mechanical Engineering</h1>
                </center>

                <p>Welcome back! Please enter your details.</p>

                <form action="index.php" method="POST">
                    <div class="form-group">
                        <label for="username">UserName</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <!-- <button type="submit"  ></button> -->
                    <input type="submit" value="Sign In" class="sign-in-btn" name="submit">
                </form>

            </div>
        </div>
        <div class="right-side">

        </div>
    </div>

</body>

</html>