
<div class="container-fluid p-2 mb-5">
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

                <select name="partner_id" id="sire_id_select" class="form-control" placeholder="Enter or Choose Tag Number" required="" value="<?= set_value('partner_id');?>">
                  <?php foreach($sire_record as $row) {?>
                    <option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
                  <?php }?>
                </select>
                <?= (form_error('partner_id') != "" ? form_error('partner_id') : ''); ?>
              </div>
            </div>

            <div class="form-group row"> 
              <label class="col-lg-2 col-form-label form-control-label">Dam ID</label>                           
                    
              <div class="col">
                    <!--input class="form-control" type="text" value="<?= set_value('sire_id');?>" name="sire_id" placeholder="Sire ID" !-->

                <select name="eartag_id" id="dam_id_select" class="form-control" placeholder="Enter or Choose Tag Number" required="" value="<?= set_value('eartag_id');?>">
                  <?php foreach($dam_record as $row) {?>
                    <option value="<?= $row->eartag_id; ?>"><?= $row->eartag_id; ?></option>
                  <?php }?>
                </select>
                <?= (form_error('eartag_id') != "" ? form_error('eartag_id') : ''); ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-lg-2 col-form-label form-control-label">Breeding Date</label>
              <div class="col">
                <input class="form-control" type="date" value="<?= set_value('perform_date');?>" id="" placeholder="yyyy-mm-dd" name="perform_date">
                <?= (form_error('perform_date') != "" ? form_error('perform_date') : ''); ?>
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-lg-2 col-form-label form-control-label">Description</label>
              <div class="col">
                <textarea class="form-control" id="" placeholder="Description" name="remarks"><?= set_value('remarks'); ?></textarea>
                <?= (form_error('remarks') != "" ? form_error('remarks') : ''); ?>
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

  <div class="row mt-2" style="margin-bottom: 200px;">
    <div class="col">
      <div class="container-fluid">
        <div class="row mt-5">
          <h1>Breeding Attempt(s)</h1>
        </div>
        <div class="row">  
          <?php if($breeding_attempt == 0) {?>
            No breeding attempt
          <?php } else { ?>
            <div class="mb-5">
              <table id="breedingTable"  class="table table-striped table-bordered" style="width:100% top: 120px;">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                  </tr>
                </tbody>
              </table>              
            </div>
          <?php } ?>
        </div>

      </div>
    </div>
  </div>
</div>


