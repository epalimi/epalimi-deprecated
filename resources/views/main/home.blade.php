@extends('layouts.common')

@push('styles')
<style>
    .card-columns {
        column-count: 1;
    }

    .carousel-text {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        padding: 3.5rem 2.5rem 1rem 2rem;
        background-color: rgba(0, 0, 0, .6);
        color: white;
        line-height: 1.35;
    }

    @media (min-width: 576px) {
        .card-columns {
            column-count: 2;
        }
    }

    @media (min-width: 768px) {
        .carousel-text {
            width: auto;
        }
    }

    @media (min-width: 992px) {
        .card-columns {
            column-count: 3;
        }
    }

    @media (min-width: 1200px) {
        .card-columns {
            column-count: 4;
        }
    }

</style>
@endpush

@section('content')
<div class="container py-4">
    {{-- 상단 배너 --}}
    <div id="demo" class="carousel slide mb-5" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
        </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-bgimg position-relative" style="height: 500px; background: no-repeat center/cover url('images/main-1.png');">
                    <div class="carousel-text">
                        <div class="mb-3" style="font-size: 45px">
                            느린걸음<br>
                            보통날;
                        </div>
                        <div class="mb-3" style="font-size: 14px; color: #979797;">
                            서울 은평 미래유산을 찾아<br>
                            2개월간 촬영하고 멋진 사진을 전시하게 위해<br>
                            1주일 단위로 모여 리뷰를 진행하신<br>
                            50플러스 가까이 사진 동호회팀과 함께 합니다.
                        </div>
                        <div class="mb-4" style="font-size: 17px">
                            일시 : 2019년 9월 27일(금)~10월 4일(금)<br>
                            장소 : 구산도서관마을<br>
                            참여비 : 없음 - 열린전시
                        </div>
                        <div style="font-size: 15px; color: #faa419;">
                            자세히 보기 +
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-bgimg position-relative" style="height: 500px; background: no-repeat center/cover url('images/main-2.png');">
                    <div class="carousel-text">
                        <div class="mb-3" style="font-size: 45px">
                            가을하늘에<br>
                            드러나다;
                        </div>
                        <div class="mb-3" style="font-size: 14px; color: #979797;">
                            오래 살아왔기에,<br>
                            많은 시간을 보낸 곳이기에<br>
                            가까운 줄만 알았던 은평의 마을.<br>
                            하지만 몰랐던 마을의 이야기는 늘 많습니다.
                        </div>
                        <div class="mb-4" style="font-size: 17px">
                            일시 : 2019년 10월 5일(토) 3시~5시<br>
                            장소 : 혁신파크 한평책빵<br>
                            공예체험비 : 3,000원
                        </div>
                        <div style="font-size: 15px; color: #faa419;">
                            자세히 보기 +
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-bgimg position-relative" style="height: 500px; background: no-repeat center/cover url('images/main-3.png');">
                    <div class="carousel-text">
                        <div class="mb-3" style="font-size: 45px">
                            청년,<br>
                            그 은밀한 대화;
                        </div>
                        <div class="mb-3" style="font-size: 14px; color: #979797;">
                            은평에 살고 있는,<br>
                            또는 활동하고 있는 은밀한 청년들.<br>
                            그들은 어떤 생각을 갖고 살아갈까?<br>
                            또 어떤 생각으로 은평을 바라보고 있을까?
                        </div>
                        <div class="mb-4" style="font-size: 17px">
                            일시 : 2019년 10월 9일(수) / 저녁7시~9시<br>
                            장소 : 대조동 다용도실 카페<br>
                            참여비 : 없음<br>
                            진행 : 사진전시도 보고 함께 이야기나눔
                        </div>
                        <div style="font-size: 15px; color: #faa419;">
                            자세히 보기 +
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-bgimg position-relative" style="height: 500px; background: no-repeat center/cover url('images/main-4.png');">
                    <div class="carousel-text">
                        <div class="mb-3" style="font-size: 45px">
                            은밀하게<br>
                            평범하게<br>
                            통합전시;
                        </div>
                        <div class="mb-3" style="font-size: 14px; color: #979797;">
                            익숙한 일상이 색다름이 되는 처음 시작<br>
                            로컬, 사람들이야기를 만나고 연결되고 다시 확장됩니다
                        </div>
                        <div class="mb-4" style="font-size: 17px">
                            일시 : 10월 23일 은평마을공동체 행사<br>
                            장소 : 은평구청 1층홀<br>
                            참여비 : 없음 - 열린전시
                        </div>
                        <div style="font-size: 15px; color: #faa419;">
                            자세히 보기 +
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    {{-- 동네소식 프리뷰 --}}
    <div class="information-preview" style="margin-bottom: 2.2rem;">
        <div class="row">
            <div class="col-12">
                <div class="head-titlem d-flex align-items-center">
                    <span class="font-weight-bold" style="font-size: 1rem">동네소식</span>
                    <a class="ml-auto" href="{{ route('main.category.index') }}">
                        <span class="text-muted" style="font-size: 0.8rem;">더보기 +</span>
                    </a>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-columns">
                    @forelse ($informations as $information)
                    @component('components.information', ['information' => $information])
                    @endcomponent
                    @empty
                    <span>소식이 없습니다.</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{-- 조직 프리뷰 --}}
    <div class="organization-section mb-5">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="organization position-relative text-white d-flex flex-column justify-content-center align-items-center px-2 py-4 mb-3" style="background-color: #e09418;">
                    <div class="organization-title" style="font-size: 1.3rem;">은평구마을지원센터</div>
                    <div class="organization-description" style="font-size:0.85rem;">행사, 활동을 검색해보세요.</div>
                    <a class="stretched-link" href="#"></a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="organization position-relative text-white d-flex flex-column justify-content-center align-items-center px-2 py-4 mb-3" style="background-color: #ff7e66;">
                    <div class="organization-title" style="font-size: 1.3rem;">50플러스서부캠퍼스</div>
                    <div class="organization-description" style="font-size:0.85rem;">행사, 교육을 검색해보세요.</div>
                    <a class="stretched-link" href="#"></a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="organization position-relative text-white d-flex flex-column justify-content-center align-items-center px-2 py-4 mb-3" style="background-color: #5b99a9;">
                    <div class="organization-title" style="font-size: 1.3rem;">양천리갤러리</div>
                    <div class="organization-description" style="font-size:0.85rem;">행사, 전시을 검색해보세요.</div>
                    <a class="stretched-link" href="#"></a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="organization position-relative text-white d-flex flex-column justify-content-center align-items-center px-2 py-4 mb-3" style="background-color: #1484d6;">
                    <div class="organization-title" style="font-size: 1.3rem;">은평구립방과후센터</div>
                    <div class="organization-description" style="font-size:0.85rem;">행사, 활동을 검색해보세요.</div>
                    <a class="stretched-link" href="#"></a>
                </div>
            </div>
        </div>
    </div>
    {{-- 게시판 프리뷰 --}}
    <div class="article-preview">
        <div class="row">
            <div class="col-12">
                <div class="head-titlem d-flex align-items-center">
                    <span class="font-weight-bold" style="font-size: 1rem">게시판</span>
                    <a class="ml-auto" href="{{ route('main.board.index') }}">
                        <span class="text-muted" style="font-size: 0.8rem;">더보기 +</span>
                    </a>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            @forelse ($articles as $article)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                @component('components.article', ['article' => $article])
                @endcomponent
            </div>
            @empty
            <div class="col-12">
                <span>빈 게시판입니다.</span>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
