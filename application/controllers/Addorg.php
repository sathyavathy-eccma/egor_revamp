<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addorg extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('session');
        $this->load->model('Addorg_Model', 'addorg', true);
        
    }

    public function index() 
    {
       
        if ($this->session->userdata('username'))
        {
            $this->layout->view('addorg');
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function state_fun()
    {
        $state='';
        $country_val=$_POST['country_val'];
        // exit;
        $data['sel_state'] = $this->addorg->get_list('states', array('country_id' => $country_val), '', '', '', 'id', 'asc');
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
        $data['sel_state'] = $this->addorg->get_list('cities', array('state_id' => $state_val), '', '', '', 'id', 'asc');
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

    public function insertnew()
    {
        $data=array();
        if(isset($_POST))
        {
            $rand = rand();
            $org_mas_array['LegalName']=trim($_POST['legal_name']);
            $max_org_id=$this->addorg->getmax();
            // pre($max_org_id);
            foreach($max_org_id as $res)
            {
                $max_org_id = $res['org_id'];
                $max_addr_id = $res['addr_id'];
            }
            
            $org_mas_array['OrganizationId']=$max_org_id;
            $org_mas_array['AddressId']=$max_addr_id;
            $org_mas_array['CreatedDate']=date('Y-m-d H:i:s');
            $org_mas_array['DeletedDate']='0000-00-00 00:00:00';
            $org_mas_array['Username'] = $_POST['legal_name'].'_'.$rand.'#';
            $org_mas_array['Password'] = $_POST['legal_name'].'_'.$rand.'#';
            $org_mas_array['NCAGE']=$_POST['ncage'];
            $org_mas_array['ALEI']=$_POST['alei'];
            if(isset($_POST['addr_chk']))
            {
                $org_mas_array['VisibleStatusAddress']=$_POST['addr_chk'];
            }
            else
            {
                $org_mas_array['VisibleStatusAddress']='';
            }
            if(isset($_POST['telephone_chk']))
            {
                $org_mas_array['VisibleStatusTelephone']=$_POST['telephone_chk'];
            }
            else
            {
                $org_mas_array['VisibleStatusTelephone']='';
            }
            if(isset($_POST['email_chk']))
            {
                $org_mas_array['VisibleStatusEmail']=$_POST['email_chk'];
            }
            else
            {
                $org_mas_array['VisibleStatusEmail']='';
            }
            
            $ins_organization = $this->addorg->insert('organization_master', $org_mas_array);

            
            $url=trim($_POST['url']);
            $addr1=trim($_POST['addr1']);
            $addr2=trim($_POST['addr2']);
            $country=substr($_POST['country'], 0, strpos($_POST['country'], "-"));
            if($country=='OTHER')
            {
                $country='OTHER|'.$_POST['other_country'];
            }
            $state=trim($_POST['state']);
            if($state=='OTHER')
            {
                $state='OTHER|'.$_POST['other_state'];
            }
            $city=trim($_POST['city']);
            if($city=='OTHER')
            {
                $city='OTHER|'.$_POST['other_city'];
            }
            
            $legal_name1=trim($_POST['legal_name']);
            $zipcode=trim($_POST['zipcode']);
            $tel_country_code=trim($_POST['tel_country_code']);
            $telephone_num=trim($_POST['telephone_num']);
            $email=trim($_POST['email']).'@'.trim($_POST['domain']);
            $logo_usecode=trim($_POST['logo_usecode']);
            if($logo_usecode!='Website')
            {
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
                $logo_url=trim($_POST['logo_url']);
            }
            
            $profile_usecode=$_POST['profile_usecode'];
            if($profile_usecode!='Website')
            {
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
                $profile_url=trim($_POST['profile_url']);
            }
            
            $fax=$_POST['fax'];

            $poc_name='';
            $country_code='';
           
            // pre($city);
            // pre($_POST['country']);
            // pre($country);
            // exit;   

            // $extension=trim($_POST['extension']);
            // $tel_type_code=trim($_POST['type_code']);
            // $area_code=trim($_POST['area_code']);
            // $email_use_code=trim($_POST['email_use_code']);

            $temp_arr=$_POST['temp_array'];
            foreach($temp_arr as $val)
            {
                if($val=='0161-1#02-107662#1')
                {
                    if($url!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value',  array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'Website','Sequence'=>'25','Value'=>$url,'CreatedDate'=>date('Y-m-d H:i:s'),'DeletedDate'=>'0000-00-00 00:00:00'));
                    }
                }
                elseif($val=='0161-1#02-174094#1')
                {
                    if($profile_usecode!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value',  array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'Organization Profile Biography','Sequence'=>'26','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$profile_usecode));
                    }
                }
                elseif($val=='0161-1#02-061933#1')
                {
                    if($logo_usecode!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value', array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'Logo','Sequence'=>'27','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$logo_usecode,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-159235#1')
                {
                    if($legal_name1!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value', array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'Legal Name','Sequence'=>'28','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$legal_name1,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-174095#1')
                {
                    if($logo_url!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value', array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'Logo Url','Sequence'=>'29','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$logo_url,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-107906#1')
                {
                    if($profile_url!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value', array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'Description','Sequence'=>'30','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$profile_url,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-139987#1')
                {
                    if($poc_name!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value', array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'Poc Name','Sequence'=>'31','Value'=>$poc_name,'DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-174096#1')
                {
                    if($email!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value', array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'Poc Email','Sequence'=>'32','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$email,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-159219#1')
                {
                    if($addr1!='')
                    {
                        $insert_org_addr_mas = $this->addorg->insert('address_master',  array('OrganizationId'=>$max_org_id,'AddressID' => $max_addr_id,'DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s')));
                        $insert_org_addr_val = $this->addorg->insert('address_value',  array('AddressID' => $max_addr_id,'PropertyId' => $val,'Property'=>'Address Line One','Sequence'=>'7','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$addr1,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-160683#1')
                {
                    if($addr2!='')
                    {
                        $insert_org_addr_val = $this->addorg->insert('address_value',  array('AddressID' => $max_addr_id,'PropertyId' => $val,'Property'=>'Address Line Two','Sequence'=>'8','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$addr2,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-102127#1')
                {
                    if($city!='')
                    {
                        $insert_org_addr_val = $this->addorg->insert('address_value',  array('AddressID' => $max_addr_id,'PropertyId' => $val,'Property'=>'City','Sequence'=>'9','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$city,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-153697#1')
                {
                    if($state!='')
                    {
                        $insert_org_addr_val = $this->addorg->insert('address_value',  array('AddressID' => $max_addr_id,'PropertyId' => $val,'Property'=>'state','Sequence'=>'10','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$state,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-091098#1')
                {
                    if($country!='')
                    {
                        $insert_org_addr_val = $this->addorg->insert('address_value',  array('AddressID' => $max_addr_id,'PropertyId' => $val,'Property'=>'Country','Sequence'=>'11','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$country,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-090183#1')
                {
                    if($country_code!='')
                    {
                        $insert_org_addr_val = $this->addorg->insert('address_value',  array('AddressID' => $max_addr_id,'PropertyId' => $val,'Property'=>'Country Code','Sequence'=>'12','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$country_code));
                    }
                }
                elseif($val=='0161-1#02-000029#1')
                {
                    if($zipcode!='')
                    {
                        $insert_org_addr_val = $this->addorg->insert('address_value',  array('AddressID' => $max_addr_id,'PropertyId' => $val,'Property'=>'Zip Code','Sequence'=>'13','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$zipcode,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                }
                elseif($val=='0161-1#02-174088#1')
                {
                    if($addr_visible_status!='')
                    {
                        // $insert_orgval = $this->addorg->insert('organization_value', array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'Visible Status','Sequence'=>'14','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$addr_visible_status));
                    }
                }
                elseif($val=='0161-1#02-174097#1')
                {
                    if($tel_country_code!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value', array('OrganizationId' =>$max_org_id,'PropertyId' => $val,'Property'=>'Telephone Code','Sequence'=>'33','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$tel_country_code));
                    }
                }
                elseif($val=='0161-1#02-000077#1')
                {
                    if($telephone_num!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value',  array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'Telephone','Sequence'=>'15','DeletedDate'=>'0000-00-00 00:00:00','Value'=>$telephone_num,'CreatedDate'=>date('Y-m-d H:i:s')));
                    }
                    // pre($insert_orgval);
                }
                elseif($val=='0161-1#02-103658#1')
                {
                    if($fax!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value', array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'fax','Sequence'=>'16','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$fax));
                    }
                }
                elseif($val=='0161-1#02-160664#1')
                {
                    if($_POST['ncage']!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value', array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'NCAGE','Sequence'=>'24','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$_POST['ncage']));
                    }
                }
                elseif($val=='0161-1#02-159234#1')
                {
                    if($_POST['alei']!='')
                    {
                        $insert_orgval = $this->addorg->insert('organization_value', array('OrganizationId' => $max_org_id,'PropertyId' => $val,'Property'=>'ALEI','Sequence'=>'23','DeletedDate'=>'0000-00-00 00:00:00','CreatedDate'=>date('Y-m-d H:i:s'),'Value'=>$_POST['alei']));
                    }
                }
            }
            // exit;
            redirect('editorg/org/'.base64_encode($max_org_id));
        }
    }
}
?>
