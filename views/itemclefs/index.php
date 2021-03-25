<h1><?=$titre?></h1>
<?php
	//echo "<PRE>";
	//print_r($itemc);
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
	foreach ($itemc as $c){

		echo "<tr>";
		echo '  <th scope="row">'.$ic->Id_Page.'</th>';
		echo '  <td><a href="/'.WEBROOT2.'/locations/view/'.$c->Id_Page.'">'.$c->Nom_Page.'</a></td>';
		echo '  <td>'.$c->Image_Page.'</td>';
		echo '  <td>'.$c->Description_Page.'</td>';
		echo "<td><a href='/".WEBROOT2."/locations/adminDelete/".$c->Id_Page."' onclick=\"return confirm('Voulez vous vraiment supprimer cette catégorie?');\">aa</a></td>";
		echo '  <td></td>';
		echo '</tr>';
	}
	?>
  </tbody>
</table>
