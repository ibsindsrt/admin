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
									<label>Mobile Series</label>										
									<input type="text" name="MSeriesNo" id="MSeriesNo" class="form-control masked" data-format="99999" data-placeholder="X" placeholder="mobile Series "/>
								</div>
							</div>
						</div>
						
					<div class="row">
							<div class="form-group">
								<div class="col-md-4 col-sm-4">
									<label>Technology</label>										
									<select name="MTechnology" id="MTechnology" class="form-control">
										<option value="">---select---</option>
										<option value="CDMA">CDMA</option>
										<option value="GSM">GSM</option>
								
									</select>
								</div>
							</div>
							</div>
							<div class="row">
							<div class="form-group">
		 						<div class="col-md-4 col-sm-4">
									<label>Circle Name</label>										
									<select name="CircleID" id="CircleID" class="form-control">
										<option value="">---select---</option>
										<?php foreach($b->result() as $row)
											{ echo '<option value="'.$row->CircleID.'">'.$row->CName.'</option>'; } ?>
									</select>
								</div>
							</div>
							</div>
						
							<div class="row">
							<div class="form-group">
								<div class="col-md-4 col-sm-4">
									<label>Brand Name</label>										
									<select name="BrandID" id="BrandID"  class="form-control">
										<option value="">---select---</option>
									<?php foreach($c->result() as $row)
											{ echo '<option value="'.$row->BrandID.'">'.$row->BrandName.'</option>'; } ?>
									</select>
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
