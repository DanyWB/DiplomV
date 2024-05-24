@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
            @endif
        </ul>
    </nav>
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            color: rgb(20, 20, 20);
            gap: 30px;
        }

        .disabled {
            color: rgb(51, 51, 51);
        }

        .pagination li {
            background: rgb(189, 189, 189);
            border-radius: 10px;
            padding: 5px 15px;
            transition: 0.3s;
        }

        .pagination li.disabled {
            background: rgb(100, 100, 100);
            border-radius: 10px;
            padding: 5px 15px
        }

        .pagination a:hover {
            color: black
        }

        .pagination li:hover:not(.disabled) {
            background: rgb(223, 223, 223);
            cursor: pointer;
        }
    </style>
@endif
