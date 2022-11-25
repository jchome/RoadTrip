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
?>

	<?= htmlNavigation("itineraire","fancy", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('itineraire.form.create.title') ?>
		<span class="smallTitle"><?= $this->lang->line('detail_voyage.form.title', $voyage->voylbnom) ?> -
		<?= $this->lang->line('itineraire.form.itinuord.short_label', $itinuord) ?>
		</span>
		</h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormItineraire', 'id' => 'AddFormItineraire', 'class' => 'form-horizontal');
$fields_info = array('itiidvoy' => $voyage->voyidvoy, 'itinuord' => $itinuord, 'etpidetp' => $etpidetp);
echo form_open_multipart('itineraire/createitinerairejson/add', $attributes_info, $fields_info );
?>

			<fieldset>
			
		<div class="form-group"><!-- Nom de l'itineraire -->
			<label class="col-md-3 control-label" for="idilbnom">* <?= $this->lang->line('itineraire.form.itilbnom.label') ?> :</label>
			<div class="col-md-6">
				<input class="input-xlarge valtype form-control" type="text" name="itilbnom" id="itilbnom" required  >
				<span class="help-block valtype"><?= $this->lang->line('itineraire.form.itilbnom.description')?></span>
			</div>
		</div>
	
		<div class="form-group"><!-- Description -->
			<label class="col-md-3 control-label" for="ititxdes"> <?= $this->lang->line('itineraire.form.ititxdes.label') ?> :</label>
			<div class="col-md-6">
				<textarea class="input-xlarge valtype form-control" type="text" name="ititxdes" id="ititxdes" ></textarea>
				<span class="help-block valtype"><?= $this->lang->line('itineraire.form.ititxdes.description')?></span>
			</div>
		</div>

		<hr>
		<div class="row">
			<div class="col-md-offset-2 col-md-2">
				<button type="submit" class="btn btn-primary"><?= $this->lang->line('form.button.save') ?></button>
			</div>
			<div class="col-md-offset-2 col-md-2">
				<a data-dismiss="modal" href="#" type="button" class="btn btn-default"><?= $this->lang->line('form.button.cancel') ?></a>
			</div>
		</div>
		
			
		</fieldset>

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>www/js/views/itineraire/createitineraire.fancy.js"></script>
