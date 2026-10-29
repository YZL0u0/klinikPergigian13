<?php
include "header.php";
include "nav.php";
include "db_conn.php";
?>
<style>
    body {
        background-color: white;
    }
    main{
        max-width: 900px;
        margin: 20px auto;
        padding: 20px;
    }
    #tajuk{
        font: bold 25px "Segoe UI";
        text-align: center;
    }
    table{
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        background-color: white;
    }
    th, td{
        border: 1px solid #c0c0c0;
        padding: 7px;
    }
    th{
        background-color: #dcdcdc;
    }
    td:nth-child(1){
        text-align: center;
    }
    input[type=file]{
        background: white;
    }
</style>
<main>
    <div id ="tajuk">Senarai Servis<br><br>
    <?php
    if ($_SESSION['peranan']=="admin"){ ?>
    <button onclick="window.location.href='borang_servis.php'">
        Tambah Servis
    </button> <?php } ?>
</div>
<?php
$sql = "SELECT * FROM servis ORDER BY kod_servis";
$result = mysqli_query ($conn,$sql) or die(mysqli_connect_error());

$bil= 0;
if (mysqli_num_rows($result)> 0){
    ?>
    <br>
    <table>
        <tr>
            <th>Bil</th>
            <th>Kod</th>
            <th>Nama</th>
            <th>Harga</th>
            
            <?php 
            if ($_SESSION['peranan']=="admin"){
                echo "<th>Tindakan</th>";
            } ?>
        </tr>
        <?php 
        while ($row= mysqli_fetch_assoc($result)){
            $bil++;
            ?>
            <tr>
                <td><?php echo $bil."."; ?></td>
                <td><?php echo $row['kod_servis']; ?></td>
                <td><?php echo $row['nama_servis']; ?></td>
                <td><?php echo "RM ".$row['harga_servis']; ?></td>
                <?php
                if ($_SESSION['peranan']=="admin"){
                    ?>
                    <td style="text-align: center;">
                        <a href="edit_servis.php?kod=<?php echo $row['kod_servis']; ?>">
                            <img src='images/edit.png'width='23' height='23'title ='Edit'>
                        </a>
                        <a href ="padam_servis.php?kod=<?php echo $row['kod_servis']; ?>">
                            onclick="return confirm('Adakah anda pasti mahu memadam servis ini?');">
                            <img src='images/delete.png' width='23' height ='23' title='Padam'>
                        </a>
                    </td> 
                    <?php } ?>
            </tr>
        <?php } ?> 
    </table>
    <p align="center"><button onclick="window.print()">Cetak</button></p>
    <?php
}
else {echo "<center>Tiada rekod</center>";}
?>
</main>

<?php
if ($_SESSION['peranan']=="admin"){
    ?>
    <div id="tajuk">Muat Naik Data Servis</div>
    <p><form action="proses_muatnaik.php method="POST" enctype="multipart/form-data">
<center>
    Pilih fail untuk dimuat naik (Fail .txt sahaja):
    <input type="file" name="file_txt" accept=".txt" required>
    <input type="submit" name="upload" value="Muat Naik">
</center></form></p>
<?php }

include "footer.php";
mysqli_close($conn );
?>