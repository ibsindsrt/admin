<section id="middle">
	<?php $this->load->view('admin/content-header.php');?>

	<div id="content" class="padding-20">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>Service Provider</strong><!-- panel title -->
				</span>
				<ul class="options pull-right list-inline">
					<a href="<?php echo site_url('System-Configuration/Masters/Telecom/ServiceProvider/Add')?>"  button type="button" class="btn btn-danger raised gradient round btn-3d pull-left">Add Service Provider</a>
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
							<th width="30px">ID</th>
							<th>Brand ID</th>
							<th>Code</th>
							<th>Service Provider</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							foreach ($a->result() as $row) { ?>
						<tr>
							<td class="text-center" style="background-color: #C52F33;"><a href="<?php echo base_url().'System-Configuration/Masters/Telecom/ServiceProvider/Update/'.$row->BrandID;?>" class="fa fa-eyedropper" style="color: #FFFFFF";></a></td>
							<td><?php echo $row->BrandID;?></td>
							<td><?php echo $row->BrandName;?></td>
							<td><?php echo $row->Code;?></td>
							<td><?php echo $row->ServiceProvider;?></td>
							<td><?php echo $row->Description;?></td>
						</tr>
						<?php } ?> 
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>