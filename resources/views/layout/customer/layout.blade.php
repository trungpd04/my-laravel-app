<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Shop - Home')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f8f9fa;
        }

        /* Gradient Background */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        }

        /* Text Colors */
        .text-gradient-primary {
            color: #667eea !important;
        }

        .text-primary {
            color: #667eea !important;
        }

        /* Product Cards */
        .product-card {
            transition: all 0.3s ease;
            border-radius: 10px !important;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
        }

        .product-image {
            height: 250px;
            width: 100%;
            object-fit: cover;
        }

        /* Buttons */
        .btn-rounded {
            border-radius: 25px !important;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            border: none !important;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5568d3 0%, #653a8b 100%) !important;
            transform: scale(1.05);
        }

        .rounded-pill {
            border-radius: 50rem !important;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1) !important;
        }

        .navbar-brand {
            font-size: 1.5rem;
        }

        /* ============================================================
           Multi-level Category Dropdown — pure CSS checkbox hack
           No JavaScript. A hidden <input type="checkbox"> drives
           every open/close via the CSS :checked + sibling (~) selectors.
           ============================================================ */

        /* Hide all checkboxes — they are only logical toggles */
        .cat-cb { display: none; }

        /* ── Nav trigger (label acts as the clickable button) ────── */
        .cat-nav-item {
            position: relative;
            list-style: none;
        }

        .cat-nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            gap: 4px;
            cursor: pointer;
            user-select: none;
            transition: color 0.2s;
        }

        .cat-nav-link:hover { color: #fff !important; }

        .cat-nav-link .cat-caret {
            font-size: 0.7rem;
            opacity: 0.7;
            transition: transform 0.2s ease;
        }

        /* Rotate caret when top panel is open */
        #cat-menu-cb:checked ~ .cat-nav-link .cat-caret {
            transform: rotate(180deg);
        }

        /* ── Top-level panel ─────────────────────────────────────── */
        .cat-nav-item > .cat-dropdown {
            display: block;
            visibility: hidden;
            opacity: 0;
            pointer-events: none;
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 240px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.14);
            padding: 6px 0;
            margin: 0;
            list-style: none;
            z-index: 1050;
            transform: translateY(6px);
            transition: opacity 0.18s ease, visibility 0.18s ease, transform 0.18s ease;
        }

        /* Checkbox checked → show panel */
        #cat-menu-cb:checked ~ .cat-dropdown {
            visibility: visible;
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }

        /* ── Items inside the dropdown ───────────────────────────── */
        .cat-dropdown li { list-style: none; }

        /* Leaf items (plain <a> links) */
        .cat-dropdown li > a {
            display: flex;
            align-items: center;
            padding: 9px 18px;
            color: #444;
            font-size: 0.92rem;
            text-decoration: none;
            white-space: nowrap;
            /* transition: background 0.15s, color 0.15s, transform 0.15s; */
        }

        .cat-dropdown li > a:hover {
            background: #f0f0ff;
            color: #667eea;
        }

        /* ── Parent items (label acts as the row) ────────────────── */
        .cat-item-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 9px 18px;
            font-size: 0.92rem;
            font-weight: 600;
            color: #333;
            cursor: pointer;
            user-select: none;
            white-space: nowrap;
            transition: background 0.15s, color 0.15s, transform 0.15s;
        }

        .cat-item-label:hover {
            background: #f0f0ff;
            color: #667eea;
        }

        /* ── Chevron on parent rows ──────────────────────────────── */
        .cat-arrow {
            font-size: 0.65rem;
            margin-left: 8px;
            opacity: 0.4;
            flex-shrink: 0;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        /* Rotate chevron when its checkbox is checked */
        .cat-sub-cb:checked ~ .cat-item-label .cat-arrow {
            transform: rotate(180deg);
            opacity: 0.8;
        }

        /* ── Nested sub-menus ────────────────────────────────────── */
        .cat-dropdown .cat-dropdown {
            display: block;
            max-height: 0;
            overflow: hidden;
            position: static;
            box-shadow: none;
            border-radius: 0;
            padding: 0;
            margin: 0;
            list-style: none;
            background: transparent;
            pointer-events: none;
            transition: max-height 0.25s ease;
        }

        /* Checkbox checked → expand nested panel */
        .cat-sub-cb:checked ~ .cat-dropdown {
            max-height: 600px;
            pointer-events: auto;
        }

        /* Child items indented */
        .cat-dropdown .cat-dropdown li > a,
        .cat-dropdown .cat-dropdown .cat-item-label {
            padding-left: 32px;
            font-size: 0.88rem;
            color: #555;
            font-weight: normal;
        }

        /* Separator between parent-level rows */
        .cat-dropdown li.has-submenu {
            border-bottom: 1px solid #f0f0f0;
        }

        .cat-dropdown li.has-submenu:last-child {
            border-bottom: none;
        }

        /* ── Mobile ──────────────────────────────────────────────── */
        @media (max-width: 991.98px) {
            .cat-nav-item > .cat-dropdown {
                position: static;
                transform: none;
                box-shadow: none;
                border-radius: 0;
                border-top: 1px solid rgba(255,255,255,0.2);
            }
        }

        /* Footer */
        footer {
            background-color: #2d3748 !important;
        }

        footer a:hover {
            color: #fff !important;
            transition: color 0.3s ease;
        }

        /* Category Images */
        .category-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Shadows */
        .shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        }

        .shadow {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }
    </style>

    @yield('styles')
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand font-weight-bold h4 mb-0" href="{{ route('home') }}">
                <i class="fas fa-store mr-2"></i>MyShop
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link font-weight-medium" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-medium" href="#">Products</a>
                    </li>

                    <!-- Multi-level Categories — pure CSS checkbox hack -->
                    <li class="cat-nav-item">
                        {{-- Hidden checkbox drives the panel open/close --}}
                        <input type="checkbox" id="cat-menu-cb" class="cat-cb">
                        <label for="cat-menu-cb" class="cat-nav-link">
                            <i class="fas fa-th-large mr-1"></i>
                            Categories
                            <i class="fas fa-chevron-down cat-caret"></i>
                        </label>

                        @if(isset($navCategories) && $navCategories->isNotEmpty())
                            <ul class="cat-dropdown">
                                @foreach($navCategories as $category)
                                    @include('partial.category-menu-item', ['category' => $category, 'depth' => 0])
                                @endforeach
                            </ul>
                        @else
                            <ul class="cat-dropdown">
                                <li><a href="#" class="text-muted">No categories available</a></li>
                            </ul>
                        @endif
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-medium" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-medium" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="#">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge badge-danger position-absolute" style="top: 0; right: -10px;">0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="font-weight-bold mb-3">About MyShop</h5>
                    <p class="text-white-50">Your one-stop destination for quality products at great prices. We pride
                        ourselves on excellent customer service and fast delivery.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="font-weight-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Contact</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="font-weight-bold mb-3">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2 text-white-50"><i class="fas fa-map-marker-alt mr-2"></i>123 Shop Street, City
                        </li>
                        <li class="mb-2 text-white-50"><i class="fas fa-phone mr-2"></i>+1 234 567 890</li>
                        <li class="mb-2 text-white-50"><i class="fas fa-envelope mr-2"></i>info@myshop.com</li>
                    </ul>
                    <div class="mt-3">
                        <a href="#" class="text-white-50 mr-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white-50 mr-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white-50 mr-3"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center text-white-50">
                <p class="mb-0">&copy; 2026 MyShop. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')
</body>

</html>