{{ Form::open( array( 'route' => ['product.index'], 'role' => 'form' ) ) }}
    @include('_fields-product')
{{ Form::close() }}