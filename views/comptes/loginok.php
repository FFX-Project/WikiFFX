<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Bienvenue</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<form method="POST" action="/<?=WEBROOT2?>/comptes/logout">
			<?php echo "Bonjour ".$_SESSION['compte']->Pseudo_Compte;?>
			  <button type="submit" class="btn btn-primary">Se déconnecter</button>
			</form>
		</div>
	</div>
</div>