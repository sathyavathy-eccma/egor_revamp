<?php


class Vieworg_model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function orgindiv_count($data)
    {
      
        $username=$this->session->userdata('username');
        foreach($data as $res)
        {
            $org_id=$res['orgid'];
            $srchtype=$res['srchtype'];
            $srchvalue=$res['srchvalue'];
            $member_type=$res['member_type'];
            $certification=$res['certification'];
            $searchBy=$res['srchby'];

        }
        if($srchvalue=='')
        {
            if ($member_type!='Select' && $certification!='Select')
            {
                $where=" and a.MemberType='$member_type' and a.CertificationType like '%$certification%'";
                $indiv_mas_res=$this->db->query("SELECT a.* from individual_master a where OrganizationId='$org_id' $where ");
                
                $result=$indiv_mas_res->num_rows();  
                return $result;    
            }
            else if($member_type!='Select')
            {
                $where=" and a.MemberType='$member_type'";
                $indiv_mas_res=$this->db->query("SELECT a.* from individual_master a where OrganizationId='$org_id' $where ");
                $result=$indiv_mas_res->num_rows();  
                return $result;
            }
            else if($certification!='Select')
            {
                $where=" and a.CertificationType like '%$certification%'";
                $indiv_mas_res=$this->db->query("SELECT a.* from individual_master a where OrganizationId='$org_id' $where ");
                $result=$indiv_mas_res->num_rows();  
                return $result;
            }
            else
            {
                $this->db->select('*');
                $this->db->from('individual_master');
                $this->db->where('DeletedDate','0000-00-00 00:00:00' );
                $this->db->where('UserStatus','0' );
                $this->db->where('OrganizationId',$org_id );

                $indivsrch= $this->db->get();
                $indiv_mas_res = $indivsrch->num_rows();
                return $indiv_mas_res;
            }
        }
        else
        {
            if(($srchtype=='Individual_id' || $srchtype=='email_address' || $srchtype=='Full_name') && $srchvalue!='')  
            {
                if($member_type!='Select' && $certification!='Select')
                {
                    if($srchtype=='Individual_id' && $searchBy=='equals')
                    {
                        $where=" and a.IndividualId='$srchvalue' and a.CertificationType like '%$certification%' and MemberType='$member_type'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='start')
                    {
                        $where=" and a.IndividualId like '$srchvalue%' and a.CertificationType like '%$certification%' and MemberType='$member_type'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='like')
                    {
                        $where=" and a.IndividualId like '%$srchvalue%' and a.CertificationType like '%$certification%' and MemberType='$member_type'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='equals')
                    {
                        $where=" and a.EmailAddress='$srchvalue' and a.CertificationType like '%$certification%' and MemberType='$member_type'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='start')
                    {
                        $where=" and a.EmailAddress like '$srchvalue%' and a.CertificationType like '%$certification%' and MemberType='$member_type'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='like')
                    {
                        $where=" and a.EmailAddress like '%$srchvalue%' and a.CertificationType like '%$certification%' and MemberType='$member_type'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='equals')
                    {
                        $where=" and a.LegalName='$srchvalue' and a.CertificationType like '%$certification%' and MemberType='$member_type'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='start')
                    {
                        $where=" and a.LegalName like '$srchvalue%' and a.CertificationType like '%$certification%' and MemberType='$member_type'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='like')
                    {
                        $where=" and a.LegalName like '%$srchvalue%' and a.CertificationType like '%$certification%' and MemberType='$member_type'";
                    }
                    $indiv_mas_res=$this->db->query("SELECT a.* from individual_master a where a.OrganizationId='$org_id' $where ");
                    return $indiv_mas_res->num_rows();
                }
                else if($member_type!='Select')
                {
                    if($srchtype=='Individual_id' && $searchBy=='equals')
                    {
                        $where=" and a.MemberType='$member_type' and a.IndividualId='$srchvalue'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='start')
                    {
                        $where=" and a.MemberType='$member_type' and a.IndividualId like '$srchvalue%'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='like')
                    {
                        $where=" and a.MemberType='$member_type' and a.IndividualId like '%$srchvalue%'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='equals')
                    {
                        $where=" and a.MemberType='$member_type' and a.EmailAddress='$srchvalue'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='start')
                    {
                        $where=" and a.MemberType='$member_type' and a.EmailAddress like '$srchvalue%'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='like')
                    {
                        $where=" and a.MemberType='$member_type' and a.EmailAddress like '%$srchvalue%'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='equals')
                    {
                        $where=" and a.MemberType='$member_type' and a.LegalName='$srchvalue'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='start')
                    {
                        $where=" and a.MemberType='$member_type' and a.LegalName like '$srchvalue%'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='like')
                    {
                        $where=" and a.MemberType='$member_type' and a.LegalName like '%$srchvalue%'";
                    }
                    $indiv_mas_res=$this->db->query("SELECT a.* from individual_master a where a.OrganizationId='$org_id' $where ");
                    return $indiv_mas_res->num_rows();
                    
                }
                else if($certification!='Select')
                {
                    if($srchtype=='Individual_id' && $searchBy=='equals')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.IndividualId='$srchvalue'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='start')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.IndividualId like '$srchvalue%'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='like')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.IndividualId like '%$srchvalue%'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='equals')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.EmailAddress='$srchvalue'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='start')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.EmailAddress like '$srchvalue%'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='like')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.EmailAddress like '%$srchvalue%'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='equals')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.LegalName='$srchvalue'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='start')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.LegalName like '$srchvalue%'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='like')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.LegalName like '%$srchvalue%'";
                    }
                    $indiv_mas_res=$this->db->query("SELECT a.* from individual_master a where a.OrganizationId='$org_id' $where ");
                    return $indiv_mas_res->num_rows();
                }
                else
                {
                    $this->db->select('*');
                    $this->db->from('individual_master');
                    $this->db->where('DeletedDate', '0000-00-00 00:00:00');
                    $this->db->where('UserStatus','0' );
                    $this->db->where('OrganizationId',$org_id );
                    if($srchtype=='Individual_id')
                    {
                        if($searchBy=='equals')
                        {
                            $this->db->where('IndividualId', $srchvalue);
                        }
                        else if($searchBy=='start')
                        {
                            $this->db->like('IndividualId', $srchvalue,'after');
                        }
                        else
                        {
                            $this->db->like('IndividualId', $srchvalue);
                        }
                    }
                    if($srchtype=='email_address')
                    {
                        if($searchBy=='equals')
                        {
                            $this->db->where('EmailAddress', $srchvalue);
                        }
                        else if($searchBy=='start')
                        {
                            $this->db->like('EmailAddress', $srchvalue,'after');
                        }
                        else
                        {
                            $this->db->like('EmailAddress', $srchvalue);
                        }
                    }
                    if($srchtype=='Full_name')
                    {
                        if($searchBy=='equals')
                        {
                            $this->db->where('LegalName', $srchvalue);
                        }
                        else if($searchBy=='start')
                        {
                            $this->db->like('LegalName', $srchvalue,'after');
                        }
                        else
                        {
                            $this->db->like('LegalName', $srchvalue);
                        }
                    }
                    // echo "sdgvfrg";
                    $indiv_mas=$this->db->get();
                    // echo $this->db->last_query();
                    return $indiv_mas->num_rows();
                }               
            }
        }
    }

    public function orgindiv_tblsrch($data)
    {
        // print_r($data);
        // exit;
        $final_arr_res=array();
        $username=$this->session->userdata('username');
        foreach($data as $res)
        {
            $offset=$res['start'];
            $limit=$res['limit'];
            $org_id=$res['orgid'];
            $srchtype=$res['srchtype'];
            $srchvalue=$res['srchvalue'];
            $member_type=$res['member_type'];
            $certification=$res['certification'];
            $searchBy=$res['srchby'];
            $sort=$res['sort'];
            $column=$res['column'];
            // echo "dsghsfrh=".$org_id;
        }

        if($sort=='')
        {
            $sortby='OrganizationID ASC'; 
        }
        else
        {
            if($column=='id')
            {
                $sortby="IndividualId";
            }
            if($column=='email')
            {
                $sortby="EmailAddress";
            }
            if($column=='name')
            {
                $sortby="Username";
            }
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
                    $sortby="IndividualId";
                }
                if($column=='email')
                {
                    $sortby="EmailAddress";
                }
                if($column=='name')
                {
                    $sortby="Username";
                }
            }

            if($member_type!='Select' && $certification!='Select')
            {
                $indivsrch1=$this->db->query("SELECT a.`IndividualId`,LegalName, EmailAddress, MemberType,CertificationType,VisibleStatus from individual_master a where a.OrganizationId='$org_id' and a.DeletedDate='0000-00-00 00:00:00' and a.CertificationType like '%$certification%' and a.MemberType='$member_type' ORDER BY $sortby $sort limit $offset,$limit");

                $indiv_mas_res1 = $indivsrch1->result_array();
                if(count($indiv_mas_res1)>0 )
                {
                    $final_res[]=array("result"=>$indiv_mas_res1);
                    return $final_res;  
                }
                else
                {
                    $db=array();
                    return $db;
                }
            }
            else if($member_type!='Select')
            {
                $indivsrch1=$this->db->query("SELECT `IndividualId`,LegalName, EmailAddress, MemberType,CertificationType,VisibleStatus from individual_master where OrganizationId='$org_id' and DeletedDate='0000-00-00 00:00:00' and MemberType='$member_type' ORDER BY $sortby $sort limit $offset,$limit");

                $indiv_mas_res1 = $indivsrch1->result_array();
                if(count($indiv_mas_res1)>0 )
                {
                    $final_res[]=array("result"=>$indiv_mas_res1);
                    return $final_res;  
                }
                else
                {
                    $db=array();
                    return $db;
                }
            }
            else if($certification!='Select')
            {
                $indivsrch1=$this->db->query("SELECT a.`IndividualId`,LegalName, EmailAddress, MemberType,CertificationType,VisibleStatus from individual_master a where a.OrganizationId='$org_id' and a.DeletedDate='0000-00-00 00:00:00' and a.CertificationType like '%$certification%' ORDER BY $sortby $sort limit $offset,$limit");
                $indiv_mas_res1 = $indivsrch1->result_array();
                if(count($indiv_mas_res1)>0 )
                {
                    $final_res[]=array("result"=>$indiv_mas_res1);
                    return $final_res;  
                }
                else
                {
                    $db=array();
                    return $db;
                }
            }
            else
            {
                $this->db->select('IndividualId');
                $this->db->select('LegalName');
                $this->db->select('EmailAddress');
                $this->db->select('MemberType');
                $this->db->select('CertificationType');
                $this->db->select('VisibleStatus');
                $this->db->from('individual_master');
                $this->db->where('DeletedDate','0000-00-00 00:00:00' );
                $this->db->where('OrganizationId',$org_id );
                $this->db->where('UserStatus','0' );
                $this->db->limit($limit,$offset); 
                $this->db->order_by($sortby, $sort);
                $indivsrch= $this->db->get();
                // echo $this->db->last_query();
                $indiv_mas_res = $indivsrch->result_array();
                if(count($indiv_mas_res)>0 )
                {
                    
                    $final_res[]=array("result"=>$indiv_mas_res);
                    return $final_res;    
                }
                else
                {
                    $db=array();
                    return $db;
                }
            }
            
        }
        else
        {
            if(($srchtype=='Individual_id' || $srchtype=='email_address' || $srchtype=='Full_name') && $srchvalue!='')  
            {
                if($member_type!='Select' && $certification!='Select')
                {
                    if($srchtype=='Individual_id' && $searchBy=='equals')
                    {
                        $where=" and a.IndividualId='$srchvalue' and a.CertificationType like '%$certification%' and a.MemberType='$member_type'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='start')
                    {
                        $where=" and a.IndividualId like '$srchvalue%' and a.CertificationType like '%$certification%' and a.MemberType='$member_type'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='like')
                    {
                        $where=" and a.IndividualId like '%$srchvalue%' and a.CertificationType like '%$certification%' and a.MemberType='$member_type'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='equals')
                    {
                        $where=" and a.EmailAddress='$srchvalue' and a.CertificationType like '%$certification%' and a.MemberType='$member_type'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='start')
                    {
                        $where=" and a.EmailAddress like '$srchvalue%' and a.CertificationType like '%$certification%' and a.MemberType='$member_type'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='like')
                    {
                        $where=" and a.EmailAddress like '%$srchvalue%' and a.CertificationType like '%$certification%' and a.MemberType='$member_type'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='equals')
                    {
                        $where=" and a.LegalName='$srchvalue' and a.CertificationType like '%$certification%' and a.MemberType='$member_type'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='start')
                    {
                        $where=" and a.LegalName like '$srchvalue%' and a.CertificationType like '%$certification%' and a.MemberType='$member_type'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='like')
                    {
                        $where=" and a.LegalName like '%$srchvalue%' and a.CertificationType like '%$certification%' and a.MemberType='$member_type'";
                    }
                    $indiv_mas_resss=$this->db->query("SELECT a.* from individual_master a  where a.OrganizationId='$org_id' $where ORDER BY $sortby $sort limit $offset,$limit");
                    $indiv_mas_res5=$indiv_mas_resss->result_array();
                    if(count($indiv_mas_res5)>0)
                    {
                        $final_res[]=array("result"=>$indiv_mas_res5);
                        return $final_res;    
                    }
                    else
                    {
                        $db=array();
                        return $db;

                    }
                    
                }
                else if($member_type!='Select')
                {
                    if($srchtype=='Individual_id' && $searchBy=='equals')
                    {
                        $where=" and a.MemberType='$member_type' and a.IndividualId='$srchvalue'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='start')
                    {
                        $where=" and a.MemberType='$member_type' and a.IndividualId like '$srchvalue%'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='like')
                    {
                        $where=" and a.MemberType='$member_type' and a.IndividualId like '%$srchvalue%'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='equals')
                    {
                        $where=" and a.MemberType='$member_type' and a.EmailAddress='$srchvalue'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='start')
                    {
                        $where=" and a.MemberType='$member_type' and a.EmailAddress like '$srchvalue%'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='like')
                    {
                        $where=" and a.MemberType='$member_type' and a.EmailAddress like '%$srchvalue%'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='equals')
                    {
                        $where=" and a.MemberType='$member_type' and a.LegalName ='$srchvalue'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='start')
                    {
                        $where=" and a.MemberType='$member_type' and a.LegalName like '$srchvalue%'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='like')
                    {
                        $where=" and a.MemberType='$member_type' and a.LegalName like '%$srchvalue%'";
                    }
                    else
                    {
                        $where='';
                    }
                    $indiv_mas_ress=$this->db->query("SELECT a.* from individual_master a where a.OrganizationId='$org_id' $where ORDER BY $sortby $sort limit $offset,$limit");
                    $indiv_mas_res3=$indiv_mas_ress->result_array();
                  
                    if(count($indiv_mas_res3)>0)
                    {
                        $final_res[]=array("result"=>$indiv_mas_res3);
                        return $final_res; 
                    }
                    else
                    {
                        $db1=array();
                        return $db1;
                    }
                }
                else if($certification!='Select')
                {
                    if($srchtype=='Individual_id' && $searchBy=='equals')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.IndividualId='$srchvalue'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='start')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.IndividualId like '$srchvalue%'";
                    }
                    else if($srchtype=='Individual_id' && $searchBy=='like')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.IndividualId like '%$srchvalue%'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='equals')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.EmailAddress='$srchvalue'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='start')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.EmailAddress like '$srchvalue%'";
                    }
                    else if($srchtype=='email_address' && $searchBy=='like')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.EmailAddress like '%$srchvalue%'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='equals')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.LegalName='$srchvalue'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='start')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.LegalName like '$srchvalue%'";
                    }
                    else if($srchtype=='Full_name' && $searchBy=='like')
                    {
                        $where=" and a.CertificationType like '%$certification%' and a.LegalName like '%$srchvalue%'";
                    }
                    else
                    {
                        $where='';
                    }
                    
                    $indiv_mas_res_cert=$this->db->query("SELECT a.* from individual_master a where a.OrganizationId='$org_id' $where ORDER BY $sortby $sort limit $offset,$limit");
                    $indiv_mas_res4=$indiv_mas_res_cert->result_array();
                    if(count($indiv_mas_res4)>0)
                    {
                        $final_res[]=array("result"=>$indiv_mas_res4);
                        return $final_res;     
                    }
                    else
                    {
                        $db=array();
                        return $db;
                    }
                }
                else
                {
                    $this->db->select('*');
                    $this->db->from('individual_master');
                    $this->db->where('DeletedDate', '0000-00-00 00:00:00');
                    $this->db->where('UserStatus','0' );
                    $this->db->where('OrganizationId',$org_id );
                    
                    if($srchtype=='Individual_id')
                    {
                        if($searchBy=='equals')
                        {
                            $this->db->where('IndividualId', $srchvalue);
                        }
                        else if($searchBy=='start')
                        {
                            $this->db->like('IndividualId', $srchvalue,'after');
                        }
                        else
                        {
                            $this->db->like('IndividualId', $srchvalue);
                        }
                    }
                    if($srchtype=='email_address')
                    {
                        if($searchBy=='equals')
                        {
                            $this->db->where('EmailAddress', $srchvalue);
                        }
                        else if($searchBy=='start')
                        {
                            $this->db->like('EmailAddress', $srchvalue,'after');
                        }
                        else
                        {
                            $this->db->like('EmailAddress', $srchvalue);
                        }
                    }
                    if($srchtype=='Full_name')
                    {
                        if($searchBy=='equals')
                        {
                            $this->db->where('LegalName', $srchvalue);
                        }
                        else if($searchBy=='start')
                        {
                            $this->db->like('LegalName', $srchvalue,'after');
                        }
                        else
                        {
                            $this->db->like('LegalName', $srchvalue);
                        }
                    }
                    $this->db->limit($limit,$offset); 
                    $this->db->order_by($sortby, $sort);
                    $indiv_mas2=$this->db->get();
                    // echo $this->db->last_query();
                    $indiv_mas_res=$indiv_mas2->result_array();
                    // echo "jbnkjhk";
                    if(count($indiv_mas_res)>0)
                    {
                       
                        $final_res[]=array("result"=>$indiv_mas_res);
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
    }
}
?>