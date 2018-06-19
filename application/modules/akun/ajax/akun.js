$(document).ready(function(){

     $("#divOverlay").on('click',function() {
          $('#newFotoUser').trigger('click');

     });

     $("#updateProfile").on('click',function() {
          $.ajax({
               type: "POST",
               url: BASE_URL+'akun/updateProfile',
               data: $('#profileUser').serialize(),
               success: function(data){

                },
                error: function(data){
                     alert("save-err");
                }
            });
     });



});
function upload(x) {
     $('#submit').submit();;
}
$('#submit').submit(function(e){
     //alert(4);
     e.preventDefault();
     $.ajax({
          url: BASE_URL+'akun/do_upload',
          type:"post",
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(data){
               if(data!="s"){
                    alert(data);
               }
          }
     });
});
