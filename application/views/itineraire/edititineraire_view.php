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
<?php echo htmlHeader( $this->lang->line('itineraire.form.edit.title') ); ?>

</head>
<body>

	<?= htmlNavigation("itineraire","edit", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('itineraire.form.edit.title') ?></h2>
			<?php
				$msg = $this->session->flashdata('msg_info');    if($msg != ""){echo formatInfo($msg);} 
				$msg = $this->session->flashdata('msg_confirm'); if($msg != ""){echo formatConfirm($msg);}
				$msg = $this->session->flashdata('msg_warn');    if($msg != ""){echo formatWarn($msg);}
				$msg = $this->session->flashdata('msg_error');   if($msg != ""){echo formatError($msg);}
			?>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditForm', 'class' => 'form-horizontal');
$fields_info = array('itiiditi' => $itineraire->itiiditi, 
		'itiidvoy' => $itineraire->itiidvoy, 
		'itinudst' => $itineraire->itinudst,
		'itilbdur' => $itineraire->itilbdur);
echo form_open_multipart('itineraire/edititineraire/save', $attributes_info, $fields_info );

?>

			<fieldset>
	<!-- list of variables - auto-generated : -->
	
		<div class="form-group"><!-- Nom de l'itinéraire -->
			<label class="col-md-2 control-label" for="itilbnom">* <?= $this->lang->line('itineraire.form.itilbnom.label') ?> :</label>
			<div class="col-md-10">
			<input class="input-xlarge valtype form-control" type="text" name="itilbnom" id="itilbnom" value="<?= $itineraire->itilbnom ?>" required  >
				<span class="help-block valtype"><?= $this->lang->line('itineraire.form.itilbnom.description')?></span>
			</div>
		</div>
		
		<div class="form-group"><!-- Ordre dans le voyage -->
			<label class="col-md-2 control-label" for="itinuord">* <?= $this->lang->line('itineraire.form.itinuord.label') ?> :</label>
			<div class="col-md-10">
			<input class="input-xlarge valtype form-control" type="text" name="itinuord" id="itinuord" value="<?= $itineraire->itinuord ?>" required  >
				<span class="help-block valtype"><?= $this->lang->line('itineraire.form.itinuord.description')?></span>
			</div>
		</div>
	
		<div class="form-group"><!-- Description -->
			<label class="col-md-2 control-label" for="ititxdes"> <?= $this->lang->line('itineraire.form.ititxdes.label') ?> :</label>
			<div class="col-md-10">
				<textarea class="input-xlarge valtype form-control" type="text" name="ititxdes" id="ititxdes" ><?= $itineraire->ititxdes ?></textarea>
				<span class="help-block valtype"><?= $this->lang->line('itineraire.form.ititxdes.description')?></span>
			</div>
		</div>
		
		
		<hr>
		<div class="row">
			<div class="col-md-offset-2 col-md-2">
				<button type="submit" class="btn btn-primary"><?= $this->lang->line('form.button.save') ?></button>
			</div>
			<div class="col-md-offset-2 col-md-2">
				<a href="<?=base_url()?>index.php/voyage/detailvoyage/index/<?= $itineraire->itiidvoy ?>" type="button" class="btn btn-default"><?= $this->lang->line('form.button.cancel') ?></a>
			</div>
		</div>
			
			
		</fieldset>

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<?php echo bodyFooter(); ?>

<script src="<?= base_url() ?>www/js/views/itineraire/edititineraire.js"></script>


</body>
</html>