@php
    Theme::set('pageTitle', 'DANH SÁCH CÁO PHÓ');

@endphp

<div class="container py-5">
    <div class="row">
        @foreach ($items as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100">

                    {{-- Ảnh đại diện --}}
                    @if ($item->avatar)
                        <a href="{{ $item->url }}">
                            <img src="{{ RvMedia::getImageUrl($item->avatar) }}" class="card-img-top"
                                alt="{{ $item->name }}">
                        </a>
                    @endif

                    <div class="card-body" style="background-color: #000">

                        {{-- Tên --}}
                        <h5 class="mb-2" style="text-transform: uppercase;color: #fbdb08;text-align: center;">
                            {{ $item->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $items->links() }}
    </div>
</div>
