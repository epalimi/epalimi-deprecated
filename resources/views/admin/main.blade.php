@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-light">은평공리 관리자 콘솔</div>

                <div class="card-body">
                    <p>안녕하세요, <span class="font-weight-bold text-primary">{{ auth()->user()->name }}</span>님!</p>
                    은평공리 관리자 콘솔 메인페이지입니다.<br>
                    사용가능한 관리자 콘솔 기능들은 상단 메뉴에서 확인할 수 있습니다.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
