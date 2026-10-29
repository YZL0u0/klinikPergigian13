<?php
include "session.php";
include "db_conn.php";

$kod = $_GET["kod"];

$sql= "DELETE FROM servis WHERE kod_servis='$kod'";
if (mysqli_query($conn,$sql)){
    $sql="DELETE FROM janjitemu WHERE no_janjitemu 
            NOT IN (SELECT no_janjitemu FROM janjitemu_servis)";
    mysqli_query ($conn, $sql);

    echo '<script>alert("Servis berjaya dipadam!");
            window.location.href="servis.php";
        </script>';
}
else{ echo "Ralat : " . mysqli_error($conn); }
mysqli_close($conn);
?>