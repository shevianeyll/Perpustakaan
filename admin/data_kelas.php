<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <!-- css only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <?php
        include "header_admin.php";
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>DATA KELAS</h1>
                <form method="POST"action="data_kelas.php" class="d-flex">
                    <input class="form-control me-2" type="search" name ="cari" placeholder="search" aria-label ="search">
                    <button class="btn btn-outline success" type="submit">
                        Search
                    </button>
                </form>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope ="col">ID KELAS</th>
                            <th scope ="col">NAMA KELAS</th>
                            <th scope ="col">KELOMPOK</th>
                            <th scope ="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include "../koneksi.php";
                        if (isset($_POST['cari'])){
                            $cari = $_POST['cari'];
                            $query_kelas= mysqli_query ($koneksi, "select * from kelas where id_kelas ='$cari' or nama_kelas like '%$cari%' or kelompok like '%$cari%'");
                        }else{
                            $query_kelas=mysqli_query($koneksi, "select * from kelas");
                        }
                        while($data_kelas - mysqli_fetch_array($query_kelas)){
                    ?>
                        <tr>
                            <td><?=$data_kelas['id_kelas']?></td>
                            <td><?=$data_kelas['nama_kelas']?></td>
                            <td><?=$data_kelas['kelompok']?></td>
                            <td>
                                <a href="ubah_kelas.php?id_kelas=
                                <?=$data_kelas ['id_kelas']?>" class="btn btn-success">Edit</a>
                                <a href="hapus_kelas.php?id_kelas=
                                <?=$data_kelas ['id_kelas']?>" class="btn btn-danger"
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                Hapus</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
                <a href="tambah_kelas.php" type="button" class="btn btn-primary">Tambah Kelas</a>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT BUNDEL WITH POPPER -->

</body>
</html>