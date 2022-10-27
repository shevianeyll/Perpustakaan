<?php
 if($_GET['id_buku']){
    include "../koneksi.php";
    $qry_hapus=mysqli_query($conn,"delete from buku where id_buku='".$_GET['id_buku']."'");
    if($qry_hapus){
        echo "<script>alert('Sukses Menghapus Buku');
        location.href='daftarbuku.php';</script>"; //redirect ke halaman ()
    } else {
        echo "<script>alert('Gagal Menghapus Buku');
        location.href='daftarbuku.php';</script>";
    }
 }
?>