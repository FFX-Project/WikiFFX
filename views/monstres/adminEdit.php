<div class="row">
	<div class="col-md-12">
		<h1>Monstre</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		<form method="POST" action="/<?=WEBROOT2?>/monstres/adminedit" enctype="multipart/form-data">
		  <div class="form-group">
				<label for="exampleInputid1">id</label>
				<input type="id" name="id" class="form-control" id="exampleInputid1" readonly="readonly"
				value="<?php if(isset($mtr->Id_Page)) echo $mtr->Id_Page; ?>">
		  </div>
		  <div class="form-group">
				<label for="exampleInputname1">Nom :</label>
				<input type="name" name="Nom_Page" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" placeholder="Entrez le nom"
					value="<?php if(isset($mtr->Nom_Page)) echo $mtr->Nom_Page; ?>">
		  </div>
			<div class="form-group">
				 <label for="exampleFormControlTextarea1">Description :</label>
				 <textarea class="form-control" id="Description_Page" rows="5" name="Description_Page"><?php if(isset($mtr->Description_Page)) echo $mtr->Description_Page; ?></textarea>
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">HP :</label>
				 <input type="name" name="Hp_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->Hp_Monstre)) echo $mtr->Hp_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">Précision :</label>
				 <input type="name" name="Accuracy_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->Accuracy_Monstre)) echo $mtr->Accuracy_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">Chance :</label>
				 <input type="name" name="Chance_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->Chance_Monstre)) echo $mtr->Chance_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">Défense :</label>
				 <input type="name" name="Defence_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->Defence_Monstre)) echo $mtr->Defence_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">Défense magique :</label>
				 <input type="name" name="DefenceMagique_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->DefenceMagique_Monstre)) echo $mtr->DefenceMagique_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">Agilité :</label>
				 <input type="name" name="Agi_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->Agi_Monstre)) echo $mtr->Agi_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">Esquive :</label>
				 <input type="name" name="Esquive_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->Esquive_Monstre)) echo $mtr->Esquive_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">MP :</label>
				 <input type="name" name="Mp_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->Mp_Monstre)) echo $mtr->Mp_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">Force :</label>
				 <input type="name" name="Force_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->Force_Monstre)) echo $mtr->Force_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">Magie :</label>
				 <input type="name" name="Magie_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->Magie_Monstre)) echo $mtr->Magie_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">Overkill :</label>
				 <input type="name" name="Overkill_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
					value="<?php if(isset($mtr->Overkill_Monstre)) echo $mtr->Overkill_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">Gil :</label>
				 <input type="name" name="Gil_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->Gil_Monstre)) echo $mtr->Gil_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="exampleInputname1">Xp :</label>
				 <input type="name" name="XP_Monstre" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				 	value="<?php if(isset($mtr->XP_Monstre)) echo $mtr->XP_Monstre; ?>">
			 </div>
			 <div class="form-group">
				 <label for="Feu">Feu</label><br/>
				 <select name='Feu' >
					 <?php
				 	foreach ($elems as $e)
				 	{
				 		echo '<option ';
				 			if(isset($mtr->Feu))
				 				{
				 					if($mtr->Feu==$e->Nom_Variante)
				 					{
				 						echo 'selected="selected"';
				 					}
				 				}
				 		echo 'value ='.$e->Id_Variante.'>'.$e->Nom_Variante.'</option>';
				 	}
				 	 ?>
				 </select>
			 </div>
			 <div class="form-group">
				 <label for="Glace">Glace</label><br/>
				 <select name='Glace'>
					 <?php
				 	foreach ($elems as $e)
				 	{
				 		echo '<option ';
				 			if(isset($mtr->Glace))
				 				{
				 					if($mtr->Glace==$e->Nom_Variante)
				 					{
				 						echo 'selected="selected"';
				 					}
				 				}
				 		echo 'value ='.$e->Id_Variante.'>'.$e->Nom_Variante.'</option>';
				 	}
				 	 ?>
				 </select>
			 </div>
			 <div class="form-group">
				 <label for="Foudre">Foudre </label><br/>
				 <select name='Foudre'>
					 <?php
				 	foreach ($elems as $e)
				 	{
				 		echo '<option ';
				 			if(isset($mtr->Foudre))
				 				{
				 					if($mtr->Foudre==$e->Nom_Variante)
				 					{
				 						echo 'selected="selected"';
				 					}
				 				}
				 		echo 'value ='.$e->Id_Variante.'>'.$e->Nom_Variante.'</option>';
				 	}
				 	 ?>
				 </select>
			 </div>
			 <div class="form-group">
				 <label for="Eau">Eau</label><br/>
				 <select name='Eau'>
					 <?php
				 	foreach ($elems as $e)
				 	{
				 		echo '<option ';
				 			if(isset($mtr->Eau))
				 				{
				 					if($mtr->Eau==$e->Nom_Variante)
				 					{
				 						echo 'selected="selected"';
				 					}
				 				}
				 		echo 'value ='.$e->Id_Variante.'>'.$e->Nom_Variante.'</option>';
				 	}
				 	 ?>
				 </select>
			 </div>
			 <?php if(empty($mtr->Id_Page)){?>
			 <div class="form-group">
				 <label for="Id_Location">Nom des locations </label><br/>
				 <select name='Id_Location[]' multiple="multiple">
						 <?php
						 foreach ($location as $l)
						 {
							 echo '<option ';
								 if(!empty($mtr->lieux))
									 {
										 foreach ($mtr->lieux as $key => $value) {
											 if($key==$l->Id_Page)
											 {
												 echo 'selected="selected" ';
											 }
										 }
									 }
							 echo 'value ='.$l->Id_Page.'>'.$l->Nom_Page.'</option>';
						 }
							?>
				 </select>
			 </div>
		 <?php }?>
		  <div>
				<?php if(isset($mtr->Image_Page)) echo '<img src="/'.WEBROOT2.'/webroot/img/'.$mtr->Image_Page.'" width="400" />'; ?>
				<br/>
		  	<div class="custom-file">
			  	<input type="file" name="fichier" class="custom-file-input" id="customFile">
			  	<label class="custom-file-label" for="customFile">Choose file</label>
				</div>
			</div>
			<br/>
		 	<button type="submit" class="btn btn-primary">Valider</button>
		</form>
	</div>
</div>
