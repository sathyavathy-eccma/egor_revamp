<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Editindiv_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function Indinfo($id)
    {
        $ind_id=base64_decode($id);
        $this->db->select('*');
        $this->db->from('individual_master');
        $this->db->where('DeletedDate', '0000-00-00 00:00:00');
        $this->db->where('IndividualId', $ind_id);
        $ind_mas=$this->db->get();
        $ind_mas=$ind_mas->result_array();

        foreach($ind_mas as $value)
        {
            $addr_id=$value['AddressID'];
        }

        $this->db->select('*');
        $this->db->from('iso');
        $this->db->where('IndividualId', $ind_id);
        $cert_list=$this->db->get();
        $cert_list=$cert_list->result_array();


        $sql=$this->db->query("SELECT MAX(CASE WHEN `PropertyId` = '0161-1#02-102137#1' THEN value ELSE NULL END) Firstname, 
        MAX(CASE WHEN `PropertyId` = '0161-1#02-102141#1' THEN value ELSE NULL END) lastname,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-062674#1' THEN value ELSE NULL END) title,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-061691#1' THEN value ELSE NULL END) gender,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-174087#1' THEN value ELSE NULL END) role_code,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-140061#1' THEN value ELSE NULL END) email,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-174088#1' THEN value ELSE NULL END) visible_status,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-000077#1' THEN value ELSE NULL END) telephone,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-103658#1' THEN value ELSE NULL END) fax,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-174089#1' THEN value ELSE NULL END) mem_start_date,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-174090#1' THEN value ELSE NULL END) mem_end_date,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-174091#1' THEN value ELSE NULL END) mem_renewal_date,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-174092#1' THEN value ELSE NULL END) mem_status,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-174093#1' THEN value ELSE NULL END) user_status,
        MAX(CASE WHEN `PropertyId` = '0161-1#02-139990#1' THEN value ELSE NULL END) mem_type
        from individual_value where `IndividualId`='$ind_id'");

        $ind_val=$sql->result_array();

        $this->db->select('*');
        $this->db->from('address_value');
        $this->db->where('AddressID', $addr_id);
        $Addr_list=$this->db->get();
        $Addr_list=$Addr_list->result_array();

        $final_res[]=array('ind_mas'=>$ind_mas,'ind_val'=>$ind_val,'cert_list'=>$cert_list,'Addr_list'=>$Addr_list);
        return $final_res;  
    }

    public function getdata($res)
    {
        $this->db->select('OrganizationId');
        $this->db->select('LegalName');
        $this->db->select('CertificationType');
        $this->db->select('AddressID');
        $this->db->from('individual_master');
        $this->db->where('IndividualId',$res);
        $query=$this->db->get();
        $q3=$query->result_array();
        foreach($q3 as $value1)
        {
            $org_id=$value1['OrganizationId'];
            $legal_name=$value1['LegalName'];
            $CertificationType=$value1['CertificationType'];
            $AddressID=$value1['AddressID'];
        }
        $final_res[]=array('org_id'=>$org_id,'legal_name'=>$legal_name,'CertificationType'=>$CertificationType,'AddressID'=>$AddressID);

        return $final_res;
    }

    
}
?>