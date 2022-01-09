<?php

session_start();

if (!isset($_SESSION['loginAdmin'])) {
    include_once "../admin/logout.php";
    exit();
}

include_once "../koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($con, "SELECT * FROM tb_kelas WHERE id_kelas = '$id'");
$data = mysqli_fetch_array($query);

if (count($_POST) > 0) {
    $idK = $_POST['idK'];
    $kelas = $_POST['kelas'];
    $wali = $_POST['wali'];

    $data2 = mysqli_query($con, "UPDATE tb_kelas SET id_kelas = '$idK', kelas = '$kelas', wali_kelas = '$wali' WHERE id_kelas = '$id'");
    header("location: read_kelas.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../form/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>UPDATE DATA KELAS</title>
</head>

<body class="bg-dark text-white">
    <div class="containerr">
        <b style="font-size: 32px;">UPDATE KELAS <?php echo $data['id_kelas'] ?></b>
        <br><br>

        <form action="" method="POST">
            <div class="col-3">
                <label class="form-label"><b>ID Kelas</b></label>
                <input type="text" class="form-control bg-dark text-white" id="idK" name="idK" autocomplete="off" value="<?php echo $data['id_kelas'] ?>">
            </div>
            <br>
            <div class="col-3">
                <label class="form-label"><b>Kelas</b></label>
                <input type="text" class="form-control bg-dark text-white" id="kelas" name="kelas" autocomplete="off" value="<?php echo $data['kelas'] ?>">
            </div>
            <br>    
            <div class="col-3">
                <label class="form-label"><b>Wali Kelas</b></label>
                <input type="text" class="form-control bg-dark text-white" id="wali" name="wali" autocomplete="off" value="<?php echo $data['wali_kelas'] ?>">
            </div>
            <br>
            <button type="submit" class="btn bg-light text-dark"><span class="bi-capslock-fill"></span> SUBMIT</button>
            &emsp;
            <button type="reset" class="btn bg-danger bg-opacity-50 text-warning"><span class="bi-bootstrap-reboot"></span> RESET</button>
        </form>

        <br>
        <a href="read_kelas.php"><button type="reset" class="btn btn-warning"><span class="bi-layout-text-sidebar-reverse"></span> TAMPIL DATA</button></a>
    </div>

</body>

</html>