


<?php $field = get_form_fields(1); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>eGOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo ASSET_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons Css -->
    <link href="<?php echo ASSET_URL; ?>css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo ASSET_URL; ?>css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>
<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Member's Sign in</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?php echo ASSET_URL; ?>images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="https://eccma.org/" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                             <img src="<?php echo ASSET_URL; ?>images/logo-light.svg" alt="" class="rounded-circle" 
                                                 height="34"> 
                                        </span>
                                    </div>
                                </a>

                                <a href="https://eccma.org/" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?php echo ASSET_URL; ?>images/ECCMA_logo.png" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                           <!--  <h5><font color="red"><?php echo $this->session->flashdata('error'); ?></font></h5>  -->
                           <?php $this->load->view('layout/message'); ?>
                            <div class="p-2">
                                 <?php echo form_open(site_url('login/signin'), array('name' => 'login', 'id' => 'login','onsubmit' => "return validate();"), ''); ?>
                                <div class="row">
                                    <div class="col-xl-4 col-sm-6">
                                        <label class="form-check-label" for="formRadios1">
                                           <h5 class="text-primary"> Login as:</h5>
                                        </label>
                                    </div>
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="login_opt" id="login_opt" checked="" value="individual">
                                            <label class="form-check-label" for="formRadios1">
                                                Individual
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="login_opt" id="login_opt" value="organization">
                                            <label class="form-check-label" for="formRadios1">
                                                Organization
                                            </label>
                                        </div>
                                    </div>
                                </div>
                               

                                    <div class="mb-3">
                                        <label for="username" class="form-label"><?php echo $field['1.1']['label_text']; ?></label>
                                        <input type="text" class="form-control <?php echo $field['1.1']['validation_class']; ?>" id="username" name="username" placeholder="<?php echo $field['1.1']['place_holder']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"><?php echo $field['1.2']['label_text']; ?></label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password" id="password" class="form-control <?php echo $field['1.1']['validation_class']; ?>" placeholder="<?php echo $field['1.2']['place_holder']; ?>" aria-label="Password" aria-describedby="password-addon" >
                                           <!--  <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button> -->
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            Remember me
                                        </label>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit" onclick="validate();">Log
                                            In</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                       <!--  <a href="auth-recoverpw.html" class="text-muted"><i
                                                class="mdi mdi-lock me-1"></i> Forgot your password?</a> -->
                                    </div>
                                <?php echo form_close(); ?>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                           <!--  <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary">
                                    Signup now </a> </p> -->
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

</body>


</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    function validate()
    {
        // alert("test");
        var username=document.getElementById("username").value.trim();
        if(username=='')
        {
            swal({
                    text: "Please enter username",
                    closeModal: false
            }).then(function() {
                    swal.close();
                    var url = $('#username').val().trim();
                    $('#username').val(url);
                    $('#username').focus();
            });
            return false;
        }
        var password=document.getElementById("password").value.trim();
        if(password=='')
        {
            swal({
                    text: "Please enter password",
                    closeModal: false
            }).then(function() {
                    swal.close();
                    var url = $('#password').val().trim();
                    $('#password').val(url);
                    $('#password').focus();
            });
            return false;
        }
    }
</script>