<div class="actions row">

  <div class="block-title">
    <h2>Акции/скидки</h2>
  </div>
  <div class="block-content">
    @for ($i = 1; $i < 25; $i++)

      <div class="col-sm-2">
        <a data-toggle="lightbox" href="#demoLightbox-{{ $i }}">
          <img src="/images/actions/{{ $i }}.jpg" class="small-img">
        </a>
        <div id="demoLightbox-{{ $i }}" class="lightbox fade"  tabindex="-1" role="dialog" aria-hidden="true">
          <div class='lightbox-dialog'>
              <div class='lightbox-content'>
                  <img src="/images/actions/{{ $i }}.jpg">
              </div>
          </div>
        </div>    
      </div>
      
    @endfor
  </div>
 
</div>