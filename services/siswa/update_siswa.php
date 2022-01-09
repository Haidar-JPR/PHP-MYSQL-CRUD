<?php

include_once "../koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($con, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE id_siswa = '$id'");
$data = mysqli_fetch_array($query);

if (count($_POST) > 0) {
    $idS = $_POST['idS'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];

    $data2 = mysqli_query($con, "UPDATE tb_siswa SET id_siswa = '$idS', nama_siswa = '$nama', alamat_siswa = '$alamat', id_kelas = '$kelas' WHERE id_siswa = '$id'");
    header("location: read_siswa.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../form/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>UPDATE DATA SISWA</title>
</head>

<body class="bg-dark text-white">
    <div class="containerr">
        <b style="font-size: 32px;">UPDATE SISWA <?php echo $data['id_siswa'] ?></b>
        <br><br>

        <form action="" method="POST" onsubmit="return validSiswa('Berhasil Update Data')">
            <div class="col-3">
                <label class="form-label"><b>ID Siswa</b></label>
                <input type="text" class="form-control bg-dark text-white" id="idS" name="idS" autocomplete="off" value="<?php echo $data['id_siswa'] ?>">
            </div>
            <br>
            <div class="col-3">
                <label class="form-label"><b>Nama Siswa</b></label>
                <input type="text" class="form-control bg-dark text-white" id="nama" name="nama" autocomplete="off" value="<?php echo $data['nama_siswa'] ?>">
            </div>
            <br>    
            <div class="col-3">
                <label class="form-label"><b>Alamat Siswa</b></label>
                <input type="text" class="form-control bg-dark text-white" id="alamat" name="alamat" autocomplete="off" value="<?php echo $data['alamat_siswa'] ?>">
            </div>
            <br>
            <div class="col-3">
                <label class="form-label"><b>Kelas</b></label>
                <select class="form-select form-select-lg bg-dark text-white" aria-label=".form-select-sm example" name="kelas" id="kelas" onchange="autofill()">
                    <option selected style="text-align: center;"> -- Pilih Opsi Tersedia -- </option>
                    <!-- Menampilkan semua pilihan provinsi yang ada di table provinsi -->
                    <?php
                    include_once "../koneksi.php";
                    $search = mysqli_query($con, "SELECT * FROM tb_kelas");
                    if (mysqli_num_rows($search) > 0) {
                    ?>
                        <?php
                        $i = 0;
                        while ($data  = mysqli_fetch_array($search)) {
                        ?>
                            <option value="<?php echo $data['id_kelas'] ?>"><?php echo $data['kelas'] ?></option>
                        <?php
                            $i++;
                        }
                        ?>
                    <?php
                    }
                    mysqli_close($con);
                    ?>
                </select>
            </div>
            <br>
            <div class="col-3">
                <label class="form-label"><b>Wali Kelas</b></label>
                <input type="text" class="form-control bg-dark text-white" id="wali_kelas" name="wali_kelas" disabled>
            </div>
            <br>
            <button type="submit" class="btn bg-light text-dark"><span class="bi-capslock-fill"></span> SUBMIT</button>
            &emsp;
            <button type="reset" class="btn bg-danger bg-opacity-50 text-warning"><span class="bi-bootstrap-reboot"></span> RESET</button>
        </form>

        <br>
        <a href="read_siswa.php"><button type="reset" class="btn btn-warning"><span class="bi-layout-text-sidebar-reverse"></span> TAMPIL DATA</button></a>
    </div>

</body>

<script>
    function autofill(){
        
        var kelas = $("#kelas").val();
        
        $.ajax({
        
            url: 'autofill-ajax.php',
        
            data: 'id_kelas='+kelas,
        
            success: function(data){
            var json = data,
            obj = JSON.parse(json);
            $("#wali_kelas").val(obj.wali);
        }
    })
}
</script>

<script src="../../validations/input_valid.js"></script>

</html>