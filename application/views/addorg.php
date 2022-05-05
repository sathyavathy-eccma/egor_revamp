<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$field = get_form_fields(4);

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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/formJS.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate1.min.js"></script>
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   
<div class="container-fluid">
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">ORGANIZATION-ADD</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <?php //echo form_open('Addorg/insertnew',array('class' => 'frm','onsubmit' => "return validatee();")); ?>
        <?php echo form_open_multipart ('Addorg/insertnew',array('class' => 'frm','name' => 'add_org', 'id' => 'add_org','onsubmit' => "return validatee();")); ?>
        <div class="card">
            <div class="card-body">
            	<div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                            <font size="4%">Profile</font>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                           	<label><a href="<?php echo $field['1.3.9']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.3.9']['label_text']; ?></a><span class="text-danger">*</span></label>
                           	<input type="text" name="legal_name" id="legal_name" value="" class="form-control <?php  echo $field['1.3.9']['validation_class']; ?>" placeholder="<?php  echo $field['1.3.9']['place_holder']; ?>" <?php  echo $field['1.3.9']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-159235#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.4.0']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.4.0']['label_text']; ?></a></label>
                            <input type="text" name="ncage" id="ncage" value="" class="form-control <?php  echo $field['1.4.0']['validation_class']; ?>" placeholder="<?php  echo $field['1.4.0']['place_holder']; ?>" <?php  echo $field['1.4.0']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-160664#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                           	<label><a href="<?php echo $field['1.4.2']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.4.2']['label_text']; ?></a><span class="text-danger">*</span></label>
                           	<input type="text" name="url" id="url" value="" class="form-control <?php  echo $field['1.4.2']['validation_class']; ?>" placeholder="<?php  echo $field['1.4.2']['place_holder']; ?>" <?php  echo $field['1.4.2']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-107662#1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.4.1']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.4.1']['label_text']; ?></a></label>
                            <input type="text" name="alei" id="alei" value="" class="form-control <?php  echo $field['1.4.1']['validation_class']; ?>" placeholder="<?php  echo $field['1.4.1']['place_holder']; ?>" <?php  echo $field['1.4.1']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-159234#1">
                        </div>
                    </div>
                </div>
            	<div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                    <div class="col-md-3">
                        
                            <font size="4%">Address</font>
                        
                    </div>
                    <div class="col-md-1">
                        <!-- <div class="mb-3"> -->
                            <font size="4%">Make it:</font>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-2">
                        <!-- <div class="mb-3"> -->
                            <input type="radio" class="form-check-input" name="addr_chk" id="addr_chk1" value="1" style="margin-top:6PX;">
                            <font size="4%">
                                    Public
                            </font>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-2">
                        <!-- <div class="mb-3"> -->
                            <input type="radio" class="form-check-input" name="addr_chk" id="addr_chk2" value="0" style="margin-top:6PX;">
                            <font size="4%">
                                    Private
                            </font>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-3">
                        <!-- <div class="mb-3"> -->
                                <input class="form-check-input" type="checkbox" id="addr_verify" name="addr_verify" style="margin-top:6PX;">
                                <font size="4%">
                                    Verified by Organization
                                </font>
                        <!-- </div> -->
                    </div>
                    <input type="hidden" name="temp_array[]" value="0161-1#02-174088#1">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                           	<label><a href="<?php echo $field['1.9']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.9']['label_text']; ?></a><span class="text-danger">*</span></label>
                           	<input type="text" name="addr1" id="addr1" value="" class="form-control <?php  echo $field['1.9']['validation_class']; ?>" placeholder="<?php  echo $field['1.9']['place_holder']; ?>" <?php  echo $field['1.9']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-159219#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                           	<label><a href="<?php echo $field['1.1.0']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.0']['label_text']; ?></a></label>
                           	<input type="text" name="addr2" id="addr2" value="" class="form-control <?php echo $field['1.1.0']['validation_class']; ?>" placeholder="<?php echo $field['1.1.0']['place_holder']; ?>" >
                            <input type="hidden" name="temp_array[]" value="0161-1#02-160683#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.1.3']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.3']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <select class="form-select <?php echo $field['1.1.3']['validation_class'] ?>" id="country" name="country" <?php  echo $field['1.1.3']['is_required']; ?>>
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
                           	<select class="form-select <?php echo $field['1.1.2']['validation_class'] ?>" id="state" name="state" <?php  echo $field['1.1.2']['is_required']; ?>>
                                <option value="">Select State</option>
                                    <option value="OTHER" data-id="OTHER">Other</option>
                                    <?php $state_res = get_states(); ?>
                                    <?php foreach($state_res as $val){ ?>
                                    <option value="<?php echo $val['state_name'] ?>" data-id="<?php echo $val['id']; ?>"><?php echo $val['state_name']; ?></option>
                                    <?php } ?>
                           	</select>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-153697#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.1.1']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.1']['label_text']; ?></a><span class="text-danger">*</span></label>
                            <select class="form-select <?php echo $field['1.1.1']['validation_class'] ?>" id="city" name="city" <?php  echo $field['1.1.1']['is_required']; ?>>
                                <option value="">Select City</option>
                                <option value="other">Other</option>
                                <?php foreach($res['city'] as $val){ ?>
                                <option value="<?php echo $val['City_name'] ?>"><?php echo $val['City_name']; ?></option>
                                <?php } ?>
                            </select>
                            
                            <input type="hidden" name="temp_array[]" value="0161-1#02-102127#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                           	<label><a href="<?php echo $field['1.1.4']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.4']['label_text']; ?></a><span class="text-danger">*</span></label>
                           	<input type="text" name="zipcode" id="zipcode" value="" class="form-control <?php echo $field['1.1.4']['validation_class']; ?>" placeholder="<?php echo $field['1.1.4']['place_holder']; ?>" <?php  echo $field['1.1.4']['is_required']; ?>>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-000029#1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <input type="text" class="form-control <?php echo $field['1.1.2']['validation_class']; ?>" id="other_state" value="" name="other_state" style="display:none">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <input type="text" class="form-control <?php echo $field['1.1.1']['validation_class']; ?>" id="other_city" value="" name="other_city" style="display:none">
                        </div>
                    </div>
                </div>
                <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                    <div class="col-md-3">
                        
                            <font size="4%">Telephone</font>
                        
                    </div>
                     <div class="col-md-1">
                        <font size="4%">
                        <!-- <div class="mb-3"> -->
                            Make it:
                        <!-- </div> -->
                    </font>
                    </div>
                    <div class="col-md-2">
                        <!-- <div class="mb-3"> -->
                            <input type="radio" class="form-check-input" name="telephone_chk" id="telephone_chk1" value="1" style="margin-top:6PX;">
                            <font size="4%">
                                    Public
                            </font>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-2">
                        <!-- <div class="mb-3"> -->
                            <input type="radio" class="form-check-input" name="telephone_chk" id="telephone_chk2" value="0" style="margin-top:6PX;">
                            <font size="4%">
                                    Private
                            </font>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-3">
                        <!-- <div class="mb-3"> -->
                                <input class="form-check-input" type="checkbox" id="telephone_verify" name="telephone_verify">
                                <font size="4%">
                                    Verified by Organization
                                </font>
                        <!-- </div> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                           	<label><a href="<?php echo $field['1.1.5']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.5']['label_text']; ?></a></label>
                           	<input type="text" name="tel_country_code" id="tel_country_code" value="" class="form-control <?php echo $field['1.1.5']['validation_class']; ?>" placeholder="<?php  echo $field['1.1.5']['place_holder']; ?>">
                            <input type="hidden" name="temp_array[]" value="0161-1#02-174097#1">
                        </div>
                    </div>
                   <!--  <div class="col-md-4">
                        <div class="mb-3">
                           	<label>Area code</label>
                           	<input type="text" name="area_code" id="area_code" value="" class="form-control">
                        </div>
                    </div> -->
                    <div class="col-md-4">
                        <div class="mb-3">
                           	<label><a href="<?php echo $field['1.1.6']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.6']['label_text']; ?></a></label>
                           <input type="text" name="telephone_num" id="telephone_num" value="" class="form-control <?php echo $field['1.1.6']['validation_class']; ?>" style="width: 375px;" placeholder="<?php  echo $field['1.1.6']['place_holder']; ?>">
                           <input type="hidden" name="temp_array[]" value="0161-1#02-000077#1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label><a href="<?php echo $field['1.1.7']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.1.7']['label_text']; ?></a></label>
                           <input type="text" name="fax" id="fax" value="" class="form-control <?php echo $field['1.1.7']['validation_class']; ?>" style="width: 375px;" placeholder="<?php  echo $field['1.1.7']['place_holder']; ?>">
                           <input type="hidden" name="temp_array[]" value="0161-1#02-103658#1">
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                           	<label>Extension</label>
                           	<input type="text" name="extension" id="extension" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
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
                    </div>
                </div> -->
                <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                    <div class="col-md-3">
                       
                            <font size="4%">Email</font>
                        
                    </div>
                     <div class="col-md-1">
                        <font size="4%">
                        <!-- <div class="mb-3"> -->
                            Make it:
                        <!-- </div> -->
                    </font>
                    </div>
                    <div class="col-md-2">
                        <!-- <div class="mb-3"> -->
                            <input type="radio" class="form-check-input" name="email_chk" id="email_chk1" value="1" style="margin-top:6PX;">
                            <font size="4%">
                                    Public
                            </font>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-2">
                        <!-- <div class="mb-3"> -->
                            <input type="radio" class="form-check-input" name="email_chk" id="email_chk2" value="0" style="margin-top:6PX;">
                            <font size="4%">
                                    Private
                            </font>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-3">
                        <!-- <div class="mb-3"> -->
                                <input class="form-check-input" type="checkbox" name="email_verify" id="email_verify" style="margin-top:6PX;">
                                <font size="4%">
                                    Verified by Organization
                                </font>
                        <!-- </div> -->
                    </div>
                </div>
                <div class="row">
                	<div class="col-md-6">
                        <div class="mb-3">
                    		<div class="col-sm-auto">
                                <label><a href="<?php  echo $field['1.2.7']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.2.7']['label_text']; ?></a><span class="text-danger">*</span></label>
                                <div class="input-group">
                                <input type="text" class="form-control" id="autoSizingInput" name="email" value="" <?php  echo $field['1.2.7']['is_required']; ?>>
                                    <div class="input-group-text">@</div>
                                    <input type="text" class="form-control" id="autoSizingInputGroup" name="domain" value="">
                                </div>
                                <input type="hidden" name="temp_array[]" value="0161-1#02-174096#1">
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
    							<option value="Website">Website</option>
    							<option value="Course materials">Course materials</option>
    							<option value="Course publicity materials">Course publicity materials</option>
    							<option value="Newsletter">Newsletter</option>

    						</select>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-061933#1">
                        </div>
                	</div>
                	<div class="col-md-6">
                        <div class="mb-3" id="up1">
                    		<label><?php  echo $field['1.4.4']['label_text']; ?></label>
    	                   	<input type="text" name="logo_url" id="logo_url" value="" class="form-control <?php  echo $field['1.4.4']['validation_class']; ?>" placeholder="<?php  echo $field['1.4.4']['place_holder']; ?>">
                        </div>
                        <input type="hidden" name="temp_array[]" value="0161-1#02-174095#1">
                	</div>
                </div>
                <div class="row mb-3" style="background: #404e67;color: #fff;border-radius: 9px">
                    <div class="col-md-6">
                        
                            <font size="4%">Organization Profile/Biography</font>
                        
                    </div>
                </div>
                <div class="row">
                	<div class="col-md-4">
                        <div class="mb-3">
                		  <label><a href="<?php echo $field['1.4.5']['dictionary_link']; ?>" target="_blank"><?php  echo $field['1.4.5']['label_text']; ?></a></label>
                    		<select class="form-select" name="profile_usecode" id="profile_usecode">
                                <option value="Website">Website</option>
    							<option value="Directory">Directory</option>
                                <option value="Proceedings">Proceedings</option>
    							<option value="Course materials">Course materials</option>
    							<option value="Promotional materials">Promotional materials</option>
    						</select>
                            <input type="hidden" name="temp_array[]" value="0161-1#02-174094#1">
                        </div>
                	</div>
                	<div class="col-md-6">
                        <div class="mb-3" id="up2">
                    		<label><?php  echo $field['1.4.6']['label_text']; ?></label>
    	                   	<input type="text" name="profile_url" id="profile_url" value="" class="form-control <?php  echo $field['1.4.6']['validation_class']; ?>" placeholder="<?php  echo $field['1.4.6']['place_holder']; ?>">
                        </div>
                        <input type="hidden" name="temp_array[]" value="0161-1#02-107906#1">
                	</div>
                </div>
                <div class="row">
                    <div class="col-md-4">
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
                url: '<?php echo base_url()?>Addorg/state_fun',
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
                    url: '<?php echo base_url()?>Addorg/city_fun',
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

        function validatee()
        {
            // if(document.getElementById("addr_verify").checked)
            // {
            //     if(document.getElementById('addr_chk1').checked == false && document.getElementById('addr_chk2').checked == false) 
            //     {
            //         alert("Please select radio of address");   
            //         return false;
            //     }
            // }
            // if(document.getElementById("telephone_verify").checked)
            // {
            //     if(document.getElementById('telephone_chk1').checked == false && document.getElementById('telephone_chk2').checked == false) 
            //     {
            //         alert("Please select radio of telephone");  
            //         return false; 
            //     }
            // }
            // if(document.getElementById("email_verify").checked)
            // {
            //     if(document.getElementById('email_chk1').checked == false && document.getElementById('email_chk2').checked == false) 
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

        $("#profile_usecode").on("change", function(e) { 
            var data=document.getElementById("profile_usecode").value;
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