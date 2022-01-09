<?php

include_once "delete_siswa.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../form/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>READ DATA SISWA</title>
</head>

<body class="bg-dark text-white">

    <div class="containerr">
        <a href="../../form/form_siswa.php"><button type="button" class="btn btn-danger"><span class="bi-layout-text-sidebar-reverse"></span> TAMBAH DATA</button></a>
        <a href="../../form/form_login.php"><button type="button" class="btn btn-danger"><span class="bi-layout-text-sidebar-reverse"></span> LOGIN</button></a>
        <br><br>
        <div>
            <form action="" method="post">
                <input class="form-control bg-dark text-white w-25" type="text" id="search" name="search" placeholder="Cari Data" autocomplete="off" autofocus>
                <br>
                <button class="btn btn-success" type="submit" id="searchBtn" name="searchBtn"><span class="bi bi-search"></span> Search</button>
            </form>
        </div>
        <br>
        <table class="table table-dark table-striped mh-100">
            <tr align="center">
                <th>ID Siswa</th>
                <th>Nama Siswa</th>
                <th>Alamat Siswa</th>
                <th>Kelas</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
                <?php
                include_once "../koneksi.php";

                if (!isset($_POST['search'])) {
                    $query = mysqli_query($con, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas");

                    if (mysqli_num_rows($query) > 0) {
                ?>
                        <?php
                        $i = 0;
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
            <tr align="center">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr align="center">
                <td><?php echo $data['id_siswa'] ?></td>
                <td><?php echo $data['nama_siswa'] ?></td>
                <td><?php echo $data['alamat_siswa'] ?></td>
                <td><?php echo $data['kelas'] ?></td>
                <td><?php echo $data['wali_kelas'] ?></td>
                <td>
                    <a href="read_siswa.php?id=<?php echo $data['id_siswa'] ?>" onclick="return confirm('Are You Sure Want to Delete Data ??')"><button type="button" class="btn btn-danger"><span class="bi-trash-fill"></span> Delete</button></a>
                    &emsp;
                    <a href="update_siswa.php?id=<?php echo $data['id_siswa'] ?>"><button type="button" class="btn btn-success"><span class="bi-pencil-square"></span> Update</button></a>
                </td>
            </tr>
        <?php
                            $i++;
                        }
                    }
                }
                if (isset($_POST['search'])) {

                    $search = $_POST['search'];

                    $query = mysqli_query($con, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE tb_siswa.nama_siswa LIKE '%$search%' OR tb_kelas.kelas LIKE '%$search%' OR tb_kelas.wali_kelas LIKE '%$search%'");

                    if (mysqli_num_rows($query) > 0) {
        ?>
        <?php
                        $i = 0;
                        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr align="center">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr align="center">
                <td><?php echo $data['id_siswa'] ?></td>
                <td><?php echo $data['nama_siswa'] ?></td>
                <td><?php echo $data['alamat_siswa'] ?></td>
                <td><?php echo $data['kelas'] ?></td>
                <td><?php echo $data['wali_kelas'] ?></td>
                <td>
                    <a href="read_siswa.php?id=<?php echo $data['id_siswa'] ?>" onclick="return confirm('Are You Sure Want to Delete Data ??')"><button type="button" class="btn btn-danger"><span class="bi-trash-fill"></span> Delete</button></a>
                    &emsp;
                    <a href="update_siswa.php?id=<?php echo $data['id_siswa'] ?>"><button type="button" class="btn btn-success"><span class="bi-pencil-square"></span> Update</button></a>
                </td>
            </tr>
<?php
                            $i++;
                        }
                    }
                }

?>
<?php
mysqli_close($con);
?>
</tr>
        </table>
    </div>

</body>

</html>