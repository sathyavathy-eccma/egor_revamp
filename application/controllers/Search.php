<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Search_model', 'search', true);
        $this->load->library('session');
        $this->load->library('Ajax_pagination');
        
    }

    public function index() {
        if ($this->session->userdata('username')) 
        {
            $this->layout->view('search');
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function search()
    {
        $page = $this->input->post('page'); 
        if(!$page){ 
            $offset = 0; 
        }else{ 
            $offset = $page; 
        } 

        $this->perPage = $this->input->post('limit'); 
        $data1['srchtype']=$this->input->post('srchtype');
        $data1['srchvalue']=$this->input->post('srchvalue');
        $data1['sort']=$this->input->post('sort');
        $data1['limit']=$this->input->post('limit');
        $data1['start'] = $offset; 
        $data1['order_by']=$this->input->post('order_by');
        $data1['column']=$this->input->post('column');
        $data1['srchby']=$this->input->post('srchby');
        $data1['chk_ncage']=$this->input->post('chk_ncage');


        $data = array(); 

        // Get record count 
        $conditions1[] = $data1; 

        $totalRec =  $this->search->orgsrch_count($conditions1); 

        $config['target']      = '#result'; 
        $config['base_url']    = base_url('search/search'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 

        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
        
        $data['posts'] = $this->search->org_tblsrch($conditions1); 

        $this->load->view('ajax_data', $data, false); 
        
    }

    public function search_modal()
    {
        // $data=array();
        $orgid=$_POST['orgid'];
        $orginfo = $this->search->get_list('organization_value',array('OrganizationId' => $orgid),'', '', '','Sequence','ASC');
        $arr=json_decode(json_encode($orginfo), true);

        $org_addr_id = $this->search->get_list('organization_master',array('OrganizationId' => $orgid));
        $arr_addr_id = json_decode(json_encode($org_addr_id), true);

        foreach($arr_addr_id as $addr)
        {
            $addr_id=$addr['AddressId'];
        }

        $org_addr_info = $this->search->get_list('address_value',array('AddressID' => $addr_id),'', '', '','Sequence','ASC');
        $arr_addr_info = json_decode(json_encode($org_addr_info), true);

        $result='';
        $result.='<table class="table table-bordered mb-0">';
        if(count($arr_addr_id)>0)
        {
            foreach($arr_addr_id as $res)
            {
                if($res['ALEI'])
                {
                    if($res['ALEI']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE1OTIzNCMx' target='_blank'>ALEI</a></b></td><td>".$res['ALEI']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE1OTIzNCMx' target='_blank'>ALEI</a></b></td><td>N/A</td></tr>";
                    }
                }
                if($res['NCAGE'])
                {
                    if($res['NCAGE']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE2MDY2NCMx' target='_blank'>NCAGE</a></b></td><td>".$res['NCAGE']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE2MDY2NCMx' target='_blank'>NCAGE</a></b></td><td>N/A</td></tr>";
                    }
                }
            }
        }
        if(count($arr)>0)
        {
            foreach($arr as $res)
            {
                if($res['Property']=='Poc Email')
                {
                    if($res['Value']!='')
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE2MjAxNyMx' target='_blank'>Poc Email</a></b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTE2MjAxNyMx' target='_blank'>Poc Email</a></b></td><td>N/A</td></tr>";
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
                        $result.= "<tr><td><b><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTAwMDA3NyMx' target='_blank'>Telephone</a></b></td><td>N/A</td></tr>";
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
                        $result.= "<tr><td><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTEzOTk5OSMx' target='_blank'><b>Address Line One</b></td><td>".$res['Value']."</td></tr>";
                    }
                    else
                    {
                        $result.= "<tr><td><a href='https://eotd.org/home/dictionary_details/MDE2MS0xIzAyLTEzOTk5OSMx' target='_blank'><b>Address Line One</a></b></td><td>N/A</td></tr>";
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
?>