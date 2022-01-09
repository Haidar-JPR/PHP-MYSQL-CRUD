<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>FORM INPUT KOTA</title>
</head>

<body class="bg-dark text-white">
    <div class="containerr">
        <b style="font-size: 32px;">FORM INPUT DATA</b>
        <br><br>

        <form action="../services/siswa/insert_siswa.php" method="POST" onsubmit="return validSiswa('Berhasil Input Data')">
            <div class="col-3">
                <label class="form-label"><b>ID Siswa</b></label>
                <input type="text" class="form-control bg-dark text-white" id="id" name="id" autocomplete="off">
            </div>
            <br>
            <div class="col-3">
                <label class="form-label"><b>Nama Siswa</b></label>
                <input type="text" class="form-control bg-dark text-white" id="nama" name="nama" autocomplete="off">
            </div>
            <br>
            <div class="col-3">
                <label class="form-label"><b>Alamat Siswa</b></label>
                <input type="text" class="form-control bg-dark text-white" id="alamat" name="alamat" autocomplete="off">
            </div>
            <br>
            <div class="col-3">
                <label class="form-label"><b>Kelas</b></label>
                <select class="form-select form-select-lg bg-dark text-white" aria-label=".form-select-sm example" name="kelas" id="kelas" onchange="autofill()">
                    <option selected style="text-align: center;"> -- Pilih Opsi Tersedia -- </option>
                    <!-- Menampilkan semua pilihan provinsi yang ada di table provinsi -->
                    <?php
                    include_once "../services/koneksi.php";
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
        <!-- Tombol menampilkan data -->
        <a href="../services/siswa/read_siswa.php"><button type="reset" class="btn btn-warning"><span class="bi-layout-text-sidebar-reverse"></span> TAMPIL DATA</button></a>

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

<script src="../validations/input_valid.js"></script>

</html>