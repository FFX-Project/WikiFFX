<div class="row">
	<div class="col-md-12">
		<h1>Item clef</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		<form method="POST" action="/<?=WEBROOT2?>/items_clefs/adminedit" enctype="multipart/form-data">
			<div class="form-group">
				<label for="exampleInputid1">id</label>
				<input type="id" name="id" class="form-control" id="exampleInputid1" readonly="readonly"
				value="<?php if(isset($item_clef->Id_Page)) echo $item_clef->Id_Page; ?>">
			</div>
			<div class="form-group">
				<label for="exampleInputname1">Nom :</label>
				<input type="name" name="Nom_Page" class="form-control" id="exampleInputname1" aria-describedby="nameHelp"
				placeholder="Entrez le nom"	value="<?php if(isset($item_clef->Nom_Page)) echo $item_clef->Nom_Page; ?>">
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Description :</label>
				<textarea class="form-control" id="Description" rows="5" name="Description_Page"><?php if(isset($item_clef->Description_Page)) echo $item_clef->Description_Page; ?></textarea>
			</div>
			<div class="form-group">
				<label for="Id_Location">Nom de la location </label><br/>
				<select name='Id_Location'>
					<?php
					foreach ($location as $l)
					{
						echo '<option ';
						if(isset($item_clef->Id_Location))
						{
							if($item_clef->Id_Location==$l->Id_Page)
							{
								echo 'selected="selected"';
							}
						}
						echo 'value ='.$l->Id_Page.'>'.$l->Nom_Page.'</option>';
					}
					?>
				</select>
			</div>
			<div>
				<?php if(isset($item_clef->Image_Page)) echo '<img src="/'.WEBROOT2.'/webroot/img/'.$item_clef->Image_Page.'" width="400" />'; ?>
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
