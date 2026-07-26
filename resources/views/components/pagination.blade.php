@php
    $current = $paginator->currentPage();
    $last = $paginator->lastPage();

    $pages = collect();
    $pages = $pages->merge(range(1, min(3, $last)));
    $pages = $pages->merge(range(max(1, $current - 1), min($last, $current + 1)));

    if ($last > 3) {
        $pages->push($last);
    }

    $pages = $pages->unique()->sort()->values();
@endphp

@if ($paginator->hasPages())
<div class="flex items-center gap-2 flex-wrap justify-center">

    @php $previous = null; @endphp

    @foreach ($pages as $page)

        @if ($previous !== null && $page - $previous > 1)
            <span class="text-sm text-gray-400 px-1">...</span>
        @endif

        @if ($page == $current)
            <span class="w-8 h-8 flex items-center justify-center rounded-md bg-[#355E3B] text-white text-sm font-medium">
                {{ $page }}
            </span>
        @else
            <a href="{{ $paginator->url($page) }}" class="w-8 h-8 flex items-center justify-center rounded-md text-sm text-gray-700 hover:bg-gray-100 transition">
                {{ $page }}
            </a>
        @endif

        @php $previous = $page; @endphp

    @endforeach

</div>
@endif