<?php
session_start();

if (isset($_SESSION['loginAdmin'])) {
    header("location: from_kelas.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>FORM LOGIN</title>
</head>

<body class="bg-dark text-white">
    <div class="containerr">
        <b style="font-size: 32px;">FORM LOGIN ADMIN</b>
        <br><br>
        <form action="../services/admin/login_valid.php" method="POST">

            <div class="col-3">
                <label class="form-label"><b>Username</b></label>
                <input type="text" class="form-control bg-dark text-white" id="username" name="username" autocomplete="off">
            </div>
            <br>
            <div class="col-3">
                <label class="form-label"><b>Password</b></label>
                <input type="password" class="form-control bg-dark text-white" id="pass" name="pass" autocomplete="off">
            </div>
            <br>
            <button type="submit" class="btn bg-light text-dark"><span class="bi-capslock-fill"></span> SUBMIT</button>
            &emsp;
            <button type="reset" class="btn bg-danger bg-opacity-50 text-warning"><span class="bi-bootstrap-reboot"></span> RESET</button>

        </form>
        <br><br>
        <a href="../services/siswa/read_siswa.php"><button type="button" class="btn btn-danger"><span class="bi-layout-text-sidebar-reverse"></span> SISWA</button></a>
    </div>
</body>

</html>