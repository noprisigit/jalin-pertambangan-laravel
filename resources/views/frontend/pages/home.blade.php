@extends('frontend.app')

@section('content')
    <section id="home" class="jp-hero">
        <!-- decorative flat blobs -->
        <span class="blob blob-1"></span>
        <span class="blob blob-2"></span>

        <div class="container position-relative">
            <div class="swiper jp-hero-swiper">
                <div class="swiper-wrapper">

                    <!-- ===== Slide 1: Jalin Pertambangan (Consulting) - dari Swiper Hero ===== -->
                    <div class="swiper-slide">
                        <div class="row align-items-center g-4 g-lg-5">
                            <div class="col-lg-6">
                                <span class="eyebrow"><i class="bi bi-shield-check"></i> Jalin Pertambangan •
                                    Konsultan</span>
                                <h1 class="title mt-2">Solusi Konsultasi Pertambangan yang Adaptif &amp; Inovatif
                                </h1>
                                <p class="lead mb-3">
                                    Diskusi, edukasi, pelatihan, asistensi, dan pendampingan — fleksibel sesuai
                                    kebutuhan klien.
                                </p>
                                <div class="d-flex flex-wrap cta-wrap">
                                    <a href="#our-services" class="btn btn-hero btn-primary-hero">
                                        <i class="bi bi-rocket-takeoff me-2"></i>Jelajahi Layanan
                                    </a>
                                    <a href="#contact" class="btn btn-hero btn-outline-hero">
                                        <i class="bi bi-whatsapp me-2"></i>Hubungi via WhatsApp
                                    </a>
                                </div>
                                <div class="trust">
                                    <span class="chip"><i class="bi bi-award"></i> IPU & CPI Certified</span>
                                    <span class="chip"><i class="bi bi-people"></i> Corporate & Education</span>
                                    <span class="chip"><i class="bi bi-graph-up-arrow"></i> Strategy &
                                        Governance</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="illobox d-flex align-items-center justify-content-center">
                                    <img src="assets/images/bahan/bahan1.jpg" alt="Mining Strategy Map"
                                        class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== Slide 2: Konsultan Pertambangan Strategis - dari RS-Slider ===== -->
                    <div class="swiper-slide">
                        <div class="row align-items-center g-4 g-lg-5">
                            <div class="col-lg-6">
                                <span class="eyebrow"><i class="bi bi-gear"></i> Konsultan Strategis</span>
                                <h1 class="title mt-2">Konsultan Pertambangan<br>Strategis & Implementatif</h1>
                                <p class="lead mb-3">
                                    Membantu organisasi menavigasi tantangan industri tambang yang cepat berubah
                                    melalui diskusi, edukasi, pelatihan, asistensi, dan pendampingan.
                                </p>
                                <div class="d-flex flex-wrap cta-wrap">
                                    <a href="#rs-contact" class="btn btn-hero btn-primary-hero">
                                        <i class="bi bi-telephone me-2"></i>Hubungi JP
                                    </a>
                                    <a href="#rs-services" class="btn btn-hero btn-outline-hero">
                                        <i class="bi bi-list-ul me-2"></i>Lihat Layanan
                                    </a>
                                </div>
                                <div class="trust">
                                    <span class="chip"><i class="bi bi-shield-check"></i> Strategis &
                                        Implementatif</span>
                                    <span class="chip"><i class="bi bi-arrow-repeat"></i> Adaptif &
                                        Responsif</span>
                                    <span class="chip"><i class="bi bi-lightbulb"></i> Inovatif</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="illobox d-flex align-items-center justify-content-center">
                                    <img src="assets/images/bahan/bahan2.jpg" alt="Tata Kelola & Produktivitas"
                                        class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== Slide 3: Tata Kelola & Produktivitas - dari RS-Slider ===== -->
                    <div class="swiper-slide">
                        <div class="row align-items-center g-4 g-lg-5">
                            <div class="col-lg-6">
                                <span class="eyebrow"><i class="bi bi-graph-up"></i> Tata Kelola &
                                    Produktivitas</span>
                                <h2 class="title">Tata Kelola & Produktivitas Operasi</h2>
                                <p class="lead mb-3">
                                    Pendekatan adaptif–responsif untuk meningkatkan keselamatan, biaya, dan
                                    kualitas; dari pit ke pelabuhan.
                                </p>
                                <div class="d-flex flex-wrap cta-wrap">
                                    <a href="#rs-services" class="btn btn-hero btn-primary-hero">
                                        <i class="bi bi-list-ul me-2"></i>Lihat Layanan
                                    </a>
                                    <a href="#contact" class="btn btn-hero btn-outline-hero">
                                        <i class="bi bi-calendar-check me-2"></i>Konsultasi Awal
                                    </a>
                                </div>
                                <div class="trust">
                                    <span class="chip"><i class="bi bi-shield"></i> Keselamatan</span>
                                    <span class="chip"><i class="bi bi-currency-dollar"></i> Efisiensi
                                        Biaya</span>
                                    <span class="chip"><i class="bi bi-award"></i> Kualitas</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="illobox d-flex align-items-center justify-content-center">
                                    <div class="text-center p-4">
                                        <i class="bi bi-diagram-3" style="font-size:48px"></i>
                                        <h5 class="mt-3 mb-1">Pit-to-Port Excellence</h5>
                                        <p class="mb-0" style="opacity:.8">Mining • Processing • Logistics</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== Slide 4: Our Expert highlight - dari Swiper Hero ===== -->
                    <div class="swiper-slide">
                        <div class="row align-items-center g-4 g-lg-5">
                            <div class="col-lg-6">
                                <span class="eyebrow"><i class="bi bi-person-badge"></i> Our Expert</span>
                                <h2 class="title">Dr. Ir. Ichwan Azwardi, S.T., M.T., IPU</h2>
                                <p class="lead mb-3">
                                    Ahli pertambangan dengan pengalaman komprehensif: eksplorasi, operasi, strategi,
                                    hingga transformasi korporasi.
                                </p>
                                <div class="row text-center gy-3">
                                    <div class="col-4">
                                        <div class="py-3 px-2 rounded-3" style="background:rgba(255,255,255,.12);">
                                            <div class="fw-bold fs-4">25+</div>
                                            <small>Thn Pengalaman</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="py-3 px-2 rounded-3" style="background:rgba(255,255,255,.12);">
                                            <div class="fw-bold fs-4">10+</div>
                                            <small>Peran Strategis</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="py-3 px-2 rounded-3" style="background:rgba(255,255,255,.12);">
                                            <div class="fw-bold fs-4">CPI</div>
                                            <small>Competent Person</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap cta-wrap mt-3">
                                    <a href="#our-expert" class="btn btn-hero btn-primary-hero">
                                        <i class="bi bi-info-circle me-2"></i>Profil Lengkap
                                    </a>
                                    <a href="#news" class="btn btn-hero btn-outline-hero">
                                        <i class="bi bi-newspaper me-2"></i>Latest Updates
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="illobox d-flex align-items-center justify-content-center">
                                    <div class="text-center p-4">
                                        <i class="bi bi-magnet" style="font-size:48px"></i>
                                        <h5 class="mt-3 mb-1">Operational Excellence</h5>
                                        <p class="mb-0" style="opacity:.8">Exploration • Supply • Transformation
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== Slide 5: CTA strong - dari Swiper Hero ===== -->
                    <div class="swiper-slide">
                        <div class="row align-items-center g-4 g-lg-5">
                            <div class="col-lg-6">
                                <span class="eyebrow"><i class="bi bi-lightning-charge"></i> Mulai
                                    Kolaborasi</span>
                                <h2 class="title">Jadwalkan Sesi Konsultasi Sesuai Kebutuhan Anda</h2>
                                <p class="lead mb-3">
                                    Pilih format: Diskusi singkat, Pelatihan intensif, atau Pendampingan
                                    berkelanjutan — onsite maupun daring.
                                </p>
                                <div class="d-flex flex-wrap cta-wrap">
                                    <a href="#contact" class="btn btn-hero btn-primary-hero">
                                        <i class="bi bi-calendar-check me-2"></i>Jadwalkan Sekarang
                                    </a>
                                    <a href="https://wa.me/6281943290320?text=Halo%20Jalin%20Pertambangan%2C%20saya%20ingin%20konsultasi."
                                        target="_blank" rel="noopener" class="btn btn-hero btn-outline-hero">
                                        <i class="bi bi-whatsapp me-2"></i>WhatsApp JP
                                    </a>
                                </div>
                                <div class="trust">
                                    <span class="chip"><i class="bi bi-laptop"></i> Online / Onsite</span>
                                    <span class="chip"><i class="bi bi-translate"></i> Bahasa Indonesia</span>
                                    <span class="chip"><i class="bi bi-shield-lock"></i> Privasi Terjaga</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="illobox d-flex align-items-center justify-content-center">
                                    <div class="text-center p-4">
                                        <i class="bi bi-headset" style="font-size:48px"></i>
                                        <h5 class="mt-3 mb-1">Client Relation</h5>
                                        <p class="mb-0" style="opacity:.8">+62 819-4329-0320 •
                                            jalinpertambangan@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Pagination & Navigation -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev" aria-label="Previous slide"></div>
                <div class="swiper-button-next" aria-label="Next slide"></div>
            </div>
        </div>
    </section>

    <!-- Hapus rs-slider yang lama -->
    <!--
                                                                    <div id="rs-slider" class="rs-slider slider1">
                                                                      <div class="bend niceties">
                                                                        <div id="nivoSlider" class="slides">
                                                                          <img src="assets/images/bahan/bahan1.jpg" alt="JP Hero" title="#slide-1" />
                                                                          <img src="assets/images/bahan/bahan2.jpg" alt="JP Hero 2" title="#slide-2" />
                                                                        </div>
                                                                        ...
                                                                              </div>
                                                                              </div>
                                                                    -->

    <!-- Services Mini Section Start -->
    <div class="rs-services style1 pt-100 pb-84 md-pt-80 md-pb-64">
        <div class="container">
            <div class="row gutter-16">
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/1.png" alt="">
                        </div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Solution Focused</a></h5>
                            <div class="desc">Solusi praktis untuk isu eksplorasi, operasi, hingga hilir—bukan
                                sekadar laporan.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/2.png" alt="">
                        </div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Client Oriented</a></h5>
                            <div class="desc">Pendekatan fleksibel: diskusi, coaching, workshop, dan pendampingan
                                onsite/online.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/3.png" alt="">
                        </div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Best Practice</a></h5>
                            <div class="desc">Mengacu CIP/PI, K3L, serta praktik global untuk operasi tambang
                                berkelanjutan.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/4.png" alt="">
                        </div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Decision Maker</a></h5>
                            <div class="desc">Mendukung manajemen dalam pengambilan keputusan berbasis data &
                                risiko.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Mini Section End -->

    <!-- Div About -->

    <!-- About Section Start -->
    <div id="rs-about" class="rs-about style1 bg1 md-pt-80 jp-about-section">
        <div class="container">
            <div class="row y-bottom">
                <div class="col-lg-6 md-mb-50">
                    <div class="images-part"><img src="assets/images/bahan/bahan13.jpg" alt="about jp"></div>
                </div>
                <div class="col-lg-6 pl-66 pt-75 pb-75 md-pt-42 md-pb-72">
                    <div class="sec-title mb-47 md-mb-42">
                        <div class="sub-title primary">Tentang JP</div>
                        <h2 class="title mb-0">Membantu Perusahaan Tambang Menjadi Adaptif, Responsif, & Inovatif
                        </h2>
                    </div>
                    <div class="services-part mb-30">
                        <div class="services-icon"><img src="assets/images/about/icons/1.png" alt="image">
                        </div>
                        <div class="services-text">
                            <h4 class="title">Pendekatan Menyeluruh</h4>
                            <div class="desc">JP mendampingi melalui <strong>Diskusi</strong>,
                                <strong>Edukasi</strong>, <strong>Pelatihan</strong>, <strong>Asistensi</strong>,
                                dan <strong>Pendampingan</strong> untuk memperkuat kinerja organisasi.
                            </div>
                        </div>
                    </div>
                    <div class="services-part mb-30">
                        <div class="services-icon"><img src="assets/images/about/icons/2.png" alt="image">
                        </div>
                        <div class="services-text">
                            <h4 class="title">Dipimpin Ahli Industri</h4>
                            <div class="desc">Dikelola oleh <strong>Dr. Ir. Ichwan Azwardi S.T., M.T.,
                                    IPU</strong> — berlatar ITB (S1–S3), IPU (PII), CPI (PERHAPI), dan pengalaman
                                eksekutif di PT Timah Tbk serta kolaborasi kebijakan dengan Kementerian ESDM.</div>
                        </div>
                    </div>
                    <div>
                        <ul class="btn-part">
                            <li><a class="readon2 get-new" href="#rs-services">Lihat Layanan</a></li>
                            <li>
                                <div class="video-btn seo-agency text-center">
                                    <a class="popup-videos" href="https://www.youtube.com/watch?v=YLN1Argi7ik"><i
                                            class="fa fa-play"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Services Section Start (dikontekskan JP) -->
    <div id="rs-services" class="rs-services style1 modify pt-92 pb-84 md-pt-72 md-pb-64">
        <div class="container">
            <div class="sec-title text-center mb-47 md-mb-42">
                <div class="sub-title primary">Layanan</div>
                <h2 class="title mb-0">Layanan Utama JP</h2>
            </div>
            <div class="row gutter-16">
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/modify/1.png" alt=""></div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Diskusi & Clinic Session</a></h5>
                            <div class="desc">Sesi tanya-jawab untuk memetakan masalah, opsi solusi, dan
                                prioritas eksekusi.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/modify/2.png" alt=""></div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Edukasi & Coaching</a></h5>
                            <div class="desc">Peningkatan kompetensi teknis & manajerial: K3L, perencanaan
                                tambang, hingga keuangan.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/modify/3.png" alt=""></div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Pelatihan Terstruktur</a></h5>
                            <div class="desc">Workshop terencana untuk perubahan perilaku, keterampilan, dan
                                produktivitas.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/modify/4.png" alt=""></div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Asistensi Profesional</a></h5>
                            <div class="desc">Dukungan hands-on untuk tugas profesional tim Anda—on-call maupun
                                onsite.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/modify/5.png" alt=""></div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Pendampingan Transformasi</a></h5>
                            <div class="desc">Membantu identifikasi kebutuhan, fokus, dan inisiatif pengambilan
                                keputusan berkelanjutan.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/modify/6.png" alt=""></div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Audit & Tata Kelola</a></h5>
                            <div class="desc">Penyelarasan SOP, PKB, dan regulasi untuk perlindungan & kepastian
                                operasional.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part"><img src="assets/images/services/icons/modify/7.png" alt=""></div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Perencanaan & Kontrol Produksi</a>
                            </h5>
                            <div class="desc">PPC pit-to-port, balancing resource, dan continuous improvement.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-16">
                    <div class="service-wrap">
                        <div class="icon-part size-mod"><img src="assets/images/services/icons/modify/8.png"
                                alt=""></div>
                        <div class="content-part">
                            <h5 class="title"><a href="services-single.html">Studi & Kajian Teknis</a></h5>
                            <div class="desc">Eksplorasi, estimasi cadangan (CPI), hingga studi kelayakan &
                                optimasi biaya.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Section End -->

    <!-- Why Choose (Strategy) -->
    <!-- Update HTML untuk Why Choose Us section -->
    <div class="rs-whychooseus style8 bg31 jp-whychoose-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 md-mb-50">
                    <div class="sec-title3 mb-40">
                        <span class="sub-title">~ <span class="title-upper">Keunggulan</span> ~</span>
                        <h2 class="title">Menggabungkan Strategi & Eksekusi</h2>
                    </div>
                    <div class="services-part mb-40">
                        <div class="services-icon"><i class="fa fa-briefcase"></i></div>
                        <div class="services-text">
                            <div class="services-title">
                                <h3 class="title"><a href="#">Insight Governance</a></h3>
                            </div>
                            <p class="services-txt">Perspektif kebijakan & hubungan industrial untuk mitigasi
                                risiko.</p>
                        </div>
                    </div>
                    <div class="services-part mb-40">
                        <div class="services-icon"><i class="fa fa-signal"></i></div>
                        <div class="services-text">
                            <div class="services-title">
                                <h3 class="title"><a href="#">Result-Oriented</a></h3>
                            </div>
                            <p class="services-txt">Fokus pada outcome biaya, kualitas, keselamatan, & target
                                produksi.</p>
                        </div>
                    </div>
                    <div class="services-part">
                        <div class="services-icon"><i class="fa fa-users"></i></div>
                        <div class="services-text">
                            <div class="services-title">
                                <h3 class="title"><a href="#">Capability Building</a></h3>
                            </div>
                            <p class="services-txt">Transfer pengetahuan agar tim mandiri & berkelanjutan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 pl-70 md-pl-15">
                    <div class="images-part">
                        <img src="assets/images/bahan/bahan1.jpg" alt="Strategy & Execution">
                    </div>
                    <div class="rs-animations">
                        <div class="shape-icons one"></div>
                        <div class="shape-icons two"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Why Choose -->


    <!-- Portfolio Section Start (disesuaikan pertambangan) -->
    <div id="rs-portfolio" class="rs-portfolio style1">
        <div class="rs-carousel owl-carousel dot-style1" data-loop="true" data-items="4" data-margin="22"
            data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
            data-dots="true" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
            data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
            data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2"
            data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-lg-device="4"
            data-md-device-nav="false" data-md-device-dots="true">
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/1.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Operasi</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Optimasi Produksi Timah Darat</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/2.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Eksplorasi</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Evaluasi Prospek Emas-Tembaga</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/3.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Governance</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Review SOP & Kepatuhan PKB</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/4.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">K3L</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Program Peningkatan Keselamatan</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/5.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Transformasi</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Kantor Transformasi Korporat</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/6.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Rantai Pasok</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Pit-to-Port Optimization</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/7.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Pelatihan</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Workshop Manajemen Tambang</a></h4>
                </div>
            </div>
            <div class="portfolio-item">
                <div class="img-part"><img src="assets/images/casestudies/8.jpg" alt=""></div>
                <div class="content-part">
                    <a class="categories" href="portfolio-gallery.html">Studi</a>
                    <h4 class="title"><a href="portfolio-gallery.html">Estimasi Cadangan (CPI)</a></h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Section End -->

    <!-- Skillbar Section Start (reword) -->
    <div class="rs-skillbar style1 pt-92 pb-100 md-pt-72 md-pb-80 sm-pt-80" style="margin-bottom: 250px;">
        <div class="container">
            <div class="gray-bg">
                <div class="row">
                    <div class="col-lg-6 content-part">
                        <div class="sec-title mb-35 md-mb-30">
                            <div class="sub-title primary">MULAI DARI SINI</div>
                            <h2 class="title mb-0">Tingkatkan Kinerja Operasi Anda</h2>
                        </div>
                        <div class="cl-skill-bar">
                            <span class="skillbar-title">Tata Kelola & Kepatuhan</span>
                            <div class="skillbar" data-percent="90">
                                <p class="skillbar-bar"></p><span class="skill-bar-percent"></span>
                            </div>
                            <span class="skillbar-title">Perencanaan & Kontrol Produksi</span>
                            <div class="skillbar" data-percent="85">
                                <p class="skillbar-bar"></p><span class="skill-bar-percent"></span>
                            </div>
                            <span class="skillbar-title">Pengembangan SDM & Pelatihan</span>
                            <div class="skillbar" data-percent="88">
                                <p class="skillbar-bar"></p><span class="skill-bar-percent"></span>
                            </div>
                            <div class="btn-part mt-60"><a class="readon" href="#rs-contact">Konsultasi Awal</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pl-0 md-order-first md-pl-pr-15">
                        <div class="bg-part md-pt-200 md-pb-200"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Skillbar Section End -->

    <!-- Testimonial Section Start (ringkas & relevan) -->
    <hr>
    <div class="rs-testimonial style11 gray-bg pt-92 md-pt-72">
        <div class="container">
            <div class="sec-title3 text-center mb-40">
                <span class="sub-title">~ <span class="title-upper">Testimoni</span> ~</span>
                <h2 class="title">Apa Kata Klien</h2>
            </div>
            <div class="testi-main-part bg32">
                <div class="slick-part single-product-slider">
                    <div class="slider slider-for">
                        <div class="images-slide-single">
                            <div class="single-testimonial">
                                <div class="content-part"><img class="quote"
                                        src="assets/images/testimonial/qoute-icon2.png" alt="">
                                    <p>"Pendampingan JP membantu kami menaikkan output sambil merapikan SOP & K3L."
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="images-slide-single">
                            <div class="single-testimonial">
                                <div class="content-part"><img class="quote"
                                        src="assets/images/testimonial/qoute-icon2.png" alt="">
                                    <p>"Workshop PPC sangat aplikatif—target produksi bulanan menjadi lebih
                                        konsisten."</p>
                                </div>
                            </div>
                        </div>
                        <div class="images-slide-single">
                            <div class="single-testimonial">
                                <div class="content-part"><img class="quote"
                                        src="assets/images/testimonial/qoute-icon2.png" alt="">
                                    <p>"Insight governance JP memperkaya mitigasi risiko hukum & hubungan
                                        industrial."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider slider-nav">
                        <div class="images-single"><img src="assets/images/testimonial/avatar/1.jpg" alt="">
                            <div class="testi-content">
                                <div class="testi-name">Manager Operasi</div><span class="testi-title">Timah</span>
                            </div>
                        </div>
                        <div class="images-single"><img src="assets/images/testimonial/avatar/2.jpg" alt="">
                            <div class="testi-content">
                                <div class="testi-name">Head of Mining</div><span class="testi-title">Au-Cu</span>
                            </div>
                        </div>
                        <div class="images-single"><img src="assets/images/testimonial/avatar/3.jpg" alt="">
                            <div class="testi-content">
                                <div class="testi-name">Direktur</div><span class="testi-title">Holding
                                    Minerba</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Section End -->

    <!-- Partner/Affiliation Section -->
    <div class="rs-partner gray-bg pt-70 pb-98 md-pb-80">
        <div class="container">
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
                data-nav="false" data-center-mode="false" data-mobile-device="2" data-ipad-device="3"
                data-ipad-device2="2" data-md-device="4">
                <div class="partner-item"><a href="#"><img src="assets/images/partner/1.png" alt=""></a>
                </div>
                <div class="partner-item"><a href="#"><img src="assets/images/partner/2.png" alt=""></a>
                </div>
                <div class="partner-item"><a href="#"><img src="assets/images/partner/3.png" alt=""></a>
                </div>
                <div class="partner-item"><a href="#"><img src="assets/images/partner/4.png" alt=""></a>
                </div>
                <div class="partner-item"><a href="#"><img src="assets/images/partner/5.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Section End -->

    <!-- Team Section (optional placeholder, dipertahankan) -->
    <div class="rs-team slider1 pt-92 pb-92 md-pt-72 md-pb-50">
        <div class="container">
            <div class="sec-title text-center mb-60 md-mb-42">
                <div class="sub-title primary">Expert</div>
                <h2 class="title mb-14">Our Expert</h2>
                <div class="desc">Dipimpin oleh Dr. Ir. Ichwan Azwardi S.T., M.T., IPU — CPI (PERHAPI), IPU
                    (PII), pengalaman eksekutif & kebijakan minerba.</div>
            </div>
            <!-- carousel bawaan dibiarkan -->
            <div class="rs-carousel owl-carousel dot-style1" data-loop="true" data-items="4" data-margin="30"
                data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                data-dots="true" data-nav="false" data-center-mode="false" data-mobile-device="1" data-ipad-device="2"
                data-ipad-device2="2" data-md-device="3" data-lg-device="4">
                <div class="team-wrap">
                    <div class="team-image"><img src="assets/images/team/1.jpg" alt="Team Image"></div>
                    <div class="text-bottom">
                        <h4 class="person-name"><a href="team-single.html">Dr. Ir. Ichwan Azwardi</a></h4>
                        <span class="designation">Founder & Principal</span>
                    </div>
                </div>
                <div class="team-wrap">
                    <div class="team-image"><img src="assets/images/team/2.jpg" alt="Team Image"></div>
                    <div class="text-bottom">
                        <h4 class="person-name"><a href="team-single.html">Mining Trainer</a></h4>
                        <span class="designation">Instructor</span>
                    </div>
                </div>
                <div class="team-wrap">
                    <div class="team-image"><img src="assets/images/team/3.jpg" alt="Team Image"></div>
                    <div class="text-bottom">
                        <h4 class="person-name"><a href="team-single.html">Ops Consultant</a></h4>
                        <span class="designation">Advisor</span>
                    </div>
                </div>
                <div class="team-wrap">
                    <div class="team-image"><img src="assets/images/team/4.jpg" alt="Team Image"></div>
                    <div class="text-bottom">
                        <h4 class="person-name"><a href="team-single.html">Geo Specialist</a></h4>
                        <span class="designation">Geologist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Section End -->

    <!-- Contact Section Start -->
    <div id="rs-contact" class="rs-contact style1 gray-bg pt-100 pb-100 md-pt-80 md-pb-80">
        <div class="container">
            <div class="white-bg">
                <div class="row">
                    <div class="col-lg-8 form-part">
                        <div class="sec-title mb-35 md-mb-30">
                            <div class="sub-title primary">HUBUNGI KAMI</div>
                            <h2 class="title mb-0">Kirim Pesan</h2>
                        </div>
                        <div id="form-messages"></div>
                        <form id="feedbackForm" class="contact-form" method="post"
                            action="{{ route('feedback.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-30">
                                    <div class="common-control">
                                        <input type="text" name="name" id="name" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="common-control">
                                        <input type="email" name="email" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="common-control">
                                        <input type="text" name="phone" id="phone"
                                            placeholder="No. Telepon/WA">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="common-control">
                                        <input type="text" name="company" id="company" placeholder="Perusahaan">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-30">
                                    <div class="common-control">
                                        <textarea name="message" id="message"
                                            placeholder="Jenis kebutuhan (Diskusi/Edukasi/Pelatihan/Asistensi/Pendampingan) & waktu yang diinginkan"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-btn">
                                        <button type="submit" class="readon">
                                            {{ __('Kirim') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 pl-0 md-pl-pr-15 md-order-first">
                        <div class="contact-info">
                            <h3 class="title">Info Kontak</h3>

                            @if (getStaticContent('address'))
                                <div class="info-wrap mb-20">
                                    <div class="icon-part"><i class="flaticon-location"></i></div>
                                    <div class="content-part">
                                        <h4>Kantor</h4>
                                        {{ getStaticContent('address') }}
                                    </div>
                                </div>
                            @endif

                            @if (getStaticContent('phone'))
                                <div class="info-wrap mb-20">
                                    <div class="icon-part"><i class="flaticon-call"></i></div>
                                    <div class="content-part">
                                        <h4>Telepon/WA</h4>
                                        <p>
                                            <a href="https://wa.me/{{ getStaticContent('phone') }}" target="_blank">
                                                {{ getStaticContent('phone') }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (getStaticContent('email'))
                                <div class="info-wrap mb-20">
                                    <div class="icon-part"><i class="flaticon-email"></i></div>
                                    <div class="content-part">
                                        <h4>Email</h4>
                                        <p>
                                            <a href="mailto:{{ getStaticContent('email') }}">
                                                {{ getStaticContent('email') }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (getStaticContent('workingHour'))
                                <div class="info-wrap">
                                    <div class="icon-part"><i class="flaticon-clock"></i></div>
                                    <div class="content-part">
                                        <h4>Jam Operasional</h4>
                                        <p>{{ getStaticContent('workingHour') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->

    <!-- Blog/Insights Section Start (konten disesuaikan) -->
    <div class="rs-blog style1 pt-91 pb-92 md-pt-71 md-pb-72 sm-pb-75 jp-blog-section">
        <div class="container">
            <div class="row y-middle mb-53 md-mb-40 sm-mb-50">
                <div class="col-md-6 sm-mb-22">
                    <div class="sec-title">
                        <span class="sub-title primary right-line">INSIGHT TERBARU</span>
                        <h2 class="title mb-0">Artikel & Pembelajaran</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn-part text-right sm-text-left">
                        <a class="readon" href="blog-single.html">Lihat Semua</a>
                    </div>
                </div>
            </div>
            <div class="rs-carousel owl-carousel dot-style1" data-loop="true" data-items="3" data-margin="30"
                data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                data-dots="true" data-nav="false" data-center-mode="false" data-mobile-device="1" data-ipad-device="2"
                data-ipad-device2="1" data-md-device="3" data-lg-device="3">
                @foreach ($posts as $post)
                    <div class="blog-wrap">
                        <div class="img-part">
                            <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}">
                            <div class="fly-btn">
                                <a href="blog-single.html">
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                        <div class="content-part">
                            @if ($post->category)
                                <a class="categories" href="blog-single.html">{{ $post->category->name }}</a>
                            @endif

                            <h3 class="title">
                                <a href="blog-single.html">{{ $post->title }}</a>
                            </h3>

                            <div class="blog-meta">
                                <div class="user-data">
                                    <img src="https://ui-avatars.com/api/?name={{ $post->user->name }}"
                                        alt="{{ $post->user->name }}">
                                    <span>{{ $post->user->name }}</span>
                                </div>
                                <div class="date">
                                    <i class="fa fa-clock-o"></i> {{ $post->created_at->translatedFormat('d M Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Section End -->
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#feedbackForm', function(e) {
                e.preventDefault();

                const $form = $(this);
                const $submitBtn = $form.find('[type="submit"]');
                const originalBtnHtml = $submitBtn.html();

                $form.find('.is-invalid').removeClass('is-invalid border border-danger');

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        handle_before_submit_form('#feedbackForm');
                    },
                    success: function(res) {
                        show_sweetalert_success(res.message);
                        $form.trigger('reset');
                    },
                    error: function(err) {
                        handle_error_exception(err);
                    },
                    complete: function() {
                        handle_submit_completed('#feedbackForm', originalBtnHtml);
                    }
                });
            });
        });
    </script>
@endpush
