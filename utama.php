<?php
include "header.php";
include "nav.php";
?>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Poppins:ital@1&display=swap" rel="stylesheet">
<style>
    #utama{
            flex: 1;
            text-align: center;
            padding: 50px 20px;
            font-weight: bold;
            color: text;
        }
     .lilita-one-regular {
            font-family: "Lilita One", sans-serif;
            font-weight: 400;
            font-style: italic;
    }
     .poppins-regular-italic {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: italic;
    }
    #btn-temu{
        background-color: #247BA0;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 14px 35px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
    letter-spacing: 0.01em;
}
    #btn-temu:hover{
        background-color: #16658a;
    transform: translateY(-2px);
    }
    body.dark-mode .btn-temu :hover {
    background-color: #318FB8;
}
 /*       #btn-temu{
            padding: 13px 40px;
            font: bold 15px Arial;
            color: var(--text);
            background: var(--secondary-text);
            border: 3px solid var(--border);
            border-radius: 12px;
            text-decoration: none;
        }
        #btn-temu:hover{
            background-color:#D9F5EF;
            color: #367FC4;
        }*/
    </style>
    </head>
        <main id="utama">
            <img src="images/Logo.png" width="300" height="200">
            <h2 class="poppins-regular-italic">Selamat Datang ke <br>Sistem Janji Temu </h2>

            <?php
            if ($_SESSION['peranan']=="pesakit"){ ?>
            <br> <a href= "borang_temu.php" id="btn-temu">BUAT JANJI TEMU</a>
        <?php } ?>
        </main>
    </body>
    <?php include "footer.php";?>