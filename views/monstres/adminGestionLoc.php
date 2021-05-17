<h1><?=$titre?></h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Id Monstre</th>
			<th scope="col">Id Location</th>
			<th scope="col">Nom Location</th>
			<th scope="col"></th>
			<th scope="col"></th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($mtrlieu as $l){
			echo "<tr>";
			echo '  <th scope="row">'.$mtr->Id_Page.'</th>';
			echo '  <td>'.$l->Id_Page.'</td>';
			echo '  <td>'.$l->Nom_Page.'</td>';
			echo '  <td>';
			echo "  <td><a href='/".WEBROOT2."/monstres/adminDeleteLoc/".$mtr->Id_Page."&id2=" .$l->Id_Page."' onclick=\"return confirm('Voulez vous vraiment supprimer cette location?');\"><i class='fas fa-trash-alt'></i></a></td>";
			echo '  <td></td>';
			echo '</tr>';
		}
		echo "<tr>";
		echo '  <td>';
		echo "<a href='/".WEBROOT2."/monstres/adminAddLoc/".$mtr->Id_Page."'><i class='fas fa-plus'></i></a> ";
		echo '</td>';
		echo '  <td></td>';
		echo '  <td></td>';
		echo '  <td></td>';
		echo '  <td></td>';
		echo '  <td></td>';
		echo '</tr>';
		?>
	</tbody>
</table>
