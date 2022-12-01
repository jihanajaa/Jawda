@if ($paginator->hasPages())
    {{-- <nav class="pagination is-centered"> --}}
        <ul class="pagination-list">
            @if ($paginator->onFirstPage())
                <li><a class="pagination-prev" disabled>Previous</a></li>
            @else
                {{-- <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-prev">Previous</a> --}}
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-prev"><i class="icon-left-4"></i> <span>PREV page</span></a></li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis"><span>{{ $element }}</span></span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                {{-- <li><a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li> --}}
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-next"><span>next page</span> <i class="icon-right-4"></i></a></li>
            @else
                <li><a class="pagination-next" disabled>Next page</a></li>
            @endif
        </ul>
    {{-- </nav> --}}
@endif