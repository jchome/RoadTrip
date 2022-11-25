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
<?php echo htmlHeader( $this->lang->line('partage.form.edit.title') ); ?>

</head>
<body>

	<?= htmlNavigation("partage","edit", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('partage.form.edit.title') ?></h2>
			<?php
				$msg = $this->session->flashdata('msg_info');    if($msg != ""){echo formatInfo($msg);} 
				$msg = $this->session->flashdata('msg_confirm'); if($msg != ""){echo formatConfirm($msg);}
				$msg = $this->session->flashdata('msg_warn');    if($msg != ""){echo formatWarn($msg);}
				$msg = $this->session->flashdata('msg_error');   if($msg != ""){echo formatError($msg);}
			?>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditForm', 'class' => 'form-horizontal');
$fields_info = array('paridpar' => $partage->paridpar);
echo form_open_multipart('partage/editpartage/save', $attributes_info, $fields_info );

?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="form-group"><!-- Lien vers le voyage -->
		<label class="col-md-2 control-label" for="paridvoy">* <?= $this->lang->line('partage.form.paridvoy.label') ?> :</label>
		<div class="col-md-10">
		<select name="paridvoy" id="paridvoy" class="form-control">
			<?php foreach ($voyageCollection as $voyageElt): ?>
				<option value="<?= $voyageElt->voyidvoy ?>" <?= ($voyageElt->voyidvoy == $partage->paridvoy)?("selected"):("")?>><?= $voyageElt->voylbnom ?> </option>
			<?php endforeach;?>
		</select>
		
			<span class="help-block valtype"><?= $this->lang->line('partage.form.paridvoy.description')?></span>
		</div>
	</div>
	
	<div class="form-group"><!-- Lien vers l'utilisateur ami -->
		<label class="col-md-2 control-label" for="paridami">* <?= $this->lang->line('partage.form.paridami.label') ?> :</label>
		<div class="col-md-10">
		<select name="paridami" id="paridami" class="form-control">
			<?php foreach ($userCollection as $userElt): ?>
				<option value="<?= $userElt->usridusr ?>" <?= ($userElt->usridusr == $partage->paridami)?("selected"):("")?>><?= $userElt->usrlbnom ?> </option>
			<?php endforeach;?>
		</select>
		
			<span class="help-block valtype"><?= $this->lang->line('partage.form.paridami.description')?></span>
		</div>
	</div>
		
		
		<hr>
		<div class="row">
			<div class="col-md-offset-2 col-md-2">
				<button type="submit" class="btn btn-primary"><?= $this->lang->line('form.button.save') ?></button>
			</div>
			<div class="col-md-offset-2 col-md-2">
				<a href="<?=base_url()?>index.php/partage/listpartages/index" type="button" class="btn btn-default"><?= $this->lang->line('form.button.cancel') ?></a>
			</div>
		</div>
			
			
		</fieldset>

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<?php echo bodyFooter(); ?>

<script src="<?= base_url() ?>www/js/views/partage/editpartage.js"></script>


</body>
</html>