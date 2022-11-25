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
<?php echo htmlHeader( $this->lang->line('etape.form.edit.title') ); ?>

</head>
<body>

	<?= htmlNavigation("etape","edit", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('etape.form.edit.title') ?></h2>
			<?php
				$msg = $this->session->flashdata('msg_info');    if($msg != ""){echo formatInfo($msg);} 
				$msg = $this->session->flashdata('msg_confirm'); if($msg != ""){echo formatConfirm($msg);}
				$msg = $this->session->flashdata('msg_warn');    if($msg != ""){echo formatWarn($msg);}
				$msg = $this->session->flashdata('msg_error');   if($msg != ""){echo formatError($msg);}
			?>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditForm', 'class' => 'form-horizontal');
$fields_info = array('etpidetp' => $etape->etpidetp, 'etpiditi' => $etape->etpiditi);
echo form_open_multipart('etape/editetape/save', $attributes_info, $fields_info );

?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="form-group"><!-- Nom de l'étape -->
		<label class="col-md-2 control-label" for="etplbnom">* <?= $this->lang->line('etape.form.etplbnom.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="etplbnom" id="etplbnom" value="<?= $etape->etplbnom ?>" required  >
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etplbnom.description')?></span>
		</div>
	</div>
	
	<div class="form-group"><!-- Latidude de la coordonnée -->
		<label class="col-md-2 control-label" for="etpnulat">* <?= $this->lang->line('etape.form.etpnulat.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="etpnulat" id="etpnulat" value="<?= $etape->etpnulat ?>" required  >
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etpnulat.description')?></span>
		</div>
	</div>
	
	<div class="form-group"><!-- Longitude de la coordonnée -->
		<label class="col-md-2 control-label" for="etpnulon">* <?= $this->lang->line('etape.form.etpnulon.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="etpnulon" id="etpnulon" value="<?= $etape->etpnulon ?>" required  >
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etpnulon.description')?></span>
		</div>
	</div>
	
	<div class="form-group"><!-- Est-ce un point d'arrêt (ou un simple point de passage) -->
		<label class="col-md-2 control-label" for="etpfgarr"> <?= $this->lang->line('etape.form.etpfgarr.label') ?> :</label>
		<div class="col-md-10">
		<label class="checkbox"> <input name="etpfgarr" id="etpfgarr" value="O" type="checkbox"
		<?= ($etape->etpfgarr == "O")?("checked"):("")?>> Oui
							</label>
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etpfgarr.description')?></span>
		</div>
	</div>
	
	<div class="form-group"><!-- Ordre dans l'itinéraire -->
		<label class="col-md-2 control-label" for="etpnuord">* <?= $this->lang->line('etape.form.etpnuord.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="etpnuord" id="etpnuord" value="<?= $etape->etpnuord ?>" required  >
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etpnuord.description')?></span>
		</div>
	</div>
		
		
		<hr>
		<div class="row">
			<div class="col-md-offset-2 col-md-2">
				<button type="submit" class="btn btn-primary"><?= $this->lang->line('form.button.save') ?></button>
			</div>
			<div class="col-md-offset-2 col-md-2">
				<a href="<?=base_url()?>index.php/itineraire/detailitineraire/index/<?= $etape->etpiditi ?>" type="button" class="btn btn-default"><?= $this->lang->line('form.button.cancel') ?></a>
			</div>
		</div>
			
			
		</fieldset>

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<?php echo bodyFooter(); ?>

<script src="<?= base_url() ?>www/js/views/etape/editetape.js"></script>


</body>
</html>