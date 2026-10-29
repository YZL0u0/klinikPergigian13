<style>
    #menu{
        text-align: center;
        padding: 1px 0;
        background-color: black;
        font-family: Tahoma;
        font-size: 13 px;
        color:white;
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
</style>

<nav id="menu">
    <h3>
        <?php
        if($_SESSION['peranan']=="admin"){ ?>
             <a href="utama.php">Utama</a>|
             <a href="servis.php">Perkhidmatan</a>|
             <a href="senarai.php">Senarai Janji Temu</a>
             <?php
        }
        else{ ?>
             <a href="utama.php">Utama</a>|
             <a href="servis.php">Perkhidmatan</a>|
             <a href="borang_temu.php">Borang Janji Temu</a>|
             <a href="senarai.php">Senarai Janji Temu</a>
        <?php } ?>
</h3>
</nav>
