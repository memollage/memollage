//$(document).ready(function() {

//});
var countScroll=0;
var INIT_CHAT_KELAS;
function sendChatKelas(){
     var y = document.getElementById("kelasOpen").value;
     var scroll=document.getElementById('chatKelas-scroll');

     $.ajax({
          type: "POST",
          data: $('#formChatKelas').serialize(),
          url: BASE_URL+"kelas/sendChat/"+y,
          dataType : "json",
          success: function(data){
               alert(4);
           }
      });
}

function getChat(y){

     $.ajax({
          type: "POST",
          url: BASE_URL+"kelas/getChat/"+y,
          success: function(data){
               $('#chatKelas').html(data);
               if(countScroll==0){

                    var scroll=document.getElementById('chatKelas-scroll');
                    scroll.scrollTop=scroll.scrollHeight;countScroll++;
               }
           }
      });
}

function loadPesan(){
     if(FLAG_INIT_CHAT==0){
          var y = document.getElementById("kelasOpen").value;
          getChat(y);
     }
}
function initPesan(x) {
     if(FLAG_INIT_CHAT==0){
          if(x!=null){
               INIT_CHAT_KELAS=setInterval(function(){loadPesan();}, 3000);
          }
     }
}
