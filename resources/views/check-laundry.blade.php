<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Service Detail</title>
    <link rel="icon" href="{{ asset('assets/user/img/heading-img.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/color.css') }}">
</head>

<body>
    <!-- preloader -->
    <div class="preloader">
        <div class="loader-6">
            <div class="set-one">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            <div class="set-two">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
        </div>
    </div>
    <!-- preloader end -->
    <header class="two">
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-slid">
                    <div>
                        <div class="phone-data">
                            <div class="phone d-flax align-items-center">
                                <i>
                                    <svg height="112" viewBox="0 0 24 24" width="112"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-rule="evenodd" fill="rgb(255255,255)" fill-rule="evenodd">
                                            <path
                                                d="m7 2.75c-.41421 0-.75.33579-.75.75v17c0 .4142.33579.75.75.75h10c.4142 0 .75-.3358.75-.75v-17c0-.41421-.3358-.75-.75-.75zm-2.25.75c0-1.24264 1.00736-2.25 2.25-2.25h10c1.2426 0 2.25 1.00736 2.25 2.25v17c0 1.2426-1.0074 2.25-2.25 2.25h-10c-1.24264 0-2.25-1.0074-2.25-2.25z">
                                            </path>
                                            <path
                                                d="m10.25 5c0-.41421.3358-.75.75-.75h2c.4142 0 .75.33579.75.75s-.3358.75-.75.75h-2c-.4142 0-.75-.33579-.75-.75z">
                                            </path>
                                            <path
                                                d="m9.25 19c0-.4142.33579-.75.75-.75h4c.4142 0 .75.3358.75.75s-.3358.75-.75.75h-4c-.41421 0-.75-.3358-.75-.75z">
                                            </path>
                                        </g>
                                    </svg>
                                </i>
                                <span>Phone:</span><a class="me-3" href="callto:800-836-4620">800-836-4620</a>
                            </div>
                            <div class="phone">
                                <i>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                        style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <path
                                            d="M0,81v350h512V81H0z M456.952,111L256,286.104L55.047,111H456.952z M30,128.967l134.031,116.789L30,379.787V128.967z M51.213,401l135.489-135.489L256,325.896l69.298-60.384L460.787,401H51.213z M482,379.788L347.969,245.756L482,128.967V379.788z">
                                        </path>
                                    </svg>
                                </i>
                                <span>Email:</span><a href="mallto:information@domain.com">information@domain.com</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="time">
                            <div class="login d-flex align-items-center">
                                <i class="fa-solid fa-clock"></i>
                                <p>Monday to Saturday:<b>8.00 AM - 05.00 PM</b></p>
                            </div>
                            <div class="login">
                                <i class="fa-solid fa-user"></i>
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="bottom-bar">
                <a href="index.html"><img src="{{ asset('assets/user/img/logo-b.png') }}" alt="logo"></a>
                <nav class="navbar">
                    <ul class="navbar-links">
                        <li class="navbar-dropdown has-children">
                            <a href="{{ route('welcome') }}">Welcome</a>
                        </li>
                        <li class="navbar-dropdown">
                            <a href="{{ route('check-laundry') }}">Check Laundry</a>
                        </li>
                    </ul>
                </nav>
                <div class="pickup">
                    <div class="extras">
                        <a href="javascript:void(0)" id="show">
                            <svg enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m128 102.4c0-14.138 11.462-25.6 25.6-25.6h332.8c14.138 0 25.6 11.462 25.6 25.6s-11.462 25.6-25.6 25.6h-332.8c-14.138 0-25.6-11.463-25.6-25.6zm358.4 128h-460.8c-14.138 0-25.6 11.463-25.6 25.6 0 14.138 11.462 25.6 25.6 25.6h460.8c14.138 0 25.6-11.462 25.6-25.6 0-14.137-11.462-25.6-25.6-25.6zm0 153.6h-230.4c-14.137 0-25.6 11.462-25.6 25.6 0 14.137 11.463 25.6 25.6 25.6h230.4c14.138 0 25.6-11.463 25.6-25.6 0-14.138-11.462-25.6-25.6-25.6z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <a href="javascript:void(0)" class="lightbox-toggle sec-btn">Schedule a Pickup</a>
                </div>
                <div class="bar-menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
        <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">
            <div class="res-log">
                <a href="index.html">
                    <img src="{{ asset('assets/user/img/logo.png') }}" alt="Responsive Logo">
                </a>
            </div>
            <ul>

                <li class="menu-item-has-children"><a href="JavaScript:void(0)">Home</a>
                    <ul class="sub-menu">

                        <li><a href="index.html">home 1</a></li>
                        <li><a href="index-2.html">home 2</a></li>
                    </ul>
                </li>
                <li><a href="about.html">about</a></li>


                <li class="menu-item-has-children"><a href="JavaScript:void(0)">Services</a>

                    <ul class="sub-menu">

                        <li><a href="services.html">Services</a></li>
                        <li><a href="services-details.html">services details</a></li>

                    </ul>

                </li>
                <li class="menu-item-has-children"><a href="JavaScript:void(0)">pages</a>

                    <ul class="sub-menu">

                        <li><a href="team-details.html">team details</a></li>
                        <li><a href="pricing-plan.html">pricing plan</a></li>
                        <li><a href="faq.html">faq</a></li>
                        <li><a href="404-error.html">404 error</a></li>
                    </ul>

                </li>
                <li class="menu-item-has-children"><a href="JavaScript:void(0)">News</a>

                    <ul class="sub-menu">
                        <li><a href="our-blog.html">our blog</a></li>
                        <li><a href="blog-details.html">blog details</a></li>

                    </ul>

                </li>

                <li><a href="contact.html">contacts</a></li>

            </ul>

            <a href="JavaScript:void(0)" id="res-cross"></a>

            <ul class="social-media">
                <li><a href="#" class="f"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#" class="t"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="#" class="in"><i class="fa-brands fa-linkedin-in"></i></a></li>
            </ul>
        </div>
    </header>
    <section class="hero-section banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h2>Check Laundry</h2>
                        <h6>Dry cleaning and laundry service, made to make life fresher</h6>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img">
                        <img src="{{ asset('assets/user/img/banner.jpg') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
        <div class="heroshaps-1"></div>
        <div class="heroshaps-2"></div>
    </section>
    <section class="gap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <form action="{{ route('check-laundry') }}" method="get">
                                <div class="d-flex align-items-center gap-4">
                                    <input type="text" name="kode" class="form-control"
                                        value="{{ request()->kode }}" style="width: 85%;"
                                        placeholder="Silahkan masukkan kode transaksi anda!!">
                                    <button type="submit" class="btn btn-info text-white">Cari Laundry</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="paket-table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th>Kode Transaksi</th>
                                        <th>Nama Konsumen</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Paket</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @forelse ($transaksis as $transaksi)
                                        <tr>
                                            <td>{{ $transaksi->kode }}</td>
                                            <td>{{ $transaksi->konsumen->nama }}</td>
                                            <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_masuk)->translatedFormat('d F Y') }}
                                            </td>
                                            <td>{{ $transaksi->paket->nama }}</td>
                                            <td>{{ \App\Helpers\Helper::formatRupiah($transaksi->paket->harga * $transaksi->berat, true) }}
                                            </td>
                                            <td>{!! $transaksi->status->badge() !!}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Not data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer class="two gap no-bottom" style="background-image:url({{ asset('assets/user/img/footer-1.jpg') }})">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="logo">
                        <a href="index.html">
                            <img alt="img" src="{{ asset('assets/user/img/logo.png') }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="time-table">
                        <i class="fa-solid fa-clock"></i>
                        <h6>7 days a week 7:00 AM to 11:00 PM</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="logo">
                        <div class="star-rating">
                            <img alt="img" src="{{ asset('assets/user/img/years-2.png') }}">
                            <h4>#1 Customer-Rated</h4>
                            <ul>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-contact">
                <div class="get-in-touch">
                    <i>
                        <svg height="112" viewBox="0 0 24 24" width="112" xmlns="http://www.w3.org/2000/svg">
                            <g clip-rule="evenodd" fill="rgb(255255,255)" fill-rule="evenodd">
                                <path
                                    d="m7 2.75c-.41421 0-.75.33579-.75.75v17c0 .4142.33579.75.75.75h10c.4142 0 .75-.3358.75-.75v-17c0-.41421-.3358-.75-.75-.75zm-2.25.75c0-1.24264 1.00736-2.25 2.25-2.25h10c1.2426 0 2.25 1.00736 2.25 2.25v17c0 1.2426-1.0074 2.25-2.25 2.25h-10c-1.24264 0-2.25-1.0074-2.25-2.25z">
                                </path>
                                <path
                                    d="m10.25 5c0-.41421.3358-.75.75-.75h2c.4142 0 .75.33579.75.75s-.3358.75-.75.75h-2c-.4142 0-.75-.33579-.75-.75z">
                                </path>
                                <path
                                    d="m9.25 19c0-.4142.33579-.75.75-.75h4c.4142 0 .75.3358.75.75s-.3358.75-.75.75h-4c-.41421 0-.75-.3358-.75-.75z">
                                </path>
                            </g>
                        </svg>
                    </i>
                    <div>
                        <span>Phone No:</span>
                        <h6><a href="callto:+09(0)2076897888">+09 (0) 207 689 7888</a></h6>
                    </div>
                </div>
                <div class="boder"></div>
                <div class="get-in-touch">
                    <i>
                        <svg width="60" height="40" viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.8649 18H6.13513C2.58377 18 0.540527 15.9568 0.540527 12.4054V5.5946C0.540527 2.04324 2.58377 0 6.13513 0H15.8649C19.4162 0 21.4595 2.04324 21.4595 5.5946V12.4054C21.4595 15.9568 19.4162 18 15.8649 18ZM6.13513 1.45946C3.35242 1.45946 1.99999 2.81189 1.99999 5.5946V12.4054C1.99999 15.1881 3.35242 16.5406 6.13513 16.5406H15.8649C18.6476 16.5406 20 15.1881 20 12.4054V5.5946C20 2.81189 18.6476 1.45946 15.8649 1.45946H6.13513Z">
                            </path>
                            <path
                                d="M10.9988 9.8465C10.1815 9.8465 9.35452 9.59352 8.72208 9.07785L5.67668 6.64539C5.36532 6.39241 5.30696 5.93511 5.55992 5.62376C5.8129 5.31241 6.2702 5.25403 6.58155 5.50701L9.62695 7.93947C10.3664 8.53298 11.6215 8.53298 12.361 7.93947L15.4064 5.50701C15.7178 5.25403 16.1848 5.30268 16.428 5.62376C16.681 5.93511 16.6324 6.40214 16.3113 6.64539L13.2659 9.07785C12.6432 9.59352 11.8161 9.8465 10.9988 9.8465Z">
                            </path>
                        </svg>
                    </i>
                    <div>
                        <span>Email Address:</span>
                        <h6><a href="mailto:Domainname@company.com">Domainname@company.com</a></h6>
                    </div>
                </div>
                <div class="boder"></div>
                <div class="get-in-touch two">
                    <i>
                        <svg version="1.1" xml:space="preserve" width="682.66669" height="682.66669"
                            viewBox="0 0 682.66669 682.66669" xmlns="http://www.w3.org/2000/svg">
                            <clipPath clipPathUnits="userSpaceOnUse">
                                <path d="M 0,512 H 512 V 0 H 0 Z"></path>
                            </clipPath>
                            <g transform="matrix(1.3333333,0,0,-1.3333333,0,682.66667)">
                                <g>
                                    <g clip-path="url(#clipPath2333)">
                                        <g transform="translate(256,92)">
                                            <path
                                                d="m 0,0 c -126.964,143.662 -160,165.23 -160,240 0,88.366 71.634,160 160,160 88.365,0 160,-71.634 160,-160 C 160,165.854 130.212,147.337 0,0 Z"
                                                style="fill:none;stroke:#8cc63f;stroke-width:40;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1">
                                            </path>
                                        </g>
                                        <g transform="translate(316,372)">
                                            <path d="m 0,0 -80,-80 -40,40"
                                                style="fill:none;stroke:#8cc63f;stroke-width:40;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </i>
                    <div>
                        <span class="pt-2 pb-0">5604 Willow Crossing Ct, Clifton, United State</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-title">
                        <h3>Information</h3>
                        <div class="boder"></div>
                        <p>Stanard dummy text ever snce the a Ipsumf. the printingand ypese inghas mmyen the supi
                            Stanard dummy text ever snce the a Ipsumf.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget-title">
                        <h3>Our Services</h3>
                        <div class="boder"></div>
                        <ul>
                            <li><i class="fa-solid fa-angle-right"></i><a href="javascript:void(0)">Maid Services</a>
                            </li>
                            <li><i class="fa-solid fa-angle-right"></i><a href="javascript:void(0)">About Company</a>
                            </li>
                            <li><i class="fa-solid fa-angle-right"></i><a href="javascript:void(0)">Window
                                    Cleaning</a></li>
                            <li><i class="fa-solid fa-angle-right"></i><a href="javascript:void(0)">Advice & Tips</a>
                            </li>
                            <li><i class="fa-solid fa-angle-right"></i><a href="javascript:void(0)">Office
                                    Cleaning</a></li>
                            <li><i class="fa-solid fa-angle-right"></i><a href="javascript:void(0)">Our Team</a></li>
                            <li><i class="fa-solid fa-angle-right"></i><a href="javascript:void(0)">Domestic
                                    Cleaning</a></li>
                            <li><i class="fa-solid fa-angle-right"></i><a href="javascript:void(0)">Our Partners</a>
                            </li>
                            <li><i class="fa-solid fa-angle-right"></i><a href="javascript:void(0)">Drycleaning
                                    services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget-title">
                        <h3>Newsletter Subscribe</h3>
                        <div class="boder"></div>
                        <p>Sign up to receive our latest news and special offers from our Laundry</p>
                        <form>
                            <input type="text" name="email" placeholder="Enter your email address...">
                            <button class="sec-btn"><i class="fa-solid fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bootom-bar position-relative">
            <div class="container">
                <div class="copyright">
                    <p><b>Cleanio</b> - Copyright 2023. Design by <b>Wellconcept.</b></p>
                    <ul class="social-media">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="fab fa-facebook-f icon"></i>facebook</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fab fa-twitter icon"></i>twitter</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa-brands fa-linkedin-in"></i>linkedin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->
    <!-- LIGHTBOX -->
    <div id="lightbox" class="lightbox clearfix">
        <div class="white_content">
            <a href="javascript:;" class="textright" id="close"><i class="fa-regular fa-circle-xmark"></i></a>
            <h1>Dry Cleaning & Laundry Experts</h1>
            <h4 class="des">Dry cleaning and laundry service, made to make life fresher</h4>
            <figure>
                <img src="{{ asset('assets/user/img/desktop-menu-img.jpg') }}" alt="Desktop Menu Image">
            </figure>
            <h3>Get in touch</h3>
            <p class="num"><i>
                    <svg height="112" viewBox="0 0 24 24" width="112" xmlns="http://www.w3.org/2000/svg">
                        <g clip-rule="evenodd" fill="rgb(255255,255)" fill-rule="evenodd">
                            <path
                                d="m7 2.75c-.41421 0-.75.33579-.75.75v17c0 .4142.33579.75.75.75h10c.4142 0 .75-.3358.75-.75v-17c0-.41421-.3358-.75-.75-.75zm-2.25.75c0-1.24264 1.00736-2.25 2.25-2.25h10c1.2426 0 2.25 1.00736 2.25 2.25v17c0 1.2426-1.0074 2.25-2.25 2.25h-10c-1.24264 0-2.25-1.0074-2.25-2.25z">
                            </path>
                            <path
                                d="m10.25 5c0-.41421.3358-.75.75-.75h2c.4142 0 .75.33579.75.75s-.3358.75-.75.75h-2c-.4142 0-.75-.33579-.75-.75z">
                            </path>
                            <path
                                d="m9.25 19c0-.4142.33579-.75.75-.75h4c.4142 0 .75.3358.75.75s-.3358.75-.75.75h-4c-.41421 0-.75-.3358-.75-.75z">
                            </path>
                        </g>
                    </svg>
                </i><a href="callto:(+380)503184707">(+380) 50 318 47 07</p>
            <p class="num"><i>
                    <svg version="1.1" xml:space="preserve" width="682.66669" height="682.66669"
                        viewBox="0 0 682.66669 682.66669" xmlns="http://www.w3.org/2000/svg">
                        <clipPath clipPathUnits="userSpaceOnUse">
                            <path d="M 0,512 H 512 V 0 H 0 Z"></path>
                        </clipPath>
                        <g transform="matrix(1.3333333,0,0,-1.3333333,0,682.66667)">
                            <g>
                                <g clip-path="url(#clipPath2333)">
                                    <g transform="translate(256,92)">
                                        <path
                                            d="m 0,0 c -126.964,143.662 -160,165.23 -160,240 0,88.366 71.634,160 160,160 88.365,0 160,-71.634 160,-160 C 160,165.854 130.212,147.337 0,0 Z"
                                            style="fill:none;stroke:#8cc63f;stroke-width:40;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1">
                                        </path>
                                    </g>
                                    <g transform="translate(316,372)">
                                        <path d="m 0,0 -80,-80 -40,40"
                                            style="fill:none;stroke:#8cc63f;stroke-width:40;stroke-linecap:square;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </i>65 Allerton Street 901 N Pitt Str, Suite 170, VA 22314, USA</p>
            <div class="social-medias">
                <a href="javascript:void(0)">Facebook</a>
                <a href="javascript:void(0)">Twitter</a>
                <a href="javascript:void(0)">Linkedin</a>
            </div>
        </div>
    </div>
    <!-- LIGHTBOX END -->
    <!-- popup -->
    <div class="box">
        <div class="flex-img">
            <div class="form-box">
                <div class="comment">
                    <h2>Schedule a Pickup</h2>
                    <div class="boder-bar"></div>
                </div>
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <input placeholder="Pick-Up Date" type="text" onfocus="(this.type = 'date')"
                                id="date">
                        </div>
                        <div class="col-lg-6">
                            <input placeholder="Delivery Date" type="text" onfocus="(this.type = 'date')"
                                id="date">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="Full Name" placeholder="Full Name">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="Full Name" placeholder="email address">
                        </div>
                        <div class="col-lg-12">
                            <input type="text" name="Full Name" placeholder="Phone No">
                        </div>
                        <div class="col-lg-12">
                            <input type="text" name="Address" placeholder="Address">
                        </div>
                        <div class="col-lg-12">
                            <select class="nice-select Advice">
                                <option>Services</option>
                                <option>Services 1</option>
                                <option>Services 2</option>
                                <option>Services 3</option>
                                <option>Services 4</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Comment"></textarea>
                        </div>
                        <a href="#" class="sec-btn">Book Order</a>
                    </div>
                </form>
            </div>
            <img src="{{ asset('assets/user/img/box.jpg') }}" alt="box">
        </div>
        <div class="close"><i class="fa-solid fa-xmark"></i></div>
    </div>
    <div id="progress">
        <span id="progress-value"><i class="fa-solid fa-arrow-up"></i></span>
    </div>
    <script src="{{ asset('assets/user/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/custom.js') }}"></script>
</body>
