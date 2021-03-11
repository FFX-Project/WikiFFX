<?php
	class veh extends Model {

		var $table="vehicule";

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
