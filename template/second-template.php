<?php require('config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>PPDB SMK NU Bodeh</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= $base_url ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= $base_url ?>/assets/images/logo_smk_nu_bodeh.png" type="image/x-icon">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= $base_url ?>/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= $base_url ?>/assets/css/templatemo-eduwell-style.css">
    <link rel="stylesheet" href="<?= $base_url ?>/assets/css/owl.css">
    <link rel="stylesheet" href="<?= $base_url ?>/assets/css/lightbox.css">
</head>

<body>


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="<?= $base_url ?>/#top" class="logo">
                            <img src="<?= $base_url ?>/assets/images/logo_smk_nu_bodeh_header.png" alt="EduWell Template">
                        </a>

                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="<?= $base_url ?>" class="active">Beranda</a></li>
                            <li class="scroll-to-section"><a href="<?= $base_url ?>">Progdi</a></li>
                            <li class="scroll-to-section"><a href="<?= $base_url ?>">Prosedur</a></li>
                            <li class="scroll-to-section"><a href="<?= $base_url ?>">Persyaratan</a></li>
                            <!-- <li class="scroll-to-section"><a href="<?= $base_url ?>/daftar"><font class="daftar">Daftar</font></a></li>  -->
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <?php
    switch ($halaman) {
        case 'data':
            $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
            $statement = $pdo->prepare("SELECT * FROM pendaftar WHERE kode_daftar = ? LIMIT 1");
            $statement->execute([$kode_daftar]);
            $hasil_form = $statement->fetch(PDO::FETCH_ASSOC);
            if ($statement->rowCount() > 0) {
                while ($hasil_form) {

    ?>
                    <section class="page-heading">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="header-text pb-5">
                                        <h1>Bukti PPDB <em></em></h1>
                                        <h2>NIK <strong style="font-style: normal; color: #11998e;"><?= $hasil_form['nik'] ?></strong></h2>
                                        <h4>Mohon pastikan anda mengisi semua form dengan benar.</h4>
                                        <?php
                                        if ($mesg != "") {
                                            switch ($mesg) {
                                                case 'gagalupdate':
                                        ?>
                                                    <div class="alert-danger rounded text-center mx-auto p-4 my-3">
                                                        Gagal Mengupdate, isi form dengan benar.
                                                    </div>
                                                <?php
                                                    break;
                                                case 'berhasilupdate':
                                                ?>
                                                    <div class="alert-success rounded text-center mx-auto p-4 my-3">
                                                        Berhasil Mengupdate data Pendaftar.
                                                    </div>
                                                <?php
                                                    break;
                                                case 'berhasilregist':
                                                ?>
                                                    <div class="alert-success rounded text-center mx-auto p-4 my-3">
                                                        Berhasil Mengisi data Pendaftar.
                                                    </div>
                                        <?php
                                                    break;

                                                default:
                                                    echo "";
                                                    break;
                                            }
                                        }
                                        ?>
                                        <div class="mt-4">
                                        <a href="<?= $base_url ?>/data/cetak.php?<?= $hasil_form['kode_daftar'] ?>" target="_BLANK">
                                            <button class="btn btn-primary btn-lg btn-block">Cetak / Download Bukti Pendaftaran</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="contact-us mt-0" id="contact-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">

                                    <form id="contact" action="<?= $base_url; ?>/acc/?to=updateregist&kd=<?= $hasil_form['kode_daftar'] ?>" method="post" class="mx-auto my-5">

                                        <div class="row">
                                            <div class="mb-3">
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Nama Lengkap</span>
                                                        </div>
                                                        <input type="text" name="nama" id="name" value="<?= $hasil_form['nama'] ?>" autocomplete="on" class="input" required>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Tempat/Tanggal Lahir</span>
                                                        </div>
                                                        <input type="text" name="tempat_lahir" id="name" value="<?= $hasil_form['tempat_lahir'] ?>" autocomplete="off" style="width:50%" class="input" required>
                                                        <input type="date" class="input" name="tanggal_lahir" id="name" value="<?= $hasil_form['tanggal_lahir'] ?>" autocomplete="off" style="width:50%" required>
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="col-lg-12 mb-5">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend mb-2" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Jenis Kelamin</span>
                                                        </div>
                                                        <div class="form-check form-check-inline ms-2">
                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_1" value="Laki - Laki" <?= ($hasil_form['jenis_kelamin'] == "Laki - Laki") ? "checked" : ""; ?>>
                                                            <label class="form-check-label" for="jenis_kelamin_1">Laki - Laki</label>
                                                        </div>
                                                        <div class="form-check form-check-inline ms-3">
                                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_2" value="Perempuan" <?= ($hasil_form['jenis_kelamin'] == "Perempuan") ? "checked" : ""; ?>>
                                                            <label class="form-check-label" for="jenis_kelamin_2">Perempuan</label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-5">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Nomor NISN</span>
                                                        </div>
                                                        <input type="text" name="nisn" id="nisn" placeholder="NISN (Nomor Induk Siswa Nasional)" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" autocomplete="off" required class="mb-0 input" value="<?= $hasil_form['nisn'] ?>">
                                                        <i class="text-secondary font-label-input">* Jumlah NISN 10 Digit</i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-5">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Nomor KIP / KIPS</span>
                                                        </div>
                                                        <input type="text" name="kip" id="kip" placeholder="KIP / KIPS" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14" autocomplete="off" required class="mb-0 input" value="<?= $hasil_form['kip'] ?>">
                                                        <i class="text-secondary font-label-input">* Jumlah Nomor KIP / KIPS 14 Digit, Bagi yang Memiliki</i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Agama</span>
                                                        </div>
                                                        <select name="agama" class="form-control" required>
                                                            <option value="">-- Pilih Agama --</option>
                                                            <option value="Islam" <?= ($hasil_form['agama'] == "Islam") ? "SELECTED" : ""; ?>>Islam</option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Usia</span>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="text" name="tahun_usia" id="tahun_usia" placeholder="Tahun" autocomplete="off" style="width:35%" class="input" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?= $hasil_form['tahun_usia'] ?>" required>
                                                            <div class="input-group-append" style="width: 15%">
                                                                <span class="input-group-text" id="">Th</span>
                                                            </div>

                                                            <input type="text" class="input" name="bulan_usia" id="bulan_usia" placeholder="Bulan" autocomplete="off" style="width:35%" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?= $hasil_form['bulan_usia'] ?>" required>
                                                            <div class="input-group-append" style="width: 15%">
                                                                <span class="input-group-text" id="">Bl</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Tinggi / Berat</span>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="text" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi" autocomplete="off" style="width:40%" class="input" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?= $hasil_form['tinggi_badan'] ?>" required>
                                                            <div class="input-group-append" style="width: 10%">
                                                                <span class="input-group-text" id="">Cm</span>
                                                            </div>

                                                            <input type="text" class="input" name="berat_badan" id="berat_badan" placeholder="Berat" autocomplete="off" style="width:40%" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?= $hasil_form['berat_badan'] ?>" required>
                                                            <div class="input-group-append" style="width: 10%">
                                                                <span class="input-group-text" id="">Kg</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <div class="input-group">

                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Ayah</span>
                                                        </div>
                                                        <input type="text" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" autocomplete="off" class="mb-0 input" value="<?= $hasil_form['nama_ayah'] ?>" required>
                                                        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" autocomplete="off" class="input" value="<?= $hasil_form['pekerjaan_ayah'] ?>" required>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Ibu</span>
                                                        </div>
                                                        <input type="text" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" autocomplete="off" class="mb-0 input" value="<?= $hasil_form['nama_ibu'] ?>" required>
                                                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" autocomplete="off" class="input" value="<?= $hasil_form['pekerjaan_ibu'] ?>" required>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Alamat Lengkap</span>
                                                        </div>
                                                        <textarea name="alamat"><?= $hasil_form['alamat'] ?></textarea>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-5">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Nomor HP / WA</span>
                                                        </div>
                                                        <input type="text" name="nomor_hp" id="nomor_hp" placeholder="Contoh : 08123456789" autocomplete="off" required class="mb-0 input" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?= $hasil_form['nomor_hp'] ?>">
                                                        <i class="text-secondary font-label-input">* Jika tidak memiliki no HP / WA, Gunakan no HP / WA Orang tua atau saudara.</i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Asal Sekolah</span>
                                                        </div>
                                                        <input type="text" name="asal_sekolah" id="asal_sekolah" placeholder="SMP..." autocomplete="off" class="input" value="<?= $hasil_form['asal_sekolah'] ?>" required>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Nilai SKHUN</span>
                                                        </div>
                                                        <input type="text" name="nilai" class="input" id="nilai" placeholder="Contoh : 90.000" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off" value="<?= $hasil_form['nilai_skhun'] ?>" required>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend" style="width:100%;">
                                                            <span class="input-group-text font-input" id="">Program Studi</span>
                                                        </div>
                                                        <select name="progdi" class="form-control" required>
                                                            <option value="0">-- Pilih Program Studi --</option>
                                                            <option value="1" <?= ($hasil_form['program_studi'] == 1) ? "SELECTED" : ""; ?>>Akuntansi</option>
                                                            <option value="2" <?= ($hasil_form['program_studi'] == 2) ? "SELECTED" : ""; ?>>Teknik Sepeda Motor</option>
                                                            <option value="3" <?= ($hasil_form['program_studi'] == 3) ? "SELECTED" : ""; ?>>Teknik Kendaraan Ringan</option>
                                                            <option value="4" <?= ($hasil_form['program_studi'] == 4) ? "SELECTED" : ""; ?>>Teknik Komputer dan Jaringan</option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-gradient-button">Update Data Saya</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
            <?php
                    $hasil_form = false;
                }
            } else {
                header("Location: https://ppdb.iyabos.com/cek?mesg=tidakada");
                die();
            }
            break;











        default:
            ?>
            <section class="page-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header-text pb-5">
                                <h4>Pendaftaran SMK NU Bodeh</h4>
                                <h1>FORM <em style="font-style: normal; color: #11998e;">PPDB</em></h1>
                                <h4>Mohon pastikan anda mengisi semua form dengan benar.</h4>
                                <?php
                                if (isset($_GET['mesg'])) {
                                    switch ($_GET['mesg']) {
                                        case 'gagal':
                                ?>
                                            <div class="alert-danger rounded text-center mx-auto p-4 my-3">
                                                Gagal Mendaftar, isi form dengan benar.
                                            </div>
                                <?php
                                            break;

                                        default:
                                            echo "";
                                            break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="contact-us mt-0" id="contact-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="contact" action="<?= $base_url; ?>/acc/?to=regist" method="post" class="mx-auto my-5">
                                <div class="row">
                                    <div class="mb-3">
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Nama Lengkap</span>
                                                </div>
                                                <input type="text" name="nama" id="name" placeholder="Nama Lengkap..." autocomplete="on" class="input" required>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Tempat/Tanggal Lahir</span>
                                                </div>
                                                <input type="text" name="tempat_lahir" id="name" placeholder="Tempat Lahir" autocomplete="off" style="width:50%" class="input" required>
                                                <input type="date" class="input" name="tanggal_lahir" id="name" placeholder="Tanggal Lahir" autocomplete="off" style="width:50%" required>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-12 mb-5">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend mb-2" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Jenis Kelamin</span>
                                                </div>
                                                <div class="form-check form-check-inline ms-2">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_1" value="Laki - Laki">
                                                    <label class="form-check-label" for="jenis_kelamin_1">Laki - Laki</label>
                                                </div>
                                                <div class="form-check form-check-inline ms-3">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_2" value="Perempuan">
                                                    <label class="form-check-label" for="jenis_kelamin_2">Perempuan</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Nomor NIK</span>
                                                </div>
                                                <input type="text" name="nik" id="nik" placeholder="NIK (Nomor Induk Kependudukan)" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="16" autocomplete="off" required class="mb-0 input">
                                                <i class="text-secondary font-label-input">* Jumlah NIK 16 Digit, ada didalam KK (Pastikan benar)</i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Nomor NISN</span>
                                                </div>
                                                <input type="text" name="nisn" id="nisn" placeholder="NISN (Nomor Induk Siswa Nasional)" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" autocomplete="off" required class="mb-0 input">
                                                <i class="text-secondary font-label-input">* Jumlah NISN 10 Digit</i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Nomor KIP / KIPS</span>
                                                </div>
                                                <input type="text" name="kip" id="kip" placeholder="KIP / KIPS" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14" autocomplete="off" required class="mb-0 input">
                                                <i class="text-secondary font-label-input">* Jumlah Nomor KIP / KIPS 14 Digit, Bagi yang Memiliki</i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Agama</span>
                                                </div>
                                                <select name="agama" class="form-control" required>
                                                    <option value="">-- Pilih Agama --</option>
                                                    <option value="Islam">Islam</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Usia</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" name="tahun_usia" id="tahun_usia" placeholder="Tahun" autocomplete="off" style="width:35%" class="input" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                    <div class="input-group-append" style="width: 15%">
                                                        <span class="input-group-text" id="">Th</span>
                                                    </div>

                                                    <input type="text" class="input" name="bulan_usia" id="bulan_usia" placeholder="Bulan" autocomplete="off" style="width:35%" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                    <div class="input-group-append" style="width: 15%">
                                                        <span class="input-group-text" id="">Bl</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Tinggi / Berat</span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi" autocomplete="off" style="width:40%" class="input" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                    <div class="input-group-append" style="width: 10%">
                                                        <span class="input-group-text" id="">Cm</span>
                                                    </div>

                                                    <input type="text" class="input" name="berat_badan" id="berat_badan" placeholder="Berat" autocomplete="off" style="width:40%" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                    <div class="input-group-append" style="width: 10%">
                                                        <span class="input-group-text" id="">Kg</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <div class="input-group">

                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Ayah</span>
                                                </div>
                                                <input type="text" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" autocomplete="off" class="mb-0 input" required>
                                                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" autocomplete="off" class="input" required>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Ibu</span>
                                                </div>
                                                <input type="text" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" autocomplete="off" class="mb-0 input" required>
                                                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" autocomplete="off" class="input" required>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Alamat Lengkap</span>
                                                </div>
                                                <div class="input-group-prepend" style="width:15%;">
                                                    <span class="input-group-text font-input" id="">Dk</span>
                                                </div>
                                                <input type="text" name="dukuh" id="dukuh" placeholder="Dukuh" autocomplete="off" class="mb-0 input-2" required>
                                                <div class="input-group-prepend" style="width:15%;">
                                                    <span class="input-group-text font-input" id="">RT</span>
                                                </div>
                                                <input type="text" name="rt" id="rt" placeholder="RT" autocomplete="off" class="mb-0 input-2" required>
                                                <div class="input-group-prepend" style="width:15%;">
                                                    <span class="input-group-text font-input" id="">RW</span>
                                                </div>
                                                <input type="text" name="rw" id="rw" placeholder="RW" autocomplete="off" class="mb-0 input-2" required>
                                                <div class="input-group-prepend" style="width:15%;">
                                                    <span class="input-group-text font-input" id="">Ds</span>
                                                </div>
                                                <input type="text" name="desa" id="desa" placeholder="Desa" autocomplete="off" class="mb-0 input-2" required>
                                                <div class="input-group-prepend" style="width:15%;">
                                                    <span class="input-group-text font-input" id="">Kec</span>
                                                </div>
                                                <input type="text" name="kecamatan" id="kecamatan" placeholder="Kecamatan" autocomplete="off" class="mb-0 input-2" required>
                                                <div class="input-group-prepend" style="width:15%;">
                                                    <span class="input-group-text font-input" id="">Kab</span>
                                                </div>
                                                <input type="text" name="kabupaten" id="kabupaten" placeholder="Kabupaten" autocomplete="off" class="mb-0 input-2" required>
                                                <div class="input-group-prepend" style="width:15%;">
                                                    <span class="input-group-text font-input" id="">Pos</span>
                                                </div>
                                                <input type="text" name="kodepos" id="kodepos" placeholder="Kode Pos" autocomplete="off" class="input-2" required>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Nomor HP / WA</span>
                                                </div>
                                                <input type="text" name="nomor_hp" id="nomor_hp" placeholder="Contoh : 08123456789" autocomplete="off" required class="mb-0 input" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                <i class="text-secondary font-label-input">* Jika tidak memiliki no HP / WA, Gunakan no HP / WA Orang tua atau saudara.</i>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Asal Sekolah</span>
                                                </div>
                                                <input type="text" name="asal_sekolah" id="asal_sekolah" placeholder="SMP..." autocomplete="off" class="input" required>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Nilai SKHUN</span>
                                                </div>
                                                <input type="text" name="nilai" class="input" id="nilai" placeholder="Contoh : 90.000" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off" required>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text font-input" id="">Program Studi</span>
                                                </div>
                                                <select name="progdi" class="form-control" required>
                                                    <option value="0">-- Pilih Program Studi --</option>
                                                    <option value="1">Akuntansi</option>
                                                    <option value="2">Teknik Sepeda Motor</option>
                                                    <option value="3">Teknik Kendaraan Ringan</option>
                                                    <option value="4">Teknik Komputer dan Jaringan</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-gradient-button">Kirim Data Saya</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
    <?php
            break;
    }
    ?>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= $base_url ?>/assets/js/isotope.min.js"></script>
    <script src="<?= $base_url ?>/assets/js/owl-carousel.js"></script>
    <script src="<?= $base_url ?>/assets/js/lightbox.js"></script>
    <script src="<?= $base_url ?>/assets/js/tabs.js"></script>
    <script src="<?= $base_url ?>/assets/js/video.js"></script>
    <script src="<?= $base_url ?>/assets/js/slick-slider.js"></script>
    <script src="<?= $base_url ?>/assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
    <script>
        var cleave = new Cleave('#nilai', {
            delimiter: '.',
            blocks: [2, 3],
        });
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
</body>

</html>