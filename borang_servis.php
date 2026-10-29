<?php
include "header.php";
include "nav.php";
?>
<style>
    body{
        font: 16px "Segoe UI";
        background: white;
    }
    #borang{
        width: 520px;
        padding: 35px 40px;
        background: #f5f5f5;
        border-radius: 15px;
        margin: 40px auto;
        box-shadow: 0 10px 25px rgba (0,0,0,0.08);
    }
    h2{
        color: black;
        text-align: center;
    }
    table{
        margin: auto;
    }
    td{
        padding: 10px;
    }
    input [type=text], input[type=number]{
        width: 250px;
        padding: 5px;
        background-color: white;
        border-radius: 5px;
    }
    input [type=submit]{
        padding: 12px 35px;
        background: #367FC4;
        color: white;
        border: 0;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
    }
</style>
<body>
    <div id="borang">
        <h2>Borang Tambah Perkhidmatan</h2>
        <form action="proses_servis.php" method="post">
            <table>
                <tr>
                    <td>Kod</td>
                    <td>:</td>
                    <td><input type="text" name="kod" required></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td>Harga (RM)</td>
                    <td>:</td>
                    <td><input type="text" name="harga" required></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" value="SIMPAN"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
<?php include "footer.php"; ?>