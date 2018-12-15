<?= form_open(base_url()."form",array("class"=>"form card")); ?>
	
	<input type="text" name="tx" value="<?= set_value('tx'); ?>" placeholder="">
	<?= form_error("tx") ?>
	
	<input type="submit" value="Submit" name="">
<?= form_close(); ?>