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

	<?= htmlNavigation("voyage","fancy", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('voyage.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormVoyage', 'id' => 'AddFormVoyage', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('voyage/createvoyagejson/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->
<div class="control-group">
	<label class="control-label" for="voylbnom">* <?= $this->lang->line('voyage.form.voylbnom.label') ?> :</label>
	<div class="controls"><input class="input-xlarge valtype" type="text" name="voylbnom" id="voylbnom" required  >
		<p class="help-block valtype"><?= $this->lang->line('voyage.form.voylbnom.description')?></p>
	</div></div>
	<div class="control-group">
	<label class="control-label" for="voyidusr">* <?= $this->lang->line('voyage.form.voyidusr.label') ?> :</label>
	<div class="controls"><input type="text" name="voyidusr_text" id="voyidusr_text" autocomplete="off" required />
		<input type="hidden" name="voyidusr" id="voyidusr">
		
		<p class="help-block valtype"><?= $this->lang->line('voyage.form.voyidusr.description')?></p>
	</div></div>

		<div class="form-actions">
			<button type="submit" class="btn btn-primary"><?= $this->lang->line('form.button.save') ?></button>
			<a data-dismiss="modal" href="#" type="button" class="btn"><?= $this->lang->line('form.button.cancel') ?></a>
		</div>
			
		</fieldset>

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>www/js/views/voyage/createvoyage.fancy.js"></script>
