<section id="middle">
<?php $this->load->view('admin/content-header.php');?>
	<div id="content" class="padding-20">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>Main Service Master</strong><!-- panel title -->
				</span>
				<ul class="options pull-right list-inline">
					<a href="<?php echo site_url('System-Configuration/Masters/Services/Main-Service/Add/')?>"  button type="button" class="btn btn-danger raised gradient round btn-3d pull-left">Add Main Service</a>
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
					<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
				</ul>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered table-hover" id="mservice_databasetable">
					<thead>
						<tr>
							<th width="5px"></th>
							<th width="30px">ID</th>
							<th>Main Services</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							foreach ($a->result() as $row) { ?>
						<tr>
							<td class="text-center" style="background-color: #C52F33;"><a href="<?php echo site_url('System-Configuration/Masters/Services/Main-Service/Update/').$row->MServiceID;?>" class="fa fa-eyedropper" style="color: #FFFFFF";></a></td>
							<td><?php echo $row->MServiceID;?></td>
							<td><?php echo $row->MServiceName;?></td>
							<td><?php echo $row->MDescription;?></td>
						</tr>
						<?php } ?> 
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>