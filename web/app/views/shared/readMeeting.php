<!--Rapport d&apos;entrevue en lecture-->
<body>
   <h2>Rapport d&apos;entrevue</h2>
   <p>Nom de l&apos;&eacute;tudiant : <?=name?></p>
   <p>Service / d&eacute;partement  o&ugrave; l&apos;&eacute;tudiant effectuera son stage : <?=service?></p>
   <p>Poste vis&eacute; : <?=poste?></p>
   <p>Date d&apos;arriv&eacute;e : <?=dates?></p>
   <p>Heure d&apos;arriv&eacute;e : <?=hour?></p>
   <br>
   <!--Formulaire d&apos;entrevue-->
   <table>
    <tr>
	  <th>Crit&egrave;res</th>
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
	 <td><p>Pr&eacute;sentation soign&eacute;e</p></td>
	 <td><input type = "radio" name = "crit4" value = "1" /></td>
	 <td><input type = "radio" name = "crit4" value = "2"/></td>
	 <td><input type = "radio" name = "crit4" value = "3"/></td>
	 <td><input type = "radio" name = "crit4" value = "4"/></td>
	 <td><input type = "radio" name = "crit4" value = "5"/></td>
	</tr>
	<tr>
	 <td><p>Qualit&eacute; des r&eacute;ponses</p></td>
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