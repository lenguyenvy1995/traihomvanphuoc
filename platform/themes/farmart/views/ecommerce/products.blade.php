@php
    Theme::layout('full-width');
    $products->loadMissing('defaultVariation');
@endphp

{!! $widgets = dynamic_sidebar('products_list_sidebar') !!}

@if (empty($widgets))
    {!! Theme::partial('page-header', ['size' => 'xxxl', 'withTitle' => false]) !!}
@endif

<div class="container-xxxl">
    <div class="row my-3 my-md-5">
        <div class="col-12">
            <div class="row catalog-header justify-content-between">
                <div class="col-auto catalog-header__left d-flex align-items-center">
                    <h1 class="h2 catalog-header__title d-none d-lg-block">{{ SeoHelper::getTitleOnly() }}</h1>

                    @if (EcommerceHelper::hasAnyProductFilters())
                        <a
                            class="d-lg-none sidebar-filter-mobile"
                            href="#"
                        >
                            <span class="svg-icon me-2">
                                <svg>
                                    <use
                                        href="#svg-icon-filter"
                                        xlink:href="#svg-icon-filter"
                                    ></use>
                                </svg>
                            </span>
                            <span>{{ __('Filter') }}</span>
                        </a>
                    @endif
                </div>
                <div class="col-auto catalog-header__right">
                    <div class="catalog-toolbar row align-items-center">
                        @include(Theme::getThemeNamespace('views.ecommerce.includes.sort'))
                        @include(Theme::getThemeNamespace('views.ecommerce.includes.layout'))
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Theme::get('pageDescription'))
    <div class="ps-block__content" style=" margin-bottom: 20px;">
        <div id="pageDescription" 
             class="ps-section__content" 
             style="max-height: 500px; overflow: hidden;">
            {!! BaseHelper::clean(Theme::get('pageDescription')) !!}
        </div>

        <div class="text-center p-3">
            <button id="toggleContentBtn" 
                    class="btn btn-primary" 
                    style="padding: 8px 20px; border-radius: 8px;">
               {{ __('show more') }}
            </button>
        </div>
    </div>
    @endif

    <div class="row">
        @if (EcommerceHelper::hasAnyProductFilters())
            <div class="col-xxl-2 col-lg-3">
                <aside
                    class="catalog-primary-sidebar catalog-sidebar"
                    data-toggle-target="product-categories-primary-sidebar"
                >
                    <div class="backdrop"></div>

                    <div class="catalog-sidebar--inner side-left">
                        @include(EcommerceHelper::viewPath('includes.filters'))
                    </div>
                </aside>
            </div>
        @endif
        <div @class(['products-listing position-relative bb-product-items-wrapper col-12', 'col-xxl-10 col-lg-9' => EcommerceHelper::hasAnyProductFilters()])>
            @include(Theme::getThemeNamespace('views.ecommerce.includes.product-items'))
        </div>
    </div>
</div>
