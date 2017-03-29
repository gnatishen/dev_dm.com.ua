<div class="row admin-panel">
	<div class="col-sm-11">
		<ul class="nav nav-pills">
	  		<li><a href="/admin/products">Товары</a></li>
	  		<li><a href="/admin/orders">Заказы</a></li>
	  		<li><a href="/admin/pages">Страницы</a></li>
	  		<li><a href="/admin/slides">Слайды</a></li>
		</ul>
	</div>
	<div class="col-sm-1">
		<ul class="nav nav-pills">
			<li>
				<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">	Выйти </a>
				<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
				    {{ csrf_field() }}
				</form>
			</li>
		</ul>

	</div>
</div>

