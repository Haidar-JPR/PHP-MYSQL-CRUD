<?php
session_start();

if (!isset($_SESSION['loginAdmin'])) {
    header("location: form_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>FORM INPUT KOTA</title>
</head>

<body class="bg-dark text-white">
    <div class="containerr">
        <b style="font-size: 32px;">FORM INPUT DATA</b>
        <br><br>

        <form action="../services/kelas/insert_kelas.php" method="POST" onsubmit="return validKelas('Berhasil Input Kelas!')">
            <div class="col-3">
                <label class="form-label"><b>ID Kelas</b></label>
                <input type="text" class="form-control bg-dark text-white" id="id" name="id" autocomplete="off">
            </div>
            <br>
            <div class="col-3">
                <label class="form-label"><b>Kelas</b></label>
                <input type="text" class="form-control bg-dark text-white" id="kelas" name="kelas" autocomplete="off">
            </div>
            <br>
            <div class="col-3">
                <label class="form-label"><b>Wali Kelas</b></label>
                <input type="text" class="form-control bg-dark text-white" id="wali" name="wali" autocomplete="off">
            </div>
            <br>
            <button type="submit" class="btn bg-light text-dark"><span class="bi-capslock-fill"></span> SUBMIT</button>
            &emsp;
            <button type="reset" class="btn bg-danger bg-opacity-50 text-warning"><span class="bi-bootstrap-reboot"></span> RESET</button>
        </form>

        <br>
        <!-- Tombol menampilkan data -->
        <a href="../services/kelas/read_kelas.php"><button type="reset" class="btn btn-warning"><span class="bi-layout-text-sidebar-reverse"></span> TAMPIL DATA</button></a>



    </div>
</body>

<script src="../validations/input_valid.js"></script>

</html>