<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blueprint: Multi-Level Menu</title>
	<meta name="description" content="Blueprint: A basic template for a responsive multi-level menu" />
	<meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="favicon.ico">
	<!-- food icons -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/css/organicfoodicons.css" />
	<!-- demo styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/css/demo.css" />
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/theme/css/component.css" />
     <script>
           var BASE_URL = '<?php echo base_url(); ?>index.php/';
     </script>
	<script src="<?php echo base_url();?>asset/theme/vendor/jquery/jquery.js"></script>
	<script src="<?php echo base_url();?>asset/theme/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url();?>asset/theme/js/modernizr-custom.js"></script>

</head>



		<!-- Blueprint header -->
		<header class="bp-header cf">
			<div class="dummy-logo">
				<div class=""><img src="<?php echo base_url();?>asset/theme/img/Logo.png" alt="" style="width:60"> </div>
				<h2 class="dummy-heading">Memollage</h2>
			</div>
		</header>
		<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
		<nav id="ml-menu" class="menu">
			<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
			<div class="menu__wrap">

				<ul data-menu="main" class="menu__level" tabindex="-1" role="menu" aria-label="All">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Home</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-2" aria-owns="submenu-2" href="#">Class</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-3" aria-owns="submenu-3" href="#">Schedule</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-4" aria-owns="submenu-4" href="#">Setting</a></li>
				</ul>

				<!-- Submenu 2 -->
				<ul data-menu="submenu-2" id="submenu-2" class="menu__level" tabindex="-1" role="menu" aria-label="Fruits">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="<?php echo base_url();?>index.php/kelas">List</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Create</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Delete</a></li>
				</ul>

				<!-- Submenu 3 -->
				<ul data-menu="submenu-3" id="submenu-3" class="menu__level" tabindex="-1" role="menu" aria-label="Grains">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Today</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Roster</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Task</a></li>
				</ul>

				<!-- Submenu 4 -->
				<ul data-menu="submenu-4" id="submenu-4" class="menu__level" tabindex="-1" role="menu" aria-label="Setting &amp; Drinks">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Akun</a></li>

				</ul>
			</div>
		</nav>
		<div class="content">
		</div>
		<script src="<?php echo base_url();?>asset/theme/js/classie.js"></script>
		<script src="<?php echo base_url();?>asset/theme/js/main.js"></script>
	     <script src="<?php echo base_url();?>asset/theme/js/theme.js"></script>
