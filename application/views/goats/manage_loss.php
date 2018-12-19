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
						<?= form_open(base_url().'manage/loss',array('class'=>'form p-sm-1 p-md-5',"onsubmit"=>"return check_form(this);")); ?>
							<div class="form-row p-1">
								<?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Ear Tag ID <span class="text-danger">*</span></label>
								<div class="col">
									<select name="eartag_id" id="goat_id_select" class="form-control" placeholder="- Enter Ear Tag ID -" value="<?= set_value('eartag_id'); ?>" required>

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
									<select name="cause" class="custom-select" required>
										<option value="">- Select a Cause -</option>
										<option value="Deceased">Deceased</option>
										<option value="Lost">Lost</option>
										<option value="Stolen">Stolen</option>
									</select>
									<?= (form_error('cause')	!= "" ? form_error('cause') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Date of Loss <span class="text-danger">*</span></label>
								<div class="col">
									<input type="date" name="loss_date" value="<?= set_value('loss_date'); ?>" placeholder="Date of Loss" class="form-control" onchange="check_date_format(this);" required>
									<span id="date_checker"><?= (form_error('loss_date')	!= "" ? form_error('loss_date') : ''); ?></span>
								</div>
							</div>

							<div class="form-row p-1">
								<label class="col-form-label-sm col-3 col-sm-3 col-md-2 col-lg-2">Notes</label>
								<div class="col">
									<input type="text" name="remark" value="<?= set_value('remark');?>" placeholder="" class="form-control">
									<?= (form_error('remark')	!= "" ? form_error('remark') : ''); ?>	
								</div>
							</div>

							<div class="form-row p-1">
								<input type="submit" class="btn btn-success col-12 col-sm-6 col-md-3 col-lg-2 offset-md-9 offset-sm-6 offset-lg-10" value="Submit Loss" name="submit">

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