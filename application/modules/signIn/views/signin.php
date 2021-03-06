<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
<!--===============================================================================================-->

<style>
	.logo {
		margin: auto;
		max-width: 70px;
		height: auto;
	}
</style>
<script type="text/javascript">
 var BASE_URL = "<?php echo base_url();?>index.php/";
<?php
	include APPPATH ."modules/signIn/ajax/signin.js"; ?>
</script>
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form id=login method="post">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<img class="logo" src="<?php echo base_url();?>asset/theme/img/Logo.png">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<div class="btn-group btn-show-class">
							<button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="btn-show-class">
									<i class="zmdi zmdi-caret-down"></i>
								</span>
							</button>
							<div class="dropdown-menu" style="right: 0px;left:auto">
								<a class="dropdown-item" style="display:block;" onclick="setLogin('dosen')">Dosen</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" style="display:block;" onclick="setLogin('mahasiswa')">Mahasiswa</a>
							</div>
						</div>
						<input id=Slogin type="hidden" name="login" value="">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn signin" name="submit">
								Sign In
							</button>
						</div>
					</div>

					<div class="text-center p-t-15">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="<?php echo base_url();?>index.php/signUp">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

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
	<script type="text/javascript">
	function setLogin(x) {
		document.getElementById("Slogin").value=x;
	}
	</script>
</body>
</html>
