@php
    $priceClassName ??= null;
    $priceWrapperClassName ??= null;
@endphp

<span class="{{ $priceWrapperClassName === null ? 'bb-product-price-text-old' : $priceWrapperClassName }}">
    <small>
        <del
            class="{{ $priceClassName === null ? 'text-muted' : $priceClassName }}"
            data-bb-value="product-original-price"
        >
            @if (!empty($product->price_none))
                {{ format_price($product->price_none) }}
            @else
                {{ $product->price()->displayPriceOriginalAsText() }}
            @endif
        </del>
    </small>
</span>