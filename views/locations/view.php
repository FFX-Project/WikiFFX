<?php
	/*echo "<PRE>";
	print_r($loc);
	echo "</PRE>";*/
?>
	<div class="row">
		<div class="col-md-12">
			<h2><u>Localisation : <?=$loc->Nom_Page?></u></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<img src="/<?=WEBROOT2?>/webroot/img/<?=$loc->Image_Page?>" class="img-thumbnail" alt="<?=$loc->Nom_Page?> picture">
		</div>
		<div class="col-md-8">
			<h4><u>Description :</u></h4>
			<p><?=$loc->Description_Page?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4><u>Commentaires :</u></h4>
			<p>Aucun commenaitre pour l'instant...</p>
		</div>
	</div>
