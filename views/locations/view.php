	<div class="row">
		<div class="col-md-12">
			<h2><u><?=$loc->Nom_Page?></u></h2>
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
			<h4><u>Monstres :</u></h4>
			<?php
			foreach ($loc->monstres as $key => $value) {
				?>
				<button type="button" onclick="window.location = '/<?=WEBROOT2?>/monstres/view/<?=$key?>'" class="btn btn-info"><?=$value?></button>
				<?php
			}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4><u>Commentaires :</u></h4>
			<?php
			if(isset($_SESSION['compte'])){
			 ?>
			<form action="/<?=WEBROOT2?>/locations/addCom/<?=$loc->Id_Page?>" method="post">
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
					echo "<a href='/".WEBROOT2."/locations/delCom/".$loc->Id_Page."&idD=".$com->Id_Commentaire."' onclick=\"return confirm('Voulez vous vraiment supprimer ce commentaire?');\"><i class='fas fa-trash-alt'></i></a></td>";
				}
			}
				echo "</div>";
			}
		}
			?>
		</div>
	</div>
