  <div class="row">
    	<form method="POST" action="/<?=WEBROOT2?>/comptes/InscriptionOk">
      <h1>Inscription</h1><br/>
      <label for="Pseudo_Compte">Pseudo *</label>
      <input type="text" class="form-control" name="Pseudo_Compte" size="20"  value="" required>
      <label for="Mdp_Compte">Mot de passe *</label>
      <input type="password" class="form-control" name="Mdp_Compte" size="20"   required>
      <label for="Email_Compte">E-mail *</label>
      <input type="text" class="form-control" name="Email_Compte" size="20"  required>
      <br/><br/>
      <input type="submit" value="Ok" />
      <h6>Les champs avec * sont obligatoire.</h6>
    </form>
  </div>
