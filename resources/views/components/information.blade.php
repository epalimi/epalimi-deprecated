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
                <a class="review-link stretched-link" href="#">
                    <img src="{{ asset('svg/review.svg') }}" style="height:20px;">
                </a>
            </span>
        </div>
    </div>
</div>
