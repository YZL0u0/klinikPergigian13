<?php
include "header.php";
include "nav.php";
?>
<head>
    <style>
    body {
        background-color: white;
        color: black;
    }

    body.dark {
        background-color: #171923;
        color: white;
    }

    .card {
        background-color: #f5f5f5;
        padding: 20px;
    }

    body.dark .card {
        background-color: #242938;
    }
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
        <script>
    function toggleDarkMode() {
        document.body.classList.toggle("dark");

        // Save the user's preference
        if (document.body.classList.contains("dark")) {
            localStorage.setItem("theme", "dark");
        } else {
            localStorage.setItem("theme", "light");
        }
    }

    // Load saved preference
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark");
    }
</script>
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