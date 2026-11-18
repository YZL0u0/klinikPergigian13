<?php
include "header.php";
include "nav.php";
include "db_conn.php"
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
    table{
        margin: auto;
    }
    td{
        padding: 10px;
        color: var(--text);
    }
    input [type=date], select{
        width: 200px;
        padding: 10px;
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
    <?php
    $kod=$_GET['kod'];
    if(isset($_POST['edit'])){
        $query ="UPDATE servis
            SET nama_servis='".$_POST["nama"]."',
            harga_servis='".$_POST["harga"]."'
            WHERE kod_servis='$kod'";
        if (mysqli_query($conn,$query)){
            echo '<script>alert("Berjaya Kemaskini Servis!");
                window.location.href="servis.php";
                </script>';
        }else{
            echo "Error ; " . mysqli_error($conn);     
        }
    }
    $sql = "SELECT * FROM servis WHERE kod_servis='$kod'";
    $result = mysqli_query($conn,$sql) or die(mysqli_connect_error());
    $row = mysqli_fetch_array($result);
    ?>

    <div id="borang">
        <h2 class="lilita-one-regular">Borang Kemaskini Servis</h2>
        <form action="edit_servis.php?kod=<?php echo $kod; ?>" method="post">
            <table>
                <tr>
                    <td>Kod Servis</td>
                    <td>:</td>
                <td><?php echo $row['kod_servis'];?></td>
                </tr>
                <tr>
                    <td>Nama Servis</td>
                    <td>:</td>
                    <td><input type="text" name="nama" value="<?php echo $row['nama_servis'];?>" required></td>
                </tr>
                <tr>
                    <td>Harga (RM)</td>
                    <td>:</td>
                    <td><input type="text" name="harga" value="<?php echo $row['harga_servis'];?>" required></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" name="edit" value="KEMASKINI"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
<?php include "footer.php"; ?>