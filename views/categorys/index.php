<b>
		<h1><?=$titre?></h1>
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
                    echo "</tr>";
                  }

            ?>
        </tbody>
        </table>
</b>
