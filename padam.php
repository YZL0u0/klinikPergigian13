<?php
include('session.php');
include('db_conn.php');

$no = $_GET["no"];

$mysql = "DELETE FROM janjitemu WHERE no_janjitemu = '$no'";

if (mysqli_query($conn,$mysql)){
    echo '<script>alert("Janji temu berjaya dipadam!");
    window.location.href="senarai.php";
    </script>';
}
else { echo "Ralat : ".mysqli_error($conn); }

mysqli_close($conn);
?>