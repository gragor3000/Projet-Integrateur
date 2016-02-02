<!--Nouvelle évaluation du stagiaire par le coordonnateur-->
<body>
   <h2>Formulaire d'évaluation du coordonnateur</h2>
   <form role="form" id="eval" class="panel panel-default">
      <label>Nom de l'étudiant : </label>
     <br>
      <input type = "text" id = "internName" name = "internName" class="form-control" required>
     <br>
      <label>Nom du coordonnateur : </label>
     <br>
    <input type = "text" id = "coordName" name = "coordName" class="form-control" required>
   <br>
    <!--Objectif #1-->
     <div class="row">
	   <h2>Objectif #1 : L'étudiant(e) participe adéquatement aux différentes étapes de développement d'une application informatique.</h2>
	   <legend>Capacité d’analyse et de synthèse et application juste de la démarche de développement de système (/10)</legend>
        <table>
		  <tr>
			<th><p>Critères</p></th>
			<th><p>Description</p></th>
			<th><p>Cote</p></th>
		  </tr>
	      <tr>
		    <td><p>Supérieur</p></td>
			<td><p>L’étudiant(e) démontre une très bonne compréhension du projet et il est capable d’anticiper les problèmes possibles. Il applique la démarche de développement tout en identifiant les points critiques.</p></td>
		    <td><p>9-10</p></td>
		  </tr>
		  <tr>
		    <td><p>Satisfaisant</p></td>
			<td><p>L’étudiant(e) démontre une bonne compréhension du projet. Il applique la démarche de développement de façon cohérente.</p></td>
		    <td><p>7-8</p></td>
		  </tr>
		  <tr>
		    <td><p>Suffisant</p></td>
			<td><p>L’étudiant(e) démontre avec de l’aide une bonne compréhension du projet. Il applique la démarche de développement mais a besoin de soutien occasionnel.</p></td>
		    <td><p>6</p></td>
		  </tr>
		  <tr>
		    <td><p>Insuffisant</p></td>
			<td><p>L’étudiant(e) a besoin de soutien constant pour la compréhension du projet. Il n’applique pas la démarche de développement de système de façon adéquate. Il évolue dans son projet en brulant des étapes, ce qui l’oblige à revenir au point de départ et recommencer le travail initial.</p></td>
		    <td><p>0</p></td>
		  </tr>
		</table>
		
		<!--Note objectif #1-->
		<p>Note : </p>
		<select id = "objRate1" class="form-control" name = "objRate1">
		  <option value = 0>0</option>
		  <option value = 1>1</option>
		  <option value = 2>2</option>
		  <option value = 3>3</option>
		  <option value = 4>4</option>
		  <option value = 5>5</option>
		  <option value = 6>6</option>
		  <option value = 7>7</option>
		  <option value = 8>8</option>
		  <option value = 9>9</option>
		  <option value = 10>10</option>
		</select>
		<br>
		
		<!--Commentaires objectif #1-->
		<p>Commentaires : </p>
		<textarea rows="4" cols="50" id = "objComment1" name = "objComment1" class="form-control" required></textarea>		
    </div>
	
	<!--Objectif #2-->
    <h2>Objectif #2 : L’étudiant(e) applique judicieusement les principes, techniques et les méthodes propres au domaine informatique.</h2>
	   <legend>Capacité à s’approprier et à exploiter des technologies (/10)</legend>
        <table>
		  <tr>
			<th><p>Critères</p></th>
			<th><p>Description</p></th>
			<th><p>Cote</p></th>
		  </tr>
	      <tr>
		    <td><p>Supérieur</p></td>
			<td><p>L’étudiant(e) s’adapte très facilement aux technologies en place. Il étudie et propose de façon éclairée les choix judicieux des technologies appropriées.</p></td>
		    <td><p>9-10</p></td>
		  </tr>
		  <tr>
		    <td><p>Satisfaisant</p></td>
			<td><p>L’étudiant(e) s’adapte aux technologies en place et propose les choix des technologies à utiliser.</p></td>
		    <td><p>7-8</p></td>
		  </tr>
		  <tr>
		    <td><p>Suffisant</p></td>
			<td><p>L’étudiant(e) s’adapte avec de l’effort aux technologies en place et parvient avec difficulté à proposer les choix des technologies à utiliser.</p></td>
		    <td><p>6</p></td>
		  </tr>
		  <tr>
		    <td><p>Insuffisant</p></td>
			<td><p>L’étudiant(e) a ne s’adapte pas aux technologies en place et est incapable d’envisager les choix des technologies à utiliser.</p></td>
		    <td><p>0</p></td>
		  </tr>
		</table>
		
		<!--Note objectif #2a-->
		<p>Note : </p>
		<select id = "objRate2a" class="form-control" name = "objRate2a">
		  <option value = 0>0</option>
		  <option value = 1>1</option>
		  <option value = 2>2</option>
		  <option value = 3>3</option>
		  <option value = 4>4</option>
		  <option value = 5>5</option>
		  <option value = 6>6</option>
		  <option value = 7>7</option>
		  <option value = 8>8</option>
		  <option value = 9>9</option>
		  <option value = 10>10</option>
		</select>
		<br>
		<br>
		
		<legend>Capacité à produire des solutions informatiques (/20)</legend>
        <table>
		  <tr>
			<th><p>Critères</p></th>
			<th><p>Description</p></th>
			<th><p>Cote</p></th>
		  </tr>
	      <tr>
		    <td><p>Supérieur</p></td>
			<td><p>L’étudiant(e) est apte à programmer de façon efficace une application de qualité et  à valider avec rigueur le fonctionnement de l’application. </p></td>
		    <td><p>18-20</p></td>
		  </tr>
		  <tr>
		    <td><p>Satisfaisant</p></td>
			<td><p>L’étudiant(e) est apte à programmer une application de qualité et à valider le fonctionnement de l’application.</p></td>
		    <td><p>14-17</p></td>
		  </tr>
		  <tr>
		    <td><p>Suffisant</p></td>
			<td><p>L’étudiant(e) a rencontré des difficultés à programmer une application de qualité, mais il y est arrivé. Il a besoin d’être encadré afin de valider le fonctionnement de l’application.</p></td>
		    <td><p>12-13</p></td>
		  </tr>
		  <tr>
		    <td><p>Insuffisant</p></td>
			<td><p>Sans aide l’étudiant(e) n’est pas apte à programmer une application de qualité ni à valider le fonctionnement de l’application. Les apprentissages de programmation ne sont pas intégrés.</p></td>
		    <td><p>0</p></td>
		  </tr>
		</table>
		
		<!--Note objectif #2b-->
		<p>Note : </p>
		<select id = "objRate2b" class="form-control" name = "objRate2b">
		  <option value = 0>0</option>
		  <option value = 1>1</option>
		  <option value = 2>2</option>
		  <option value = 3>3</option>
		  <option value = 4>4</option>
		  <option value = 5>5</option>
		  <option value = 6>6</option>
		  <option value = 7>7</option>
		  <option value = 8>8</option>
		  <option value = 9>9</option>
		  <option value = 10>10</option>
		  <option value = 11>11</option>
		  <option value = 12>12</option>
		  <option value = 13>13</option>
		  <option value = 14>14</option>
		  <option value = 15>15</option>
		  <option value = 16>16</option>
		  <option value = 17>17</option>
		  <option value = 18>18</option>
		  <option value = 19>19</option>
		  <option value = 20>20</option>
		</select>
		<br>
		
		<!--Commentaires objectif #2-->
		<p>Commentaires : </p>
		<textarea rows="4" cols="50" id = "objComment2" name = "objComment2" class="form-control" required></textarea>
		
		
    </div>
	<!--Objectif #3-->
	
	    <h2>Objectif #3 : L’étudiant(e) agit de façon professionnelle dans son milieu de travail.</h2>
	   <legend>Autonomie dans l’accomplissement de ses tâches (/10)</legend>
        <table>
		  <tr>
			<th><p>Critères</p></th>
			<th><p>Description</p></th>
			<th><p>Cote</p></th>
		  </tr>
	      <tr>
		    <td><p>Supérieur</p></td>
			<td><p>L’étudiant(e) fait preuve d’une autonomie et d’une aisance dans la réalisation de ses activités. Il s’applique et s’ajuste avec aisance dans la planification de ses tâches.</p></td>
		    <td><p>9-10</p></td>
		  </tr>
		  <tr>
		    <td><p>Satisfaisant</p></td>
			<td><p>L’étudiant(e) fait preuve d’une autonomie dans la réalisation de ses activités et est réaliste dans la planification de ses tâches.</p></td>
		    <td><p>7-8</p></td>
		  </tr>
		  <tr>
		    <td><p>Suffisant</p></td>
			<td><p>L’étudiant(e) a besoin de soutien occasionnel dans la réalisation de ses activités et la planification de ses tâches.</p></td>
		    <td><p>6</p></td>
		  </tr>
		  <tr>
		    <td><p>Insuffisant</p></td>
			<td><p>L’étudiant(e) a besoin de soutien régulier dans la gestion de ses activités et ne planifie pas ses tâches.</p></td>
		    <td><p>0</p></td>
		  </tr>
		</table>
		
		<!--Note objectif #3a-->
		<p>Note : </p>
		<select id = "objRate3a" name = "objRate3a" class="form-control">
		  <option value = 0>0</option>
		  <option value = 1>1</option>
		  <option value = 2>2</option>
		  <option value = 3>3</option>
		  <option value = 4>4</option>
		  <option value = 5>5</option>
		  <option value = 6>6</option>
		  <option value = 7>7</option>
		  <option value = 8>8</option>
		  <option value = 9>9</option>
		  <option value = 10>10</option>
		</select>
		<br>
		<br>
		<legend>Qualité des relations interpersonnelles et communication(/10)</legend>
        <table>
		  <tr>
			<th><p>Critères</p></th>
			<th><p>Description</p></th>
			<th><p>Cote</p></th>
		  </tr>
	      <tr>
		    <td><p>Supérieur</p></td>
			<td><p>L’étudiant(e) s’adapte avec aisance à des situations de travail variées. Il communique de façon claire et parvient à vulgariser facilement ses solutions.</p></td>
		    <td><p>9-10</p></td>
		  </tr>
		  <tr>
		    <td><p>Satisfaisant</p></td>
			<td><p>L’étudiant(e) s’adapte à des situations de travail variées et communique de façon adéquate ses solutions.</p></td>
		    <td><p>7-8</p></td>
		  </tr>
		  <tr>
		    <td><p>Suffisant</p></td>
			<td><p>L’étudiant(e) s’adapte avec de l’aide à des situations de travail variées et réussi à communiquer avec un soutient minimal ses solutions.</p></td>
		    <td><p>6</p></td>
		  </tr>
		  <tr>
		    <td><p>Insuffisant</p></td>
			<td><p>L’étudiant(e) réagit avec rigidité à des situations de travail variées et ne réussit pas à communiquer adéquatement ses solutions.</p></td>
		    <td><p>0</p></td>
		  </tr>
		</table>
		
		<!--Note objectif #3b-->
		<p>Note : </p>
		<select id = "objRate3b" class="form-control" name = "objRate3b">
		  <option value = 0>0</option>
		  <option value = 1>1</option>
		  <option value = 2>2</option>
		  <option value = 3>3</option>
		  <option value = 4>4</option>
		  <option value = 5>5</option>
		  <option value = 6>6</option>
		  <option value = 7>7</option>
		  <option value = 8>8</option>
		  <option value = 9>9</option>
		  <option value = 10>10</option>
		</select>
		<br>

		<!--Commentaires objectif #3-->
		<p>Commentaires : </p>
		<textarea rows="4" cols="50" id = "objComment3" name = "objComment3" class="form-control" required></textarea>
		<br>
		<br>
		<!--NE PAS OUBLIER DE CALCULER SA NOTE SUR 60 AUTOMATIQUEMENT-->
		<button type="submit" formmethod="POST" formaction="">Enregistrer</button>
    </div>
   </form>
</body>