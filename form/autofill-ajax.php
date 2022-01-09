<?php

include_once "../services/koneksi.php";

$kelas = $_GET['id_kelas'];

$sql = mysqli_query($con, "SELECT * FROM tb_kelas WHERE id_kelas = '$kelas'");
$result = mysqli_fetch_array($sql);

$data = array(
    'id' => $result['id_kelas'],
    'kelas' => $result['kelas'],
    'wali' => $result['wali_kelas']
);

echo json_encode($data);
?>