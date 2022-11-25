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
$isAuteur = ($this->session->userdata('user_id') == $voyage->voyidusr);

?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><!-- Liste des Itineraires -->
<?php echo htmlHeader($this->lang->line('voyage.form.detail.title', $voyage->voylbnom)); ?>

</head>
<body>

	<?= htmlNavigation("itineraire","list", $this->session); ?>
	
	<div class="container">

		<h2><?= $this->lang->line('voyage.form.detail.title', $voyage->voylbnom) ?></h2>
			<?php
				$msg = $this->session->flashdata('msg_info');    if($msg != ""){echo formatInfo($msg);} 
				$msg = $this->session->flashdata('msg_confirm'); if($msg != ""){echo formatConfirm($msg);}
				$msg = $this->session->flashdata('msg_warn');    if($msg != ""){echo formatWarn($msg);}
				$msg = $this->session->flashdata('msg_error');   if($msg != ""){echo formatError($msg);}
			?>
		
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
		<!-- table header auto-generated : -->
					<th><?= $this->lang->line('itineraire.form.itinuord.label') ?></a></th>
					<th><?= $this->lang->line('itineraire.form.idilbnom.label') ?></a></th>
					<th><?= $this->lang->line('itineraire.form.itinudst.label') ?></a></th>
					<th><?= $this->lang->line('itineraire.form.itilbdur.label') ?></a></th>
					<?php if($isAuteur) {?>
					<th><?= $this->lang->line('object.tableheader.actions') ?></th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
<?php
$even = false;
$enum_itinuord = array();
foreach($itineraires as $itineraire):

?>
			<tr>
				<td valign="top"><?=$itineraire->itinuord?></td>
				<td valign="top"><a href="<?=base_url()?>index.php/itineraire/detailitineraire/index/<?=$itineraire->itiiditi?>"><?=$itineraire->idilbnom?></a></td>
				</td>
				<td valign="top"><?=$itineraire->itinudst?></td>
				<td valign="top"><?=$itineraire->itilbdur?></td>
				<?php if($isAuteur) {?>
				<td><a class="btn btn-default" href="<?=base_url()?>index.php/itineraire/edititineraire/index/<?=$itineraire->itiiditi?>" title="<?= $this->lang->line('form.button.edit') ?>"><i class="glyphicon glyphicon-edit"> </i></a>
					<a class="btn btn-danger" href="#" onclick="if( confirm('<?= $this->lang->line('itineraire.message.askConfirm.deletion')?>')){document.location.href='<?=base_url()?>index.php/itineraire/listitineraires/delete/<?=$itineraire->itiiditi?>';}" 
					title="<?= $this->lang->line('form.button.delete') ?>"
					><i class="glyphicon glyphicon-remove"> </i></a></td>
				<?php } ?>
				</tr>
<?php 
$even = !$even; 
endforeach; ?>

			</tbody>
		</table>
	
		<div class="pagination">
			<ul>
			<?php if(isset($pagination)){ echo $pagination->create_links(); } ?>
			</ul>
		</div><!-- .pagination -->
		<?php if($isAuteur) {?>
		<a href="<?=base_url()?>index.php/itineraire/createitineraire/ajoute?itiidvoy=<?= $voyage->voyidvoy ?>" class="btn btn-primary"
		 id="ajouteItineraire"><?= $this->lang->line('itineraire.form.create.title') ?></a>
		 
		<button href="<?=base_url()?>index.php/partage/createpartagejson/index?paridvoy=<?= $voyage->voyidvoy ?>" class="btn btn-default col-md-offset-2"
		 id="partageVoyage"><?= $this->lang->line('voyage.form.action.share') ?></button>
		
		<?php } ?>
		
		
		<?php if($isAuteur) { ?>
		<hr>
		<div class="row">
			<h3><?= $this->lang->line('voyage.form.title.shared_users')?></h3>
			<?php if( count($allUsersShare) == 0 ){
				echo $this->lang->line('voyage.form.message.no_user_shared');
			}?>
			<ul>
		<?php
		foreach($allUsersShare as $sharedUser):
		?>
				<li>
					<div class="myself-small col-md-2" data-usridusr="<?=$sharedUser->usridusr ?>"
						style="background-image: url('<?=base_url() ?><?= ($sharedUser->usrfipho == "")?("www/images/user-generic.png"):("www/uploads/".$sharedUser->usrfipho) ?>');">
					</div>
				
					<?= $sharedUser->usrlbnom ?> (<?= $sharedUser->usrlbmai ?>)
					<a class="" href="#" onclick="if( confirm('<?= $this->lang->line('partage.message.askConfirm.deletion')?>')){document.location.href='<?=base_url()?>index.php/partage/listpartages/deleteUsrVoy?paridami=<?=$sharedUser->usridusr?>&paridvoy=<?= $voyage->voyidvoy ?>';}" 
						title="<?= $this->lang->line('form.button.delete') ?>"
						><i class="glyphicon glyphicon-remove"> </i></a></td>
				</li>
		<?php 
		endforeach; ?>
			</ul>
		</div>
		
		<?php } ?>
	</div><!-- .container -->
	
<?php echo bodyFooter(); ?>

<script src="<?= base_url() ?>www/js/views/voyage/detailvoyage.js"></script>


</body>
</html>