<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$org_id=base64_decode($id);
$arr=json_decode(json_encode($org_name), true);
$addr_arr=json_decode(json_encode($org_address), true);
$arr_mas=json_decode(json_encode($org_mas), true);

foreach($arr as $val)
{
    $l1[$val['Property']]=$val['Value'];
    $org_id=$val['OrganizationID'];
}
foreach($addr_arr as $val1)
{
    $l2[$val1['Property']]=$val1['Value'];
}
foreach($arr_mas as $val1)
{
    if(isset($val1['ALEI']))
    {
        $ALEI=$val1['ALEI'];    
    }
    else
    {
        $ALEI='';
    }
    if(isset($val1['NCAGE']))
    {
        $NCAGE=$val1['NCAGE'];    
        if($NCAGE=="0")
        {
            $NCAGE="";
        }
    }
    else
    {
        $NCAGE='';
    }
    if(isset($val1['VisibleStatusAddress']))
    {
        $VisibleStatusAddress=$val1['VisibleStatusAddress'];    
    }
    else
    {
        $VisibleStatusAddress='';
    }
    if(isset($val1['VisibleStatusTelephone']))
    {
        $VisibleStatusTelephone=$val1['VisibleStatusTelephone'];    
    }
    else
    {
        $VisibleStatusTelephone='';
    }
    if(isset($val1['VisibleStatusEmail']))
    {
        $VisibleStatusEmail=$val1['VisibleStatusEmail'];    
    }
    else
    {
        $VisibleStatusEmail='';
    }    
}
foreach($l1 as $key => $val)
{
    if(isset($l1['Fax']))
    {
        $fax=$l1['Fax'];    
    }
    else
    {
        $fax='';
    }
    if(isset($l1['Telephone']))
    {
        $Telephone=$l1['Telephone'];    
    }
    else
    {
        $Telephone='';
    }
    if(isset($l1['Telephone Code']))
    {
        $Telephone_Code=$l1['Telephone Code'];    
    }
    else
    {
        $Telephone_Code='';
    }
    // $Visible_Status=$l1['Visible Status'];
    if(isset($l1['Poc Name']))
    {
        $Poc_Name=$l1['Poc Name'];    
    }
    else
    {
        $Poc_Name='';
    }
    if(isset($l1['Poc Email']))
    {
        $Poc_Email=$l1['Poc Email'];    
    }
    else
    {
        $Poc_Email='';
    }
    if(isset($l1['Legal Name']))
    {
        $Legal_Name=$l1['Legal Name'];
    }
    else
    {
        $Legal_Name='';
    }
    if(isset($l1['Website']))
    {
        $Website=$l1['Website'];
    }
    else
    {
        $Website='';
    }
    
}
if(count($addr_arr)>0)
{
    foreach($l2 as $key => $val)
    {
        if(isset($l2['Address Line One']))
        {
            $Address_Line_One=$l2['Address Line One'];    
        }
        else
        {
            $Address_Line_One='';
        }
        if(isset($l2['Address Line Two']))
        {
            $Address_Line_Two=$l2['Address Line Two'];
        }
        else
        {
            $Address_Line_Two='';
        }
        if(isset($l2['City']))
        {
            $city=$l2['City'];
        }
        else
        {
            $city='';
        }
        if(isset($l2['State']))
        {
            $state=$l2['State'];
        }
        else
        {
            $state='';
        }
        if(isset($l2['Country Code']))
        {
            $country_code=$l2['Country Code'];
        }
        else
        {
            $country_code='';
        }
        if(isset($l2['Country']))
        {
            $country=$l2['Country'];
        }
        else
        {
            $country='';
        }
    }
}
else
{
    $Address_Line_One='';
    $Address_Line_Two='';
    $city='';
    $state='';
    $country='';
    $country_code='';
}


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
        <div class="card">
            <div class="card-body">
                <center><h5 class="text-danger text-uppercase">ORGANIZATION INFORMATION</h5></center>
                <div class="row border border-primary" style="border-radius: 5px;">
                    <div class="col-md-6 table-responsive">
                        <table class="table table-borderless mb-0">
                            <tr><td><b>ORGANIZATION NAME</b></td><td><?php echo $Legal_Name; ?></td></tr>
                            <tr><td><b>ORGANIZATION ID</b></td><td><?php echo $org_id; ?></td></tr>
                            <tr><td><b>NCAGE</b></td><td><?php echo $NCAGE; ?></td></tr>
                            <tr><td><b>ALEI</b></td><td><?php echo $ALEI; ?></td></tr>
                            <tr><td><b>WEBSITE</b></td><td><a href="<?php echo $Website; ?>" target="_blank"><?php echo $Website; ?></a></td></tr>
                        </table>                    
                    </div>
                    <div class="col-md-6 table-responsive">
                        <table class="table table-borderless mb-0">
                            <tr><td><b>ADDRESS <?php if($VisibleStatusAddress=='0'){ echo "(Private)"; echo "<td>**** **** ****</td>"; }else{ ?></b></td><td><?php echo $Address_Line_One."<br>".$Address_Line_Two; ?></td><?php } ?></tr>
                            <tr><td><b>CITY <?php if($VisibleStatusAddress=='0'){ echo "<td>**** **** ****</td>"; }else{ ?></b></td><td><?php echo $city; ?></td><?php } ?></tr>
                            <tr><td><b>STATE <?php if($VisibleStatusAddress=='0'){ echo "<td>**** **** ****</td>"; }else{ ?></b></td><td><?php echo $state; ?></td><?php } ?></tr>
                            <tr><td><b>COUNTRY <?php if($VisibleStatusAddress=='0'){ echo "<td>**** **** ****</td>"; }else{ ?></b></td><td><?php echo $country; ?></td><?php } ?></tr>
                            <tr><td><b>TELEPHONE <?php if($VisibleStatusTelephone=='0'){ echo "(Private)"; echo "<td>**** **** ****</td>"; }else{ ?></b></td><td><?php echo $Telephone; ?></td><?php } ?></tr>
                            <tr><td><b>EMAIL ADDRESS <?php if($VisibleStatusEmail=='0'){ echo "(Private)"; echo "<td>**** **** ****</td>"; }else{ ?></b></td><td><?php echo $Poc_Email; ?></td><?php } ?></tr>
                            <tr>
                                <?php if($this->session->userdata('loginuser_id')==$org_id && $this->session->userdata('checkuser_opt')=='organization') { ?>
                                    <td colspan="2">
                                    <div style="display: flex; justify-content: flex-end">
                                        <a href="<?php echo base_url().'editorg/org/'.base64_encode($org_id); ?>" target="_blank" title="Edit Organization">
                                            <button type="button" class="btn btn-sm btn-info" style="background: #404e67;"><i class="mdi mdi-pencil font-size-18" ></i>EDIT
                                            </button>
                                        </a>
                                    </div>
                                    </td>
                                <?php } else if($this->session->userdata('checkuser_opt')=='individual' && $this->session->userdata('level')=='5') { ?>
                                <td colspan="2">
                                <div style="display: flex; justify-content: flex-end">
                                    <a href="<?php echo base_url().'editorg/org/'.base64_encode($org_id); ?>" target="_blank" title="Edit Organization">
                                        <button type="button" class="btn btn-sm btn-info" style="background: #404e67;"><i class="mdi mdi-pencil font-size-18" ></i>EDIT
                                        </button>
                                    </a>
                                </div>
                                </td>
                                <?php } else { ?>
                                    <td colspan="2">
                                        <div style="display: flex; justify-content: flex-end">
                                            <a href="<?php echo base_url().'editorg/org/'.base64_encode($org_id); ?>" target="_blank" style="pointer-events: none" title="Login as Organization to Edit">
                                                <button type="button" class="btn btn-sm btn-info" style="background: #404e67;" disabled><i class="mdi mdi-pencil font-size-18" ></i>EDIT
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
             <h6 class="text-danger text-uppercase">Individuals List</h6>

          <!--  -->

        </div>
    </div>
</div>
<input type="hidden" name="orgid" id="orgid" value="<?php echo $org_id; ?>">
<input type="hidden" name="sort" id="sort" value="">
<input type="hidden" name="vieworg" id="vieworg" value="vieworg">
<input type="hidden" name="column" id="column" value="">
<input type="hidden" name="sort" id="sort" value="">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php echo form_open('',array("id"=>"frm",'onsubmit' => "return srchkey();")); ?>
                <div class="row">
                    <div class="col-lg-2">
                        <label>Search Type:</label>
                            <select class="form-select" name="srchtype" id="srchtype" >
                                <option value="Individual_id">Individual ID</option>
                                <option value="email_address">Email</option>
                                <option value="Full_name">Individual Name</option>
                            </select>
                    </div>
                    <div class="col-lg-2">
                        <label>Search by:</label>
                            <select class="form-select" name="srchby" id="srchby">
                                <option value="start">Starts with</option>
                                <option value="equals">Equals</option>
                                <option value="like">Contains</option>
                            </select>
                    </div>
                    <div class="col-lg-2">
                        <label>Search Text:</label>
                        <input type="text" class="form-control" name="srchvalue" id="srchvalue" aria-describedby="option-startDate" placeholder="Search text">
                    </div>
                    
                    <div class="col-lg-2">
                        <?php $member=get_memtype(); ?>
                            <label>Member Type:</label>
                            <select class="form-select" class="member_type" id="member_type" onchange="mem_change();">
                                <option option="">Select</option>
                                <!-- <option value="$5,000 Full Membership">Full Membership($5,000 Annually)</option>
                                <option value="$50 Professional Membership">Professional Membership($50 Annually)</option>
                                <option value="$500 Associate Membership">Associate Membership($500 Annually)</option> -->
                                <?php foreach($member as $res){ ?>
                                    <option value="<?php echo $res['MemberType']; ?>"><?php echo $res['MemberType']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="col-lg-2">
                            <label>Certification Type:</label>
                            <select class="form-select" name="certification" id="certification" onchange="cert_change();">
                                <option option="">Select</option>
                                <option value="1">MDQM</option>
                                <option value="2">SA</option>
                                <option value="3">QMDP</option>
                                <option value="4">DSP</option>
                                <option value="5">Quality Master Data</option>
                            </select>
                    </div>
                    <div class="col-lg-1">
                        <button type="button" class="btn waves-effect waves-light" style="background: #404e67;color: #fff;margin-top:25px;" onclick="srchkey();" >Search</button>
                    </div>
                    <div class="col-lg-1">
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
                    <div class="col-xl-12"><br>
                        <div class="table-responsive"><div id="result"></div></div>
                        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background: #404e67;color: #fff;">
                                        <h5 class="modal-title" id="myModalLabel" style="color:white;">INDIVIDUAL DETAILS</h5>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
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
    var orgid=document.getElementById('orgid').value;
    var srchvalue=document.getElementById('srchvalue').value.trim();
    var srchtype=document.getElementById('srchtype').value;
    var member_type=document.getElementById('member_type').value;
    var certification=document.getElementById('certification').value;
    var limit=document.getElementById('rec_count').value;


    $(document).ready(function(){
            $.ajax({ 
                type: "POST",
                url: "<?php echo base_url();?>Vieworg/viewdata/",
                data: 'srchvalue='+srchvalue+'&srchtype='+srchtype+'&certification='+certification+'&member_type='+member_type+'&orgid='+orgid+'&srchby='+srchby+'&limit='+limit,
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

    function srchkey()
    {
        var srchvalue=document.getElementById('srchvalue').value.trim();
        if(srchvalue!='')
        {
            if(srchtype=='')
            {
                // alert("Please select search type");
                swal({
                            text: "Please select search type",
                            closeModal: false
                    }).then(function() {
                            swal.close();
                            // var url = $('#useremail').val().trim();
                            // $('#useremail').val(url);
                            // $('#useremail').focus();
                    });
                return false;
            }
        }
        var srchtype=document.getElementById('srchtype').value;
        var member_type=document.getElementById('member_type').value;
        var certification=document.getElementById('certification').value;
        var orgid=document.getElementById('orgid').value;
        var srchby=document.getElementById('srchby').value;
        var limit=document.getElementById('rec_count').value;

        $.ajax({ 
                type: "POST",
                url: "<?php echo base_url();?>Vieworg/viewdata/",
                data: 'srchvalue='+srchvalue+'&srchtype='+srchtype+'&certification='+certification+'&member_type='+member_type+'&orgid='+orgid+'&srchby='+srchby+'&limit='+limit,
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

    function mem_change()
    {
        srchkey();
    }

    function cert_change()
    {
        srchkey();
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
        var orgid=document.getElementById('orgid').value;
        var member_type=document.getElementById('member_type').value;
        var certification=document.getElementById('certification').value;
       
        $.ajax({ 
                type: "POST",
                url: "<?php echo base_url();?>Vieworg/viewdata/",
                data: 'srchvalue='+srchvalue+'&srchtype='+srchtype+'&sort='+sort_val+'&column='+col_val+'&limit='+limit+'&srchby='+srchby+'&orgid='+orgid+'&certification='+certification+'&member_type='+member_type,
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

    function get_indiv_details(indid)
    {
        // alert(orgid);
        var str=indid
        // alert(orgid);
        // alert(addrid);
        $.ajax({ 
            type: "POST",
            url: "<?php echo base_url();?>Vieworg/indiv_modal/",
            data: 'indid='+str,
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
       
        $.ajax({ 
                type: "POST",
                url: "<?php echo base_url();?>Vieworg/viewdata/",
                data: 'srchvalue='+srchvalue+'&srchtype='+srchtype+'&certification='+certification+'&member_type='+member_type+'&orgid='+orgid+'&srchby='+srchby+'&limit='+limit,
                beforeSend: function () {
                    ajaxindicatorstart('Loading data.. please wait..');
                   
                },
                success: function(data){
                    ajaxindicatorstop();
                    $("#result").html(data);
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