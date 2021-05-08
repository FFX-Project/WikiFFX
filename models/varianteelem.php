<?php
class varianteelem extends Model {
	var $table = "varianteelem";

  function getAll($num=99){
		return $this->find(array(
			"order"=> 'Id_Variante ASC',
			"limit"=> 'LIMIT '. $num
		));
	}
}
?>
