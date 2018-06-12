$(document).ready(function() {

     $(".signin").click(function(e){
          e.preventDefault();
          signin();
          e.preventDefault();
     });
});
function signin(){

     //alert(base_url+'memollage'+'/index.php/signUp/proses_simpan');
    $.ajax({
         type: "POST",
         //url: 'http://localhost/memollage/index.php/signUp/proses_simpan',
         url: BASE_URL+'signIn/login',
         data: $('#login').serialize(),
         dataType : "json",
         success: function(data){
               if(data.err=='s') {
                   window.open(BASE_URL+'beranda',"_self");
               } else {
                  alert(data.err);
                  $(data.klas).focus();
               }
          },
          error: function(data){
               alert("sss");
          }
      });
     // alert(base_url);
}
