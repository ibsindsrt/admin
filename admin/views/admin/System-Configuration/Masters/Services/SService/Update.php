	<!-- Section -->
		<section id="middle">
			<!-- Page Title -->
			<?php $this->load->view('admin/content-header.php');?>

	<!-- /Page Title -->
			<div class="container padding-30 margin-left-30">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<form action="" method="post" >
							<fieldset>	
								<div class="row">
									<div class="form-group">
										<div class="col-md-4 col-sm-4">
											<label>Main Service</label>										
											<select name="MServiceID" id="mservice_id" class="form-control">
												<?php foreach($a->result() as $row)
												{ echo '<option value="'.$row->MServiceID.'">'.$row->MServiceName.'</option>'; } ?>
													<?php foreach($b->result() as $row)
														{ echo '<option value="'.$row->MServiceID.'">'.$row->MServiceName.'</option>'; } ?>
											</select>
										</div>
									</div>
								</div>
							<?php foreach($a->result() as $row)?>
								
								<div class="row">
									<div class="form-group">
										<div class="col-md-4 col-sm-4">
											<label>Sub Service</label>										
											<input type="text" name="SServiceName" id="sservice_id" placeholder="<?php echo $row->SServiceName;?>" class="form-control"/>
										</div>
									</div>
								</div>
								<?php foreach($a->result() as $row)?>
								
								<div class="row">
									<div class="form-group">
										<div class="col-md-4 col-sm-4">
											<label>Sub Service Description</label>										
											<input type="text" name="SDescription" placeholder="<?php echo $row->SDescription;?>" class="form-control"/>
										</div>
									</div>
								</div>
								
								
								
							</fieldset>
							<div class="text-left margin-top-6" style="margin-left: 3px; color:#C52F33 !important; font-size: 14px !important; font-weight: 700 !important;">
							</div>
							<div class="row margin-top-30">
								<div class="col-md-12 col-sm-12">
									<button type="submit" class="btn btn-primary" data-timeOut="3000" data-notifyType="primary" data-position="top-right" data-message="Success">  
										SUBMIT
									</button>
								</div>
							</div>
						</form>
					</div>	
				</div>
			</div>
		</section>
	<!-- /Section -->
