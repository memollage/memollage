<!DOCTYPE html>
<html lang="en" dir="ltr">
     <head>
          <meta charset="utf-8">
          <title></title>
          <!--===============================================================================================-->
          	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
          <!--===============================================================================================-->
          	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/vendor/bootstrap/css/bootstrap.min.css">
          <!--===============================================================================================-->
          	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
          <!--===============================================================================================-->
          	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/vendor/fonts/iconic/css/material-design-iconic-font.min.css">
          <!--===============================================================================================-->
          	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/vendor/animate/animate.css">
          <!--===============================================================================================-->
          	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/vendor/css-hamburgers/hamburgers.min.css">
          <!--===============================================================================================-->
          	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/vendor/animsition/css/animsition.min.css">
          <!--===============================================================================================-->
          	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/vendor/select2/select2.min.css">
          <!--===============================================================================================-->
          	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/vendor/daterangepicker/daterangepicker.css">
          <!--===============================================================================================-->
          	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/css/loginCss/util.css">
          	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/css/loginCss/main.css">
          	<script src="<?php echo base_url();?>asset/theme/vendor/jquery/jquery.js"></script>
          	<script src="<?php echo base_url();?>asset/theme/vendor/jquery/jquery.min.js"></script>
          	<script src="<?php echo base_url();?>asset/theme/js/modernizr-custom.js"></script>
               <script type="text/javascript">
                var BASE_URL = "<?php echo base_url();?>index.php/";
               <?php
               	include APPPATH ."modules/confirmation/ajax/confirmation.js"; ?>
               </script>
     </head>
     <body>

     <div class="limiter">
          <div class="container-login100">
               <div class="wrap-login900" style="color:white;background:rgba(0, 0, 0, 0.69);">
                    <div class="logo" style="position:absolute;width:inherit">
                         <a style="position: relative;left:-10%;float: right;" href="<?php echo base_url();?>index.php/";><img src="<?php echo base_url();?>asset/theme/img/Logo.png" width="75"></a>
                    </div>
                    <h1 class="brand">Welcome to Memollage</h1>
                    <div style="margin:25px 25px 25px 0px;">
                         <p style="color:white;">Thank You For Registering, We received a request to set your MEMOLLAGE email to</p>
                         <p class="brand" style="margin:5px 5px 5px 0px;"><?php echo $_SESSION["daftarE"] ?></p>
                         <p style="color:white;">
                           If this is correct, please confirm by clicking the button below. <br>
                         </p>
                    </div>

                    <div style="width:40%;margin-left:auto;margin-right:auto;" >
                   <div class="container-login100-form-btn" >
                        <div class="wrap-login100-form-btn">
                             <div class="login100-form-bgbtn"></div>
                             <button id=confirmasi class="login100-form-btn">
                                  Send Confirmation Email
                             </button>
                        </div>
                   </div>
              </div>
              <div style="margin: 50px auto 20px auto;text-align:center">
                   <p style="color:white;">Once Send Confirmation Email clicked, all future messages about your Keep Work account will be sent to.</p>
              </div>
          </div>
          </div>
     </div>

<!--===============================================================================================-->
     <script src="<?php echo base_url();?>asset/theme/vendor/jquery/jquery.min.js"></script>
     <script src="<?php echo base_url();?>asset/theme/vendor/jquery/jquery.js"></script>
<!--===============================================================================================-->
     <script src="<?php echo base_url();?>asset/theme/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
     <script src="<?php echo base_url();?>asset/theme/vendor/bootstrap/js/popper.js"></script>
     <script src="<?php echo base_url();?>asset/theme/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
     <script src="<?php echo base_url();?>asset/theme/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
     <script src="<?php echo base_url();?>asset/theme/vendor/daterangepicker/moment.min.js"></script>
     <script src="<?php echo base_url();?>asset/theme/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
     <script src="<?php echo base_url();?>asset/theme/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
     <script src="<?php echo base_url();?>asset/theme/js/loginJs/main.js"></script>
     </body>
</html>
