
<div class="container-fluid p-2">
	<div class="row">
		<div class="col">
			
			<section class="">
				<div class="card">
					<div class="card-header">
						<h3>Add Goat Purchase</h3>
					</div>
					
					<div class="card-body p-2">
						<?= form_open(base_url().'goats/purchase',array('class'=>'form p-5')); ?>

							<div class="form-row p-1">
								<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
							</div>
							
							<div class="form-row p-1">
								<div class="col pl-0">
									<div class="row">
										<label class="col-form-label-sm col-12 col-sm-3 col-md-4 col-lg-4">Tag ID <span class="text-danger">*</span></label>								
										<div class="col">
											<input type="text" name="eartag_id" placeholder="Tag ID"  class="form-control" value="<?= set_value("eartag_id"); ?>"/>

											<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>		
										</div>
									</div>
									
								</div>

								<div class="col">
									<div class="row">
										<label class="col-form-label-sm col-12 col-sm-3 col-md-3 col-lg-3">Tag Color <span class="text-danger">*</span></label>								
										<div class="col">
											<select name="tag_color" id="tag_color_select" class="form-control" placeholder="- Enter Tag Color -" value="<?= set_value('tag_color');?>">

	                                    		<option value="Green">Green</option>           
	                        				</select>
	                        				<?= (form_error('tag_color')	!= "" ? form_error('tag_color') : ''); ?>		
										</div>
									</div>
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-12 col-sm-3 col-md-2 col-lg-2">Gender <span class="text-danger">*</span></label>
								<div class="col">
									<select name="goat_gender" class="form-control py-sm-1" id="gender">
										<option value="">- Select a Gender -</option>
										<option value="female">Female</option>
										<option value="male">Male</option>
									</select>
									<?= form_error('goat_gender') != "" ? form_error('goat_gender') : ' '; ?>		
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-12 col-sm-3 col-md-2 col-lg-2">Body Color <span class="text-danger">*</span></label>
								<div class="col">
									<select name="body_color" id="body_color_select" class="form-control" placeholder="- Enter Body Color -" value="<?= set_value('body_color'); ?>">

                                    	<option value="Brown">Brown</option>           
                        			</select>
                        			<?= (form_error('body_color')	!= "" ? form_error('body_color') : ''); ?>		
								</div>

							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-12 col-sm-3 col-md-2 col-lg-2">Purchase Date <span class="text-danger">*</span></label>
								<div class="col">
									<input type="date" name="purchase_date" value="<?= set_value('purchase_date'); ?>" placeholder="Date of Purchase" class="form-control">
									<?= (form_error('purchase_date') != "" ? form_error('purchase_date') : ''); ?>		
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Purchase Weight <span class="text-danger">*</span></label>
								<div class="col">
									<input type="text" name="purchase_weight" value="<?= set_value('purchase_weight'); ?>" placeholder="Enter weight in kilo" class="form-control">
									<?= (form_error('purchase_weight')	!= "" ? form_error('purchase_weight') : ''); ?>		
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Purchase From <span class="text-danger">*</span></label>
								<div class="col">
									<select name="vendor_name" id="client_select" class="form-control" placeholder="- Vendor -" value="<?= set_value('vendor_name');?>">

                                    	<option value=""></option>           
                        			</select>
                        			<?= (form_error('vendor_name')	!= "" ? form_error('vendor_name') : ''); ?>		
								</div>

							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Price per Kilo<span class="text-danger">*</span></label>
								<div class="col">
									<input type="text" name="purchase_price" value="<?= set_value("purchase_price"); ?>" placeholder="Purchase Price" class="form-control">
									<?= (form_error('purchase_price')	!= "" ? form_error('purchase_price') : ''); ?>		
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Notes</label>
								<div class="col">
									<input type="text" name="description" value="<?= set_value('description'); ?>" placeholder="Other details / Description" class="form-control">
									<?= (form_error('description')	!= "" ? form_error('description') : ''); ?>		
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
