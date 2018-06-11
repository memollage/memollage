$(document).ready(function() {
        popup();
        loading();
   $(document).on('click','.proseslogin',function(e){
      e.preventDefault();
      $.ajax({
         url: BASE_URL+'login/proseslogin',
         data: $('.form-signup').serialize()+"&keylog="+keylog,
         type: "POST",
         dataType : "json",
         cache: false,
         beforeSend: function() {
           $('#spinner-modal').modal('show') ;
         },
         success: function(databack) {
            $('#spinner-modal').modal('hide');

            if(databack.err=='s') {
                //alert("masuk");
                 window.location.href = BASE_URL+"beranda";
            } else {
               alert_pesan(databack.err);
            }
         }
      });
    });

});
