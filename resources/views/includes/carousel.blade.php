{{-- 상단 배너 --}}
<div id="demo" class="carousel slide mb-5" data-ride="carousel">
    {{-- 인디케이터 (하단 표시자) --}}
    <ul class="carousel-indicators">
        @foreach (App\Banner::ordered()->get() as $banner)
        <li data-target="#demo" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
    </ul>
    {{-- 슬라이드 목록 --}}
    <div class="carousel-inner">
        {{-- 배너 가져오기 --}}
        @foreach (App\Banner::ordered()->get() as $banner)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <div class="carousel-bgimg position-relative" style="height: 500px; background: no-repeat center/cover url('{{ 'storage/'.$banner->background }}');">
                <div class="carousel-text">
                    <div class="carousel-title mb-3" style="font-size: 45px">
                        {!! nl2br(e($banner->title)) !!}
                    </div>
                    <div class="carousel-description mb-5" style="font-size: 14px; color: #979797;">
                        {!! nl2br(e($banner->description)) !!}
                    </div>
                    <div class="carousel-bottom mb-4" style="font-size: 17px">
                        {!! nl2br(e($banner->footer)) !!}
                    </div>
                    @if ($banner->link != null)
                    <div style="font-size: 15px; color: #faa419;">
                        <a href="{{ $banner->link }}" target="_blank">자세히 보기 +</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- 좌/우 이동 컨트롤 버튼 --}}
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
    </a>
</div>
