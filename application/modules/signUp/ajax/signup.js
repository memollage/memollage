$(document).ready(function() {

     $(".signup").click(function(e){
          e.preventDefault();
          signup();
          e.preventDefault();
     });
});
function signup(){

     //alert(base_url+'memollage'+'/index.php/signUp/proses_simpan');
    $.ajax({
         type: "POST",
         //url: 'http://localhost/memollage/index.php/signUp/proses_simpan',
         url: BASE_URL+'signUp/proses_simpan',
         data: $('#formSU').serialize(),
         dataType : "json",
         success: function(data){

               if(data.err=='s') {
                   alert("Terima kasih data telah tersimpan");
                   window.open(BASE_URL+"confirmation","_self");
               } else {
                  alert(data.err);
                  $(data.klas).focus();
               }
          },
          error: function(data){
               alert(5);
          }
      });
     // alert(base_url);
}
