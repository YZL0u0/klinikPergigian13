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
             <a href="utama.php">Utama</a>|
             <a href="servis.php">Servis</a>|
             <a href="senarai.php">Senarai Janji Temu</a>
             <?php
        }
        else{ ?>
             <a href="utama.php">Utama</a>|
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


