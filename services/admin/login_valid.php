<?php
session_start();

include_once "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $data = mysqli_query($con, "SELECT * FROM tb_login WHERE username='$username' AND password='$pass'");

    $result = mysqli_fetch_array($data);

    if ($username == $result['username'] && $pass == $result['password']) {

        $_SESSION['loginAdmin'] = true;
        header("location: ../../form/from_kelas.php");

        // include "";

        exit();
    } else {
        header('location:../../form/form_login.php?error=Anda Belum Terdaftar!');

        exit();
    }
}
?>