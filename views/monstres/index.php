<h1><?=$titre?></h1>
<?php
	/*echo "<PRE>";
	print_r($mtrs); 
	echo "</PRE>";*/
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom_Page</th>
      <th scope="col">Image_Page</th>
      <th scope="col">xd ptdr</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php 
	foreach ($mtrs as $m){	
		echo "<tr>";
		echo '  <th scope="row">'.$m->Id_Page.'</th>';
		echo '  <td>'.$m->Nom_Page.'</td>';
		echo '  <td>'.$m->Image_Page.'</td>';
		echo '  <td>'.$m->Description_Page.'</td>';
		echo '  <td></td>';
		echo '</tr>';
	}
	?>
  </tbody>
</table>
