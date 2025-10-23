<!DOCTYPE html>
<html lang="id">
<!-- index.html – Jalin Pertambangan (JP) -->

<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>Jalin Pertambangan (JP) — Konsultan Pertambangan & Transformasi Operasional</title>
    <meta name="description"
        content="Jalin Pertambangan (JP) adalah konsultan pertambangan yang menyediakan diskusi, edukasi, pelatihan, asistensi, dan pendampingan untuk tata kelola dan kinerja operasi tambang yang adaptif, responsif, dan inovatif.">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" href="{{ asset('assets/logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">

    <!-- CSS bawaan template (dipertahankan) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/off-canvas.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/linea-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rsmenu-main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/inc/custom-slider/css/nivo-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/inc/custom-slider/css/preview.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rsmenu-transitions.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/rs-spacing.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Bootstrap 5 & Icons (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Swiper (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" rel="stylesheet">

    <style>
        .jp-wa-float {
            position: fixed;
            right: 70px;
            bottom: 25px;
            z-index: 9999
        }

        .jp-wa-float a {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #25D366;
            color: #fff;
            padding: 12px 16px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .2)
        }

        .jp-wa-float a .wa-badge {
            background: rgba(255, 255, 255, .15);
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 12px
        }

        #scrollUp {
            animation: pulse 2.2s infinite
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(47, 92, 233, .45)
            }

            70% {
                box-shadow: 0 0 0 20px rgba(47, 92, 233, 0)
            }

            100% {
                box-shadow: 0 0 0 0 rgba(47, 92, 233, 0)
            }
        }
    </style>

    @stack('css')
</head>

<body class="defult-home">

    <!-- Preloader area start here -->
    <div id="loader" class="loader">
        <div class="spinner"></div>
    </div>
    <!--End preloader here -->

    <!--Full width header Start-->
    <div class="full-width-header">
        <!-- Toolbar Start -->
        <div class="toolbar-area hidden-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="toolbar-contact">
                            <ul>
                                @if (getStaticContent('email'))
                                    <li>
                                        <i class="flaticon-email"></i>
                                        <a href="mailto:{{ getStaticContent('email') }}">
                                            {{ getStaticContent('email') }}
                                        </a>
                                    </li>
                                @endif

                                @if (getStaticContent('phone'))
                                    <li>
                                        <i class="flaticon-call"></i>
                                        <a href="https://wa.me/{{ getStaticContent('phone') }}" target="_blank">
                                            {{ getStaticContent('phone') }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="toolbar-sl-share">
                            <ul>
                                @if (getStaticContent('workingHour'))
                                    <li class="opening">
                                        <i class="flaticon-clock"></i>
                                        {{ getStaticContent('workingHour') }}
                                    </li>
                                @endif

                                @if (getStaticContent('facebook'))
                                    <li>
                                        <a href="{{ getStaticContent('facebook') }}" target="_blank">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (getStaticContent('twitter'))
                                    <li>
                                        <a href="{{ getStaticContent('twitter') }}" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (getStaticContent('youtube'))
                                    <li>
                                        <a href="{{ getStaticContent('youtube') }}" target="_blank">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (getStaticContent('instagram'))
                                    <li>
                                        <a href="{{ getStaticContent('instagram') }}" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                @endif

                                @if (getStaticContent('tiktok'))
                                    <li>
                                        <a href="{{ getStaticContent('tiktok') }}" target="_blank">
                                            <i class="fab fa-tiktok"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Toolbar End -->

        <!--Header Start-->
        @include('frontend.layouts.header')
        <!--Header End-->
    </div>
    <!--Full width header End-->

    <!-- Main content Start -->
    <div class="main-content">
        @yield('content')
    </div>
    <!-- Main content End -->

    <!-- Footer Start -->
    {{-- @include('frontend.layouts.footer') --}}
    <x-landing.footer />
    <!-- Footer End -->

    <!-- start scrollUp  -->
    <div id="scrollUp"><i class="fa fa-angle-up"></i></div>

    <!-- End scrollUp  -->

    <!-- Floating WhatsApp -->
    @if (getStaticContent('phone'))
        <div class="jp-wa-float">
            <a href="https://wa.me/{{ getStaticContent('phone') }}" target="_blank"
                aria-label="WhatsApp Jalin Pertambangan">
                <i class="fab fa-whatsapp"></i>
                WhatsApp
                <span class="wa-badge">Chat JP</span>
            </a>
        </div>
    @endif

    <!-- Search Modal Start -->
    <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                class="flaticon-cross"></span></button>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="search-block clearfix">
                    <form>
                        <div class="form-group"><input class="form-control" placeholder="Search Here..."
                                type="text" required><button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->

    <!-- Swiper JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        // Reduce motion respect
        const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const heroSwiper = new Swiper('.jp-hero-swiper', {
            loop: true,
            speed: prefersReduced ? 300 : 700,
            autoplay: prefersReduced ? false : {
                delay: 5500,
                disableOnInteraction: false
            },
            effect: 'slide',
            grabCursor: true,
            slidesPerView: 1,
            spaceBetween: 24,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            // Pause autoplay on pointer hover (desktop)
            on: {
                init() {
                    const el = document.querySelector('.jp-hero-swiper');
                    if (el && this.autoplay) {
                        el.addEventListener('mouseenter', () => this.autoplay.stop());
                        el.addEventListener('mouseleave', () => this.autoplay.start());
                    }
                }
            }
        });
    </script>


    <!-- JS (dipertahankan) -->
    <x-sweetalert />
    <x-custom-scripts />

    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/rsmenu-main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/skill.bars.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/inc/custom-slider/js/jquery.nivo.slider.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/contact.form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('js')
    <script>
        // Tahun dinamis di footer
        (function() {
            var y = document.querySelector('.jp-year');
            if (y) {
                y.textContent = new Date().getFullYear();
            }
        })();
    </script>

    <!-- Ganti bagian offcanvas yang ada dengan versi modern -->
    <!-- Modern Offcanvas Menu -->
    <nav class="jp-offcanvas" id="jp-offcanvas">
        <div class="jp-offcanvas-header">
            <div class="jp-offcanvas-logo">
                <a href="">
                    <img src="{{ asset('assets/logo_bg.png') }}" alt="Jalin Pertambangan Logo">
                </a>
            </div>
            <button class="jp-offcanvas-close" id="jp-offcanvas-close" aria-label="Close Menu">
                <i class="fa fa-times"></i>
            </button>
        </div>

        <div class="jp-offcanvas-content">
            <div class="jp-offcanvas-description">
                <p>Konsultan pertambangan untuk tata kelola, produktivitas, dan transformasi operasi. JP membantu Anda
                    merancang strategi yang adaptif, responsif, dan inovatif.</p>
            </div>

            <div class="jp-offcanvas-nav">
                <h3>Navigasi</h3>
                <ul>
                    <li>
                        <a href="{{ route('landing.home') }}"
                            class="jp-scroll @if (Request::is('/')) jp-active @endif">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('landing.blogs') }}"
                            class="jp-scroll @if (Request::is('blogs*')) jp-active @endif">
                            {{ __('News') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('landing.about') }}"
                            class="jp-scroll @if (Request::is('about*')) jp-active @endif">
                            {{ __('About Us') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('landing.home') }}#our-expert" class="jp-scroll">
                            {{ __('Our Expert') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('landing.services') }}"
                            class="jp-scroll @if (Request::is('services*')) jp-active @endif">
                            {{ __('Our Services') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('landing.products') }}"
                            class="jp-scroll @if (Request::is('products*')) jp-active @endif">
                            {{ __('Our Products') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('landing.home') }}#rs-contact" class="jp-scroll">
                            {{ __('Contact') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="jp-offcanvas-contact">
                <h3>Kontak Kami</h3>
                <ul>
                    @if (getStaticContent('address'))
                        <li>
                            <i class="flaticon-location"></i>
                            <div>
                                <strong>Alamat</strong>
                                <div>{{ getStaticContent('address') }}</div>
                            </div>
                        </li>
                    @endif

                    @if (getStaticContent('phone'))
                        <li>
                            <i class="flaticon-call"></i>
                            <div>
                                <strong>Telepon/WA</strong>
                                <a href="https://wa.me/{{ getStaticContent('phone') }}" target="_blank">
                                    {{ getStaticContent('phone') }}
                                </a>
                            </div>
                        </li>
                    @endif

                    @if (getStaticContent('email'))
                        <li>
                            <i class="flaticon-email"></i>
                            <div>
                                <strong>Email</strong>
                                <a href="mailto:{{ getStaticContent('email') }}" target="_blank">
                                    {{ getStaticContent('email') }}
                                </a>
                            </div>
                        </li>
                    @endif

                    @if (getStaticContent('workingHour'))
                        <li>
                            <i class="flaticon-clock"></i>
                            <div>
                                <strong>Jam Operasional</strong>
                                <div>{{ getStaticContent('workingHour') }}</div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="jp-offcanvas-social">
                <h3>Ikuti Kami</h3>
                <ul>
                    @if (getStaticContent('facebook'))
                        <li>
                            <a href="{{ getStaticContent('facebook') }}" target="_blank" aria-label="Facebook">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                    @endif

                    @if (getStaticContent('twitter'))
                        <li>
                            <a href="{{ getStaticContent('twitter') }}" target="_blank" aria-label="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    @endif

                    @if (getStaticContent('youtube'))
                        <li>
                            <a href="{{ getStaticContent('youtube') }}" target="_blank" aria-label="Youtube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    @endif

                    @if (getStaticContent('tiktok'))
                        <li>
                            <a href="{{ getStaticContent('tiktok') }}" target="_blank" aria-label="Tiktok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="jp-offcanvas-footer">
                <div class="copyright">
                    <p>&copy; <span class="jp-year">{{ date('Y') }}</span> Jalin Pertambangan. All Rights
                        Reserved.</p>
                </div>
            </div>
        </div>
    </nav>

    <!-- Modern Overlay -->
    <div class="jp-offcanvas-overlay" id="jp-offcanvas-overlay"></div>

    <!-- Tambahkan link ke CSS modern offcanvas -->
    <link rel="stylesheet" href="{{ asset('assets/css/modern-offcanvas.css') }}">

    <!-- Tambahkan script modern offcanvas sebelum closing body tag -->
    <script src="{{ asset('assets/js/offcanvas-fix.js') }}"></script>

    <!-- Tambahkan JavaScript untuk blog animation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Blog animation on scroll
            const blogItems = document.querySelectorAll('.jp-blog-section .blog-wrap');

            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('jp-animate');
                    }
                });
            }, observerOptions);

            blogItems.forEach((item) => {
                observer.observe(item);
            });
        });
    </script>
</body>

</html>
