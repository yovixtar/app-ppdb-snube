<?php
require('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin PPDB SMK NU Bodeh</title>

    <!-- Custom fonts for this template-->
    <link href="<?= $base_url ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= $base_url ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= $base_url ?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= $base_url ?>/assets/img/logo_smk_nu_bodeh.png" type="image/x-icon">

    <?php
    if ($halaman == "detaildatapendaftar" || $halaman == "editdatapendaftar") {
    ?>
        <style>
            .header-text {
                text-align: center;
                font-weight: bold;
            }

            .data-tabel {
                width: 90%;
                margin: auto;
                line-height: 2em;
                border: none;
            }

            .data-td-sub {
                width: 20%;
                vertical-align: top;
            }

            .data-td-titik {
                width: 7%;
                vertical-align: top;
                text-align: center;
            }

            .data-td-val {
                width: 73%;
                vertical-align: top;
            }

            .w-33 {
                width: 33.3%;
            }

            .td-ttd {
                text-align: center
            }
        </style>
    <?php
    }
    ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $base_url ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PPDB SNUBE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= $base_url ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nu-admin'] ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php
                if (isset($_GET['mesg'])) {
                    $mesg = $_GET['mesg'];
                    if ($mesg == "gagalupdate") {
                ?>
                        <div class="alert-danger rounded text-center mx-auto p-4 my-3">
                            Gagal Mengupdate, silahkan form dengan benar
                        </div>
                    <?php
                    } else if ($mesg == "berhasilupdate") {
                    ?>
                        <div class="alert-success rounded text-center mx-auto p-4 my-3">
                            Berhasil Mengupdate Data Pendaftar
                        </div>
                    <?php
                    } else if ($mesg == "tidakada") {
                    ?>
                        <div class="alert-danger rounded text-center mx-auto p-4 my-3">
                            Tidak Ada Data.
                        </div>
                    <?php
                    } else if ($mesg == "berhasilhapus") {
                    ?>
                        <div class="alert-success rounded text-center mx-auto p-4 my-3">
                            Berhasil Menghapus Data Pendaftar
                        </div>
                    <?php
                    } else if ($mesg == "gagalhapus") {
                    ?>
                        <div class="alert-danger rounded text-center mx-auto p-4 my-3">
                            Gagal Menghapus Data Pendaftar
                        </div>
                <?php
                    }
                }


                switch ($halaman) {
                    case 'detaildatapendaftar':
                        detaildatapendaftar($kode_daftar);
                        break;
                    case 'editdatapendaftar':
                        editdatapendaftar($kode_daftar);
                        break;

                    default:
                        halaman_default();
                        break;
                }
                ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SMK NU Bodeh <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika anda ingin mengakhiri season.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= $base_url ?>/acc/?to=logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var elems = document.getElementsByClassName('confhapus');
        var confirmIt = function(e) {
            if (!confirm('Yakin Hapus Data?')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= $base_url ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= $base_url ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= $base_url ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= $base_url ?>/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= $base_url ?>/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= $base_url ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= $base_url ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= $base_url ?>/assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= $base_url ?>/assets/js/demo/chart-pie-demo.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= $base_url ?>/assets/js/demo/datatables-demo.js"></script>

</body>

</html>

<?php
function detaildatapendaftar($kode_daftar)
{
    $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
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
?>
    <div class="container-fluid">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Pendaftar</h1>
            <p class="mb-4">Detail Data Pendaftar</p>

            <!-- Data -->
            <?php
            $statement_data = $pdo->prepare("SELECT *, pendaftar.nama AS nama_pendaftar, program_studi.nama AS nama_program_studi FROM pendaftar, program_studi WHERE kode_daftar = ? && pendaftar.program_studi=program_studi.id LIMIT 1");
            $statement_data->execute([$kode_daftar]);
            while ($hasil_data = $statement_data->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
                    </div>
                    <div class="card-body">
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
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
}
function editdatapendaftar($kode_daftar)
{
    require('config.php');
    $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
?>
    <div class="container-fluid">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Edit Data Pendaftar</h1>
            <p class="mb-4">Edit Data Pendaftar</p>

            <!-- Data -->
            <?php
            $statement_data = $pdo->prepare("SELECT *, pendaftar.nama AS nama_pendaftar, program_studi.nama AS nama_program_studi FROM pendaftar, program_studi WHERE kode_daftar = ? && pendaftar.program_studi=program_studi.id LIMIT 1");
            $statement_data->execute([$kode_daftar]);
            while ($hasil_data = $statement_data->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar - NIK <?= $hasil_data['nik'] ?></h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?= $base_url ?>/acc/?to=updatedatapendaftar">
                            <input type="hidden" name="kd" value="<?= $hasil_data['kode_daftar'] ?>">
                            <table class="data-tabel">
                                <tr>
                                    <td class="data-td-sub">Nama</td>
                                    <td class="data-td-titik">:</td>
                                    <td class="data-td-val">
                                        <input type="text" name="nama" id="name" value="<?= $hasil_data['nama_pendaftar'] ?>" autocomplete="on" class="form-control mb-3" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Tempat, Tanggal Lahir</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <input type="text" name="tempat_lahir" id="" value="<?= $hasil_data['tempat_lahir'] ?>" class="form-control" required>
                                        <input type="date" name="tanggal_lahir" id="" value="<?= $hasil_data['tanggal_lahir'] ?>" class="form-control mb-3" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Jenis Kelamin</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">

                                        <div class="form-check form-check-inline ms-2">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_1" value="Laki - Laki" <?= ($hasil_data['jenis_kelamin'] == "Laki - Laki") ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="jenis_kelamin_1">Laki - Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline ms-3">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_2" value="Perempuan" <?= ($hasil_data['jenis_kelamin'] == "Perempuan") ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="jenis_kelamin_2">Perempuan</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">NIK</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val mb-3"> <?= $hasil_data['nik'] ?></td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">NISN</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <input type="text" name="nisn" id="" value="<?= $hasil_data['nisn'] ?>" class="form-control mb-3" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">KIP</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <input type="text" name="kip" id="" value="<?= $hasil_data['kip'] ?>" class="form-control mb-3" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Agama</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <select name="agama" class="form-control mb-3" required>
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="Islam" <?= ($hasil_data['agama'] == "Islam") ? "SELECTED" : ""; ?>>Islam</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Usia</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <div class="input-group">
                                            <input type="text" name="tahun_usia" id="" value="<?= $hasil_data['tahun_usia'] ?>" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Tahun</span>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" name="bulan_usia" id="" value="<?= $hasil_data['bulan_usia'] ?>" class="form-control mb-3" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Bulan</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Tinggi / Berat Badan</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <div class="input-group">
                                            <input type="text" name="tinggi_badan" id="" value="<?= $hasil_data['tinggi_badan'] ?>" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">cm</span>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" name="berat_badan" id="" value="<?= $hasil_data['berat_badan'] ?>" class="form-control mb-3" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Kg</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Nama Ayah</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <input type="text" name="nama_ayah" id="" value="<?= $hasil_data['nama_ayah'] ?>" class="form-control mb-3" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Pekerjaan Ayah</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <input type="text" name="pekerjaan_ayah" id="" value="<?= $hasil_data['pekerjaan_ayah'] ?>" class="form-control mb-3" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Nama Ibu</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <input type="text" name="nama_ibu" id="" value="<?= $hasil_data['nama_ibu'] ?>" class="form-control mb-3" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Pekerjaan Ibu</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <input type="text" name="pekerjaan_ibu" id="" value="<?= $hasil_data['pekerjaan_ibu'] ?>" class="form-control mb-3" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Alamat Lengkap</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val"><textarea name="alamat" id="" class="form-control mb-3"><?= $hasil_data['alamat'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Nomor HP</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <input type="text" name="nomor_hp" id="" value="<?= $hasil_data['nomor_hp'] ?>" class="form-control mb-3" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Asal Sekolah</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <input type="text" name="asal_sekolah" id="" value="<?= $hasil_data['asal_sekolah'] ?>" class="form-control mb-3" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Nilai SKHUN</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <input type="text" name="nilai" id="" value="<?= $hasil_data['nilai_skhun'] ?>" class="form-control mb-3" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub">Program Studi</td>
                                    <td class="data-td-titik">: </td>
                                    <td class="data-td-val">
                                        <select name="progdi" class="form-control mb-3" required>
                                            <option value="0">-- Pilih Program Studi --</option>
                                            <option value="1" <?= ($hasil_data['program_studi'] == 1) ? "SELECTED" : ""; ?>>Akuntansi</option>
                                            <option value="2" <?= ($hasil_data['program_studi'] == 2) ? "SELECTED" : ""; ?>>Teknik Sepeda Motor</option>
                                            <option value="3" <?= ($hasil_data['program_studi'] == 3) ? "SELECTED" : ""; ?>>Teknik Kendaraan Ringan</option>
                                            <option value="4" <?= ($hasil_data['program_studi'] == 4) ? "SELECTED" : ""; ?>>Teknik Komputer dan Jaringan</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data-td-sub"></td>
                                    <td class="data-td-titik"></td>
                                    <td class="data-td-val">
                                        <input type="submit" class="btn btn-primary float-right mt-4" value="Update Data Pendaftar">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
}
function halaman_default()
{
    require('config.php');
    $pdo = new PDO("mysql:dbname=iyabosco_ppdbnu;host=localhost", "iyabosco_smk", "3irkifmizahK");
?>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Pendaftar</div>
                                <?php
                                $statement_total_pendaftar = $pdo->prepare("SELECT * FROM pendaftar");
                                $statement_total_pendaftar->execute([]);
                                $statement_total_pendaftar->fetch(PDO::FETCH_ASSOC);

                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $statement_total_pendaftar->rowCount(); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Pendaftar</h1>
            <p class="mb-4">Rekap Data Pendaftar</p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Asal</th>
                                    <th>Program Studi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $statement_data = $pdo->prepare("SELECT *, pendaftar.nama AS nama_pendaftar, program_studi.nama AS nama_program_studi FROM pendaftar JOIN program_studi ON pendaftar.program_studi=program_studi.id");
                                $statement_data->execute([]);
                                while ($hasil_data = $statement_data->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?= $hasil_data['nik'] ?></td>
                                        <td><?= $hasil_data['nama_pendaftar'] ?></td>
                                        <td><?= $hasil_data['asal_sekolah'] ?></td>
                                        <td><?= $hasil_data['nama_program_studi'] ?></td>
                                        <td>
                                            <a href="<?= $base_url ?>/data-pendaftar/detail.php?<?= $hasil_data['kode_daftar'] ?>">
                                                <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                            </a>
                                            <a href="<?= $base_url ?>/data-pendaftar/edit.php?<?= $hasil_data['kode_daftar'] ?>">
                                                <button class="btn btn-warning"><i class="fas fa-pen"></i></button>
                                            </a>
                                            <a href="<?= $base_url ?>/acc/?to=hapusdatapendaftar&kd=<?= $hasil_data['kode_daftar'] ?>" class="confhapus">
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
<?php
}

?>