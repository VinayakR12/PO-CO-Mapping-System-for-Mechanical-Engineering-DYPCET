<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&family=Young+Serif&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

  .header {
    display: inline-block;
    background-color: #095899;
    padding-right: 1175px;
    padding-bottom: 10px;
    padding-top: 7px;
    padding-left: 46px;
    font-size: 19px;
    color: white;
    position: relative;
    bottom: -10px;
    left: 20px;
    text-align: center;
    margin-top: 15px
  }

  .modal-dialog {
    max-width: 400px;
  }
</style>

<body>
  <?php

  include "navbar.php";

  ?>
  <div class="direct">
    <span>Settings</span> <span> >> </span>
  </div>

  <div class="header">
    <p>Password and Sign In Method</p>
    <a style="color: black;" href="logout.php">LogOut</a>

  </div>


  <input type="submit" type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePasswordModal" name="change_pass" value="Change Password" id="">

  <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="changePasswordForm" method="post">
            <div class="form-group">
              <label for="oldPassword">Old Password</label>
              <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
            </div>
            <div class="form-group">
              <label for="newPassword">New Password</label>
              <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" id="changePasswordBtn" value="Save Changes" name="change_password">
              <a href="">Forgot Password?</a>
            </div>
          </form>
        </div>
      </div>
    </div>


    <?php

    if (isset($_POST['change_password'])) {
      $oldPassword = $_POST['oldPassword'];
      $newPassword = $_POST['newPassword'];

      $connection = mysqli_connect('localhost', 'root', '', 'mech');

      if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $teacher_id = mysqli_real_escape_string($connection, $_SESSION['teacher_id']);
      $oldPassword = mysqli_real_escape_string($connection, $oldPassword);
      $newPassword = mysqli_real_escape_string($connection, $newPassword);

      $query = "SELECT `password` FROM `teachers` WHERE teacher_id='$teacher_id'";
      $result = mysqli_query($connection, $query);

      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $storedPassword = $row['password'];

          if (password_verify($oldPassword, $storedPassword)) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $updateQuery = "UPDATE `teachers` SET `password`='$hashedPassword' WHERE teacher_id='$teacher_id'";
            $updateResult = mysqli_query($connection, $updateQuery);

            if ($updateResult) {
              echo "<script>alert('Password updated successfully.');</script>";
            } else {
              echo "<script>alert('Error updating password: " . mysqli_error($connection) . "');</script>";
            }
          } else {
            echo "<script>alert('Old password is incorrect.');</script>";
          }
        } else {
          echo "<script>alert('No password found for the given teacher ID.');</script>";
        }
      } else {
        echo "<script>alert('Error executing the query: " . mysqli_error($connection) . "');</script>";
      }

      mysqli_close($connection);
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>