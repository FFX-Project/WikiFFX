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
      <th scope="col">Photo</th>
      <th scope="col">Nom véhicule</th>
      <th scope="col">Prix</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php 
	foreach ($vehs as $v){
		echo "<tr>";
		echo '  <th scope="row">'.$v->id.'</th>';
		echo '  <td><img src="/'.WEBROOT2.'/webroot/img/'.$v->id.'.jpg"</td>';
		echo '  <td><a href="/'.WEBROOT2.'/vehicules/view/'.$v->id.'">'.$v->name.'</a></td>';
		echo '  <td>'.$v->prix.'</td>';
		echo '  <td></td>';
		echo '</tr>';
	}
	?>
  </tbody>
</table>