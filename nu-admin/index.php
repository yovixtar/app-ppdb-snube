<?php
session_start();
if (!$_SESSION['nu-admin']) {
    header("Location: https://ppdb.iyabos.com/nu-admin/login");
            die();
}
$halaman = "";
require('template/main-template.php');