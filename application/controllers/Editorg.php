<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Editorg extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('session');
        $this->load->model('editorg_Model', 'editorg', true);
        
    }

    public function org($id=null) 
    {
        $data = array();
        // $data1 =array();
        $data = base64_decode($id);
        $data1['Org_id'] = base64_decode($id);
        if ($this->session->userdata('username'))
        {
            $result['orginfo']=$this->editorg->Orginfo($id);
            // echo "<pre>";
            // print_r($result);
            // exit;
            $this->layout->view('editorg',$result);
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function update()
    {
        $data=array();
        if(isset($_POST))
        {
            $org_id=$_POST['org_id'];
            $legal_name['LegalName']=trim($_POST['legal_name']);
            $NCAGE=$_POST['ncage'];
            $Alei=$_POST['alei'];
            $url=trim($_POST['url']);
            $addr1=trim($_POST['addr1']);
            $addr2=trim($_POST['addr2']);
            $country=substr($_POST['country'], 0, strpos($_POST['country'], "-"));
            if($country=='OTHER')
            {
                $country=$_POST['other_country'];
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
            $fax=$_POST['fax'];
            
            $poc_name='';
            $country_code='';
            

            $legal_name1=trim($_POST['legal_name']);
            $zipcode=trim($_POST['zipcode']);
            $tel_country_code=trim($_POST['tel_country_code']);
            $telephone_num=trim($_POST['telephone_num']);
            $email=trim($_POST['email']).'@'.trim($_POST['domain']);
            $logo_usecode=trim($_POST['logo_usecode']);
            if($logo_usecode!='Website')
            {
                if (!empty($_FILES["upl_logo"]["name"])) 
                {
                    if($chk_logodir=$_POST['chk_logodir'])
                    {
                        if(file_exists($chk_logodir))
                        {
                            unlink($_SERVER['DOCUMENT_ROOT']."/egor_revamp/assets/uploads/".$chk_logodir);
                        }
                    }
                    $logo_url=basename($_FILES["upl_logo"]["name"]);
                    $target_dir = $_SERVER['DOCUMENT_ROOT']."/egor_revamp/assets/uploads/".stripslashes(basename( $_FILES['upl_logo']['name']));
                    if (move_uploaded_file($_FILES["upl_logo"]["tmp_name"],$target_dir)) 
                    {
                        echo "The file ". basename( $_FILES["upl_logo"]["name"]). " has been uploaded.<br>";
                    }
                    else 
                    {
                        echo "Sorry, there was an error uploading your file.<br>";
                    }
                }
                else
                {
                    $logo_url=$_POST['chk_logodir'];
                }
            }
            else
            {
                $logo_url=$_POST['logo_url'];
            }

            $logo_use_code=$_POST['logo_use_code'];
            if($logo_use_code!='Website')
            {
                if (!empty($_FILES["upl_org"]["name"])) 
                {
                    if($chk_orgdir=$_POST['chk_orgdir'])
                    {
                        if(file_exists($chk_orgdir))
                        {
                            unlink($_SERVER['DOCUMENT_ROOT']."/egor_revamp/assets/uploads/".$chk_orgdir);
                        }
                    }
                    $profile_url=basename($_FILES["upl_org"]["name"]);
                    $target_dir = $_SERVER['DOCUMENT_ROOT']."/egor_revamp/assets/uploads/".stripslashes(basename( $_FILES['upl_org']['name']));
                    if (move_uploaded_file($_FILES["upl_org"]["tmp_name"],$target_dir)) 
                    {
                        echo "The file ". basename( $_FILES["upl_org"]["name"]). " has been uploaded.<br>";
                    }
                    else 
                    {
                        echo "Sorry, there was an error uploading your file.<br>";
                    }
                }
                else
                {
                    $profile_url=$_POST['chk_orgdir'];
                }
            }
            else
            {
                $profile_url=$_POST['profile_url'];
            }

            if(isset($_POST['addr_radio']))
            {
                $addr_visible_status=$_POST['addr_radio'];
            }
            else
            {
                $addr_visible_status='';
            }
            if(isset($_POST['tel_radio']))
            {
                $tel_visible_status=$_POST['tel_radio'];
            }
            else
            {
                $tel_visible_status='';
            }
            if(isset($_POST['email_radio']))
            {
                $email_visible_status=$_POST['email_radio'];
            }
            else
            {
                $email_visible_status='';
            }

            // $area_code=trim($_POST['area_code']);
            // $extension=trim($_POST['extension']);
            // $tel_type_code=trim($_POST['type_code']);
            // $email_use_code=trim($_POST['email_use_code']);
            // $profile_usecode=trim($_POST['profile_usecode']);
            // $tel_use_code=trim($_POST['use_code']);            
           
            

            $exist_org_data1=$this->editorg->get_list('organization_master', array('OrganizationID' => $org_id));
            $arr2=json_decode(json_encode($exist_org_data1), true);
            foreach($arr2 as $res1)
            {
                $addr_id=$res1['AddressId'];
            }

            $exist_org_data=$this->editorg->get_list('organization_value', array('OrganizationID' => $org_id));
            $arr=json_decode(json_encode($exist_org_data), true);

            $exist_addr_data=$this->editorg->get_list('address_value', array('AddressID' => $addr_id));
            $addr_arr=json_decode(json_encode($exist_addr_data), true);

            foreach($arr as $res)
            {
                $arr1[]=$res['PropertyId'];
            }

            foreach($addr_arr as $res)
            {
                $addr_arr1[]=$res['PropertyId'];
            }

            $temp_arr=$_POST['temp_array'];
            foreach($temp_arr as $val)
            {
                if($val=='0161-1#02-159234#1')
                {
                    if($val=='0161-1#02-159234#1' && $Alei!='')
                    {
                        $val_array1['ALEI']=$Alei;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_master',$val_array1 ,array('OrganizationId' => $org_id));
                    }
                    if($val=='0161-1#02-159234#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$Alei;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'ALEI'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'ALEI','Sequence'=>'23','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$Alei));
                    }
                }
                elseif($val=='0161-1#02-160664#1')
                {
                    if($val=='0161-1#02-160664#1' && $NCAGE!='')
                    {
                        $val_array1['NCAGE']=$NCAGE;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_master',$val_array1 , array('OrganizationId' => $org_id));
                    }
                    if($val=='0161-1#02-160664#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$NCAGE;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'NCAGE'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'NCAGE','Sequence'=>'24','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$NCAGE));
                    }
                }
                elseif($val=='0161-1#02-107662#1')
                {
                    if($val=='0161-1#02-107662#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$url;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Website'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Website','Sequence'=>'25','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$url));
                    }
                }
                elseif($val=='0161-1#02-174094#1')
                {
                    if($val=='0161-1#02-174094#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$logo_use_code;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Organization Profile Biography'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Organization Profile Biography','Sequence'=>'26','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$logo_use_code));
                    }
                }
                elseif($val=='0161-1#02-061933#1')
                {
                    if($val=='0161-1#02-061933#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$logo_usecode;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Logo'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Logo','Sequence'=>'27','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$logo_usecode));
                    }
                }
                elseif($val=='0161-1#02-159235#1')
                {
                    if($val=='0161-1#02-159235#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$legal_name1;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Legal Name'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Legal Name','Sequence'=>'28','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$legal_name1));
                    }
                }
                elseif($val=='0161-1#02-174095#1')
                {
                    if($val=='0161-1#02-174095#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$logo_url;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Logo Url'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Logo Url','Sequence'=>'29','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$logo_url));
                    }
                }
                elseif($val=='0161-1#02-107906#1')
                {
                    if($val=='0161-1#02-107906#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$profile_url;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Description'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Description','Sequence'=>'30','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$profile_url));
                    }
                }
                elseif($val=='0161-1#02-139987#1')
                {
                    if($val=='0161-1#02-139987#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$poc_name;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Poc Name'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Poc Name','Sequence'=>'3132','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$poc_name));
                    }
                }
                elseif($val=='0161-1#02-174096#1')
                {
                    if($val=='0161-1#02-174096#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$email;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Poc Email'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Poc Email','Sequence'=>'32','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$email));
                    }
                }
                elseif($val=='0161-1#02-159219#1')
                {
                    if($val=='0161-1#02-159219#1' && in_array($val, $addr_arr1))
                    {
                        $val_array['Value']=$addr1;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_org_addr_val = $this->editorg->update('address_value',$val_array, array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Address Line One'));
                    }
                    else
                    {
                        $ins_org_addr_val = $this->editorg->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Address Line One','Sequence'=>'7','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$addr1));
                    }
                }
                elseif($val=='0161-1#02-160683#1')
                {
                    if($val=='0161-1#02-160683#1' && in_array($val, $addr_arr1))
                    {
                        $val_array['Value']=$addr2;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_org_addr_val = $this->editorg->update('address_value',$val_array, array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Address Line Two'));
                    }
                    else
                    {
                        $ins_org_addr_val = $this->editorg->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Address Line Two','Sequence'=>'8','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$addr2));
                    }
                }
                elseif($val=='0161-1#02-102127#1')
                {
                    if($val=='0161-1#02-102127#1' && in_array($val, $addr_arr1))
                    {
                        $val_array['Value']=$city;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_org_addr_val = $this->editorg->update('address_value',$val_array, array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'City'));
                    }
                    else
                    {
                        $ins_org_addr_val = $this->editorg->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'City','Sequence'=>'9','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$city));
                    }
                }
                elseif($val=='0161-1#02-153697#1')
                {
                   if($val=='0161-1#02-153697#1' && in_array($val, $addr_arr1))
                    {
                        $val_array['Value']=$state;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_org_addr_val = $this->editorg->update('address_value',$val_array, array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'State'));
                    }
                    else
                    {
                        $ins_org_addr_val = $this->editorg->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'State','Sequence'=>'10','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$state));
                    }
                }
                elseif($val=='0161-1#02-091098#1')
                {
                    if($val=='0161-1#02-091098#1' && in_array($val, $addr_arr1))
                    {
                        $val_array['Value']=$country;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_org_addr_val = $this->editorg->update('address_value',$val_array, array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Country'));
                    }
                    else
                    {
                        $ins_org_addr_val = $this->editorg->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Country','Sequence'=>'11','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$country));
                    }
                }
                elseif($val=='0161-1#02-090183#1')
                {
                    if($val=='0161-1#02-090183#1' && in_array($val, $addr_arr1))
                    {
                        $val_array['Value']=$country_code;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_org_addr_val = $this->editorg->update('address_value',$val_array, array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Country Code'));
                    }
                    else
                    {
                        $ins_org_addr_val = $this->editorg->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Country Code','Sequence'=>'12','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$country_code));
                    }
                }
                elseif($val=='0161-1#02-000029#1')
                {
                    if($val=='0161-1#02-000029#1' && in_array($val, $addr_arr1))
                    {
                        $val_array['Value']=$zipcode;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_org_addr_val = $this->editorg->update('address_value',$val_array, array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Zip Code'));
                    }
                    else
                    {
                        $ins_org_addr_val = $this->editorg->insert('address_value', array('AddressID' => $addr_id,'PropertyId' => $val,'Property'=>'Zip Code','Sequence'=>'13','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$zipcode));
                    }
                }
                elseif($val=='0161-1#02-174088#1')
                {
                    if($val=='0161-1#02-174088#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$visible_status;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Visible Status'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Visible Status','Sequence'=>'14','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$visible_status));
                    }
                }
                elseif($val=='0161-1#02-174097#1')
                {
                    if($val=='0161-1#02-174097#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$tel_country_code;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array, array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Telephone Code'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Telephone Code','Sequence'=>'33','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$tel_country_code));
                    }
                }
                elseif($val=='0161-1#02-000077#1')
                {
                    if($val=='0161-1#02-000077#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$telephone_num;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value',$val_array ,array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Telephone'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Telephone','Sequence'=>'15','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$telephone_num));
                    }
                }
                elseif($val=='0161-1#02-103658#1')
                {
                    if($val=='0161-1#02-103658#1' && in_array($val, $arr1))
                    {
                        $val_array['Value']=$fax;
                        $val_array['ModifiedDate']=date('Y-m-d H:i:s');
                        $update_orgval = $this->editorg->update('organization_value', $val_array,array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Fax'));
                    }
                    else
                    {
                        $ins_orgval = $this->editorg->insert('organization_value', array('OrganizationId' => $org_id,'PropertyId' => $val,'Property'=>'Fax','Sequence'=>'16','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$fax));
                    }
                }
            }

            redirect('Editorg/org/'.base64_encode($org_id));
        }
    }

    public function state_fun()
    {
        $state='';
        $country_val=$_POST['country_val'];
        // exit;
        $data['sel_state'] = $this->editorg->get_list('states', array('country_id' => $country_val), '', '', '', 'id', 'asc');
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
        $data['sel_state'] = $this->editorg->get_list('cities', array('state_id' => $state_val), '', '', '', 'id', 'asc');
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

    // public function download($file)
    // {
    //     $fileName = basename($file);
    //     $filePath = base_url().'assets/uploads/'.$file;
    //     header('Content-type: application/octet-stream');
    //     header("Content-Type: ".mime_content_type($filePath));
    //     header("Content-Disposition: attachment; filename=".$filePath);
    //     while (ob_get_level()) {
    //         ob_end_clean();
    //     }
    //     readfile($filePath);
    // // }
    // }
}
?>
