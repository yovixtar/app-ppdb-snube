<?php
session_start();
if (!$_SESSION['nu-admin']) {
    header("Location: https://ppdb.iyabos.com/nu-admin/login");
            die();
}
$halaman = "detaildatapendaftar";
$kode_daftar = $_SERVER['QUERY_STRING'];
require('../template/main-template.php');