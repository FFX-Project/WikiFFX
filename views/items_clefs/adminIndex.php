<h1><?=$titre?></h1>
<?php
	//echo "<PRE>";
	//print_r($icocs);
	//echo "</PRE>";
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom_Page</th>
      <th scope="col">Image_Page</th>
      <th scope="col">Nom location</th>
      <th scope="col">Description</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php
	foreach ($items_clefs as $ic){

		echo "<tr>";
    echo '  <th scope="row">'.$ic->Id_Page.'</th>';
		echo '  <td><a href="/'.WEBROOT2.'/items_clefs/view/'.$ic->Id_Page.'">'.$ic->Nom_Page.'</a></td>';
		echo '  <td><img src="/'.WEBROOT2.'/webroot/img/'.$ic->Image_Page.'" width="100" /></td>';
    echo '   <td><a href="/'.WEBROOT2.'/locations/view/'.$ic->Id_Location.'">'.$ic->nom_location.'</td>';
		echo '  <td>'.$ic->Description_Page.'</td>';
    echo "  <td><a href='/".WEBROOT2."/items_clefs/adminEdit/".$ic->Id_Page."'><i class='fas fa-edit'></i></a></td> ";
		echo "  <td><a href='/".WEBROOT2."/items_clefs/adminDelete/".$ic->Id_Page."' onclick=\"return confirm('Voulez vous vraiment supprimer cette catégorie?');\"><i class='fas fa-trash-alt'></i></a></td>";
		echo '  <td></td>';
		echo '</tr>';
	}
  echo "<tr>";
  echo '  <th scope="row"></th>';
  echo '  <td>';
  echo "<a href='/".WEBROOT2."/items_clefs/adminEdit/'><i class='fas fa-plus'></i></a> ";
  echo '</td>';
  echo '  <td></td>';
  echo '  <td></td>';
  echo '</tr>';
	?>
  </tbody>
</table>
