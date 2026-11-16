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
    body{
        background:var(--background);
    }
    main{
        max-width: 900px;
        margin: 20px auto;
        padding: 20px;
    }
    #tajuk{
        text-align: center;
    }
    table {
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
       background-color: var(--secondary-text);
        color: var(--navbar);
        text-align: center;
    }
    td:nth-child(1){
        text-align: center;
    }
</style>

<main>
    <div id="tajuk" class="lilita-one-regular" style="font-size: 25px">Senarai Janji Temu</div><br><br>
    <form action="" method="post">
        <center><select name="kategori">
            <option>- Pilih Carian -</option>
            <option value="tarikh">Tarikh</option>
            <option value="servis">Servis</option>
        </select>
     :  <input type="text" name="carian">
        <input type="submit" value="Cari" name="cari">
</center>
    </form>
    <?php
    $sql= "SELECT 
            janjitemu.no_janjitemu,
            janjitemu.tarikh_temu,
            janjitemu.masa_temu,
            janjitemu.no_telefon,
            pesakit.nama_pesakit,
            GROUP_CONCAT(servis.harga_servis SEPARATOR '<br>') AS harga_servis,
            GROUP_CONCAT(servis.nama_servis SEPARATOR '<br>') AS servis
          FROM janjitemu
          JOIN janjitemu_servis
                ON janjitemu.no_janjitemu = janjitemu_servis.no_janjitemu
          JOIN servis
                ON janjitemu_servis.kod_servis = servis.kod_servis
          JOIN pesakit
                ON janjitemu.no_telefon = pesakit.no_telefon";
    
    $where ="";
    if ($_SESSION['peranan']=="pesakit"){
        $where=" WHERE janjitemu.no_telefon='".$_SESSION['notel']."'";
    }
    if (isset($_POST['cari'])&& !empty($_POST['carian'])){
        if($where==""){
            $where=" WHERE ";}
        else{
            $where .=" AND ";
        }
        if ($_POST['kategori']=="tarikh"){
            $where .="tarikh_temu LIKE '%".$_POST['carian']."%'";
        }
        else{
            $where .="nama_servis LIKE  '%".$_POST['carian']."%'";
        }
    }
    $sql .=$where;

    $sql .=" GROUP BY janjitemu.no_janjitemu
             ORDER BY janjitemu.tarikh_temu";
    $result =mysqli_query($conn,$sql);

    if (mysqli_num_rows($result)>0){
        ?>
        <br>
        <table>
            <tr>
                <th width='80'>No. Janji Temu</th>
                <th width='100'>Tarikh / Masa</th>
                <th width='250'>Servis</th>
                <th width='100'>Harga</th>

                <?php if ($_SESSION['peranan']=="admin"){
                    echo "<th>Nama Pesakit</th>";
                } ?>
                <th>Tindakan</th>
            </tr>
            <?php
                while ($row=mysqli_fetch_assoc($result)){
                    $no_janjitemu = "JT".str_pad($row['no_janjitemu'],3,"0",STR_PAD_LEFT)
                    ?>
                    <tr>
                        <td><?php echo $no_janjitemu; ?></td>
                        <td><?php echo $row['tarikh_temu']." ".$row['masa_temu']; ?></td>
                        <td><?php echo $row['servis']; ?></td>
                        <td><?php echo $row['harga_servis'];?></td>

                        <?php
                        if ($_SESSION['peranan']=="admin"){
                            echo "<td>".$row['nama_pesakit']."</td>";
                        } ?>
                        <td style="text-align: center;">
                            <a href="padam.php?no=<?php echo $row['no_janjitemu']; ?>"
                            onclick="return confirm('Adakah anda pasti mahu memadam janji temu ini?');">
                            <img src='images/delete.png' width='23' height='23' title='Padam'>
                        </a>
                        </td>
                    </tr>
                    <?php } ?>
        </table>
        <p align="center"><button onclick="window.print()">Cetak</button></p>
        <?php 
    }
    else { echo "<center>Tiada rekod</center>";}
    ?>
</main>

<?php
include "footer.php";
mysqli_close($conn);
?>