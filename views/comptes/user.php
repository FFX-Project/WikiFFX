<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-5">
			<h1>Bonjour <?=$user->Pseudo_Compte?></h1>
			<h2>Vos informations :</h2>
			<p>Votre pseudo : <?=$user->Pseudo_Compte?></p>
			<p>Votre e-mail : <?=$user->Email_Compte?></p>
			<br>
			<?php
			echo "Gestion compte : <a href='/".WEBROOT2."/comptes/deleteUser/".$user->Id_Compte."' onclick=\"return confirm('Voulez-vous vraiment supprimer votre compte ?');\">Effacer mon compte</i></a>";
			?>
		</div>
	</div>
</div>