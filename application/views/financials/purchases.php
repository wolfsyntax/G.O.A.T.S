
<div class="container-fluid p-2">
	<div class="row">
		<div class="col">
			
			<section class="">
				<div class="card">
					<div class="card-header">
						Add Goat Purchase
					</div>
					<div class="card-body p-2">
						<?= form_open('',array('class'=>'form')); ?>
							<div class="form-row p-1">
								<div class="col pl-0">
									<div class="row">
										<label class="col-form-label-sm col-3 col-sm-3 col-md-4 col-lg-4">Tag ID <span class="text-danger">*</span></label>								
										<div class="col">
											<input type="text" name="eartag_id" placeholder="Tag ID"  class="form-control" />
										</div>
									</div>
									
								</div>

								<div class="col">
									<div class="row">
										<label class="col-form-label-sm col-3 col-sm-3 col-md-3 col-lg-3">Tag Color <span class="text-danger">*</span></label>								
										<div class="col">
											<select name="tag_color" id="tag_color_select" class="form-control" placeholder="- Enter Tag Color -" required="" value="">

	                                    		<option value="Brown">Brown</option>           
	                        				</select>
										</div>
									</div>
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Gender <span class="text-danger">*</span></label>
								<div class="col">
									<select name="gender" class="custom-select" id="gender">
										<option>- Select a Gender -</option>
										<option value="female">Female</option>
										<option value="male">Male</option>
									</select>

								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Body Color <span class="text-danger">*</span></label>
								<div class="col">
									<select name="body_color" id="body_color_select" class="form-control" placeholder="- Enter Body Color -" required="" value="">

                                    	<option value="Brown">Brown</option>           
                        			</select>

								</div>

							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Birth Date <span class="text-danger">*</span></label>
								<div class="col">
									<input type="date" name="birth_date" value="" placeholder="Date of Birth" class="form-control">
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Birth Weight <span class="text-danger">*</span></label>
								<div class="col">
									<input type="text" name="birth_weight" value="" placeholder="Enter weight in lbs." class="form-control">
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Dam ID <span class="text-danger">*</span></label>
								<div class="col">
									<select name="dam_id" id="dam_id_select" class="form-control" placeholder="- Enter Dam ID -" required="" value="">

                                    	<option value="1">1</option>           
                        			</select>

								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Sire ID <span class="text-danger">*</span></label>
								<div class="col">
									<select name="sire_id" id="sire_id_select" class="form-control" placeholder="- Enter Sire ID -" required="" value="">

                                    	<option value="1">1</option>           
                        			</select>

								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Is castrated ? <span class="text-danger">*</span></label>
								<div class="col">
									<input type="checkbox" name="is_castrated" value="" class="custom-checkbox" id="is_castrated" disabled="">
								</div>
							</div>

							<div class="form-row p-1 float-right w-100">
								<span class="col clearfix"></span>
								<input type="submit" class="btn btn-success col-3" value="Add Goat">
							</div>


							<div class="form-row p-1 float-right w-100">
								&emsp;
							</div>															
						<?= form_close();?>
					</div>
					<div class="card-footer">
						A
					</div>
				</div>
			</section>			
		</div>
	</div>

	<div class="row mt-2">
		<div class="col">
			<div class="card p-1">
				<div class="card-header">
					Purchases
				</div>
				<div class="card-body p-1 bg-light jumbotron mt-1 form-control">	
					No purchases to show.
				</div>

			</div>
		</div>
	</div>
</div>