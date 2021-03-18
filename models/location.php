<?php
class location extends Model {

	var $table = "location";

	function getAll($num=99){
		return $this->find(array(
			"inner"=> 'INNER JOIN page ON location.Id_Page = page.Id_Page',
			"order"=> 'page.id_Page ASC',
			"limit"=> 'LIMIT '. $num
		));
	}

	function deleteVeh($id){
		$this->id=$id;
		return $this->delete();
	}

	function getImage($id){
		return $this->findFirst(array("fields"=>'vehicule.image',"condition"=>'vehicule.id='.$id));
	}
}
?>
