@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">카테고리 - Show</div>

                <div class="card-body">

                    <div class="mb-4">
                        <p class="font-weight-bold mb-0">카테고리 이름</p>
                        <span class="d-block">{{ $category->title }}</span>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex">
                            <span class="font-weight-bold">해당 인포메이션 목록</span>
                            <span class="text-muted ml-auto">총 {{ $category->informations->count() }} 개</span>
                        </div>
                        <ul class="list-group">
                            @forelse ($informations as $info)
                            <li class="list-group-item">
                                <a class="stretched-link d-block" href="{{ route('admin.information.show', ['information' => $info]) }}">
                                    {{ $info->title }}
                                </a>
                                <span class="text-muted">{{ data_get($info, 'location', '장소 없음') }} - {{ data_get($info, 'phone', '전화 없음') }}</span>
                            </li>
                            @empty
                            <li class="list-group-item">
                                <span class="text-muted">해당 인포메이션이 없습니다.</span>
                            </li>
                            @endforelse
                            <div class="d-flex justify-content-center">
                                {{ $informations->links() }}
                            </div>
                        </ul>

                    </div>

                    <div class="btn-group mx-auto d-flex" role="group">
                        <a class="btn btn-secondary" href="{{ route('admin.category.index') }}">목록</a>
                        <a class="btn btn-secondary" href="{{ route('admin.category.edit', ['category' => $category->id]) }}">수정</a>
                        <a class="btn btn-secondary" href="#" style="cursor: pointer;" onclick="confirmFormSubmit('#deleteForm', '정말 삭제하시겠습니까?\n속한 인포메이션들 또한 모두 삭제됩니다.')">삭제</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('hidden')
<form id="deleteForm" action="{{ route('admin.category.destroy', ['category' => $category]) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
@endsection
