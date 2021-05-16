<?php
  echo "<pre>";
  print_r($user);
  echo "</pre>";

echo "  <a href='/".WEBROOT2."/comptes/deleteUser/".$user->Id_Compte."' onclick=\"return confirm('Voulez vous vraiment supprimer cette item clef?');\">Effacer son compte</i></a>";
 ?>
