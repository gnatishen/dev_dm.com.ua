$(document).ready(function(){



$('.send-btn').click(function(){            
    $.ajax({
      url: '/order/add',
      type: "post",
      data: {'phone':$('input[name=phone]').val(), '_token': $('input[name=_token]').val()},
      success: function(data){

        $(".modal-body").text(data);
      }
    });      
  });


$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

});