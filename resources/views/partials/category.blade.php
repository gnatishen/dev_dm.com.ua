<?php $class = 'dropdown-submenu level-'.$category['level']; ?>
@if ( $category['level'] > 1 )
	<?php $class = 'dropdown-submenu level-'.$category['level']; ?>

@endif

<li class="{{ $class }}">
	@if ( count($category['children']) > 0 )
		<?php 
			//$class_a = 'data-toggle="dropdown"'; 
			$class_a = '';
		?>
	@else
		<?php $class_a = ''; ?>
	@endif

	<a href="/catalog/{{ $category['id'] }}" class="dropdown-toggle" {!! $class_a !!} >{{ $category['title'] }}
		
		@if ( count($category['children']) > 0 )
			<span class="caret"></span>
		@endif
	</a>

	@if ( count($category['children']) > 0 )
	    <ul class="dropdown-menu" role="menu">
	    @foreach($category['children'] as $category)
	        @include('partials.category', $category)
	    @endforeach
	    </ul>
	@endif

</li>