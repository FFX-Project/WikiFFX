<h2><?=$titre?></h2>

<div class="row">
<?php
foreach ($locs as $l){

	echo '<div class="col-sm"><div class="card" style="width: 18rem;">';
	echo '<div class="card-header">'.$l->Nom_Page.'</div><img src="/'.WEBROOT2.'/webroot/img/'.$l->Image_Page.'" class="card-img-top" alt="'.$l->Nom_Page.' picture">
		<div class="card-body">';
	echo '<a href="/'.WEBROOT2.'/locations/view/'.$l->Id_Page.'" class="btn btn-primary">Voir en détails</a></div>';
	echo '</div></div>';
}
?>
</div>