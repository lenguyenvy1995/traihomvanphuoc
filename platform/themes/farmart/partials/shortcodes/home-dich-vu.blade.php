<section class="service-list container-xxxl py-5" style="overflow: hidden">
    <div class="intro-title">
        <h3 class="intro-badge">{{ $shortcode->title??'DỊCH VỤ' }}</h3>

    </div>
    <div class="row align-items-center {{$shortcode->position=='left'?'flex-row-reverse':''}} ">
        {{-- @dd($shortcode) --}}
        <div class="col-lg-8">
            <div class="service-bg p-4 rounded-4 shadow-sm">
                @if(!empty($services))
                    <div class="row">
                        @php $half = ceil(count($services) / 2); @endphp
        
                        <div class="col-md-6">
                            <ol class="list-unstyled fw-semibold">
                                @foreach($services as $index => $item)
                                    {{-- @dd($item) --}}
                                    @if($index < $half)
                                        <li> <a href="{{ $item['url'] ?? '' }}"> {{ $item['title'] ?? '' }}</a> </li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
        
                        <div class="col-md-6">
                            <ol start="{{ $half + 1 }}" class="list-unstyled fw-semibold">
                                @foreach($services as $index => $item)
                                    @if($index >= $half)
                                        <li><a href=" {{ $item['url'] ?? '' }}"> {{ $item['title'] ?? '' }} </a></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                    </div>
                @else
                    <p class="text-muted">Chưa có dịch vụ nào được thêm.</p>
                @endif
            </div>
        </div>
      <div class="col-lg-4 mt-4 mt-lg-0">
        <img
          src="{{ RvMedia::getImageUrl($shortcode->image) }}"
          alt="{{ $shortcode->title??'DỊCH VỤ' }}"
          class="img-fluid rounded-4 shadow"
        />
      </div>
    </div>
  </section>