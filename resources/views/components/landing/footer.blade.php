<footer id="rs-footer" class="rs-footer jp-footer">
    <div class="container">
        <div class="footer-newsletter">
            <div class="row y-middle">
                <div class="col-md-6 sm-mb-26">
                    <h3 class="title white-color mb-0">Berlangganan Newsletter</h3>
                </div>
                <div class="col-md-6 text-right">
                    <form class="newsletter-form"><input type="email" name="email" placeholder="Alamat email Anda"
                            required><button type="submit"><i class="fa fa-paper-plane"></i></button></form>
                </div>
            </div>
        </div>
        <div class="footer-content pt-62 pb-79 md-pb-64 sm-pt-48">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 footer-widget md-mb-39">
                    <div class="about-widget pr-15">
                        <div class="logo-part">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/logo.png') }}" alt="Footer Logo"
                                    style="border-radius: 25px;">
                            </a>
                        </div>
                        <p class="desc">Jalin Pertambangan (JP) — konsultan pertambangan untuk tata kelola,
                            produktivitas, dan pengembangan SDM. Fleksibel: diskusi, edukasi, pelatihan, asistensi,
                            dan pendampingan.</p>
                        <div class="btn-part"><a class="readon" href="#rs-about">Discover More</a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 md-mb-32 footer-widget">
                    <h4 class="widget-title">Kontak</h4>
                    <ul class="address-widget pr-40">
                        @if (getStaticContent('address'))
                            <li>
                                <i class="flaticon-location"></i>
                                <div class="desc">{{ getStaticContent('address') }}</div>
                            </li>
                        @endif

                        @if (getStaticContent('phone'))
                            <li><i class="flaticon-call"></i>
                                <div class="desc">
                                    <a href="https://wa.me/{{ getStaticContent('phone') }}" target="_blank">
                                        {{ getStaticContent('phone') }}
                                    </a>
                                </div>
                            </li>
                        @endif

                        @if (getStaticContent('email'))
                            <li><i class="flaticon-email"></i>
                                <div class="desc"><a
                                        href="mailto:{{ getStaticContent('email') }}">{{ getStaticContent('email') }}</a>
                                </div>
                            </li>
                        @endif

                        @if (getStaticContent('workingHour'))
                            <li><i class="flaticon-clock"></i>
                                <div class="desc">{{ getStaticContent('workingHour') }}</div>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 footer-widget">
                    <h4 class="widget-title">Postingan Terbaru</h4>
                    <div class="footer-post">
                        @foreach ($posts as $post)
                            <div class="post-wrap mb-15">
                                <div class="post-img">
                                    <a href="blog-single.html">
                                        <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}">
                                    </a>
                                </div>
                                <div class="post-desc">
                                    <a href="blog-single.html">{{ $post->title }}</a>
                                    <div class="date-post">
                                        <i class="fa fa-calendar"></i>
                                        {{ $post->created_at->translatedFormat('F d, Y') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row y-middle">
                <div class="col-lg-6 col-md-8 sm-mb-21">
                    <div class="copyright">
                        <p>© <span class="jp-year"></span> Jalin Pertambangan. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 text-right sm-text-center">
                    <ul class="footer-social">
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
                                <a href="{{ getStaticContent('instagram') }}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        @endif

                        @if (getStaticContent('tiktok'))
                            <li>
                                <a href="{{ getStaticContent('tiktok') }}">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
