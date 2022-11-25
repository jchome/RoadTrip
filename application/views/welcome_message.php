<?php
$this->load->helper ( 'url' );
$this->load->helper ( 'form' );
$this->load->helper ( 'template' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo htmlHeader("Welcome"); ?>
	
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-3 col-md-offset-1">
				<img src="<?= base_url() ?>www/images/map_route.png" />
			</div>
			<div class="col-md-6">
				<h1></>Bienvenue sur RoadTrip</h1>
				<p>
					Cette plateforme vous aidera à tracer les itinéraires de vos sorties sur la route. Les cartes interactives seront un support idéal pour placer
					les étapes de vos voyages.<br> Lorsque vous le désirez, partagez votre voyage avec vos amis. 
				
				</p>
				<p style="text-align: right; font-size: 12px; line-height: 12px; padding-top: 0px;">
					<a href="#myCarousel">Voir un aperçu</a>
				</p>
			</div>
		</div>

		<div class="row text-center ">
			<div class="col-md-12">

<?php
if (isset ( $message ) && $message != "") {
?>
<div class="col-md-offset-4 col-md-4 col-sm-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Message</div>
						<div class="panel-body">
				<?= $message ?></div>
					</div>
				</div>
			</div>
		</div>
<?php
}
?>

	<?php
		$msg = $this->session->flashdata('msg_info');    if($msg != ""){echo formatInfo($msg);} 
		$msg = $this->session->flashdata('msg_confirm'); if($msg != ""){echo formatConfirm($msg);}
		$msg = $this->session->flashdata('msg_warn');    if($msg != ""){echo formatWarn($msg);}
		$msg = $this->session->flashdata('msg_error');   if($msg != ""){echo formatError($msg);}
	?>
					<br />
	</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong> <?= $this->lang->line('login.message.type_your_id') ?> </strong>
				</div>
				<div class="panel-body">
<?php
$attributes_info = array (
		'name' => 'LoginForm',
		'role' => 'form' 
);
$fields_info = array (
		"formSend" => "true" 
);
echo form_open_multipart ( 'welcome/index', $attributes_info, $fields_info );
?>
							<br />
					<div class="form-group input-group">
						<span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i>
						</span> <input type="text" class="form-control" placeholder="identifiant" value="<?php echo set_value('login'); ?>" id="login" name="login" />
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i>
						</span> <input type="password" class="form-control" placeholder="mot de passe" name="password" id="password" />
					</div>

					<input type="submit" class="btn btn-primary btn-large" value="<?= $this->lang->line('connect') ?>" name="Submit" />

					<div class="clear"></div>
					<div class="forgotpassword text-right">
						<a href="<?= base_url() ?>index.php/login/forgotpassword/index"><i class="glyphicon glyphicon-question-sign"></i> <?= $this->lang->line('forgotPassword.message.title') ?></a>
					</div>
					<div class="singin text-right">
						<a href="<?= base_url() ?>index.php/login/signin/index"><i class="glyphicon glyphicon-user"></i> <?= $this->lang->line('signin.message.title') ?></a>
					</div>
							
<?php
echo form_close ( '' );
?>
						</div>
				<!-- .panel-body -->

			</div>
			<!-- .panel .panel-default -->
		</div>
		<!-- .col-md-4 -->
	</div>
	<!-- .row -->

	
		<div class="row col-md-3 col-md-offset-3">
			<br/><br/><br/>
			<p>Aperçu des écrans</p>
		</div>
		
		<div class="row">
			
			<div id="myCarousel" class="carousel slide col-md-6 col-md-offset-3" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="<?= base_url() ?>www/images/accueil/screen1.gif" alt="Itinéraire d'un voyage"/>
						<div class="carousel-caption">
							<h3>Itinéraire d'un voyage</h3>
							<p>Un voyage est composé de plusieurs itinéraires.</p>
						</div>
					</div>
					<div class="item">
						<img src="<?= base_url() ?>www/images/accueil/screen2.gif" alt="Etapes d'un itinéraire"/>
						<div class="carousel-caption">
							<h3>Etapes d'un itinéraire</h3>
							<p>La carte interactive facilite la création d'étapes.</p>
						</div>
					</div>
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="background-image: none;"> <span
					class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Précédent</span>
				</a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="background-image: none;"> <span
					class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Suivant</span>
				</a>
			</div>

		<div class="row col-md-12">
			<p>
			<br/><br/><br/>
			<br/><br/><br/>
			</p>
		</div>

	</div>

<?php echo bodyFooter(); ?>

</body>
</html>