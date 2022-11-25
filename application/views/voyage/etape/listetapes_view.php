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
<head><!-- Liste des Etapes -->
<?php echo htmlHeader($this->lang->line('etape.form.list.title')); ?>

</head>
<body>

	<?= htmlNavigation("etape","list", $this->session); ?>
	
	<div class="container">

		<h2><?= $this->lang->line('etape.form.list.title') ?></h2>
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
					<th class="sortable"><!-- etplbnom -->
						<a href="<?=base_url()?>index.php/etape/listetapes/index/etplbnom/<?= ($orderBy == 'etplbnom'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'etplbnom'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'etplbnom'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('etape.form.etplbnom.label') ?></a></th>
					<th class="sortable"><!-- etpnulat -->
						<a href="<?=base_url()?>index.php/etape/listetapes/index/etpnulat/<?= ($orderBy == 'etpnulat'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'etpnulat'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'etpnulat'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('etape.form.etpnulat.label') ?></a></th>
					<th class="sortable"><!-- etpnulon -->
						<a href="<?=base_url()?>index.php/etape/listetapes/index/etpnulon/<?= ($orderBy == 'etpnulon'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'etpnulon'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'etpnulon'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('etape.form.etpnulon.label') ?></a></th>
					<th class="sortable"><!-- etpfgarr -->
						<a href="<?=base_url()?>index.php/etape/listetapes/index/etpfgarr/<?= ($orderBy == 'etpfgarr'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'etpfgarr'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'etpfgarr'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('etape.form.etpfgarr.label') ?></a></th>
					<th class="sortable"><!-- etpiditi -->
						<a href="<?=base_url()?>index.php/etape/listetapes/index/etpiditi/<?= ($orderBy == 'etpiditi'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'etpiditi'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'etpiditi'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('etape.form.etpiditi.label') ?></a></th>
					<th class="sortable"><!-- etpnuord -->
						<a href="<?=base_url()?>index.php/etape/listetapes/index/etpnuord/<?= ($orderBy == 'etpnuord'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'etpnuord'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'etpnuord'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('etape.form.etpnuord.label') ?></a></th>
					<th><?= $this->lang->line('object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$even = false;
$enum_etpnuord = array();
foreach($etapes as $etape):

?>
	<tr>

				<td valign="top"><?=$etape->etplbnom?></td>
				<td valign="top"><?=$etape->etpnulat?></td>
				<td valign="top"><?=$etape->etpnulon?></td>
				<td valign="top"><?= ($etape->etpfgarr == "O")?("Oui"):("")?></td>
				<td valign="top"><?=($etape->etpiditi == 0)?(""):($itineraireCollection[$etape->etpiditi]->idilbnom)?>
			</td>
				<td valign="top"><?=$etape->etpnuord?></td>
					<td><a class="btn btn-default" href="<?=base_url()?>index.php/etape/editetape/index/<?=$etape->etpidetp?>" title="<?= $this->lang->line('form.button.edit') ?>"><i class="glyphicon glyphicon-edit"> </i></a>
						<a class="btn btn-danger" href="#" onclick="if( confirm('<?= $this->lang->line('etape.message.askConfirm.deletion')?>')){document.location.href='<?=base_url()?>index.php/etape/listetapes/delete/<?=$etape->etpidetp?>';}" 
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
		
		<a href="<?=base_url()?>index.php/etape/createetape/index" class="btn btn-primary"><?= $this->lang->line('etape.form.create.title') ?></a>
	</div><!-- .container -->
	
<?php echo bodyFooter(); ?>

<script src="<?= base_url() ?>www/js/views/etape/listetapes.js"></script>


</body>
</html>