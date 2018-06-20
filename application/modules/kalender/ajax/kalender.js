$(document).ready(function(){

     $("td").click(function(){
          var x=$(this).html();
          var y=x+" "+$("#calendar"+" div"+" span").html();
          
          //alert(y);
     });
});
