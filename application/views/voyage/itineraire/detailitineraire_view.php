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
<head><!-- Liste des Etapes -->
<?php echo htmlHeader($this->lang->line('etape.form.list.title')); ?>
<script>
var isAuteur = <?= $isAuteur ?>;
var points = {};
var itiiditi = <?= $itineraire->itiiditi ?>;
<?php
foreach($etapesCollection as $etape){
	echo "points[\"" . str_replace('"','\\"',$etape->etplbnom) . "\"] = [". $etape->etpnulat . ", ". $etape->etpnulon."];\n";
}?>

</script>

</head>
<body role="document">

	<?= htmlNavigation("etape","list", $this->session); ?>
	
	<div class="container">

		<h2><?= $this->lang->line('detail_itineraire.form.title', $itineraire->idilbnom) ?>
		<span class="smallTitle"><?= $this->lang->line('detail_itineraire.message.distance')?> : <input type="text" id="distance" name="distance" readonly="readonly"/></span>
		<span class="smallTitle"><?= $this->lang->line('detail_itineraire.message.duration')?> : <input type="text" id="duration" name="duration" readonly="readonly"/></span>
		<a href="<?= base_url() ?>index.php/voyage/detailvoyage/index/<?= $itineraire->itiidvoy ?>"
			class="btn btn-default"><?= $this->lang->line('detail_itineraire.action.back') ?></a>
		</h2>
			<?php
				$msg = $this->session->flashdata('msg_info');    if($msg != ""){echo formatInfo($msg);} 
				$msg = $this->session->flashdata('msg_confirm'); if($msg != ""){echo formatConfirm($msg);}
				$msg = $this->session->flashdata('msg_warn');    if($msg != ""){echo formatWarn($msg);}
				$msg = $this->session->flashdata('msg_error');   if($msg != ""){echo formatError($msg);}
			?>
		
		<div id="map-container">
			<div id="map-canvas"></div>
		</div>
		
		<div class="row">
			<hr>
		</div>

		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
		<!-- table header auto-generated : -->
					<th><?= $this->lang->line('etape.form.etpnuord.label') ?></th>
					<th><?= $this->lang->line('etape.form.etplbnom.label') ?></th>
					<th><?= $this->lang->line('etape.form.etpfgarr.label') ?></th>
					<?php if($isAuteur) { ?>
					<th><?= $this->lang->line('etape.form.move') ?></th>
					<th><?= $this->lang->line('object.tableheader.actions') ?></th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
<?php
$i=0;
foreach($etapesCollection as $etape):
?>
			<tr>
				<td valign="top"><?=$etape->etpnuord?></td>
				<td valign="top"><?=$etape->etplbnom?></td>
				<td valign="top"><?= ($etape->etpfgarr == "O")?("Oui"):("")?></td>
				<?php if($isAuteur) { ?>
				<td>
					<?php if($i>0) {?>
					<!-- remonter l'étape -->
					<a class="btn btn-default" href="<?=base_url()?>index.php/etape/editetape/monter?etpidetp=<?= $etape->etpidetp ?>">
					<i class="glyphicon glyphicon-arrow-up"></i>
					</a> 
					<?php }else{ ?>
					<div style="width:44px;float:left;">&nbsp;</div>
					<?php } ?>
					<?php  if($i+1<sizeOf($etapesCollection)){ ?>
					<!-- descendre l'étape -->
					<a class="btn btn-default" href="<?=base_url()?>index.php/etape/editetape/descendre?etpidetp=<?= $etape->etpidetp ?>">
					<i class="glyphicon glyphicon-arrow-down"></i>
					</a> 
					<?php } ?>
				</td>
				<td><a class="btn btn-default" href="<?=base_url()?>index.php/etape/editetape/index/<?=$etape->etpidetp?>" title="<?= $this->lang->line('form.button.edit') ?>"><i class="glyphicon glyphicon-edit"> </i></a>
					<a class="btn btn-danger" href="#" onclick="if( confirm('<?= $this->lang->line('etape.message.askConfirm.deletion')?>')){document.location.href='<?=base_url()?>index.php/etape/listetapes/delete/<?=$etape->etpidetp?>';}" 
					title="<?= $this->lang->line('form.button.delete') ?>"
					><i class="glyphicon glyphicon-remove"> </i></a>
					<!-- Ajouter un itinéraire depuis une étape -->
					<button class="btn btn-default" onclick="createItineraireDepuisEtape(<?= $itineraire->itiidvoy ?>, <?= $etape->etpidetp ?>)"
					title="<?= $this->lang->line('detail_itineraire.action.new_from_etape') ?>"><i class="glyphicon glyphicon-export"></i></button>
				</td>
				<?php } ?>
			</tr>
<?php 
$i++;
endforeach; ?>

			</tbody>
		</table>
	
		<div class="pagination">
			<ul>
			<?php if(isset($pagination)){ echo $pagination->create_links(); } ?>
			</ul>
		</div><!-- .pagination -->
		
		<button href="<?=base_url()?>index.php/etape/createetape/ajoute?etpiditi=<?= $itineraire->itiiditi ?>" 
		class="btn btn-primary" id="ajouteEtape"><?= $this->lang->line('etape.form.create.title') ?></button>
	</div><!-- .container -->
	
<?php echo bodyFooter(); ?>

<script src="<?= base_url() ?>www/js/views/itineraire/detailitineraire.js"></script>


</body>
</html>