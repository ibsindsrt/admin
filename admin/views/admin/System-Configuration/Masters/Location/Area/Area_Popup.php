<!-- Section -->
<section id="middle">
	<!-- Page Title -->
		<?php $this->load->view('admin/content-header.php');?>

	<!-- /Page Title -->	
	<div class="alert alert-default">
		<h4><span><strong><?php echo $d['Pincode'];?> </strong></span>is already in Database for Following Cities / Areas.</h4>
		<h5><strong>Do you still want to proceed for</strong> <span><strong><?php echo $d['AreaName'];?>?</span></strong></h5>
		<div class="alert alert-danger" style="background-color:#f6f8f8">
			<div class="table-responsive">
				<table class="table table-bordered nomargin">
					<thead>
						<tr>
							<th>Pincodes</th>
							<th>Area</th>
							<th>Cities</th>
							<th>SubDistricts</th>
							<th>Districts</th>
							<th>States</th>
							<th>Countries</th>
						</tr>
					</thead>
					<tbody>
						<?php  foreach ($c->result() as $row) { ?>
						<tr>
							<td><?php echo $row->Pincode;?></td>
							<td><?php echo $row->AreaName;?></td>
							<td><?php echo $row->CityName;?></td>
							<td><?php echo $row->SubDistrictName;?></td>
							<td><?php echo $row->DistrictName;?></td>
							<td><?php echo $row->StateName;?></td>
							<td><?php echo $row->CountryName;?></td>
						</tr>
						<?php } ?>							
					</tbody>
				</table>
			</div>
		</div>
		<div class="padding-10">
			<a href="<?=base_url('')?>System-Configuration/Masters/Location/Area/Area_Confirmation/yes"  button class="btn btn-danger btn-3d" type="button" style="width:100px;"> Yes </a>&nbsp;&nbsp;
			<a href="<?=base_url('')?>System-Configuration/Masters/Location/Area/Area_Confirmation/"  button class="btn btn-primary btn-3d" type="button" style="width:100px;"> No </a>						
		</div>
	</div>
</section>
<!-- /Section -->
