<div class="container">
	<div class="row">
		<div class="col-sm">
			<h2><?=$titre?></h2>

			<?
			if (isset($error))
			{
				echo "<img src='".$error."' class='img-fluid'>";
			}
			else
			{
				?>
				<table class="table table-striped">
				<tbody>
				<?
				foreach ($resultat as $r)
				{
					echo "<tr>";
					if ($r->Type == "monstre") {
						echo "<td><a href='/".WEBROOT2."/monstres/view/".$r->Id_Page."'</a>".$r->Nom_Page."</td>";
					}
					else if ($r->Type == "location") {
						echo "<td><a href='/".WEBROOT2."/locations/view/".$r->Id_Page."'</a>".$r->Nom_Page."</td>";
					}
					else if ($r->Type == "item") {
						echo "<td><a href='/".WEBROOT2."/items_clefs/view/".$r->Id_Page."'</a>".$r->Nom_Page."</td>";
					}
					//echo "<td>".$r->Nom_Page."</td>";
					echo "<td><img src='/".WEBROOT2."/webroot/img/".$r->Image_Page."' width='100px' </td>";
					echo "<td>".$r->Type."</td>";
					echo "</tr>";
				}
				echo '</tbody></table>';
			}
			?>
		</div>
	</div>
</div>