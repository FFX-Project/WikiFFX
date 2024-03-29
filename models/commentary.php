<?php
class commentary extends Model
{

	var $table = "commentaire";

	function getPageCommentaire($id)
	{
		return $this->find(array(
			"condition" => "commentaire.Id_Page = ".$id,
			"order" => 'commentaire.Date_Commentaire DESC',
		));
	}

	function deleteCom($id)
	{
		$this->id = $id;
		return $this->delete(array("IdDel"=>"Id_Commentaire"));
	}

	function getDate()
	{
		return $this->getDateNow();
	}
}
?>