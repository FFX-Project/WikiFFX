<div class="row">
		<div class="col-md-12">
			<h1>Connexion :</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<form method="POST" action="/<?=WEBROOT2?>/comptes">
			  <div class="form-group">
				<label for="exampleInputLogin1">Login</label>
				<input type="login" name="login" class="form-control" id="exampleInputLogin1" aria-describedby="LoginHelp" placeholder="Entrez votre Login">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre mot de passe">
				</div> <br>
				<a href="/<?=WEBROOT2?>/comptes/inscription">Inscription </a>
				<br>
			  <button type="submit" class="btn btn-primary">Se connecter</button>
			</form>
		</div>
	</div>
