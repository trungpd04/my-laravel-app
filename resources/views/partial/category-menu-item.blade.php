{{--
    Recursive category menu item — pure CSS checkbox hack.
    Variables:
        $category  – App\Models\Category (with allChildren eager-loaded)
        $depth     – int, current nesting level
--}}
@php $hasChildren = $category->allChildren->isNotEmpty(); @endphp

<li class="{{ $hasChildren ? 'has-submenu' : '' }}">
    @if($hasChildren)
        {{-- Hidden checkbox: its :checked state drives the sub-list open/close --}}
        <input type="checkbox" id="cat-sub-{{ $category->id }}" class="cat-cb cat-sub-cb">
        <label for="cat-sub-{{ $category->id }}" class="cat-item-label">
            <span>{{ $category->name }}</span>
            <i class="fas fa-chevron-down cat-arrow"></i>
        </label>

        <ul class="cat-dropdown">
            @foreach($category->allChildren as $child)
                @include('partial.category-menu-item', ['category' => $child, 'depth' => ($depth ?? 0) + 1])
            @endforeach
        </ul>
    @else
        <a href="#">{{ $category->name }}</a>
    @endif
</li>
