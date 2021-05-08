<div class="row">
	<div class="col-md-12">
		<h2><u><?=$item_clef->Nom_Page?></u></h2>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<img src="/<?=WEBROOT2?>/webroot/img/<?=$item_clef->Image_Page?>" class="img-thumbnail" alt="<?=$item_clef->Nom_Page?> picture">
	</div>
	<div class="col-md-8">
		<h4><u>Description :</u></h4>
		<p><?=$item_clef->Description_Page?></p>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h4><u>Lieux :</u></h4>
		<button type="button" onclick="window.location = '/<?=WEBROOT2?>/locations/view/<?=$item_clef->Id_Location?>'" class="btn btn-info"><?=$item_clef->nom_location?></button>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h4><u>Commentaires :</u></h4>
		<p>Aucun commenaitre pour l'instant...</p>
	</div>
</div>
