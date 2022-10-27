<title>Daftar Buku</title>
<?php
    include "header_admin.php";
    if ($_SESSION['role']=='admin'){
?><br>
<h3>Daftar Buku</h3>
<form method="POST" action="daftarbuku.php" class="d-flex">
    <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form><br>
<a href="tambah_buku.php" class="btn btn-primary">Tambah Buku</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>FOTO</th>
                <th>NAMA BUKU</th>
                <th>PENGARANG</th>
                <th>DESKRIPSI</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include "../koneksi.php";
            global $conn;
            if (isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $query_buku = mysqli_query($conn,"select * from buku where id_buku = '$cari' or nama_buku like '%$cari%' or pengarang like '$cari'");
            }
            else{
                $query_buku = mysqli_query($conn, "select * from buku");
            }
            $no=0;
            while($data_buku = mysqli_fetch_array($query_buku)){
                $no++;
        ?> 
            <tr>
                <td><?=$no?></td>
                <td><img src ="../foto_produk/<?=$data_buku['foto'];?>" width="50px"></td>
                <td><?=$data_buku['nama_buku']?></td>
                <td><?=$data_buku['pengarang']?></td>
                <td width ="700px"><?=$data_buku['deskripsi']?></td>
                <td> 
                <a href="ubah_buku.php?id_buku=<?=$data_buku ['id_buku']?>" class="btn btn-success">Edit</a>
                <a href="hapus_buku.php?id_buku=<?=$data_buku ['id_buku']?>" class="btn btn-danger"
                onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a> 
                </td>    <!-- onclick digunakan agar ketika tombol dipencet muncul konfirmasi sbb -->
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    }else{
        echo '<h2 align="center">Anda Bukan Admin</h2>';
    }
    ?>

