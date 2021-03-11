<?php
	class user extends Model {

		var $table="user";

		function getUser($login, $password){
			return $this->findFirst(array(
				"condition"=> 'login="'.$login.'" and password="'.md5($password).'"'
			));
		}
	}
?>
