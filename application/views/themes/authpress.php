<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Raffaele Lanzetta">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/themes/adminpress/images/favicon.ico">
        <title><?php echo $title ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>assets/themes/adminpress/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>assets/themes/adminpress/css/style.css" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <link href="<?php echo base_url(); ?>assets/themes/adminpress/css/colors/blue.css" id="theme" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/bootstrap/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/js/jquery.slimscroll.js"></script>
        <!--Wave Effects -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/js/waves.js"></script>       
        <!--Menu sidebar -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/js/sidebarmenu.js"></script>
        <!--stickey kit -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/sparkline/jquery.sparkline.min.js"></script>        
        <!--Custom JavaScript -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/js/validation.js"></script>         
    </head>
    <body class="fix-header card-no-border logo-center">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
            </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->        
        <section id="wrapper">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <?php echo $output; ?>            
        </section>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->  
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/js/custom.js"></script>                  
    </body>
</html>