<b>
		<h1><?=$titre?></h1>
<table class='table table-hover table-bordered table-striped table-dark'>
            <thead>
                <tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>name</th>
										<th scope='col'>immat</th>
                    <th scope='col'>detail</th>
										<th scope='col'>categ</th>

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($vehs as $v) {
                    echo "<tr>";
                    echo "<td>";
                    echo $v->id." ";
                    echo "</td>";
                    echo '<td><a href="/'.WEBROOT2.'/categorys/view/'.$c->id.'">';
                    echo $v->name." ";
                    echo "</td>";
										echo "<td>";
                    echo $v->immat." ";
                    echo "</td>";
                    echo "<td>";
                    echo $v->detail."<br>";
                    echo "</td>";
										echo "<td>";
                    echo $v->categ."<br>";
                    echo "</td>";
                    echo "</tr>";
                  }

            ?>
        </tbody>
        </table>
</b>
