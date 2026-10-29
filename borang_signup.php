<html>
    <head>
        <title>.:::Klinik Pergigian 13:::.</title>
        <style>
            *{
                box-sizing: border-box;
                margin: 0; padding: 0;
            }
            body{
                font-family: Georgia, sans-serif;
                background: url('images/img_latar.png')center/cover;
            }
            #main-container{
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            #teks-tajuk{
                font-size: 32px;
                margin: 5px 0 30px;
            }
            #teks-log{
                font-size: 30px;
                font-family: Tw Cen MT Condensed;
                text-align: center;
                margin: -10px 0 30px;
            }
            #kotak-signup{
                width: 100%;
                max-width: 480px;
                border-radius: 20px;
                padding: 35px; 
                box-shadow: 0 10px 25px rgba (0,0,0,0.08);
                text-align: center;
            }
            #kotak-input{
                margin-bottom: 25px;
            }
            #kotak-input input{
                width: 80%;
                padding: 15px;
                border: solid #e0e0e0;
                border-radius: 10px;
                font-size: 16px;
                outline: none;
                margin-bottom: 5px;
            }
            .btn{
                width: 80%;
                padding: 14px;
                border-radius: 10px;
                font: bold 13px Ariel;
                cursor: pointer;
                margin-bottom: 5px;
                border: 0;
            }
            .btn-sign{
                background-color: #54CBB9;
                color: white;
            }
            .btn-back{
                background-color: white;
                color: #54CBB9;
                border: 2px solid #54CBB9;
            }
        </style>
    </head>
    <body>
        <div id="main-container">
            <img src="images/logo.png" width="300" height="200">
            <h2 id="teks-tajuk">Sistem Janji Temu</h2>
            <div id="kotak-signup">
                <h3 id="teks-log">Daftar Akaun Baharu</h3>
                <form action="proses_signup.php" method="POST">
                    <div id="kotak-input">
                        <input type="tel" name="no_tel" placeholder="No Telefon (012-XXXXXXX)" 
                        pattern="[0-9]{3}-[0-9]{7,8}" title="012-3456789 atau 012-34567890" required>
                        <input type ="text" name="nama" placeholder="Nama Penuh" required>
                    </div>
                    <button type="submit" name="btn_daftar" class="btn btn-sign">DAFTAR SEKARANG</button>
                </form>
                <a href="index.php">
                    <button type="button" class="btn btn-back">KEMBALI</button>
                </a>
            </div>         
        </div>
        <?php
        include "footer.php";
        ?>
    </body>
</html>