<?php

if (!isset($_SESSION['loginAdmin'])) {
    header("location: ../admin/logout.php");
    exit();
}

include_once "../koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($con, "DELETE FROM tb_kelas WHERE id_kelas = '$id'");
}
?>