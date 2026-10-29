<?php
include "session.php";
include "db_conn.php";

$file= $_FILES["file_txt"]["tmp_name"];

$ext= strtolower(pathinfo($_FILES["file_txt"]["name"],PATHINFO_EXTENSION));

if ($ext=="txt"){
    $file_open=fopen($file,"r");
    while(($data= fgetcsv($file_open,100,","))!==FALSE){
        $kod=$data[0];
        $nama=$data[1];
        $harga=$data[2];

        $semak="SELECT *FROM servis WHERE kod_servis='$kod'";
        $result=mysqli_query($conn,$semak);

        if(mysqli_num_rows($result)==1){
            fclose($file_open);
            echo '<script>alert("Kod perkhidmatan '.$kod.'sudah wujud!");
            window.location="servis.php";
            </script>';
            exit();
        }
        $sql="INSERT INTO servis
                (kod_servis, nama_servis, harga_servis) VALUES
                ('$kod','$nama','$harga')";
                mysqli_query($conn,$sql);
    }
    fclose($file_open);
    echo '<script>alert("Perkhidmatan baharu berjaya disimpan.");
    window.location="servis.php";
    </script>';
}
else{
    echo '<script>alert("Pilih fail .txt sahaja");
    window.location="servis.php";
    </script>';
}
mysqli_close($conn);
?>