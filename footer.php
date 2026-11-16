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
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }
    footer {
        background-color: #D9F5EF;
        text-align: center;
        padding: 15px 20px;
        font-family: Agrandir;
        font-size: 20px;
        font-style: italic;
        color: #263746;
        width: 100%;
        margin-top: auto; 
}
</style>
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
<footer>
Hak Cipta Terpelihara © Klinik Pergigian 13 2027
</footer>