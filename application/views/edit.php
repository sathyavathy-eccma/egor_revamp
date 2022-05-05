<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$field = get_form_fields(2);

$sess_level=$this->session->userdata('level');
// echo "level=".$sess_level;
foreach($indivinfo as $res)
{
    
}

foreach($res['ind_mas'] as $indiv)
{
        $IndividualId= $indiv['IndividualId'];
        $Username= $indiv['Username'];
        $Password= $indiv['Password'];
        $Level=$indiv['Level'];
        $LegalName=$indiv['LegalName'];
        $UserStatus=$indiv['UserStatus'];
        $member_type=$indiv['MemberType'];
}

foreach($res['ind_val'] as $indiv)
{
    $Firstname=$indiv['Firstname'];
    $lastname=$indiv['lastname'];
    $title=$indiv['title'];
    $gender=$indiv['gender'];
    $role_code=$indiv['role_code'];
    $telephone=$indiv['telephone'];
    $fax=$indiv['fax'];
    $mem_start_date=$indiv['mem_start_date'];
    $mem_end_date=$indiv['mem_end_date'];
    $mem_renewal_date=$indiv['mem_renewal_date'];
    $mem_status=$indiv['mem_status'];
    $user_status=$indiv['user_status'];
    $mem_type=$indiv['mem_type'];
    if($indiv['email']!='')
    {
        $email_split=explode("@",$indiv['email']);
        $user=$email_split[0];
        $domain=$email_split[1];
    }
    else
    {
        $user='';
        $domain='';
    }
    
}

// pre($res['Addr_list']);
foreach($res['Addr_list'] as $val)
{
    $l1[$val['Property']]=$val['Value'];
}
// pre($l1);
// exit;

foreach($l1 as $key => $val)
{
    if(isset($l1['Address Line One']))
    {
        $add1=$l1['Address Line One'];    
    }
    else
    {
        $add1='';
    }
    if(isset($l1['Address Line Two']))
    {
        $add2=$l1['Address Line Two'];    
    }
    else
    {
        $add2='';
    }
    if(isset($l1['City']))
    {
        $city1=$l1['City'];    
    }
    else
    {
        $city1='';
    }
    if(isset($l1['State']))
    {
        $state1=$l1['State'];    
    }
    else
    {
        $state1='';
    }
    if(isset($l1['Country']))
    {
        $country=explode("-",$l1['Country']); 
        $country=$country[0]; 
    }
    else
    {
        $country='';
    }
    if(isset($l1['Country Code']))
    {
        $country_code=$l1['Country Code'];    
    }
    else
    {
        $country_code='';
    }
    if(isset($l1['Zip Code']))
    {
        $zipcode=$l1['Zip Code'];    
    }
    else
    {
        $zipcode='';
    }
}

if(strpos($state1, 'OTHER|') !== false)
{
    $state= str_replace("OTHER|","",$state1);
}
else
{
    $state=$state1;
}

if(strpos($city1, 'OTHER|') !== false)
{
    $city= str_replace("OTHER|","",$city1);
}
else
{
    $city=$city1;
}

// pre($res['cert_list']);
// exit;

?>
<style type="text/css">
    .select2-selection__rendered {
    line-height: 31px !important;
}
.select2-container .select2-selection--single {
    height: 35px !important;
}
.select2-selection__arrow {
    height: 34px !important;
}
}
</style>
<script type="text/javascript" src="<?php echo ASSET_URL; ?>js/formJS.js"></script>
<script type="text/javascript" src="<?php echo ASSET_URL; ?>js/validate1.min.js"></script>
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid">
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">INDIVIDUAL - EDIT</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <?php echo form_open('Editindiv/edit_individual',array('class' => 'frm','name' => 'edit_ind', 'id' => 'edit_ind')); ?>
        <input type="hidden" name="individual_id" name="individual_id" value="<?php echo $IndividualId; ?>">
        <div class="card">
            <div class="card-body">
                <!-- <div class="row"> -->
                    <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                        <div class="col-md-3">
                                <font size="4%">Profile</font>
                        </div>
                    </div>
                    <!-- <div class="row"> -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.1']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <input type="text" name="username" id="username" value="<?php echo $Username; ?>" class="form-control <?php echo $field['1.1']['validation_class']; ?>" placeholder="<?php  echo $field['1.1']['place_holder']; ?>" <?php if($this->session->userdata('level')<'4'){ echo "readonly"; } ?>>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label><a href="<?php echo $field['1.2']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.2']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <input type="text" name="password" id="password" value="<?php echo $Password; ?>" class="form-control <?php echo $field['1.2']['validation_class']; ?>" placeholder="<?php echo $field['1.2']['place_holder']; ?>" <?php if($this->session->userdata('level')<'4'){ echo "readonly"; } ?> <?php echo $field['1.2']['is_required']; ?>>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.3']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.3']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" value="<?php echo $title ?>" class="form-control" placeholder="<?php echo $field['1.3']['place_holder']; ?>" <?php echo $field['1.3']['is_required']; ?>>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-062674#1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.4']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.4']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <input type="text" name="firstname" id="firstname" value="<?php echo $Firstname; ?>" class="form-control" placeholder="<?php echo $field['1.4']['place_holder']; ?>" <?php echo $field['1.4']['is_required']; ?>>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-102137#1">
                            </div>
                        </div>
                       <!--  <div class="col-md-4">
                            <div class="mb-3">
                                <label>MiddleName</label>
                                <input type="text" name="middlename" id="middlename" value="<?php ?>" class="form-control">
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.5']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.5']['label_text']; ?></a></label>
                                <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" class="form-control" placeholder="<?php echo $field['1.5']['place_holder']; ?>">
                                <input type="hidden" name="temp_array[]" value="0161-1#02-102141#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.6']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.6']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <select class="form-select" name="gender" id="gender" <?php echo $field['1.6']['is_required']; ?>>
                                    <option value="">Select</option>
                                    <option value="Male" <?php if($gender=='Male'){ echo "selected"; } ?> >Male</option>
                                    <option value="Female" <?php if($gender=='Female'){ echo "selected"; } ?> >Female</option>
                                    <option value="Transgender" <?php if($gender=='Transgender'){ echo "selected"; } ?> >Transgender</option>
                                </select>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-061691#1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.7']['label_text']; ?><span class="text-danger">*</span></label>
                                <select class="form-select" name="employee_status" id="employee_status" <?php echo $field['1.7']['is_required']; ?>>
                                    <option value="Active" <?php if($UserStatus=='Active'){ echo "selected"; } ?> >Active</option>
                                    <option value="Inactive" <?php if($UserStatus=='Inactive'){ echo "selected"; } ?> >Inactive</option>
                                </select>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-174093#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.8']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.8']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <select name="emp_role_code" id="emp_role_code" class="form-select" <?php echo $field['1.8']['is_required']; ?>>
                                    <option value="Other" selected="">Other</option>
                                    <option value="Board Member" <?php if($role_code=='Board Member'){ echo "selected"; } ?>>Board Member</option>
                                    <option value="Shareholder" <?php if($role_code=='Shareholder'){ echo "selected"; } ?>>Shareholder</option>
                                    <option value="Administrative Point of Contact" <?php if($role_code=='Administrative Point of Contact'){ echo "selected"; } ?>>Administrative Point of Contact</option>
                                    <option value="Alternate Point of Contact" <?php if($role_code=='Alternate Point of Contact'){ echo "selected"; } ?>>Alternate Point of Contact</option>
                                </select>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-486421#1">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                       
                    </div>
                    <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                        <div class="col-md-3">
                                <font size="4%">Address</font>
                        </div>
                        <div class="col-md-1">
                            <font size="4%">Make it:</font>
                        </div>
                        <div class="col-md-2">
                                <input class="form-check-input" type="radio" name="addr_radio" id="addr_radio1" value="1" style="margin-top: 6px;">
                                <font size="4%">
                                                    Public
                                </font>
                        </div>
                        <div class="col-md-2">
                                <input class="form-check-input" type="radio" name="addr_radio" id="addr_radio2" value="0" style="margin-top: 6px;">
                                <font size="4%">
                                                    Private
                                </font>
                        </div>
                        <div class="col-md-3">
                                <input class="form-check-input" type="checkbox" id="addr_check" name="addr_check" value="addr_checked" style="margin-top: 6px;">
                                <font size="4%">
                                                    Verified by Individual
                                </font>
                        </div>
                        <input type="hidden" name="temp_array[]" value="0161-1#02-174088#1">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.9']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.9']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <input type="text" name="add1" id="add1" value="<?php echo $add1; ?>" class="form-control <?php echo $field['1.9']['validation_class']; ?>" placeholder="<?php echo $field['1.9']['place_holder'] ?>" <?php echo $field['1.9']['is_required']; ?>>
                            </div>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-159219#1">
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.1.0']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.0']['label_text']; ?></a></label>
                                <input type="text" name="add2" id="add2" value="<?php echo $add2; ?>" class="form-control <?php echo $field['1.1.0']['validation_class']; ?>" placeholder="<?php echo $field['1.1.0']['place_holder'] ?>">
                                <input type="hidden" name="temp_array[]" value="0161-1#02-160683#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.1.3']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.3']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <select class="form-select <?php echo $field['1.1.3']['validation_class']; ?>" id="country" name="country" <?php echo $field['1.1.3']['is_required']; ?>>
                                    <option value="">Select Country</option>
                                    <?php $country_res = get_countries(); ?>
                                    <?php foreach($country_res as $val){ ?>
                                    <option value="<?php echo $val['country_name'].'-'.$val['sortname']; ?>" data-id="<?php echo $val['id']; ?>" <?php if($country==$val['country_name']){ print("selected");} ?>><?php echo $val['country_name'].'-'.$val['sortname']; ?></option>
                                    <?php } ?>
                                </select>
                                <input type="text" class="form-control" id="other_country" value="" name="other_country" style="display:none">
                                <input type="hidden" name="temp_array[]" value="0161-1#02-091098#1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.1.2']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.2']['label_text']; ?></a><span class="text-danger">*</span></label>
                               <select class="form-select <?php echo $field['1.1.2']['validation_class']; ?>" id="state" name="state" <?php echo $field['1.1.2']['is_required']; ?>>
                                    <option value="">Select State</option>
                                    <option value="OTHER" data-id="OTHER" <?php if(strpos($state1, 'OTHER|') !== false){ echo "selected"; } ?>>Other</option>
                                    <?php $state_res = get_states(); ?>
                                    <?php foreach($state_res as $val){ ?>
                                    <option value="<?php echo $val['state_name'] ?>" data-id="<?php echo $val['id']; ?>" <?php if($state==$val['state_name']){ print("selected");} ?>><?php echo $val['state_name']; ?></option>
                                    <?php } ?>  
                                </select>
                                
                                <input type="hidden" name="temp_array[]" value="0161-1#02-153697#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.1.1']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.1']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <select class="form-select <?php echo $field['1.1.1']['validation_class']; ?>" id="city" name="city" <?php echo $field['1.1.1']['is_required']; ?>>
                                    <option value="">Select City</option>
                                    <option value="OTHER" data-id="OTHER" <?php if(strpos($city1, 'OTHER|') !== false){ echo "selected"; } ?>>Other</option>
                                    <?php if(strpos($city1, 'OTHER|') === false){ 
                                        $cities_res = get_cities($state); ?>
                                      <?php foreach($cities_res as $val){ ?>
                                    <option value="<?php echo $val['city_name'] ?>" data-id="<?php echo $val['id']; ?>" <?php if($city==$val['city_name']){ print("selected");} ?>><?php echo $val['city_name']; ?></option>
                                    <?php }} ?>  
                                </select>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-102127#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php  echo $field['1.1.4']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.4']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <input type="text" name="zipcode" id="zipcode" value="<?php echo $zipcode; ?>" class="form-control <?php echo $field['1.1.4']['validation_class']; ?>" placeholder="<?php echo $field['1.1.4']['place_holder']; ?>" <?php echo $field['1.1.4']['is_required']; ?>>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-000029#1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="other_state" value="<?php echo $state; ?>" name="other_state" <?php if(strpos($state1, 'OTHER|') !== false){ ?> style="display: block"; <?php }else{ ?> style="display:none" <?php } ?>>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                 <input type="text" class="form-control" id="other_city" value="<?php echo $city; ?>" name="other_city" <?php if(strpos($city1, 'OTHER|') !== false){ ?> style="display: block"; <?php }else{ ?> style="display:none" <?php } ?>>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                        <div class="col-md-3">
                                <font size="4%">Telephone</font>
                        </div>
                        <div class="col-md-1">
                            <font size="4%">Make it:</font>
                        </div>
                        <div class="col-md-2">
                                <input class="form-check-input" type="radio" name="tel_rad" id="tel_rad1" value="1" style="margin-top: 6px;">
                                <font size="4%">
                                                    Public
                                </font>
                        </div>
                        <div class="col-md-2">
                                <input class="form-check-input" type="radio" name="tel_rad" id="tel_rad2" value="0" style="margin-top: 6px;">
                                <font size="4%">
                                                    Private
                                </font>
                        </div>
                        <div class="col-md-3">
                                <input class="form-check-input" type="checkbox" id="tel_check" name="tel_check" value="tel_checked" style="margin-top: 6px;">
                                <font size="4%">
                                                    Verified by Individual
                                </font>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php  echo $field['1.1.5']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.5']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <input type="text" name="country_code" id="country_code" value="<?php echo $country_code; ?>" class="form-control <?php echo $field['1.1.5']['validation_class']; ?>" placeholder="<?php echo $field['1.1.5']['place_holder']; ?>" <?php echo $field['1.1.5']['is_required']; ?>>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-090183#1">
                            </div>
                        </div>
                        <!--  <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.2.3']['label_text']; ?></label>
                                <input type="text" name="area_code" id="area_code" value="<?php echo $telephone; ?>" class="form-control" placeholder="<?php  echo $field['1.2.3']['place_holder']; ?>">
                            </div>
                        </div> -->
                         <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.1.6']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.6']['label_text']; ?></a><span class="text-danger">*</span></label><br>
                                <input type="text" name="tel_number" id="tel_number" value="<?php echo $telephone; ?>" class="form-control <?php echo $field['1.1.6']['validation_class']; ?>" style="width: 375px;" placeholder="<?php echo $field['1.1.6']['place_holder']; ?>" <?php echo $field['1.1.6']['is_required']; ?>>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-000077#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.1.7']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.7']['label_text']; ?></a></label>
                            <input type="text" name="fax" id="fax" value="<?php echo $fax; ?>" class="form-control <?php echo $field['1.1.7']['validation_class']; ?>">
                            <input type="hidden" name="temp_array[]" value="0161-1#02-103658#1">

                        </div>
                    </div> 
                    </div>
                   <!--  <div class="row">
                         <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.2.4']['label_text']; ?></label>
                                <input type="text" name="extension" id="extension" value="" class="form-control" placeholder="<?php  echo $field['1.2.4']['label_text']; ?>">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.2.5']['label_text']; ?></label>
                                <select name="type_code_telephone" id="type_code_telephone" class="form-select">
                                    <option value="POTS">POTS</option>
                                    <option value="ISDN">ISDN</option>
                                    <option value="VOIP">VOIP</option>
                                    <option value="Mobile">Mobile</option>
                                    <option value="FAX-line">FAX-line</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.2.6']['label_text']; ?></label>
                                <select id="tel_usecode" class="form-select" name="tel_usecode">
                                    <option value="Home" selected="">Home</option>
                                    <option value="Office">Office</option>
                                    <option value="Personal">Personal</option>
                                </select>
                            </div>
                        </div>
                         <div class="row">
                            <div id="add_telephone"></div>
                        </div><br>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <button class="btn waves-effect waves-light btn-success" type="button" title="Add Telephone" onclick="add_telephone()"><i class="fas fa-plus-circle"></i></button>
                            </div>
                        </div> 
                    </div> -->
                    <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                        <div class="col-md-3">
                                <font size="4%">Email</font>
                        </div>
                        <div class="col-md-1">
                            <font size="4%">Make it:</font>
                        </div>
                        <div class="col-md-2">
                                <input class="form-check-input" type="radio" name="email_rad" id="email_rad1" value="1" style="margin-top: 6px;">
                                <font size="4%">
                                                    Public
                                </font>
                        </div>
                        <div class="col-md-2">
                                <input class="form-check-input" type="radio" name="email_rad" id="email_rad2" value="0" style="margin-top: 6px;">
                                <font size="4%">
                                                    Private
                                </font>
                        </div>
                        <div class="col-md-3">
                                <input class="form-check-input" type="checkbox" id="email_check" name="email_check" value="email_checked" style="margin-top: 6px;">
                                <font size="4%">
                                                    Verified by Individual
                                </font>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php  echo $field['1.2.7']['label_text']; ?>" target="_blank"><?php  echo $field['1.2.7']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <div class="input-group">
                                   <input type="text" class="form-control text-right" style="width: 50%;" id="email_address_user" name="email_address_user" value="<?php echo $user; ?>" <?php echo $field['1.2.7']['is_required']; ?>>
                                    <div class="input-group-text">@</div>
                                    <input type="text" class="form-control text-left" style="width: 30%;" id="email_address_domain" name="email_address_domain" value="<?php echo $domain; ?>" <?php echo $field['1.2.7']['is_required']; ?>>
                                    <input type="hidden" name="temp_array[]" value="0161-1#02-140061#1">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.2.8']['label_text']; ?></label>
                                <select id="email_usecode" class="form-select" name="email_usecode">
                                    <option value="Home" selected="">Home</option>
                                    <option value="Office">Office</option>
                                    <option value="Personal">Personal</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <font size="4%">Individual Profile</font>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.2.9']['label_text']; ?></label>
                                <textarea class="form-control text-left" style="" id="description" name="description" value=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.3.0']['label_text']; ?></label>
                                <select name="profile_usecode" id="profile_usecode" class="form-control">
                                    <option value="Directory" selected="">Directory</option>
                                    <option value="Proceedings">Proceedings</option>
                                    <option value="Course materials">Course materials</option>
                                    <option value="Promotional materials">Promotional materials</option>
                                    <option value="Website">Website</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                    <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                        <div class="col-md-7">
                                <font size="4%">Membership Information</font>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.3.1']['label_text']; ?><span class="text-danger">*</span></label>
                                <select name="member_usertype" id="member_usertype" class="form-select" style="" <?php echo $field['1.3.1']['is_required']; ?>>
                                    <option value="Member" <?php if($mem_type=='Member'){ echo "selected"; } ?>>Member</option>
                                    <option value="eGOR" <?php if($mem_type=='eGOR'){ echo "selected"; } ?>>eGOR</option>
                                    <option value="CERT" <?php if($mem_type=='CERT'){ echo "selected"; } ?>>CERT</option>
                                    <option value="EPOCD" <?php if($mem_type=='EPOCD'){ echo "selected"; } ?>>EPOCD</option>
                                    <option value="Data Validation" <?php if($mem_type=='Data Validation'){ echo "selected"; } ?>>Data Validation</option>
                                    <option value="Non-Member" <?php if($mem_type=='Non-Member'){ echo "selected"; } ?>>Non-Member</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.2.2']['label_text']; ?><span class="text-danger">*</span></label>
                                <select name="member_type" id="member_type" class="form-control" style="" <?php echo $field['1.2.2']['is_required']; ?>>
                                    <option value="" selected="">--Select--</option>
                                    <option value="$500 Associate Membership" <?php if($member_type=='$500 Associate Membership'){ echo "selected"; } ?> >$500 Associate Membership</option>
                                    <option value="$5,000 Full Membership" <?php if($member_type=='$5,000 Full Membership'){ echo "selected"; } ?> >$5,000 Full Membership</option>
                                    <option value="$50,000 Charter Membership" <?php if($member_type=='$50,000 Charter Membership'){ echo "selected"; } ?> >$50,000 Charter Membership</option>
                                </select>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-139990#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.2.0']['label_text']; ?><span class="text-danger">*</span></label>
                                <select name="member_status" id="member_status" class="form-control" style="" <?php echo $field['1.2.0']['is_required']; ?>>
                                    <option value="">--Select--</option>
                                    <option value="Active" <?php if($mem_status=='Active'){ echo "selected"; } ?>>Active</option>
                                    <option value="Inactive" <?php if($mem_status=='Inactive'){ echo "selected"; } ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.1.8']['label_text']; ?><span class="text-danger">*</span></label>
                                <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                    <input type="text" class="form-control" name="start" id="start" placeholder="Start Date" value="<?php echo $mem_start_date; ?>" <?php echo $field['1.1.8']['is_required']; ?>>
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    <input type="hidden" name="temp_array[]" value="0161-1#02-174089#1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3"><br>
                                <div class="input-group" style="margin-top: 8px;">
                                    <input type="text" class="form-control" name="end" id="end" placeholder="End Date" value="<?php echo $mem_end_date; ?>" <?php echo $field['1.1.8']['is_required']; ?> readonly>
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    <input type="hidden" name="temp_array[]" value="0161-1#02-174090#1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.1.9']['label_text']; ?></label>
                                <div class="input-group" id="datepicker1">
                                    <input type="text" class="form-control" name="mem_renewal_date" id="mem_renewal_date" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-date-container="#datepicker1" data-provide="datepicker" value="<?php echo $mem_renewal_date; ?>">

                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    <input type="hidden" name="temp_array[]" value="0161-1#02-174091#1">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                        <div class="col-md-7">
                                <font size="4%">ISO Informations (CERT Dates Should be Filled here)</font>
                        </div>
                        <div class="col-md-4">
                            <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><span class="badge bg-primary" style="margin-top:6px;">Add certification</span></a>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        if(count($res['cert_list'])>0)
                        {$i=1;
                            foreach($res['cert_list'] as $cert)
                            {  ?>

                                <h6 class="text-danger text-uppercase"><span>Certificate applied for <?php echo $cert['AppliedFor']; ?></span></h6>
                                <input type="hidden" name="cert_id[]" id="cert_id<?php echo $i; ?>" value="<?php echo $cert['AppliedFor']; ?>" class="form-control">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label><?php  echo $field['1.3.2']['label_text']; ?><span class="text-danger">*</span></label>
                                            <input type="text" name="cert_number_v[]" id="cert_number_v<?php echo $i; ?>" value="<?php echo $cert['CertificateNumber']; ?>" class="form-control" placeholder="<?php  echo $field['1.3.2']['place_holder']; ?>" <?php echo $field['1.3.2']['is_required']; ?>>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="mb-3">
                                           <label>Applied for</label>
                                            <input type="text" name="applied_for_v[]" id="applied_for_v" value="<?php echo $cert['cert_type']; ?>" class="form-control">
                                        </div>
                                    </div> -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                             <label><?php  echo $field['1.3.4']['label_text']; ?><span class="text-danger">*</span></label>
                                            <input type="text" name="assist_cert_v[]" id="assist_cert_v<?php echo $i; ?>" value="<?php echo $cert['CertificateNumber']; ?>" class="form-control" placeholder="<?php  echo $field['1.3.4']['place_holder']; ?>" <?php echo $field['1.3.4']['is_required']; ?>>
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="mb-3">
                                            <label><?php  echo $field['1.3.5']['label_text']; ?><span class="text-danger">*</span></label>
                                            <select class="form-select" name="cert_status_v[]" id="cert_status_v<?php echo $i; ?>" <?php echo $field['1.3.5']['is_required']; ?>>
                                                <option <?php if($cert['Status']=='Pending'){ echo "selected"; } ?> value="Pending">Pending</option>
                                                <option <?php if($cert['Status']=='Inprogress'){ echo "selected"; } ?> value="Inprogress">Inprogress</option>
                                                <option <?php if($cert['Status']=='Certified'){ echo "selected"; } ?> value="Certified">Certified</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                           <label><?php  echo $field['1.3.6']['label_text']; ?><span class="text-danger">*</span></label>
                                            <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                                <input type="text" class="form-control" name="cert_start_v[]" id="cert_start_v<?php echo $i; ?>" placeholder="Start Date" value="<?php echo $cert['CertifiedDate']; ?>" <?php echo $field['1.3.6']['is_required']; ?> onchange="changedate(this.id);">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3"><br>
                                            <div class="input-group" style="margin-top: 8px;">
                                                <input type="text" class="form-control" name="cert_end_v[]" id="cert_end_v<?php echo $i; ?>" placeholder="End Date" value="<?php echo $cert['ExpiredDate']; ?>" <?php echo $field['1.3.6']['is_required']; ?> readonly>
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                             <label><?php  echo $field['1.3.7']['label_text']; ?></label>
                                             <div class="input-group" id="datepicker1">
                                                <input type="text" class="form-control" name="cert_renewal_v[]" id="cert_renewal_v<?php echo $i; ?>" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-date-container="#datepicker1" data-provide="datepicker" value="<?php echo $cert['RenewalDate']; ?>">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label><?php  echo $field['1.3.8']['label_text']; ?></label>
                                            <input type="text" name="cert_personalinfo_v[]" id="cert_personalinfo_v<?php echo $i; ?>" value="<?php echo $cert['Comments']; ?>" class="form-control" placeholder="<?php  echo $field['1.3.8']['place_holder']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                              <!--   <div class="row">
                                    
                                </div> -->

                            <?php $i++; }
                        }
                        else
                        { ?>
                            <h5><font color="red">ISO certification not available</font></h5>
                        <?php } ?>
                    </div>
                    <div class="col-xl-12">
                         <!-- sample modal content -->
                        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background: #404e67;color: #fff;">
                                        <h5 class="modal-title" id="myLargeModalLabel" style="color:white;">Add Certification</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="individual_id" name="individual_id" value="<?php echo $IndividualId; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><?php  echo $field['1.3.2']['label_text']; ?><span class="text-danger">*</span></label>
                                                <input type="text" name="cert_no" id="cert_no" value="" class="form-control" placeholder="<?php  echo $field['1.3.1']['place_holder']; ?>" <?php echo $field['1.3.2']['is_required']; ?>>
                                            </div>
                                            <div class="col-md-6">
                                                <label><?php  echo $field['1.3.3']['label_text']; ?><span class="text-danger">*</span></label>
                                                <select class="form-select" name="cert_applied_for" id="cert_applied_for" <?php echo $field['1.3.3']['is_required']; ?> onchange="getcertappl()">
                                                    <option value="select">--Select--</option>
                                                    <option value="2">SA</option>
                                                    <option value="1">MDQM(I)</option>
                                                    <option value="3">QMDP</option>
                                                    <option value="4">DSP</option>
                                                    <option value="5">Quality Master Date</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><?php  echo $field['1.3.4']['label_text']; ?><span class="text-danger">*</span></label>
                                                <input type="text" name="assist_certify" id="assist_certify" value="" class="form-control" placeholder="<?php  echo $field['1.3.3']['place_holder']; ?>" <?php echo $field['1.3.4']['is_required']; ?>>
                                            </div>
                                            <div class="col-md-6">
                                                <label><?php  echo $field['1.3.5']['label_text']; ?><span class="text-danger">*</span></label>
                                                <select class="form-select" name="cert_status" id="cert_status" <?php echo $field['1.3.5']['is_required']; ?>>
                                                    <option value="">--Select--</option>
                                                    <option value="Certified">Certified</option>
                                                    <option value="Inprogress">Inprogress</option>
                                                    <option value="Pending">Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label><?php  echo $field['1.3.6']['label_text']; ?><span class="text-danger">*</span></label>
                                                <div class="input-daterange input-group" id="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker">
                                                    <input type="text" class="form-control" name="cert_start" id="cert_start" placeholder="Start Date" <?php echo $field['1.3.6']['is_required']; ?>>
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3"><br>
                                                <div class="input-group" style="margin-top: 8px;">
                                                    <input type="text" class="form-control" name="cert_end" id="cert_end" placeholder="End Date" <?php echo $field['1.3.6']['is_required']; ?> readonly>
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label><?php  echo $field['1.3.7']['label_text']; ?></label>
                                                <div class="input-group" id="datepicker2">
                                                    <input type="text" class="form-control" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-date-container='#datepicker2' data-provide="datepicker" data-date-autoclose="true" name="cert_renewal" id="cert_renewal">

                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div><!-- input-group -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><?php  echo $field['1.3.8']['label_text']; ?></label>
                                                <textarea name="personal_info" id="personal_info" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal" onclick="save()">Save</button>
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <input type="hidden" name="save_modal" id="save_modal" value="">
                                <button  type="submit" style="background: #404e67;color: #fff;" name="update_org" id="update_org" class="btn btn-lg waves-effect waves-lightl" >UPDATE</button>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>

</div>

<!-- end page title -->

</div>
 <!-- jquery step -->
 <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $("#city").select2();
        $("#state").select2();
        $("#country").select2();

        var exist_coun=document.getElementById("country").value;
        if(exist_coun=='SELECT')
        {
            var input = document.querySelector("#tel_number");
            window.intlTelInput(input, {
                separateDialCode: true,
                // excludeCountries: ["in", "il"],
                // preferredCountries: ["ru", "jp", "pk", "no"]
                preferredCountries: ["us"]
            });
        }
        else
        {
            var code=exist_coun.split("-");
            var code_str=code[1];
            // alert(code_str);
            var input = document.querySelector("#tel_number");
                window.intlTelInput(input, {
                    separateDialCode: true,
                    // excludeCountries: ["in", "il"],
                    // preferredCountries: ["ru", "jp", "pk", "no"]
                    initialCountry: code_str
                });
        }
        


    // function add_telephone()
    // {
    //     var fieldHTML = "";
    //     var tele_length = $('input[name="country_code[]"]').length;
    //     // alert(tele_length);
    //     if(tele_length<=2)
    //     {
    //         for(var i=tele_length;i<=tele_length;i++)
    //         {
    //             var inc = i+1;
    //             fieldHTML='<div class="add_tel'+inc+'"><div class="row" id="telephone_row"><div class="col-md-4"><label>Country code</label><input type="text" name="country_code[]" id="country_code'+inc+'" value="" class="form-control"></div><div class="col-md-4"><label>Area code</label><input type="text" name="area_code[]" id="area_code'+inc+'" value="" class="form-control"></div><div class="col-md-4"><label>Number</label><input type="text" name="tel_number[]" id="tel_number'+inc+'" value="" class="form-control"></div></div><div class="row"><div class="col-md-4"><label>Extension</label><input type="text" name="extension[]" id="extension'+inc+'" value="" class="form-control"></div><div class="col-md-4"><label>Type code</label><select class="form-select" id="type_code_telephone'+inc+'" name="type_code_telephone[]"><option value="POTS" >POTS</option><option value="ISDN" >ISDN</option><option value="VOIP" >VOIP</option><option value="Mobile" >Mobile</option><option value="Fax-Line" >Fax-Line</option></select></div><div class="col-md-2"><label>Use code</label><select class="form-select" id="tel_usecode'+inc+'" name="tel_usecode[]"><option value="Home">Home</option><option value="Office">Office</option><option value="Personal">Personal</option></select></div><div class="col-md-2"><br><button class="btn waves-effect waves-light btn-danger" name="remove_tel" id="remove_tel" onclick="return remove_telephone('+inc+')"><i class="fas fa-minus-circle"></i></button></div></div></div>';
    //         }
    //         $('#add_telephone').append(fieldHTML); 
    //     }
    //     else
    //     {
    //         alert("only 3 telephone numbers are allowed");
    //     }
    // }

    // function remove_telephone(val)
    // {
    //     // alert(val);
    //     $(".add_tel"+val).remove();
    // }

     $("#start").on("change", function(e) { 
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var d = $("#start").datepicker("getDate");
            var year = d.getFullYear();
            var month = d.getMonth();
            var day = d.getDate();
            // var c = new Date(year + 1, month, day)
            // var datestring = (d.getDate()-1)  + " " +  monthNames[d.getMonth()] + "," + (d.getFullYear()+1) ;
             if(day=='1' && (monthNames[d.getMonth()]=='Jan' || monthNames[d.getMonth()]=='Feb' || monthNames[d.getMonth()]=='Apr' || monthNames[d.getMonth()]=='Jun' || monthNames[d.getMonth()]=='Aug' || monthNames[d.getMonth()]=='Sep' || monthNames[d.getMonth()]=='Nov'))
            {
                var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "31";
            }
            else if(day=='1' && (monthNames[d.getMonth()]=='Mar'))
            {
                if((d.getFullYear()+1)%4==0)
                {
                    var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "29";
                }
                else
                {
                    var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "28";
                }
                
            }
            else if(day=='1' && (monthNames[d.getMonth()]=='May' || monthNames[d.getMonth()]=='Jul' || monthNames[d.getMonth()]=='Oct' || monthNames[d.getMonth()]=='Dec'))
            {
                var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "30";
            }
            else
            {
                var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth()+1)) + "-" + (((d.getDate()-1)<10?'0':'')+(d.getDate()-1));
            }            
            $("#end").val(datestring);
        });

        $("#cert_start").on("change", function(e) { 
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var d = $("#cert_start").datepicker("getDate");
            var year = d.getFullYear();
            var month = d.getMonth();
            var day = d.getDate();
             
            var appl_for=$("#cert_applied_for").val();
            if(appl_for=='1')
            {
                if(day=='1' && (monthNames[d.getMonth()]=='Jan' || monthNames[d.getMonth()]=='Feb' || monthNames[d.getMonth()]=='Apr' || monthNames[d.getMonth()]=='Jun' || monthNames[d.getMonth()]=='Aug' || monthNames[d.getMonth()]=='Sep' || monthNames[d.getMonth()]=='Nov'))
                {
                    var datestring = (d.getFullYear()+2) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "31";
                }
                else if(day=='1' && (monthNames[d.getMonth()]=='Mar'))
                {
                    if((d.getFullYear()+2)%4==0)
                    {
                        var datestring = (d.getFullYear()+2) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "29";
                    }
                    else
                    {
                        var datestring = (d.getFullYear()+2) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "28";
                    }
                    
                }
                else if(day=='1' && (monthNames[d.getMonth()]=='May' || monthNames[d.getMonth()]=='Jul' || monthNames[d.getMonth()]=='Oct' || monthNames[d.getMonth()]=='Dec'))
                {
                    var datestring = (d.getFullYear()+2) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "30";
                }
                else
                {
                    var datestring = (d.getFullYear()+2) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth()+1)) + "-" + (((d.getDate()-1)<10?'0':'')+(d.getDate()-1));
                }           
            }
            else
            {
                if(day=='1' && (monthNames[d.getMonth()]=='Jan' || monthNames[d.getMonth()]=='Feb' || monthNames[d.getMonth()]=='Apr' || monthNames[d.getMonth()]=='Jun' || monthNames[d.getMonth()]=='Aug' || monthNames[d.getMonth()]=='Sep' || monthNames[d.getMonth()]=='Nov'))
                {
                    var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "31";
                }
                else if(day=='1' && (monthNames[d.getMonth()]=='Mar'))
                {
                    if((d.getFullYear()+1)%4==0)
                    {
                        var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "29";
                    }
                    else
                    {
                        var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "28";
                    }
                }
                else if(day=='1' && (monthNames[d.getMonth()]=='May' || monthNames[d.getMonth()]=='Jul' || monthNames[d.getMonth()]=='Oct' || monthNames[d.getMonth()]=='Dec'))
                {
                    var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "30";
                }
                else
                {
                    var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth()+1)) + "-" + (((d.getDate()-1)<10?'0':'')+(d.getDate()-1));
                }           
            }
            
            // var c = new Date(year + 1, month, day)
            // var datestring = (d1.getDate()-1)  + " " +  monthNames[d1.getMonth()] + "," + (d1.getFullYear()+1) ;
            
            $("#cert_end").val(datestring);
        });

        function changedate(clickedid)
        { 
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var d2=clickedid.split("cert_start_v");
            var d=$("#cert_start_v"+d2[1]).datepicker("getDate");
            var year = d.getFullYear();
            var month = d.getMonth();
            var day = d.getDate();
            var appl_for=$("#cert_id"+d2[1]).val();
            if(appl_for=='1')
            {
                if(day=='1' && (monthNames[d.getMonth()]=='Jan' || monthNames[d.getMonth()]=='Feb' || monthNames[d.getMonth()]=='Apr' || monthNames[d.getMonth()]=='Jun' || monthNames[d.getMonth()]=='Aug' || monthNames[d.getMonth()]=='Sep' || monthNames[d.getMonth()]=='Nov'))
                {
                    var datestring = (d.getFullYear()+2) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "31";
                }
                else if(day=='1' && (monthNames[d.getMonth()]=='Mar'))
                {
                    if((d.getFullYear()+2)%4==0)
                    {
                        var datestring = (d.getFullYear()+2) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "29";
                    }
                    else
                    {
                        var datestring = (d.getFullYear()+2) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "28";
                    }
                    
                }
                else if(day=='1' && (monthNames[d.getMonth()]=='May' || monthNames[d.getMonth()]=='Jul' || monthNames[d.getMonth()]=='Oct' || monthNames[d.getMonth()]=='Dec'))
                {
                    var datestring = (d.getFullYear()+2) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "30";
                }
                else
                {
                    var datestring = (d.getFullYear()+2) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth()+1)) + "-" + (((d.getDate()-1)<10?'0':'')+(d.getDate()-1));
                }           
            }
            else
            {
                if(day=='1' && (monthNames[d.getMonth()]=='Jan' || monthNames[d.getMonth()]=='Feb' || monthNames[d.getMonth()]=='Apr' || monthNames[d.getMonth()]=='Jun' || monthNames[d.getMonth()]=='Aug' || monthNames[d.getMonth()]=='Sep' || monthNames[d.getMonth()]=='Nov'))
                {
                    var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "31";
                }
                else if(day=='1' && (monthNames[d.getMonth()]=='Mar'))
                {
                    if((d.getFullYear()+1)%4==0)
                    {
                        var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "29";
                    }
                    else
                    {
                        var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "28";
                    }
                }
                else if(day=='1' && (monthNames[d.getMonth()]=='May' || monthNames[d.getMonth()]=='Jul' || monthNames[d.getMonth()]=='Oct' || monthNames[d.getMonth()]=='Dec'))
                {
                    var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth())) + "-" + "30";
                }
                else
                {
                    var datestring = (d.getFullYear()+1) + "-" +  (((d.getMonth()+1)<10?'0':'')+(d.getMonth()+1)) + "-" + (((d.getDate()-1)<10?'0':'')+(d.getDate()-1));
                }           
            }
            // var datestring = (d3.getFullYear()+1) + "-" +  (d3.getMonth()+1) + "-" + (d3.getDate()-1);
            // alert(d2[1]);
            $("#cert_end_v"+d2[1]).val(datestring);
        }

    

    $("#country").on("change", function(e) { 
        // alert("country");
        var cou = $(this).find(':selected').attr('data-id');
        if(cou=='OTHER')
        {
            $("#other_country").show();
            $('#state').empty()
                .append('<option value="">Select State</option><option value="OTHER" data-id="OTHER">Other</option>');
            $('#city').empty()
                .append('<option value="">Select City</option><option value="OTHER" data-id="OTHER">Other</option>');
        }
        else
        {
            $("#other_country").hide();
            $.ajax({
            type:'post',
            url: '<?php echo base_url()?>Editorg/state_fun',
            data:'country_val='+cou,
            // dataType:'JSON',
            success:function(data){
              // alert(data);
              $('#state').html(data);
              $('#other_state').hide();
              $('#other_city').hide();
            }
            });

            $(".iti__flag-container").html("");
        
            var coun_code=document.getElementById('country').value;
            var code=coun_code.split("-");
            var code_str=code[1];
            // alert(code_str);
            if(coun_code=='SELECT')
            {
                // alert("no");
                var input = document.querySelector("#tel_number");
                window.intlTelInput(input, {
                    separateDialCode: true,
                    initialCountry:"us"
                    // excludeCountries: ["us", "gb"]
                    // preferredCountries: ["ru", "jp", "pk", "no"]
                });
            }
            else
            {
                // alert("s");
                if(code_str=='BV' || code_str=='TF' || code_str=='XM' || code_str=='XJ' || code_str=='VNN')
                {
                    var input = document.querySelector("#tel_number");
                    window.intlTelInput(input, {
                    separateDialCode: true,
                    // excludeCountries: ["us", "gb"]
                    initialCountry: "us"
                });
                }
                else
                {
                    var input = document.querySelector("#tel_number");
                    window.intlTelInput(input, {
                        separateDialCode: true,
                        initialCountry:code_str,
                        // excludeCountries: ["us", "gb"]
                    });
                }

                
            }
        }
        
    });

    $("#state").on("change", function(e) { 
        // alert("state");
        var state = $(this).find(':selected').attr('data-id');
        if(state=='OTHER')
        {
            $("#other_state").show();
            $('#city').empty()
                .append('<option value="">Select City</option><option value="OTHER" data-id="OTHER">Other</option>');
        }
        else
        {
            $("#other_state").hide();
            $.ajax({
                type:'post',
                url: '<?php echo base_url()?>Editorg/city_fun',
                data:'state_val='+state,
                // dataType:'JSON',
                success:function(data){
                  // alert(data);
                  $('#city').html(data);
                  $('#other_city').hide();
                }
                });
        }
        
    });

    $("#city").on("change", function(e) { 
        var oth=$(this).find(':selected').attr('data-id');
        if(oth=='OTHER')
        {
            $("#other_city").show();
            $('#city').empty()
                .append('<option value="OTHER" data-id="OTHER">Other</option>');
        }
        else
        {
            $("#other_city").hide();
        }
    });

    function getcertappl()
    {
        var appl=document.getElementById("cert_applied_for").value;
        if(appl=='1')
        {
            document.getElementById("cert_start").value='';
            document.getElementById("cert_end").value='';
        }
    }

    function save()
    {
        document.getElementById("save_modal").value="save";
    }
    </script>