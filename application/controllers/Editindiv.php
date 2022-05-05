<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Editindiv extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('session');
        $this->load->model('Editindiv_Model', 'edit_indiv', true);
    }

    public function edit($id=null)
    {
         $data = array();
        // $data1 =array();
        $data = base64_decode($id);
        $data1['Org_id'] = base64_decode($id);
        if ($this->session->userdata('username'))
        {
            $result['indivinfo']=$this->edit_indiv->Indinfo($id);
            // echo "<pre>";
            // print_r($result);
            // exit;
            $this->layout->view('edit',$result);
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function edit_individual()
    {
        // exit;
        $individual_id=$_POST['individual_id'];

        $getdata=$this->edit_indiv->getdata($individual_id);
        foreach($getdata as $res)
        {
            $legal_name=$res['legal_name'];
            $org_id=$res['org_id'];
            $CertificationType=$res['CertificationType'];
            $AddressID=$res['AddressID'];
        }

        $ind_mas_array['Username']=trim($_POST['username']);
        $ind_mas_array['Password']=trim($_POST['password']);
        $ind_mas_array['Level']='3';
        $ind_mas_array['IndividualId']=$individual_id;
        $ind_mas_array['OrganizationId']=$org_id;
        $ind_mas_array['EmailAddress']=trim($_POST['email_address_user']).'@'.trim($_POST['email_address_domain']);
        $ind_mas_array['LegalName']=$legal_name;
        $ind_mas_array['UserStatus']=$_POST['employee_status'];
        $ind_mas_array['CreatedDate']=date('Y-m-d H:i:s');
        $ind_mas_array['DeletedDate']='0000-00-00 00:00:00';
        $ind_mas_array['MemberType']=$_POST['member_type'];
        $ind_mas_array['AddressID']=$AddressID;

        if(isset($_POST['CertificationType']))
        {
            if($CertificationType=='')
            {
                $ind_mas_array['CertificationType']=$_POST['CertificationType'];
            }
            else
            {
                $ind_mas_array['CertificationType']=$CertificationType.','.$_POST['CertificationType'];
            }
        }

        if(isset($_POST['addr_radio']))
        {
            $ind_mas_array['VisibleStatusAddress']=$_POST['addr_radio'];
        }
        else
        {
            $ind_mas_array['VisibleStatusAddress']='';
        }
        if(isset($_POST['tel_rad']))
        {
            $ind_mas_array['VisibleStatusTelephone']=$_POST['tel_rad'];
        }
        else
        {
            $ind_mas_array['VisibleStatusTelephone']='';
        }
        if(isset($_POST['email_rad']))
        {
            $ind_mas_array['VisibleStatusEmail']=$_POST['email_rad'];
        }
        else
        {
            $ind_mas_array['VisibleStatusEmail']='';
        }

        $insert_ind_master = $this->edit_indiv->update('individual_master', $ind_mas_array,array('IndividualId' => $individual_id));

        $ins_cert_array['CertificateNumber']=$_POST['cert_no'];
        $ins_cert_array['AppliedFor']=$_POST['cert_applied_for'];
        if(isset($_POST['cert_applied_for']))
        {
            if($_POST['cert_applied_for']=="1")
            {
                $ins_cert_array['AppliedFor']="MDQM";
            }
            else if($_POST['cert_applied_for']=="2")
            {
                $ins_cert_array['AppliedFor']="SA";
            }
            else if($_POST['cert_applied_for']=="3")
            {
                $ins_cert_array['AppliedFor']="QMDP";
            }
            else if($_POST['cert_applied_for']=="4")
            {
                $ins_cert_array['AppliedFor']="DSP";
            }
            else if($_POST['cert_applied_for']=="5")
            {
                $ins_cert_array['AppliedFor']="Quality Master Data";
            }
        }
        
        $ins_cert_array['Status']=$_POST['cert_status'];
        $ins_cert_array['CertifiedDate']=$_POST['cert_start'];
        $ins_cert_array['ExpiredDate']=$_POST['cert_end'];
        $ins_cert_array['RenewalDate']=$_POST['cert_renewal'];
        $ins_cert_array['Comments']=trim($_POST['personal_info']);
        $ins_cert_array['IndividualId']=$_POST['individual_id'];
        $ins_cert_array['OrganizationId']=$org_id;
        $ins_cert_array['LegalName']=$legal_name;
        $ins_cert_array['CreatedDate']=date('Y-m-d H:i:s');
        $ins_cert_array['DeletedDate']='0000-00-00 00:00:00';
        
       
        if($ins_cert_array['AppliedFor']!='select' && $_POST['save_modal']=="save")
        {
            $cert_insert=$this->edit_indiv->insert('iso',$ins_cert_array);
        }

        $add1=trim($_POST['add1']);
        $add2=trim($_POST['add2']);
        $country=$_POST['country'];
        if($country=='OTHER')
        {
            $country='OTHER|'.$_POST['other_country'];
        }
        $state=$_POST['state'];
        if($state=='OTHER')
        {
            $state='OTHER|'.$_POST['other_state'];
        }
        $city=$_POST['city'];
        if($city=='OTHER')
        {
            $city='OTHER|'.$_POST['other_city'];
        }
        $zipcode=trim($_POST['zipcode']);
        $country_code=$_POST['country_code'];

        $title=trim($_POST['title']);
        $firstname=trim($_POST['firstname']);
        $lastname=trim($_POST['lastname']);
        $gender=$_POST['gender'];
        $employee_status=$_POST['employee_status'];
        $emp_role_code=trim($_POST['emp_role_code']);
        $tel_number=$_POST['tel_number'];
        $email=trim($_POST['email_address_user']).'@'.trim($_POST['email_address_domain']);
        $member_usertype=trim($_POST['member_usertype']);
        $member_type=trim($_POST['member_usertype']);
        $member_status=trim($_POST['member_status']);
        $start=trim($_POST['start']);
        $end=trim($_POST['end']);
        $mem_renewal_date=trim($_POST['mem_renewal_date']);      
        $fax=$_POST['fax'];  
        
        

        $cert_id=$_POST['cert_id'];
        $cert_update = count($cert_id);

        for($k=0;$k < $cert_update;$k++)
        {
            $cert_appl_for=$_POST['cert_id'][$k];
            $update_cert_array['CertificateNumber']=$_POST['cert_number_v'][$k];
            $update_cert_array['Status']=$_POST['cert_status_v'][$k];
            $update_cert_array['CertifiedDate']=$_POST['cert_start_v'][$k];
            $update_cert_array['ExpiredDate']=$_POST['cert_end_v'][$k];
            $update_cert_array['RenewalDate']=$_POST['cert_renewal_v'][$k];
            $update_cert_array['Comments']=$_POST['cert_personalinfo_v'][$k];
            $cert_update=$this->edit_indiv->update('iso',$update_cert_array,array('IndividualId' => $individual_id,'OrganizationId'=>$org_id,'AppliedFor'=>$cert_appl_for));
        }

        $exist_ind_data=$this->edit_indiv->get_list('individual_value', array(' IndividualId' => $individual_id));
        $arr=json_decode(json_encode($exist_ind_data), true);

        $exist_addr_data=$this->edit_indiv->get_list('address_value', array('AddressID' => $AddressID));
        $addr_arr=json_decode(json_encode($exist_addr_data), true);

        foreach($arr as $res)
        {
            // echo $res['PropertyId']."<br>";
            // echo $res['Value']."<br>";
            $arr1[]=$res['PropertyId'];
        }

        foreach($addr_arr as $res)
        {
            // echo $res['PropertyId']."<br>";
            // echo $res['Value']."<br>";
            $addr_arr1[]=$res['PropertyId'];
        }
       
        $temp_arr=$_POST['temp_array'];
        foreach($temp_arr as $val)
        {
            if($val=='0161-1#02-102137#1')
            {
                if($val=='0161-1#02-102137#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$firstname;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array,array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'First Name'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$firstname,'Property'=>'First Name','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"1"));
                }
            }
            elseif($val=='0161-1#02-102141#1')
            {
                if($val=='0161-1#02-102141#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$lastname;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Last Name'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$lastname,'Property'=>'Last Name','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"2"));
                }
            }
            elseif($val=='0161-1#02-062674#1')
            {
                if($val=='0161-1#02-062674#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$title;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Title'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$title,'Property'=>'Title','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"3"));
                }
            }
            elseif($val=='0161-1#02-061691#1')
            {
                if($val=='0161-1#02-061691#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$gender;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Gender'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$gender,'Property'=>'Gender','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"4"));
                }
            }
            elseif($val=='0161-1#02-174087#1')
            {
                if($val=='0161-1#02-174087#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$role_code;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Role Code'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$role_code,'Property'=>'Role Code','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"5"));
                }
            }
            elseif($val=='0161-1#02-140061#1')
            {
                if($val=='0161-1#02-140061#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$email;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array(' IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Email Address'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$email,'Property'=>'Email Address','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"6"));
                }
            }
            elseif($val=='0161-1#02-159219#1')
            {
                if($val=='0161-1#02-159219#1' && in_array($val, $addr_arr1))
                {
                    $val_array['Value']=$add1;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_addr_val = $this->edit_indiv->update('address_value',$val_array, array('AddressID' => $AddressID,'PropertyId' => $val,'Property'=>'Address Line One'));
                }
                else
                {
                    $ins_addr_val = $this->edit_indiv->insert('address_value', array('AddressID' => $AddressID,'PropertyId' => $val,'Value'=>$add1,'Property'=>'Address Line One','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Sequence'=>"7"));
                }
            }
            elseif($val=='0161-1#02-160683#1')
            {
                if($val=='0161-1#02-160683#1' && in_array($val, $addr_arr1))
                {
                    $val_array['Value']=$add2;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_addr_val = $this->edit_indiv->update('address_value',$val_array, array('AddressID' => $AddressID,'PropertyId' => $val,'Property'=>'Address Line Two'));
                }
                else
                {
                    $ins_addr_val = $this->edit_indiv->insert('address_value', array('AddressID' => $AddressID,'PropertyId' => $val,'Value'=>$add2,'Property'=>'Address Line Two','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Sequence'=>"8"));
                }
            }
            elseif($val=='0161-1#02-102127#1')
            {
                if($val=='0161-1#02-102127#1' && in_array($val, $addr_arr1))
                {
                    $val_array['Value']=$city;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_addr_val = $this->edit_indiv->update('address_value',$val_array, array('AddressID' => $AddressID,'PropertyId' => $val,'Property'=>'City'));
                }
                else
                {
                    $ins_addr_val = $this->edit_indiv->insert('address_value', array('AddressID' => $AddressID,'PropertyId' => $val,'Value'=>$city,'Property'=>'City','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Sequence'=>"9"));
                }
            }
            elseif($val=='0161-1#02-153697#1')
            {
                if($val=='0161-1#02-153697#1' && in_array($val, $addr_arr1))
                {
                    $val_array['Value']=$state;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_addr_val = $this->edit_indiv->update('address_value',$val_array, array('AddressID' => $AddressID,'PropertyId' => $val,'Property'=>'State'));
                }
                else
                {
                    $ins_addr_val = $this->edit_indiv->insert('address_value', array('AddressID' => $AddressID,'PropertyId' => $val,'Value'=>$state,'Property'=>'State','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Sequence'=>"10"));
                }
            }
            elseif($val=='0161-1#02-091098#1')
            {
                if($val=='0161-1#02-091098#1' && in_array($val, $addr_arr1))
                {
                    $val_array['Value']=$country;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_addr_val = $this->edit_indiv->update('address_value',$val_array, array('AddressID' => $AddressID,'PropertyId' => $val,'Property'=>'Country'));
                }
                else
                {
                    $ins_addr_val = $this->edit_indiv->insert('address_value', array('AddressID' => $AddressID,'PropertyId' => $val,'Value'=>$country,'Property'=>'Country','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Sequence'=>"11"));
                }
            }
            elseif($val=='0161-1#02-090183#1')
            {
                if($val=='0161-1#02-090183#1' && in_array($val, $addr_arr1))
                {
                    $val_array['Value']=$country_code;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_addr_val = $this->edit_indiv->update('address_value',$val_array, array('AddressID' => $AddressID,'PropertyId' => $val,'Property'=>'Country Code'));
                }
                else
                {
                    $ins_addr_val = $this->edit_indiv->insert('address_value', array('AddressID' => $AddressID,'PropertyId' => $val,'Value'=>$country_code,'Property'=>'Country Code','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Sequence'=>"12"));
                }
            }
            elseif($val=='0161-1#02-000029#1')
            {
                if($val=='0161-1#02-000029#1' && in_array($val, $addr_arr1))
                {
                    $val_array['Value']=$zipcode;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_addr_val = $this->edit_indiv->update('address_value',$val_array, array('AddressID' => $AddressID,'PropertyId' => $val,'Property'=>'Zip Code'));
                }
                else
                {
                    $ins_addr_val = $this->edit_indiv->insert('address_value', array('AddressID' => $AddressID,'PropertyId' => $val,'Value'=>$zipcode,'Property'=>'Zip Code','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Sequence'=>"13"));
                }
            }
            elseif($val=='0161-1#02-174088#1')
            {
                if($val=='0161-1#02-174088#1' && in_array($val, $arr1))
                {
                    // $update_ind_val = $this->edit_indiv->update('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>''));
                }
                else
                {
                    // $ins_addr_val = $this->edit_indiv->insert('address_value', array('AddressID' => $individual_id,'PropertyId' => $val,'Value'=>'','Property'=>'Visible Status','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"13"));
                }
                // $update_ind_val = $this->edit_indiv->update('individual_value', array('  IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$tel_radio));
                // $update_ind_val = $this->edit_indiv->update('individual_value', array('  IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$email_rad));
            }
            elseif($val=='0161-1#02-000077#1')
            {
                if($val=='0161-1#02-000077#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$tel_number;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Telephone'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$tel_number,'Property'=>'Telephone','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"15"));
                }
            }
            elseif($val=='0161-1#02-103658#1')
            {
                if($val=='0161-1#02-103658#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$fax;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Fax'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$fax,'Property'=>'Fax','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"16"));
                }
            }
            elseif($val=='0161-1#02-174089#1')
            {
                if($val=='0161-1#02-174089#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$start;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Membership Start Date'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$start,'Property'=>'Membership Start Date','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"17"));
                }
            }
            elseif($val=='0161-1#02-174090#1')
            {
                if($val=='0161-1#02-174090#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$end;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Membership End Date'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$end,'Property'=>'Membership End Date','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"18"));
                }
            }
            elseif($val=='0161-1#02-174091#1')
            {
                if($val=='0161-1#02-174091#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$mem_renewal_date;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Membership Renewal Date'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$mem_renewal_date,'Property'=>'Membership Renewal Date','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"19"));
                }
            }
            elseif($val=='0161-1#02-174092#1')
            {
                if($val=='0161-1#02-174092#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$member_status;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Membership Status'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$member_status,'Property'=>'Membership Status','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"20"));
                }
            }
            elseif($val=='0161-1#02-174093#1')
            {
                if($val=='0161-1#02-174093#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$employee_status;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'User Status'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$employee_status,'Property'=>'User Status','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"21"));
                }
            }
            elseif($val=='0161-1#02-139990#1')
            {
                if($val=='0161-1#02-139990#1' && in_array($val, $arr1))
                {
                    $val_array['Value']=$member_type;
                    $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                    $update_ind_val = $this->edit_indiv->update('individual_value',$val_array, array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Membership Type'));
                }
                else
                {
                    $ins_ind_val = $this->edit_indiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Value'=>$member_type,'Property'=>'Membership Type','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Sequence'=>"22"));
                }
            }
        }
        // exit;
        redirect('editindiv/edit/'.base64_encode($individual_id));
    }

     public function state_fun()
    {
        $state='';
        $country_val=$_POST['country_val'];
        // exit;
        $data['sel_state'] = $this->edit_indiv->get_list('states', array('country_id' => $country_val), '', '', '', 'id', 'asc');
        $arr=json_decode(json_encode($data), true);
        $state.="<select class='form-select' id='state' name='state'>";
        $state.="<option>Select State</option>";
        $state.="<option value='OTHER' data-id='OTHER'>Other</option>";
            foreach($arr as $val1)
            {
                foreach($val1 as $val)
                {
                    $state.= "<option value=".$val['state_name']." data-id=".$val['id'].">".$val['state_name']."</option>";
                }
            }
        $state.="</state>";
        echo $state;
        return $state;
    }

    public function city_fun()
    {
        $city='';
        $state_val=$_POST['state_val'];
        // exit;
        $data['sel_state'] = $this->edit_indiv->get_list('cities', array('state_id' => $state_val), '', '', '', 'id', 'asc');
        $arr=json_decode(json_encode($data), true);
        $city.="<select class='form-select' id='city' name='city'>";
        $city.="<option>Select City</option>";
        $city.="<option value='OTHER' data-id='OTHER'>Other</option>";
            foreach($arr as $val1)
            {
                foreach($val1 as $val)
                {
                    $city.= "<option value=".$val['city_name']." data-id=".$val['id'].">".$val['city_name']."</option>";
                }
            }
        $city.="</city>";
        echo $city;
        return $city;
    }
}