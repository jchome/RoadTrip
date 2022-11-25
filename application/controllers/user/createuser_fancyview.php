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

	<?= htmlNavigation("user","fancy", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('user.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormUser', 'id' => 'AddFormUser', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('user/createuserjson/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->
<div class="control-group">
	<label class="control-label" for="usrlbnom">* <?= $this->lang->line('user.form.usrlbnom.label') ?> :</label>
	<div class="controls"><input class="input-xlarge valtype" type="text" name="usrlbnom" id="usrlbnom" required  >
		<p class="help-block valtype"><?= $this->lang->line('user.form.usrlbnom.description')?></p>
	</div></div>
	<div class="control-group">
	<label class="control-label" for="usrlblgn">* <?= $this->lang->line('user.form.usrlblgn.label') ?> :</label>
	<div class="controls"><input class="input-xlarge valtype" type="text" name="usrlblgn" id="usrlblgn" required  >
		<p class="help-block valtype"><?= $this->lang->line('user.form.usrlblgn.description')?></p>
	</div></div>
	<div class="control-group">
	<label class="control-label" for="usrlbpwd">* <?= $this->lang->line('user.form.usrlbpwd.label') ?> :</label>
	<div class="controls"><div class="input-prepend">
								<span class="add-on"><i class="icon-key"></i></span> <input
									type="password" placeholder="Password" name="usrlbpwd" id="usrlbpwd" required >
							</div>
		<p class="help-block valtype"><?= $this->lang->line('user.form.usrlbpwd.description')?></p>
	</div></div>
	<div class="control-group">
	<label class="control-label" for="usrlbmai">* <?= $this->lang->line('user.form.usrlbmai.label') ?> :</label>
	<div class="controls"><input class="input-xlarge valtype" type="text" name="usrlbmai" id="usrlbmai" required  >
		<p class="help-block valtype"><?= $this->lang->line('user.form.usrlbmai.description')?></p>
	</div></div>
	<div class="control-group">
	<label class="control-label" for="usrfipho"><?= $this->lang->line('user.form.usrfipho.label') ?> :</label>
	<div class="controls"><input class="input-file" id="usrfipho_file" name="usrfipho_file" type="file" />
		<input type="hidden" name="usrfipho" id="usrfipho"/>
		<p class="help-block valtype"><?= $this->lang->line('user.form.usrfipho.description')?></p>
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

<script src="<?= base_url() ?>www/js/views/user/createuser.fancy.js"></script>
