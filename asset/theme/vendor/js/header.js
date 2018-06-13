var con=0;
function resizeNav() {
     if(con++%2==0){
          $(".page-container").css('margin-left',70);
          $("#textNav").css('padding-left',78);
     }else{
          $(".page-container").css('margin-left',250);
          $("#textNav").css('padding-left',260);
     }
}
