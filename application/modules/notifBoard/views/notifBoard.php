<link href="<?php echo base_url();?>asset/theme/vendor/css/notifBoard.css" rel="stylesheet">
<script type="text/javascript">
<?php
     include APPPATH ."modules/notifBoard/ajax/notifBoard.js";
     //include APPPATH ."modules/kelas/ajax/kelasElement.js";
?>
</script>


<div class="card-content">
      <div class="inbox-notif">

          <div class="" role="toolbar">
              <div class="row" style="margin-left: auto;">
                   <div class="dropdown show" style="margin-top: auto;margin-bottom: auto;">

                         <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">Status Kelas
                              <i class="mdi mdi-label font-18 vertical-middle"></i>
                              <b class="caret m-l-5"></b>
                         </button>

                         <ul class="dropdown-menu dropdown-menu-right " x-placement="bottom-end" style="position: absolute; transform: translate3d(31px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                              <li><a href="#" data-value="kelas masuk" onclick="statusKelas(this)">Kelas Masuk</a></li>
                              <li><a href="#" data-value="kelas libur" onclick="statusKelas(this)">Kelas Libur</a></li>

                         </ul>
                   </div>
              </div>
          </div>

          <div class="mt-4">

              <form id=formNotifKelas action="#">
                  <div class="form-group">
                      <input  name="title" id=titleNotif class="form-control" value="Title Notif" type="text" minlength="5" maxlength="30">
                      <input  name="status" id=titleNotifH class="form-control" type="hidden">
                      <textarea name="komen" class="form-control" style="height:200px">Text Notif</textarea>
                  </div>

                 <div class="text-right">
                      <button type="button" class="btn btn-purple waves-effect waves-light" onclick="sendKelasNotif()"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
                 </div>
              </form>
          </div>
          <!-- end card-->

      </div>
</div>
