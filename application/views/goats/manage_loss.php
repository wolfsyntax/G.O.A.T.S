<?php if($this->session->userdata('username') != ''){?>
<div class="container-fluid mt-2 mb-5 pb-5">
	<div class="row mb-5">
		<div class="col">
			<section class="">
				<div class="card">
					<div class="card-header">
						<h3>Manage Loss</h3>
					</div>
					<div class="card-body p-2">
						<?= form_open(base_url().'manage/loss',array('class'=>'form p-5')); ?>
							<div class="form-row p-1">
								<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Ear Tag ID <span class="text-danger">*</span></label>
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
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Caused of Loss<span class="text-danger font-weight-bold">*</span></label>
								<div class="col">
									<select name="loss_caused" class="custom-select">
										<option value="">- Select a Cause -</option>
										<option value="Deceased">Deceased</option>
										<option value="Lost">Lost</option>
										<option value="Stolen">Stolen</option>
									</select>
									<?= (form_error('loss_caused')	!= "" ? form_error('loss_caused') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Date of Loss <span class="text-danger">*</span></label>
								<div class="col">
									<input type="date" name="loss_date" value="<?= set_value('loss_date'); ?>" placeholder="Date of Loss" class="form-control">
									<?= (form_error('loss_date')	!= "" ? form_error('loss_date') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Notes</label>
								<div class="col">
									<input type="text" name="description" value="<?= set_value('description');?>" placeholder="" class="form-control">
									<?= (form_error('description')	!= "" ? form_error('description') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1 float-right w-100">
								<span class="col clearfix"></span>
								<input type="submit" class="btn btn-success col-3" value="Submit Loss">

							</div>								
						<?= form_close();?>
					</div>
					<div class="card-footer">
						A
					</div>
				</div>
			</section>
			<section class="mt-5">&emsp;</section>
		</div>
	</div>
</div>
<?php }else{ show_404(); }?>