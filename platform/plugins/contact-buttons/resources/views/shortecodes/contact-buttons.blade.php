@php
    $wrapperClass = 'cb-wrapper cb-pos-' . e($position ?? 'right') . ' cb-style-' . e($style ?? '1');
@endphp

<div class="{{ $wrapperClass }}" id="cb-wrapper">
    @foreach ($buttons as $btn)
        <a href="{{ $btn->url }}" class="cb-item" target="{{ $btn->target }}"
            style="--cb-bg: {{ $btn->bg_color ?? '#0ea5e9' }}; --cb-color: {{ $btn->text_color ?? '#fff' }};">
            @if ($btn->image)
                <img src="{{ RvMedia::getImageUrl($btn->image) }}" alt="{{ $btn->label }}" class="cb-icon-img">
            @elseif($btn->icon_class)
                <i class="{{ $btn->icon_class }}"></i>
            @endif
            <span class="cb-label">{{ $btn->label }}</span>
        </a>
    @endforeach
</div>

{{-- style switch --}}
@if (($style ?? '1') == '1')
    @include('plugins/contact-buttons::shortcodes.styles.style1')
@elseif(($style ?? '1') == '2')
    @include('plugins/contact-buttons::shortcodes.styles.style2')
@else
    @include('plugins/contact-buttons::shortcodes.styles.style3')
@endif
