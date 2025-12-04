<section class="dich-vu-mai-tang py-5">
    <div class="container-xxxl text-center" style="overflow: hidden">
        @if ( $shortcode->title)
            <div class="intro-title">
                <h3 class="intro-badge">{{ $shortcode->title ?? 'DỊCH VỤ' }}</h3>

            </div>
        @endif
        <div class="row justify-content-center g-4">
            @foreach ($services ?? [] as $item)
                <div class="col-6 col-md-4 col-lg-4">
                    <div class="service-item position-relative rounded overflow-hidden shadow-sm">
                        <img src="{{ RvMedia::getImageUrl($item['image']) }}" alt="{{ $item['title'] }}"
                            class="img-fluid w-100 rounded">
                        <div class="service-title position-absolute bottom-0 w-100  py-3">
                            <a class="mb-0 fw-bold text-warning text-uppercase small text-center" href="{{ $item['url'] ?? '' }}">
                                {{ $item['title'] }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
