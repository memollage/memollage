<link href="<?php echo base_url();?>asset/theme/css/countDown/flipclock.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">
<?php
     include APPPATH ."modules/beranda/ajax/flipclock.js";
?>
</script>
<!-- Page Content -->

     <div class="container-in-flex">
          <div class="col-lg-8">
               <div class="card">
                     <div class="card-body">
                         <div class="card-content">
                          <div class="card" style="margin:0;text-align:center">
                               <h4> <strong>CLASS STARTS SOON</strong></h4>
                          </div>
                           <div class="clock" style="margin:2em;"></div>
	                          <div class="message" >
                                    <div class="card col-lg-4" style="text-align:center;margin-left:auto;margin-right:auto;">
                                         <h6><?php echo "Course : ".$result->nama_matakuliah ?></h6><br/>
                                         <h6><?php echo "Room   : ".$result->nama_kelas ?></h6><br/>
                                         <h6><?php echo "Time   : ".$result->jam_mulai ?></h6>
                                    </div>
                               </div>
                        </div>
                     </div>
               </div>
          </div>
          <div class="col-lg-4">
               <div class="card">
                    <div class="card-body">
                         <h4 class="card-title">Todo -> ini akan todo</h4>
                         <div class="card-content">
                              <div class="todo-list">
                                   <div class="tdl-holder">
                                        <div class="tdl-content">
                                             <ul>
                                                  <li>
                                                       <label>
                                                            <input type="checkbox"><i class="bg-primary"></i><span>Build an angular app</span>
                                                            <a href="#" class="ti-close"></a>
                                                       </label>
                                                  </li>
                                                  <li>
                                                       <label>
                                                            <input checked="" type="checkbox"><i class="bg-success"></i><span>Creating component page</span>
                                                            <a href="#" class="ti-close"></a>
                                                       </label>
                                                  </li>
                                                  <li>
                                                       <label>
                                                            <input checked="" type="checkbox"><i class="bg-warning"></i><span>Follow back those who follow you</span>
                                                            <a href="#" class="ti-close"></a>
                                                       </label>
                                                  </li>
                                                  <li>
                                                       <label>
                                                            <input checked="" type="checkbox"><i class="bg-danger"></i><span>Design One page theme</span>
                                                            <a href="#" class="ti-close"></a>
                                                       </label>
                                                  </li>

                                             </ul>
                                        </div>
                                        <input class="tdl-new form-control" placeholder="Type here" type="text">
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <script type="text/javascript">
		var clock;
          var jam;
          window.onload= getTime();
          function getTime() {

            var url = BASE_URL+"beranda/getTime/";
            $.post( url, { x : 4 }).done(function(data) {
                 jam=parseInt(data);
                 tes();
            });
          }

          function tes() {

			var clock;

			clock = $('.clock').FlipClock({
		        clockFace: 'DailyCounter',
		        autoStart: false,
		        callbacks: {
		        	stop: function() {
		        		$('.message').html('The clock has stopped!')
		        	}
		        }
		    });
          clock.setTime(jam);
          clock.setCountdown(true);
          clock.start();

     }

	</script>
