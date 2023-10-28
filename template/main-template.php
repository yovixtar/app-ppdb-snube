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
                            <li class="scroll-to-section"><a href="<?= $base_url ?>/#top" class="active">Beranda</a></li>
                            <li class="scroll-to-section"><a href="<?= $base_url ?>/#progdi">Progdi</a></li>
                            <li class="scroll-to-section"><a href="<?= $base_url ?>/#prosedur">Prosedur</a></li>
                            <li class="scroll-to-section"><a href="<?= $base_url ?>/#syarat">Persyaratan</a></li>
                            <li><a href="<?= $base_url ?>/daftar" target="_blank">
                                    <font class="daftar">Daftar</font>
                                </a></li>
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
        case 'cek':
            $mesg = "";
            if (isset($_GET['mesg'])) {
                switch ($_GET['mesg']) {
                    case 'berhasil':
                        $mesg = "berhasil";
                        break;

                    case 'sudahada':
                        $mesg = "sudahada";
                        break;
                    case 'tidakada':
                        $mesg = "tidakada";
                        break;

                    default:
                        $mesg = "";
                        break;
                }
            }
            $nik = "";
            if (isset($_GET['nik'])) {
                $nik = $_GET['nik'];
            }
    ?>
            <section class="main-banner" id="top">
                <div class="container">
                    <?php
                    if ($mesg == "berhasil") {
                    ?>
                        <div class="alert-success rounded text-center mx-auto p-4 my-3">
                            Berhasil Mendaftar, silahkan mengisi NIK untuk melihat hasilnya
                        </div>
                    <?php
                    }
                    if ($mesg == "gagalupdate") {
                    ?>
                        <div class="alert-success rounded text-center mx-auto p-4 my-3">
                            Gagal Mengupdate data Pendaftar, Silahkan isi form dengan benar.
                        </div>
                    <?php
                    }
                    if ($mesg == "sudahada") {
                    ?>
                        <div class="alert-danger rounded text-center mx-auto p-4 my-3">
                            NIK Sudah terdaftar, silahkan cek hasil pendaftaran.
                        </div>
                    <?php
                    }
                    if ($mesg == "tidakada") {
                    ?>
                        <div class="alert-danger rounded text-center mx-auto p-4 my-3">
                            Data Tidak Terdaftar, pastikan anda mengisi form dengan benar.
                        </div>
                    <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="header-text">
                                <h2>Cek Hasil PPDB <br /> <em>SMK NU Bodeh</em></h2>
                                <i>
                                    <h6 class="mb-3">*Siapkan Kartu Keluarga ( KK ) untuk mengisi NIK</h6>
                                </i>
                                <form method="POST" action="<?= $base_url ?>/acc/?to=ceknik">
                                    <input name="nik" value="<?= $nik ?>" class="form-control form-control-lg mb-3" type="text" placeholder="Masukan NIK (Nomor Induk Kependudukan)" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="16" style="position: relative;z-index: 2;">
                                    <input name="nama_ibu" class="form-control form-control-lg mb-3" type="text" placeholder="Masukan Nama Ibu" style="position: relative;z-index: 2;">
                                    <input type="submit" class="btn btn-success" style="position: relative;z-index: 2;background-color: #11998e;border-color: #11998e;" value="Cari Data">
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image">
                                <img src="assets/images/banner-right-image.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
            break;

        default:
        ?>
            <!-- ***** Main Banner Area Start ***** -->
            <section class="main-banner" id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="header-text">
                                <h6>Welcome to our school</h6>
                                <h2>PPDB SNUBE Tahun 2023 <br /> <em>SMK NU Bodeh</em></h2>
                                <i>
                                    <h6 class="mb-3">*Siapkan Kartu Keluarga ( KK ) untuk mengisi No KK dan NIK</h6>
                                </i>
                                <div class="main-button-gradient mb-2">
                                    <div><a href="<?= $base_url ?>/daftar">Daftar Disini!</a></div>
                                </div>
                                <div class="outline-button-gradient">
                                    <div><a href="<?= $base_url ?>/cek">Cetak Kartu Pendaftaran Disini!</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image">
                                <img src="<?= $base_url ?>/assets/images/banner-right-image.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ***** Main Banner Area End ***** -->

            <section class="services" id="progdi">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h6>Our Progdi</h6>
                                <h4>Program <em>Studi</em></h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="owl-service-item owl-carousel">
                                <div class="item">
                                    <div class="service-item">
                                        <div class="icon">
                                            <img src="<?= $base_url ?>/assets/images/logo_akuntansi.png" alt="">
                                        </div>
                                        <h4>Akuntansi</h4>
                                        <p>Bidang studi yang mempelajari materi terkait metode pencatatan dan penyusunan laporan keuangan yang berguna membantu pemangku kepentingan dalam proses pengambilan keputusan.</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="service-item">
                                        <div class="icon">
                                            <img src="<?= $base_url ?>/assets/images/logo_tsm.png" alt="">
                                        </div>
                                        <h4>Teknik Sepeda Motor (TSM)</h4>
                                        <p>Cabang ilmu teknik mesin yang mempelajari tentang bagaimana merancang, membuat dan mengembangkan alat-alat transportasi darat yang menggunakan mesin, terutama sepeda motor.</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="service-item">
                                        <div class="icon">
                                            <img src="<?= $base_url ?>/assets/images/logo_tkr.png" alt="">
                                        </div>
                                        <h4>Teknik Kendaraan Ringan (TKR)</h4>
                                        <p>Bidang teknik otomotif yang menekankan keahlian pada bidang penguasaan jasa perbaikan kendaraan ringan. Menyiapkan peserta didik untuk bekerja pada bidang pekerjaan jasa perawatan dan perbaikan di dunia usaha/industri.</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="service-item">
                                        <div class="icon">
                                            <img src="<?= $base_url ?>/assets/images/logo_tkj.png" alt="">
                                        </div>
                                        <h4>Teknik Komputer dan Jaringan (TKJ)</h4>
                                        <p>Program keahlian yang bertujuan membekali peserta didik dengan keterampilan, dan pengetahuan dalam merawat, merakit, menginstall, dan mendesain sebuah komputer maupun jaringan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="our-courses" id="prosedur">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="section-heading">
                                <h6>PROCEDURE</h6>
                                <h4>Prosedur <em>Pendaftaran</em></h4>
                                <p>Berikut penjelasan dari masing-masing Tahap</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="naccs">
                                <div class="tabs">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="menu">
                                                <div class="active gradient-border"><span>Pendaftaran Online</span></div>
                                                <div class="gradient-border"><span>Pendaftaran Offline</span></div>
                                                <div class="gradient-border"><span>Daftar Ulang</span></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <ul class="nacc">
                                                <li class="active">
                                                    <div>
                                                        <div class="left-image">
                                                            <img src="<?= $base_url ?>/assets/images/courses-01.jpg" alt="" style="filter: blur(5px); -webkit-filter: blur(5px);">
                                                        </div>
                                                        <div class="right-content">
                                                            <h4>Prosedur Pendaftaran Online</h4>
                                                            <p>Melakukan pengisian form pendaftaran di web, selanjutnya calon peserta didik melakukan daftar ulang pada waktu yang ditentukan</p>
                                                            <span>Januari - Juli 2023</span>
                                                            <span>Di Web PPDB SNUBE</span>
                                                            <span class="last-span">24 Jam</span>
                                                            <div class="text-button scroll-to-section">
                                                                <a href="<?= $base_url ?>/#contact-section">Hubungi Kami</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <div class="left-image">
                                                            <img src="<?= $base_url ?>/assets/images/courses-02.jpg" alt="" style="filter: blur(5px); -webkit-filter: blur(5px);">
                                                        </div>
                                                        <div class="right-content">
                                                            <h4>Prosedur Pendaftaran Offline</h4>
                                                            <p>Datang ke SMK NU Bodeh dan melakukan proses registrasi siswa baru.</p>
                                                            <span>Januari - Juli 2023</span>
                                                            <span>Di SMK NU Bodeh</span>
                                                            <span class="last-span">Pukul 08.00 - 14.00 WIB</span>
                                                            <div class="text-button scroll-to-section">
                                                                <a href="<?= $base_url ?>/#contact-section">Hubungi Kami</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <div class="left-image">
                                                            <img src="<?= $base_url ?>/assets/images/courses-03.jpg" alt="" style="filter: blur(5px); -webkit-filter: blur(5px);">
                                                        </div>
                                                        <div class="right-content">
                                                            <h4>Daftar Ulang</h4>
                                                            <p>Pada Tanggal yang ditentukan, lakukan pengumpulan berkas dan pembayaran biaya masuk.</p>
                                                            <span>( Segera Diinfokan ) 2022</span>
                                                            <span class="last-span">Pukul 08.00 - 14.00 WIB</span>
                                                            <div class="text-button scroll-to-section">
                                                                <a href="<?= $base_url ?>/#contact-section">Hubungi Kami</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="simple-cta" id="syarat">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1">
                            <div class="left-image mb-4">
                                <img src="<?= $base_url ?>/assets/images/cta-left-image.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-5 align-self-center">
                            <h4 class="mt-0">Persyaratan Pendaftaran</h4>
                            <p class="mt-3">
                            <ul class="text-white fs-5" style="line-height: 2;">
                                <li>&#10004; Mengisi Formulir Pendaftaran</li>
                                <li>&#10004; Fotokopi Kartu Keluarga</li>
                                <li>&#10004; Fotokopi Akta Kelahiran</li>
                                <li>&#10004; Fotokopi KIP (Bagi yang Memiliki)</li>
                                <li>&#10004; Fotokopi KTP Orang Tua</li>
                            </ul>
                            </p>
                            <div class="white-button">
                                <a href="<?= $base_url ?>/daftar">Daftar Sekarang!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="services" id="kerjasama">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h6>Our Partner</h6>
                                <h4>Mitra <em>Kerjasama</em></h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="owl-service-item owl-carousel">
                                <div class="item">
                                    <div class="service-item">
                                        <div class="icon">
                                            <img src="<?= $base_url ?>/assets/images/logo_ahass.png" alt="">
                                        </div>
                                        <h4>AHASS Agung Kusuma</h4>
                                        <p>Sragi</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="service-item">
                                        <div class="icon">
                                            <img src="<?= $base_url ?>/assets/images/logo_stmik.png" alt="">
                                        </div>
                                        <h4>STMIK Widya Pratama</h4>
                                        <p>Pekalongan</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="service-item">
                                        <div class="icon">
                                            <img src="<?= $base_url ?>/assets/images/logo_bkk.png" alt="">
                                        </div>
                                        <h4>PT. BPR BKK Taman</h4>
                                        <p>(Perseroda)</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="service-item">
                                        <div class="icon">
                                            <img src="<?= $base_url ?>/assets/images/logo_mitsubishi.jpg" alt="">
                                        </div>
                                        <h4>Bengkel Mitsubishi</h4>
                                        <p>Pemalang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="testimonials" id="poster">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h6>Gallery</h6>
                                <h4>Poster <em>PPDB SNUBE</em></h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
                                <img src="<?= $base_url ?>/assets/images/galeri/1.png" alt="" class="item mx-auto w-m-100" style="width: auto;">
                                <img src="<?= $base_url ?>/assets/images/galeri/2.png" alt="" class="item mx-auto w-m-100" style="width: auto;">
                                <img src="<?= $base_url ?>/assets/images/galeri/3.png" alt="" class="item mx-auto w-m-100" style="width: auto;">
                                <img src="<?= $base_url ?>/assets/images/galeri/4.png" alt="" class="item mx-auto w-m-100" style="width: auto;">
                                <img src="<?= $base_url ?>/assets/images/galeri/5.png" alt="" class="item mx-auto w-m-100" style="width: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact-us" id="contact-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div id="map">

                                <!-- You just need to go to Google Maps for your own map point, and copy the embed code from Share -> Embed a map section -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15841.493937645324!2d109.496399!3d-6.965192!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x29faf3b75beb619!2sSMK%20NU%20Bodeh!5e0!3m2!1sid!2sid!4v1652016514809!5m2!1sid!2sid" width="100%" height="420px" frameborder="0" style="border:0; border-radius: 15px; position: relative; z-index: 2;" allowfullscreen=""></iframe>
                                <div class="row">
                                    <div class="col-lg-4 offset-lg-1">
                                        <div class="contact-info">
                                            <div class="icon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <h4>Pak Budi</h4>
                                            <span>0823 4022 9588</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="contact-info">
                                            <div class="icon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <h4>Pak Ratoyo</h4>
                                            <span>0852 9326 8967</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <form id="contact" action="<?= $base_url; ?>/acc/?to=contact" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-heading">
                                            <h6>Hubungi Kami</h6>
                                            <h4>Say <em>Hello</em></h4>
                                            <p>Jika anda memiliki pertanyaan, silahkan hubungi kami dengan mengisi pesan disini (via Whatsapp).</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <input type="name" name="nama" class="input" id="name" placeholder="Nama Lengkap" autocomplete="on" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="pesan" class="input" id="message" placeholder="Ketikan Pesan Anda....."></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-gradient-button">Kirim Pesan</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-12">
                            <ul class="social-icons">
                                <li><a href="https://wa.me/6282340229588"><i class="fa fa-whatsapp"></i></a></li>
                                <li><a href="https://wa.me/6285293268967"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-12">
                            <p class="copyright">Copyright © 2022 SMK NU Bodeh. All Rights Reserved. </p>

                            <!-- <br>Design: <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a> -->
                            <!-- <br>Distribution: <a rel="sponsored" href="https://themewagon.com" target="_blank">ThemeWagon</a></p> -->
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
    <script src="<?= $base_url ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= $base_url ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= $base_url ?>/assets/js/isotope.min.js"></script>
    <script src="<?= $base_url ?>/assets/js/owl-carousel.js"></script>
    <script src="<?= $base_url ?>/assets/js/lightbox.js"></script>
    <script src="<?= $base_url ?>/assets/js/tabs.js"></script>
    <script src="<?= $base_url ?>/assets/js/video.js"></script>
    <script src="<?= $base_url ?>/assets/js/slick-slider.js"></script>
    <script src="<?= $base_url ?>/assets/js/custom.js"></script>
    <script>
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