<?php
include "session.php";
include "db_conn.php";

$notel=$_SESSION['notel'];

$tarikh=$_POST['tarikh'];
$masa=$_POST['masa'];
$servis=$_POST['servis'];

$semak="SELECT * FROM janjitemu WHERE no_telefon ='$notel'
        AND tarikh_temu ='$tarikh'
        AND masa_temu ='$masa' ";
$data = mysqli_query($conn,$semak);

if (mysqli_num_rows($data)>0){
    echo '<script>alert("Anda sudah membuat janji temu pada tarikh dan masa yang sama!");
    window.location="borang_temu.php"; </script>';
}
else{
    $sql= "INSERT INTO janjitemu 
           (tarikh_temu, masa_temu, no_telefon) VALUES
           ('$tarikh', '$masa','$notel')";
    mysqli_query($conn,$sql);
    $no_janjitemu =mysqli_insert_id($conn);
    foreach($servis as $kod_servis){
        $sql_servis = "INSERT INTO janjitemu_servis
                        (no_janjitemu,kod_servis) VALUES 
                        ('$no_janjitemu','$kod_servis')";
        mysqli_query($conn,$sql_servis        
    }
    $no_janjitemu = "JT".str_pad($no_janjitemu,3,"0",STR_PAD_LEFT);
    echo '<script>alert("Janji temu berjaya disimpan.\nNo Janji Temu : '.$no_janjitemu.'");
               window.location="senarai.php";
            </script>';
}
mysqli_close($conn);
?>