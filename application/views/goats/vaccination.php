<div class="col-md-8 offset-md-2">
  <span class="anchor" id="formUserEdit"></span>
  <hr class="my-4">
    
  <!-- form user info -->
  <div class="card card-outline-secondary">
    <div class="card-header">
      <h3 class="mb-0"><i class="fas fa-syringe">&nbsp;</i>Vaccination</h3>
    </div>
  
    <div class="card-body" >
     <?= form_open('checkup/vaccination', array('class'=> 'form')); ?>

      <div class="form-group row"> 
        <label class="col-lg-2 col-form-label form-control-label" style="margin-left:130px;">Eartag ID</label>

        <div class="col-lg-6">
          <input class="form-control" type="text" value="" >
        </div>
      </div>

      <div class="form-group row"> 
        <label class="col-lg-2 col-form-label form-control-label" style="margin-left:130px;">Vaccine</label>                           
        
        <div class="col-lg-6">

          <select class="form-control" id="Gender">
            <option>ADE</option>
            <option>Calcium</option>
          </select>
        </div>

      </div>

      <div class="form-group row"> 
        <label class="col-lg-2 col-form-label form-control-label" style="margin-left:130px;">ML</label>                           
        
        <div class="col-lg-6">
          <input class="form-control" type="text" value="" >
        </div>
      </div>
                                      
      <div class="form-group row">  
        <label class="col-lg-2 col-form-label form-control-label" style="margin-left:130px;">Vaccination Date</label>

        <div class="col-lg-6">
          <input class="form-control" type="date" value="yyyy-mm-dd" id="example-date-input">
        </div>
      
      </div>

      <div class="form-group row">
        <label class="col-lg-2 col-form-label form-control-label" style="margin-left:130px;">Description:</label>
                                                  
        <div class="col-lg-6">
          <textarea class="form-control" id="exampleMessage"></textarea>
        </div>
                              
      </div>
      
      <div class="form-group row">
        <label class="form-control-label" style="margin-left:130px;"></label>
        
        <div class="col-lg-9 mt-2">
          <input type="button" style="margin-left:145px;" class="btn btn-primary" value="Add Vaccination">
        </div>
      </div>
                                 
    <?= form_close(); ?>
    </div>
  </div>
</div>
                        <!-- /form user info -->
    
