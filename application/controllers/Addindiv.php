<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addindiv extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('session');
        $this->load->model('Addindiv_Model', 'addindiv', true);
        
    }

    public function index() 
    {
       
        if ($this->session->userdata('username'))
        {
            $data=array();
            if($this->session->userdata('level')=='5')
            {
                $data['get_org']=$this->addindiv->getdistorg();
            }
            else
            {
                $data['get_org1']=$this->addindiv->getog();
            }
            $this->layout->view('addindiv',$data);
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function insertnew()
    {
        $data=array();
        if(isset($_POST))
        {
            $max_indiv_id=$this->addindiv->getmax();
            foreach($max_indiv_id as $res)
            {
                $max_indiv_id = $res['indiv_id'];
                $addr_id=$res['addr_id'];
            }
            $org_id=$_POST['ogid'];
            $ind_mas_array['Username']=trim($_POST['user_name']);
            $ind_mas_array['Password']=trim($_POST['password']);
            $ind_mas_array['Level']='3';
            $ind_mas_array['IndividualId']=$max_indiv_id;
            $ind_mas_array['OrganizationId']=$org_id;
            $ind_mas_array['EmailAddress']=trim($_POST['email']).'@'.trim($_POST['domain']);
            $ind_mas_array['MemberType']=$_POST['member_type'];
            if($_POST['cert_applied_for']!='')
            {
                $ind_mas_array['CertificationType']=$_POST['cert_applied_for'];
            }
            else
            {
                $ind_mas_array['CertificationType']='';
            }
            $ind_mas_array['LegalName']=$_POST['legal_name'];
            $ind_mas_array['UserStatus']=$_POST['employee_status'];
            $ind_mas_array['CreatedDate']=date('Y-m-d H:i:s');
            $ind_mas_array['DeletedDate']='0000-00-00 00:00:00';
            $ind_mas_array['AddressID']=$addr_id;
            if(isset($_POST['addr_chk']))
            {
                $ind_mas_array['VisibleStatusAddress']=$_POST['addr_chk'];
            }
            else
            {
                $ind_mas_array['VisibleStatusAddress']='';
            }
            if(isset($_POST['telephone_chk']))
            {
                $ind_mas_array['VisibleStatusTelephone']=$_POST['telephone_chk'];
            }
            else
            {
                $ind_mas_array['VisibleStatusTelephone']='';
            }
            if(isset($_POST['email_chk']))
            {
                $ind_mas_array['VisibleStatusEmail']=$_POST['email_chk'];
            }
            else
            {
                $ind_mas_array['VisibleStatusEmail']='';
            }

            $insert_ind_master = $this->addindiv->insert('individual_master', $ind_mas_array);

            $ins_cert_array['CertificateNumber']=trim($_POST['cert_no']);
            $ins_cert_array['AppliedFor']=trim($_POST['cert_applied_for']);
            // $ins_cert_array['assist_cert']=trim($_POST['assist_certify']);
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
            else
            {
                $ins_cert_array['AppliedFor']="Quality Master Data";
            }
            $ins_cert_array['Status']=trim($_POST['cert_status']);
            $ins_cert_array['CertifiedDate']=trim($_POST['cert_start']);
            $ins_cert_array['ExpiredDate']=trim($_POST['cert_end']);
            $ins_cert_array['RenewalDate']=trim($_POST['cert_renewal']);
            $ins_cert_array['Comments']=trim($_POST['personal_info']);
            $ins_cert_array['IndividualId']=$max_indiv_id;
            $ins_cert_array['OrganizationId']=$org_id;
            $ins_cert_array['LegalName']=$_POST['legal_name'];
            $ins_cert_array['CreatedDate']=date('Y-m-d H:i:s');
            $ins_cert_array['DeletedDate']='0000-00-00 00:00:00';

            if($ins_cert_array['AppliedFor']!='select' && $_POST['save_modal']=="save")
            {
                // echo "test";
                $cert_insert=$this->addindiv->insert('iso',$ins_cert_array);
            }

            $add1=trim($_POST['addr1']);
            $add2=trim($_POST['addr2']);
            $country=substr($_POST['country'], 0, strpos($_POST['country'], "-"));
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
            $country_code=$_POST['tel_country_code'];



            $title=trim($_POST['title']);
            $firstname=trim($_POST['first_name']);
            $lastname=trim($_POST['last_name']);
            $gender=trim($_POST['gender']);
            $employee_status=trim($_POST['employee_status']);
            $emp_role_code=$_POST['emp_role_code'];
            $tel_number=$_POST['telephone_num'];
            $email=trim($_POST['email']).'@'.trim($_POST['domain']);
            $member_usertype=trim($_POST['member_usertype']);
            $member_type=trim($_POST['member_type']);
            $member_status=trim($_POST['member_status']);
            $start=trim($_POST['start']);
            $end=trim($_POST['end']);
            $mem_renewal_date=trim($_POST['mem_renewal_date']);
            $fax=$_POST['fax'];
           
            

            $individual_id=$max_indiv_id;
            $temp_arr=$_POST['temp_array'];
            // pre($tel_rad);
            // exit;
           
           
            foreach($temp_arr as $val)
            {
                if($val=='0161-1#02-102137#1')
                {
                    if($firstname!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'First Name','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$firstname,'Sequence'=>"1"));
                    }
                }
                elseif($val=='0161-1#02-102141#1')
                {
                    if($lastname!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Last Name','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$lastname,'Sequence'=>"2"));
                    }
                }
                elseif($val=='0161-1#02-062674#1')
                {
                    if($title!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Title','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$title,'Sequence'=>"3"));
                    }
                }
                elseif($val=='0161-1#02-061691#1')
                {
                    if($gender!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Gender','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$gender,'Sequence'=>"4"));
                    }
                }
                elseif($val=='0161-1#02-174087#1')
                {
                    if($emp_role_code!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Role Code','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$emp_role_code,'Sequence'=>"5"));
                    }
                }
                elseif($val=='0161-1#02-140061#1')
                {
                    if($email!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Email Address','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$email,'Sequence'=>"6"));
                    }
                }
                elseif($val=='0161-1#02-159219#1')
                {
                    if($add1!='')
                    {
                        $insert_ind_addr_mas = $this->addindiv->insert('address_master',  array('OrganizationId'=>$org_id,'IndividualId'=>$individual_id,'AddressID' => $addr_id,'DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s')));
                        $ind_addr_val = $this->addindiv->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Address Line One','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Value'=>$add1,'Sequence'=>"7"));
                    }
                }
                elseif($val=='0161-1#02-160683#1')
                {
                    if($add2!='')
                    {
                        $ind_addr_val = $this->addindiv->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Address Line Two','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Value'=>$add2,'Sequence'=>"8"));
                    }
                }
                elseif($val=='0161-1#02-102127#1')
                {
                    if($city!='')
                    {
                        $ind_addr_val = $this->addindiv->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'City','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Value'=>$city,'Sequence'=>"9"));
                    }
                }
                elseif($val=='0161-1#02-153697#1')
                {
                    if($state!='')
                    {
                        $ind_addr_val = $this->addindiv->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'State','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Value'=>$state,'Sequence'=>"10"));
                    }
                }
                elseif($val=='0161-1#02-091098#1')
                {
                    if($country!='')
                    {
                        $ind_addr_val = $this->addindiv->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Country','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Value'=>$country,'Sequence'=>"11"));
                    }
                }
                elseif($val=='0161-1#02-090183#1')
                {
                    if($country_code!='')
                    {
                        $ind_addr_val = $this->addindiv->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Country Code','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Value'=>$country_code,'Sequence'=>"12"));
                    }
                }
                elseif($val=='0161-1#02-000029#1')
                {
                    if($zipcode!='')
                    {
                        $ind_addr_val = $this->addindiv->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Zip Code','CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00','Value'=>$zipcode,'Sequence'=>"13"));
                    }
                }
                // elseif($val=='0161-1#02-174088#1')
                // {
                //     if($addr_radio!='')
                //     {
                //         $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Visible Status','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Property_Type'=>'Address','Value'=>$addr_radio,'Sequence'=>"14"));
                //     }
                //     if($tel_radio!='')
                //     {
                //         // $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => '','Property'=>'Visible Status','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Property_Type'=>'ContactDetails','Value'=>$tel_radio));
                //     }
                //     if($email_rad!='')
                //     {
                //         // $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => '','Property'=>'Visible Status','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Property_Type'=>'Profile','Value'=>$email_rad));
                //     }
                // }
                elseif($val=='0161-1#02-000077#1')
                {
                    if($tel_number!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Telephone','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$tel_number,'Sequence'=>"15"));
                    }
                }
                elseif($val=='0161-1#02-103658#1')
                {
                    if($fax!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Fax','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$fax,'Sequence'=>"16"));
                    }
                }
                elseif($val=='0161-1#02-174089#1')
                {
                    if($start!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Membership Start Date','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$start,'Sequence'=>"17"));
                    }
                }
                elseif($val=='0161-1#02-174090#1')
                {
                    if($end!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Membership End Date','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$end,'Sequence'=>"18"));
                    }
                }
                elseif($val=='0161-1#02-174091#1')
                {
                    if($mem_renewal_date!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Membership Renewal Date','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$mem_renewal_date,'Sequence'=>"19"));
                    }
                    // pre($insert_ind_val);
                }
                elseif($val=='0161-1#02-174092#1')
                {
                    if($member_status!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Membership Status','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$member_status,'Sequence'=>"20"));
                    }
                }
                elseif($val=='0161-1#02-174093#1')
                {
                    if($employee_status!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'User Status','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$employee_status,'Sequence'=>"21"));
                    }
                }
                elseif($val=='0161-1#02-139990#1')
                {
                    if($member_type!='')
                    {
                        $insert_ind_val = $this->addindiv->insert('individual_value', array('IndividualId' => $individual_id,'PropertyId' => $val,'Property'=>'Membership Type','CreatedDate'=>date('Y-m-d H:i:s'),'DateDeleted'=>'0000-00-00 00:00:00','Value'=>$member_type,'Sequence'=>"22"));
                    }
                }
            }
        // exit;
            redirect('editindiv/edit/'.base64_encode($individual_id));
        }
    }

    public function state_fun()
    {
        $state='';
        $country_val=$_POST['country_val'];
        // exit;
        $data['sel_state'] = $this->addindiv->get_list('states', array('country_id' => $country_val), '', '', '', 'id', 'asc');
        $arr=json_decode(json_encode($data), true);
        $state.="<select class='form-select' id='state' name='state' required>";
        $state.="<option>Select State</option>";
        $state.="<option value='OTHER' data-id='OTHER'>Other</option>";
            foreach($arr as $val1)
            {
                foreach($val1 as $val)
                {
                    $state.= "<option value='".$val['state_name']."' data-id=".$val['id'].">".$val['state_code'].' '.$val['state_name']."</option>";
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
        $data['sel_state'] = $this->addindiv->get_list('cities', array('state_id' => $state_val), '', '', '', 'id', 'asc');
        $arr=json_decode(json_encode($data), true);
        $city.="<select class='form-select' id='city' name='city' required>";
        $city.="<option>Select City</option>";
        $city.="<option value='OTHER' data-id='OTHER'>Other</option>";
            foreach($arr as $val1)
            {
                foreach($val1 as $val)
                {
                    $city.= "<option value='".$val['city_name']."' data-id=".$val['id'].">".$val['city_name']."</option>";
                }
            }
        $city.="</city>";
        echo $city;
        return $city;
    }
}
?>
