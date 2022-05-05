<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certlist_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function srch_count($data)
    {
        foreach($data as $res)
        {
            $cert_type=$res['cert_type'];
            $srchvalue=$res['srchvalue'];
            $srchtype=$res['srchtype'];
        }

        if($srchvalue=='')
        {
            $this->db->select('*');
            $this->db->from('iso');
            $this->db->where('AppliedFor',$cert_type);
            $this->db->where('DeletedDate','0000-00-00 00:00:00');
            $org_mas=$this->db->get();
            return $org_mas->num_rows();
        }
        else
        {
            $this->db->select('*');
            $this->db->from('iso');
            $this->db->where('AppliedFor',$cert_type);
            $this->db->where('DeletedDate','0000-00-00 00:00:00');
            if($srchtype=='legal_name')
            {
                $this->db->where('LegalName',$srchvalue);
            }
            else if($srchtype=='email_address')
            {
                $this->db->where('Email',$srchvalue);
            }
            else if($srchtype=='status')
            {
                $this->db->where('Status',$srchvalue);
            }
            else if($srchtype=='Cert_date')
            {
                $this->db->where('CertifiedDate',$srchvalue);
            }
            else if($srchtype=='exp_date')
            {
                $this->db->where('ExpiredDate',$srchvalue);
            }
            else if($srchtype=='renew_date')
            {
                $this->db->where('RenewalDate',$srchvalue);
            }
            $org_mas=$this->db->get();
            return $org_mas->num_rows();
        }
        
    }

    public function tblsrch($data)
    {
        foreach($data as $res)
        {
            $cert_type=$res['cert_type'];
            $offset=$res['start'];
            $srchvalue=$res['srchvalue'];
            $srchtype=$res['srchtype'];
            $limit=$res['limit'];
        }

        if($srchvalue=='')
        {
            $this->db->select('*');
            $this->db->from('iso');
            $this->db->where('AppliedFor',$cert_type);
            $this->db->where('DeletedDate','0000-00-00 00:00:00');
            $this->db->limit($limit,$offset); 
            $org_mas=$this->db->get();
            // echo $this->db->last_query();
            $org_mas_res = $org_mas->result_array();
                
            
            $final_res[]=array('result'=>$org_mas_res);
            return $final_res;
        }
        else
        {
            $this->db->select('*');
            $this->db->from('iso');
            $this->db->where('AppliedFor',$cert_type);
            $this->db->where('DeletedDate','0000-00-00 00:00:00');
            if($srchtype=='legal_name')
            {
                $this->db->where('LegalName',$srchvalue);
            }
            else if($srchtype=='email_address')
            {
                $this->db->where('Email',$srchvalue);
            }
            else if($srchtype=='status')
            {
                $this->db->where('Status',$srchvalue);
            }
            else if($srchtype=='Cert_date')
            {
                $this->db->where('CertifiedDate',$srchvalue);
            }
            else if($srchtype=='exp_date')
            {
                $this->db->where('ExpiredDate',$srchvalue);
            }
            else if($srchtype=='renew_date')
            {
                $this->db->where('RenewalDate',$srchvalue);
            }
            $org_mas=$this->db->get();
            // echo $this->db->last_query();
            $org_mas_res = $org_mas->result_array();
                
            
            $final_res[]=array('result'=>$org_mas_res);
            return $final_res;
        }
        
    }
}
?>
