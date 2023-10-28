<?php
$halaman = "data";

$pisah = explode("-", $_SERVER['QUERY_STRING']);
if (!$pisah) {
    $kode_daftar = $_SERVER['QUERY_STRING'];
} else {
    $kode_daftar = $pisah[0];
    $mesg = $pisah[1];
}
require('../template/second-template.php');
