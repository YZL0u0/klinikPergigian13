<?php
include "db_conn.php";

$noTel= $_POST ['no_tel'];
$namaP= $_POST ['nama'];

$semak = "SELECT no_telefon FROM pesakit 
           WHERE no_telefon ='$noTel'";
$result= mysqli_query($conn,$semak) or die(mysqli_connect_error());

if (mysqli_num_rows($result)==1){
    echo'<script>alert("Akaun anda telah didaftarkan!!");
    window.location.href="index.php";
    </script>';
}
else{
    $mysql = "INSERT INTO pesakit
              (no_telefon, nama_pesakit) VALUES
              ('$noTel', '$namaP') ";
    if (mysqli_query($conn,$mysql)){
        echo '<script>alert("Berjaya Daftar Akaun Baharu!!");
        window.location.href="index.php";
        </script>';
    } else{
        echo "Error ; " .mysqli_error($conn); 
    }
}
mysqli_close($conn);
?>