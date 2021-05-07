<div class="container">
	<div class="row">
		<div class="col-sm">
			<h2>Résultats</h2>
			<?php

			foreach ($resultat as $r)
			{
				echo $r->Nom_Page;
				echo "<br>";
			}

			?>
		</div>
	</div>
</div>	