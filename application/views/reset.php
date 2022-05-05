<?php $field = get_form_fields(1); ?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>eGOR</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
	
	<!-- css files -->
	<link href="<?php echo ASSET_URL; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo ASSET_URL; ?>css/style.css" rel="stylesheet" type="text/css" media="all"/>

	<!-- Bootstrap Css -->
    <link href="<?php echo ASSET_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
<script src="<?php echo ASSET_URL; ?>js/monetization.js" type="text/javascript"></script>
<script async src='<?php echo ASSET_URL; ?>js/autotrack.js'></script>

<meta name="robots" content="noindex">
<body><link rel="stylesheet" href="<?php echo ASSET_URL; ?>css/font-awesome.min.css">
<!-- New toolbar-->
<style>
* {
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}


#w3lDemoBar.w3l-demo-bar {
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  padding: 40px 5px;
  padding-top:70px;
  margin-bottom: 70px;
  background: #0D1326;
  border-top-left-radius: 9px;
  border-bottom-left-radius: 9px;
}

#w3lDemoBar.w3l-demo-bar a {
  display: block;
  color: #e6ebff;
  text-decoration: none;
  line-height: 24px;
  opacity: .6;
  margin-bottom: 20px;
  text-align: center;
}

#w3lDemoBar.w3l-demo-bar span.w3l-icon {
  display: block;
}

#w3lDemoBar.w3l-demo-bar a:hover {
  opacity: 1;
}

#w3lDemoBar.w3l-demo-bar .w3l-icon svg {
  color: #e6ebff;
}
#w3lDemoBar.w3l-demo-bar .responsive-icons {
  margin-top: 30px;
  border-top: 1px solid #41414d;
  padding-top: 40px;
}
#w3lDemoBar.w3l-demo-bar .demo-btns {
  border-top: 1px solid #41414d;
  padding-top: 30px;
}
#w3lDemoBar.w3l-demo-bar .responsive-icons a span.fa {
  font-size: 26px;
}
#w3lDemoBar.w3l-demo-bar .no-margin-bottom{
  margin-bottom:0;
}
.toggle-right-sidebar span {
  background: #0D1326;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  color: #e6ebff;
  border-radius: 50px;
  font-size: 26px;
  cursor: pointer;
  opacity: .5;
}
.pull-right {
  float: right;
  position: fixed;
  right: 0px;
  top: 70px;
  width: 90px;
  z-index: 99999;
  text-align: center;
}
/* ============================================================
RIGHT SIDEBAR SECTION
============================================================ */

#right-sidebar {
  width: 90px;
  position: fixed;
  height: 100%;
  z-index: 1000;
  right: 0px;
  top: 0;
  margin-top: 60px;
  -webkit-transition: all .5s ease-in-out;
  -moz-transition: all .5s ease-in-out;
  -o-transition: all .5s ease-in-out;
  transition: all .5s ease-in-out;
  overflow-y: auto;
}


/* ============================================================
RIGHT SIDEBAR TOGGLE SECTION
============================================================ */

.hide-right-bar-notifications {
  margin-right: -300px !important;
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}



@media (max-width: 992px) {
  #w3lDemoBar.w3l-demo-bar a.desktop-mode{
      display: none;

  }
}
@media (max-width: 767px) {
  #w3lDemoBar.w3l-demo-bar a.tablet-mode{
      display: none;

  }
}
@media (max-width: 568px) {
  #w3lDemoBar.w3l-demo-bar a.mobile-mode{
      display: none;
  }
  #w3lDemoBar.w3l-demo-bar .responsive-icons {
      margin-top: 0px;
      border-top: none;
      padding-top: 0px;
  }
  #right-sidebar,.pull-right {
      width: 90px;
  }
  #w3lDemoBar.w3l-demo-bar .no-margin-bottom-mobile{
      margin-bottom: 0;
  }
}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    color: #fff;    
}

.btn-danger:hover {
    background-color: #333;
    color: #fff;
}

.btn-danger:active {
    background-color: #333;
    color: #fff;
}

.btn-danger {
    color: #333;
    background-color: #fff;
    margin-top: 15px;
    outline: none;
    padding: 12px 12px;
    cursor: pointer;
    letter-spacing: 2px;
    font-size: 15px;
    font-weight: 600;
    border-radius: 30px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    -ms-border-radius: 30px;
    -o-border-radius: 30px;
    border: none;
    /*text-transform: uppercase;*/
    font-family: 'Raleway', sans-serif;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
}
.btn-block {
    display: block;
    width: 50%;
    margin: 0 auto;
}
input[type="text"]{
    text-transform: none;
}
.input-group i.fa {
    font-size: 20px;
    }
}
</style>
<div class="pull-right toggle-right-sidebar">
<span class="fa title-open-right-sidebar tooltipstered fa-angle-double-right"></span>
</div>

<div id="right-sidebar" class="right-sidebar-notifcations nav-collapse">
<div class="bs-example bs-example-tabs right-sidebar-tab-notification" data-example-id="togglable-tabs">

    <div id="w3lDemoBar" class="w3l-demo-bar">
        <div class="demo-btns">
        <a href="#">
            <span class="w3l-icon -back">
                <span class="fa fa-arrow-left"></span>
            </span>
            <span class="w3l-text">Back</span>
        </a>
        <a href="#">
            <span class="w3l-icon -download">
                <span class="fa fa-download"></span>
            </span>
            <span class="w3l-text">Download</span>
        </a>
        <a href="#" class="no-margin-bottom-mobile">
            <span class="w3l-icon -buy">
                <span class="fa fa-shopping-cart"></span>
            </span>
            <span class="w3l-text">Buy</span>
        </a>
    </div>
        <!---<div class="responsive-icons">
            <a href="#url" class="desktop-mode">
                <span class="w3l-icon -desktop">
                    <span class="fa fa-desktop"></span>
                </span>
            </a>
            <a href="#url" class="tablet-mode">
                <span class="w3l-icon -tablet">
                    <span class="fa fa-tablet"></span>
                </span>
            </a>
            <a href="#url" class="mobile-mode no-margin-bottom">
                <span class="w3l-icon -mobile">
                    <span class="fa fa-mobile"></span>
                </span>
            </a>
        </div>-->
    </div>
    <div class="right-sidebar-panel-content animated fadeInRight" tabindex="5003"
        style="overflow: hidden; outline: none;">
    </div>
</div>
</div>
</div>

<br><br><br><br>
<div class="signupform">

	<h1>eGOR</h1>
	<!---728x90--->

		<div class="container">
			<!-- main content -->
			<div class="agile_info">
				<div class="w3l_form">
					<div class="left_grid_info">
						<img src="<?php echo ASSET_URL; ?>images/ECCMA_logo1.png" alt="" />
					</div>
				</div>
				<div class="w3_info">
					<h2>Reset Password</h2>
					<?php $this->load->view('layout/message'); ?>
						<?php echo form_open(site_url('login/resetpwd'), array('name' => 'login', 'id' => 'login','onsubmit' => "return validate();"), ''); ?>
							<!-- <div class="row">
                          <div class="col-xl-12">
                              <label class="form-check-label" for="formRadios1">
                                 <h5> Reset as:</h5>
                              </label>
                          </div>
                          <div class="col-xl-6">
                              <div class="form-check mb-3">
                                  <input class="form-check-input" type="radio" name="login_opt" id="login_opt" checked="" value="individual">
                                  <h5>
                                      Individual
                                  </h5>
                              </div>
                          </div>
                          <div class="col-xl-6">
                              <div class="form-check mb-3">
                                  <input class="form-check-input" type="radio" name="login_opt" id="login_opt" value="organization">
                                  <h5>
                                      Organization
                                  </h5>
                              </div>
                          </div>
                      </div> -->
							<div class="input-group">
								<span><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" id="useremail" name="useremail" placeholder="<?php echo $field['1.1']['place_holder']; ?>" value="<?php echo $EmailAddress; ?>" readonly autocomplete="nope">
							</div>
							<div class="input-group">
								<span><i class="fa fa-lock" aria-hidden="true"></i></span>
								<input type="Password" class="<?php echo $field['1.2']['validation_class']; ?>" id="pwd1" name="pwd1" placeholder="<?php echo $field['1.2']['place_holder']; ?>" value="">
							</div>
                            <div class="input-group">
                                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input type="Password" class="<?php echo $field['1.2']['validation_class']; ?>" id="pwd2" name="pwd2" placeholder="Confirm Password" value="">
                            </div>
							<button class="btn btn-danger btn-block" type="submit" onclick="validate();">Reset</button >                
						<?php echo form_close(); ?>
				</div>
			</div>
			<!-- //main content -->
		</div>
		<!-- footer -->
		<div class="footer">
			<p>&copy; <a href="https://eccma.org" target="_blank">ECCMA.</a></p>
		</div>
		<!-- footer -->
</div>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">

function validate()
{
    var pwd1=document.getElementById("pwd1").value;
    var pwd2=document.getElementById("pwd2").value;
    if(pwd1=='' || pwd2=='')
    {
        if(pwd1=='')
        {
            swal({
                text: "Please fill Password",
                closeModal: false
            }).then(function() {
                    swal.close();
                    var url = $('#pwd1').val().trim();
                    $('#pwd1').val(url);
                    $('#pwd1').focus();
            });
            return false;
        }
        else
        {
            swal({
                text: "Please fill Confirm Password",
                closeModal: false
            }).then(function() {
                    swal.close();
                    var url = $('#pwd2').val().trim();
                    $('#pwd2').val(url);
                    $('#pwd2').focus();
            });
            return false;
        }
    }
    if(pwd1!=pwd2)
    {
        swal({
                text: "Password and Confirm Password not matches",
                closeModal: false
        }).then(function() {
                swal.close();
                var url = $('#pwd1').val().trim();
                $('#pwd1').val(url);
                $('#pwd1').focus();
        });
        return false;
    }
}

function ajaxindicatorstart(text)
{
    if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
    jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="<?php echo ASSET_URL; ?>images/loading.gif"><div>'+text+'</div></div><div class="bg"></div></div>');
    }
    jQuery('#resultLoading').css({
    'width':'100%',
    'height':'100%',
    'position':'fixed',
    'z-index':'10000000',
    'top':'0',
    'left':'0',
    'right':'0',
    'bottom':'0',
    'margin':'auto'
    });

    jQuery('#resultLoading .bg').css({
    'background':'#000000',
    'opacity':'0.7',
    'width':'100%',
    'height':'100%',
    'position':'absolute',
    'top':'0'
    });

    jQuery('#resultLoading>div:first').css({
    'width': '250px',
    'height':'75px',
    'text-align': 'center',
    'position': 'fixed',
    'top':'0',
    'left':'0',
    'right':'0',
    'bottom':'0',
    'margin':'auto',
    'font-size':'16px',
    'z-index':'10',
    'color':'#ffffff'

    });

    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}

function ajaxindicatorstop()
{
    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}
</script>