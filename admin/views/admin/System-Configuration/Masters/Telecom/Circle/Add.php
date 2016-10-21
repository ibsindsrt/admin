
	<!-- Section -->
		<section id="middle">
		<?php $this->load->view('admin/content-header.php');?>
			
	<!-- /Page Title -->
			<div class="container padding-30">
				<div class="row">
					<div class="col-md-10 col-sm-10">
						<form action="" method="post" >
							<fieldset>
								<div class="row">
									<div class="form-group">
										<div class="col-md-4 col-sm-4">
									<label>Circle Name</label>										
									<input type="text" name="CName" id="CName" placeholder="-- Enter Telecom Name --" class="form-control"/>
										</div>
										<div class="col-md-2 col-sm-2">
									<label>Type</label>										
									<select name="CType" id="my_type" class="form-control">
										<option value="">---select---</option>
										<option value="Metro">Metro</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C </option>
									</select>
								</div>
										
										<div class="col-md-2 col-sm-2">
									<label>Code</label>										
									<input type="text" name="Code" id="Code" placeholder="-- Enter Code --" class="form-control"/>
								</div>
									<div class="col-md-4 col-sm-4">
									<label>Basic State</label>										
									<select name="Basic_StateID" id="Basic_StateID"  class="form-control">
										<option value="">---select---</option>
										
										<?php foreach($b->result() as $row)
											{ echo '<option value="'.$row->StateID.'">'.$row->StateName.'</option>'; } ?>
									</select>
								</div>	

									</div>
								</div>
								
								
								<div class="row">
									<div class="form-group">
										<div class="col-md-3 col-sm-3">
									<label>State</label>										
									<select  id="my_state" class="form-control" >
									<option value="">---select---</option>
										
										<?php foreach($b->result() as $row)
											{ echo '<option value="'.$row->StateID.'">'.$row->StateName.'</option>'; } ?>
									</select>
								</div>
										<div class="col-md-3 col-sm-3">
									<label>District</label>			
									<select  id="my_district"  class="form-control ">
										<option value="">---select---</option>
									</select>
								</div>
								<div class="col-md-3 col-sm-3">
									<label>Sub District</label>
									<select  id="my_subdistrict"  class="form-control ">
										<option value="">---select---</option>
									</select>
								</div>
								<div class="col-md-2 col-sm-2">
								<label>CITY</label>
									<select id="my_city"  class="form-control ">
										<option value="">---select---</option>
									</select>
								</div>
										<div class="col-md-1 col-sm-1 text-center">
											<label >Add</label>
											<button type="button" onclick="addcirclelist()" class="glyphicon glyphicon-plus form-control"></button>	
										</div>
										
									</div>
								</div>
								
							</fieldset>
							<div class="text-left margin-top-6" style="margin-left: 3px; color:#C52F33 !important; font-size: 14px !important; font-weight: 700 !important;">
								<span id="successMessage"></span>
							</div>
							<div class="row">
									<div class="table-responsive col-md-12 col-sm-12 margin-top-30">
										<table id="my_table" class="table table-striped table-hover table-bordered nomargin">
											<thead>
												<tr>
								
													<th>State</th>
													<th>District</th>
													<th>Sub District</th>
													<th>City</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
										</table>
									</div>

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
