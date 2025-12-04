<!DOCTYPE html>
<html {!! Theme::htmlAttributes() !!}>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        :root {
            --primary-color: {{ theme_option('primary_color', '#fab528') }};
            --primary-color-rgb: {{ implode(', ', BaseHelper::hexToRgb(theme_option('primary_color', '#fab528'))) }};
            --heading-color: {{ theme_option('heading_color', '#000') }};
            --text-color: {{ theme_option('text_color', '#000') }};
            --primary-button-color: {{ theme_option('primary_button_color', '#000') }};
            --primary-button-background-color: {{ theme_option('primary_button_background_color') ?: theme_option('primary_color', '#fab528') }};
            --top-header-background-color: {{ theme_option('top_header_background_color', '#f7f7f7') }};
            --top-header-text-color: {{ theme_option('top_header_text_color') ?: theme_option('header_text_color', '#000') }};
            --middle-header-background-color: {{ theme_option('middle_header_background_color', '#fff') }};
            --middle-header-text-color: {{ theme_option('middle_header_text_color') ?: theme_option('header_text_color', '#000') }};
            --bottom-header-background-color: {{ theme_option('bottom_header_background_color', '#fff') }};
            --bottom-header-text-color: {{ theme_option('bottom_header_text_color') ?: theme_option('header_text_color', '#000') }};
            --header-text-color: {{ theme_option('header_text_color', '#000') }};
            --header-text-secondary-color: {{ BaseHelper::hexToRgba(theme_option('header_text_color', '#000'), 0.5) }};
            --header-deliver-color: {{ BaseHelper::hexToRgba(theme_option('header_deliver_color', '#000'), 0.15) }};
            --header-mobile-background-color: {{ theme_option('header_mobile_background_color', '#fff') }};
            --header-mobile-icon-color: {{ theme_option('header_mobile_icon_color', '#222') }};
            --footer-text-color: {{ theme_option('footer_text_color', '#555') }};
            --footer-heading-color: {{ theme_option('footer_heading_color', '#555') }};
            --footer-hover-color: {{ theme_option('footer_hover_color', '#fab528') }};
            --footer-border-color: {{ theme_option('footer_border_color', '#dee2e6') }};
        }
    </style>

    @php
        Theme::asset()->remove('language-css');
        Theme::asset()->container('footer')->remove('language-public-js');
        Theme::asset()->container('footer')->remove('simple-slider-owl-carousel-css');
        Theme::asset()->container('footer')->remove('simple-slider-owl-carousel-js');
        Theme::asset()->container('footer')->remove('simple-slider-css');
        Theme::asset()->container('footer')->remove('simple-slider-js');
    @endphp

    {!! Theme::header() !!}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lavishly+Yours&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <style>
        .container-xxxl{
            overflow: hidden;
        }
        .section-content.section-content__slider .section-slides-wrapper .slide-item .slide-item__image {
            background-color: none;
            height: auto;
            max-height: none;
        }

        .header .header-bottom {
            background: #2a2929;
        }

        .header .header-bottom .menu>li>a {
            color: #fff;
        }

        #footer {
            background: linear-gradient(135deg, #ebd695, #caae5a);

        }

        #footer p {
            color: #000;
        }

        #footer a {
            color: #000;
        }

        /* van phuoc 1 */

        .vp-section {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .06);
            padding: clamp(18px, 3vw, 32px);
            margin: 32px auto;
            overflow: hidden;
        }

        .vp-left {
            border-radius: 12px;
            background: #f7f3eb;
            position: relative;
            overflow: hidden;
        }

        .vp-left img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .vp-handwrite {
            position: absolute;
            bottom: 14px;
            left: 14px;
            right: 14px;
            font-family: "Lavishly Yours", cursive;
            font-size: 1.8rem;
            color: #333;
            text-align: center;
            background: rgba(255, 255, 255, .7);
            border-radius: 12px;
            padding: 8px 12px;
        }

        .vp-tagline {
            color: #d4b350;
            font-weight: 800;
            letter-spacing: .5px;
            text-transform: uppercase;
            line-height: 1.3;
            font-size: 1.5rem;
            text-align: center;
        }

        .vp-list .icon {
            width: 28px;
            height: 28px;
            display: inline-grid;
            place-items: center;
            border-radius: 50%;
            background: var(--vp-gold);
            color: #d4b350;
            margin-right: .6rem;
            font-weight: 700;
            flex: 0 0 28px;
        }

        .vp-list li {
            margin-bottom: .65rem;
            color: var(--vp-dark);
            font-weight: 600;
            padding: 20px;
            font-size: 1.3rem;
        }

        .vp-mini-card {
            background: var(--vp-card);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .08);
            transition: transform .2s ease, box-shadow .2s ease;
            height: 100%;
        }

        .vp-mini-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 26px rgba(0, 0, 0, .12);
        }

        .vp-mini-card .thumb {
            height: 160px;
            background: #e9ecef;
        }

        .vp-mini-card .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .vp-mini-card .title {
            padding: 12px 14px;
            font-weight: 800;
            color: #fff;
            background: linear-gradient(120deg, rgba(0, 0, 0, .65), rgba(0, 0, 0, .35));
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .vp-mini-wrap {
            position: relative;
        }

        .vp-note {
            color: var(--vp-muted);
            font-size: .95rem;
        }

        @media (max-width: 991.98px) {
            .vp-left {
                margin-bottom: 16px;
            }
        }

        .blog-page-content .post-item-wrapper .card {
            background-color: unset;
        }

        .post-item-small {
            background-color: unset;

        }

        .entry-description p {
            color: #000;
        }

        /* giới thiệu */
        .intro-section {
            border-radius: 16px;
            padding: 2rem;
            background-color: #ffffff96;
            color: #000;
        }

        .intro-title {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        /* Nút chính “Giới thiệu” */
        .intro-badge {
            background-image: url('https://traihomvanphuoc.b-cdn.net/general/234d9d9c-8b86-46fa-9713-d052b0ca0111.webp');
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            font-weight: bolder;
            color: #847b61;
            background-position: center;
            background-repeat: repeat-x;
            background-size: contain;
            display: inline-block;
            position: relative;
            font-size: 20px;
            line-height: 1.3;
        }

        @media (max-width: 767.98px) {
            .intro-badge {
                font-size: 16px;
            }

            .intro-badge::before {
                left: -80px !important;
                transform: translateY(-46%) !important;
                width: 80px !important;
                height: 80px !important;
            }

            .intro-badge::after {
                right: -80px !important;
                transform: translateY(-46%) !important;
                width: 80px !important;
                height: 80px !important;
            }
        }

        .svg-icon svg {
            fill: #c6931f;
        }

        /* Hoa bên trái */
        .intro-badge::before {
            content: "";
            position: absolute;
            left: -90px;
            top: 50%;
            transform: translateY(-48%);
            width: 100px;
            height: 100px;
            background: url('https://traihomvanphuoc.b-cdn.net/general/b8231c40-55f3-4579-a8e3-505cd4a90712.webp') no-repeat center/contain;
            z-index: 1;
        }

        /* Hoa bên phải */
        .intro-badge::after {
            content: "";
            position: absolute;
            right: -90px;
            top: 50%;
            transform: translateY(-48%);
            width: 100px;
            height: 100px;
            background: url('https://traihomvanphuoc.b-cdn.net/general/99e2c988-211c-4e0d-a653-bc77206636b7.webp') no-repeat center/contain;
            z-index: 1;
        }


        .intro-body p {
            line-height: 1.7;
            margin-bottom: 1rem;
            color: #000000;
        }

        .intro-subtitle {
            font-weight: 700;
            font-size: 1.2rem;
            color: #c6931f;
            margin-top: 1.5rem;
        }

        .intro-footer {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 2rem;
            gap: 1rem;
        }

        .intro-card {
            flex: 1 1 280px;
            background: #fff3da73;
            border-radius: 12px;
            padding: 1rem 1.2rem;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            color: #000000;
        }

        .intro-card p {
            color: #000000;
        }

        .intro-card h5 {
            font-weight: 700;
            color: #d69b2a;
            margin-bottom: .6rem;
        }

        /* home dịch vụ */

        .service-bg {
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(3px);
        }

        .service-list li {
            margin-bottom: 0.7rem;
            color: #333;
        }

        .service-list ol {
            list-style-type: decimal;
            /* bật lại số thứ tự */
            list-style-position: inside;
            /* cho marker nằm trong */
            padding-left: 1rem;
            /* tuỳ chỉnh khoảng cách */
        }

        .service-list li::marker {
            color: #d6a633;
            font-weight: bold;
        }

        .dich-vu-mai-tang {
            border-radius: 12px;
        }

        .dich-vu-mai-tang .deco-left {
            left: 10%;
            top: -20px;
            width: 50px;
        }

        .dich-vu-mai-tang .deco-right {
            right: 10%;
            top: -20px;
            width: 50px;
        }

        .service-item img {
            transition: transform 0.4s ease;
        }

        .service-item:hover img {
            transform: scale(1.05);
        }

        .service-title {
            background: #21252973;
        }

        /* hình ảnh thực tế */
        .widget-blog {
            background: none;
        }

        .widget-header h2 {
            color: #c6931f;
        }

        /* blog */


        .news-featured img {
            transition: all 0.3s ease;
        }

        .news-featured img:hover {
            transform: scale(1.02);
        }

        .news-item h6 {
            font-size: 0.95rem;
            color: #000;
            transition: 0.3s;
        }

        .news-item:hover h6 a {
            color: #b8860b;
        }

        .news-item p {
            color: #444;
        }

        @media (max-width: 767px) {
            .news-featured img {
                height: auto;
            }
        }
    </style>
</head>

<body {!! Theme::bodyAttributes() !!}
    style="background-image: url('https://traihomvanphuoc.b-cdn.net/./152e580b-576c-4aed-9e45-b2be9d3ddd49.webp')">
    @if (theme_option('preloader_enabled', 'yes') == 'yes')
        {!! Theme::partial('preloader') !!}
    @endif

    {!! Theme::partial('svg-icons') !!}
    {!! apply_filters(THEME_FRONT_BODY, null) !!}

    <header class="header header-js-handler"
        data-sticky="{{ theme_option('sticky_header_enabled', 'yes') == 'yes' ? 'true' : 'false' }}">
        {{-- <div @class([
            'header-top d-none d-lg-block',
            'header-content-sticky' =>
                theme_option('sticky_header_content_position', 'middle') == 'top',
        ])>
            <div class="container-xxxl">
                <div class="header-wrapper">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="header-info">
                                {!! Menu::renderMenuLocation('header-navigation', ['view' => 'menu-default']) !!}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-info header-info-right">
                                <ul>
                                    @if (is_plugin_active('language'))
                                        {!! Theme::partial('language-switcher') !!}
                                    @endif
                                    @if (is_plugin_active('ecommerce'))
                                        @if (count($currencies) > 1)
                                            <li>
                                                <a
                                                    class="language-dropdown-active"
                                                    href="#"
                                                >
                                                    <span>{{ get_application_currency()->title }}</span>
                                                    <span class="svg-icon">
                                                        <svg>
                                                            <use
                                                                href="#svg-icon-chevron-down"
                                                                xlink:href="#svg-icon-chevron-down"
                                                            ></use>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <ul class="language-dropdown">
                                                    @foreach ($currencies as $currency)
                                                        @if ($currency->id !== get_application_currency_id())
                                                            <li>
                                                                <a
                                                                    href="{{ route('public.change-currency', $currency->title) }}">
                                                                    <span>{{ $currency->title }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                        @if (auth('customer')->check())
                                            <li>
                                                <a
                                                    href="{{ route('customer.overview') }}">{{ auth('customer')->user()->name }}</a>
                                                <span class="d-inline-block ms-1">(<a
                                                        class="color-primary"
                                                        href="{{ route('customer.logout') }}"
                                                    >{{ __('Logout') }}</a>)</span>
                                            </li>
                                        @else
                                            <li><a href="{{ route('customer.login') }}">{{ __('Login') }}</a></li>
                                            <li><a href="{{ route('customer.register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div @class([
            'header-middle',
            'header-content-sticky' =>
                theme_option('sticky_header_content_position', 'middle') == 'middle',
        ])>
            <div class="container-xxxl">
                <div class="header-wrapper">
                    <div class="header-items header__left">
                        <div class="logo">
                            <a href="{{ BaseHelper::getHomepageUrl() }}">
                                {!! Theme::getLogoImage(['style' => 'max-height: 45px']) !!}
                            </a>
                        </div>
                    </div>
                    <div class="header-items header__center">
                        @if (is_plugin_active('ecommerce'))
                            <x-plugins-ecommerce::fronts.ajax-search class="form--quick-search">
                                <div
                                    class="form-group--icon"
                                    style="display: none"
                                >
                                    <div class="product-category-label">
                                        <label for="product-category-select" class="text">{{ __('All Categories') }}</label>
                                        <span class="svg-icon">
                                            <svg>
                                                <use
                                                    href="#svg-icon-chevron-down"
                                                    xlink:href="#svg-icon-chevron-down"
                                                ></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <x-plugins-ecommerce::fronts.ajax-search.categories-dropdown
                                        class="form-control product-category-select"
                                        id="product-category-select"
                                    />
                                </div>
                                <x-plugins-ecommerce::fronts.ajax-search.input type="text" class="form-control input-search-product" />
                                <button
                                    class="btn"
                                    type="submit"
                                    aria-label="Submit"
                                >
                                    <span class="svg-icon">
                                        <svg>
                                            <use
                                                href="#svg-icon-search"
                                                xlink:href="#svg-icon-search"
                                            ></use>
                                        </svg>
                                    </span>
                                </button>
                            </x-plugins-ecommerce::fronts.ajax-search>
                        @endif
                    </div>
                    <div class="header-items header__right">
                        @if (theme_option('hotline'))
                            <div class="header__extra header-support">
                                <div class="header-box-content">
                                    <span>{{ theme_option('hotline') }}</span>
                                    <p>{{ __('Support 24/7') }}</p>
                                </div>
                            </div>
                        @endif

                        @if (is_plugin_active('ecommerce'))
                            @if (EcommerceHelper::isCompareEnabled())
                                <div class="header__extra header-compare">
                                    <a
                                        class="btn-compare"
                                        href="{{ route('public.compare') }}"
                                    >
                                        <i class="icon-repeat"></i>
                                        <span
                                            class="header-item-counter">{{ Cart::instance('compare')->count() }}</span>
                                    </a>
                                </div>
                            @endif
                            @if (EcommerceHelper::isWishlistEnabled())
                                <div class="header__extra header-wishlist">
                                    <a
                                        class="btn-wishlist"
                                        href="{{ route('public.wishlist') }}"
                                    >
                                        <span class="svg-icon">
                                            <svg>
                                                <use
                                                    href="#svg-icon-wishlist"
                                                    xlink:href="#svg-icon-wishlist"
                                                ></use>
                                            </svg>
                                        </span>
                                        <span class="header-item-counter">
                                            {{ auth('customer')->check()? auth('customer')->user()->wishlist()->count(): Cart::instance('wishlist')->count() }}
                                        </span>
                                    </a>
                                </div>
                            @endif
                            @if (EcommerceHelper::isCartEnabled())
                                <div
                                    class="header__extra cart--mini"
                                    role="button"
                                    tabindex="0"
                                >
                                    <div class="header__extra">
                                        <a
                                            class="btn-shopping-cart"
                                            href="{{ route('public.cart') }}"
                                        >
                                            <span class="svg-icon">
                                                <svg>
                                                    <use
                                                        href="#svg-icon-cart"
                                                        xlink:href="#svg-icon-cart"
                                                    ></use>
                                                </svg>
                                            </span>
                                            <span
                                                class="header-item-counter">{{ Cart::instance('cart')->count() }}</span>
                                        </a>
                                        <span class="cart-text">
                                            <span class="cart-title">{{ __('Your Cart') }}</span>
                                            <span class="cart-price-total">
                                                <span class="cart-amount">
                                                    <bdi>
                                                        <span>{{ format_price(Cart::instance('cart')->rawSubTotal() + Cart::instance('cart')->rawTax()) }}</span>
                                                    </bdi>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                    <div
                                        class="cart__content"
                                        id="cart-mobile"
                                    >
                                        <div class="backdrop"></div>
                                        <div class="mini-cart-content">
                                            <div class="widget-shopping-cart-content">
                                                {!! Theme::partial('cart-mini.list') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div> --}}
        <div @class([
            'header-bottom',
            'header-content-sticky' =>
                theme_option('sticky_header_content_position', 'middle') == 'bottom',
        ])>
            <div class="header-wrapper">
                <nav class="navigation">
                    <div class="container-xxxl">
                        <div class="navigation__left">
                            <div class="header-items header-items-mobile--center">
                                <div class="logo">
                                    <a href="{{ BaseHelper::getHomepageUrl() }}">
                                        {!! Theme::getLogoImage(['style' => 'max-height: 45px']) !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div @class([
                            'navigation__center',
                            'ps-0' =>
                                theme_option('enabled_product_categories_on_header', 'yes') != 'yes',
                        ])>
                            {!! Menu::renderMenuLocation('main-menu', [
                                'view' => 'menu',
                                'options' => ['class' => 'menu'],
                            ]) !!}
                        </div>
                        <div class="navigation__right">
                            {{-- @if (is_plugin_active('ecommerce') && EcommerceHelper::isEnabledCustomerRecentlyViewedProducts())
                                <div
                                    class="header-recently-viewed"
                                    data-url="{{ route('public.ajax.recently-viewed-products') }}"
                                    role="button"
                                >
                                    <h3 class="recently-title">
                                        <span class="svg-icon recent-icon">
                                            <svg>
                                                <use
                                                    href="#svg-icon-refresh"
                                                    xlink:href="#svg-icon-refresh"
                                                ></use>
                                            </svg>
                                        </span>
                                        {{ __('Recently Viewed') }}
                                    </h3>
                                    <div class="recently-viewed-inner container-xxxl">
                                        <div class="recently-viewed-content">
                                            <div class="loading--wrapper">
                                                <div class="loading"></div>
                                            </div>
                                            <div class="recently-viewed-products"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif --}}
                            @if (is_plugin_active('language'))
                                {!! Theme::partial('language-switcher') !!}
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="header-mobile header-js-handler"
            data-sticky="{{ theme_option('sticky_header_mobile_enabled', 'yes') == 'yes' ? 'true' : 'false' }}">
            <div class="header-items-mobile header-items-mobile--left">
                <div class="menu-mobile">
                    <div class="menu-box-title">
                        <div class="icon menu-icon toggle--sidebar" href="#menu-mobile">
                            <span class="svg-icon">
                                <svg>
                                    <use href="#svg-icon-list" xlink:href="#svg-icon-list"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-items-mobile header-items-mobile--center">
                <div class="logo">
                    <a href="{{ BaseHelper::getHomepageUrl() }}">
                        {!! Theme::getLogoImage(['style' => 'max-height: 45px']) !!}
                    </a>
                </div>
            </div>
            <div class="header-items-mobile header-items-mobile--right">
                <div class="search-form--mobile search-form--mobile-right search-panel">
                    <a class="open-search-panel toggle--sidebar" href="#search-mobile" title="{{ __('Search') }}">
                        <span class="svg-icon">
                            <svg>
                                <use href="#svg-icon-search" xlink:href="#svg-icon-search"></use>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </header>
