<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>eGOR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- App favicon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
        <!-- <script src="<?php echo base_url(); ?>assets/libs/jquery/jquery.min.js"></script> -->

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" type="text/css"/> 
                 

        <script src="<?php echo base_url(); ?>assets/js/intlTelInput.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/utils.js"></script>
       

    </head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <?php $this->load->view('layout/header'); ?> 
        <div class="vertical-menu">
            <?php $this->load->view('layout/left-side'); ?> 
        </div>
        <div class="main-content">
            <div class="page-content">
                <?php echo $content_for_layout; ?>
            </div>
            <?php $this->load->view('layout/footer'); ?> 
        </div>
    </div>
    <?php $this->load->view('layout/right-side'); ?> 
    <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <!-- <script src="<?php echo base_url(); ?>assets/js/app.js"></script> -->
</body>
</html>