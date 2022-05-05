<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Addorg_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function getmax()
    {
        $this->db->select_max('OrganizationId');
        $this->db->from('organization_master');
        $this->db->where('char_length(OrganizationId)','18');
        $query=$this->db->get();
        $q1=$query->result_array();
        foreach($q1 as $value)
        {
            $ogid=substr($value['OrganizationId'],10,6);
            $org_id=$ogid+1;
            $org_id=str_pad($org_id, 6, "0", STR_PAD_LEFT);  
            $org_id='0161-1#'.'OG-'.$org_id.'#1';
        }

        $this->db->select_max('AddressId');
        $this->db->from('address_master');
        $this->db->where('char_length(AddressId)','18');
        $this->db->like('AddressId','AD','both');
        $query=$this->db->get();
        $q2=$query->result_array();
        foreach($q2 as $value1)
        {
            $addid=substr($value1['AddressId'],10,6);
            $addr_id=$addid+1;
            $addr_id=str_pad($addr_id, 6, "0", STR_PAD_LEFT);  
            $addr_id='0161-1#'.'AD-'.$addr_id.'#1';
        }

        $final_res[]=array('org_id'=>$org_id,'addr_id'=>$addr_id);

        // pre($final_res);
        // exit;

        return $final_res;
    }
}
?>