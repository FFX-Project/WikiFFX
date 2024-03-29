<?php
class compte extends Model
{
	var $table = "compte";

	function getUser($login, $password)
	{
		return $this->findFirst(array(
			"condition"=> 'Pseudo_Compte="'.$login.'" and Mdp_Compte="'.md5($password).'"',  "order"=> "Id_Compte"
		));
	}

	function getDetails($id)
	{
		return $this->findFirst(array(
			"condition"=>"compte.Id_Compte=".$id,
			"order"=> "compte.Id_Compte"
		));
	}

	function getPseudo($id)
	{
		return $this->findFirst(array(
			"fields"=>"Pseudo_Compte",
			"condition"=> "compte.Id_Compte = ".$id,
			"order"=> "compte.Id_Compte"
		));
	}

	//Vérifie si le pseudo existe déjà
	function IfPseudoExist($nom)
	{
		return $this->find(array(
			"condition" => "Compte.Pseudo_Compte LIKE '%".$nom."%'",
			"order" => 'Compte.Id_Compte ASC',
		));
	}

	function deleteU($id)
	{
		$this->id=$id;
		$this->delete(array("IdDel"=> "Id_Compte", "from"=>"commentaire"));
		return $this->delete(array("IdDel"=> "Id_Compte"));
	}
}
?>
