@if ($paginator->hasPages())
<nav class="pagination">
    @if ($paginator->onFirstPage())
        <span class="page-item disabled">&lsaquo;</span>
    @else
        <a class="page-item" href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="page-item disabled">{{ $element }}</span>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="page-item active">{{ $page }}</span>
                @else
                    <a class="page-item" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <a class="page-item" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
    @else
        <span class="page-item disabled">&rsaquo;</span>
    @endif
</nav>
@endif
