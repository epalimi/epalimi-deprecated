@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">카테고리 - Create</div>

                <div class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="POST">
                        @csrf
                        <input class="form-control" type="text" name="title" placeholder="제목">
                        <input class="btn btn-dark w-100" type="submit" value="만들기">
                    </form>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    {{$error}}
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
