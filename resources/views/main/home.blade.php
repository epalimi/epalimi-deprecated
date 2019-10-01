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
        width: auto;
        height: 100%;
        padding: 3.5rem 2.5rem 1rem 2rem;
        background-color: rgba(0, 0, 0, .65);
        color: white;
        line-height: 1.35;
    }

    .carousel-text a {
        text-decoration: none;
        color: inherit;
    }

    .carousel-text a:hover {
        text-decoration: none;
    }

    .organization-title {
        font-size: 1.3rem;
    }

    /* max-width media */
    @media (max-width: 768px) {
        .carousel-text {
            width: 100%;
        }

        .carousel-bgimg {
            height: 460px !important;
        }

        .carousel-title {
            font-size: 30px !important;
        }

        .carousel-description {
            font-size: 13px !important;
        }

        .carousel-bottom {
            font-size: 14px !important;
        }
    }

    /* min-width media */
    @media (min-width: 576px) {
        .card-columns {
            column-count: 2;
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
    {{-- 상단 배너 (carousel) --}}
    @include('includes.carousel')
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
    {{-- 게시판 프리뷰 --}}
    <div class="article-preview">
        <div class="row">
            <div class="col-12">
                <div class="head-titlem d-flex align-items-center">
                    <span class="font-weight-bold" style="font-size: 1rem">이슈키워드</span>
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
        {{-- 조직 프리뷰 --}}
        <div class="organization-section mb-5">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <div class="organization text-center h-100 position-relative text-white d-flex flex-column justify-content-center align-items-center px-2 py-4" style="background-color: #e09418;">
                        <div class="organization-title mb-1" style="font-size: 1.3rem; line-height: 1.3;">
                            은평구<br>
                            마을지원센터
                        </div>
                        <div class="organization-description" style="font-size:0.85rem;">행사, 활동을 검색해보세요.</div>
                        <a class="stretched-link" href="{{ route('main.group', ['query' => '은평구마을지원센터']) }}"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <div class="organization text-center h-100 position-relative text-white d-flex flex-column justify-content-center align-items-center px-2 py-4" style="background-color: #ff7e66;">
                        <div class="organization-title mb-1" style="font-size: 1.3rem; line-height: 1.3;">
                            50플러스<br>
                            서부캠퍼스
                        </div>
                        <div class="organization-description" style="font-size:0.85rem;">행사, 교육을 검색해보세요.</div>
                        <a class="stretched-link" href="{{ route('main.group', ['query' => '50플러스서부캠퍼스']) }}"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <div class="organization text-center h-100 position-relative text-white d-flex flex-column justify-content-center align-items-center px-2 py-4" style="background-color: #5b99a9;">
                        <div class="organization-title mb-1" style="font-size: 1.3rem; line-height: 1.3;">
                            양천리<br>
                            갤러리
                        </div>
                        <div class="organization-description" style="font-size:0.85rem;">행사, 전시를 검색해보세요.</div>
                        <a class="stretched-link" href="{{ route('main.group', ['query' => '양천리갤러리']) }}"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <div class="organization text-center h-100 position-relative text-white d-flex flex-column justify-content-center align-items-center px-2 py-4" style="background-color: #1484d6;">
                        <div class="organization-title mb-1" style="font-size: 1.3rem; line-height: 1.3;">
                            구립은평마을<br>
                            방과후지원센터
                        </div>
                        <div class="organization-description" style="font-size:0.85rem;">행사, 활동을 검색해보세요.</div>
                        <a class="stretched-link" href="{{ route('main.group', ['query' => '구립은평마을방과후지원센터']) }}"></a>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
