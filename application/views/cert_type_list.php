<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
    .hiddenRow {
    padding: 0 4px !important;
    background-color: #eeeeee;
    font-size: 13px;
}
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="container-fluid">
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18"><?php echo strtoupper($type); ?> LIST</h4>

           <!--  <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">ORGANIZATION</li>
                </ol>
            </div> -->

        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php echo form_open('',array("id"=>"frm",'onsubmit' => "return srchkey();")); ?>
                <div class="row">
                	<input type="hidden" name="cert_type" id="cert_type" value="<?php echo $type; ?>">
                	<input type="hidden" name="vieworg" id="vieworg" value="cert_type">
                    <div class="col-lg-2">
                        <label>Show</label>
                        <select class="form-select" onchange="num_of_rec()" id="rec_count" name="rec_count">
                            <option value="20">20</option>
                            <option value="40">40</option>
                            <option value="60">60</option>
                            <option value="80">80</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label>Search Type</label>
                        <select class="form-select" name="srchtype" id="srchtype">
                            <option value="">Select</option>
                            <option value="legal_name">Legal Name</option>
                            <option value="email_address">Email Address</option>
                            <option value="status">Status</option>
                            <option value="Cert_date">Certified Date</option>
                            <option value="exp_date">Expired Date</option>
                            <option value="renew_date">Renewal Date</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label>Search Value</label>
                        <input type="text" name="srchvalue" id="srchvalue" value="" class="form-control">
                    </div>
                    <div class="col-lg-2">
                        <button type="button"class="btn waves-effect waves-light" style="background: #404e67;color: #fff;margin-top:25px;" onclick="srchkey();">Search</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <div class="row">
                    <div class="col-xl-12">
                        <br> <div id="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

    $('.accordian-body').on('show.bs.collapse', function () {
        $(this).closest("table")
            .find(".collapse.in")
            .not(this)
            .collapse('toggle')
    })

	var cert_type=document.getElementById('cert_type').value;
	var limit=document.getElementById('rec_count').value;

	$(document).ready(function(){
        $.ajax({ 
            type: "POST",
            url: "<?php echo base_url();?>Certlist/search/",
            data: 'cert_type='+cert_type+'&limit='+limit,
            beforeSend: function () {
                ajaxindicatorstart('Loading data.. please wait..');
               
            },
            success: function(data){
               // alert(data);
               ajaxindicatorstop();
               $("#result").html(data);
            }
        });
    });

    function num_of_rec()
    {
        var cert_type=document.getElementById('cert_type').value;
        var limit=document.getElementById('rec_count').value;

        $.ajax({ 
            type: "POST",
            url: "<?php echo base_url();?>Certlist/search/",
            data: 'cert_type='+cert_type+'&limit='+limit,
            beforeSend: function () {
                ajaxindicatorstart('Loading data.. please wait..');
               
            },
            success: function(data){
               // alert(data);
               ajaxindicatorstop();
               $("#result").html(data);
            }
        });
    }

    function srchkey()
    {
        var cert_type=document.getElementById('cert_type').value;
        var limit=document.getElementById('rec_count').value;
        var srchvalue=document.getElementById('srchvalue').value.trim();;
        var srchtype=document.getElementById('srchtype').value;

        if(srchvalue=='')
        {
            swal({
                            text: "Please fill search text",
                            closeModal: false
                    }).then(function() {
                            swal.close();
                            var url = $('#srchvalue').val().trim();
                            $('#srchvalue').val(url);
                            $('#srchvalue').focus();
                    });
            return false;
        }

        $.ajax({ 
            type: "POST",
            url: "<?php echo base_url();?>Certlist/search/",
            data: 'cert_type='+cert_type+'&limit='+limit+'&srchvalue='+srchvalue+'&srchtype='+srchtype,
            beforeSend: function () {
                ajaxindicatorstart('Loading data.. please wait..');
               
            },
            success: function(data){
               // alert(data);
               ajaxindicatorstop();
               $("#result").html(data);
            }
        });
        return false;
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