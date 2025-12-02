@php
    Theme::setTitle('Danh sách Cáo Phó');
@endphp

<div class="container py-5">
    <h2 class="mb-4">Danh sách cáo phó</h2>

    <div class="row">
        @foreach($items as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100">

                    {{-- Ảnh đại diện --}}
                    @if ($item->avatar)
                        <img src="{{ RvMedia::getImageUrl($item->avatar) }}" class="card-img-top" alt="{{ $item->name }}">
                    @endif

                    <div class="card-body" style="background-color: #000">

                        {{-- Tên --}}
                        <h5 class="mb-2" style="text-transform: uppercase;color: #fbdb08;text-align: center;">{{ $item->name }}</h5>

                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>