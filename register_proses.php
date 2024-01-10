<?php
require 'connect.php';
session_start();

$fullname = htmlspecialchars($_POST['fullname']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$error = false;

// validasi inputan tidak boleh kosong
if (empty($fullname)) {
    $_SESSION['fullname'] = "Fullname wajib diisi";
    $error = true;
}
if (empty($email)) {
    $_SESSION['email'] = "Email wajib diisi";
    $error = true;
}
if (empty($password)) {
    $_SESSION['password'] = "Password wajib diisi";
    $error = true;
}

if (strlen($fullname) < 4) {
    $_SESSION['fullname'] = "Fullname minimal 4 karakter";
    $error = true;
}
// validasi panjang password
if (strlen($password) < 8) {
    $_SESSION['password'] = "Password minimal 8 karakter";
    $error = true;
}

// Apa bila validasi gagal kembali ke register.php
if ($error === true) {
    header('location: register.php');
} else {
    // Proses hash password
   $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    // Membuat id user
    $string = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $id = 'user-' . substr(str_shuffle($string), 0, 10);

    // Proses simpan ke database
    $query = "INSERT INTO users(id, email, password, fullname) VALUES('$id', '$email', '$hashPassword', '$fullname')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        header('location: index.php');
    } else {
        echo "<script>alert('Register gagal');window.location='register.php'</script>";
    }
}