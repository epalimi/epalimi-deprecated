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

    .card {
        border-radius: 0;
        border: none;
        padding: 0;
        margin-bottom: 1.25rem !important;
    }

    .card .card-body {
        padding: 0;
    }

</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            @component('components.categorynav', ['category' => $category])
            @endcomponent
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
