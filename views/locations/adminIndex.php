<h1><?=$titre?></h1>
<?php
	// echo "<PRE>";
	// print_r($vat); 
	// echo "</PRE>";
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Nom catégorie</th>
      <th scope="col">Immat</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php 
	foreach ($vehs as $v){
		echo "<tr>";
		echo '  <th scope="row">'.$v->id.'</th>';
		echo '  <td><img src="/'.WEBROOT2.'/webroot/img/'.$v->image.'" width="100" /></td>';
		echo '  <td>'.$v->name.'</td>';
		echo '  <td>'.$v->immat.'</td>';
		echo '  <td>';
			echo "<a href='/".WEBROOT2."/vehicules/adminEdit/".$v->id."'><i class='fas fa-edit'></i></a> ";
			echo "<a href='/".WEBROOT2."/vehicules/adminDelete/".$v->id."' onclick=\"return confirm('Voulez vous vraiment supprimer cette catégorie?');\"><i class='fas fa-trash-alt'></i></a>"; 
		echo '</td>';
		echo '</tr>';
	}
	echo "<tr>";
	echo '  <th scope="row"></th>';
	echo '  <td>';
	echo "<a href='/".WEBROOT2."/vehicules/adminEdit/'><i class='fas fa-plus'></i></a> ";
	echo '</td>';
	echo '  <td>...</td>';
	echo '  <td></td>';
	echo '</tr>';
	
	?>
  </tbody>
</table>