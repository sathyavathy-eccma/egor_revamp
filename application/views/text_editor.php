<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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

    </head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <?php $this->load->view('layout/header'); ?> 
        <div class="vertical-menu">
            <?php $this->load->view('layout/left-side'); ?> 
        </div>
        <div class="main-content">
            <div class="page-content">
<div class="container-fluid">
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18"></h4>

           <!--  <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">ORGANIZATION</li>
                </ol>
            </div> -->

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php echo form_open_multipart('certlist/sendmail',array("id"=>"frm",'onsubmit' => "return srchkey();")); ?>
                        <div class="row">
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">To</label>
                                <div class="col-md-10">
                            	   <input type="text" name="tomail" id="tomail" value="<?php echo $EmailAddress; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" id="name" value="<?php echo $LegalName; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Subject</label>
                                <div class="col-md-10">
                                    <input type="text" name="subject" id="subject" value="<?php echo $subject; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Attachment</label>
                                <div class="col-md-10">
                                    <input type="file" name="upload_file" id="upload_file" value="" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Date</label>
                                <div class="col-md-10">
                                    <div class="input-group" id="datepicker2">
                                        <input type="text" class="form-control" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" data-date-container="#datepicker2" data-provide="datepicker" data-date-autoclose="true" name="date" id="date">

                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Message</label>
                                <div class="col-md-10">
                                    <?php echo $this->ckeditor->editor("email_template",$content); ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <center><button type="submit" name="send_mail" id="send_mail" class="btn btn-success">Send</button></center>
                            </div>
                        </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
</div>
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
 <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript" src="/asset/ckeditor/ckeditor.js"></script>
<script>
     $("#date").on("change", function(e) {
        alert("sdvfv");
        CKEDITOR.instances[email_template].insertText($("#start").val())
     });
  </script>