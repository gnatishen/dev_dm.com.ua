$(document).ready(function(){


$('.btn-delete-img').click(function(){

    var id = $(this).parent().attr("id");
    var image = $('#' + id + ' input[name=image]').val();

    $.ajax({
      url: '/admin/product/delete/image',
      method: "get",
      data: { 'product_id': id, 'image': image },
      success: function(data){
        alert(data);
        window.location.reload(true);
      },
      error: function(data){

        var errors = '';
                for(datos in data.responseJSON){
                    errors += data.responseJSON[datos] + '<br>';
                }
                $('.message').show().html(errors); //this is my div with messages

      }

    });      
  });


$('.send-btn').click(function(){            
    $.ajax({
      url: '/order/add',
      method: "post",
      data: {'phone':$('input[name=phone]').val(), 
             '_token': $('input[name=_token]').val(),
             'product_id':$('input[name=product_id]').val(),
             'body':$('textarea[name=body]').val()
           },
      success: function(data){
      	$('.form-errors').hide();
        $(".modal-body").html(data);

      },
      error: function(data){

        var errors = '';
                for(datos in data.responseJSON){
                    errors += data.responseJSON[datos] + '<br>';
                }
                $('.form-errors').show().html(errors); //this is my div with messages

      }

    });      
  });




$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});


$('.spinner .btn:first-of-type').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
  });
$('.spinner .btn:last-of-type').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
  });

});