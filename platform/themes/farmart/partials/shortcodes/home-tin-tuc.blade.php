<section class="news-section py-5 " style="overflow: hidden">
    <div class="container">
        <div class="text-center mb-4">
            <div class="intro-title">
                <h3 class="intro-badge">{{ __('Newest News') }}</h3>

            </div>
        </div>

        @if ($posts->count() > 0)
            <div class="row align-items-start g-4">
                <!-- Bài viết nổi bật (bài đầu tiên) -->
                @php
                    $others = $posts->take(4);
                @endphp
                @foreach ($others as $post)
                    <div class="col-lg-3">
                        <div class="news-featured">
                            <a href="{{ $post->url }}">
                                <img class="lazyload img-fluid rounded-4 shadow mb-3 w-10"
                                    data-src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                    src="{{ image_placeholder($post->image) }}" alt="{{ $post->name }}">
                            </a>
                            <h6 class="fw-bold text-uppercase text-center">
                                <a href="{{ $post->url }}" class="text-dark text-decoration-none">
                                    {{ $post->name }}
                                </a>
                            </h6>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
