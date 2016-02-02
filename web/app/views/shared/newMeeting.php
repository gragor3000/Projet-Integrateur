<!--Rapport d'une nouvelle entrevue-->
<body>
   <h2>Rapport d'entrevue</h2>
   <!--Formulaire d'entrevue-->
  <form role="form" id="meeting" class="panel panel-default">
   <label>Nom de l'étudiant : </label>
   <br>
    <input type = "text" id = "internName" name = "internName" class="form-control" required>
   <br>
   <label>Service / département  où l’étudiant effectuera son stage : </label>
      <br>
    <input type = "text" id = "internService" name = "internService" class="form-control" required>
   <br>
   <label>Poste visé : </label>
      <br>
    <input type = "text" id = "internPost" name = "internPost" class="form-control" required>
   <br>
   <label>Date d'arrivée : </label>
    <!--mettre un calendrier ici-->
   <label>Heure d'arrivée : </label>
   <br>
    <input type = "text" id = "meetHour" name = "meetHour" class="form-control" required>
   <br>
   <br>
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
	 <td><input type = "radio" name = "crit1" value = "1" checked/></td>
	 <td><input type = "radio" name = "crit1" value = "2"/></td>
	 <td><input type = "radio" name = "crit1" value = "3"/></td>
	 <td><input type = "radio" name = "crit1" value = "4"/></td>
	 <td><input type = "radio" name = "crit1" value = "5"/></td>
	</tr>
	<tr>
	 <td><p>Enthousiasme et motivation</p></td>
	 <td><input type = "radio" name = "crit2" value = "1" checked/></td>
	 <td><input type = "radio" name = "crit2" value = "2"/></td>
	 <td><input type = "radio" name = "crit2" value = "3"/></td>
	 <td><input type = "radio" name = "crit2" value = "4"/></td>
	 <td><input type = "radio" name = "crit2" value = "5"/></td>
	</tr>
	<tr>
	 <td><p>Assurance et Confiance en soi</p></td>
	 <td><input type = "radio" name = "crit3" value = "1" checked/></td>
	 <td><input type = "radio" name = "crit3" value = "2"/></td>
	 <td><input type = "radio" name = "crit3" value = "3"/></td>
	 <td><input type = "radio" name = "crit3" value = "4"/></td>
	 <td><input type = "radio" name = "crit3" value = "5"/></td>
	</tr>
	<tr>
	 <td><p>Présentation soignée</p></td>
	 <td><input type = "radio" name = "crit4" value = "1" checked/></td>
	 <td><input type = "radio" name = "crit4" value = "2"/></td>
	 <td><input type = "radio" name = "crit4" value = "3"/></td>
	 <td><input type = "radio" name = "crit4" value = "4"/></td>
	 <td><input type = "radio" name = "crit4" value = "5"/></td>
	</tr>
	<tr>
	 <td><p>Qualité des réponses</p></td>
	 <td><input type = "radio" name = "crit5" value = "1" checked/></td>
	 <td><input type = "radio" name = "crit5" value = "2" /></td>
	 <td><input type = "radio" name = "crit5" value = "3" /></td>
	 <td><input type = "radio" name = "crit5" value = "4" /></td>
	 <td><input type = "radio" name = "crit5" value = "5" /></td>
	</tr>
   </table>
   <br>
   <label>Commentaires : </label>
   <br>
   <input type="textarea" class="form-control" id="comment" name = "comment" required />
   <br>
   <br>
   <label>Nom  du responsable aux  entrevues :</label>
   <br>
    <input type = "text" id = "meetResponsable" name = "meetResponsable" class="form-control" required>
   <br>
   <br>
   <button type="submit" formmethod="POST" formaction="">Enregistrer</button>
  </form>
</body>