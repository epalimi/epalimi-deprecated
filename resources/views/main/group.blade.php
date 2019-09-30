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
    <div class="row mb-3">
        <div class="col-12 col-md-10">
            <input class="form-control" type="text" placeholder="단체명 (띄어쓰기 없이)" oninput="$('#search').attr('href', '/group/' + $(this).val())">
        </div>
        <div class="col-12 col-md-2 align-items-end">
            <a id="search" class="btn btn-outline-success w-100" href="">검색</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="head-titlem d-flex align-items-center">
                <span class="font-weight-bold" style="font-size: 1rem">'{{ $query }}' 단체에 대한 소식 모음</span>
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
            <div class="d-flex justify-content-center">
                {{ $informations->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
