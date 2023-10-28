<?php
switch ($_GET['to']) {
    case 'contact':
        contact();
        break;
    case 'regist':
        regist();
        break;
    case 'ceknik':
        ceknik();
        break;
    case 'updateregist':
        $kode_daftar = $_GET['kd'];
        update($kode_daftar);
        break;

    default:
        nothing();
        break;
}

function contact()
{
    $nama = $_POST['nama'];
    $pesan = $_POST['pesan'];
    $text = "Hallo, SMK NU Bodeh. Saya $nama ingin bertanya tentang PPDB, $pesan . Terima kasih.";
    $text_send = str_replace(" ", "%20", $text);
    header("Location: https://wa.me/6282340229588?text=$text_send");
    die();
}

function ceknik()
{
    $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
    $statement = $pdo->prepare("SELECT kode_daftar, nik FROM pendaftar WHERE nik = " . $_POST['nik'] . " AND nama_ibu = '" . $_POST['nama_ibu'] . "' LIMIT 1");
    $statement->execute([]);
    $hasil_cek = $statement->fetch(PDO::FETCH_ASSOC);
    if ($statement->rowCount() < 1) {
        header("Location: https://ppdb.iyabos.com/cek/?mesg=tidakada");
        die();
    } else {
        while ($hasil_cek) {
            $to = $hasil_cek['kode_daftar'];
            header("Location: https://ppdb.iyabos.com/data/?$to-");
            die();
        }
    }
}
function regist()
{
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nik = $_POST['nik'];
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
    $dk = $_POST['dukuh'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $kodepos = $_POST['kodepos'];
    $alamat = "Dukuh $dk RT/RW $rt/$rw Desa $desa, Kecamatan $kecamatan, Kabupaten $kabupaten $kodepos";
    $nomor_hp = $_POST['nomor_hp'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $nilai = $_POST['nilai'];
    $progdi = $_POST['progdi'];
    $kode_daftar = "23_$nik";

    $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");

    $sql_check = "SELECT nik FROM pendaftar WHERE nik = $nik";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([]);
    $stmt_check->fetch(PDO::FETCH_ASSOC);
    if ($stmt_check->rowCount() < 1) {
        $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
        $statement = $pdo->prepare("INSERT INTO pendaftar VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $data = array($kode_daftar, $nama, $tempat_lahir, $tanggal_lahir, $alamat, $jenis_kelamin, $nik, $nisn, $kip, $agama, $tahun_usia, $bulan_usia, $tinggi_badan, $berat_badan, $nama_ayah, $pekerjaan_ayah, $nama_ibu, $pekerjaan_ibu, $nomor_hp, $asal_sekolah, $nilai, $progdi);
        $input_pendaftar = $statement->execute($data);
        if (!$input_pendaftar) {
            $pdo_gagal = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
            $nik = $_POST['nik'];
            $kode_daftar = "22_$nik";
            $sql_gagal = "INSERT INTO log_ppdb (status, kode_daftar, waktu, hasil) VALUES(1, ?, now(), 'Gagal' )";
            $stmt_gagal = $pdo_gagal->prepare($sql_gagal);
            $stmt_gagal->execute([$kode_daftar]);
            header("Location: https://ppdb.iyabos.com/daftar/?mesg=gagal");
            die();
        } else {
            $pdo_berhasil = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
            $nik = $_POST['nik'];
            $kode_daftar = "22_$nik";
            $sql_berhasil = "INSERT INTO log_ppdb (status, kode_daftar, waktu, hasil) VALUES(1, ?, now(), 'Berhasil' )";
            $stmt_berhasil = $pdo_berhasil->prepare($sql_berhasil);
            $stmt_berhasil->execute([$kode_daftar]);
            header("Location: https://ppdb.iyabos.com/data/?$kode_daftar-berhasilregist");
            die();
        }
    } else {
        header("Location: https://ppdb.iyabos.com/cek/?nik=$nik&mesg=sudahada");
        die();
    }
}
function update($kode_daftar)
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
            header("Location: https://ppdb.iyabos.com/data/?$kode_daftar-mesg=gagalupdate");
            die();
        } else {
            $pdo_berhasil = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
            $sql_berhasil = "INSERT INTO log_ppdb (status, kode_daftar, waktu, hasil) VALUES(2, ?, now(), 'Berhasil' )";
            $stmt_berhasil = $pdo_berhasil->prepare($sql_berhasil);
            $stmt_berhasil->execute([$kode_daftar]);
            header("Location: https://ppdb.iyabos.com/data/?$kode_daftar-berhasilupdate");
            die();
        }
    } else {
        header("Location: https://ppdb.iyabos.com/cek/?mesg=tidakada");
        die();
    }
}
function nothing()
{
    header("Location: https://ppdb.iyabos.com");
    die();
}
