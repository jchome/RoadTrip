<?php
/*
 * Created by generator
 *
 */

$this->load->helper('form');
$this->load->helper('url');
$this->load->helper('template');
$this->load->helper('views');

if($this->session->userdata('user_name') == "") {
	redirect('welcome/index');
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php echo htmlHeader($this->lang->line('voyage.form.create.title') ); ?>

</head>
<body>

	<?= htmlNavigation("voyage","create", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('voyage.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddForm', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('voyage/createvoyage/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->
	

	<div class="form-group"><!-- Nom du voyage -->
		<label class="col-md-2 control-label" for="voylbnom">* <?= $this->lang->line('voyage.form.voylbnom.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="voylbnom" id="voylbnom" required  >
			<span class="help-block valtype"><?= $this->lang->line('voyage.form.voylbnom.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Lien vers l'utilisateur -->
		<label class="col-md-2 control-label" for="voyidusr">* <?= $this->lang->line('voyage.form.voyidusr.label') ?> :</label>
		<div class="col-md-10">
		<input type="text" name="voyidusr_text" id="voyidusr_text" autocomplete="off" class="form-control" required />
		<input type="hidden" name="voyidusr" id="voyidusr">
		
			<span class="help-block valtype"><?= $this->lang->line('voyage.form.voyidusr.description')?></span>
		</div>
	</div>
	

		<hr>
		<div class="row">
			<div class="col-md-offset-2 col-md-2">
				<button type="submit" class="btn btn-primary"><?= $this->lang->line('form.button.save') ?></button>
			</div>
			<div class="col-md-offset-2 col-md-2">
				<a href="<?=base_url()?>index.php/voyage/listvoyages/index" type="button" class="btn btn-default"><?= $this->lang->line('form.button.cancel') ?></a>
			</div>
		</div>
			
		</fieldset>

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<?php echo bodyFooter(); ?>


<script src="<?= base_url() ?>www/js/views/voyage/createvoyage.js"></script>

</body>
</html>