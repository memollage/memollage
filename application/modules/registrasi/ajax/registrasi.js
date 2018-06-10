/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
     popup();
     loading();
     showform()
     $(document).on('click','.simpan',function(ee){
          simpan();
      })
})
function simpan()
{
    $.ajax({
         url: BASE_URL+'registrasi/proses_simpan',
         data: $('#form1').serialize(),
         type: "POST",
         dataType : "json",
          beforeSend: function() {
                open_loading();
         },
         success: function(databack) {
             close_loading();

            if(databack.err=='s') {
                alert_pesan("Terima kasih data telah tersimpan");
                showform()
            } else {
               alert_pesan(databack.err);
               $(databack.klas).focus();
            }
         }
      });
}
function showform()
{
    $.ajax({
           type: "POST",
           url : BASE_URL+"registrasi/form",
           beforeSend : function(jqXHR,setting){
                 $(".form").html("");
            },
           success: function(callback){
                 $(".form").html(callback);
           }
        });
}
