
<div class="container-fluid p-2">
	<div class="row">
		<div class="col">
			
			<section class="">
				<div class="card">
					<div class="card-header">
						<h3>Add Goat Purchase</h3>
						<span class="text-muted form-text">Add newly purchase Goat</span>
					</div>
					
					<div class="card-body p-2">
						<?= form_open(base_url().'goats/new/purchase',array('class'=>'form p-5',"onsubmit"=>"return check_form();")); ?>

							<div class="form-row p-1">
								<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
							</div>
							
							<div class="form-row p-1">
								<div class="col pl-0">
									<div class="row">
										<label class="col-form-label-sm col-12 col-sm-3 col-md-4 col-lg-4">Tag ID <span class="text-danger">*</span></label>								
										<div class="col">
											<input type="text" name="eartag_id" placeholder="Tag ID"  class="form-control" value="<?= set_value("eartag_id"); ?>" required/>

											<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>		
										</div>
									</div>
									
								</div>

								<div class="col">
									<div class="row">
										<label class="col-form-label-sm col-12 col-sm-3 col-md-3 col-lg-3">Tag Color <span class="text-danger">*</span></label>								
										<div class="col">
											<select name="eartag_color" id="tag_color_select" class="form-control" placeholder="- Enter Tag Color -" value="<?= set_value('eartag_color');?>" required>

	                                    		<option value="green">Green</option> 
	                                    		<option value="yellow">Yellow</option>
	                                    		<option value="orange">Orange</option>
	                                    		<option value="blue">Blue</option>      
	                                    		     
	                        				</select>
	                        				<?= (form_error('eartag_color')	!= "" ? form_error('eartag_color') : ''); ?>		
										</div>
									</div>
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-12 col-sm-3 col-md-2 col-lg-2">Gender <span class="text-danger">*</span></label>
								<div class="col">
									<select name="gender" class="form-control py-sm-1" id="gender" required>
										<option value="">- Select a Gender -</option>
										<option value="female">Female</option>
										<option value="male">Male</option>
									</select>
									<?= form_error('gender') != "" ? form_error('gender') : ' '; ?>		
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-12 col-sm-3 col-md-2 col-lg-2">Body Color <span class="text-danger">*</span></label>
								<div class="col">
									<select name="body_color" id="body_color_select" class="form-control" placeholder="- Enter Body Color -" value="<?= set_value('body_color'); ?>" required>

                                    	<option value="Brown">Brown</option>           
                        			</select>
                        			<?= (form_error('body_color')	!= "" ? form_error('body_color') : ''); ?>		
								</div>

							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-12 col-sm-3 col-md-2 col-lg-2">Purchase Date <span class="text-danger">*</span></label>
								<div class="col">
									<input type="date" name="purchase_date" value="<?= set_value('purchase_date'); ?>" placeholder="Date of Purchase" class="form-control" onchange="check_date_format(this);" required>
									<span id="date_checker"><?= (form_error('purchase_date') != "" ? form_error('purchase_date') : ''); ?></span>
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Purchase Weight <span class="text-danger">*</span></label>
								<div class="col">
									<input type="text" name="purchase_weight" value="<?= set_value('purchase_weight'); ?>" placeholder="Enter weight in kilo" class="form-control" required>
									<?= (form_error('purchase_weight')	!= "" ? form_error('purchase_weight') : ''); ?>		
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Purchase From <span class="text-danger">*</span></label>
								<div class="col">
									<select name="purchase_from" id="client_select" class="form-control" placeholder="- Vendor -" value="<?= set_value('purchase_from');?>" required>

                                    	<option value=""></option>           
                        			</select>

                        			<?= (form_error('purchase_from')	!= "" ? form_error('purchase_from') : ''); ?>		
								</div>

							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Price per Kilo<span class="text-danger">*</span></label>
								<div class="col">
									<input type="text" name="purchase_price" value="<?= set_value("purchase_price"); ?>" placeholder="Purchase Price" class="form-control" required>

									<?= (form_error('purchase_price')	!= "" ? form_error('purchase_price') : ''); ?>		
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
								<input type="submit" class="btn btn-success col-3 btn-js" value="Add Goat" name="submit" id="buy_submit">
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
