$(document).ready(function() {
        popup();
        loading();
        selectQuery(["index.php/beranda/showUpload","#show"])
        $(document).on("click", "#upload", function(e)
          {

                var formData = new FormData("#formUpload");
                formData.append('file', $('#filedok')[0].files[0]);
                formData.append('judul', $('#judul').val());
                var controller="beranda";
                var param_save="simpanUpload";
                if($('#filedok').val()=='' || $('#judul').val()=='')
                    {
                          alert_pesan("Mohon masukkan judul dan file abstrak");
                          tutupNotFocus(".bs-example-modal-sm");
                    }
                else
                    {
                        var upload = Upload([formData,param_save,controller]);
                         $.when(upload).done(function(v1){
                               $("#formUpload")[0].reset();
                               selectQuery(["index.php/beranda/showUpload","#show"]);
                         });
                    }
          });
})