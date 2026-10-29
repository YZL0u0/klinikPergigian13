<?php
include "header.php";
include "nav.php";
include "db_conn.php";
?>

<style>
    body{
        background: white;
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
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: left
        background-color: #f5f5f5;
    }
    th, td{
        border: 1px solid #c0c0c0;
        padding: 7px;
    }
    th{
        background-color: #dcdcdc;
        text-align: center;
    }
    td:nth-child(1){
        text-align: center;
    }
</style>

<main>
    <div id="tajuk">Senarai Janji Temu</div><br><br>
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
            GROUP_CONCAT(servis.harga_servis SEPERATOR ', ') AS harga
            GROUP_CONCAT(servis.nama_servis SEPERATOR ', ') AS servis
          FROM janjitemu
          JOIN janjitemu_servis
                ON janjitemu.no_janjitemu = janjitemu_servis.no_janjitemu
          JOIN servis
                ON janjitemu_servis.kod_servis = servis.kod_servis
          JOIN pelanggan
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
             ORDER BY tarikh_temu";
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
                        <td><?php echo $row['harga'];?></td>

                        <?php
                        if ($_SESSION['peranan']=="admin"){
                            echo "<td>".$row['nama_pesakit']."</td>";
                        } ?>
                    </tr>
                }
        </table>
    }
</main>