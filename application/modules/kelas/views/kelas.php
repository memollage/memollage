     <link href="<?php echo base_url();?>asset/theme/vendor/css/kelas.css" rel="stylesheet">
     <script type="text/javascript">
     <?php
          include APPPATH ."modules/kelas/ajax/chatKelas.js";
          include APPPATH ."modules/kelas/ajax/kelas.js";
          include APPPATH ."modules/kelas/ajax/kelasElement.js";
     ?>
     </script>

     <div class="center">
          <div class="card col-lg-12">
               <div class="card-body p-b-0">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs customtab" role="tablist">
                         <li class="nav-item"> <a data-value="Monday" class="nav-link active show skip-del" data-toggle="tab" href="#Monday"  role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Monday</span></a> </li>
                         <li class="nav-item"> <a data-value="Tuesday" class="nav-link  skip-del" data-toggle="tab" href="#Tuesday"  role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-notif"></i></span> <span class="hidden-xs-down">Tuesday</span></a> </li>
                         <li class="nav-item"> <a data-value="Wednesday" class="nav-link skip-del" data-toggle="tab" href="#Wednesday"  role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Wednesday</span></a> </li>
                         <li class="nav-item"> <a data-value="Thursday" class="nav-link skip-del" data-toggle="tab" href="#Thursday"  role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-tes"></i></span> <span class="hidden-xs-down">Thursday</span></a> </li>
                         <li class="nav-item"> <a data-value="Friday" class="nav-link skip-del" data-toggle="tab" href="#Friday"  role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-tes"></i></span> <span class="hidden-xs-down">Friday</span></a> </li>
                         <li class="nav-item"> <a data-value="Saturday" class="nav-link skip-del" data-toggle="tab" href="#Saturday"  role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-tes"></i></span> <span class="hidden-xs-down">Saturday</span></a> </li>
                         <li class="nav-item"> <a data-value="Sunday" class="nav-link skip-del" data-toggle="tab" href="#Sunday"  role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-tes"></i></span> <span class="hidden-xs-down">Sunday</span></a> </li>

                         <div class="" style="margin-left:auto;margin-top:auto">
                              <?php
                                   if(strcmp($akun,"dosen")==0){
                                        echo '<button type="button" id=add class="btn btn-success btn-flat btn-addon m-b-10 m-l-5 addkelas"><i id=add-btn class="ti-plus"></i>Add</button>
                                        <button type="button" id=del class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5 delKelas"  value="del"><i class="ti-minus"></i>Del</button>';
                                   }
                               ?>
                               <!-- The Modal -->
                              <div id="addKelas" class="modal-kelas" style="visibility:hidden">

                                <!-- Modal content -->
                                <div class="modal-content-kelas">
                                  <span class="close">&times;</span>
                                            <div class="col-lg-6" style="position: absolute;top: 120px;left: 33%;">
                                                 <div class="card card-outline-primary">
                                                     <div class="card-header">
                                                         <h4 class="m-b-0 text-white">Add New Class</h4>
                                                     </div>
                                                     <div class="card-body">
                                                         <form id=addKelasForm action="#">
                                                             <div class="form-body">

                                                                 <hr>
                                                                 <div class="row p-t-20">
                                                                     <div class="col-md-6">
                                                                         <div class="form-group">
                                                                             <label class="control-label">Matakuliah</label>
                                                                             <input name="nama_matakuliah" class="form-control" placeholder="Nama Matakuliah" type="text">
                                                                             <small class="form-control-feedback"> This is inline help </small> </div>
                                                                     </div>
                                                                     <!--/span-->
                                                                     <div class="col-md-6">
                                                                         <div class="form-group has-danger">
                                                                             <label class="control-label">Ruang Kelas</label>
                                                                             <input name="nama_kelas" class="form-control form-control-danger" placeholder="Ruang" type="text">
                                                                             <small class="form-control-feedback"> This field has error. </small> </div>
                                                                     </div>
                                                                     <!--/span-->
                                                                     <div class="col-md-6">
                                                                         <div class="form-group has-danger">
                                                                             <label class="control-label">Jam Mulai</label>
                                                                             <input name="jam_mulai" class="form-control form-control-danger" value="00:00" type="time">
                                                                             <small class="form-control-feedback"> This field has error. </small> </div>
                                                                     </div>
                                                                     <!--/span-->
                                                                     <div class="col-md-6">
                                                                         <div class="form-group has-danger">
                                                                             <label class="control-label">Jam Akhir</label>
                                                                             <input name="jam_akhir" class="form-control form-control-danger" value="12:00" type="time">
                                                                             <small class="form-control-feedback"> This field has error. </small>
                                                                        </div>
                                                                     </div>
                                                                     <!--/span-->
                                                                     <div class="col-md-6">
                                                                         <div class="form-group">
                                                                             <label class="control-label">Hari</label>
                                                                             <input id=pilihHari type="hidden" name="hari" value="Monday">
                                                                             <select class="form-control custom-select" data-placeholder="Choose a Category">
                                                                                 <option class="hari" value="Monday">Monday</option>
                                                                                 <option class="hari" value="Tuesday">Tuesday</option>
                                                                                 <option class="hari" value="Wednesday">Wednesday</option>
                                                                                 <option class="hari" value="Thursday">Thursday</option>
                                                                                 <option class="hari" value="Friday">Friday</option>
                                                                                 <option class="hari" value="Saturday">Saturday</option>
                                                                                 <option class="hari" value="Sunday">Sunday</option>
                                                                             </select>
                                                                         </div>
                                                                     </div>
                                                                     <div class="form-actions" style="display:inline;margin-top:4.3%;margin-left: auto;margin-right: 40px;">
                                                                          <button type="button" class="btn btn-success save"> <i class="fa fa-check"></i> Save</button>
                                                                          <button type="button" class="btn btn-inverse close-kelas-add-cencel">Cancel</button>
                                                                     </div>
                                                                 </div>

                                                             </div>
                                                         </form>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="modal-content-kelas close-kelas-add">

                                            </div>
                                </div>

                              </div>
                         </div>
                    </ul>

                    <!-- content-->
                    <input id=kelasOpen type="hidden" name="" value="">
                    <div id=kelasContent class="tab-content">
                    </div>
                    <!-- content-->
               </div>
          </div>
     </div>



     <!-- The Modal -->
     <div id="modalKelas" class="modal">

       <!-- Modal content -->
       <div class="modal-content ">
         <div class="modal-body body-kelas">

               <div class="card board-kelas">
                    <div class="row">
                         <div class="col-lg-8">
                              <div class="card board-kelas-in">
                                   <div class="card-body p-b-0">

                                          <!-- Nav tabs -->
                                          <ul class="nav nav-tabs customtab" role="tablist">
                                              <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#dataKelas" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Data Kelas</span></a> </li>
                                              <?php
                                                  if(strcmp($akun,"dosen")==0){
                                                       echo '
                                                        <li class="nav-item"> <a class="nav-link " onclick="loadNotifBoard()" data-toggle="tab" href="#notifikasi" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-notif"></i></span> <span class="hidden-xs-down">Notif</span></a> </li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#member" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Member</span></a> </li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#menages" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-tes"></i></span> <span class="hidden-xs-down">Menage</span></a> </li>';
                                                  }else {
                                                       echo '
                                                       <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#member" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Member</span></a> </li>
                                                       ';
                                                  }
                                              ?>

                                          </ul>
                                          <!-- Tab panes -->
                                          <div class="tab-content-h">
                                               <!-- Tab content -->
                                               <div class="tab-content">
                                                   <div class="tab-pane active show" id="dataKelas" role="tabpanel">
                                                       <div class="p-20">
                                                           <h5>Best Clean Tab ever</h5>
                                                           <h6>you can use it with the small code</h6>
                                                           <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                                                       </div>
                                                   </div>
                                                   <div class="tab-pane" id="menages" role="tabpanel">
                                                        <div class="card" style="margin-left: 10px;margin-right: 10px;">
                                                             <div class="btn-group btn-group-justified" style="margin-right: auto;margin-left: auto;">
                                                                  <a href="#" class="btn btn-primary btn-member" data-value="aturAnggota">Member</a>
                                                                  <a href="#" class="btn btn-primary ktg-member" data-value="tambahKomting">Add komting</a>
                                                             </div>
                                                        </div>
                                                        <div id=menage class="" style="margin-left: 10px;margin-right: 10px;">

                                                        </div>
                                                   </div>
                                                   <div id=notifikasi class="tab-pane" style="margin-left: 10px;margin-right: 10px;">

                                                   </div>
                                                   <div class="tab-pane p-20" id="member" role="tabpanel">

                                                   </div>
                                                   <!-- end member-->
                                               </div>
                                               <!-- end content-->
                                          </div>
                                      </div>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="card board-kelas-in" style="max-height: 460px;">
                                   <div class="card-title">
                                        <h4>Message </h4>
                                   </div>
                                   <div id="chatKelas-scroll" class="con-scroll" style="overflow: auto;">
								<div id=chatKelas class="recent-comment">
								</div>
                                   </div>
                              </div>
                              <form id=formChatKelas class="text-right" style="display:flex;background-color:#fcfcfc;">
                                        <textarea id=formEditChatKelas name="pesan" rows="1" cols="1" class="form-control"></textarea>
                                        <button type="button" class="btn btn-purple waves-effect waves-light" onclick="sendChatKelas()"><i class="fa fa-send m-l-10"></i> </button>
                              </form>

                         </div>
                    </div>

               </div>
         </div>
       </div>

     </div>

     <!-- The Modal -->
     <div id="addMemberKelas" class="modal-kelas" style="visibility:hidden">

       <!-- Modal content -->
       <div class="modal-content-kelas">
         <span class="close">&times;</span>
                   <div class="col-lg-8" style="position: absolute;top: 120px;left: 25%;">
                        <div class="card card-outline-primary">
                            <div class="">
                                     <input id=SearchMember class="form-control" placeholder="Search here" type="text" value=""> <a class="srh-btn"></a>
                            </div>
                            <div class="card-body">


                                <div id=addMemberContent class="row">

                                </div>
                                        <div class="row p-t-20">
                                            <div class="form-actions" style="display:inline;margin-top:4.3%;margin-left: auto;margin-right: 19px;">
                                                 <button type="button" class="btn btn-success save-add "> <i class="fa fa-check"></i> continue</button>
                                                 <button type="button" class="btn btn-inverse close-save-add-cencel addMemberKelas-span">Cancel</button>
                                            </div>
                                        </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-content-kelas close-kelas-add ">

                   </div>
       </div>
     </div>

     <div id="card-found" class="card modal-kelas" style="visibility:hidden;width:50%;height:100px;visibility: hidden;;width: 76.7%;height: auto;display: block;position: absolute;left: 11%;top:28%;">
          <div id=searchFoundContent class="row" style="max-height: 360px;">


          </div>

     </div>
