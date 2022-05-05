<!-- Display posts list -->

<?php 
// echo "<pre>";
// print_r($vieworg);
// exit();
?>
<table class="table table-bordered mb-0">
	<thead style="background: #404e67;color: #fff;">
		<th>Individual ID&nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('id_asc')" id="id_sort_down" style="color: white;"><i class="fas fa-arrow-up"></i></a>&nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('id_desc')" style="color: white;" id="id_sort_up"><i class="fas fa-arrow-down"></i></a></th>
		<th>Email&nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('email_asc')" id="email_sort_down" style="color: white;"><i class="fas fa-arrow-up"></i></a>&nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('email_desc')" style="color: white;" id="email_sort_up"><i class="fas fa-arrow-down"></i></a></th>
		<th>Individual Name&nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('name_asc')" id="name_sort_down" style="color: white;"><i class="fas fa-arrow-up"></i></a>&nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('name_desc')" style="color: white;" id="name_sort_up"><i class="fas fa-arrow-down"></i></a></th>
		<th>Membership</th>
		<th>Certification</th>
		<th>Action</th>
	</thead>
	<tbody>
		 <?php if(count($vieworg)>0) { foreach($vieworg as $row1) {foreach($row1 as $row2){foreach($row2 as $row){

		 	if($row['CertificationType']!='')
		 	{
		 		
		 		$appl=(explode(",", $row['CertificationType']));
		 		$appl_count=count($appl);
		 	}
		 	else
		 	{
		 		$appl_count="0";
		 	}
		 	
		 	  ?>
            <tr>
                <td>
                    <span style="cursor:pointer" aria-hidden="true" data-toggle="tooltip" data-placement="auto" title="Individual Details" onclick="get_indiv_details('<?php echo $row['IndividualId']; ?>')"><?php echo $row['IndividualId']; ?></span>
                </td>
                <td>
                	<?php if($row['EmailAddress']<>"" && ($row['VisibleStatus']=="1" || $row['VisibleStatus']=="" )) 
					{ ?>
						<span style="cursor:pointer" aria-hidden="true" data-toggle="tooltip" data-placement="auto" title="Individual Details" onclick="get_indiv_details('<?php echo $row['IndividualId']; ?>')"><?php echo $row['EmailAddress']; ?></span>

					<?php } 
					else if($row['EmailAddress']<>"" && $row['VisibleStatus']=="0" )
					{ 
						echo "********";
					}
					else if($row['EmailAddress']=="")
					{
					?>
                    <span style="cursor:pointer" aria-hidden="true" data-toggle="tooltip" data-placement="auto" title="Individual Details" onclick="get_indiv_details('<?php echo $row['IndividualId']; ?>')"><?php echo $row['EmailAddress']; ?></span>
                    <?php } ?>
                </td>
                <td>
                    <span style="cursor:pointer" aria-hidden="true" data-toggle="tooltip" data-placement="auto" title="Individual Details" onclick="get_indiv_details('<?php echo $row['IndividualId']; ?>')"><?php echo $row['LegalName']; ?></span>
                </td>
                <td>
                    <span style="cursor:pointer" aria-hidden="true" data-toggle="tooltip" data-placement="auto" title="Individual Details" onclick="get_indiv_details('<?php echo $row['MemberType']; ?>')"><?php echo $row['MemberType']; ?></span>
                </td>
                <?php if($appl_count>0) { echo "<td><table>";  foreach($appl as $res) {  if($res!=''){ echo "<tr><td>"; ?>
                	<?php  
                		if($res=='1')
				 		{
				 			$cert='MDQM';
				 		}
				 		else if($res=='2')
				 		{
				 			$cert='SA';
				 		}
				 		else if($res=='3')
				 		{
				 			$cert='QMDP';
				 		}
				 		else if($res=='4')
				 		{
				 			$cert='DSP';
				 		}
				 		else if($res=='5')
				 		{
				 			$cert='Quality Master Data';
				 		}
				 		else
				 		{
				 			$cert='';
				 		}
                		echo $cert;  
                	?> 
                <?php  echo "</td></tr>"; } } echo "</table></td>"; }  ?>
                <?php if($appl_count==0) { ?>
                <td>
                    <span style="cursor:pointer" aria-hidden="true" data-toggle="tooltip" data-placement="auto" title="Individual Details" onclick="get_indiv_details('<?php echo $row['IndividualId']; ?>')"><?php echo $row['CertificationType']; ?></span>
                </td>
                <?php } ?>
                <?php if($this->session->userdata('checkuser_opt')=='organization') { ?>
                <td>
                	<div class="dropdown mt-4 mt-sm-0">
		                <a href="<?php echo base_url().'editindiv/edit/'.base64_encode($row['IndividualId']); ?>" class="btn" style="background: #404e67;color: #fff;" target="_blank" title="Edit Individual">
		                     <i class="dripicons-document-edit"></i>
		                </a>
		            </div>
                </td>
                <?php }else if($this->session->userdata('checkuser_opt')=='individual' && ($this->session->userdata('level')=='3' || $this->session->userdata('level')=='4' || $this->session->userdata('level')=='5')) { ?>
                <td>
                	<div class="dropdown mt-4 mt-sm-0">
		                <a href="<?php echo base_url().'editindiv/edit/'.base64_encode($row['IndividualId']); ?>" class="btn" style="background: #404e67;color: #fff;" target="_blank" title="Edit Individual">
		                     <i class="dripicons-document-edit"></i>
		                </a>
		            </div>
                </td>
                <?php } elseif($this->session->userdata('checkuser_opt')=='individual' && $this->session->userdata('level')=='5' ) { ?>
                	<td>
                	<div class="dropdown mt-4 mt-sm-0">
		                <a href="<?php echo base_url().'editindiv/edit/'.base64_encode($row['IndividualId']); ?>" class="btn" style="background: #404e67;color: #fff;" target="_blank" data-toggle="tooltip" data-placement="auto" title="Edit Individual">
		                     <i class="dripicons-document-edit"></i>
		                </a>
		            </div>
                </td>
                <?php }else{ ?>
                	<td>
                	<div class="dropdown mt-4 mt-sm-0">
		                <a href="<?php echo base_url().'editindiv/edit/'.base64_encode($row['IndividualId']); ?>" class="btn" style="background: #404e67;color: #fff;pointer-events: none;" target="_blank" >
		                     <i class="dripicons-document-edit"></i>
		                </a>
		            </div>
                </td>
               	<?php } ?>
            </tr> 
        <?php }}}}else{ ?>
            <tr><td colspan="6"><center>No search results found</center></td></tr>
        <?php } ?>
	</tbody>
</table>

<br>
<!-- Render pagination links -->
<?php echo $this->ajax_pagination->create_links(); ?>