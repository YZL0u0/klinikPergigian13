<?php
include "session.php";
include "db_conn.php";
$kod= $_POST['kod'];
$nama= $_POST['nama'];
$harga= $_POST['harga'];

$semak= "SELECT * FROM servis WHERE kod_servis ='$kod'";
$data= mysqli_query($conn,$semak);

if (mysqli_num_rows($data)==1){
echo '<script>alert("Kod perkhidmatan sudah wujud");window.location="borang_servis.php";
</script>';
}else{
    $sql ="INSERT INTO servis
    (kod_servis, nama_servis, harga_servis) VALUES
    ('$kod', '$nama','$harga')";
}