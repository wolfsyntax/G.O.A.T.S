<div class="container-fluid mt-2 mb-5">
	<div class="row">
		<div class="col">
			<section class="">
				<div class="card ">
					<div class="card-header card-ubuntu">
						Add Goats
					</div>
					<div class="card-body p-2">
						<?= form_open(base_url().'goats/new',array('class'=>'form')); ?>
							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Tag ID <span class="text-danger">*</span></label>								
								<div class="col">
									<input type="text" name="eartag_id" placeholder="Tag ID"  class="form-control" value="<?= set_value('eartag_id');?>" />
									<?= (form_error('eartag_id')	!= "" ? form_error('eartag_id') : ''); ?>	
								</div>

								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Tag Color <span class="text-danger">*</span></label>								
								<div class="col">
									<select name="tag_color" id="tag_color_select" class="form-control" placeholder="- Enter Tag Color -" required="" value="<?= set_value('tag_color'); ?>">

                                    	<option value="Brown">Brown</option>           
                        			</select>
                        			<?= (form_error('tag_color')	!= "" ? form_error('tag_color') : ''); ?>	
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
									<?= (form_error('gender')	!= "" ? form_error('gender') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Body Color <span class="text-danger">*</span></label>
								<div class="col">
									<select name="body_color" id="body_color_select" class="form-control" placeholder="- Enter Body Color -" value="<?= set_value('body_color'); ?>">

                                    	<option value="Brown">Brown</option>           
                        			</select>
                        			<?= (form_error('body_color')	!= "" ? form_error('body_color') : ''); ?>	
								</div>

							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Birth Date <span class="text-danger">*</span></label>
								<div class="col">
									<input type="date" name="birth_date" value="<?= set_value('birth_date');?>" placeholder="Date of Birth" class="form-control">
									<?= (form_error('birth_date')	!= "" ? form_error('birth_date') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Birth Weight <span class="text-danger">*</span></label>
								<div class="col">
									<input type="text" name="birth_weight" value="<?= set_value('birth_weight'); ?>" placeholder="Enter weight in lbs." class="form-control">
									<?= (form_error('birth_weight')	!= "" ? form_error('birth_weight') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Dam ID <span class="text-danger">*</span></label>
								<div class="col">
									<select name="dam_id" id="dam_id_select" class="form-control" placeholder="- Enter Dam ID -" value="<?= set_value('dam_id'); ?>">

                                    	<?php foreach($dam_record as $row){ ?>
                                    		<option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
                                    	<?php } ?>           

                        			</select>
                        			<?= (form_error('dam_id')	!= "" ? form_error('dam_id') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Sire ID <span class="text-danger">*</span></label>
								<div class="col">
									<select name="sire_id" id="sire_id_select" class="form-control" placeholder="- Enter Sire ID -" value="<?= set_value('sire_id');?>">

                                    	<?php foreach($sire_record as $row){ ?>
                                    		<option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
                                    	<?php } ?>                                	
     
                        			</select>
                        			<?= (form_error('sire_id')	!= "" ? form_error('sire_id') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Is castrated ? <span class="text-danger">*</span></label>
								<div class="col">
									<input type="checkbox" name="is_castrated" value="" class="custom-checkbox" id="is_castrated" disabled="">
									<?= (form_error('is_castrated')	!= "" ? form_error('is_castrated') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1 float-right w-100 mt-sm-5">
								<span class="col clearfix"></span>
								<input type="submit" class="btn btn-success col-6 col-md-3" value="Add Goat">
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
			<section class="mt-5 clearfix"></section>
		</div>
	</div>
</div>