<section class="dich-vu-mai-tang4 py-5">
    <div class="container-xxxl">
        <div class="row g-4">
            @foreach ($services ?? [] as $item)
                <div class="col-12 col-md-6">
                    <div class="service-item4 d-flex align-items-start rounded shadow-sm h-100" style="background-color: #ffffff;">

                        {{-- Cột ảnh (chiếm 4 phần) --}}
                        <div class="col-5 flex-shrink-0">
                            <a href="{{ $item['url'] ?? '#' }}" class="text-warning text-decoration-none">
                                <img src="{{ RvMedia::getImageUrl($item['image']) }}" alt="{{ $item['title'] }}"
                                    class="img-fluid rounded w-100 object-fit-cover" style="aspect-ratio: 1 / 1;">
                            </a>
                        </div>

                        {{-- Cột nội dung (chiếm 8 phần) --}}
                        <div class="col-7 d-flex flex-column justify-content-center text-center text-start">
                            <h4 class="mb-2 fw-bold text-warning text-uppercase p-4">
                                <a href="{{ $item['url'] ?? '#' }}" class="text-warning text-decoration-none">
                                    {{ $item['title'] }}
                                </a>
                            </h4>

                            @if (!empty($item['content']))
                                <p class="text-muted mb-0 p-1" style="font-size:20px;">
                                    {!! BaseHelper::clean(Str::limit($item['content'], 120)) !!}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
