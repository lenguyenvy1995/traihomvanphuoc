@php
    $position = $shortcode->position ?? 'left';
@endphp

<div class="home-van-chuyen container-xxxl py-4" style="overflow: hidden">
    <div class="intro-title">
        <h3 class="intro-badge">{{ $shortcode->title ?? __('Service') }}</h3>

    </div>
    <div class="row align-items-center {{ $position === 'right' ? 'flex-row-reverse' : '' }}">
        <div class="col-md-6">
            @if ($shortcode->image)
                <div class="text-center">
                    <img src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title }}"
                    class="img-fluid rounded-4 shadow-sm">
                </div>
            @endif
        </div>

        <div class="col-md-6">
            <h5 class="fw-bold text-uppercase p-3 text-center">
                {{ $shortcode->title2 }}
            </h5>
            <p class="mb-3" style="color:#000; font-size: 18px;">
                {!! $shortcode->description !!}
            </p>
            @if ($shortcode->url)
                <a href="{{ $shortcode->url }}" class="btn btn-warning rounded-pill px-4 fw-semibold">
                    {{ __('View All') }}
                </a>
            @endif
        </div>
    </div>
</div>
