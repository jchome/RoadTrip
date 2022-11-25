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
<head><!-- Liste des Partages -->
<?php echo htmlHeader($this->lang->line('partage.form.list.title')); ?>

</head>
<body>

	<?= htmlNavigation("partage","list", $this->session); ?>
	
	<div class="container">

		<h2><?= $this->lang->line('partage.form.list.title') ?></h2>
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
					<th class="sortable"><!-- paridvoy -->
						<a href="<?=base_url()?>index.php/partage/listpartages/index/paridvoy/<?= ($orderBy == 'paridvoy'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'paridvoy'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'paridvoy'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('partage.form.paridvoy.label') ?></a></th>
					<th class="sortable"><!-- paridami -->
						<a href="<?=base_url()?>index.php/partage/listpartages/index/paridami/<?= ($orderBy == 'paridami'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'paridami'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'paridami'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('partage.form.paridami.label') ?></a></th>
					<th><?= $this->lang->line('object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$even = false;
$enum_paridami = array();
foreach($partages as $partage):

?>
	<tr>

				<td valign="top"><?=($partage->paridvoy == 0)?(""):($voyageCollection[$partage->paridvoy]->voylbnom)?>
			</td>
				<td valign="top"><?=($partage->paridami == 0)?(""):($userCollection[$partage->paridami]->usrlbnom)?>
			</td>
					<td><a class="btn btn-default" href="<?=base_url()?>index.php/partage/editpartage/index/<?=$partage->paridpar?>" title="<?= $this->lang->line('form.button.edit') ?>"><i class="glyphicon glyphicon-edit"> </i></a>
						<a class="btn btn-danger" href="#" onclick="if( confirm('<?= $this->lang->line('partage.message.askConfirm.deletion')?>')){document.location.href='<?=base_url()?>index.php/partage/listpartages/delete/<?=$partage->paridpar?>';}" 
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
		
		<a href="<?=base_url()?>index.php/partage/createpartage/index" class="btn btn-primary"><?= $this->lang->line('partage.form.create.title') ?></a>
	</div><!-- .container -->
	
<?php echo bodyFooter(); ?>

<script src="<?= base_url() ?>www/js/views/partage/listpartages.js"></script>


</body>
</html>