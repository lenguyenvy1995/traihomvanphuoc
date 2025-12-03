<div class="section-vp1">
    <div class="container-xxxl">
        <div class="intro-title">
            <h3 class="intro-badge">{{ __('About Us') }}</h3>

        </div>
        <section class="intro-section">
         
            <div class="intro-body">
                <h4 class="fw-bold mb-3">{{ $shortcode->title }}</h4>
                {!! $shortcode->description !!}
            </div>

            <div class="intro-footer">
                @foreach($box_abouts as $index => $item)
                    <div class="intro-card">
                        <h5>{{  $item['title'] }}</h5>
                        <p>Là công ty cung cấp dịch vụ tang lễ trọn gói chuyên nghiệp tại thị trường Việt Nam.</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

