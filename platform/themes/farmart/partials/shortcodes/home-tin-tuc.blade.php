<section class="news-section py-5 ">
    <div class="container">
        <div class="text-center mb-4">
            <div class="intro-title">
                <h3 class="intro-badge">TIN TỨC MỚI NHẤT</h3>
    
            </div>
        </div>

        @if ($posts->count() > 0)
            <div class="row align-items-start g-4">
                <!-- Bài viết nổi bật (bài đầu tiên) -->
                @php
                    $featured = $posts->first();
                    $others = $posts->skip(1)->take(4);
                @endphp

                <div class="col-lg-6">
                    <div class="news-featured">
                        <a href="{{ $featured->url }}">
                            <img
                            class="lazyload img-fluid rounded-4 shadow mb-3 w-10"
                            data-src="{{ RvMedia::getImageUrl($featured->image, 'medium', false, RvMedia::getDefaultImage()) }}"
                            src="{{ image_placeholder($featured->image) }}"
                            alt="{{ $featured->name }}"
                        >
                        </a>
                        <h5 class="fw-bold text-uppercase">
                            <a href="{{ $featured->url }}" class="text-dark text-decoration-none">
                                {{ $featured->name }}
                            </a>
                        </h5>
                        <p class="mb-0 text-secondary">
                            {!! Str::limit(strip_tags($featured->description), 200) !!}
                        </p>
                    </div>
                </div>

                <!-- Danh sách bài viết bên phải -->
                <div class="col-lg-6">
                    <div class="news-list">
                        @foreach ($others as $post)
                            <div class="news-item mb-3 pb-3 border-bottom">
                                <h6 class="fw-bold text-uppercase mb-1">
                                    <a href="{{ $post->url }}" class="text-dark text-decoration-none">
                                        {{ $post->name }}
                                    </a>
                                </h6>
                                <p class="mb-0 text-muted small">
                                    {!! Str::limit(strip_tags($post->description), 120) !!}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>