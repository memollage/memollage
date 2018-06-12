$(document).ready(function(){
     $("#confirmasi").click(function(){
          send();
     });
});

function send(){
    $.ajax({
         type: "POST",
         url: BASE_URL+'email/sendMail',
         success: function(data){
              alert(data);
          },
          error: function(data){
               alert(5);
          }
      });
}
