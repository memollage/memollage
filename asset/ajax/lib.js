
function selectQuery(atribut)
{
    var url=atribut[0];
    var klass=atribut[1];
    $.ajax({
                               type: "POST", 
                               url : BASE_URL+url,
                               beforeSend : function(jqXHR,setting){
                                     $(klass).html("");
                                   //  open_loading();
                                   // $(klass).append('<img src="'+BASE_URL+'lib/assets/frontend/layout/img/ajax-loader.gif" alt="Loading..." />Loading...');

                               },
                               success: function(callback){
                                   //  close_loading()
                                     $(klass).html(callback);
                               }
        });
}
function selectQueryData(atribut)
{
    var url=atribut[0];
    var klass=atribut[1];
    var param=atribut[2];
   // alert(param)
    $.ajax({
                               type: "POST", 
                               url : BASE_URL+url,
                               data : param,
                               beforeSend : function(jqXHR,setting){
                                    $(klass).html("");
                                    $(klass).append('<img src="'+BASE_URL+'lib/assets/frontend/layout/img/ajax-loader.gif" alt="Loading..." />Loading...');

                               },
                               success: function(callback){
                                     $(klass).html(callback);
                               }
        });
}

function SaveData(atribut)
{
  var form=atribut[0];
  var param_save=atribut[1];
  var controller=atribut[2];
  var url_redirect=atribut[3];
  var status=atribut[4];
    $.ajax({
                type: "POST",
                url : BASE_URL+"index.php/"+controller+"/"+param_save,
                data: $(form).serialize(),
                beforeSend : function(jqXHR,setting){
                       open_loading();

                },
                success: function(callback){
                       close_loading()
                       alert_pesan(callback);
                       if(status==1)
                       {
                            redirect_url([url_redirect]);
                       }
                }                    
          });
}
function Upload(atribut)
{
  var formData=atribut[0];
  var param_save=atribut[1];
  var controller=atribut[2];
    $.ajax({
                type: "POST",
                url : BASE_URL+"index.php/"+controller+"/"+param_save,
                data: formData,
                mimeType:"multipart/form-data",
                contentType: false,
                processData:false,
                beforeSend : function(jqXHR,setting){
                       open_loading();

                },  
                success: function(callback){
                       close_loading()
                       alert_pesan(callback);
                       tutupNotFocus(".bs-example-modal-sm");
                }                    
          });
}

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
function isDesimal(evt) {
        evt = (evt) ? evt : window.event
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode == 46) //decimal
        return true
        else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            //status = "This field accepts numbers only."
            alert("Data harus format desimal, contoh = 3.19");
            return false
        }
        //status = ""
        return true
    }
function checkIt(evt) {
        evt = (evt) ? evt : window.event
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            //status = "This field accepts numbers only."
            alert("Data harus bertipe angka (0..9)");
            return false
        }
        //status = ""
        return true
    }
function huruf(evt) {
        evt = (evt) ? evt : window.event
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)) {
            //status = "This field accepts numbers only."
            alert("Data harus bertipe huruf (a..z)");
            return false
        }
        //status = ""
        return true
    }    

function popup()
{

    var html='<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"'+
             'aria-labelledby="mySmallModalLabel" aria-hidden="true">'+
            '<div class="modal-dialog modal-sm">'+
              '<div class="modal-content">'+
                  '<div class="modal-body alert">'+
                    
               '</div>'+
                    '<div class="modal-footer">'+
                    '<button type="button" class="btn blue-madison tutup" data-dismiss="modal">OK</button>'+
                     '</div>'+
                  '</div>'+
            '</div>'+
          '</div>';
      $("#popup").html(html);
      
}
 var progress = $(".loading-progress").progressTimer({
        timeLimit: 10,
        onFinish: function () {
            alert('completed!');
        }
    });
function loading()
{
    var html='<div class="modal fade" id="spinner-modal">'+
                '<div class="modal-dialog modal-sm">'+
                    '<div class="modal-content">'+
                        '<div class="modal-body text-center">'+
                            '<h3><i class="fa fa-cog fa-spin"></i>Loading...</h3>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';
     $("#loading").html(html);
}
function alert_pesan(param)
{
     $('.bs-example-modal-sm').modal('show');
     var param=param;
     $(".alert").html(param);
}
function open_loading()
{
    $('#spinner-modal').modal('show') 
}
function close_loading()
{
    $('#spinner-modal').modal('hide') 
}
function redirect_url(atribut)
{
    var url=atribut[0];
    $(document).on("click", ".tutup", function(e)
                       {
                            window.location.href = BASE_URL+url;
                       });
}
function tutup(atribut)
{
    var modal=atribut[0];
    var kelas=atribut[1];
    var status=atribut[2];
     $(document).on("click", ".tutup", function(e)
     {
         $(modal).modal('hide');
         if(status=="validasi")
             {
                 $(kelas).focus();
             }
     });
     return true;
}
function tutupNotFocus(modal)
{
    $(document).on("click", ".tutup", function(e)
     {
        $(modal).modal('hide');
     });
     return true;
}
















