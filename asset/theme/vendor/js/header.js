var con=0;
window.onload=loadF();

$(document).ready(function(){
   $(".menu").click(function(){
          var z = $(this).data("value")+"/open";
          var url = BASE_URL+z;
          $.post( url, { x : 4 }).done(function(data) {
               $('#page-content').html(data);
          });
   });
   $(".nav-link").click(function(){
          var z = $(this).data("value");
          var url = BASE_URL+z+"/open";
          $.post( url, { x : 4 }).done(function(data) {
               $('#'+z).html(data);
          });
   });
});

function loadF() {
     var z = "beranda"+"/open";
     var url = BASE_URL+z;
     $.post( url, { x : 4 }).done(function(data) {
          $('#page-content').html(data);
     });
}

function resizeNav() {
     if(con++%2==0){
          $(".page-container").css('margin-left',70);
          $("#textNav").css('padding-left',78);
          $(".modal-content").css('margin-left',59);
          $(".modal-content").width('97%');

     }else{
          $(".page-container").css('margin-left',250);
          $("#textNav").css('padding-left',260);
          $(".modal-content").css('margin-left',235);
          $(".modal-content").width('83.5%');

     }
}
