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
									<input type="text" name="MServiceName" id="mservice_id" placeholder="-- Main Service --" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-4 col-sm-4">
									<label>Main Service Description</label>										
									<input type="text" name="MDescription" placeholder="-- Main Service Description --" class="form-control"/>
								</div>
							</div>
						</div>
					</fieldset>
					<div class="text-left margin-top-6" style="margin-left: 3px; color:#C52F33 !important; font-size: 14px !important; font-weight: 700 !important;">
						<span id="successMessage"><?php echo $a; ?></span>
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