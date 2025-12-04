<section class="py-5 text-center" style="overflow: hidden">
    <div class="container-xxxl">
        <h3 class="fw-bold text-uppercase d-inline-block px-4 py-2 rounded-pill bg-warning text-white shadow-sm mb-4">
           {{ __('Real Photos') }}
        </h3>

        @if (!empty($images))
            <div id="lightgallery">

                @foreach ($images as $index => $item)
                    <a data-fancybox="gallery" href="{{ RvMedia::getImageUrl($item['image']) }}">
                        <img src="{{ RvMedia::getImageUrl($item['image']) }}" alt="{{ __('Real Photos') }} {{ $index + 1 }}" class="m-1">
                    </a>

                @endforeach
            </div>
        @endif
    </div>
</section>
