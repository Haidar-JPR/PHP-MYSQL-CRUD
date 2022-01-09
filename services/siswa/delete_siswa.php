<?php

include_once "../koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($con, "DELETE FROM tb_siswa WHERE id_siswa = '$id'");
}
?>