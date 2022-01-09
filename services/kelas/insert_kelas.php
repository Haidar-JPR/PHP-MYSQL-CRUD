<?php

session_start();

if (!isset($_SESSION['loginAdmin'])) {
    include_once "../admin/logout.php";
    exit();
}

include_once "../koneksi.php";

$id = $_POST['id'];
$kelas = $_POST['kelas'];
$wali = $_POST['wali'];

$save = mysqli_query($con, "INSERT INTO tb_kelas (id_kelas, kelas, wali_kelas) VALUES ('$id', '$kelas', '$wali')");

if($save){
    header("location: read_kelas.php");
}

?>