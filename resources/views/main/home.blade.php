@extends('layouts.common')

@push('styles')
<style>
    .card-columns {
        column-count: 1;
    }

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
    <div class="information-preview">
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
    <div class="organization-section mb-5">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="organization position-relative text-white d-flex flex-column justify-content-center align-items-center px-2 py-4 mb-3" style="background-color: #e09418;">
                    <div class="organization-title" style="font-size: 1rem;">은평구마을지원센터</div>
                    <div class="organization-description" style="font-size:0.6rem;">행사, 활동을 검색해보세요.</div>
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
