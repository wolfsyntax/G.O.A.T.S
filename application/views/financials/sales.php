<div class="container-fluid p-2">
	<div class="row">
		<div class="col">
			<section class="">
				<div class="card">
					<div class="card-header">
						<h3>Add Goat Sales</h3>
					</div>
					
					<div class="card-body p-2">
						<?= form_open(base_url().'goats/sales', array('class'=>'form p-5','style'=>''));?>
							
							<div class="form-row p-1">
								<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Tag ID <span class="text-danger">*</span></label>								
								<div class="col">
									<select name="eartag_id" id="goat_id_select" class="form-control" placeholder="- Enter Ear Tag ID -" value="<?= set_value('eartag_id'); ?>">

                                    	<?php foreach($goat_record as $row) {?>           
                                    		<option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
                                    	<?php } ?>
                        			</select>
                        			<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>			
								</div>

							</div>
								
							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Date Sold <span class="text-danger">*</span></label>
								<div class="col">
									<input type="date" name="date_sold" value="<?= set_value('date_sold');?>" placeholder="" class="form-control ">
									<?= (form_error('date_sold')	!= "" ? form_error('date_sold') : ''); ?>

								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Sold Through <span class="text-danger">*</span></label>
								<div class="col">
									<select name="buyer_name" id="client_select" class="form-control" placeholder="- Select Buyer -" value="<?= set_value('buyer_name'); ?>">

                                    	<option value="MGM">MGM</option>           
                        			</select>
                        			<?= (form_error('buyer_name')	!= "" ? form_error('buyer_name') : ''); ?>

								</div>

							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Total Weight <span class="text-danger">*</span></label>
								<div class="col">
									<input type="text" name="weight" value="<?= set_value('weight'); ?>" placeholder="Enter weight in kilos" class="form-control ">
									<?= (form_error('weight')	!= "" ? form_error('weight') : ''); ?>
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Price per Kilo <span class="text-danger">*</span></label>
								<div class="col">
									<input type="text" name="amount" value="<?= set_value('amount'); ?>" placeholder="Price per Kilo" class="form-control ">
									<?= (form_error('amount')	!= "" ? form_error('amount') : ''); ?>
								</div>
							</div>


							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Description <span class="text-danger">*</span></label>
								<div class="col">
									<textarea name="description" placeholder="notes / additional information" class="form-control "><?= set_value('description'); ?></textarea>

									<?= (form_error('description')	!= "" ? form_error('description') : ''); ?>

								</div>
							</div>

							<div class="form-row p-1 float-right w-100">
								<span class="col clearfix"></span>
								<input type="submit" class="btn btn-info col-3" value="Add Sale">
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
			<section></section>
		</div>
	</div>
</div>
