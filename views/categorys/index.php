<h1><?=$titre?></h1>
<?php
	// echo "<PRE>";
	// print_r($cat); 
	// echo "</PRE>";
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom catégorie</th>
      <th scope="col">Ordre</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php 
	foreach ($cats as $c){
		echo "<tr>";
		echo '  <th scope="row">'.$c->id.'</th>';
		echo '  <td>'.$c->name.'</td>';
		echo '  <td>'.$c->ordre.'</td>';
		echo '  <td></td>';
		echo '</tr>';
	}
	?>
  </tbody>
</table>