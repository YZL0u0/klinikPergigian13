<?php
include "session.php";
?>
<title>.:::Klinik Pergigian 13:::.</title>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Poppins:ital@1&display=swap" rel="stylesheet">
</head>
<style>
    :root {
        --header: #54CBB9;
        --navbar: #263F55;
        --background: #F6FAFC;
        --card: #FFFFFF;
        --primary: white;
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
    *{box-sizing: border-box;}
    @font-face {
    font-family: 'Porcelain';
    src: url('fonts/Porcelain.woff2') format('woff2'),
         url('fonts/Porcelain') format('opentype'); /* Fallback for older browsers */
    font-weight: normal;
    font-style: normal;
    }
     .lilita-one-regular {
            font-family: "Lilita One", sans-serif;
            font-weight: 100;
            font-style: normal;
            letter-spacing: 0.01em;
    }
    #top-bar{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 30px;
        background-color: #54CBB9;
    }
    #logo-teks{
        font-family: 'Porcelain';
        font-size: 35px;
        margin: 0;
        color: white;
        letter-spacing: 0.1em;
    }
    #nama{
        display: flex;
        align-items: center;
        gap: 15px;
        font-family: 'Calibri';
        font-size: 20px;
        color: white;
        font-style: italic;
    }
</style>
<header id="top-bar">
    <h1 id="logo-teks">KLINIK PERGIGIAN 13</h1>
    <div id="nama">
    <button id="themeToggle">
    🌙 Dark Mode
</button>
        <?php echo $_SESSION['nama'];?>
        <a href ="logout.php" title="Log Keluar">
            <img src="images/logout.png" width="35" height ="35">
        </a>
    </div>
</header>
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
</body>
