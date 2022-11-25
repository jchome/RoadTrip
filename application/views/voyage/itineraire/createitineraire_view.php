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
<?php echo htmlHeader($this->lang->line('itineraire.form.create.title') ); ?>

</head>
<body>

	<?= htmlNavigation("itineraire","create", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('itineraire.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddForm', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('itineraire/createitineraire/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->
	

	<div class="form-group"><!-- Nom de l'itinéraire -->
		<label class="col-md-2 control-label" for="idilbnom">* <?= $this->lang->line('itineraire.form.idilbnom.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="idilbnom" id="idilbnom" required  >
			<span class="help-block valtype"><?= $this->lang->line('itineraire.form.idilbnom.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Lien vers le voyage -->
		<label class="col-md-2 control-label" for="itiidvoy">* <?= $this->lang->line('itineraire.form.itiidvoy.label') ?> :</label>
		<div class="col-md-10">
		<select name="itiidvoy" id="itiidvoy" class="form-control">
			<?php foreach ($voyageCollection as $voyageElt): ?>
				<option value="<?= $voyageElt->voyidvoy ?>" ><?= $voyageElt->voylbnom ?> </option>
			<?php endforeach;?>
		</select>
		
			<span class="help-block valtype"><?= $this->lang->line('itineraire.form.itiidvoy.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Ordre dans le voyage -->
		<label class="col-md-2 control-label" for="itinuord">* <?= $this->lang->line('itineraire.form.itinuord.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="itinuord" id="itinuord" required  >
			<span class="help-block valtype"><?= $this->lang->line('itineraire.form.itinuord.description')?></span>
		</div>
	</div>
	

		<hr>
		<div class="row">
			<div class="col-md-offset-2 col-md-2">
				<button type="submit" class="btn btn-primary"><?= $this->lang->line('form.button.save') ?></button>
			</div>
			<div class="col-md-offset-2 col-md-2">
				<a href="<?=base_url()?>index.php/itineraire/listitineraires/index" type="button" class="btn btn-default"><?= $this->lang->line('form.button.cancel') ?></a>
			</div>
		</div>
			
		</fieldset>

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<?php echo bodyFooter(); ?>


<script src="<?= base_url() ?>www/js/views/itineraire/createitineraire.js"></script>

</body>
</html>