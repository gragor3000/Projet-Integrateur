<!--Informations sur un projet en lecture-->
<body>
  <h2>Projet <?=projetTitle?></h2>
   <h3>Superviseur</h3>  
   <p>Nom : <?=supNom?></p>
   <p>Titre : <?=supTitre?></p>
   <p>Courriel : <?=supEmail?></p>
   <p>Téléphone : <?=supTel?></p>
   <br>
    <!--Description du projet-->
	<label>Description et étapes de réalisation</label>
	<br>
	<textarea rows="4" cols="50" id = "projetDesc" name = "projetDesc" ><?=projetDesc?></textarea>
	<br>
	<!--Équipements du projet-->
	<label>Matériels et projets prévus pour la réalisation</label>
	<br>
	<textarea rows="4" cols="50" id = "projetEquip" name = "projetEquip" ><?=projetEquip?></textarea>
	<br>
	<!--Exigences du projet-->
	<label>Exigences particulières</label>
	<br>
	<textarea rows="4" cols="50" id = "projetExtra" name = "projetExtra"><?=projetExtra?></textarea>
	<br>
	<!--Commentaires du projet-->
	<label>Commentaires et informations complémentaires</label>
	<br>
	<textarea rows="4" cols="50" id = "projetInfo" name = "projetInfo"><?=projetInfo?></textarea>
	<br>
   <h3>Entreprise</h3>  
   <p>Nom : <?=entNom?></p>
   <p>Adresse : <?=entAdresse?></p>
   <p>Ville : <?=entVille?></p>
   <p>Courriel : <?=entEmail?></p>
   <p>Téléphone : <?=entTel?></p>
   <br>
</body>
