<?php if($this->session->userdata('username') != "") {?>
<div class="container-fluid bg-light col-12 col-sm-12 col-md-12" style="position: fixed;">
	<div class="row">
    <?php $this->load->view('includes/user_header'); ?>
    <?php $this->load->view('includes/sidebar'); ?>

    <main class="col-12 col-md-11 col-lg-10 mt-5" role="main">
      <section class="col-12 mt-1">

        &emsp;
       
      </section>

      <section class="col-12 bg-light px-2" style="margin-top: 80px !important;">
        
        <div class="alert alert-warning alert-dismissible fade show p-2" role="alert">
          <strong>Pro Tip!</strong> If you want to update your profile details and password&emsp;<a class="btn btn-sm btn-success" href="<?= base_url()?>profile/settings"><span class="fa fa-pencil"></span>&nbsp;Edit Profile</a>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      </section>

      <section class="col-12 p-0">
        <?= ($this->session->flashdata('item')) ? $this->session->flashdata('item') : ''; ?>
        <?= ($this->session->flashdata('goat') ? $this->session->flashdata('goat') : ''); ?>
      </section>

      <section class="p-0 col-12 text-dark" id="body-content" style="height: 100vh;">
        
        <!--iframe class="p-0 w-100 h-100" src="<?= base_url();?>welcome" id="ui_view" frameborder="0" scrolling="yes"></iframe-->

      <iframe class="p-0 w-100 mh-100 h-100" src="<?php echo base_url('sitemap/landing_page');?>" id="ui_view" frameborder="0" scrolling="yes"></iframe>        

      </section>
    </main>
	</div>
</div>

<?php } else {show_404(); } ?>