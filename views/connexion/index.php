<div class=container>
  <div class="row">
  	<form action="index.php" method="post">
    		<?php
    		$login="";
    		$mdp="";
    		?>
      <table class="Connexion">
            <label for="login">Login : </label> <br/>
            <input id='login' type='text' name ='login' value='<?php echo $login ?>'>
    				<br/><br/>
            <label for="mdp">Mot de passe : </label> <br/>
            <input id='mdp' type='password' name ='mdp' value='<?php echo $mdp ?>'>
    	</table>
    	<br/><br/>
      <input type="submit" value="connexion"/>
    </form>
  </div>
</div>
