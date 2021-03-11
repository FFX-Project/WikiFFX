<?php
class category extends Model {
	
	var $table = "categorie";
	
	function getLast($num=6){
		return $this->find(array(
			"order"=> 'ordre ASC',
			"limit"=> 'LIMIT '. $num
		));
	}
	
	function getCat($id){
		// echo $id;
		// $cat = $this->findFirst(array(
			// "condition"=> 'id='.$id
		// ));
	// echo "<PRE>";
	// print_r($cat); 
	// echo "</PRE>";
		
		return $this->findFirst(array(
			"condition"=> 'id='.$id
		));
	}
	
	function deleteCat($id){
		$this->id=$id;
		return $this->delete();
	}
}
?>