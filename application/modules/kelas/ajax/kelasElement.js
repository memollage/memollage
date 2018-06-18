var skipMove=0;
$(".btn-member").click(function() {
     skipMove=0;
     //var x=($(this).data('value'));
     var z = document.getElementById("kelasOpen").value;
     //alert(z);
     var url = BASE_URL+"kelas/aturMember/"+z;
     $.post( url, { x : 4 }).done(function(data) {
          $('#menage').html(data);

     });
     //$("#menage").append('<div>'+x+'</div>').addClass("card");
});

function hapusAnggota(x) {
     var z = $(x).attr("data-value");
     //salert(z);
     if(z.localeCompare("close")!=0){
          $(x).attr("data-value","close");
          $("#"+x.id+" .fade-img").removeClass('card-img-kelas-del');

     }else {
          //DELETE_KELAS.push(x.id);
          $(x).attr("data-value","delete");
          $("#"+x.id+" .fade-img").addClass('card-img-kelas-del');
     }
}

function deleteMemberKelas(){
     var data=[];
     var ids = $.map(
                    $(".card-img-kelas-del").parent().parent(), function(elt) {
                         return elt.id;
                    });
     for(var a=0;a<ids.length;a++){
           data.push(ids[a].substring(4));
     }
     $.ajax({
          type: "POST",
          url: BASE_URL+'kelas/deleteMemberKelas',
          data: {
               data:data
          },
          dataType : "json",
          success: function(data){
               var z = document.getElementById("kelasOpen").value;
               //alert(z);
               var url = BASE_URL+"kelas/aturMember/"+z;
               $.post( url, { x : 4 }).done(function(data) {
                    $('#menage').html(data);
                    memberKelas($("#kelasOpen").attr("value"));
               });
           },
           error: function(data){
                alert("pilih user");
           }
      });
     //$("#del").attr("onclick",null);
     //cencel()
}
$(".addMemberKelas-span").click(function() {

        modal = document.getElementById('addMemberKelas');
        $('#addMemberKelas').css('visibility', 'hidden');
        modal.style.display = "none";
        skipMove=0;
});
function addMemberKelas(){
     modal = document.getElementById('addMemberKelas');
     $('#addMemberKelas').css('visibility', 'visible');
     modal.style.display = "block";

}
$("#SearchMember").keyup(function(){
     var z=$("#SearchMember").val();
     if(z==""){
          $('#searchFoundContent').html("");
          $('#card-found').css('visibility', 'hidden');
          $('#card-found').css('display', 'none');
     }
     else {
          if(skipMove==0){
               var ids=null;
          }else {

          var ids = $.map(
               $("div#addMemberContent div input"), function(elt) {
                         return $(elt).val();
               });
               //alert(ids);
          }
          $('#card-found').css('visibility', 'visible');
          $('#card-found').css('display', 'block');
          var y = document.getElementById("kelasOpen").value;
          $.ajax({
               type: "POST",
               url: BASE_URL+"kelas/searchMemberKelas/"+y+"/"+z,
               data: {
                    data:ids
               },
               dataType : "json",
               success: function(data){
                    $('#searchFoundContent').html(data.data);
                    //   alert(data.dataCall);
                }
           });
     }

});
$(".save-add").click(function(){
     if(skipMove!=0){
          var z = document.getElementById("kelasOpen").value;
          var ids = $.map(
               $("div#addMemberContent div input"), function(elt) {
                         return $(elt).val();
               });
          $.ajax({
               type: "POST",
               url: BASE_URL+"kelas/addMemberKelas/"+z,
               data: {
                    data:ids
               },
               dataType : "json",
               success: function(data){
                    var z = document.getElementById("kelasOpen").value;
                    //alert(z);
                    var url = BASE_URL+"kelas/aturMember/"+z;
                    $.post( url, { x : 4 }).done(function(data) {
                         modal = document.getElementById('addMemberKelas');
                         $('#addMemberKelas').css('visibility', 'hidden');
                         modal.style.display = "none";
                         skipMove=0;
                         $('#menage').html(data);
                         memberKelas($("#kelasOpen").attr("value"));
                    });
               },
               error:function(data) {
                    alert("ss");
               }
           });
     }
     skipMove=0;
});
$('.masterTooltip').hover(function(){
        // Hover over code
        var title = $(this).attr('title');
        $(this).data('tipText', title).removeAttr('title');
        $('<p class="tooltip"></p>')
        .text(title)
        .appendTo('body')
        .fadeIn('slow');
}, function() {
        // Hover out code
        $(this).attr('title', $(this).data('tipText'));
        $('.tooltip').remove();
}).mousemove(function(e) {
        var mousex = e.pageX + 20; //Get X coordinates
        var mousey = e.pageY + 10; //Get Y coordinates
        $('.tooltip')
        .css({ top: mousey, left: mousex })
});
function move(x) {
     skipMove++;
     $(x).prependTo("#addMemberContent");
}
