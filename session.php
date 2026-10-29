<?php
session_start();
include "db_conn.php";

if(!isset($_SESSION['peranan'])){
    header("Location: index.php");
    exit();
}
?>