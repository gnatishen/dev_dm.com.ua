<?php $class = 'edit-level-'.$category['level']; ?>
@if ( $category['level'] > 1 )
	<?php $class = 'submenu edit-level-'.$category['level']; ?>

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

	<a href="/admin/categories/edit/{{ $category['id'] }}" target="_blank" class="toggle" {!! $class_a !!} >{{ $category['title'] }}
		
		@if ( count($category['children']) > 0 )
			<span class="caret"></span>
		@endif
	</a>

	@if ( count($category['children']) > 0 )
	    <ul class="edit-menu" role="menu">
	    @foreach($category['children'] as $category)
	        @include('partials.category-edit', $category)
	    @endforeach
	    </ul>
	@endif

</li>