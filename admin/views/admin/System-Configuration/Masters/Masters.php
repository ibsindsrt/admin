<section id="middle">
<?php $this->load->view('admin/content-header.php');?>
	<div id="content" class="padding-20">
		<div class="row">
			<!-- LEFT -->
			<div class="col-md-6">
				<!-- Location Masters -->
				<div id="panel-graphs-morris-l1" class="panel panel-default">
					<div class="panel-heading">
						<span class="elipsis">
							<!-- panel title -->
							<strong>Location Masters</strong>
						</span>
						<!-- right options -->
						<ul class="options pull-right list-inline">
							<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
							<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
							<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
						</ul>
						<!-- /right options -->
					</div>
					<!-- panel content -->
					<div class="panel-body">
						<div class="col-md-4 margin-top-10">
							<a href="<?php echo site_url('System-Configuration/Masters/Location/Country/')?>" class="opt panel_colapse">
								<div class="bs-glyphicons extra col-md-12">
									<i class="et-map-pin size-30 padding-8" text ></i>
									<span class="glyphicon-class weight-600">Country</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 margin-top-10">
							<a href="<?php echo site_url('System-Configuration/Masters/Location/State/')?>" class="opt panel_colapse">
								<div class="bs-glyphicons extra col-md-12">
									<i class="et-map-pin size-30 padding-8" text ></i>
									<span class="glyphicon-class weight-600">State</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 margin-top-10">
							<a href="<?php echo site_url('System-Configuration/Masters/Location/District/')?>" class="opt panel_colapse">
								<div class="bs-glyphicons extra col-md-12">
									<i class="et-map-pin size-30 padding-8" text ></i>
									<span class="glyphicon-class weight-600">District</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 margin-top-10">
							<a href="<?php echo site_url('System-Configuration/Masters/Location/SubDistrict/')?>" class="opt panel_colapse">
								<div class="bs-glyphicons extra col-md-12">
									<i class="et-map-pin size-30 padding-8" text ></i>
									<span class="glyphicon-class weight-600">Sub District</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 margin-top-10">
							<a href="<?php echo site_url('System-Configuration/Masters/Location/City/')?>" class="opt panel_colapse">
								<div class="bs-glyphicons extra col-md-12">
									<i class="et-map-pin size-30 padding-8" text ></i>
									<span class="glyphicon-class weight-600">City</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 margin-top-10">
							<a href="<?php echo site_url('System-Configuration/Masters/Location/Area/')?>" class="opt panel_colapse">
								<div class="bs-glyphicons extra col-md-12">
									<i class="et-map-pin size-30 padding-8"></i>
									<span class="glyphicon-class weight-600">Area</span>
								</div>
							</a>
						</div>
					</div>
					<!-- /panel content -->
				</div>
				<!-- /Location Masters -->
				<!-- Telecom Masters -->
				<div id="panel-graphs-morris-l1" class="panel panel-default">
					<div class="panel-heading">
						<span class="elipsis">
							<!-- panel title -->
							<strong>Telecom Masters</strong>
						</span>
						<!-- right options -->
						<ul class="options pull-right list-inline">
							<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
							<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
							<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
						</ul>
						<!-- /right options -->
					</div>
					<!-- panel content -->
					<div class="panel-body">
						<div class="col-md-4 margin-top-10">
							<a href="<?php echo site_url('System-Configuration/Masters/Telecom/ServiceProvider/')?>" class="opt panel_colapse">
								<div class="bs-glyphicons extra col-md-12">
									<i class="glyphicon glyphicon-phone size-30 padding-8"></i>
									<span class="glyphicon-class weight-600">Service Provider</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 margin-top-10">
							<a href="<?php echo site_url('System-Configuration/Masters/Telecom/MobileSeries/')?>" class="opt panel_colapse">
								<div class="bs-glyphicons extra col-md-12">
									<i class="glyphicon glyphicon-phone size-30 padding-8"></i>
									<span class="glyphicon-class weight-600">Mobile Series</span>
								</div>
							</a>
						</div>
						<div class="col-md-4 margin-top-10">
							<a href="<?php echo site_url('System-Configuration/Masters/Telecom/Circle/')?>" class="opt panel_colapse">
								<div class="bs-glyphicons extra col-md-12">
									<i class="glyphicon glyphicon-phone size-30 padding-8"></i>
									<span class="glyphicon-class weight-600">Telecom Circle</span>
								</div>
							</a>
						</div>
					</div>
					<!-- /panel content -->
				</div>
				<!-- /Telecom Masters -->
			</div>
			<!-- RIGHT -->
			<div class="col-md-6">
				<!-- Services Masters -->
				<div id="panel-graphs-morris-11" class="panel panel-default">
					<div class="panel-heading">
						<span class="elipsis">
							<!-- panel title -->
							<strong>Services Masters</strong>
						</span>
						<!-- right options -->
						<ul class="options pull-right list-inline">
							<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
							<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
							<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
						</ul>
						<!-- /right options -->
					</div>
					<!-- panel content -->
					<div class="panel-body">
						<div class="col-md-6 margin-top-10">
							<a href="<?php echo site_url('System-Configuration/Masters/Services/Main-Service/')?>" class="opt panel_colapse">
								<div class="bs-glyphicons extra col-md-12">
									<i class="et-gears size-30 padding-8"></i>
									<span class="glyphicon-class weight-600">Main Service</span>
								</div>
							</a>
						</div>
						<div class="col-md-6 margin-top-10">
							<a href="<?php echo site_url('System-Configuration/Masters/Services/Sub-Service/')?>" class="opt panel_colapse">
								<div class="bs-glyphicons extra col-md-12">
									<i class="et-gears size-30 padding-8"></i>
									<span class="glyphicon-class weight-600">Sub Service</span>
								</div>
							</a>
						</div>
					</div>
					<!-- /panel content -->
				</div>
				<!-- /Services Masters -->
			</div>
		</div>
	</div>
</section>
