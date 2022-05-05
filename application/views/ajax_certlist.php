<?php 
// echo $this->session->userdata('checkuser_opt');
// print_r($posts);
foreach($posts as $key1 =>$row){
foreach($row as $row1){
// print_r($row1);	
}}
	// exit
?>
<table class="table table-bordered mb-0" style="border-collapse:collapse;">
    <thead style="background: #404e67;color: #fff;">
    	<th>Individual ID</th>
    	<th>Legal Name</th>
    	<th>Email Address</th>
    	<th>Status</th>
    	<th>Certified Date</th>
    	<th>Expired Date</th>
    	<th>Renewal Date</th>
    </thead>
    <tbody>
    	<?php $i=1; if(count($posts)>0) { foreach($posts as $row1) {foreach($row1 as $row2){ foreach($row2 as $row){  ?>
    		<tr data-toggle="collapse" data-target="#<?php echo $i; ?>" class="accordion-toggle">
	    		<td><?php echo $row['IndividualId']; ?></td>
	    		<td><?php echo $row['LegalName']; ?></td>
	    		<td><?php echo $row['Email']; ?></td>
	    		<td><?php echo $row['Status']; ?></td>
	    		<td><?php echo $row['CertifiedDate']; ?></td>
	    		<td><?php echo $row['ExpiredDate']; ?></td>
	    		<td><?php echo $row['RenewalDate']; ?></td>
	    	</tr>
	    	<tr >
            	<td colspan="7" class="hiddenRow">
            		<?php $indid=base64_encode($row['IndividualId']); ?>
            		<div class="accordian-body collapse" id="<?php echo $i; ?>"> 
		            	<a href="<?php echo base_url(); ?>certlist/texteditor/1/<?php echo $indid; ?>" target="_blank"><button type="button" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">Login details</button></a>
		            	<a href="<?php echo base_url(); ?>certlist/texteditor/2/<?php echo $indid; ?>" target="_blank"><button type="button" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">Certificate to users</button></a>
		            	<a href="<?php echo base_url(); ?>certlist/texteditor/3/<?php echo $indid; ?>" target="_blank"><button type="button" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">Enrolment extended mail</button></a>
            		</div> 
            	</td>
        	</tr>
    	<?php $i++; } }}} else{ ?>
    		<tr><td colspan="7"><center>No search results found.</center></td></tr>
    	<?php } ?>
    </tbody>
</table>

<!-- Render pagination links -->

<?php echo $this->ajax_pagination->create_links(); ?>