<?php
$this->load->helper('url');
$this->load->helper('form');
$this->load->helper('template');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo htmlHeader($this->lang->line('signin.message.title')); ?>
</head>
<body>
	<div class="container">
		<div class="row text-center ">
			<div class="col-md-12">
				<br /> <br />
				<h2><?= $this->lang->line('signin.message.title') ?> </h2>
<?php
if (isset ( $message ) && $message != "") {
?>
<div class="col-md-offset-4 col-md-4 col-sm-4">
	<div class="panel panel-danger">
		<div class="panel-heading">Erreur</div>
			<div class="panel-body">
				<?= $message ?></div>
			</div>
		</div>
	</div>
</div>
<?php
}
?>

					<br />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-body">
	
	
<?php
$attributes_info = array('name' => 'SignInForm', 'class' => 'form-horizontal');
$fields_info = array("usrlbmai" => $email, "usridusr" => $usridusr);
echo form_open_multipart('login/signin/send', $attributes_info, $fields_info );
?>


	<div class="form-group"><!-- Nom de l'utilisateur -->
		<label class="col-md-3 control-label" for="usrlbnom">* <?= $this->lang->line('user.form.usrlbnom.label') ?> :</label>
		<div class="col-md-9">
		<input class="input-xlarge valtype form-control" type="text" name="usrlbnom" id="usrlbnom" required value="<?= (isset($usrlbnom)?($usrlbnom):("")) ?>" >
			<span class="help-block valtype"><?= $this->lang->line('user.form.usrlbnom.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Identifiant de connexion -->
		<label class="col-md-3 control-label" for="usrlblgn">* <?= $this->lang->line('user.form.usrlblgn.label') ?> :</label>
		<div class="col-md-9">
		<input class="input-xlarge valtype form-control" type="text" name="usrlblgn" id="usrlblgn" required value="<?= (isset($usrlblgn)?($usrlblgn):("")) ?>" >
			<span class="help-block valtype"><?= $this->lang->line('user.form.usrlblgn.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Mot de passe de connexion -->
		<label class="col-md-3 control-label" for="usrlbpwd">* <?= $this->lang->line('user.form.usrlbpwd.label') ?> :</label>
		<div class="col-md-9">
		<div class="input-prepend">
								<span class="add-on"><i class="icon-key"></i></span> <input
									type="password" placeholder="Password" name="usrlbpwd" id="usrlbpwd" class="form-control" required >
							</div>
			<span class="help-block valtype"><?= $this->lang->line('user.form.usrlbpwd.description')?></span>
		</div>
	</div>
	

	<div class="form-group"><!-- Adresse e-mail de contact -->
		<label class="col-md-3 control-label" for="usrlbmai"> <?= $this->lang->line('user.form.usrlbmai.label') ?> :</label>
		<div class="col-md-9 ro-value">
			<?= $email ?>
		</div>
	</div>
	

	<div class="form-group"><!-- Image, photo ou avatar -->
		<label class="col-md-3 control-label" for="usrfipho"><?= $this->lang->line('user.form.usrfipho.label') ?> :</label>
		<div class="col-md-9">
		<input class="input-file" id="usrfipho_file" name="usrfipho_file" class="form-control" type="file" />
		<input type="hidden" name="usrfipho" id="usrfipho"/>
			<span class="help-block valtype"><?= $this->lang->line('user.form.usrfipho.description')?></span>
		</div>
	</div>
	

		<hr>
		<div class="row">
			<div class="col-md-offset-3 col-md-2">
				<input type="submit" class="btn btn-primary" value="<?= $this->lang->line('signin.form.send') ?>" name="Submit">
			</div>
			<div class="col-md-offset-3 col-md-2">
				<a href="<?=base_url()?>index.php/welcome" class="btn btn-default"><?= $this->lang->line('signin.form.cancel') ?></a>
			</div>
		</div>
			
			

<?php
echo form_close('');
?>
				</div><!-- .panel -->
			</div>
		</div><!-- .row -->
	</div><!-- .container -->

<?php echo bodyFooter(); ?>

</body>
</html>