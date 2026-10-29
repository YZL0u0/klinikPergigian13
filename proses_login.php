<?php
session_start();
include "db_conn.php";

if (isset($_POST['btnLogA'])){
    $logid= $_POST ['id'];
    $pwdA= $_POST ['pwd'];
    if ($logid=="admin" && $pwdA=="131313"){
        $_SESSION['peranan']="admin";
        $_SESSION['login']=$logid;
        $_SESSION['nama']="Admin";
    echo '<script>alert("Selamat datang Admin");
             window.location.href="utama.php";
        </script>';
    exit();
    }
    else{
        echo '<script>alert("Login ID atau Kata Laluan SALAH!!");
            window.location.href="log_admin.php";
         </script>';
         exit();
    }
}
elseif(isset($_POST['btnLog'])){
    $tel = $_POST['no_tel'];
    $sql = "SELECT * FROM pesakit WHERE no_telefon ='$tel'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($result)==1){
        $data=mysqli_fetch_assoc($result);
        $_SESSION['peranan']="pesakit";
        $_SESSION['notel']=$data['no_telefon'];
        $_SESSION['nama']=$data['nama_pesakit'];
        echo '<script>alert("Selamat datang '.$_SESSION['nama'].'");
             window.location.href="utama.php";</script>';
        exit();
    }
    else{
        echo '<script>alert("No Telefon SALAH!!");
             window.location.href="index.php";</script>';
    }
}
mysqli_close($conn);
?>