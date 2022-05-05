<!-- Display posts list -->

<?php 
// echo $this->session->userdata('checkuser_opt');
// print_r($posts);
foreach($posts as $key1 =>$row){
foreach($row as $row1){
// print_r($row1);	
}}
	// exit
?>
<table class="table table-bordered mb-0">
    <thead style="background: #404e67;color: #fff;">
        <th>Organization ID &nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('id_asc')" id="id_sort_down" style="color: white;"><i class="fas fa-arrow-up"></i></a>&nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('id_desc')" style="color: white;" id="id_sort_up"><i class="fas fa-arrow-down"></i></a>
        </th>
        <th>Organization Name&nbsp;&nbsp; <a href="#" class="sort_link" onclick="orderby('name_asc')" id="name_sort_down" style="color: white;"><i class="fas fa-arrow-up"></i></a>&nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('name_desc')" style="color: white;" id="name_sort_up"><i class="fas fa-arrow-down"></i></a>
        </th> 
        <!-- <th>NCAGE &nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('ncage_asc')" id="ncage_sort_down" style="color: white;"><i class="fas fa-arrow-up"></i></a>&nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('ncage_desc')" style="color: white;" id="ncage_sort_up"><i class="fas fa-arrow-down"></i></a>
        </th> -->
        <th>ALEI &nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('alei_asc')" id="alei_sort_down" style="color: white;"><i class="fas fa-arrow-up"></i></a>&nbsp;&nbsp;<a href="#" class="sort_link" onclick="orderby('alei_desc')" style="color: white;" id="alei_sort_up"><i class="fas fa-arrow-down"></i></a>
        </th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php if(count($posts)>0) { foreach($posts as $row1) {foreach($row1 as $row2){ foreach($row2 as $row){ ?>
            <tr>
                <td>
                    <span style="cursor:pointer" aria-hidden="true" data-toggle="tooltip" data-placement="auto" title="Organization Details" onclick="get_org_details('<?php echo $row['OrganizationID']; ?>')"><?php echo $row['OrganizationID']; ?></span>
                </td>
                <td>
                    <span style="cursor:pointer" aria-hidden="true" data-toggle="tooltip" data-placement="auto" title="Organization Details" onclick="get_org_details('<?php echo $row['OrganizationID']; ?>')"><?php echo $row['LegalName']; ?></span>
                </td>
                <!-- <td><?php echo $row['NCAGE']; ?></td> -->
                <td><?php echo $row['ALEI']; ?></td>
                <td>
                    <div class="dropdown mt-4 mt-sm-0">
                        <a href="#" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background: #404e67;">
                            <i class="dripicons-gear"></i> <i class="mdi mdi-chevron-down"></i>
                        </a>

                        <div class="dropdown-menu" style="">
                            <?php if($this->session->userdata('loginuser_id')==$row['OrganizationID'] || ($this->session->userdata('checkuser_opt')=='individual' && $this->session->userdata('level')=='5')) { ?>
                                <a class="dropdown-item" href="<?php echo base_url().'editorg/org/'.base64_encode($row['OrganizationID']); ?>" target="_blank">Edit</a>
                            <?php } else { ?>
                                <a class="dropdown-item disabled" href="<?php echo base_url().'editorg/org/'.base64_encode($row['OrganizationID']); ?>" target="_blank" title="Login as Organization to Edit">Edit</a>
                            <?php } ?>
                                <a class="dropdown-item" href="<?php echo base_url().'vieworg/org/'.base64_encode($row['OrganizationID']); ?>" target="_blank">Individual List</a>
                                <!-- <a class="dropdown-item disabled" href="<?php echo base_url().'vieworg/org/'.base64_encode($row['OrganizationID']); ?>" target="_blank">Individual List</a> -->
                            <!-- <?php if($this->session->userdata('checkuser_opt')=='organization' || ($this->session->userdata('checkuser_opt')=='individual' && ($this->session->userdata('level')=='5' || $this->session->userdata('level')=='4' || $this->session->userdata('level')=='3'))) { ?>
                                <a class="dropdown-item" href="<?php echo base_url().'addindiv/' ?>" target="_blank">Add Individual</a>
                            <?php } else { ?>
                                <a class="dropdown-item disabled" href="<?php echo base_url().'addindiv/' ?>" target="_blank">Add Individual</a>
                            <?php } ?> -->
                        </div>
                    </div>
                </td>
            </tr>
        <?php }}}}else{ ?>
            <tr><td colspan="5"><center>No search results found.</center></td></tr>
        <?php } ?>
    </tbody>
</table>
<br>
<!-- Render pagination links -->

<?php echo $this->ajax_pagination->create_links(); ?>