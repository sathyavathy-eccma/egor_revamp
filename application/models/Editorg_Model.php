<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Editorg_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function Orginfo($id)
    {
        $org_id=base64_decode($id);
        $this->db->select('*');
        $this->db->from('organization_master');
        $this->db->where('DeletedDate', '0000-00-00 00:00:00');
        $this->db->where('LegalName!=', '');
        $this->db->where('OrganizationId', $org_id);
        $org_mas=$this->db->get();
        $org_mas=$org_mas->result_array();

        foreach($org_mas as $value)
        {
            $addr_id=$value['AddressId'];
        }

        $sql=$this->db->query("SELECT MAX(CASE WHEN PropertyId = '0161-1#02-159234#1' THEN value ELSE NULL END) ALEI, 
        MAX(CASE WHEN PropertyId = '0161-1#02-160664#1' THEN value ELSE NULL END) NCAGE,
        MAX(CASE WHEN PropertyId = '0161-1#02-107662#1' THEN value ELSE NULL END) Website,
        MAX(CASE WHEN PropertyId = '0161-1#02-174094#1' THEN value ELSE NULL END) Organization_Profile_Biography,
        MAX(CASE WHEN PropertyId = '0161-1#02-061933#1' THEN value ELSE NULL END) Logo,
        MAX(CASE WHEN PropertyId = '0161-1#02-159235#1' THEN value ELSE NULL END) Legalname,
        MAX(CASE WHEN PropertyId = '0161-1#02-174095#1' THEN value ELSE NULL END) Logourl,
        MAX(CASE WHEN PropertyId = '0161-1#02-107906#1' THEN value ELSE NULL END) Description,
        MAX(CASE WHEN PropertyId = '0161-1#02-139987#1' THEN value ELSE NULL END) poc_name,
        MAX(CASE WHEN PropertyId = '0161-1#02-174096#1' THEN value ELSE NULL END) poc_email,
        MAX(CASE WHEN PropertyId = '0161-1#02-174097#1' THEN value ELSE NULL END) telephone_code,
        MAX(CASE WHEN PropertyId = '0161-1#02-000077#1' THEN value ELSE NULL END) telephone,
        MAX(CASE WHEN PropertyId = '0161-1#02-103658#1' THEN value ELSE NULL END) fax
        from organization_value where OrganizationId='$org_id'");

        $org_val=$sql->result_array();

        $sql=$this->db->query("SELECT 
        MAX(CASE WHEN PropertyId = '0161-1#02-159219#1' THEN value ELSE NULL END) add1,
        MAX(CASE WHEN PropertyId = '0161-1#02-160683#1' THEN value ELSE NULL END) add2,
        MAX(CASE WHEN PropertyId = '0161-1#02-102127#1' THEN value ELSE NULL END) city,
        MAX(CASE WHEN PropertyId = '0161-1#02-153697#1' THEN value ELSE NULL END) state,
        MAX(CASE WHEN PropertyId = '0161-1#02-091098#1' THEN value ELSE NULL END) country,
        MAX(CASE WHEN PropertyId = '0161-1#02-090183#1' THEN value ELSE NULL END) country_code,
        MAX(CASE WHEN PropertyId = '0161-1#02-000029#1' THEN value ELSE NULL END) zip_code
        from address_value where AddressID='$addr_id'");

        $org_addr_val=$sql->result_array();


        $final_res[]=array('org_mas'=>$org_mas,'org_val'=>$org_val,'org_addr_val'=>$org_addr_val);
        return $final_res;  
    }
}
