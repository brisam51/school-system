   {{-- Array Of Links --}}
   @if (is_array($element))
   @foreach ($element as $page => $url)
       @if ($page == $paginator->currentPage())
           <li class="active" aria-current="page"><span>{{ $page }}</span></li>
       @else
           {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
           <form action="{{ $url }}" method="POST">
               @csrf
               <button type="submit">{{ $page }}</button>
           </form>
       @endif
   @endforeach
@endif
{{-- @endforeach --}}

{{-- Next Page Link --}}
@if ($paginator->hasMorePages())
<li>
   {{-- <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a> --}}
   <form action="{{ $paginator->nextPageUrl() }}" method="POST">
       @csrf
       <button type="submit" aria-label="@lang('pagination.next')">&rsaquo;</button>
   </form>
</li>
@else
<li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
   <span aria-hidden="true">&rsaquo;</span>
</li>
@endif
</ul>
</nav>
{{-- @endif --}}
