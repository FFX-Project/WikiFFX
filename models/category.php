<?php
	class category extends Model {

		var $table="categorie";

		function getLast($num=6) {
			return $this->find(array(
					"order"=> 'ordre ASC',
					"limit"=> 'LIMIT '.$num
				)
			);
		}

		function getCat($id){
			return $this->findFirst(array(
				"condition"=> 'id='.$id
			));
		}
	}
?>
