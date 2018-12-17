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
	<style>
		h1, h2, h3, h4, h5, h6, div, p{
			font-family: 'Ubuntu', sans-serif;
		}

	</style>
</head>
<body id="back2top" onload="startClock();initpage();">

	<?php if($this->config->item('base_timestamp') < time()) {?>
	<main role="main">

		<a style="float: right" class="nav-link" id = "back2top-btn" onclick="scrollTops();"><i class="fa fa-angle-up fa-lg text-danger font-weight-bold"></i></a>

		<?php $this->load->view($body); ?>
	</main>

	<?php } else { 
		show_404("sitemap/404.php"); //echo "<h1>To continue, Please set date and time correctly</h1>";
	} ?>
	<!--Starter Template-->
	<script src="<?= base_url()?>public/js/jquery-3.3.1.slim.min.js"></script>

    <script src="<?= base_url()?>public/js/popper.min.js"></script>    
    <script src="<?= base_url()?>public/js/bootstrap.min.js"></script>
   	<script src="<?= base_url(); ?>assets/js/jquery-editable-select.min.js"></script>
   	
   	<script src="<?= base_url(); ?>assets/js/color_lookup.js"></script>

    <script src="<?= base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		window.onscroll = function() {
		    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		        document.getElementById("back2top-btn").style.display = "block";
		    } else {
		        document.getElementById("back2top-btn").style.display = "none";
		    }
		};

		// When the user clicks on the button, scroll to the top of the document
		function scrollTops() {
		    document.body.scrollTop = 0;
		    document.documentElement.scrollTop = 0;
		}

		function tagColorPick(value){
			value = value.substring(1,value.length);
			var cval = get_color(value);
			
			$("#tag_color_select").val(cval);
		}

		$(document).ready(function () {

			 $('#breedingTable').DataTable();

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

	  	$('[data-toggle="popover"]').popover({

	  		placement: "right",
	  		trigger: "focus",
	  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header  text-white" style="background-color: #20c997;"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'
	  	});  	  	

	  	$('[data-target="#breedingInfo"]').popover({

	  		placement: "right",
	  		trigger: "focus",
	  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-warning text-white"><h3 class="popover-title text-white"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'
	  	});

	  	$('[data-target="#healthCheck"]').popover({

	  		placement: "right",
	  		trigger: "focus",
	  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-success text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'
	  	});

	  	$('[data-target="#assetManagement"]').popover({

	  		placement: "right",
	  		trigger: "focus",
	  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-danger text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'
	  	});
	  	
	  	$('[data-target="#goatManagement"]').popover({

	  		placement: "right",
	  		trigger: "focus",
	  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-dark text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'
	  	});
	  	

	  	$('[data-target="#financialManagement"]').popover({

	  		placement: "right",
	  		trigger: "focus",
	  		template: '<div class="popover"><div class="arrow"></div><div class="popover-header bg-info text-white"><h3 class="popover-title"></h3></div><div class="popover-body"><p class="popover-content"></p></div></div></div>'
	  	});

//		$('.popover-header').css("background-color", "#9FC53B");

  		$('[data-toggled="popover"]').popover({	container: "body",trigger: "focus", placement: "right" });

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

		function check_date_format(fields){
			var field = fields.value.split("-")[0].length;			
			if(field == 4 || fields.value == ""){

				$("#date_checker").html("");
				$("[name='submit'").attr("disabled", false);

			}else{
				
				$("#date_checker").html("Incorrect format or value");
				$("[name='submit']").attr("disabled", true);
			}
		}

		function check_form(form){

			form.submit.disabled = true;
//			if(flag == 0)
			form.submit.value = "Please wait.."; 
//			else if(flag == 1)
//				form.submit.value = "";
		}

		function startClock() {
		    var now = new Date();
		    var h = now.getHours();
		    var m = now.getMinutes();
		    var s = now.getSeconds();
		    m = checkTime(m);
		    s = checkTime(s);
		    document.getElementById('clock').innerHTML =
		    h + ":" + m + ":" + s;
		    var t = setTimeout(startClock, 500);
		}
		function checkTime(i) {
		    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		    return i;
		}
	
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
