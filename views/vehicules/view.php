<?php
	// echo "<PRE>";
	// print_r($veh); 
	// echo "</PRE>";
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $veh->libmarque  ." ".$veh->name?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
		<?php
			echo '<img src="/'.WEBROOT2.'/webroot/img/'.$veh->id.'.jpg" />';
		?>
		</div>
		<div class="col-md-7">
			<h2>Catégorie :</h2>
			<p>			
			<?php 
			echo $veh->nomcateg;
			?>
			</p>
			<h2>Couleur : </h2>
			<p>			
			<?php 
			echo $veh->libcouleur;
			if ($veh->metal==1) {
				echo " métalisé";
			} 
			?>
			</p>
			<h2>Kilométrage :</h2>
			<p>			 
			<?php 
			echo $veh->km  ." km ";
			?>
			</p>
			<h2>Prix : </h2>
			<p>			
			<?php 
			echo $veh->prix  ." € ";
			?>
			</p>
		
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Détail :</h2>
			<p><?=$veh->detail?></p>
		</div>
	</div>
</div>