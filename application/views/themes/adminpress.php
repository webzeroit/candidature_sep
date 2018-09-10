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
        <title><?php echo $title; ?></title>
        <?php
        /** -- Copy from here -- */
        if (!empty($meta))
        {
            foreach ($meta as $name => $content)
            {
                echo "\n\t\t";
                ?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
            }
        }
        echo "\n";

        if (!empty($canonical))
        {
            echo "\n\t\t";
            ?><link rel="canonical" href="<?php echo $canonical ?>" /><?php
        }
        echo "\n\t";

        foreach ($css as $file)
        {
            echo "\n\t\t";
            ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
        } echo "\n\t";

        /** -- to here -- */
        ?>        
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>assets/themes/adminpress/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--alerts CSS -->
        <link href="<?php echo base_url(); ?>assets/themes/adminpress/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">        
        <!-- Date picker plugins css -->
        <link href="<?php echo base_url(); ?>assets/themes/adminpress/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <!-- Select2 plugin css -->
        <link href="<?php echo base_url(); ?>assets/themes/adminpress/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />        
        <link href="<?php echo base_url(); ?>assets/themes/adminpress/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />        
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
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->  
        <script type='text/javascript'>
            var baseURL = "<?php echo base_url(); ?>";
        </script>
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
        <!-- Date Picker Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>  
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/bootstrap-datepicker/bootstrap-datepicker.it.js"></script>        
        <!-- This is data table -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/datatables/jquery.dataTables.min.js"></script>
        <!-- start - This is for export functionality only -->
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        <!-- end - This is for export functionality only -->    
        <!-- loadJSON Jquery Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/jquery-load-json/src/jquery.loadJSON.js" type="text/javascript"></script>        
        <!-- Select2 Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>        
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/select2/dist/js/i18n/it.js" type="text/javascript"></script>   
        <!--Custom JavaScript -->  
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/js/validation.js"></script>                   
        <!-- Sweet-Alert  -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/plugins/sweetalert/sweetalert.min.js"></script>        
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
        <!-- Preloader end -->
        <!-- ============================================================== -->     
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->        
        <div id="main-wrapper">            
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">            
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo base_url(); ?>">
                            <!-- Logo icon -->
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="<?php echo base_url(); ?>assets/themes/adminpress/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="<?php echo base_url(); ?>assets/themes/adminpress/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                            
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span>
                                <!-- dark Logo text -->
                                <img src="<?php echo base_url(); ?>assets/themes/adminpress/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->    
                                <img src="<?php echo base_url(); ?>assets/themes/adminpress/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span> 
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Fine Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- pulsantini di notifica ed altri item -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto mt-md-0">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        </ul>
                        <ul class="navbar-nav my-lg-0">
                            <!-- ============================================================== -->
                            <!-- Profilo -->
                            <!-- ============================================================== -->                            
                            <li class="nav-item dropdown">
                                <?php if ($this->ion_auth->logged_in()) { ?>
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/themes/adminpress/images/users/1.jpg" alt="user" class="profile-pic" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right scale-up">
                                    <ul class="dropdown-user">
                                        <li>
                                            <div class="dw-user-box">
                                                <div class="u-img"><img src="<?php echo base_url(); ?>assets/themes/adminpress/images/users/1.jpg" alt="user"></div>
                                                <div class="u-text">
                                                    <h4>La tua email</h4>
                                                    <p class="text-muted"><?php 
                                                        $user = $this->ion_auth->user()->row();
                                                        echo $user->email; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li role="separator" class="divider"></li> 
                                        <li><a href="<?php echo base_url('auth/change_password') ?>"><i class="fa fa-key"></i> Cambia password</a></li>
                                        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                    </ul>
                                </div>
                                <?php } ?>
                            </li>  
                            <!-- ============================================================== -->
                            <!-- Fine Profilo -->
                            <!-- ============================================================== -->                              
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left/Top Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li><a class="has-arrow waves-effect waves-dark" href="<?php echo base_url() ?>" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a>
                            </li>
                            <li><a class="has-arrow waves-effect waves-dark" href="<?php echo base_url('faq') ?>" aria-expanded="false"><i class="mdi mdi-comment-question-outline"></i><span class="hide-menu">Faq</span></a>
                            </li>
                            <?php 
                            $group = array('utente');    
                            if ($this->ion_auth->logged_in() && $this->ion_auth->in_group($group)){ 
                            ?>
                            <li><a class="has-arrow waves-effect waves-dark" href="<?php echo base_url('candidatura/compila_domanda') ?>" aria-expanded="false"><i class="mdi mdi-account-edit"></i><span class="hide-menu">Candidatura</span></a>
                            </li>                                       
                            <?php } ?>
                            <?php 
                            $group = array('tecnico', 'admin');    
                            if ($this->ion_auth->logged_in() && $this->ion_auth->in_group($group)){ 
                            ?>
                            <li><a class="has-arrow waves-effect waves-dark" href="<?php echo base_url('esperti_sep') ?>" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Gestione domande</span></a>
                            </li>                                       
                            <?php } ?>    
                            <?php  if ($this->ion_auth->is_admin()){ ?>
                            <li><a class="has-arrow waves-effect waves-dark" href="<?php echo base_url('auth/index') ?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Gestione utenze</span></a>
                            </li>                                       
                            <?php } ?>                              
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->            
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><?php echo $page_title; ?></h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $title ?></li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->                

                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Container dei messaggi -->
                    <!-- ============================================================== -->  
                    <?php if (isset($message))
                    {
                        ?>                                    
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-info"><?php echo $message; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                </div>                            
                            </div>
                        </div>                    
                    <?php } ?>                     
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <?php echo $output; ?>
                </div>
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer">
                    © <?php echo date("Y"); ?> Regione Campania - Direzione Generale per l'istruzione, la formazione, il lavoro e le politiche giovanili - Centro Direzionale Isola A6 
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->            
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!--Custom JavaScript -->
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/js/custom.js"></script>      
        <script src="<?php echo base_url(); ?>assets/themes/adminpress/js/my_functions.js"></script>  
        <?php
        foreach ($js as $file)
        {
            echo "\n\t\t";
            ?><script src="<?php echo $file; ?>"></script><?php
        } echo "\n\t";
        ?>         
    </body>
</html>