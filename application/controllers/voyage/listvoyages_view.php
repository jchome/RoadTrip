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
<head><!-- Liste des Voyages -->
<?php echo htmlHeader($this->lang->line('voyage.form.list.title')); ?>

</head>
<body>

	<?= htmlNavigation("voyage","list", $this->session); ?>
	
	<div class="container">

		<h2><?= $this->lang->line('voyage.form.list.title') ?></h2>
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
					<th class="sortable"><!-- voylbnom -->
						<a href="<?=base_url()?>index.php/voyage/listvoyages/index/voylbnom/<?= ($orderBy == 'voylbnom'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'voylbnom'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'voylbnom'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('voyage.form.voylbnom.label') ?></a></th>
					<th class="sortable"><!-- voyidusr -->
						<a href="<?=base_url()?>index.php/voyage/listvoyages/index/voyidusr/<?= ($orderBy == 'voyidusr'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'voyidusr'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'voyidusr'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= $this->lang->line('voyage.form.voyidusr.label') ?></a></th>
					<th><?= $this->lang->line('object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
foreach($voyages as $voyage):

	$voyidusr_text = ($voyage->voyidusr == 0)?(new User_model()):($this->userservice->getUnique($this->db, $voyage->voyidusr));

?>
	<tr>

				<td valign="top"><a href="<?=base_url()?>index.php/voyage/detailvoyage/index/<?=$voyage->voyidvoy?>"><?=$voyage->voylbnom?></a></td>
				<td valign="top"><?=$voyidusr_text->usrlbnom?></td>
					<td><a class="btn btn-default" href="<?=base_url()?>index.php/voyage/editvoyage/index/<?=$voyage->voyidvoy?>" title="<?= $this->lang->line('form.button.edit') ?>"><i class="glyphicon glyphicon-edit"> </i></a>
						<a class="btn btn-danger" href="#" onclick="if( confirm('<?= $this->lang->line('voyage.message.askConfirm.deletion')?>')){document.location.href='<?=base_url()?>index.php/voyage/listvoyages/delete/<?=$voyage->voyidvoy?>';}" 
						title="<?= $this->lang->line('form.button.delete') ?>"
						><i class="glyphicon glyphicon-remove"> </i></a></td>
				</tr>
<?php 
endforeach; ?>
			</tbody>
		</table>
		<div class="pagination">
			<ul>
			<?php if(isset($pagination)){ echo $pagination->create_links(); } ?>
			</ul>
		</div><!-- .pagination -->
		
		<a href="<?=base_url()?>index.php/voyage/createvoyage/index" class="btn btn-primary"><?= $this->lang->line('voyage.form.create.title') ?></a>
	
		<hr>
		<div class="row">
			<h3><?= $this->lang->line('voyage.form.title.shared')?></h3>
			<?php if( count($allSharedVoyages) == 0 ){
				echo $this->lang->line('voyage.form.message.none_shared');
			}?>
			<ul>
		<?php
		foreach($allSharedVoyages as $sharedVoyage):
		$voyidusr_text = ($sharedVoyage->voyidusr == 0)?(new User_model()):($this->userservice->getUnique($this->db, $sharedVoyage->voyidusr));
		?>
				<li>
					<a href="<?=base_url()?>index.php/voyage/detailvoyage/index/<?=$sharedVoyage->voyidvoy?>"><?=$sharedVoyage->voylbnom?></a> 
					<?= $this->lang->line('voyage.form.message.author', $voyidusr_text->usrlbnom) ?>
				</li>
		<?php 
		endforeach; ?>
			</ul>
		</div>
	
	</div><!-- .container -->
	
	
	<?php echo bodyFooter(); ?>

<script src="<?= base_url() ?>www/js/views/voyage/listvoyages.js"></script>


</body>
</html>