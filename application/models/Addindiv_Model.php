<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Addindiv_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function getmax()
    {
        $this->db->select_max('IndividualId');
        $this->db->from('individual_master');
        $this->db->where('char_length(IndividualId)','18');
        $query=$this->db->get();
        $q2=$query->result_array();
        foreach($q2 as $value1)
        {
            $indid=substr($value1['IndividualId'],10,6);
            $indiv_id=$indid+1;
            $indiv_id=str_pad($indiv_id, 6, "0", STR_PAD_LEFT);  
            $indiv_id='0161-1#'.'IN-'.$indiv_id.'#1';
        }

        $this->db->select_max('AddressID');
        $this->db->from('address_master');
        $this->db->where('char_length(AddressID)','18');
        $this->db->like('AddressID','AD','both');
        $query=$this->db->get();
        $q3=$query->result_array();
        foreach($q3 as $value2)
        {
            $addid=substr($value2['AddressID'],10,6);
            $addr_id=$addid+1;
            $addr_id=str_pad($addr_id, 6, "0", STR_PAD_LEFT);  
            $addr_id='0161-1#'.'AD-'.$addr_id.'#1';
        }

        // if($this->session->userdata('checkuser_opt')=='individual')
        // {
        //     $this->db->select('OrganizationId');
        //     $this->db->select('LegalName');
        //     $this->db->from('individual_master');
        //     $this->db->where('IndividualId',$this->session->userdata('loginuser_id'));
        //     $query=$this->db->get();
        //     $q3=$query->result_array();
        //     foreach($q3 as $value1)
        //     {
        //         $org_id1=$value1['OrganizationId'];
        //     }

        //     $this->db->select('OrganizationId');
        //     $this->db->select('LegalName');
        //     $this->db->from('organization_master');
        //     $this->db->where('OrganizationId',$org_id1);
        //     $query=$this->db->get();
        //     $q3=$query->result_array();
        //     foreach($q3 as $value1)
        //     {
        //         $org_id=$value1['OrganizationId'];
        //         $legal_name=$value1['LegalName'];
        //     }
        // }
        // else
        // {
        //     $this->db->select('OrganizationId');
        //     $this->db->select('LegalName');
        //     $this->db->from('organization_master');
        //     $this->db->where('OrganizationId',$this->session->userdata('loginuser_id'));
        //     $query=$this->db->get();
        //     $q3=$query->result_array();
        //     foreach($q3 as $value1)
        //     {
        //         $org_id=$value1['OrganizationId'];
        //         $legal_name=$value1['LegalName'];
        //     }
        // }

        // $final_res[]=array('indiv_id'=>$indiv_id,'org_id'=>$org_id,'legal_name'=>$legal_name,'addr_id'=>$addr_id);
        $final_res[]=array('indiv_id'=>$indiv_id,'addr_id'=>$addr_id);

        return $final_res;
    }

    public function getdistorg()
    {
        $this->db->distinct();
        $this->db->select('OrganizationId');
        $this->db->select('LegalName');
        $this->db->from('organization_master');
        $this->db->where('NCAGE','0');
        $this->db->where('LegalName<>','');
        $this->db->order_by('LegalName','asc');
        $query=$this->db->get();
        $q3=$query->result_array();
        return $q3;
    }

    public function getog()
    {
        if($this->session->userdata('checkuser_opt')=='individual')
        {
            $this->db->select('OrganizationId');
            $this->db->select('LegalName');
            $this->db->from('individual_master');
            $this->db->where('IndividualId',$this->session->userdata('loginuser_id'));
            $query=$this->db->get();
            $q3=$query->result_array();
            foreach($q3 as $value1)
            {
                $org_id1=$value1['OrganizationId'];
            }

            $this->db->select('OrganizationId');
            $this->db->select('LegalName');
            $this->db->from('organization_master');
            $this->db->where('OrganizationId',$org_id1);
            $query=$this->db->get();
            $q3=$query->result_array();
            foreach($q3 as $value1)
            {
                $org_id=$value1['OrganizationId'];
                $legal_name=$value1['LegalName'];
            }
        }
        else
        {
            $this->db->select('OrganizationId');
            $this->db->select('LegalName');
            $this->db->from('organization_master');
            $this->db->where('OrganizationId',$this->session->userdata('loginuser_id'));
            $query=$this->db->get();
            $q3=$query->result_array();
            foreach($q3 as $value1)
            {
                $org_id=$value1['OrganizationId'];
                $legal_name=$value1['LegalName'];
            }
        }

        $final_res[]=array('org_id'=>$org_id,'legal_name'=>$legal_name);

        return $final_res;
    }
}
?>