<div class="actions row">

  <div class="block-title">
    <h2>Акции/скидки</h2>
  </div>
  <div class="block-content">

  @foreach ( $promos as $promo )
    <div class="promo-block col-md-6 col-xs-12 row">
      <div class="col-md-6 col-xs-12">
        <img src="/images/promo/cart/{{$promo->image}}" width="220px">
      </div>
      <div class="col-md-6 col-xs-12">
        <h3>{{$promo->title}}</h3>
        <h4>{{$promo->price}} ГРН.</h4>
        <div class="col-xs-12 col-md-12">
          <a href="/promo/{{$promo->id}}">Подробнее</a>
        </div>
      </div>

    </div>

  @endForeach



  </div>
 
</div>