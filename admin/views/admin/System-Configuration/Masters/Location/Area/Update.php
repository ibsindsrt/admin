<!-- Section -->
<section id="middle">
	<!-- Page Title -->
		<?php $this->load->view('admin/content-header.php');?>

		<?php foreach($a->result() as $row)?>
		
	<!-- /Page Title -->
	<div class="container padding-30 margin-left-30">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<form action="" method="post" >
					<fieldset>
						<div class="row">
							<div class="form-group">
								<div class="col-md-4 col-sm-4">
									<label>COUNTRY</label>										
									<select name="CountryID" id="my_country" class="form-control">                                       
									<?php foreach($a->result() as $row)
										{ echo '<option value="'.$row->CountryID.'">'.$row->CountryName.'</option>'; } ?>
									<?php foreach($b->result() as $row)
										{ echo '<option value="'.$row->CountryID.'">'.$row->CountryName.'</option>'; } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-4 col-sm-4">
									<label>STATE</label>			
									<select name="StateID" id="my_state"  class="form-control ">
									<?php foreach($a->result() as $row)
										{ echo '<option value="'.$row->StateID.'">'.$row->StateName.'</option>'; } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-4 col-sm-4">
									<label>DISTRICT</label>			
									<select name="DistrictID" id="my_district"  class="form-control ">
									<?php foreach($a->result() as $row)
										{ echo '<option value="'.$row->DistrictID.'">'.$row->DistrictName.'</option>';}?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-4 col-sm-4">
									<label>SUBDISTRICT</label>
									<select name="SubDistrictID" id="my_subdistrict"  class="form-control ">
									<?php foreach($a->result() as $row)
										{ echo '<option value="'.$row->SubDistrictID.'">'.$row->SubDistrictName.'</option>'; } ?>	
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-4 col-sm-4">
									<label>CITY</label>
									<select name="CityID" id="my_city"  class="form-control ">
									<?php foreach($a->result() as $row)
										{ echo '<option value="'.$row->CityID.'">'.$row->CityName.'</option>'; } ?>	
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-4 col-sm-4">
									<label>AREA</label>
									<?php foreach($a->result() as $row)?>
									<input type="text" name="AreaName" id="area_id" placeholder="<?php echo $row->AreaName;?>" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-4 col-sm-4">
									<label>PINCODE</label>
									<?php foreach($a->result() as $row)?>
									<input type="text" name="Pincode" id="pincode_area_id" placeholder="<?php echo $row->Pincode;?>" class="form-control"/>
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