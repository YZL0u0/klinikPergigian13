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
        font: 16px "Segoe UI";
        background: var(--background);
    }
    #borang{
        width: 520px;
        padding: 35px 40px;
        background: var(--borang);
        border-radius: 15px;
        margin: 40px auto;
        box-shadow: 0 10px 25px rgba (0,0,0,0.08);
    }
    h2{
        color: var(--text);
        text-align: center;
}
.item{
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 12px;
}
.item input {
    margin-top: 5px;
}
table { margin: auto; }
td {padding: 10px; color: var(--text);}

input[type=date], select{
    width: 250px;
    padding: 7px;
    background-color: white;
    border-radius: 5px;
}
input [type=submit]{
    padding: 12px 35px;
    background: #2675B8;
    color: white;
    border: 0;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
}
</style>
<body>
    <div id="borang">
        <h2 class="lilita-one-regular">Borang Janji Temu</h2>
        <form action="proses_temu.php" method="post">
            <table>
                <tr>
                    <td>Tarikh</td>
                    <td>:</td>
                    <td><input type="date" name="tarikh" required></td>
                </tr>
                <tr>
                    <td>Masa</td>
                    <td>:</td>
                    <td><select name="masa" required>
                        <option value="">-- Pilih Masa --</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>14:00</option>
                        <option>14:30</option>
                        <option>15:00</option>
                        <option>15:30</option>
                        <option>16:00</option>
                    </select></td>
                </tr>
                <tr>
                    <td valign="top">Servis</td>
                    <td valign="top">:</td>
                    <td>
                        <?php
                        $sql= "SELECT * FROM servis ORDER BY kod_servis";
                        $data= mysqli_query($conn,$sql);

                        if ($data && mysqli_num_rows($data)>0){
                            while ($row =mysqli_fetch_assoc($data)){
                                echo '<label class="item">';
                                echo '<input type="checkbox" name="servis[]" 
                                            value ="' . htmlspecialchars($row['kod_servis'], ENT_QUOTES, 'UTF-8') .'">';
                                echo '<span class="service-name notranslate"
                                        translate="no"
                                        data-code="' . htmlspecialchars($row['kod_servis'], ENT_QUOTES, 'UTF-8') . '"
                                        data-original="' . htmlspecialchars($row['nama_servis'], ENT_QUOTES, 'UTF-8') . '">';
                                echo htmlspecialchars($row['nama_servis'], ENT_QUOTES, 'UTF-8');
                                echo '</span>';
                                echo '</label>';
                            }
                        }else { echo 'Tiada rekod'; }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" value="HANTAR"></td>
                </tr>
            </table>
        </form>
</div>
</body>
<?php include "footer.php"; ?>