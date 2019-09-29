@push('styles')
<style>
    .category-link {
        padding: .15rem;
        text-decoration: none;
        color: #969fa7;
    }

    .category-link:hover {
        text-decoration: none;
        color: #747474;
    }

    .category-link.category-actvie {
        font-weight: bold;
        color: #484a51;
    }

    .category-link.category-actvie:hover {
        color: #484a51;
    }

</style>
@endpush

<div>
    <div class="head-title">
        <span class="font-weight-bold" style="font-size: 1.2rem;">카테고리</span>
    </div>
    <hr>
    <ul class="nav mb-5">
        <li class="nav-item mr-3">
            <a class="category-link" href="{{ route('main.category.index') }}">전체</a>
        </li>
        <li class="nav-item mr-3">
            <span style="color:#cdcdcd;">|</span>
        </li>
        @foreach (App\Category::all() as $nav)
        <li class="nav-item mr-3">
            <a class="category-link {{ $category->id == $nav->id ? 'category-actvie' : '' }}" href="{{ route('main.category', ['category' => $nav]) }}">{{ $nav->title }}</a>
        </li>
        @if (!($loop->last))
        <li class="nav-item mr-3">
            <span style="color:#cdcdcd;">|</span>
        </li>
        @endif
        @endforeach
    </ul>
</div>
