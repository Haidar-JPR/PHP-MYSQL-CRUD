<?php

include_once "../koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];

$save = mysqli_query($con, "INSERT INTO tb_siswa (id_siswa, nama_siswa, alamat_siswa, id_kelas) VALUES ('$id', '$nama', '$alamat', '$kelas')");

if($save){
    header("location: read_siswa.php");
}

?>