@push('styles')
<style>
    .card {
        border-radius: 0;
        border: none;
        padding: 0;
        margin-bottom: 2.3rem !important;
    }

    .card .card-body {
        padding: 0;
    }

</style>
@endpush

<div id="{{ $information->id }}" class="card rounded-top">
    <img class="card-img-top" src="{{ $information->thumb != null ? url('storage/'.$information->thumb) : asset('svg/placeholder3x2.svg') }}">
    <div class="card-body">
        <div class="duration p-3 text-white font-weight-bold" style="background-color: rgb(38, 73, 145);">
            <span>{{ $information->start_date != null ? $information->start_date->format('Y.m.d') : '없음' }}</span>
            ~
            <span>{{ $information->end_date != null ? $information->end_date->format('Y.m.d') : '없음' }}</span>
        </div>
        <div class="p-3">
            <span class="d-block mb-1" style="color:#9fa7ae; font-size:90%;">{{ $information->category->title }}</span>
            <h4 class="font-weight-bold mb-0" style="font-size: 1.1rem;">{{ $information->title }}</h4>
        </div>
        <hr class="m-0">
        <div class="bottom px-3 py-2 d-flex" style="font-size:90%;">
            <span class="text-muted" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">{{ $information->organization }}</span>
            <span class="ml-auto">
                @if ($information->link != null)
                <a class="review-link stretched-link" href="{{ $information->link }}" target="_blank">
                    <img src="{{ asset('svg/link.svg') }}" style="height:20px;">
                </a>
                @else
                <a class="review-link stretched-link" data-toggle="modal" data-target="#imageDetailModal{{ $information->id }}" style="cursor: pointer;">
                    <img src="{{ asset('svg/detail.svg') }}" style="height:20px;">
                </a>
                @endif
            </span>
        </div>
    </div>
</div>

{{-- 이미지 자세히보기 모달 --}}
<div class="modal fade" id="imageDetailModal{{ $information->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="imageDetailModalTitle{{ $information->id }}">이미지 자세히 보기</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <img class="d-block mx-auto img-fluid" src="{{ $information->thumb != null ? url('storage/'.$information->thumb) : asset('svg/placeholder3x2.svg') }}">
                </div>
            </div>
        </div>
    </div>
</div>
