<?php
include "header.php";
include "nav.php";
include "db_conn.php";
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
td {padding: 10px;}

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
        <h2>Borang Janji Temu</h2>
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
                        <option>10:00 am</option>
                        <option>10:30 am</option>
                        <option>11:00 am</option>
                        <option>02:00 pm</option>
                        <option>02:30 pm</option>
                        <option>03:00 pm</option>
                        <option>03:30 pm</option>
                        <option>04:00 pm</option>
                    </select></td>
                </tr>
                <tr>
                    <td valign="top">Perkhidmatan</td>
                    <td valign="top">:</td>
                    <td>
                        <?php
                        $sql= "SELECT * FROM "
                    </td>
                </tr>
            </table>
        </form>
</body>