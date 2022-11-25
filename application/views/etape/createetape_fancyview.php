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

	<?= htmlNavigation("etape","fancy", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('etape.form.create.title') ?>
		<span class="smallTitle"><?= $this->lang->line('detail_itineraire.form.title', $itineraire->itilbnom) ?> -
		<?= $this->lang->line('etape.form.etpnuord.short_label', $etpnuord) ?>
		</span>
		</h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormEtape', 'id' => 'AddFormEtape', 'class' => 'form-horizontal');
$fields_info = array('etpiditi' => $itineraire->itiiditi, 'etpnuord' => $etpnuord );
echo form_open_multipart('etape/createetapejson/add', $attributes_info, $fields_info );
?>
	<fieldset>
	
	<div class="form-group"><!-- Nom de l'étape -->
		<label class="col-md-3 control-label" for="etplbnom">* <?= $this->lang->line('etape.form.etplbnom.label') ?> :</label>
		<div class="col-md-5">
		<input class="input-xlarge valtype form-control" type="text" name="etplbnom" id="etplbnom" required  >
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etplbnom.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Latidude de la coordonnée -->
		<label class="col-md-3 control-label" for="etpnulatlon">* 
		<?= $this->lang->line('etape.form.etpnulat.label') ?>, <?= $this->lang->line('etape.form.etpnulon.label') ?>  :</label>
		<div class="col-md-5">
		<input class="input-xlarge valtype form-control" type="text" name="etpnulatlon" id="etpnulatlon" required  >
		</div>
	</div>
	
	<div class="form-group"> <!-- etptxdes : Description -->
		<label class="col-md-3 control-label" for="etptxdes">
			<?= $this->lang->line('etape.form.etptxdes.label') ?> :
		</label>
		<div class="col-md-7"><textarea class="editor" name="etptxdes" id="etptxdes" ></textarea>
		
			<span class="help-block valtype"><?= $this->lang->line('etape.form.etptxdes.description')?></span>
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
<script src="<?= base_url() ?>www/js/views/etape/createetape.fancy.js"></script>
