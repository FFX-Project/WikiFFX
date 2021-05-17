<div class="row">
	<div class="col-md-12">
		<h1>Gestion des locations des monstres </h1>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		<form method="POST" action="/<?=WEBROOT2?>/monstres/adminAddLoc/<?=$mtr->Id_Page?>">
		  <div class="form-group">
				<label for="exampleInputid1">id</label>
				<input type="Id_Page" name="Id_Page" class="form-control" id="exampleInputid1" readonly="readonly"
				value="<?php if(isset($mtr->Id_Page)) echo $mtr->Id_Page; ?>">
		  </div>
			<div class="form-group">
				<label for="Id_Page_1">Nom des locations à lié</label><br/>
				<select name='Id_Page_1' >
				<?php
				foreach ($locs as $l)
				{
					echo '<option value ="'.$l->Id_Page.'">'.$l->Nom_Page.'</option>';
				}
				?>
				</select>
			</div>
		 	<button type="submit" class="btn btn-primary">Valider</button>
		</form>
	</div>
</div>
