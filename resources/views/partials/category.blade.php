<li class="expanded dropdown"><a href="" data-target="#" data-toggle="dropdown">{{ $category['title'] }}</a>

	@if ( count($category['children']) > 0 )
	    <ul class="dropdown-menu">
	    @foreach($category['children'] as $category)
	        @include('partials.category', $category)
	    @endforeach
	    </ul>
	@endif
</li>