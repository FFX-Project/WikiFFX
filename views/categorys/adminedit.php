<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Catégorie</h1>
		</div>
	</div>
<?php
	// echo "<PRE>";
	// print_r($cat); 
	// echo "</PRE>";
?>
	<div class="row">
		<div class="col-md-5">
			<form method="POST" action="/<?=WEBROOT2?>/categorys/adminedit">
			  <div class="form-group">
				<label for="exampleInputid1">id</label>
				<input type="id" name="id" class="form-control" id="exampleInputid1" readonly="readonly" 
				value="<?php if(isset($cat->id)) echo $cat->id; ?>">
			  </div>
			  <div class="form-group">
				<label for="exampleInputname1">Nom catégorie :</label>
				<input type="name" name="name" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" 
				placeholder="Entrez le nom"	value="<?php if(isset($cat->name)) echo $cat->name; ?>">
				<small id="nameHelp" class="form-text text-muted">Saisissez le nom de la catégorie.</small>
			  </div>
			  <div class="form-group">
				<label for="exampleInputordre1">ordre</label>
				<input type="ordre" name="ordre" class="form-control" id="exampleInputordre1" 
				placeholder="Entrer l'ordre" value="<?php if(isset($cat->ordre)) echo $cat->ordre; ?>">
			  </div>
			  <button type="submit" class="btn btn-primary">Valider</button>
			</form>
		</div>
	</div>
</div>