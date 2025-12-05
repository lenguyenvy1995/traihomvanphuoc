@extends(Theme::getThemeNamespace() . '::layouts.master')

@php
    Theme::setTitle( 'gagag');
@endphp

@section('content')

<section class="py-5">
    <div class="container">

        <h2 class="mb-4 text-center">{{ __('obituaries') }} aggsg</h2>

        <div class="row">
            @foreach($items as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        
                        @if($item->image)
                            <img src="{{ RvMedia::getImageUrl($item->image, 'medium') }}"
                                 class="card-img-top">
                        @endif

                        <div class="card-body">
                            <h5>{{ $item->title }}</h5>
                            <p>{{ Str::limit($item->description, 100) }}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $items->links() }}
        </div>

    </div>
</section>

@endsection