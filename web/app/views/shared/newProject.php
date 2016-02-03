<!--Informations sur un nouveau projet-->
<body>
  <h2>Nouveau Projet</h2>
  <form role="form" id="projet" class="panel panel-default">
   <h3>Superviseur</h3>  
   <label>Nom : </label>
   <br>
   <input type = "text" id = "supName" name = "supName" class="form-control" required>
   <br>
   <label>Titre : </label>
   <br>
   <input type = "text" id = "supTitre" name = "supTitre" class="form-control" required>
   <br>
   <label>Courriel : </label>
   <br>
   <input type = "text" id = "supEmail" name = "supEmail" class="form-control" required>
   <br>
   <label>T&eacute;l&eacute;phone : </label>
   <br>
   <input type = "text" id = "supTel" name = "supTel" class="form-control" required>
   <br>
   <h3>Projet</h3> 
   <label>Nom du projet : </label>
   <br>
   <input type = "text" id = "projetTitle" name = "projetTitle" required>
   <br>
    <!--Description du projet-->
	<label>Description et &eacute;tapes de r&eacute;alisation</label>
	<br>
	<textarea rows="4" cols="50" id = "projetDesc" name = "projetDesc" class="form-control" required></textarea>
	<br>
	<!--&eacute;quipements du projet-->
	<label>Mat&eacute;riels et projets pr&eacute;vus pour la r&eacute;alisation</label>
	<br>
	<textarea rows="4" cols="50" id = "projetEquip" name = "projetEquip" class="form-control" required></textarea>
	<br>
	<!--Exigences du projet-->
	<label>Exigences particuli&egrave;res</label>
	<br>
	<textarea rows="4" cols="50" id = "projetExtra" name = "projetExtra" class="form-control" required></textarea>
	<br>
	<!--Commentaires du projet-->
	<label>Commentaires et informations compl&eacute;mentaires</label>
	<br>
	<textarea rows="4" cols="50" id = "projetInfo" name = "projetInfo" class="form-control" required></textarea>
	<br>
	<br>
	<button type="submit" formmethod="POST" formaction="">Enregistrer</button>
	<br>
   </form>	
</body>
