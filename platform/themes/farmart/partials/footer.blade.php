<footer id="footer">
    <div class="container-xxxl">
        <div class="row gy-4">
            <!-- Cột 1: Logo + mô tả -->
            <div class="col-lg-5 col-md-6">
                @if (theme_option('title2'))
                    <h5 class="text-uppercase fw-bold mb-3">{{ theme_option('title2') }}</h5>
                @endif

                @if (theme_option('address'))
                    <p class="mb-1"><strong>Địa chỉ:</strong> {{ theme_option('address') }}</p>
                @endif

                @if (theme_option('address2'))
                    <p class="mb-1"><strong>Chi nhánh:</strong> {{ theme_option('address2') }}</p>
                @endif

                @if (theme_option('hotline'))
                    <p class="mb-1"><strong>Điện thoại 1:</strong> {{ theme_option('hotline') }}</p>
                @endif

                @if (theme_option('hotline2'))
                    <p class="mb-1"><strong>Điện thoại 2:</strong> {{ theme_option('hotline2') }}</p>
                @endif

                @if (theme_option('email'))
                    <p class="mb-1"><strong>Email:</strong> {{ theme_option('email') }}</p>
                @endif
            </div>

            <!-- Cột 3: Dịch vụ -->
            <div class="col-lg-4 col-md-6">
                <h5 class="text-uppercase fw-bold mb-3">Dịch vụ nổi bật</h5>
                @php
                    $pages = Botble\Page\Models\Page::query()
                        ->where('outstanding', 1)
                        ->where('status', 'published') // Nếu bạn chỉ muốn trang đã public
                        ->orderByDesc('created_at')
                        ->get();
                @endphp
                <ul class="list-unstyled">
                    @foreach ($pages as $page)
                        <li>
                            <a href="{{ $page->url }}" class="text-decoration-none d-block mb-2">
                                {{ $page->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Cột 4: Mạng xã hội -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase fw-bold mb-3">GOOGLE MAPS</h5>
                <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
                    <iframe src="https://www.google.com/maps?q={{ urlencode(theme_option('address')) }}&output=embed"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxxl">
        <div class="row border-top py-4">
            <div class="col-lg-3 col-md-4 py-3">
                <div class="copyright d-flex justify-content-center justify-content-md-start">
                    <span>{!! Theme::getSiteCopyright() !!}</span>
                </div>
            </div>
            {{-- <div class="col-lg-6 col-md-4 py-3">
                @if (theme_option('payment_methods_image'))
                    <div class="footer-payments d-flex justify-content-center">
                        @if (theme_option('payment_methods_link'))
                            <a href="{{ url(theme_option('payment_methods_link')) }}" target="_blank">
                        @endif

                        <img class="lazyload"
                            data-src="{{ RvMedia::getImageUrl(theme_option('payment_methods_image')) }}"
                            alt="footer-payments">

                        @if (theme_option('payment_methods_link'))
                            </a>
                        @endif
                    </div>
                @endif
            </div> --}}
            <div class="col-lg-3 col-md-4 py-3">
                <div class="footer-socials d-flex justify-content-md-end justify-content-center">
                    @if ($socialLinks = Theme::getSocialLinks())
                        <p class="me-3 mb-0">{{ __('Stay connected:') }}</p>
                        <div class="footer-socials-container">
                            <ul class="ps-0 mb-0">
                                @foreach ($socialLinks as $socialLink)
                                    @continue(!$socialLink->getUrl() || !$socialLink->getIconHtml())

                                    <li class="d-inline-block ps-1 my-1">
                                        <a {!! $socialLink->getAttributes() !!}>{{ $socialLink->getIconHtml() }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>
@if (is_plugin_active('ecommerce'))
    <div class="panel--sidebar" id="navigation-mobile">
        <div class="panel__header">
            <span class="svg-icon close-toggle--sidebar">
                <svg>
                    <use href="#svg-icon-arrow-left" xlink:href="#svg-icon-arrow-left"></use>
                </svg>
            </span>
            <h3>{{ __('Categories') }}</h3>
        </div>
        <div class="panel__content" data-bb-toggle="init-categories-dropdown"
            data-bb-target=".product-category-dropdown-wrapper"
            data-url="{{ route('public.ajax.categories-dropdown') }}">
            <ul class="menu--mobile product-category-dropdown-wrapper"></ul>
        </div>
    </div>
@endif

<div class="panel--sidebar" id="menu-mobile">
    <div class="panel__header">
        <span class="svg-icon close-toggle--sidebar">
            <svg>
                <use href="#svg-icon-arrow-left" xlink:href="#svg-icon-arrow-left"></use>
            </svg>
        </span>
        <h3>{{ __('Menu') }}</h3>
    </div>
    <div class="panel__content">
        {!! Menu::renderMenuLocation('main-menu', [
            'view' => 'menu',
            'options' => ['class' => 'menu--mobile'],
        ]) !!}

        {!! Menu::renderMenuLocation('header-navigation', [
            'view' => 'menu',
            'options' => ['class' => 'menu--mobile'],
        ]) !!}

        <ul class="menu--mobile">

            @if (is_plugin_active('ecommerce'))
                @if (EcommerceHelper::isCompareEnabled())
                    <li><a href="{{ route('public.compare') }}"><span>{{ __('Compare') }}</span></a></li>
                @endif

                @if (count($currencies) > 1)
                    <li class="menu-item-has-children">
                        <a href="#">
                            <span>{{ get_application_currency()->title }}</span>
                            <span class="sub-toggle">
                                <span class="svg-icon">
                                    <svg>
                                        <use href="#svg-icon-chevron-down" xlink:href="#svg-icon-chevron-down">
                                        </use>
                                    </svg>
                                </span>
                            </span>
                        </a>
                        <ul class="sub-menu">
                            @foreach ($currencies as $currency)
                                @if ($currency->id !== get_application_currency_id())
                                    <li><a
                                            href="{{ route('public.change-currency', $currency->title) }}"><span>{{ $currency->title }}</span></a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endif
            @if (is_plugin_active('language'))
                @php
                    $supportedLocales = Language::getSupportedLocales();
                @endphp

                @if ($supportedLocales && count($supportedLocales) > 1)
                    @php
                        $languageDisplay = setting('language_display', 'all');
                    @endphp
                    <li class="menu-item-has-children">
                        <a href="#">
                            @if ($languageDisplay == 'all' || $languageDisplay == 'flag')
                                {!! language_flag(Language::getCurrentLocaleFlag(), Language::getCurrentLocaleName()) !!}
                            @endif
                            @if ($languageDisplay == 'all' || $languageDisplay == 'name')
                                {{ Language::getCurrentLocaleName() }}
                            @endif
                            <span class="sub-toggle">
                                <span class="svg-icon">
                                    <svg>
                                        <use href="#svg-icon-chevron-down" xlink:href="#svg-icon-chevron-down">
                                        </use>
                                    </svg>
                                </span>
                            </span>
                        </a>
                        <ul class="sub-menu">
                            @foreach ($supportedLocales as $localeCode => $properties)
                                @if ($localeCode != Language::getCurrentLocale())
                                    <li>
                                        <a
                                            href="{{ Language::getSwitcherUrl($localeCode, $properties['lang_code']) }}">
                                            @if ($languageDisplay == 'all' || $languageDisplay == 'flag')
                                                {!! language_flag($properties['lang_flag'], $properties['lang_name']) !!}
                                            @endif
                                            @if ($languageDisplay == 'all' || $languageDisplay == 'name')
                                                <span>{{ $properties['lang_name'] }}</span>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</div>
<div class="panel--sidebar panel--sidebar__right" id="search-mobile">
    <div class="panel__header">
        @if (is_plugin_active('ecommerce'))
            <x-plugins-ecommerce::fronts.ajax-search class="form--quick-search bb-form-quick-search w-100">
                <div class="search-inner-content">
                    <div class="text-search">
                        <div class="search-wrapper">
                            <x-plugins-ecommerce::fronts.ajax-search.input type="text"
                                class="search-field input-search-product" />
                            <button class="btn" type="submit" aria-label="Submit">
                                <span class="svg-icon">
                                    <svg>
                                        <use href="#svg-icon-search" xlink:href="#svg-icon-search"></use>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <a class="close-search-panel close-toggle--sidebar" href="#" aria-label="Search">
                            <span class="svg-icon">
                                <svg>
                                    <use href="#svg-icon-times" xlink:href="#svg-icon-times"></use>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </x-plugins-ecommerce::fronts.ajax-search>
        @endif
    </div>
</div>
<div class="footer-mobile" @if (theme_option('bottom_bar_menu_show_text', 'yes') != 'yes') data-hide-text="true" @endif
    style="--bottom-bar-menu-text-font-size: {{ theme_option('bottom_bar_menu_text_font_size', 11) }}px;">
    <ul class="menu--footer">
        <li>
            <a href="{{ BaseHelper::getHomepageUrl() }}">
                <i class="icon-home3"></i>
                <span>{{ __('Home') }}</span>
            </a>
        </li>
        @if (is_plugin_active('ecommerce'))
            <li>
                <a class="toggle--sidebar" href="#navigation-mobile">
                    <i class="icon-list"></i>
                    <span>{{ __('Category') }}</span>
                </a>
            </li>
            @if (EcommerceHelper::isCartEnabled())
                <li>
                    <a class="toggle--sidebar" href="#cart-mobile">
                        <i class="icon-cart">
                            <span class="cart-counter">{{ Cart::instance('cart')->count() }}</span>
                        </i>
                        <span>{{ __('Cart') }}</span>
                    </a>
                </li>
            @endif
            @if (EcommerceHelper::isWishlistEnabled())
                <li>
                    <a href="{{ route('public.wishlist') }}">
                        <i class="icon-heart"></i>
                        <span>{{ __('Wishlist') }}</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('customer.overview') }}">
                    <i class="icon-user"></i>
                    <span>{{ __('Account') }}</span>
                </a>
            </li>
        @endif
    </ul>
</div>
@if (is_plugin_active('ecommerce'))
    {!! Theme::partial('ecommerce.quick-view-modal') !!}
    {!! Theme::partial('ecommerce.quick-shop-modal') !!}
@endif
{!! Theme::partial('toast') !!}

<div class="panel-overlay-layer"></div>
{{-- <div id="back2top">
    <span class="svg-icon">
        <svg>
            <use href="#svg-icon-arrow-up" xlink:href="#svg-icon-arrow-up"></use>
        </svg>
    </span>
</div> --}}

<script data-pagespeed-no-defer data-pagespeed-no-transform>
    'use strict';

    window.trans = {
        "View All": "{{ __('View All') }}",
        "No reviews!": "{{ __('No reviews!') }}"
    };

    window.siteConfig = {
        "url": "{{ BaseHelper::getHomepageUrl() }}",
        "img_placeholder": "{{ theme_option('lazy_load_image_enabled', 'yes') == 'yes' ? image_placeholder() : null }}",
        "countdown_text": {
            "days": "{{ __('days') }}",
            "hours": "{{ __('hours') }}",
            "minutes": "{{ __('mins') }}",
            "seconds": "{{ __('secs') }}"
        }
    };

    @if (is_plugin_active('ecommerce') && EcommerceHelper::isCartEnabled())
        window.siteConfig.ajaxCart = "{{ route('public.ajax.cart') }}";
        window.siteConfig.cartUrl = "{{ route('public.cart') }}";
    @endif
</script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<script>
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });
</script>
{!! Theme::footer() !!}

</body>

</html>
