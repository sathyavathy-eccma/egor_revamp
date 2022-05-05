<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vieworg extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('session');
        $this->load->model('Vieworg_model', 'vieworg', true);
        $this->load->library('Ajax_pagination');
        
    }



    public function org($id=null) 
    {
        $data = array();
        $data['id'] = $id;

        if ($this->session->userdata('username'))
        {
            $get_addr_id= $this->vieworg->get_list('organization_master', array('OrganizationId' => base64_decode($id)));
            $arr_addr_id = json_decode(json_encode($get_addr_id), true);

            foreach($arr_addr_id as $addr)
            {
                $addr_id=$addr['AddressId'];
            }

            $data['org_mas'] =  $this->vieworg->get_list('organization_master', array('OrganizationId' => base64_decode($id)));
            $data['org_name'] =  $this->vieworg->get_list('organization_value', array('OrganizationId' => base64_decode($id)));
            $data['org_address'] =  $this->vieworg->get_list('address_value', array('AddressID' => $addr_id));
            $this->layout->view('vieworg',$data);
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function viewdata()
    {
        // echo $id;
        $page = $this->input->post('page'); 
        if(!$page){ 
            $offset = 0; 
        }else{ 
            $offset = $page; 
        } 
        $this->perPage = $this->input->post('limit'); 
        $data1['srchtype']=$this->input->post('srchtype');
        $data1['srchvalue']=$this->input->post('srchvalue');
        $data1['member_type']=$this->input->post('member_type');
        $data1['certification']=$this->input->post('certification');
        $data1['sort']=$this->input->post('sort');
        $data1['limit']=$this->perPage;
        $data1['start'] = $offset; 
        $data1['order_by']=$this->input->post('order_by');
        $data1['column']=$this->input->post('column');
        $data1['srchby']=$this->input->post('srchby');
        // $data1['order_by']=$this->input->post('order_by');
        $data1['orgid']=$this->input->post('orgid');

        $data = array(); 

        // Get record count 
        $conditions1[] = $data1; 

        $totalRec =  $this->vieworg->orgindiv_count($conditions1); 

        $config['target']      = '#result'; 
        $config['base_url']    = base_url('vieworg/viewdata'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 

         
       
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
        
        $data['vieworg'] = $this->vieworg->orgindiv_tblsrch($conditions1); 

        // echo "total=".$totalRec;

        $this->load->view('ajax_vieworg', $data, false); 
        // pre($data);
        // exit;
    }

    public function indiv_modal()
    {
        // $data=array();
        $indid=$_POST['indid'];

        $indinfo = $this->vieworg->get_list('individual_value',array('IndividualId' => $indid),'', '', '','Sequence','ASC');
        $arr=json_decode(json_encode($indinfo), true);

        $ind_addr_id = $this->vieworg->get_list('individual_master',array('IndividualId' => $indid));
        $arr_addr_id = json_decode(json_encode($ind_addr_id), true);

        foreach($arr_addr_id as $addr)
        {
            $addr_id=$addr['AddressID'];
            $Username=$addr['Username'];
            $Password=$addr['Password'];
        }

        $ind_addr_info = $this->vieworg->get_list('address_value',array('AddressID' => $addr_id),'', '', '','Sequence','ASC');
        $arr_addr_info = json_decode(json_encode($ind_addr_info), true);


        // $indivinfo = $this->vieworg->indivinfo($indid);
        $result='';
        $result.='<table class="table table-bordered mb-0">';

        if($Username!='')
        {
            $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE0NzY4NyMx' target='_blank'>Username</a></b></td><td>".$Username."</td></tr>";
        }
        else
        {
            $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE0NzY4NyMx' target='_blank'>Username</a></b></td><td>N/A</td></tr>";
        }
        if($Password!='')
        {
            $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTAzMzE1MCMx' target='_blank'>Password</a></b></td><td>".$Password."</td></tr>";
        }
        else
        {
            $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTAzMzE1MCMx' target='_blank'>Password</a></b></td><td>N/A</td></tr>";
        }
        if(count($arr)>0)
        {
            foreach($arr as $res)
            {            
                if($res['Property']=='First Name')
                {
                    if($res['Value']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTEwMjEzNyMx' target='_blank'>Name</a></b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTEwMjEzNyMx' target='_blank'>Name</a></b></td><td>N/A</td></tr>";
                    }
                }
                if($res['Property']=='Title')
                {
                    if($res['Value']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE2MDY3NyMx' target='_blank'>Title</a></b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE2MDY3NyMx' target='_blank'>Title</a></b></td><td>N/A</td></tr>";
                    }
                }
                
                if($res['Property']=='UserStatus')
                {
                    if($res['Value']!='')
                    {
                        $result.= "<tr><td><b>User Status</b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b>User Status</b></td><td>N/A</td></tr>";
                    }
                }
                if($res['Property']=='Email Address')
                {
                    if($res['Value']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE2MjAxNyMx' target='_blank'>Email Address</a></b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE2MjAxNyMx' target='_blank'>Email Address</a></b></td><td>Private Status</td></tr>";
                    }
                }
                
                if($res['Property']=='Telephone')
                {
                    if($res['Value']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTAwMDA3NyMx' target='_blank'>Telephone</a></b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTAwMDA3NyMx' target='_blank'>Telephone</a></b></td><td>Private Status</td></tr>";
                    }
                }
            }
        }
        if(count($arr_addr_info)>0)
        {
            foreach($arr_addr_info as $res)
            {
                if($res['Property']=='Address Line One')
                {
                    if($res['Value']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTEzOTk5OSMx' target='_blank'>Address Line One</a></b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTEzOTk5OSMx' target='_blank'>Address Line One</a></b></td><td>N/A</td></tr>";
                    }
                }
                if($res['Property']=='Address Line Two')
                {
                    if($res['Value']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE0MDAwMCMx' target='_blank'>Address Line Two</a></b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE0MDAwMCMx' target='_blank'>Address Line Two</a></b></td><td>N/A</td></tr>";
                    }
                }
                if($res['Property']=='City')
                {
                    if($res['Value']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTEwMjEyNyMx' target='_blank'>City</a></b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTEwMjEyNyMx' target='_blank'>City</a></b></td><td>N/A</td></tr>";
                    }
                }
                if($res['Property']=='State')
                {
                    if($res['Value']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE1MzY5NyMx' target='_blank'>State</a></b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE1MzY5NyMx' target='_blank'>State</a></b></td><td>N/A</td></tr>";
                    }
                }
                if($res['Property']=='Country')
                {
                    if($res['Value']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAwLTAwMDAzNCMx' target='_blank'>Country</a></b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAwLTAwMDAzNCMx' target='_blank'>Country</a></b></td><td>N/A</td></tr>";
                    }
                }
            }
        }
        if(count($arr_addr_info)==0 && count($arr)==0)
        {
            $result.='<tr><td colspan="2"><center>No Details found.</center></td></tr>';
        }
        $result.='</table>';
        echo  $result;
    }
}