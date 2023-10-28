<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header-text {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;

        }

        .data-tabel {
            width: 90%;
            margin: auto;
            font-size: 12pt;
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.5em;
            border: none;
        }

        .data-td-sub {
            width: 30%;
            vertical-align: top;
        }

        .data-td-titik {
            width: 3%;
            vertical-align: top;
            text-align: right;
        }

        .data-td-val {
            width: 67%;
            vertical-align: top;
        }
        .w-33{
            width: 33.3%;
        }
        .td-ttd{
            text-align:center
        }
    </style>
</head>

<body>
    <h1 class="header-text">Bukti Pendaftaran SMK NU Bodeh</h1>
    <div class="data-area">
        <?php
        function tgl_indo($tanggal)
        {
            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);

            return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        }
        $kode_daftar = $_GET['kd'];
        $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
        $statement = $pdo->prepare("SELECT *, pendaftar.nama AS nama_pendaftar, program_studi.nama AS nama_program_studi FROM pendaftar, program_studi WHERE kode_daftar = ? && pendaftar.program_studi=program_studi.id LIMIT 1");
        $statement->execute([$kode_daftar]);
        $hasil_data = $statement->fetch(PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            while ($hasil_data) {
        ?>
                <table class="data-tabel">
                    <tr>
                        <td class="data-td-sub">Nama</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['nama_pendaftar'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Tempat, Tanggal Lahir</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['tempat_lahir'] . ', ' . tgl_indo(date_format(date_create($hasil_data['tanggal_lahir']), 'Y-m-d')) ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Jenis Kelamin</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['jenis_kelamin'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">NIK</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['nik'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">NISN</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['nisn'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">kip</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['kip'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Agama</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['agama'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Usia</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['tahun_usia'] . ' Tahun, ' . $hasil_data['bulan_usia'] . ' Bulan' ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Tinggi / Berat Badan</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['tinggi_badan'] . ' Cm, ' . $hasil_data['berat_badan'] . ' Kg' ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Nama Ayah</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['nama_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Pekerjaan Ayah</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['pekerjaan_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Nama Ibu</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['nama_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Pekerjaan Ibu</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['pekerjaan_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Alamat Lengkap</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Nomor HP</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['nomor_hp'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Asal Sekolah</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['asal_sekolah'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Nilai SKHUN</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['nilai_skhun'] ?></td>
                    </tr>
                    <tr>
                        <td class="data-td-sub">Program Studi</td>
                        <td class="data-td-titik">: </td>
                        <td class="data-td-val"> <?= $hasil_data['nama_program_studi'] ?></td>
                    </tr>
                </table>
                <br />
                <table class="data-tabel">
                    <tr>
                        <td class="w-33"></td>
                        <td class="w-33"></td>
                        <td class="w-33 td-ttd">
                            ............... , ....................... 2022 <br /><br /><br /><br />
                            <?= $hasil_data['nama_pendaftar'] ?>
                        </td>
                    </tr>
                </table>
        <?php $hasil_data = NULL;
            }
        } else {
            header("Location: https://ppdb.iyabos.com/cek/?mesg=tidakada");
            die();
        } ?>

    </div>
</body>

</html>