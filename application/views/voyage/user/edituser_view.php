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
<?php echo htmlHeader( $this->lang->line('user.form.edit.title') ); ?>

</head>
<body>

	<?= htmlNavigation("user","edit", $this->session); ?>
	
	<div class="container">
	
		<h2><?= $this->lang->line('user.form.edit.title') ?></h2>
			<?php
				$msg = $this->session->flashdata('msg_info');    if($msg != ""){echo formatInfo($msg);} 
				$msg = $this->session->flashdata('msg_confirm'); if($msg != ""){echo formatConfirm($msg);}
				$msg = $this->session->flashdata('msg_warn');    if($msg != ""){echo formatWarn($msg);}
				$msg = $this->session->flashdata('msg_error');   if($msg != ""){echo formatError($msg);}
			?>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditForm', 'class' => 'form-horizontal');
$fields_info = array('usridusr' => $user->usridusr);
echo form_open_multipart('user/edituser/save', $attributes_info, $fields_info );

?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="form-group"><!-- Nom de l'utilisateur -->
		<label class="col-md-2 control-label" for="usrlbnom">* <?= $this->lang->line('user.form.usrlbnom.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="usrlbnom" id="usrlbnom" value="<?= $user->usrlbnom ?>" required  >
			<span class="help-block valtype"><?= $this->lang->line('user.form.usrlbnom.description')?></span>
		</div>
	</div>
	
	<div class="form-group"><!-- Identifiant de connexion -->
		<label class="col-md-2 control-label" for="usrlblgn">* <?= $this->lang->line('user.form.usrlblgn.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="usrlblgn" id="usrlblgn" value="<?= $user->usrlblgn ?>" required  >
			<span class="help-block valtype"><?= $this->lang->line('user.form.usrlblgn.description')?></span>
		</div>
	</div>
	
	<div class="form-group"><!-- Mot de passe de connexion -->
		<label class="col-md-2 control-label" for="usrlbpwd">* <?= $this->lang->line('user.form.usrlbpwd.label') ?> :</label>
		<div class="col-md-10">
		<div class="input-prepend">
								<span class="add-on"><i class="icon-key"></i></span> <input
									type="password" placeholder="Password" name="usrlbpwd" class="form-control" id="usrlbpwd" value="<?= $user->usrlbpwd ?>" required >
							</div>
			<span class="help-block valtype"><?= $this->lang->line('user.form.usrlbpwd.description')?></span>
		</div>
	</div>
	
	<div class="form-group"><!-- Adresse e-mail de contact -->
		<label class="col-md-2 control-label" for="usrlbmai">* <?= $this->lang->line('user.form.usrlbmai.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-xlarge valtype form-control" type="text" name="usrlbmai" id="usrlbmai" value="<?= $user->usrlbmai ?>" required  >
			<span class="help-block valtype"><?= $this->lang->line('user.form.usrlbmai.description')?></span>
		</div>
	</div>
	
	<div class="form-group"><!-- Image, photo ou avatar -->
		<label class="col-md-2 control-label" for="usrfipho"><?= $this->lang->line('user.form.usrfipho.label') ?> :</label>
		<div class="col-md-10">
		<input class="input-file" id="usrfipho_file" name="usrfipho_file" class="form-control" type="file" >
		<input type="hidden" name="usrfipho" id="usrfipho" value="<?= $user->usrfipho ?>">
		<?php if($user->usrfipho != "") { ?>
			<div class="span4" id="usrfipho_currentFile"><a href="<?=base_url()?>www/uploads/<?= $user->usrfipho ?>" target="_new"><i class="icon-file"></i> <?= $this->lang->line('form.button.download')?></a></div>
			<div class="span2" id="usrfipho_deleteButton"><a href="#" onclick='deleteFile_usrfipho()' class="btn"><i class="icon-trash"></i> <?= $this->lang->line('form.button.delete')?></a></div>
			<?php } ?>
		
			<span class="help-block valtype"><?= $this->lang->line('user.form.usrfipho.description')?></span>
		</div>
	</div>
		
		
		<hr>
		<div class="row">
			<div class="col-md-offset-2 col-md-2">
				<button type="submit" class="btn btn-primary"><?= $this->lang->line('form.button.save') ?></button>
			</div>
			<div class="col-md-offset-2 col-md-2">
				<a href="<?=base_url()?>index.php/user/listusers/index" type="button" class="btn btn-default"><?= $this->lang->line('form.button.cancel') ?></a>
			</div>
		</div>
			
			
		</fieldset>

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<?php echo bodyFooter(); ?>

<script src="<?= base_url() ?>www/js/views/user/edituser.js"></script>


</body>
</html>