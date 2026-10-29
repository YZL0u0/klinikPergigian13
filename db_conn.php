<?php
$db_host = "localhost";
$db_user = "root"; //Username phpmyadmin
$db_pwd =""; //Password phpmyadmin
$db_name = "klinikPergigian13"; //Nama pangkalan data

//Cipta sambungan ke pangkalan data
$conn = mysqli_connect($db_host,$db_user,$db_pwd,$db_name);

//Semak sambungan
//Jika tak berjaya, keluarkan mesej ralat
if (!$conn){
    die(mysqli_connect_error());
}
?>