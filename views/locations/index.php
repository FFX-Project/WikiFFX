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
	foreach ($locs as $l){

		echo "<tr>";
		echo '  <th scope="row">'.$l->Id_Page.'</th>';
		echo '  <td><a href="/'.WEBROOT2.'/locations/view/'.$l->Id_Page.'">'.$l->Nom_Page.'</a></td>';
		echo '  <td>'.$l->Image_Page.'</td>';
		echo '  <td>'.$l->Description_Page.'</td>';
		echo "<td><a href='/".WEBROOT2."/locations/adminDelete/".$l->Id_Page."' onclick=\"return confirm('Voulez vous vraiment supprimer cette catégorie?');\">aa</a></td>";
		echo '  <td></td>';
		echo '</tr>';
	}
	?>
  </tbody>
</table>
