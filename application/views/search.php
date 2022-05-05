<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
    .btn-close{
        opacity: 1.5;
        background-color: white;
    }
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">ORGANIZATION LIST</h4>

           <!--  <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">ORGANIZATION</li>
                </ol>
            </div> -->

        </div>
    </div>
</div>
<input type="hidden" name="sort" id="sort" value="">
<input type="hidden" name="column" id="column" value="">
<input type="hidden" name="vieworg" id="vieworg" value="">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php echo form_open('',array("id"=>"frm",'onsubmit' => "return srchkey();")); ?>
                <div class="row">
                    <div class="col-lg-2">
                        <label>Search by</label>
                            <select class="form-select" name="srchby" id="srchby" onchange="chk_orgid();">
                                <option value="organization">Organization</option>
                                <option value="org_id">Organization ID</option>
                                <option value="ALEI">ALEI</option>
                                <!-- <option value="NCAGE">NCAGE</option> -->
                            </select>                            
                    </div>
                    <div class="col-lg-2" id="nrml_srchtype">
                        <label>Search type</label>
                            <select class="form-select" name="srchtype" id="srchtype">
                                <option value="starts">Starts with</option>
                                <option value="Equals">Equals</option>
                                <option value="Contains">Contains</option>
                            </select>
                    </div>
                    <div class="col-lg-3" id="normal_srchbox">
                        <label>Search text</label>
                        <input type="text" class="form-control" name="srchvalue" id="srchvalue" placeholder="Search text">
                    </div>
                    <div class="col-lg-1"><br><br>
                        <label>NCAGE</label>
                        <input type="checkbox" name="chk_ncage" id="chk_ncage" value="chk_ncage" class="form-check-input" onclick="ncage();">
                    </div>

                    <div class="col-lg-1">
                        <button type="button" class="btn waves-effect waves-light" style="background: #404e67;color: #fff;margin-top:25px;" onclick="srchkey();">Search</button>
                    </div>
                     <div class="col-lg-1">
                        <button type="button" id="res" class="btn btn-danger waves-effect waves-light" onclick="location.reload();" style="margin-top:25px;">Reset</button>
                    </div>
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
                </div>
                <?php echo form_close(); ?>
                <div class="row">
                    <div class="col-xl-12">
                        <br> <div class="table-responsive"><div id="result"></div></div>
                         <!-- sample modal content -->
                        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background: #404e67;color: #fff;">
                                        <h5 class="modal-title" id="myModalLabel" style="color:white;">ORGANIZATION DETAILS</h5>
                                       <!--  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    </div>
                                    <div class="modal-body">
                                        <div id="modal_result"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info waves-effect" data-bs-dismiss="modal" style="background: #404e67;">Close</button>
                                       <!--  <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button> -->
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

    var sort='';
    var srchvalue=document.getElementById('srchvalue').value.trim();
    var srchtype=document.getElementById('srchtype').value;
    var limit=document.getElementById('rec_count').value;
    var srchby=document.getElementById('srchby').value;
    if(document.getElementById("chk_ncage").checked)
    {
        var chk_ncage=document.getElementById('chk_ncage').value;
    }
    else
    {
        var chk_ncage='';
    }

    $(document).ready(function(){
            $.ajax({ 
                type: "POST",
                url: "<?php echo base_url();?>search/search/",
                data: 'srchvalue='+srchvalue+'&srchtype='+srchtype+'&sort='+sort+'&limit='+limit+'&srchby='+srchby+'&chk_ncage='+chk_ncage,
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

    function ncage()
    {
        var sort='';
        var srchvalue=document.getElementById('srchvalue').value.trim();
        var srchtype=document.getElementById('srchtype').value;
        var limit=document.getElementById('rec_count').value;
        var srchby=document.getElementById('srchby').value;
        if(document.getElementById("chk_ncage").checked)
        {
            var chk_ncage=document.getElementById('chk_ncage').value;
        }
        else
        {
            var chk_ncage='';
        }

        $.ajax({ 
            type: "POST",
            url: "<?php echo base_url();?>search/search/",
            data: 'srchvalue='+srchvalue+'&srchtype='+srchtype+'&sort='+sort+'&limit='+limit+'&srchby='+srchby+'&chk_ncage='+chk_ncage,
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

    function chk_orgid()
    {
        var org=document.getElementById("srchby").value;
        if(org=='org_id')
        {
            document.getElementById("nrml_srchtype").innerHTML = '<label>Search type</label><select class="form-select" name="srchtype" id="srchtype"><option value="Equals">Equals</option></select>';
            document.getElementById("normal_srchbox").innerHTML = '<label>Search text</label><div class="input-group mb-3" ><div class="input-group-prepend"><span class="input-group-text">0161-1#OG-</span></div><input type="text" class="form-control" name="srchvalue" id="srchvalue"><div class="input-group-append"><span class="input-group-text">#1</span></div></div>';
            $('#srchtype').val('Equals'); 
            $('#srchtype').change();
        }
        else
        {
            document.getElementById("nrml_srchtype").innerHTML = '<label>Search type</label><select class="form-select" name="srchtype" id="srchtype"><option value="starts">Starts with</option><option value="Equals">Equals</option><option value="Contains">Contains</option></select>';
            document.getElementById("normal_srchbox").innerHTML = '<label>Search text</label><input type="text" class="form-control" name="srchvalue" id="srchvalue" placeholder="Search text">';
            $('#srchtype').val('starts'); 
            $('#srchtype').change();
        }
    }

    function orderby(data)
    {
        var str=data.split("_");
        document.getElementById('column').value=str[0];
        document.getElementById('sort').value=str[1];
        var sort_val=document.getElementById('sort').value;
        var col_val=document.getElementById('column').value;
        var srchvalue=document.getElementById('srchvalue').value.trim();
        var srchtype=document.getElementById('srchtype').value;
        var limit=document.getElementById('rec_count').value;
        var srchby=document.getElementById('srchby').value;
        if(document.getElementById("chk_ncage").checked)
        {
            var chk_ncage=document.getElementById('chk_ncage').value;
        }
        else
        {
            var chk_ncage='';
        }
        
       
        $.ajax({ 
                type: "POST",
                url: "<?php echo base_url();?>search/search/",
                data: 'srchvalue='+srchvalue+'&srchtype='+srchtype+'&sort='+sort_val+'&column='+col_val+'&limit='+limit+'&srchby='+srchby+'&chk_ncage='+chk_ncage,
                beforeSend: function () {
                    ajaxindicatorstart('Loading data.. please wait..');
                   
                },
                success: function(data){
                    ajaxindicatorstop();
                    $("#result").html(data);
                    if(sort_val=='asc')
                    {
                        document.getElementById(col_val+"_sort_up").style.visibility = "visible";
                        document.getElementById(col_val+"_sort_down").style.visibility = "hidden";
                    }
                    else
                    {
                        document.getElementById(col_val+"_sort_up").style.visibility = "hidden";
                        document.getElementById(col_val+"_sort_down").style.visibility = "visible";
                    }
                }
            });
    }

    function num_of_rec()
    {

        var sort_val=document.getElementById('column').value;
        var col_val=document.getElementById('sort').value;
        var sort_val=document.getElementById('sort').value;
        var col_val=document.getElementById('column').value;
        var srchvalue=document.getElementById('srchvalue').value.trim();
        var srchtype=document.getElementById('srchtype').value;
        var limit=document.getElementById("rec_count").value;
        var srchby=document.getElementById('srchby').value;
        if(document.getElementById("chk_ncage").checked)
        {
            var chk_ncage=document.getElementById('chk_ncage').value;
        }
        else
        {
            var chk_ncage='';
        }
       
        $.ajax({ 
                type: "POST",
                url: "<?php echo base_url();?>search/search/",
                data: 'srchvalue='+srchvalue+'&srchtype='+srchtype+'&sort='+sort_val+'&column='+col_val+'&limit='+limit+'&srchby='+srchby+'&chk_ncage='+chk_ncage,
                beforeSend: function () {
                    ajaxindicatorstart('Loading data.. please wait..');
                   
                },
                success: function(data){
                    ajaxindicatorstop();
                    $("#result").html(data);
                }
            });
    }

    function srchkey()
    {
        var srchvalue=document.getElementById('srchvalue').value.trim();;
        var srchtype=document.getElementById('srchtype').value;
        var sort_val=document.getElementById('sort').value;
        var col_val=document.getElementById('column').value;
        var limit=document.getElementById("rec_count").value;
        var srchby=document.getElementById('srchby').value;

        if(document.getElementById("chk_ncage").checked)
        {
            var chk_ncage=document.getElementById('chk_ncage').value;
        }
        else
        {
            var chk_ncage='';
        }

        if(srchby=='org_id')
        {
            var text=document.getElementById("srchvalue").value;
            var len=text.length;
            if(len < '6' || len >'7')
            {
                // alert("Please fill organization ID with length 6 or 7");
                swal({
                            text: "Please fill organization ID with length 6 or 7",
                            closeModal: false
                    }).then(function() {
                            swal.close();
                            var url = $('#srchvalue').val().trim();
                            $('#srchvalue').val(url);
                            $('#srchvalue').focus();
                    });
                return false;
            }
        }
        if(srchvalue=='' && srchtype!='org_id')
        {
            // alert("Please fill search text");
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
                url: "<?php echo base_url();?>search/search/",
                data: 'srchvalue='+srchvalue+'&srchtype='+srchtype+'&sort='+sort_val+'&column='+col_val+'&limit='+limit+'&srchby='+srchby+'&chk_ncage='+chk_ncage,
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

    function get_org_details(orgid)
    {   
        // alert(orgid);
        var str=orgid.split('|');
        // var orgid=str[1];
        // var addrid=str[0];
        // alert(orgid);
        // alert(addrid);
        $.ajax({ 
            type: "POST",
            url: "<?php echo base_url();?>search/search_modal/",
            data: 'orgid='+orgid,
            beforeSend: function () {
                ajaxindicatorstart('Loading data.. please wait..');
               
            },
            success: function(data){
               // alert(data);
               ajaxindicatorstop();
               $('#myModal').modal('show');
               $("#modal_result").html(data);
            }
        });
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