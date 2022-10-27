<?php
    include "header_admin.php";//method post agar url-nya tidak tampil
?>
<h3>Tambah Buku</h3> 
 <form action="proses_tambah_buku.php" method="post" enctype="multipart/form-data"> 
    Nama Buku :
    <input type="text" name="nama_buku" value="" class="form-control" placeholder= "Masukkan Judul Buku" required>
    Pengarang :
    <input type="text" name="pengarang" value="" class="form-control" placeholder= "Masukkan Nama Pengarang" required>
    Deskripsi :
    <input type="text" name="deskripsi" value="" class="form-control" placeholder= "Masukkan Deskripsi Buku" required>
    Foto : 
    <input type="file" name="foto" value="" class="form-control" required><br>
    <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">
 </form>

 <!-- agar file foto masih bisa diambil datanya -->