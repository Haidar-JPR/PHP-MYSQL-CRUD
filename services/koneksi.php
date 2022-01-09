<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "data_kelas";
    
    $con = mysqli_connect($host, $user, $pass, $db);
    if($con){
    }else{
        echo "KONEKSI GAGAL";
    }
?>