@if (!EcommerceHelper::hideProductPrice() || EcommerceHelper::isCartEnabled())
    @if (!empty($product->price_none))
        {{-- ✅ Nếu có price_none thì chỉ hiển thị price_none, bỏ giá gốc/sale --}}
        <span class="product-price">
            <span class="price-amount">
                <bdi>
                    <span class="amount bb-product-price-text text-danger fw-bold" data-bb-value="product-price-none">
                        {!! $product->price_none !!} 
                    </span>
                </bdi>
            </span>
        </span>
    @else
        {{-- ✅ Nếu KHÔNG có price_none thì hiển thị như mặc định --}}
        <span class="product-price">
            <span class="product-price-sale bb-product-price @if (!$product->isOnSale()) d-none @endif">
                <ins>
                    <span class="price-amount">
                        <bdi>
                            <span class="amount bb-product-price-text" data-bb-value="product-price">
                                {{ format_price($product->front_sale_price_with_taxes) }}
                            </span>
                        </bdi>
                    </span>
                </ins>
                &nbsp;
                <del aria-hidden="true">
                    <span class="price-amount">
                        <bdi>
                            <span class="amount bb-product-price-text-old" data-bb-value="product-original-price">
                                {{ format_price($product->price_with_taxes) }}
                            </span>
                        </bdi>
                    </span>
                </del>
            </span>

            <span class="product-price-original bb-product-price @if ($product->isOnSale()) d-none @endif">
                <span class="price-amount">
                    <bdi>
                        <span class="amount bb-product-price-text" data-bb-value="product-price">
                            {{ format_price($product->front_sale_price_with_taxes) }}
                        </span>
                    </bdi>
                </span>
            </span>
        </span>
    @endif
@endif