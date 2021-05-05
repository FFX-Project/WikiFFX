<?php
	 echo "<PRE>";
	 print_r($loc);
	 echo "</PRE>";
?>
	<div class="row">
		<div class="col-md-12">
			<h1><?=$titre?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<br/><br/>
			Location : <?php echo $loc->Nom_Page ?> <br/>
			Image : <?php echo $loc->Image_Page  ?> <br/>
			Description : <?php echo $loc->Description_Page ?>

		</div>
	</div>
