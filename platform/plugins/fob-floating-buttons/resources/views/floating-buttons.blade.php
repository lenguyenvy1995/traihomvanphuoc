<div
    class="floating-buttons"
    data-position="{{ setting('fob-floating-buttons.position', 'bottom_right') }}"
    data-offset-x="{{ setting('fob-floating-buttons.offset_x', 20) }}"
    data-offset-y="{{ setting('fob-floating-buttons.offset_y', 100) }}">
    <ul @class(['sb-bar', 'd-none d-sm-block'=> setting('fob-floating-buttons.display_on_mobile', 'collapsed') == 'hide'])>

        @foreach($floatingButtons as $floatingButton)
        @include('plugins/fob-floating-buttons::floating-button-item', [
        'floatingButton' => $floatingButton,
        'wrapperClass' => $collapsedOnMobile ? 'd-none d-sm-block' : '',
        ])
        @endforeach

    </ul>
    @if (!$collapsedOnMobile)

    <div class="module-on-mobile">
        <ul class="list-button-mobile">
            @foreach($floatingButtons as $floatingButton)
            @include('plugins/fob-floating-buttons::floating-button-item-mobile', ['floatingButton' => $floatingButton])
            @endforeach
        </ul>
    </div>

    @endif
</div>
</div>

</div>