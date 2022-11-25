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
<?php echo htmlHeader($this->lang->line('etape.form.create.title') ); ?>

</head>
<body>

	<?= htmlNavigation("etape","create", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('etape.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddForm', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('etape/createetape/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->
	

	<div class="form-group"><!-- Nom de l'étape -->
		<label class="col-md-2 control-label" for="etplbnom">* <?= $this->lang->line('etape.form.etplbnom.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="etplbnom" id="etplbnom" required  >
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etplbnom.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Latidude de la coordonnée -->
		<label class="col-md-2 control-label" for="etpnulat">* <?= $this->lang->line('etape.form.etpnulat.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="etpnulat" id="etpnulat" required  >
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etpnulat.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Longitude de la coordonnée -->
		<label class="col-md-2 control-label" for="etpnulon">* <?= $this->lang->line('etape.form.etpnulon.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="etpnulon" id="etpnulon" required  >
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etpnulon.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Lien vers l'itinéraire -->
		<label class="col-md-2 control-label" for="etpiditi">* <?= $this->lang->line('etape.form.etpiditi.label') ?> :</label>
		<div class="col-md-10">
		<select name="etpiditi" id="etpiditi" class="form-control">
			<?php foreach ($itineraireCollection as $itineraireElt): ?>
				<option value="<?= $itineraireElt->itiiditi ?>" ><?= $itineraireElt->itilbnom ?> </option>
			<?php endforeach;?>
		</select>
		
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etpiditi.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Ordre dans l'itinéraire -->
		<label class="col-md-2 control-label" for="etpnuord">* <?= $this->lang->line('etape.form.etpnuord.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="etpnuord" id="etpnuord" required  >
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etpnuord.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Description et commentaires -->
		<label class="col-md-2 control-label" for="etptxdes"><?= $this->lang->line('etape.form.etptxdes.label') ?> :</label>
		<div class="col-md-10">
		<textarea class="editor" name="etptxdes" id="etptxdes" class="form-control" ></textarea>
		
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etptxdes.description')?></span>
		</div>
	</div>
	

		<hr>
		<div class="row">
			<div class="col-md-offset-2 col-md-2">
				<button type="submit" class="btn btn-primary"><?= $this->lang->line('form.button.save') ?></button>
			</div>
			<div class="col-md-offset-2 col-md-2">
				<a href="<?=base_url()?>index.php/etape/listetapes/index" type="button" class="btn btn-default"><?= $this->lang->line('form.button.cancel') ?></a>
			</div>
		</div>
			
		</fieldset>

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<?php echo bodyFooter(); ?>


<script src="<?= base_url() ?>www/js/views/etape/createetape.js"></script>

</body>
</html>