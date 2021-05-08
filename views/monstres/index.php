<h2><?=$titre?></h2>

<div class="row">
<?php 
foreach ($mtrs as $m){
	echo '<div class="col-sm"><div class="card" style="width: 18rem;">';
	echo '<div class="card-header">'.$m->Nom_Page.'</div><img src="/'.WEBROOT2.'/webroot/img/'.$m->Image_Page.'" class="card-img-top" alt="'.$m->Nom_Page.' picture">
		<div class="card-body">';
	echo '<a href="/'.WEBROOT2.'/monstres/view/'.$m->Id_Page.'" class="btn btn-primary">Voir en détails</a></div>';
	echo '</div></div>';	
}
?>
</div>
