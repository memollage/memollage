<?php
$random_key = rand(5, 20);
$this->session->set_userdata('akses_key_log', $random_key);
?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>asset/tema/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>asset/tema/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>asset/tema/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>asset/tema/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>asset/tema/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>asset/tema/vendor/bootstrap/js/bootstrap.min.js"></script>
     <script src="<?php echo base_url() ?>asset/ajax/lib.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>asset/tema/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>asset/tema/dist/js/sb-admin-2.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<script>
var keylog = '<?php echo $random_key ?>';
var BASE_URL = '<?php echo base_url(); ?>index.php/';
</script>

<script type="text/javascript">
<?php
     include APPPATH ."modules/login/ajax/login.js";
?>
</script>

<div id="popup"></div>
<div id="loading"></div>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                       <form role="form" class="form-signup" action="#" role="form">
                            <fieldset>
                                <div class="form-group">
                                <input type="text" name="user" id="user" class="form-control form-white" placeholder="User">
                                </div>
                                <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control form-white" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <?php
                                    $param1=rand(1, 10);
                                    $param2=rand(10, 20);
                                    $jumlah = $param1+$param2;
                                    echo "<p class=mt5 mb20>";
                                    echo $param1."+".$param2."=";
                                    ?>
                                <input type="text" name="captcha" id="captcha" style="width:25%;text-align:center;" class="form-control" placeholder="?">
                                <?php
                                echo
                                $this->session->set_userdata("captcha",$jumlah);
                                ?>
                                </div>
                                <!-- Change this to a button or input when using this as a
                                form -->
                                <button type="button" class="btn btn-lg btn-dark btn-rounded proseslogin" data-style="expand-left">Masuk</button>
                            </fieldset>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
