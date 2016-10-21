<section id="middle">
			<?php $this->load->view('admin/content-header.php');?>

	<div id="content" class="padding-20">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<ul class="options pull-right list-inline">
					<a href="<?php echo site_url('System-Configuration/Masters/Telecom/Circle/Add')?>"  button type="button" class="btn btn-danger raised gradient round btn-3d pull-left">Add Circle</a>
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
					<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
				</ul>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered table-hover" id="sample_2">
					<thead>
						<tr>
							<th width="5px"></th>
							<th width="5px"></th>
							<th width="30px">ID</th>
							<th>Cirle Name</th>
							<th>Circle Type</th>
							<th>Code</th>
							<th>Basic State</th>
							<th>State</th>
							<th>District</th>
							<th>SubDistrict</th>
							<th>City</th>

						</tr>
					</thead>
					<tbody>
						<?php  
							foreach ($a->result() as $row) {
								
								?>
								<tr>
 <td class="text-center" style="background-color: #C52F33;"><a href="<?php echo site_url('System-Configuration/Masters/Telecom/Circle/Update/')?><?php echo$row->ID;?>" class="fa fa-eyedropper" style="color: #FFFFFF";></a></td>
 <td class="text-center" style="background-color: #C52F33;"><a href="<?php echo site_url('System-Configuration/Masters/Telecom/Circle/delete_telecom_id/')?><?php echo$row->ID;?>" class="fa fa-remove" style="color: #FFFFFF";></a></td>

							<td><?php echo $row->CircleID;?></td>
							<td><?php echo $row->CName;?></td>
							<td><?php echo $row->CType;?></td>
							<td><?php echo $row->Code;?></td>
							<td><?php echo $row->BasicState;?></td>
							<td><?php echo $row->StateName;?></td>
							<td><?php echo $row->DistrictName;?></td>
							<td><?php echo $row->SubDistrictName;?></td>
							<td><?php echo $row->CityName;?></td>

						
						
						</tr>
						<?php } ?> 
					</tbody>
				</table>
			</div>


<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Details</h4>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
				<table class="table table-striped table-bordered table-hover" id="idforcirclemodal">
								<thead>
									<tr>
										<th class="text-center">Itmes</th>
																	
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
	</div>

			<!-- Modal Footer -->
			<div class="modal-footer">
				<button type="button" onclick="cleartable()"  class="btn btn-default" data-dismiss="modal">Close</button>

			</div>

		</div>
	</div>
</div>


		</div>
	</div>
</section>
