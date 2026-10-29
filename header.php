<?php
include "session.php";
?>
<title>.:::Klinik Pergigian 13:::.</title>
<style>
    *{box-sizing: border-box;}
    body{margin: 0;}

    @font-face {
    font-family: 'Porcelain';
    src: url('fonts/Porcelain.woff2') format('woff2'),
         url('fonts/Porcelain') format('opentype'); /* Fallback for older browsers */
    font-weight: normal;
    font-style: normal;
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
        <?php echo $_SESSION['nama'];?>
        <a href ="logout.php" title="Log Keluar">
            <img src="images/logout.png" width="35" height ="35">
        </a>
    </div>
</header>