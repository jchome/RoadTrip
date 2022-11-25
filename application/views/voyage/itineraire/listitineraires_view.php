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
<head><!-- Liste des Itineraires -->
<?php echo htmlHeader($this->lang->line('itineraire.form.list.title')); ?>

</head>
<body>

	<?= htmlNavigation("itineraire","list", $this->session); ?>
	
	<div class="container">

		<h2><?= $this->lang->line('itineraire.form.list.title') ?></h2>
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
					<th class="sortable"><!-- idilbnom -->
						<a href="<?=base_url()?>index.php/itineraire/listitineraires/index/idilbnom/<?= ($orderBy == 'idilbnom'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'idilbnom'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'idilbnom'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('itineraire.form.idilbnom.label') ?></a></th>
					<th class="sortable"><!-- itiidvoy -->
						<a href="<?=base_url()?>index.php/itineraire/listitineraires/index/itiidvoy/<?= ($orderBy == 'itiidvoy'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'itiidvoy'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'itiidvoy'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('itineraire.form.itiidvoy.label') ?></a></th>
					<th class="sortable"><!-- itinuord -->
						<a href="<?=base_url()?>index.php/itineraire/listitineraires/index/itinuord/<?= ($orderBy == 'itinuord'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'itinuord'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'itinuord'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('itineraire.form.itinuord.label') ?></a></th>
					<th><?= $this->lang->line('object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$even = false;
$enum_itinuord = array();
foreach($itineraires as $itineraire):

?>
	<tr>

				<td valign="top"><a href="<?=base_url()?>index.php/itineraire/detailitineraire/index/<?=$itineraire->itiiditi?>"><?=$itineraire->idilbnom?></a></td>
				<td valign="top"><?=($itineraire->itiidvoy == 0)?(""):($voyageCollection[$itineraire->itiidvoy]->voylbnom)?>
			</td>
				<td valign="top"><?=$itineraire->itinuord?></td>
					<td><a class="btn btn-default" href="<?=base_url()?>index.php/itineraire/edititineraire/index/<?=$itineraire->itiiditi?>" title="<?= $this->lang->line('form.button.edit') ?>"><i class="glyphicon glyphicon-edit"> </i></a>
						<a class="btn btn-danger" href="#" onclick="if( confirm('<?= $this->lang->line('itineraire.message.askConfirm.deletion')?>')){document.location.href='<?=base_url()?>index.php/itineraire/listitineraires/delete/<?=$itineraire->itiiditi?>';}" 
						title="<?= $this->lang->line('form.button.delete') ?>"
						><i class="glyphicon glyphicon-remove"> </i></a></td>
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
		
		<a href="<?=base_url()?>index.php/itineraire/createitineraire/index" class="btn btn-primary"><?= $this->lang->line('itineraire.form.create.title') ?></a>
	</div><!-- .container -->
	
<?php echo bodyFooter(); ?>

<script src="<?= base_url() ?>www/js/views/itineraire/listitineraires.js"></script>


</body>
</html>