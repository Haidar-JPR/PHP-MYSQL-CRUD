<?php

session_start();

if (!isset($_SESSION['loginAdmin'])) {
    include_once "../admin/logout.php";
    exit();
}

include_once "delete_kelas.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../form/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>READ DATA KELAS</title>
</head>

<body class="bg-dark text-white">

    <div class="containerr">
        <a href="../../form/from_kelas.php"><button type="button" class="btn btn-danger"><span class="bi-layout-text-sidebar-reverse"></span> TAMBAH DATA</button></a>
        <a href="../admin/logout.php"><button type="button" class="btn btn-danger"><span class="bi-layout-text-sidebar-reverse"></span> LOGOUT</button></a>
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
                <th>ID Kelas</th>
                <th>Kelas</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
                <?php
                if (!isset($_POST['search'])) {
                    $query = mysqli_query($con, "SELECT * FROM tb_kelas ORDER BY id_kelas");

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
            </tr>
            <tr align="center">
                <td><?php echo $data['id_kelas'] ?></td>
                <td><?php echo $data['kelas'] ?></td>
                <td><?php echo $data['wali_kelas'] ?></td>
                <td>
                    <a href="read_kelas.php?id=<?php echo $data['id_kelas'] ?>" onclick="return confirm('Are You Sure Want to Delete Data ??')"><button type="button" class="btn btn-danger"><span class="bi-trash-fill"></span> Delete</button></a>
                    &emsp;
                    <a href="update_kelas.php?id=<?php echo $data['id_kelas'] ?>"><button type="button" class="btn btn-success"><span class="bi-pencil-square"></span> Update</button></a>
                </td>
            </tr>
        <?php
                            $i++;
                        }
                    }
                }
                if (isset($_POST['search'])) {

                    $search = $_POST['search'];

                    $query = mysqli_query($con, "SELECT * FROM tb_kelas WHERE id_kelas LIKE '%$search%' OR kelas LIKE '%$search%' OR wali_kelas LIKE '%$search%' ORDER BY id_kelas");

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
            </tr>
            <tr align="center">
                <td><?php echo $data['id_kelas'] ?></td>
                <td><?php echo $data['kelas'] ?></td>
                <td><?php echo $data['wali_kelas'] ?></td>
                <td>
                    <a href="read_kelas.php?id=<?php echo $data['id_kelas'] ?>" onclick="return confirm('Are You Sure Want to Delete Data ??')"><button type="button" class="btn btn-danger"><span class="bi-trash-fill"></span> Delete</button></a>
                    &emsp;
                    <a href="update_kelas.php?id=<?php echo $data['id_kelas'] ?>"><button type="button" class="btn btn-success"><span class="bi-pencil-square"></span> Update</button></a>
                </td>
            </tr>
    <?php
                            $i++;
                        }
                    }
    ?>
<?php
                }
                mysqli_close($con);
?>
</tr>
        </table>
    </div>

</body>

</html>