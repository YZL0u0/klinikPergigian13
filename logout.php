<?php
session_start();
session_unset();
session_destroy();

echo '<script>alert("Anda telah berjaya log keluar.");
            window.location.href="index.php";</script>';
exit();
?>
