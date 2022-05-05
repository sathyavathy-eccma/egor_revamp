<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$field = get_form_fields(3);

// echo "<pre>";
// print_r($field);
// exit;

// print_r($orginfo);

// exit;
// $field = get_countries();
// pre($field);exit;
foreach($orginfo as $res)
{
    
}

foreach($res['org_mas'] as $org)
{
        $OrganizationId= $org['OrganizationId'];
        $Legal_address_id= $org['AddressId'];
        $LegalName= $org['LegalName'];
        $ALEI=$org['ALEI'];
        $add_verify=$org['VisibleStatusAddress'];
        $tel_verify=$org['VisibleStatusTelephone'];
        $email_verify=$org['VisibleStatusEmail'];
}

foreach($res['org_val'] as $org)
{
    $Website=$org['Website'];
    $Organization_Profile_Biography=$org['Organization_Profile_Biography'];
    $Logo=$org['Logo'];
    $Legalname=$org['Legalname'];
    $Logourl=$org['Logourl'];
    $Description=$org['Description'];
    $poc_name=$org['poc_name'];
    $telephone_code=$org['telephone_code'];
    $telephone=$org['telephone'];
    $fax=$org['fax'];
    $NCAGE=$org['NCAGE'];
    if($org['poc_email']!='')
    {
        $email_split=explode("@",$org['poc_email']);
        $user=$email_split[0];
        $domain=$email_split[1];
    }
    else
    {
        $user='';
        $domain='';
    }
}

foreach($res['org_addr_val'] as $org)
{
    $add1=$org['add1'];
    $add2=$org['add2'];
    $city1=$org['city'];
    $state1=$org['state'];
    $country=$org['country'];
    $country_code=$org['country_code'];
    $zip_code=$org['zip_code'];
    // $visible_status=$org['visible_status'];
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
   

// }
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
<!-- Select2 CSS -->

<script type="text/javascript" src="<?php echo ASSET_URL; ?>js/formJS.js"></script>
<script type="text/javascript" src="<?php echo ASSET_URL; ?>js/validate1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid">
<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">ORGANIZATION-EDIT</h4>
            </div>
            <div><h6><?php echo $LegalName; ?></h6></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php echo form_open_multipart('Editorg/update',array('class' => 'frm','name' => 'edit_org', 'id' => 'edit_org','onsubmit' => "return validate1();")); ?>
            <input type="hidden" name="org_id" name="org_id" value="<?php echo $OrganizationId; ?>">

            <div class="card">
                <div class="card-body">
                    <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                        <div class="col-md-3">
                                <font size="4%">Profile</font>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.3.9']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.3.9']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <input type="text" name="legal_name" id="legal_name" value="<?php echo $LegalName; ?>" class="form-control <?php  echo $field['1.3.9']['validation_class']; ?>" <?php echo $field['1.3.9']['is_required']; ?>>
                                 <input type="hidden" name="temp_array[]" value="0161-1#02-159235#1">
                           </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.4.0']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.4.0']['label_text']; ?></a></label>
                                <input type="text" name="ncage" id="ncage" value="<?php echo $NCAGE; ?>" class="form-control <?php  echo $field['1.4.0']['validation_class']; ?>">
                                 <input type="hidden" name="temp_array[]" value="0161-1#02-160664#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.4.1']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.4.1']['label_text']; ?></a></label>
                                <input type="text" name="alei" id="alei" value="<?php echo $ALEI; ?>" class="form-control <?php  echo $field['1.4.1']['validation_class']; ?>">
                                 <input type="hidden" name="temp_array[]" value="0161-1#02-159234#1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.4.2']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.4.2']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <input type="text" name="url" id="url" value="<?php echo $Website; ?>" class="form-control <?php  echo $field['1.4.2']['validation_class']; ?>" <?php echo $field['1.4.2']['is_required']; ?>>
                                 <input type="hidden" name="temp_array[]" value="0161-1#02-107662#1">
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
                                        <input class="form-check-input" type="radio" name="addr_radio" id="addr_radio1" value="1" style="margin-top:6px;" <?php if($add_verify=='1'){ ?> checked <?php } ?>>
                                        <font size="4%">
                                                            Public
                                        </font>
                                </div>
                                <div class="col-md-2">
                                            <input class="form-check-input" type="radio" name="addr_radio" id="addr_radio2" value="0" style="margin-top:6px;" <?php if($add_verify=='0'){ ?> checked <?php } ?>>
                                            <font size="4%">
                                                                Private
                                            </font>
                                </div>
                                <div class="col-md-3">
                                        <input class="form-check-input" type="checkbox" id="addr_check" name="addr_check" value="addr_checked" style="margin-top:6px;">
                                        <font size="4%">
                                                            Verified by Organization
                                        </font>
                                </div>
                            </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.9']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.9']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <input type="text" name="addr1" id="addr1" value="<?php echo $add1; ?>" class="form-control <?php  echo $field['1.9']['validation_class']; ?>" required placeholder="<?php  echo $field['1.9']['place_holder']; ?>">
                                 <input type="hidden" name="temp_array[]" value="0161-1#02-159219#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.1.0']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.0']['label_text']; ?></a></label>
                                <input type="text" name="addr2" id="addr2" value="<?php echo $add2; ?>" class="form-control <?php  echo $field['1.1.0']['validation_class']; ?>">
                                 <input type="hidden" name="temp_array[]" value="0161-1#02-160683#1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.1.3']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.3']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <select class="form-select" id="country" name="country" <?php echo $field['1.1.3']['is_required']; ?>>
                                    <option value="">Select Country</option>
                                    <!-- <option value="OTHER" data-id="OTHER">OTHER</option> -->
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
                                <select class="form-select" id="state" name="state" <?php echo $field['1.1.2']['is_required']; ?>>
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
                                <select class="form-select" id="city" name="city" <?php echo $field['1.1.1']['is_required']; ?>>
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
                                <label><a href="<?php echo $field['1.1.4']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.4']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <input type="text" name="zipcode" id="zipcode" value="<?php echo $zip_code; ?>" class="form-control <?php  echo $field['1.1.4']['validation_class']; ?>" <?php echo $field['1.1.4']['is_required']; ?>>
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
                                <input class="form-check-input" type="radio" name="tel_radio" id="tel_radio1" value="1" style="margin-top:6px;" <?php if($tel_verify=='1'){ ?> checked <?php } ?>>
                                <font size="4%">
                                                    Public
                                </font>
                        </div>
                        <div class="col-md-2">
                                <input class="form-check-input" type="radio" name="tel_radio" id="tel_radio2" value="0" style="margin-top:6px;" <?php if($tel_verify=='0'){ ?> checked <?php } ?>>
                                <font size="4%">
                                                    Private
                                </font>
                        </div>
                        <div class="col-md-3">
                                <input class="form-check-input" type="checkbox" id="tel_check" name="tel_check" value="tel_checked" style="margin-top:6px;">
                                <font size="4%">
                                                    Verified by Organization
                                </font>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.1.5']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.5']['label_text']; ?></a></label>
                                <input type="text" name="tel_country_code" id="tel_country_code" value="<?php echo $telephone_code; ?>" class="form-control <?php  echo $field['1.1.5']['validation_class']; ?>">
                                 <input type="hidden" name="temp_array[]" value="0161-1#02-174097#1">
                            </div>
                        </div>
                       
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php  echo $field['1.1.6']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.6']['label_text']; ?></a></label>
                               <input type="text" name="telephone_num" id="telephone_num" value="<?php echo $telephone; ?>" class="form-control <?php  echo $field['1.1.6']['validation_class']; ?>" style="width: 375px;">
                            </div>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-000077#1">
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php  echo $field['1.1.7']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.7']['label_text']; ?></a></label>
                                <input type="text" name="fax" id="fax" value="<?php echo $fax; ?>" class="form-control <?php echo $field['1.1.7']['validation_class']; ?>">
                            </div>
                        </div> 
                    </div>
                    
                    <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                                <div class="col-md-3">
                                    
                                        <font size="4%">Email</font>
                                    
                                </div>
                                <div class="col-md-1">
                                    <font size="4%">Make it:</font>
                                </div>
                                <div class="col-md-2">
                                        <input class="form-check-input" type="radio" name="email_radio"  id="email_radio1" value="1" style="margin-top:6px;" <?php if($email_verify=='1'){ ?> checked <?php } ?>>
                                        <font size="4%">
                                                            Public
                                        </font>
                                </div>
                                <div class="col-md-2">
                                        <input class="form-check-input" type="radio" name="email_radio"  id="email_radio2" value="0" style="margin-top:6px;" <?php if($email_verify=='0'){ ?> checked <?php } ?>>
                                        <font size="4%">
                                                            Private
                                        </font>
                                </div>
                                <div class="col-md-3">
                                        <input class="form-check-input" type="checkbox" id="email_check" name="email_check" value="email_checked" style="margin-top:6px;">
                                        <font size="4%">
                                                            Verified by Organization
                                        </font>
                                </div>
                            </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="col-sm-auto">
                                    <label><a href="<?php  echo $field['1.2.7']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.2.7']['label_text']; ?></a><span class="text-danger">*</span></label>
                                    <div class="input-group">
                                    <input type="text" class="form-control checkspacealpha" id="email" name="email" value="<?php echo $user; ?>" <?php echo $field['1.2.7']['is_required']; ?>>
                                        <div class="input-group-text">@</div>
                                        <input type="text" class="form-control checkurl" id="domain" name="domain" value="<?php echo $domain; ?>" <?php echo $field['1.2.7']['is_required']; ?>>
                                         <input type="hidden" name="temp_array[]" value="0161-1#02-174096#1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="mb-3">
                                <label>Use code</label>
                                <select class="form-select" id="email_use_code" name="email_use_code">
                                    <option value="Home" <?php if($email_Use_code=='Home'){ echo "selected"; }  ?>>Home</option>
                                    <option value="Office" <?php if($email_Use_code=='Office'){ echo "selected"; }  ?>>Office</option>
                                    <option value="Personal" <?php if($email_Use_code=='Personal'){ echo "selected"; }  ?>>Personal</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                        <div class="col-md-3">
                            
                                <font size="4%">Logo</font>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.4.3']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.4.3']['label_text']; ?></a></label>
                                <select class="form-select" name="logo_usecode" id="logo_usecode">
                                    <option>Select</option>
                                    <option value="Website" <?php if($Logo=='Website'){ echo "selected"; } ?>>Website</option>
                                    <option value="Course materials" <?php if($Logo=='Course materials'){ echo "selected"; } ?>>Course materials</option>
                                    <option value="Course publicity materials" <?php if($Logo=='Course publicity materials'){ echo "selected"; } ?>>Course publicity materials</option>
                                    <option value="Newsletter" <?php if($Logo=='Newsletter'){ echo "selected"; } ?>>Newsletter</option>

                                </select>
                                 <input type="hidden" name="temp_array[]" value="0161-1#02-061933#1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3" id="up1">
                                <label><?php  echo $field['1.4.4']['label_text']; ?></label>
                                <?php if($Logo=='Website'){ ?>
                                <input type="text" name="logo_url" id="logo_url" value="<?php echo $Logourl; ?>" class="form-control <?php  echo $field['1.4.4']['validation_class']; ?>">
                                <?php } else { ?>
                                    <input type="file" name="upl_logo" id="upl_logo" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2"><br>
                            <a href="http://eotd.org/egor_revamp/assets/uploads/<?php echo $Logourl; ?>" target="_blank" title="Click to Download" download><i class="fas fa-arrow-alt-circle-down"></i></a>
                                <?php } ?>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-174095#1">
                            
                        </div>
                        <input type="hidden" name="chk_logodir" value="<?php echo $Logourl; ?>">
                    </div>
                    <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                        <div class="col-md-3">
                           
                                <font size="4%">Organization Profile/Biography</font>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label><a href="<?php echo $field['1.4.5']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.4.5']['label_text']; ?></a></label>
                                <select name="logo_use_code" class="form-select" id="logo_use_code">
                                    <option>Select</option>
                                    <option value="Directory" <?php if($Organization_Profile_Biography=='Directory'){ echo "selected"; } ?>>Directory</option>
                                    <option value="Proceedings" <?php if($Organization_Profile_Biography=='Proceedings'){ echo "selected"; } ?>>Proceedings</option>
                                    <option value="Course materials" <?php if($Organization_Profile_Biography=='Course materials'){ echo "selected"; } ?>>Course materials</option>
                                    <option value="Promotional materials" <?php if($Organization_Profile_Biography=='Promotional materials'){ echo "selected"; } ?>>Promotional materials</option>
                                    <option value="Website" <?php if($Organization_Profile_Biography=='Website'){ echo "selected"; } ?>>Website</option>

                                </select>
                                 <input type="hidden" name="temp_array[]" value="0161-1#02-174094#1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3" id="up2">
                                <label><?php  echo $field['1.4.6']['label_text']; ?></label>
                                <?php if($Organization_Profile_Biography=='Website'){ ?>
                               <input type="text" name="profile_url" id="profile_url" value="<?php echo $Description; ?>" class="form-control <?php  echo $field['1.4.6']['validation_class']; ?>">
                                <?php } else { ?>
                                    <input type="file" name="upl_org" id="upl_org" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2"><br>
                            <a href="http://eotd.org/egor_revamp/assets/uploads/<?php echo $Description; ?>" target="_blank" title="Click to Download " download><i class="fas fa-arrow-alt-circle-down"></i></a>
                                <?php } ?>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-107906#1">
                        </div>
                        <input type="hidden" name="chk_orgdir" value="<?php echo $Description; ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        <button  type="submit" style="background: #404e67;color: #fff;" name="update_org" id="update_org" class="btn btn-lg waves-effect waves-lightl">UPDATE</button>
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
                if(code_str=='BV' || code_str=='TF' || code_str=='XM' || code_str=='VNN' || code_str=='XJ')
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

        function validate1()
        {
            // if(document.getElementById("addr_check").checked)
            // {
            //     if(document.getElementById('addr_radio1').checked == false && document.getElementById('addr_radio2').checked == false) 
            //     {
            //         alert("Please select radio of address");   
            //         return false;
            //     }
            // }
            // if(document.getElementById("tel_check").checked)
            // {
            //     if(document.getElementById('tel_radio1').checked == false && document.getElementById('tel_radio2').checked == false) 
            //     {
            //         alert("Please select radio of telephone");  
            //         return false; 
            //     }
            // }
            // if(document.getElementById("email_check").checked)
            // {
            //     if(document.getElementById('email_radio1').checked == false && document.getElementById('email_radio2').checked == false) 
            //     {
            //         alert("Please select radio of email");   
            //         return false;
            //     }
            // }
        }

         $("#logo_usecode").on("change", function(e) { 
            var data=document.getElementById("logo_usecode").value;
            if(data!='Website')
            {
                $('#up1').empty()
                    .append('<label>LOGO URL</label><input type="file" name="upl_logo" id="upl_logo" value="" class="form-control">');
            }
            else
            {
                $('#up1').empty()
                    .append('<label>LOGO URL</label><input type="text" name="logo_url" id="logo_url" value="" class="form-control">');
            }
        });

        $("#logo_use_code").on("change", function(e) { 
            var data=document.getElementById("logo_use_code").value;
            if(data!='Website')
            {
                $('#up2').empty()
                    .append('<label>ORGANIZATION URL</label><input type="file" name="upl_org" id="upl_org" value="" class="form-control">');
            }
            else
            {
                $('#up2').empty()
                    .append('<label>ORGANIZATION URL</label><input type="text" name="profile_url" id="profile_url" value="" class="form-control">');
            }
        });
</script>
