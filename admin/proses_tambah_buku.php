<?php 
    $nama_buku = $_POST['nama_buku'];
    $pengarang = $_POST['pengarang'];
    $deskripsi = $_POST['deskripsi'];
    $temp = $_FILES ['foto']['tmp_name']; //karena upload jd menggunakan variabel FILES [tmp_name merupakan file itu sendiri]
    $type = $_FILES ['foto']['type'];
    $size = $_FILES ['foto']['size'];
    $name = rand(0,9999).$_FILES['foto']['name']; //upload nama dari foto tsb
    $folder = "../foto_produk/";
    include "../koneksi.php";
    if ($size < 2048000 and ($type =='image/jpeg' or $type =='image/png' or $type =='image/jpg')){ 
        move_uploaded_file($temp,$folder.$name); //[$file itu sendiri,$destinasi tujuan folder akan disimpan.$namafilenya]
        $input = mysqli_query($conn, "INSERT INTO buku (nama_buku, pengarang, deskripsi, foto) VALUES ('".$nama_buku."','".$pengarang."','".$deskripsi."','".$name."')");
        if ($input){
            echo "<script>alert('Berhasil Menambahkan Buku');location.href='daftarbuku.php';</script>";
        }else{
            echo "<script>alert('Gagal Menambahkan Buku');location.href='daftarbuku.php';</script>";
        }
    }
?>