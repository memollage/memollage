function statusKelas(x) {
     $("#titleNotif").val($(x).attr("data-value"));
     $("#titleNotifH").val($(x).attr("data-value"));
}

function sendKelasNotif() {
     var z = document.getElementById("kelasOpen").value;
     $.ajax({
          type: "POST",
          url: BASE_URL+'notifBoard/insertNotif/'+z,
          data: $('#formNotifKelas').serialize(),
          dataType : "json",
          success: function(data){
                if(data.err=='s') {
                    //alert(JSON.stringify(data.klas));
                    //setPosTabKelas(x);
                    alert(4);
                } else {
                     alert(5); 
                }
           },
           error: function(data){
                alert("sss");
           }
       });
}
