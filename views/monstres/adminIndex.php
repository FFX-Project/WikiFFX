<h1><?=$titre?></h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Image</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php
	foreach ($mtrs as $m){
		echo "<tr>";
		echo '  <th scope="row">'.$m->Id_Page.'</th>';
		echo '  <td><a href="/'.WEBROOT2.'/monstres/view/'.$m->Id_Page.'">'.$m->Nom_Page.'</a></td>';
    echo '  <td><img src="/'.WEBROOT2.'/webroot/img/'.$m->Image_Page.'" width="100" /></td>';
		echo '  <td>';
    echo "  <td><a href='/".WEBROOT2."/monstres/adminEdit/".$m->Id_Page."'><i class='fas fa-edit'></i></a></td> ";
    echo "  <td><a href='/".WEBROOT2."/monstres/adminDelete/".$m->Id_Page."' onclick=\"return confirm('Voulez vous vraiment supprimer ce monstre?');\"><i class='fas fa-trash-alt'></i></a></td>";
    echo "  <td><a href='/".WEBROOT2."/monstres/adminGestionLoc/".$m->Id_Page."'><i class='fas fa-edit'></i></a></td> ";
    echo '  <td></td>';
		echo '</tr>';
	}
	echo "<tr>";
	echo '  <th scope="row"></th>';
	echo '  <td>';
	echo "<a href='/".WEBROOT2."/monstres/adminEdit/'><i class='fas fa-plus'></i></a> ";
	echo '</td>';
	echo '  <td></td>';
	echo '  <td></td>';
	echo '</tr>';

	?>
  </tbody>
</table>
