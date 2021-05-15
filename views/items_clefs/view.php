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
		<?php
		if(isset($_SESSION['compte'])){
		 ?>
		<form action="/<?=WEBROOT2?>/items_clefs/addCom/<?=$item_clef->Id_Page?>" method="post">
				<textarea class="form-control"  placeholder="Ecrire un doux et merveilleux commentaire" name="Text_Commentaire" rows="1"></textarea>
				<br/>
				<button type="submit" class="btn btn-primary">Envoyer</button>
		</form>
		<hr>

		<?php
	}
	if(count($commentaires) == 0){
		?>
		<p>Aucun commenaitre pour l'instant...</p>
		<?php
	} else {
		foreach ($commentaires as $com) {
			echo "<div>";
			echo $com->pseudo;
			echo " : ";
			echo $com->Text_Commentaire;
			echo $com->Date_Commentaire;
		if(isset($_SESSION['compte'])){
			if($_SESSION['compte']->Droit_Compte == 1){
				echo "<a href='/".WEBROOT2."/items_clefs/delCom/".$item_clef->Id_Page."&idD=".$com->Id_Commentaire."' onclick=\"return confirm('Voulez vous vraiment supprimer ce commentaire?');\"><i class='fas fa-trash-alt'></i></a></td>";
			}
		}
			echo "</div>";
		}
	}
		?>


	</div>
</div>
