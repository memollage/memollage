$(document).ready(function() {
     setInterval(function(){loadNotif(); }, 3000);
});

function send(){

}

function get(){
     //var y = document.getElementById("kelasOpen").value;
     $.ajax({
          type: "POST",
          url: BASE_URL+"notif/get/",
          success: function(data){
               $('#notif').html(data);
               //alert(4);
               //   alert(data.dataCall);
           }
      });
}

function loadNotif(){
     get();
}
