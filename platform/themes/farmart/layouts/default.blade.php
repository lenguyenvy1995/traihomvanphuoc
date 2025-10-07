{!! Theme::partial('header') !!}

<div id="main-content" style="background-image: url('https://traihomvanphuoc.b-cdn.net/./152e580b-576c-4aed-9e45-b2be9d3ddd49.webp')">
    {!! Theme::partial('page-header', [
        'size' => Theme::get('containerSize', 'xl'),
        'withTitle' => Theme::get('withTitle', true),
    ]) !!}
    <div class="container-{{ Theme::get('containerSize', 'xl') }}">
        <div class="mb-5">
            {!! Theme::content() !!}
        </div>
    </div>
</div>

{!! Theme::partial('footer') !!}
