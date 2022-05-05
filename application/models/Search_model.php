<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ini_set('memory_limit', '-1');

class Search_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function orgsrch_count($data)
    {

        foreach($data as $res)
        {
            $srchvalue=$res['srchvalue'];
            $srchtype=$res['srchtype'];
            $searchBy=$res['srchby'];
            $chk_ncage=$res['chk_ncage'];
        }
        if($srchvalue=='')
        {
            $this->db->select('*');
            $this->db->from('organization_master');
            $this->db->where('LegalName<>','');
            $this->db->where('DeletedDate','0000-00-00 00:00:00');
            if($chk_ncage=='')
            {
                $this->db->where('NCAGE','0');
            }
            $org_mas=$this->db->get();
            return $org_mas->num_rows();
        }
        elseif ($srchvalue<>"")
        {    
            if($searchBy=='organization' || $searchBy=='org_id' || $searchBy=='username')  
            {
                if($chk_ncage=='')
                {
                    $ncage= "and b.NCAGE='0'";
                }
                else
                {
                    $ncage= "";
                }
                if($searchBy=='organization')
                {
                    if($srchtype=='Equals')
                    {
                        $db="SELECT b.OrganizationID from organization_master b where b.LegalName='$srchvalue' and b.DeletedDate='0000-00-00 00:00:00' $ncage";
                    }
                    else if($srchtype=='starts')
                    {
                        $db="SELECT b.OrganizationID from organization_master b where b.LegalName like '$srchvalue%' and b.DeletedDate='0000-00-00 00:00:00' $ncage";
                    }
                    else
                    {
                        $db="SELECT b.OrganizationID from organization_master b where b.LegalName like '%$srchvalue%' and b.DeletedDate='0000-00-00 00:00:00' $ncage";
                    }
                }
                if($searchBy=='org_id')
                {
                    $srchvalue='0161-1#OG-'.$srchvalue.'#1';
                    if($srchtype=='Equals')
                    {
                         $db="SELECT b.OrganizationID from organization_master b where b.OrganizationId='$srchvalue' and b.DeletedDate='0000-00-00 00:00:00' $ncage";
                    }
                }
                
                $res=$this->db->query($db);
                $result=$res->num_rows();  
                return $result;
            }
            else if($searchBy=='ALEI' || $searchBy=='NCAGE')
            {
                if($chk_ncage=='')
                {
                    $ncage= "and b.NCAGE='0'";
                }
                else
                {
                    $ncage= "";
                }
                if($searchBy=='ALEI')
                {
                    if($srchtype=='Equals')
                    {
                        $db="SELECT b.OrganizationID from organization_master b where b.ALEI='$srchvalue' and b.DeletedDate='0000-00-00 00:00:00' $ncage";
                    }
                    else if($srchtype=='starts')
                    {
                        $db="SELECT b.OrganizationID from organization_master b where b.ALEI like '$srchvalue%' and b.DeletedDate='0000-00-00 00:00:00' $ncage";
                    }
                    else
                    {
                       $db="SELECT b.OrganizationID from organization_master b where b.ALEI like '%$srchvalue%' and b.DeletedDate='0000-00-00 00:00:00' $ncage";
                    }
                }
                if($searchBy=='NCAGE')
                {
                    if($srchtype=='Equals')
                    {
                       $db="SELECT b.OrganizationID from organization_master b where b.NCAGE='$srchvalue' and b.DeletedDate='0000-00-00 00:00:00' $ncage";
                    }
                    else if($srchtype=='starts')
                    {
                        $db="SELECT b.OrganizationID from organization_master b where b.NCAGE like '$srchvalue%' and b.DeletedDate='0000-00-00 00:00:00' $ncage";
                    }
                    else
                    {
                        $db="SELECT b.OrganizationID from organization_master b where b.NCAGE like '%$srchvalue%' and b.DeletedDate='0000-00-00 00:00:00' $ncage";
                    }
                }
               
                $res=$this->db->query($db);
                $result=$res->num_rows();  
                return $result;
            }
        } 
    }


    public function org_tblsrch($data)
    {
        // pre($data);
        foreach($data as $res)
        {
            $offset=$res['start'];
            $limit=$res['limit'];
            $srchvalue=$res['srchvalue'];
            $srchtype=$res['srchtype'];
            $sort=$res['sort'];
            $column=$res['column'];
            $searchBy=$res['srchby'];
            $chk_ncage=$res['chk_ncage'];
        }



        if($srchvalue=='')
        {
            if($sort=='')
            {
                $sortby='OrganizationID ASC'; 
            }
            else
            {
                if($column=='id')
                {
                    $sortby="OrganizationId";
                }
                if($column=='name')
                {
                    $sortby="LegalName";
                }
                if($column=='alei')
                {
                    $sortby="ALEI";
                }
                if($column=='ncage')
                {
                    $sortby="NCAGE";
                }
            }
            
            
            $this->db->select('OrganizationID');
            $this->db->select('LegalName');
            $this->db->select('ALEI');
            $this->db->select('NCAGE');
            $this->db->from('organization_master');
            $this->db->where('LegalName<>','');
            $this->db->where('DeletedDate','0000-00-00 00:00:00');
            if($chk_ncage=='')
            {
                $this->db->where('NCAGE','0');
            }
            
            $this->db->limit($limit,$offset); 
            $this->db->order_by($sortby, $sort);
            $org_mas=$this->db->get();
            // echo $this->db->last_query();
            $org_mas_res = $org_mas->result_array();
                
            
            $final_res[]=array('result'=>$org_mas_res);
            return $final_res;
            
        }
        elseif ($srchvalue<>"")
        {    
            if($sort=='')
            {
                $sortby='OrganizationID ASC'; 
            }
            else
            {
                if($column=='id')
                {
                    $sortby="OrganizationId";
                }
                if($column=='name')
                {
                    $sortby="LegalName";
                }
                if($column=='alei')
                {
                    $sortby="ALEI";
                }
                if($column=='ncage')
                {
                    $sortby="NCAGE";
                }
            }
            
            $this->db->select('OrganizationID');
            $this->db->select('LegalName');
            $this->db->select('ALEI');
            $this->db->select('NCAGE');
            $this->db->from('organization_master');
            $this->db->where('LegalName<>','');
            $this->db->where('DeletedDate','0000-00-00 00:00:00');
            if($chk_ncage=='')
            {
                $this->db->where('NCAGE','0');
            }
            
           

            if($searchBy=='organization')
            {
                if($srchtype=='Equals')
                {
                    $this->db->where('LegalName', $srchvalue);
                }
                else if($srchtype=='starts')
                {
                    $this->db->like('LegalName',$srchvalue,'after');
                }
                else
                {
                    $this->db->like('LegalName', $srchvalue);
                }
            }
            if($searchBy=='org_id')
            {
                $srchvalue='0161-1#OG-'.$srchvalue.'#1';
                if($srchtype=='Equals')
                {
                    $this->db->where('OrganizationId', $srchvalue);
                }
            }
            if($searchBy=='ALEI')
            {
                if($srchtype=='Equals')
                {
                    $this->db->where('ALEI',$srchvalue);
                }
                else if($srchtype=='starts')
                {
                    $this->db->like('ALEI',$srchvalue,'after');
                }
                else
                {
                    $this->db->like('ALEI',$srchvalue);
                }
            }
            if($searchBy=='NCAGE')
            {
                if($srchtype=='Equals')
                {
                    $this->db->where('NCAGE',$srchvalue);
                }
                else if($srchtype=='starts')
                {
                    $this->db->like('NCAGE',$srchvalue,'after');
                }
                else
                {
                    $this->db->like('NCAGE',$srchvalue);
                }
            }
            $this->db->limit($limit,$offset); 
            $this->db->order_by($sortby, $sort);
            $org_mas=$this->db->get();
            // echo $this->db->last_query();
            echo "<br>";
            // exit;
            $org_mas_res = $org_mas->result_array();
            if(count($org_mas_res)>0)
            {
                $final_res[]=array('result'=>$org_mas_res);
                return $final_res;
            }
            else
            {
                $db=array();
                return $db;
            }                
        }  
    }  
}
?>