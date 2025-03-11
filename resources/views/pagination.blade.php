@if ($paginator->hasPages())
<div class="pagination-container">
    <ul class="pagination">
        
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>« اول</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">« قبلی</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @elseif (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">بعدی »</a></li>
        @else
            <li class="disabled"><span>بعدی »</span></li>
        @endif
    </ul>
</div>
@endif