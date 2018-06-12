$(document).ready(function(){
     $("#confirmasi").click(function(){
          send();
     });
});

function send(){
    $.ajax({
         type: "POST",
         url: BASE_URL+'confirmation/sendMail',
         success: function(data){
              alert(data);
          },
          error: function(data){
               alert(5);
          }
      });
}
