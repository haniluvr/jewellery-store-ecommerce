@if ($paginator->hasPages())
    <div class="flex justify-center items-center space-x-8">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="w-8 h-px bg-gray-100"></span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="w-8 h-px bg-gray-900 hover:bg-[#B6965D] transition-colors"></a>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex items-center space-x-6">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="text-[10px] text-gray-300">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="text-[10px] font-bold text-gray-900 tracking-widest">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</span>
                        @else
                            <a href="{{ $url }}" class="text-[10px] text-gray-300 hover:text-gray-900 transition-colors tracking-widest">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="w-8 h-px bg-gray-900 hover:bg-[#B6965D] transition-colors"></a>
        @else
            <span class="w-8 h-px bg-gray-100"></span>
        @endif
    </div>
@endif
