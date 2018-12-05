<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title ><?= $title; ?>&nbsp;&mdash;&nbsp;Goats Organize Application Tracking System</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome">

	<link rel="stylesheet" href="<?= base_url()?>public/css/app.css" >
	<link rel="stylesheet" href="<?= base_url()?>public/css/style.css" >

</head>
<body>
	
	<main role="main">
		<?php $this->load->view($body); ?>
	</main>

	<!--Starter Template-->
	<script src="<?= base_url()?>public/js/jquery-3.3.1.slim.min.js"></script>

    <script src="<?= base_url()?>public/js/popper.min.js"></script>    
    <script src="<?= base_url()?>public/js/bootstrap.min.js"></script>

   	<script src="<?= base_url(); ?>assets/js/jquery-editable-select.min.js"></script>
    
	<script type="text/javascript">



	$(document).ready(function () {
		$('#gender').change(function () {
			
			if($(this).val() == 'male'){
				
				$("#is_castrated").prop("disabled",false);

			}else{

				$("#is_castrated").prop("checked",false);
				$("#is_castrated").prop("disabled",true);

			}
		})
	});

	$(function () {
  		
  		$('[data-toggled="popover"]').popover();

  		$('#dam_id_select').editableSelect();

  		$('#sire_id_select').editableSelect();

		$('#body_color_select').editableSelect();

		$('#tag_color_select').editableSelect();

		$('#goat_id_select').editableSelect();

		$('#client_select').editableSelect();		
		
  		$("#sidebar > li div.collapse a.nav-link").each(function(){
  			var self = $(this);
  			var href = self.attr("href");

  			self.attr("href","javascript:void(0);");

  			self.click(function(){
  				//alert(href);
  				$("#ui_view").prop('src',href)
//  				$("#body-content ui_view").load();
  			});
  		});
	});

	</script>

	<script>

	/**	$(function () {
			$("#gender").on("change", function() {
		    	// Check the option value for gender is "male" then enable checkbox, otherwise disable the checkbox
		    	if ($("#gender").val() === "male") {
		        	$("#is_castrated").prop("disabled",false);

		    	// For all other options, enable the checkbox
		    	} else {
		        	$("#is_castrated").prop("disabled",true);
		    	}
			});
		});
	**/

	</script>	
</body>
</html>
