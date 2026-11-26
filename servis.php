<?php
include "header.php";
include "nav.php";
include "db_conn.php";
?>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Poppins:ital@1&display=swap" rel="stylesheet">
</head>
<style>
     .lilita-one-regular {
            font-family: "Lilita One", sans-serif;
            font-weight: 400;
            font-style: normal;
            letter-spacing: 0.01em;}
    body {
        background-color:var(--background);
    }
    main{
        max-width: 900px;
        margin: 20px auto;
        padding: 20px;
    }
    #tajuk{
        text-align: center;
        color: var(--text);
    }
    table{
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        background-color: var(--background);
    }
    th, td{
        border: 1px solid #0087F6;
        padding: 7px;
    }
    th{
        background-color: var(--borang);
        color: var(--text);
    }
    td:nth-child(1){
        text-align: center;
    }
    input[type=file]{
        border: 1px solid var(--border1);
        background: var(--background);
    }
</style>
<main>
    <div id ="tajuk" class="lilita-one-regular" style="font-size: 25px">Senarai Servis<br><br>
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
            <th class="bil-header notranslate"
            translate="no"
            data-ms="Bil"
            data-en="No."
            data-zh="序号">Bil</th>
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
                <td class="service-name notranslate" translate="no" data-code="<?php echo $row['kod_servis']; ?>"
                 data-original="<?php echo htmlspecialchars($row['nama_servis'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($row['nama_servis']); ?>
                </td>
                <td class="notranslate"><?php echo "RM ".$row['harga_servis']; ?></td>
                <?php
                if ($_SESSION['peranan']=="admin"){
                    ?>
                    <td style="text-align: center;">
                        <a href="edit_servis.php?kod=<?php echo $row['kod_servis']; ?>">
                            <img src='images/edit.png'width='23' height='23'title ='Edit'>
                        </a>
                        <a href ="padam_servis.php?kod=<?php echo $row['kod_servis']; ?>"
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
    <p><form action="proses_muatnaik.php" method="POST" enctype="multipart/form-data">
<center>
    Pilih fail untuk dimuat naik (Fail .txt sahaja):
    <input type="file" name="file_txt" accept=".txt" required>
    <input type="submit" name="upload" value="Muat Naik">
</center></form></p>
<?php }

include "footer.php";
mysqli_close($conn );
?>

 