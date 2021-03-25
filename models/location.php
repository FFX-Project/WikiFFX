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

	function deleteLoc($id){
		$this->id=$id;
		$this->delete(array("IdDel"=>"Id_Page"));
		return $this->delete(array("from"=>"Page","IdDel"=>"Id_Page"));
	}

	function getImage($id){
		return $this->findFirst(array("fields"=>'vehicule.image',"condition"=>'vehicule.id='.$id));
	}

	function getDetail($id){
		return $this->findFirst(array("condition"=>"Id_Page=".$id,	"from"=> "Page", "order"=> "Id_Page"));
	}
}
?>
