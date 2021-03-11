<?php
class Session{

    public function __construct() {
        if (!isset($_SESSION)){
            session_start();
        }
    }
    //méthode pour affecter un message de session
    public function setFlash($message,$type = 'success') {
        $_SESSION['flash'] = array(
            'message'=> $message,
            'type' => $type
        );
    }
    //afficher un message de session
    public function flash() {
        if (isset($_SESSION['flash']['message'])){
           $html = '<div class="alert alert-'.$_SESSION['flash']['type'].'"><p>'. $_SESSION['flash']['message'].'</p></div>';
           $_SESSION['flash'] = array();
           return $html;
        }
    }
    //écrit une variable de session
   public function write($key, $value) {
       $_SESSION[$key] = $value;
   }
   //effectue la lecture d'une variable de session
   public function read($key = null) {
       //debug($key);
       if($key){
           if (isset($_SESSION[$key])){
               //echo $_SESSION[$key];
               return $_SESSION[$key];
           } else {
               return false;
           }
       } else {
           return $_SESSION;
       }
   }
   //retourne vrai si le nom de la perssone logger existe
   public function isLogged() {
       return isset($_SESSION['User']->nom);
   }
   //méthode pour lire la valeur du user
   public function user($key) {
       if ($this->read('User')){
           if (isset($this->read('User')->$key)){
               return $this->read('User')->$key;
           } else {
               return false;
           }

       }
       return false;
   }
 }
?>
