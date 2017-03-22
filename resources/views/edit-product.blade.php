	<?php $images = explode(' ', $product->images); ?>

		@foreach ($images as $image)
			<img src="/images/products/carousel-small/{{ $image }}">
			<form action="{{ route('deleteImage', ['image' => $image, 'product_id' => $product->id]) }}" method="post">
                {{ method_field('DELETE')}}
                <button type="submit" class="btn btn-danger"> X </button>
                 {{ csrf_field() }}
            </form>
		@endforeach
{{ Form::model( $product, ['route' => ['productUpdate', $product->id], 'method' => 'put', 'role' => 'form'] ) }}

    @include('_fields-product')
{{ Form::close() }}