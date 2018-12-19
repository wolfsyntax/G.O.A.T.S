<?php $this->load->view('includes/generic_header'); ?>
<div class="container-fluid">
	
	<div class="row mt-sm-5 mt-2 clearfix"></div>
	<div class="row">
		<div class="col">
			
			<section class="bg-dark" style="">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 480px;">
					<ol class="carousel-indicators text-dark">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
					</ol>

					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="<?= base_url(); ?>assets/images/blog.jpg" alt="First slide" height="480px;">
						</div>

						<div class="carousel-item">
							<img class="d-block w-100" src="<?= base_url(); ?>assets/images/carousel.jpg" alt="Second slide" height="480px;">
						</div>

						<div class="carousel-item">
							<img class="d-block w-100" src="<?= base_url(); ?>assets/images/grid.jpg" alt="Third slide" height="480px;" width="600px">
						</div>

					</div>
					
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="fa fa-angle-left text-dark fa-lg" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>

					<a class="carousel-control-next text-success" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="fa fa-angle-right text-dark fa-lg" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

			</section>

			<section class="container bg-info mt-4">
				<div class="row text-white">
					<div class="col-6 col-sm-12 col-md-4 col-lg-4 bg-success text-right">A</div>
					<div class="col-6 col-sm-12 col-md-4 col-lg-4 bg-info text-left">B</div>
					<div class="col-6 col-sm-12 col-md-12 col-lg-4 bg-dark text-center">C</div>
				</div>
			</section>
			
		</div>

	</div>
</div>