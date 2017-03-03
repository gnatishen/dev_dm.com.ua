<form method="POST" action="{{url('cart')}}">
<input type="hidden" name="product_id" value="{{$product->id}}">
<input type="hidden" name="token" value="{{ csrftoken() }}">
<button type="submit" class="btn btn-fefault add-to-cart">
</button>
</form>