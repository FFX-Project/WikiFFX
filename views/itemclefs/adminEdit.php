<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Vehicules</h1>
		</div>
	</div>
<?php
	// echo "<PRE>";
	// print_r($veh); 
	// echo "</PRE>";
?>
	<div class="row">
		<div class="col-md-5">
			<form method="POST" action="/<?=WEBROOT2?>/vehicules/adminedit" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="exampleInputid1">id</label>
				<input type="id" name="id" class="form-control" id="exampleInputid1" readonly="readonly" 
				value="<?php if(isset($veh->id)) echo $veh->id; ?>">
			  </div>
			  <div class="form-group">
				<label for="exampleInputname1">Nom vehicule :</label>
				<input type="name" name="name" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" 
				placeholder="Entrez le nom"	value="<?php if(isset($veh->name)) echo $veh->name; ?>">
				<small id="nameHelp" class="form-text text-muted">Saisissez le nom de la catégorie.</small>
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlSelect1">Category : </label>
				<select name="categorie" class="form-control" id="exampleFormControlSelect1">
				  <?php
				  foreach ($cats as $cat){
					  if ($cat->id==$veh->categorie)
					  {
						echo "<option value='".$cat->id."' selected>".$cat->name."</option>";
					  }
					  else
					  {
						  echo "<option value='".$cat->id."'>".$cat->name."</option>";
					  }
				  }
				?>
				</select>
			  </div>
				
				
				
			  </div>
			  <div class="form-group">
				<label for="exampleInputprix1">Prix</label>
				<input type="prix" name="prix" class="form-control" id="exampleInputprix1" 
				placeholder="Entrer l'prix" value="<?php if(isset($veh->prix)) echo $veh->prix; ?>">
			  </div>
			  <div class="custom-file">
				  <input type="file" name="fichier" class="custom-file-input" id="customFile">
				  <label class="custom-file-label" for="customFile">Choose file</label>
				</div>
			  <button type="submit" class="btn btn-primary">Valider</button>
			</form>
		</div>
	</div>
</div>