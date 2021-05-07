<h2><?=$titre?></h2>

<div class="row">
<?php 
foreach ($items_clefs as $ic){
	echo '<div class="col-sm"><div class="card" style="width: 18rem;">';
	echo '<div class="card-header">'.$ic->Nom_Page.'</div><img src="/'.WEBROOT2.'/webroot/img/'.$ic->Image_Page.'" class="card-img-top" alt="'.$ic->Nom_Page.' picture">
		<div class="card-body">';
	echo '<a href="/'.WEBROOT2.'/items_clefs/view/'.$ic->Id_Page.'" class="btn btn-primary">Voir en détails</a></div>';
	echo '</div></div>';	
}
?>
</div>
