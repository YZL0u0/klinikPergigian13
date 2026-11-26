<style>
    #menu {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;

    padding: 12px 8px;
    background-color: navbar;
    font-family: Tahoma;
    font-size: 15px;
    color: white;
    }
    #menu h3 {
    display: contents;
}

.menu-links {
    grid-column: 2;
    display: flex;
    align-items: center;
    justify-content: center;
    white-space: nowrap;
}
    #menu a{
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
    }
    #menu a:hover{
        color: #2675B8;
        background-color: #D9F5EF;
    }
    a{
        text-decoration: none;
    }
    .gtranslate_wrapper {
    grid-column: 3;
    justify-self: end;
}
    .gtranslate_wrapper select {
    background: rgba(255,255,255,0.15);
    color: white;
    border: 1px solid rgba(255,255,255,0.5);
    border-radius: 8px;
    padding: 8px 14px;
    cursor: pointer;
    font-size: 13px;
    box-sizing: border-box;
}
    .gtranslate_wrapper select option {
    background-color: var(--navbar);
    color: white;
}

/* Currently selected language */
.gtranslate_wrapper select option:checked {
    background-color: #51C8B5;
    color: white;
}
</style>
<nav id="menu">
    <h3>
    <div class="menu-links">
        <?php
        if($_SESSION['peranan']=="admin"){ ?>
            <a href="utama.php" class="nav-translation notranslate"
            translate="no"
            data-ms="Utama"
            data-en="Home"
            data-zh="主页">Utama</a>|
             <a href="servis.php">Servis</a>|
             <a href="senarai.php">Senarai Janji Temu</a>
             <?php
        }
        else{ ?>
            <a href="utama.php" class="nav-translation notranslate"
            translate="no"
            data-ms="Utama"
            data-en="Home"
            data-zh="主页">Utama</a>|
             <a href="servis.php">Servis</a>|
             <a href="borang_temu.php">Borang Janji Temu</a>|
             <a href="senarai.php">Senarai Janji Temu</a>
        <?php } ?>
     </div>
</h3>

    <div class="gtranslate_wrapper"></div>
</nav>

<script>
    
window.gtranslateSettings = {
    "default_language": "ms",
    "languages": ["ms", "en","zh-CN"],
    "wrapper_selector": ".gtranslate_wrapper"
}
</script>
<script src="https://cdn.gtranslate.net/widgets/latest/dropdown.js"
defer></script>
<script>
const customTranslations = {

    "S01": {
        en: "Consultation",
        zh: "牙科咨询"
    },

    "S02": {
        en: "Routine Dental Cleaning",
        zh: "常规洗牙"
    },

    "S03": {
        en: "Small Filling",
        zh: "小型补牙"
    },

    "S04": {
        en: "Multiple Fillings",
        zh: "多颗牙齿补牙"
    },

    "S05": {
        en: "Root Canal Treatment",
        zh: "根管治疗"
    },

    "S06": {
        en: "Dental Crown",
        zh: "牙冠修复"
    },

    "S07": {
        en: "Fluoride Treatment",
        zh: "氟化物治疗"
    },

    "S08": {
        en: "Deep Cleaning (Per Quadrant)",
        zh: "深层洗牙（每个象限）"
    },

    "S09": {
        en: "Full Mouth Deep Cleaning",
        zh: "全口深层洗牙"
    },

    "S10": {
        en: "Teeth Whitening",
        zh: "牙齿美白"
    },

    "S11": {
        en: "Dental Braces",
        zh: "牙齿矫正器"
    },

    "S12": {
        en: "Dentures",
        zh: "假牙"
    },

    "S13": {
        en: "Simple Tooth Extraction",
        zh: "简单拔牙"
    },

    "S14": {
        en: "Surgical Tooth Extraction (Wisdom Tooth)",
        zh: "手术拔牙（智齿）"
    },

    "S15": {
        en: "Dental Implants",
        zh: "种植牙"
    }

};

function updateServiceNames() {

    const dropdown = document.querySelector(
        ".gtranslate_wrapper select"
    );

    if (!dropdown) return;

    const language = dropdown.value.split("|").pop();

    document.querySelectorAll(".service-name").forEach(element => {

        const code = element.dataset.code;
        const original = element.dataset.original;

        if (language === "en") {

            element.textContent =
                customTranslations[code]?.en || original;

        }

        else if (language === "zh-CN") {

            element.textContent =
                customTranslations[code]?.zh || original;

        }

        else if (language === "ms") {

            element.textContent = original;

        }

    });
}
function showTranslatedPage() {

    const dropdown = document.querySelector(
        ".gtranslate_wrapper select"
    );

    if (!dropdown) return;

    const selectedLanguage = dropdown.value.split("|").pop();

    if (selectedLanguage === "ms" ||
        selectedLanguage === localStorage.getItem("selectedLanguage")) {

        updateServiceNames();

        document.documentElement.classList.remove("translating");
    }
}
function updateBilHeader() {

    const dropdown = document.querySelector(
        ".gtranslate_wrapper select"
    );

    if (!dropdown) return;

    const language = dropdown.value.split("|").pop();

    document.querySelectorAll(".bil-header").forEach(element => {

        if (language === "en") {
            element.textContent = element.dataset.en;
        }
        else if (language === "zh-CN") {
            element.textContent = element.dataset.zh;
        }
        else {
            element.textContent = element.dataset.ms;
        }

    });
}
function updateNavLinks() {

    const dropdown = document.querySelector(
        ".gtranslate_wrapper select"
    );

    if (!dropdown) return;

    const language = dropdown.value.split("|").pop();

    document.querySelectorAll(".nav-translation").forEach(element => {

        if (language === "en") {
            element.textContent = element.dataset.en;
        }

        else if (language === "zh-CN") {
            element.textContent = element.dataset.zh;
        }

        else {
            element.textContent = element.dataset.ms;
        }

    });
}
function confirmDelete() {

    const dropdown = document.querySelector(
        ".gtranslate_wrapper select"
    );

    const language = dropdown
        ? dropdown.value.split("|").pop()
        : "ms";

    const messages = {
        ms: "Adakah anda pasti mahu memadam janji temu ini?",
        en: "Are you sure you want to delete this appointment?",
        "zh-CN": "确定要删除这个预约吗？"
    };

    return confirm(messages[language] || messages.ms);
}
// Detect language changes
document.addEventListener("change", function(event) {

    if (event.target.matches(".gtranslate_wrapper select")) {

        const language = event.target.value.split("|").pop();

        localStorage.setItem("selectedLanguage", language);

        updateServiceNames();
        updateBilHeader();
        updateNavLinks();
    }

});

// Run when the page loads
document.addEventListener("DOMContentLoaded", function() {
    updateServiceNames();
    updateBilHeader();
    updateNavLinks();
});
</script>


