<?php
require 'connect.php';
session_start();

if (isset($_POST['login'])) {
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  // Proses pencarian email
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($connect, $query);
  $item = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    if (password_verify($password, $item['password'])) {
      $_SESSION['id'] = $item['id'];
      $_SESSION['fullname'] = $item['fullname'];

      header('location: main.php');
    } else {
      echo "<script>alert('Login gagal');window.location='index.php'</script>";
    }
  } else {
    echo "<script>alert('Login gagal');window.location='index.php'</script>";
  }
}