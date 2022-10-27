<?php
    if($_POST){
        $email=$_POST['email'];
        $password=$_POST['password'];
        if(empty($email)){
            echo "<script>alert('Email tidak boleh kosong');
            location.href='login_admin.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');
            location.href='login_admin.php';</script>";
        } else {
            include "../koneksi.php";
            $qry_login=mysqli_query($conn,"select * from petugas where email = '".$email."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id_petugas']=$dt_login['id_petugas'];
                $_SESSION['nama_petugas']=$dt_login['nama_petugas'];
                $_SESSION['role']=$dt_login['role'];
                $_SESSION['status_login_admin']=true;
                header("location: home_admin.php");
            } else {
                echo "<script>alert('Email dan Password tidak benar');
                location.href='login_admin.php';</script>";
            }
        }
    }
?>