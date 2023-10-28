<?php
session_start();
switch ($_GET['to']) {
    case 'login':
        login();
        break;
    case 'logout':
        logout();
        break;
    case 'updatedatapendaftar':
        $kode_daftar = $_POST['kd'];
        updatedatapendaftar($kode_daftar);
        break;
    case 'hapusdatapendaftar':
        $kode_daftar = $_GET['kd'];
        hapusdatapendaftar($kode_daftar);
        break;

    default:
        nothing();
        break;
}

function login()
{
    $password = md5($_POST['password']);
    $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
    $statement = $pdo->prepare("SELECT username FROM users WHERE username = '" . $_POST['username'] . "' AND password = '" . $password . "' LIMIT 1");
    $statement->execute();
    $hasil_cek = $statement->fetch(PDO::FETCH_ASSOC);
    if ($statement->rowCount() < 1) {
        header("Location: https://ppdb.iyabos.com/nu-admin/login/?mesg=gagallogin");
        die();
    } else {
        while ($hasil_cek) {
            $akun = $hasil_cek['username'];
            $_SESSION['nu-admin'] = $akun;
            header("Location: https://ppdb.iyabos.com/nu-admin");
            die();
        }
    }
}

function logout()
{
    session_start();
    session_destroy();

    header("Location: https://ppdb.iyabos.com/nu-admin/login");
}

function updatedatapendaftar($kode_daftar)
{
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nisn = $_POST['nisn'];
    $kip = $_POST['kip'];
    $agama = $_POST['agama'];
    $tahun_usia = $_POST['tahun_usia'];
    $bulan_usia = $_POST['bulan_usia'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $alamat = $_POST['alamat'];
    $nomor_hp = $_POST['nomor_hp'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $nilai = $_POST['nilai'];
    $progdi = $_POST['progdi'];

    $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");

    $sql_check = "SELECT kode_daftar FROM pendaftar WHERE kode_daftar = ?";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$kode_daftar]);
    $stmt_check->fetch(PDO::FETCH_ASSOC);
    if ($stmt_check->rowCount() > 0) {
        $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
        $statement = $pdo->prepare("UPDATE pendaftar SET nama=?, tempat_lahir=?, tanggal_lahir=?, alamat=?, jenis_kelamin=?, nisn=?, kip=?, agama=?, tahun_usia=?, bulan_usia=?, tinggi_badan=?, berat_badan=?, nama_ayah=?, pekerjaan_ayah=?, nama_ibu=?, pekerjaan_ibu=?, nomor_hp=?, asal_sekolah=?, nilai_skhun=?, program_studi=? WHERE kode_daftar = ?");
        $data = array($nama, $tempat_lahir, $tanggal_lahir, $alamat, $jenis_kelamin, $nisn, $kip, $agama, $tahun_usia, $bulan_usia, $tinggi_badan, $berat_badan, $nama_ayah, $pekerjaan_ayah, $nama_ibu, $pekerjaan_ibu, $nomor_hp, $asal_sekolah, $nilai, $progdi, $kode_daftar);
        $input_pendaftar = $statement->execute($data);
        if (!$input_pendaftar) {
            $pdo_gagal = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
            $sql_gagal = "INSERT INTO log_ppdb (status, kode_daftar, waktu, hasil) VALUES(2, ?, now(), 'Gagal' )";
            $stmt_gagal = $pdo_gagal->prepare($sql_gagal);
            $stmt_gagal->execute([$kode_daftar]);
            header("Location: https://ppdb.iyabos.com/nu-admin/?mesg=gagalupdate");
            die();
        } else {
            $pdo_berhasil = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
            $sql_berhasil = "INSERT INTO log_ppdb (status, kode_daftar, waktu, hasil) VALUES(2, ?, now(), 'Berhasil' )";
            $stmt_berhasil = $pdo_berhasil->prepare($sql_berhasil);
            $stmt_berhasil->execute([$kode_daftar]);
            header("Location: https://ppdb.iyabos.com/nu-admin/?mesg=berhasilupdate");
            die();
        }
    } else {
        header("Location: https://ppdb.iyabos.com/nu-admin/?mesg=tidakada");
        die();
    }
}
function hapusdatapendaftar($kode_daftar)
{
    $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");

    $sql_hapus = "DELETE FROM pendaftar WHERE kode_daftar = ?";
    $stmt_hapus = $pdo->prepare($sql_hapus);
    $hapus_db = $stmt_hapus->execute([$kode_daftar]);
    if (!$hapus_db) {
        $pdo_gagal = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
        $sql_gagal = "INSERT INTO log_ppdb (status, kode_daftar, waktu, hasil) VALUES(3, ?, now(), 'Gagal' )";
        $stmt_gagal = $pdo_gagal->prepare($sql_gagal);
        $stmt_gagal->execute([$kode_daftar]);
        header("Location: https://ppdb.iyabos.com/nu-admin/?mesg=gagalhapus");
        die();
    } else {
        $pdo_berhasil = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
        $sql_berhasil = "INSERT INTO log_ppdb (status, kode_daftar, waktu, hasil) VALUES(3, ?, now(), 'Berhasil' )";
        $stmt_berhasil = $pdo_berhasil->prepare($sql_berhasil);
        $stmt_berhasil->execute([$kode_daftar]);
        header("Location: https://ppdb.iyabos.com/nu-admin/?mesg=berhasilhapus");
        die();
    }
}

function nothing()
{
    header("Location: https://ppdb.iyabos.com/nu-admin");
    die();
}
