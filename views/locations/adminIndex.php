<h1><?=$titre?></h1>
<?php
//echo "<PRE>";
//print_r($locs);
//echo "</PRE>";
?>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">id</th>
			<th scope="col">Nom_Page</th>
			<th scope="col">Image_Page</th>
			<th scope="col">Description</th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($locs as $l)
		{
			echo "<tr>";
			echo '<th scope="row">'.$l->Id_Page.'</th>';
			echo '<td><a href="/'.WEBROOT2.'/locations/view/'.$l->Id_Page.'">'.$l->Nom_Page.'</a></td>';
			echo '<td><img src="/'.WEBROOT2.'/webroot/img/'.$l->Image_Page.'" width="100" /></td>';
			echo '<td>'.$l->Description_Page.'</td>';
			echo "<td><a href='/".WEBROOT2."/locations/adminEdit/".$l->Id_Page."'><i class='fas fa-edit'></i></a>";
			echo "<a href='/".WEBROOT2."/locations/adminDelete/".$l->Id_Page."' onclick=\"return confirm('Voulez vous vraiment supprimer cette location?');\"><i class='fas fa-trash-alt'></i></a></td>";
			echo '</tr>';
		}
		echo "<tr>";
		echo '<th scope="row"></th>';
		echo '<td>';
		echo "<a href='/".WEBROOT2."/locations/adminEdit/'><i class='fas fa-plus'></i></a> ";
		echo '</td>';
		echo '<td></td>';
		echo '<td></td>';
		echo '</tr>';
		?>
	</tbody>
</table>
