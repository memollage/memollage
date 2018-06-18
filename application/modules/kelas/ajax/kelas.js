var DELETE_KELAS=[];
$(document).ready(function() {
     var modal;
     var ml;
     loadKelas("Monday");

     $(".addkelas").click(function(){
          $('#addKelas').css('visibility', 'visible');
          $('#addKelas').css('display', 'block');

     });
     var add=function(){
          $('#addKelas').css('visibility', 'visible');
          $('#addKelas').css('display', 'block');

     }
     $(".delKelas").click(function(){
          var x=$(".TabAddKelas.tab-pane.active.show").attr('id');
          if($(this).attr("value").localeCompare("del")==0){
               $(this).val("!del");
               $("#del").attr("onclick","deleteKelas()");

               $('.hidden-trash').css('visibility', 'visible');
               $('#'+x+' .kelasc').addClass('card-kelas');
               $(".kelas").attr("onclick","del(this)");
               //change add
               $('.addkelas').off( 'click' );
               $('#add-btn').addClass('ti-close');
               $('#add-btn').removeClass('ti-plus');
               $('#add').addClass('btn-primary');
               $('#add').removeClass('btn-success');
               $("#add").attr("onclick","cencel()");
               document.getElementById("add").childNodes[1].textContent="Cencel";
          }else {
               $(this).val("del");
               $('.hidden-trash').css('visibility', 'hidden');
               $('#'+x+' .kelasc').removeClass('card-kelas');
               $(".kelas").attr("onclick","kelas(this)");
               $('.kelasc').removeClass('del-kelas');
               //change add
               $('.addkelas').on( 'click',add);
               $('#add-btn').addClass('ti-plus');
               $('#add-btn').removeClass('ti-close');
               $('#add').addClass('btn-success');
               $('#add').removeClass('btn-primary');
               $("#add").attr("onclick",null);
               document.getElementById("add").childNodes[1].textContent="Add";
          }
     });
     $(".skip-del").click(function(){
          DELETE_KELAS=new Array();
          var x=$(".TabAddKelas.tab-pane.active.show").attr('id');
          $(".delKelas").val("del");
          $('.hidden-trash').css('visibility', 'hidden');
          $('#'+x+' .kelasc').removeClass('card-kelas');
          $(".kelas").attr("onclick","kelas(this)");
          $('.kelasc').removeClass('del-kelas');

          //change add
          $('.addkelas').on( 'click',add);
          $('#add-btn').addClass('ti-plus');
          $('#add-btn').removeClass('ti-close');
          $('#add').addClass('btn-success');
          $('#add').removeClass('btn-primary');
          $("#add").attr("onclick",null);
          document.getElementById("add").childNodes[1].textContent="Add";
     });
     $(".close-kelas-add").click(function(){
          //ml = document.getElementById('addKelas');
          $('#addKelas').css('visibility', 'hidden');
          $('#addKelas').css('display', 'none');
     });
     $(".close-kelas-add-cencel").click(function(){
          $('#addKelas').css('visibility', 'hidden');
          $('#addKelas').css('display', 'none');

     });

     function closeKelasAdd(){
          $('#addKelas').css('visibility', 'hidden');
          $('#addKelas').css('display', 'none');
     }

     // Get the <span> element that closes the modal
     var span = document.getElementsByClassName("close")[0];
     // When the user clicks on <span> (x), close the modal
     span.onclick = function() {
         modal.style.display = "none";
     }

     // When the user clicks anywhere outside of the modal, close it
     window.onclick = function(event) {
         if (event.target == modal) {
             modal.style.display = "none";
         }
     }

     $(".save").click(function(){
              $.ajax({
                   type: "POST",
                   url: BASE_URL+'kelas/add',
                   data: $('#addKelasForm').serialize(),
                   dataType : "json",
                   success: function(data){
                         if(data.err=='s') {
                             //alert(JSON.stringify(data));
                             var x=getPosTabKelas();
                             closeKelasAdd();
                             loadKelas(x);
                             //setPosTabKelas(x);
                         } else {
                            alert(4);
                         }
                    },
                    error: function(data){
                         alert("sss");
                    }
                });

     });
     $(".hari").click(function(){
          $("#pilihHari").val($(this).val());
     });

});
function del(x){
     //alert($("#"+x.id+".data").attr("value"));
     if($("#"+x.id+" .data").val().localeCompare("del")==0){
          $("#"+x.id+" .data").val("!del");
          $("#"+x.id+' .kelasc').removeClass('del-kelas');
     }else {
          DELETE_KELAS.push(x.id);
          $("#"+x.id+" .data").val("del");
          $("#"+x.id+' .kelasc').addClass('del-kelas');
     }

}
function kelas(x){
     memberKelas(x.id);
     modal = document.getElementById('modalKelas');
     modal.style.display = "block";
}
function loadKelas(x){
     DELETE_KELAS=[];
     var z = document.getElementById("pageContent");
     var url = BASE_URL+"kelas/loadKelas/"+x;
     $.post( url, { x : 4 }).done(function(data) {
          $('#kelasContent').html(data);

          //alert(data);
     });
}

function getPosTabKelas() {
     //var x=$("nav-link.active.show");
     var x=$(".TabAddKelas.tab-pane.active.show");
     return (x.attr('id'));
}
function cencel(){
     //change add
     DELETE_KELAS=new Array();
     var x=$(".TabAddKelas.tab-pane.active.show").attr('id');
     $(".delKelas").val("del");
     $('.hidden-trash').css('visibility', 'hidden');
     $('#'+x+' .kelasc').removeClass('card-kelas');
     $(".kelas").attr("onclick","kelas(this)");
     $('.kelasc').removeClass('del-kelas');
     $("#del").attr("onclick",null);
     //change add
     $('.addkelas').on( 'click',add);
     $('#add-btn').addClass('ti-plus');
     $('#add-btn').removeClass('ti-close');
     $('#add').addClass('btn-success');
     $('#add').removeClass('btn-primary');
     $("#add").attr("onclick",null);
     document.getElementById("add").childNodes[1].textContent="Add";
}

function deleteKelas(x){
     var SEND_ARR=[];
     var i,j;
     for (i = 0; i < DELETE_KELAS.length; i++) {
          if(i==0){
               SEND_ARR.push(DELETE_KELAS[0]);
               continue;
          }
          for (j = 0; j < SEND_ARR.length; j++) {

               if(SEND_ARR[j].localeCompare(DELETE_KELAS[i])!=0){
                    continue;
               }else {
                    break;
               }
          }
          if(j==SEND_ARR.length){
               SEND_ARR.push(DELETE_KELAS[i]);
          }
     }
     $.ajax({
          type: "POST",
          url: BASE_URL+'kelas/del',
          data: {
               data:SEND_ARR
          },
          dataType : "json",
          success: function(data){
                if(data.err=='s') {
                    var x=getPosTabKelas();
                    //closeKelasAdd();
                    loadKelas(x);
                    //setPosTabKelas(x);
                } else {
                   alert(data.err);
                }
           },
           error: function(data){
                alert("sss");
           }
      });
     $("#del").attr("onclick",null);
     cencel();
}

function memberKelas(x){
     //alert(x.id);
     var url = BASE_URL+"kelas/member/"+x;
     $.post( url, { y : 4 }).done(function(data) {
          $('#member').html(data);
          $("#kelasOpen").attr("value",x);
          //hapusPanel(x);
     });
}
