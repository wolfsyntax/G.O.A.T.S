
<div class="container-fluid p-2">
  <div class="row">
    <div class="col">
      
      <section class="">
        <div class="card">
          <div class="card-header">
            <h3>Breeding Record</h3>
            <p class="text-muted">Add breeding attempt</p>
          </div>
          
          <div class="card-body p-2">
          <?= form_open(base_url().'breed/verify', array('class'=> 'form p-3')); ?>
            <div class="form-group row"> 
              <label class="col-lg-2 col-form-label form-control-label">Sire ID</label>                           
                    
              <div class="col">

                <select name="sire_id" id="sire_id_select" class="form-control" placeholder="Enter or Choose Tag Number" required="" value="<?= set_value('sire_id');?>">
                  <?php foreach($sire_record as $row) {?>
                    <option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
                  <?php }?>
                </select>
                <?= (form_error('sire_id') != "" ? form_error('sire_id') : ''); ?>
              </div>
            </div>

            <div class="form-group row"> 
              <label class="col-lg-2 col-form-label form-control-label">Dam ID</label>                           
                    
              <div class="col">
                    <!--input class="form-control" type="text" value="<?= set_value('sire_id');?>" name="sire_id" placeholder="Sire ID" !-->

                <select name="dam_id" id="dam_id_select" class="form-control" placeholder="Enter or Choose Tag Number" required="" value="<?= set_value('dam_id');?>">
                  <?php foreach($dam_record as $row) {?>
                    <option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
                  <?php }?>
                </select>
                <?= (form_error('dam_id') != "" ? form_error('dam_id') : ''); ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-lg-2 col-form-label form-control-label">Breeding Date</label>
              <div class="col">
                <input class="form-control" type="date" value="<?= set_value('date_perform');?>" id="" placeholder="yyyy-mm-dd" name="date_perform">
                <?= (form_error('date_perform') != "" ? form_error('date_perform') : ''); ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-lg-2 col-form-label form-control-label">Description</label>
              <div class="col">
                <textarea class="form-control" id="" placeholder="Description" name="description"><?= set_value('description'); ?></textarea>
                <?= (form_error('description') != "" ? form_error('description') : ''); ?>
              </div>
            </div>

            <div class="form-row p-1">
              <label class="col-form-label-sm col-4 col-sm-4 col-md-2 col-lg-2">Is pregnant ? <span class="text-danger">*</span></label>
              
              <div class="col">
                <input type="checkbox" name="is_pregnant" value="" class="custom-checkbox" id="is_pregnant" disabled="">
                <?= (form_error('is_pregnant') != "" ? form_error('is_pregnant') : ''); ?>  
              </div>
            </div>            

            <div class="form-row ">
              <span class="col clearfix"></span>
              <input type="submit" class="btn btn-success col-sm-12 col-md-3 offset-md-9" value="Add Breeding">
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


