<div class="icon_footer bg_k1 clearfix center">
    @if ($paginator->hasPages())
        @if ($paginator->onFirstPage())
            <span aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <i class="fas fa-arrow-left"></i>
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="page-link">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-link"><i>{{ $page }}</i></span>
                    @else
                        <a class="page-link" href="{{ $url }}"><i>{{ $page }}</i></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <i class="fas fa-arrow-right"></i>
            </a>
        @else
            <span class="page-link" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
        @endif
    @endif
</div>
