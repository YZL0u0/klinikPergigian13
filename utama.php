<?php
include "header.php";
include "nav.php";
?>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Poppins:ital@1&display=swap" rel="stylesheet">
<style>
    :root {
        --header: #54CBB9;
        --navbar: #263F55;
        --background: #F6FAFC;
        --card: #FFFFFF;
        --primary: #247BA0;
        --text: #263746;
        --secondary-text: #263746
        --footer:  #D9F5EF;
        --border: #263746;
    }

    /* DARK MODE */
    body.dark-mode {
        --header: #234C5D;
        --navbar: #152536;
        --background: #101C2B;
        --card: #1B2A3B;
        --primary: #247BA0;
        --text: #EAF2F8;
        --secondary-text: #A7B6C7;
        --footer: #1D353F;
        --border: #34465A;
    }
    body {
    background-color: var(--background);
    color: var(--text);
    transition: background-color 0.3s, color 0.3s;
    }
    header {
    background-color: var(--header);
}

    nav {
    background-color: var(--navbar);
}

.card {
    background-color: var(--card);
    color: var(--text);
    border: 1px solid var(--border);
}

footer {
    background-color: var(--footer);
    color: var(--text);
}

button {
    background-color: var(--primary);
    color: white;
    }
    #utama{
            flex: 1;
            text-align: center;
            padding: 50px 20px;
            font-weight: bold;
            color: #263746;
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
            padding: 13px 40px;
            font: bold 15px Arial;
            color: #263746;
            background: white;
            border: 3px solid #263746;
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
const toggleButton = document.getElementById("themeToggle");

// Load previously saved theme
let currentTheme = localStorage.getItem("theme");

if (currentTheme === "dark") {
    document.body.classList.add("dark-mode");
    toggleButton.textContent = "☀️ Light Mode";
}

// Switch theme when clicked
toggleButton.addEventListener("click", function() {

    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {

        localStorage.setItem("theme", "dark");
        toggleButton.textContent = "☀️ Light Mode";

    } else {

        localStorage.setItem("theme", "light");
        toggleButton.textContent = "🌙 Dark Mode";

    }

});
</script>
        <main id="utama">
            <img src="images/logo.png" width="300" height="200">
            <h2 class="poppins-regular-italic">Selamat Datang ke <br>Sistem Janji Temu </h2>

            <?php
            if ($_SESSION['peranan']=="pesakit"){ ?>
            <br> <a href= "borang_temu.php" id="btn-temu">BUAT JANJI TEMU</a>
        <?php } ?>
        </main>
    </body>
    <?php include "footer.php";?>