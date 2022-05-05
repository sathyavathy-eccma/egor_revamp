<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// pre($get_org);
if(isset($get_org1))
{
    foreach($get_org1 as $res)
    {
        $ogid=$res['org_id'];
        $legal_name=$res['legal_name'];
    }
}


$field = get_form_fields(5);

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

.btn-close {
    opacity: 1.5;
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
            <h4 class="mb-sm-0 font-size-18">MEMBER-ADD</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <?php echo form_open('Addindiv/insertnew',array('class' => 'frm','name' => 'add_ind', 'id' => 'add_ind')); ?>
        <div class="card">
            <div class="card-body">
                <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px;">
                            <font size="4%">Profile</font>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.1']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <input type="text" name="user_name" id="user_name" value="" class="form-control <?php echo $field['1.1']['validation_class']; ?>" <?php echo $field['1.1']['is_required']; ?>>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.2']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.2']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <input type="text" name="password" id="password" value="" class="form-control <?php echo $field['1.2']['validation_class']; ?> <?php echo $field['1.2']['is_required']; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.3']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.3']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" value="" class="form-control <?php echo $field['1.3']['validation_class']; ?>" <?php echo $field['1.3']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-062674#1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.4']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.4']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <input type="text" name="first_name" id="first_name" value="" class="form-control <?php echo $field['1.4']['validation_class']; ?>" <?php echo $field['1.4']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-102137#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.5']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.5']['label_text']; ?></a></label>
                            <input type="text" name="last_name" id="last_name" value="" class="form-control <?php echo $field['1.5']['validation_class']; ?>">
                            <input type="hidden" name="temp_array[]" value="0161-1#02-102141#1">
                        </div>
                   </div>
                   <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.6']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.6']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <select class="form-select" id="gender" name="gender" <?php echo $field['1.6']['is_required']; ?>>
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Transgender">Transgender</option>
                            </select>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-061691#1">
                        </div>
                    </div>                   
                </div>
                <div class="row">
                     <div class="col-md-4">
                        <div class="mb-3">
                            <label><?php  echo $field['1.7']['label_text']; ?><span class="text-danger">*</span></label>
                            <select class="form-select" id="employee_status" name="employee_status" <?php echo $field['1.7']['is_required']; ?>>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-174093#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.8']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.8']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <select name="emp_role_code" id="emp_role_code" class="form-select" <?php echo $field['1.8']['is_required']; ?>>
                                <option value="Other" selected="">Other</option>
                                <option value="Board Member">Board Member</option>
                                <option value="Shareholder">Shareholder</option>
                                <option value="Administrative Point of Contact">Administrative Point of Contact</option>
                                <option value="Alternate Point of Contact">Alternate Point of Contact</option>
                            </select>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-486421#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.3.9']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.3.9']['label_text']; ?></a></label>
                            <?php if($this->session->userdata("level")<>'5'){ ?>
                            <select name="legal_name" id="legal_name" class="form-select" <?php echo $field['1.3.9']['is_required']; ?> readonly>
                                <option value="<?php echo $legal_name; ?>"><?php echo $legal_name; ?></option>
                            </select>
                            <input type="hidden" name="ogid" id="ogid" value="<?php echo $ogid; ?>">
                        <?php }else{ ?>
                            <select name="legal_name" id="legal_name" class="form-select" <?php echo $field['1.3.9']['is_required']; ?>>
                                <option>Select Legalname</option>
                                <?php foreach($get_org as $res){ ?>
                                    <option value="<?php echo $res['LegalName']; ?>" data-id="<?php echo $res['OrganizationId'];  ?>"><?php echo $res['LegalName']; ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="ogid" id="ogid" value="">
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                    <div class="col-md-3">
                            <font size="4%">Address</font>
                    </div>
                     <div class="col-md-1">
                            <font size="4%">Make it:</font>
                    </div>
                    <div class="col-md-2">
                            <input type="radio" class="form-check-input" name="addr_chk" id="addr_chk1" value="1" style="margin-top: 6px;">
                            <font size="4%">
                                    Public
                            </font>
                    </div>
                    <div class="col-md-2">
                            <input type="radio" class="form-check-input" name="addr_chk" id="addr_chk2" value="0" style="margin-top: 6px;">
                            <font size="4%">
                                    Private
                            </font>
                    </div>
                    <div class="col-md-3">
                        <input class="form-check-input" type="checkbox" id="addr_verify" name="addr_verify" value="address" style="margin-top: 6px;">
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
                            <input type="text" name="addr1" id="addr1" value="" class="form-control <?php echo $field['1.9']['validation_class']; ?>" <?php echo $field['1.9']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-159219#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.1.0']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.0']['label_text']; ?></a></label>
                            <input type="text" name="addr2" id="addr2" value="" class="form-control <?php echo $field['1.1.0']['validation_class']; ?>">
                            <input type="hidden" name="temp_array[]" value="0161-1#02-160683#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.1.3']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.3']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <select class="form-select" id="country" name="country" <?php echo $field['1.1.3']['is_required']; ?>>
                                <option value="">Select Country</option>
                                <?php $country_res = get_countries(); ?>
                                <?php foreach($country_res as $val){ ?>
                                <option value="<?php echo $val['country_name'].'-'.$val['sortname']; ?>" data-id="<?php echo $val['id']; ?>"><?php echo $val['country_name'].'-'.$val['sortname']; ?></option>
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
                            <select class="form-select" id="state" name="state" <?php echo $field['1.1.2']['is_required']; ?>>
                                <option value="">Select State</option>
                                    <option value="OTHER" data-id="OTHER">Other</option>
                                    <?php $state_res = get_states(); ?>
                                    <?php foreach($state_res as $val){ ?>
                                    <option value="<?php echo $val['state_name'] ?>" data-id="<?php echo $val['id']; ?>"><?php echo $val['state_name']; ?></option>
                                    <?php } ?>
                            </select>
                            <input type="text" class="form-control" id="other_state" value="" name="other_state" style="display:none">
                            <input type="hidden" name="temp_array[]" value="0161-1#02-153697#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.1.1']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.1']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <select class="form-select" id="city" name="city" <?php echo $field['1.1.1']['is_required']; ?>>
                                <option value="">Select City</option>
                                <option value="other">Other</option>
                                <?php foreach($res['city'] as $val){ ?>
                                <option value="<?php echo $val['City_name'] ?>"><?php echo $val['City_name']; ?></option>
                                <?php } ?>
                            </select>
                            <input type="text" class="form-control" id="other_city" value="" name="other_city" style="display:none">
                            <input type="hidden" name="temp_array[]" value="0161-1#02-102127#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.1.4']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.4']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <input type="text" name="zipcode" id="zipcode" value="" class="form-control <?php echo $field['1.1.4']['validation_class']; ?>" <?php echo $field['1.1.4']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-000029#1">
                        </div>
                    </div>
                </div>
                <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px;">
                    <div class="col-md-3">
                            <font size="4%">Telephone</font>
                    </div>
                    <div class="col-md-1">
                        <font size="4%">Make it:</font>
                    </div>
                    <div class="col-md-2">
                        <input type="radio" class="form-check-input" name="telephone_chk" id="telephone_chk1" value="1" style="margin-top: 6px;">
                        <font size="4%">
                                Public
                        </font>
                    </div>
                    <div class="col-md-2">
                        <input type="radio" class="form-check-input" name="telephone_chk" id="telephone_chk2" value="0" style="margin-top: 6px;">
                        <font size="4%">
                                Private
                        </font>
                    </div>
                    <div class="col-md-3">
                            <input class="form-check-input" type="checkbox" id="telephone_verify" name="telephone_verify" value="telephone" style="margin-top: 6px;">
                            <font size="4%">
                                Verified by Individual
                            </font>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php  echo $field['1.1.5']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.5']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <input type="text" name="tel_country_code" id="tel_country_code" value="" class="form-control <?php echo $field['1.1.5']['validation_class']; ?>" <?php echo $field['1.1.5']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-090183#1">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.1.6']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.6']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <input type="text" name="telephone_num" id="telephone_num" value="" class="form-control <?php echo $field['1.1.6']['validation_class']; ?>" style="width: 375px;" <?php echo $field['1.1.6']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-000077#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.1.7']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.7']['label_text']; ?></a></label>
                            <input type="text" name="fax" id="fax" value="" class="form-control <?php echo $field['1.1.7']['validation_class']; ?>">
                            <input type="hidden" name="temp_array[]" value="0161-1#02-103658#1">

                        </div>
                    </div> 
                </div>
                <div class="row">
                    <!-- <div class="col-md-4">
                        <div class="mb-3">
                            <label>Extension</label>
                            <input type="text" name="extension" id="extension" value="" class="form-control">
                        </div>
                    </div> -->
                    <!-- <div class="col-md-4">
                        <div class="mb-3">
                            <label>Type code</label>
                            <select class="form-select" id="type_code" name="type_code">
                                <option value="POTS" >POTS</option>
                                <option value="ISDN" >ISDN</option>
                                <option value="VOIP" >VOIP</option>
                                <option value="Mobile" >Mobile</option>
                                <option value="Fax-Line" >Fax-Line</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Use code</label>
                            <select class="form-select" id="use_code" name="use_code">
                                <option value="Home">Home</option>
                                <option value="Office">Office</option>
                                <option value="Personal">Personal</option>
                           </select>
                       </div>
                    </div> -->
                    <!-- <div class="row">
                        <div id="add_telephone"></div>
                    </div> -->
                </div><!-- <button class="btn waves-effect waves-light btn-success" type="button" title="Add Telephone" onclick="add_telephone()"><i class="fas fa-plus-circle"></i></button><br> -->
                <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px;">
                    <div class="col-md-3">
                            <font size="4%">Email</font>
                    </div>
                    <div class="col-md-1">
                        <font size="4%">Make it:</font>
                    </div>
                    <div class="col-md-2">
                        <input type="radio" class="form-check-input" name="email_chk" id="email_chk1" value="1" style="margin-top: 6px;">
                        <font size="4%">
                                Public
                        </font>
                    </div>
                    <div class="col-md-2">
                        <input type="radio" class="form-check-input" name="email_chk" id="email_chk2" value="0" style="margin-top: 6px;">
                        <font size="4%">
                                Private
                        </font>
                    </div>
                    <div class="col-md-3">
                            <input class="form-check-input" type="checkbox" id="email_verify" name="email_verify" value="email" style="margin-top: 6px;">
                            <font size="4%">
                                Verified by Individual
                            </font>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="col-sm-auto">
                                <label><a href="<?php echo $field['1.2.7']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.2.7']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <div class="input-group">
                                <input type="text" class="form-control <?php echo $field['1.2.7']['validation_class']; ?>" id="autoSizingInput" name="email" value="" <?php echo $field['1.2.7']['is_required']; ?>>
                                    <div class="input-group-text">@</div>
                                    <input type="text" class="form-control" id="autoSizingInputGroup" name="domain" value="">
                                    <input type="hidden" name="temp_array[]" value="0161-1#02-140061#1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="mb-3">
                            <label>Use code</label>
                            <select class="form-select" id="email_use_code" name="email_use_code">
                                <option value="Home">Home</option>
                                <option value="Office">Office</option>
                                <option value="Personal">Personal</option>
                            </select>
                        </div>
                    </div> -->
                </div>
              <!--  <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px;">
                    <div class="col-md-3">
                            <font size="4%">Individual Role In Organization</font>
                    </div>
               </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Role Code</label>
                            <select name="role_code" class="form-select" name="profile_usecode" id="role_code">
                                <option value="Others">Others</option>
                                <option value="Broad Member">Broad Member</option>
                                <option value="Shareholder">Shareholder</option>
                                <option value="Administrative Point of contact">Administrative Point of contact</option>
                                <option value="Alternate Point of Contact">Alternate Point of Contact</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Comment Text</label>
                            <input type="text" name="comment_text" id="comment_text" value="" class="form-control">
                        </div>
                    </div>
                </div>

               <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px;">
                    <div class="col-md-3">
                            <font size="4%">Organization Profile/Biography</font>
                    </div>
               </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Use Code</label>
                            <select name="logo_use_code" class="form-select" name="profile_usecode" id="profile_usecode">
                                <option value="Directory">Directory</option>
                                <option value="Proceedings">Proceedings</option>
                                <option value="Course materials">Course materials</option>
                                <option value="Promotional materials">Promotional materials</option>
                                <option value="Website">Website</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Description</label>
                            <input type="text" name="logo_url" id="logo_url" value="" class="form-control">
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
                                <select name="member_usertype" id="member_usertype" class="form-select" <?php echo $field['1.3.1']['is_required']; ?>>
                                    <option value="Member">Member</option>
                                    <option value="eGOR">eGOR</option>
                                    <option value="CERT">CERT</option>
                                    <option value="EPOCD">EPOCD</option>
                                    <option value="Data Validation">Data Validation</option>
                                    <option value="Non-Member">Non-Member</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.2.2']['label_text']; ?><span class="text-danger">*</span></label>
                                <select name="member_type" id="member_type" class="form-control" <?php echo $field['1.2.2']['is_required']; ?>>
                                    <option value="" selected="">Select</option>
                                    <option value="$500 Associate Membership" >$500 Associate Membership</option>
                                    <option value="$5,000 Full Membership" >$5,000 Full Membership</option>
                                    <option value="$50,000 Charter Membership">$50,000 Charter Membership</option>
                                </select>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-139990#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.2.0']['label_text']; ?><span class="text-danger">*</span></label>
                                <select name="member_status" id="member_status" class="form-control" <?php echo $field['1.2.0']['is_required']; ?>>
                                    <option value="">Select</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-174092#1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.1.8']['label_text']; ?><span class="text-danger">*</span></label>
                                <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                    <input type="text" class="form-control" name="start" id="start" placeholder="Start Date" value="" <?php echo $field['1.1.8']['is_required']; ?>>
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-174089#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3"><br>
                                <div class="input-group" style="margin-top: 8px;">
                                    <input type="text" class="form-control" name="end" id="end" placeholder="End Date" value="" readonly>
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    <input type="hidden" name="temp_array[]" value="0161-1#02-174090#1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><?php  echo $field['1.1.9']['label_text']; ?></label>
                                <div class="input-group" id="datepicker6">
                                    <input type="text" class="form-control" name="mem_renewal_date" id="mem_renewal_date" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-date-container="#datepicker6" data-provide="datepicker" value="">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    <input type="hidden" name="temp_array[]" value="0161-1#02-174091#1">
                                </div>
                            </div>
                        </div>
                    </div>
            
                <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px;">
                    <div class="col-md-7">
                            <font size="4%">ISO Informations (CERT Dates Should be Filled here)</font>
                    </div>
                    <div class="col-md-4">
                        <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><span class="badge bg-primary" style="margin-top:6px;">Add certification</span></a>
                    </div>
                </div> 
                <div class="row">
                    <h5><font color="red">ISO certification not available</font></h5>
                    <div class="col-xl-12">
                        <div id="result"></div>
                         <!-- sample modal content -->
                        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background: #404e67;color: #fff;">
                                        <h5 class="modal-title" id="myLargeModalLabel" style="color:white;">Add Certification</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><?php  echo $field['1.3.2']['label_text']; ?><span class="text-danger">*</span></label>
                                                <input type="text" name="cert_no" id="cert_no" value="" class="form-control <?php echo $field['1.3.2']['validation_class']; ?>" <?php echo $field['1.3.2']['is_required']; ?>>
                                            </div>
                                            <div class="col-md-6">
                                                <label><?php  echo $field['1.3.3']['label_text']; ?><span class="text-danger">*</span></label>
                                                <select class="form-select" name="cert_applied_for" id="cert_applied_for" <?php echo $field['1.3.3']['is_required']; ?> onchange="getcertappl()">
                                                    <option value="select">Select</option>
                                                    <option value="2">SA</option>
                                                    <option value="1">MDQM(I)</option>
                                                    <option value="3">QMDP</option>
                                                    <option value="4">DSP</option>
                                                    <option value="5">Quality Master Data</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><?php  echo $field['1.3.4']['label_text']; ?></label>
                                                <input type="text" name="assist_certify" id="assist_certify" value="" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label><?php  echo $field['1.3.5']['label_text']; ?><span class="text-danger">*</span></label>
                                                <select class="form-select" name="cert_status" id="cert_status" <?php echo $field['1.3.5']['is_required']; ?>>
                                                    <option value="">Select</option>
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
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <input type="hidden" name="save_modal" id="save_modal" value="">
                    <button  type="submit" class="btn btn-lg waves-effect waves-lightl" style="background: #404e67;color: #fff;" name="update_org" id="update_org">SUBMIT</button>
                </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
 <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $("#city").select2();
    $("#state").select2();
    $("#country").select2();
    $("#legal_name").select2();
    
    var exist_coun=document.getElementById("country").value;
        if(exist_coun=='Select Country')
        {
            var input = document.querySelector("#telephone_num");
            window.intlTelInput(input, {
                separateDialCode: true,
                // excludeCountries: ["in", "il"],
                // preferredCountries: ["ru", "jp", "pk", "no"]
                initialCountry: "us"
            });
        }
        else
        {
            var code=exist_coun.split("-");
            var code_str=code[1];
            // alert(code_str);
            var input = document.querySelector("#telephone_num");
                window.intlTelInput(input, {
                    separateDialCode: true,
                    // excludeCountries: ["in", "il"],
                    initialCountry: code_str
                });
        }

        $("#country").on("change", function(e) { 
            // alert(document.getElementById("country").value);
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
                url: '<?php echo base_url()?>Addindiv/state_fun',
                data:'country_val='+cou,
                // dataType:'JSON',
                success:function(data){
                  // alert(data);
                  $('#state').html(data);
                  $('#other_state').hide();
                  $('#other_city').hide();
                }
                });
            
            }
            
            $(".iti__flag-container").html("");

            var coun_code=document.getElementById('country').value;
            var code=coun_code.split("-");
            var code_str=code[1];
            // alert(code_str);
            if(coun_code=='SELECT')
            {
                // alert("no");
                var input = document.querySelector("#telephone_num");
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
                    var input = document.querySelector("#telephone_num");
                    window.intlTelInput(input, {
                    separateDialCode: true,
                    // excludeCountries: ["us", "gb"]
                    initialCountry: "us"
                });
                }
                else
                {
                    var input = document.querySelector("#telephone_num");
                    window.intlTelInput(input, {
                        separateDialCode: true,
                        initialCountry:code_str,
                        // excludeCountries: ["us", "gb"]
                    });
                }
            }
            
        });

        $("#state").on("change", function(e) { 
            // alert("state");
            // alert(document.getElementById("state").value);
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
                    url: '<?php echo base_url()?>Addindiv/city_fun',
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

        $("#start").on("change", function(e) { 
            // const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var d = $("#start").datepicker("getDate");
            var year = d.getFullYear();
            var month = d.getMonth();
            var day = d.getDate();
            // var c = new Date(year + 1, month, day)
            // var datestring = (d.getDate()-1)  + " " +  monthNames[d.getMonth()] + "," + (d.getFullYear()+1) ;
            var datestring = (d.getFullYear()+1) + "-" +  (d.getMonth()+1) + "-" + (d.getDate()-1);
            $("#end").val(datestring);
        });

        $("#cert_start").on("change", function(e) { 
            // const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var d1 = $("#cert_start").datepicker("getDate"); 
            var year = d1.getFullYear();
            var month = d1.getMonth();
            var day = d1.getDate();
            var appl_for=$("#cert_applied_for").val();
            if(appl_for=='1')
            {
                var datestring = (d1.getFullYear()+2) + "-" +  (d1.getMonth()+1) + "-" + (d1.getDate()-1);
            }
            else
            {
                var datestring = (d1.getFullYear()+1) + "-" +  (d1.getMonth()+1) + "-" + (d1.getDate()-1);
            }
            $("#cert_end").val(datestring);
        });


        $("#legal_name").on("change", function(e) { 
            var legalid=$(this).find(':selected').attr('data-id');
            document.getElementById("ogid").value=legalid;
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