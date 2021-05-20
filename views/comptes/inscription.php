<div class="row justify-content-center">
	<div class="col-md-5">
		<form method="POST" action="/<?=WEBROOT2?>/comptes/InscriptionOk">
			<h1>Inscription</h1><br/>
			<div class="form-group">
				<label for="Pseudo_Compte">Pseudo : *</label>
				<input type="text" class="form-control" name="Pseudo_Compte" size="20"  value="" required>
			</div>
			<div class="form-group">
				<label for="Mdp_Compte">Mot de passe : *</label>
				<input type="password" class="form-control" name="Mdp_Compte" size="20" required>
			</div>
			<div class="form-group">
				<label for="Email_Compte">E-mail : *</label>
				<input type="text" class="form-control" name="Email_Compte" size="20" required>
			</div>
			<h6>Les champs avec * sont obligatoire.</h6>
			<button type="submit" value="Ok" class="btn btn-primary">S'incrire</button>
		</form>
	</div>
</div>
