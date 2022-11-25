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

	<?= htmlNavigation("partage","fancy", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('partage.form.create.title') ?>
		<span class="smallTitle"><?= $this->lang->line('partage.form.title_voyage', $voyage->voylbnom) ?>
		</span>
		</h2>
		
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormPartage', 'id' => 'AddFormPartage', 'class' => 'form-horizontal');
$fields_info = array('paridvoy' => $voyage->voyidvoy);
echo form_open_multipart('partage/createpartagejson/add', $attributes_info, $fields_info );
?>

			<fieldset>
			
			<div class="form-group"><!-- Nom de l'étape -->
				<label class="col-md-3 control-label" for="email">* <?= $this->lang->line('user.form.usrlbmai.label') ?> :</label>
				<div class="col-md-7">
				<input class="input-xlarge valtype form-control" type="text" name="email" id="email" required  >
					<span class="help-block valtype"><?= $this->lang->line('user.form.usrlbmai.description')?></span>
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

<script src="<?= base_url() ?>www/js/views/partage/createpartage.fancy.js"></script>
