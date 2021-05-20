<?php
class Session
{
	public function __construct()
	{
		if (!isset($_SESSION))
		{
			session_start();
		}	
	}

	//méthode pour affecter un message de session
	public function setFlash($message,$type = 'success')
	{
		$_SESSION['flash'] = array(
			'message'=> $message,
			'type' => $type
		);
	}

	//méthode pour afficher un message de session
	public function flash()
	{
		if (isset($_SESSION['flash']['message']))
		{
			$html = '<div class="alert alert-'.$_SESSION['flash']['type'].'"><p>'. $_SESSION['flash']['message'].'</p></div>';
			$_SESSION['flash'] = array();
			return $html;
		}
	}

	public function write($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public function read($key = null)
	{
		//debug($key);
		if($key)
		{
			if (isset($_SESSION[$key]))
			{
				return $_SESSION[$key];
			}
			else
			{
				return false;
			}
		}
		else
		{
			return $_SESSION;
		}
	}

	//retourne vrai si le nom de la personne loguée existe
	public function isLogged()
	{
		return isset($_SESSION['compte']->Pseudo_Compte);
	}

	//methode pour lire la valeur du user
	public function user($key)
	{
		if ($this->read('compte'))
		{
			if (isset($this->read('compte')->$key))
			{
				return $this->read('compte')->$key;
			}
			else
			{
				return false;
			}
		}
		return false;
	}
}
?>