<!-- menampilkan data buku yang akan diubah menggunakan value -->
<?php
    $id_buku = $_POST["id_buku"];
    $nama_buku = $_POST["nama_buku"];
    $pengarang = $_POST["pengarang"];
    $deskripsi = $_POST['deskripsi'];
    
    include "../koneksi.php";
    if ($_FILES['foto']['tmp_name']) {
        $temp = $_FILES['foto']['tmp_name'];
        $type = $_FILES['foto']['type'];
        $size = $_FILES['foto']['size'];
        $name = rand(0,9999).$_FILES['foto']['name'];
        $folder = "../foto_produk/";

        if ($size < 2048000 and ($type =='image/jpeg' or $type == 'image/png'))
        {
            $query_foto = mysqli_query($koneksi, "SELECT * FROM buku where id_buku = '".$_POST['id_buku']."'");
            $data_foto = mysqli_fetch_array($query_foto);
            unlink('../foto_produk/'.$data_foto['foto']); //remove foto yang ada difolder lalu diganti foto yang baru diup
            
            move_uploaded_file($temp, $folder . $name);
            $input = mysqli_query($koneksi, "UPDATE buku SET 
            nama_buku='".$nama_buku."', pengarang='".$pengarang."',
            deskripsi='".$deskripsi."', foto='".$name."'
            where id_buku='".$id_buku."'");

            if ($input) {
                echo "<script>alert('Berhasil');location.href='daftarbuku.php';</script>";
            }
            else {
                echo "<script>alert('Gagal');location.href='daftarbuku.php';</script>";
            }
        }
    }
    else{
        $input = mysqli_query($conn, "UPDATE buku SET nama_buku='".$nama_buku."', pengarang='".$pengarang."', deskripsi='".$deskripsi."' where id_buku='".$id_buku."'");

        if ($input) {
            echo "<script>alert('Berhasil Mengubah Data Buku');location.href='daftarbuku.php';</script>";
        }
        else {
            echo "<script>alert('Gagal Mengubah Data Buku');location.href='daftarbuku.php';</script>";
        }
    }
    
?>