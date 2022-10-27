<?php
    $id_kelas = $_POST["id_kelas"];
    $nama_kelas = $_POST["nama_kelas"];
    $kelompok = $_POST["kelompok"];

    include "../koneksi.php";
    $input = mysqli_query($conn, "UPDATE kelas SET nama_kelas='".$nama_kelas."',
    kelompok = '".$kelompok."' where id_kelas = '".$id_kelas."' ");

    if ($input) {
        echo "<script>alert('Berhasil Mengubah Data Kelas');location.href='tampil_kelas.php';</script>";
    }
    else {
        echo "<script>alert('Gagal Mengubah Data Kelas');location.href='tampil_kelas.php';</script>";
    }
?>