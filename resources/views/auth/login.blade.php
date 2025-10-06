<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.4.0
* @link https://tabler.io
* Copyright 2018-2025 The Tabler Authors
* Copyright 2018-2025 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ __('Masuk') }} - {{ config('app.name') }}</title>
    <meta name="msapplication-TileColor" content="#066fd1" />
    <meta name="theme-color" content="#066fd1" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <meta name="description"
        content="Tabler is packed with beautifully crafted components and powerful features. Jump in and start building a stunning dashboard — all for free!" />
    <meta name="canonical" content="https://preview.tabler.io/sign-in.html" />
    <meta name="twitter:image:src" content="https://preview.tabler.io/static/og.png" />
    <meta name="twitter:site" content="@tabler_ui" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title"
        content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI." />
    <meta name="twitter:description"
        content="Tabler is packed with beautifully crafted components and powerful features. Jump in and start building a stunning dashboard — all for free!" />
    <meta property="og:image" content="https://preview.tabler.io/static/og.png" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="og:site_name" content="Tabler" />
    <meta property="og:type" content="object" />
    <meta property="og:title"
        content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI." />
    <meta property="og:url" content="https://preview.tabler.io/static/og.png" />
    <meta property="og:description"
        content="Tabler is packed with beautifully crafted components and powerful features. Jump in and start building a stunning dashboard — all for free!" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/css/tabler.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN DEMO STYLES -->

    <!-- END DEMO STYLES -->
    <!-- BEGIN CUSTOM FONT -->
    <style>
        @import url("https://rsms.me/inter/inter.css");
    </style>
    <!-- END CUSTOM FONT -->
</head>

<body>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <!-- BEGIN NAVBAR LOGO -->
                <a href="." aria-label="Tabler"
                    class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="img-fluid">
                </a><!-- END NAVBAR LOGO -->
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">{{ __('Masuk ke Akun Anda') }}</h2>

                    @if (session()->has('message'))
                        <div class="alert alert-danger text-center" role="alert">
                            <div class="alert-icon">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/alert-circle -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon icon-2">
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                    <path d="M12 8v4"></path>
                                    <path d="M12 16h.01"></path>
                                </svg>
                            </div>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="post" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="email">
                                {{ __('Email') }}
                            </label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="your@email.com"
                                autocomplete="off" value="{{ old('email') }}" />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="password">
                                {{ __('Kata Sandi') }}
                            </label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('Kata Sandi Anda') }}" />
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" />
                                <span class="form-check-label">{{ __('Ingat Saya') }}</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                {{ __('Masuk') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/js/tabler.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"
        integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN DEMO SCRIPTS -->
    <!-- END DEMO SCRIPTS -->
    <!-- BEGIN PAGE SCRIPTS -->
</body>

</html>
