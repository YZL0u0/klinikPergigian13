<?php
include "header.php";
include "nav.php";
?>
<head>
    <style>
        #utama{
            flex: 1;
            text-align: center;
            padding: 50px 20px;
            font-weight: bold;
            color: black;
        }
        #tajuk{
            font-size: 30px;
            font-family: Georgia;
            font-style: italic;
        }
        #btn-temu{
            padding: 13px 40px;
            font: bold 15px Arial;
            color: black;
            background: white;
            border: 3px solid black;
            border-radius: 8px;
            text-decoration: none;
        }
        #btn-temu:hover{
            background-color:#D9F5EF;
            color: #367FC4;
        }
    </style>
    </head>
    <body>
        <main id="utama">
            <img src="images/logo.png" width="300" height="200">
            <h2 id="tajuk">Selamat Datang ke <br>Sistem Janji Temu </h2>

            <?php
            if ($_SESSION['peranan']=="pesakit"){ ?>
            <br> <a href= "borang_temu.php" id="btn-temu">BUAT JANJI TEMU</a>
        <?php } ?>
        </main>
    </body>
    <?php include "footer.php";?>