<!--Rapport d'entrevue en lecture-->
<body>
   <h2>Rapport d'entrevue</h2>
   <p>Nom de l'étudiant : <?=name?></p>
   <p>Service / département  où l’étudiant effectuera son stage : <?=service?></p>
   <p>Poste visé : <?=poste?></p>
   <p>Date d'arrivée : <?=dates?></p>
   <p>Heure d'arrivée : <?=hour?></p>
   <br>
   <!--Formulaire d'entrevue-->
   <table>
    <tr>
	  <th>Critères</th>
	  <th>Mauvais</th>
	  <th>Insatisfait</th>
	  <th>Assez bien</th>
	  <th>Bien</th>
	  <th>Excellent</th>
	</tr>
	<tr>
	 <td><p>Communication orale</p></td>
	 <td><input type = "radio" name = "crit1" value = "1" /></td>
	 <td><input type = "radio" name = "crit1" value = "2"/></td>
	 <td><input type = "radio" name = "crit1" value = "3"/></td>
	 <td><input type = "radio" name = "crit1" value = "4"/></td>
	 <td><input type = "radio" name = "crit1" value = "5"/></td>
	</tr>
	<tr>
	 <td><p>Enthousiasme et motivation</p></td>
	 <td><input type = "radio" name = "crit2" value = "1" /></td>
	 <td><input type = "radio" name = "crit2" value = "2"/></td>
	 <td><input type = "radio" name = "crit2" value = "3"/></td>
	 <td><input type = "radio" name = "crit2" value = "4"/></td>
	 <td><input type = "radio" name = "crit2" value = "5"/></td>
	</tr>
	<tr>
	 <td><p>Assurance et Confiance en soi</p></td>
	 <td><input type = "radio" name = "crit3" value = "1" /></td>
	 <td><input type = "radio" name = "crit3" value = "2"/></td>
	 <td><input type = "radio" name = "crit3" value = "3"/></td>
	 <td><input type = "radio" name = "crit3" value = "4"/></td>
	 <td><input type = "radio" name = "crit3" value = "5"/></td>
	</tr>
	<tr>
	 <td><p>Présentation soignée</p></td>
	 <td><input type = "radio" name = "crit4" value = "1" /></td>
	 <td><input type = "radio" name = "crit4" value = "2"/></td>
	 <td><input type = "radio" name = "crit4" value = "3"/></td>
	 <td><input type = "radio" name = "crit4" value = "4"/></td>
	 <td><input type = "radio" name = "crit4" value = "5"/></td>
	</tr>
	<tr>
	 <td><p>Qualité des réponses</p></td>
	 <td><input type = "radio" name = "crit5" value = "1" /></td>
	 <td><input type = "radio" name = "crit5" value = "2" /></td>
	 <td><input type = "radio" name = "crit5" value = "3" /></td>
	 <td><input type = "radio" name = "crit5" value = "4" /></td>
	 <td><input type = "radio" name = "crit5" value = "5" /></td>
	</tr>
   </table>
   <br>
   <label>Commentaires : </label>
   <br>
   <textarea rows="4" cols="50" id = "Comment" name = "Comment"><?=Comment?></textarea>
   <br>
  <p>Nom  du responsable aux  entrevues : <?=responsable?></p>
</body>