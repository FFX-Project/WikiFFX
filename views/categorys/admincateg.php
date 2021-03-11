		<h1><?=$titre?></h1>
<form method="POST" action="/<?=WEBROOT2?>/categorys/admincateg">
  <table class='table table-hover table-bordered table-striped table-dark'>
              <thead>
                  <tr>
                      <th scope='col'>Id</th>
                      <th scope='col'>name</th>
  										<th scope='col'>photo</th>
                      <th scope='col'>ordre</th>

                  </tr>
              </thead>
              <tbody>

                  <?php
                  foreach ($cats as $c) {
                      echo "<tr>";
                      echo "<td>";
                      echo $c->id." ";
                      echo "</td>";
                      echo '<td><a href="/'.WEBROOT2.'/categorys/view/'.$c->id.'">';
                      echo $c->name." ";
                      echo "</td>";
  										echo "<td>";
                      echo $c->photo." ";
                      echo "</td>";
                      echo "<td>";
                      echo $c->ordre."<br>";
                      echo "</td>";
                      echo '<td style="width: 100px">
                            <a href="admincateg?idedit='.$c->id.'"><img src="/'.WEBROOT2.'/webroot/image/modifier.png" height="25px" width="25px">','&nbsp',
                           '<a href="/'.WEBROOT2.'/categorys/AdminDelete('.$c->id.')" onclick=\"return confirm ("Voulez vous vraiment supprimer cette catégorie ?";\"><img src="/'.WEBROOT2.'/webroot/image/supprimer.png" height="25px" width="25px">';
                      echo "</td>";
                      echo "</tr>";
                    }
              ?>
          </tbody>
          </table>
</form>
