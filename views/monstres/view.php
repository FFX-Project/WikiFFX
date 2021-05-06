<?php
	/*echo "<PRE>";
	print_r($mtr); 
	echo "</PRE>";*/
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2><u><?=$mtr->Nom_Page?> (Gil : <?=$mtr->Gil_Monstre?> - XP : <?=$mtr->XP_Monstre?>)</u></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<img src="/<?=WEBROOT2?>/webroot/img/<?=$mtr->Image_Page?>" class="img-thumbnail" alt="<?=$mtr->Nom_Page?> picture">
		</div>
		<div class="col-md-3">
			<h4><u>Offensive :</u></h4>
			<table class="table table-success table-bordered table-striped">
			    <tr><th scope="col">HP (Overkill)</th><th scope="col"><?=$mtr->Hp_Monstre?> (<?=$mtr->Overkill_Monstre?>)</th></tr>
			    <tr><th scope="col">MP</th><th scope="col"><?=$mtr->Mp_Monstre?></th></tr>
			    <tr><th scope="col">Force</th><th scope="col"><?=$mtr->Force_Monstre?></th></tr>
			    <tr><th scope="col">Magie</th><th scope="col"><?=$mtr->Magie_Monstre?></th></tr>
			    <tr><th scope="col">Précision</th><th scope="col"><?=$mtr->Accuracy_Monstre?></th></tr>
			    <tr><th scope="col">Chance</th><th scope="col"><?=$mtr->Chance_Monstre?></th></tr>
			</table>
		</div>
		<div class="col-md-3">
			<h4><u>Defensive :</u></h4>
			<table class="table table-success table-bordered table-striped">
			    <tr><th scope="col">Defense</th><th scope="col"><?=$mtr->Defence_Monstre?></th></tr>
			    <tr><th scope="col">Magic Defense</th><th scope="col"><?=$mtr->DefenceMagique_Monstre?></th></tr>
			    <tr><th scope="col">Agility</th><th scope="col"><?=$mtr->Agi_Monstre?></th></tr>
			    <tr><th scope="col">Evasion</th><th scope="col"><?=$mtr->Esquive_Monstre?></th></tr>
			</table>
		</div>
		<div class="col-md-2">
			<h4><u>Elementaires :</u></h4>
			<table class="table table-success table-bordered table-striped">
			    <tr><th scope="col">Feu</th><th scope="col"><?=$mtr->Feu?></th></tr>
			    <tr><th scope="col">Glace</th><th scope="col"><?=$mtr->Glace?></th></tr>
			    <tr><th scope="col">Foudre</th><th scope="col"><?=$mtr->Foudre?></th></tr>
			    <tr><th scope="col">Eau</th><th scope="col"><?=$mtr->Eau?></th></tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4><u>Description :</u></h4>
			<p><?=$mtr->Description_Page?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4><u>Lieux :</u></h4>
			<?php
			foreach ($mtr->lieux as $key => $value) {
				?>
				<button type="button" onclick="window.location = '/<?=WEBROOT2?>/locations/view/<?=$key?>'" class="btn btn-info"><?=$value?></button>
				<?php
			}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4><u>Commentaires :</u></h4>
			<p>Aucun commenaitre pour l'instant...</p>
		</div>
	</div>
</div>