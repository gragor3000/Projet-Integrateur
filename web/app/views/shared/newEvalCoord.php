<!--Nouvelle &eacute;valuation du stagiaire par le coordonnateur-->
<body>
   <h2>Formulaire d&apos;&eacute;valuation du coordonnateur</h2>
   <form role="form" id="eval" class="panel panel-default">
      <label>Nom de l&apos;&eacute;tudiant : </label>
     <br>
      <input type = "text" id = "internName" name = "internName" class="form-control" required>
     <br>
      <label>Nom du coordonnateur : </label>
     <br>
    <input type = "text" id = "coordName" name = "coordName" class="form-control" required>
   <br>
    <!--Objectif #1-->
     <div class="row">
	   <h2>Objectif #1 : L&apos;&eacute;tudiant(e) participe ad&eacute;quatement aux diff&eacute;rentes &eacute;tapes de d&eacute;veloppement d&apos;une application informatique.</h2>
	   <legend>Capacit&eacute; d&apos;analyse et de synth&egrave;se et application juste de la d&eacute;marche de d&eacute;veloppement de syst&egrave;me (/10)</legend>
        <table>
		  <tr>
			<th><p>Crit&egrave;res</p></th>
			<th><p>Description</p></th>
			<th><p>Cote</p></th>
		  </tr>
	      <tr>
		    <td><p>Sup&eacute;rieur</p></td>
			<td><p>L&apos;&eacute;tudiant(e) d&eacute;montre une tr&egrave;s bonne compr&eacute;hension du projet et il est capable d&apos;anticiper les probl&egrave;mes possibles. Il applique la d&eacute;marche de d&eacute;veloppement tout en identifiant les points critiques.</p></td>
		    <td><p>9-10</p></td>
		  </tr>
		  <tr>
		    <td><p>Satisfaisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) d&eacute;montre une bonne compr&eacute;hension du projet. Il applique la d&eacute;marche de d&eacute;veloppement de fa&ccedil;on coh&eacute;rente.</p></td>
		    <td><p>7-8</p></td>
		  </tr>
		  <tr>
		    <td><p>Suffisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) d&eacute;montre avec de l&apos;aide une bonne compr&eacute;hension du projet. Il applique la d&eacute;marche de d&eacute;veloppement mais a besoin de soutien occasionnel.</p></td>
		    <td><p>6</p></td>
		  </tr>
		  <tr>
		    <td><p>Insuffisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) a besoin de soutien constant pour la compr&eacute;hension du projet. Il n&apos;applique pas la d&eacute;marche de d&eacute;veloppement de syst&egrave;me de fa&ccedil;on ad&eacute;quate. Il &eacute;volue dans son projet en brulant des &eacute;tapes, ce qui l&apos;oblige &agrave; revenir au point de d&eacute;part et recommencer le travail initial.</p></td>
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
    <h2>Objectif #2 : L&apos;&eacute;tudiant(e) applique judicieusement les principes, techniques et les m&eacute;thodes propres au domaine informatique.</h2>
	   <legend>Capacit&eacute; &agrave; s&apos;approprier et &agrave; exploiter des technologies (/10)</legend>
        <table>
		  <tr>
			<th><p>Crit&egrave;res</p></th>
			<th><p>Description</p></th>
			<th><p>Cote</p></th>
		  </tr>
	      <tr>
		    <td><p>Sup&eacute;rieur</p></td>
			<td><p>L&apos;&eacute;tudiant(e) s&apos;adapte tr&egrave;s facilement aux technologies en place. Il &eacute;tudie et propose de fa&ccedil;on &eacute;clair&eacute;e les choix judicieux des technologies appropri&eacute;es.</p></td>
		    <td><p>9-10</p></td>
		  </tr>
		  <tr>
		    <td><p>Satisfaisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) s&apos;adapte aux technologies en place et propose les choix des technologies &agrave; utiliser.</p></td>
		    <td><p>7-8</p></td>
		  </tr>
		  <tr>
		    <td><p>Suffisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) s&apos;adapte avec de l&apos;effort aux technologies en place et parvient avec difficult&eacute; &agrave; proposer les choix des technologies &agrave; utiliser.</p></td>
		    <td><p>6</p></td>
		  </tr>
		  <tr>
		    <td><p>Insuffisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) a ne s&apos;adapte pas aux technologies en place et est incapable d&apos;envisager les choix des technologies &agrave; utiliser.</p></td>
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
		
		<legend>Capacit&eacute; &agrave; produire des solutions informatiques (/20)</legend>
        <table>
		  <tr>
			<th><p>Crit&egrave;res</p></th>
			<th><p>Description</p></th>
			<th><p>Cote</p></th>
		  </tr>
	      <tr>
		    <td><p>Sup&eacute;rieur</p></td>
			<td><p>L&apos;&eacute;tudiant(e) est apte &agrave; programmer de fa&ccedil;on efficace une application de qualit&eacute; et  &agrave; valider avec rigueur le fonctionnement de l&apos;application. </p></td>
		    <td><p>18-20</p></td>
		  </tr>
		  <tr>
		    <td><p>Satisfaisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) est apte &agrave; programmer une application de qualit&eacute; et &agrave; valider le fonctionnement de l&apos;application.</p></td>
		    <td><p>14-17</p></td>
		  </tr>
		  <tr>
		    <td><p>Suffisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) a rencontr&eacute; des difficult&eacute;s &agrave; programmer une application de qualit&eacute;, mais il y est arriv&eacute;. Il a besoin d&apos;&ecirc;tre encadr&eacute; afin de valider le fonctionnement de l&apos;application.</p></td>
		    <td><p>12-13</p></td>
		  </tr>
		  <tr>
		    <td><p>Insuffisant</p></td>
			<td><p>Sans aide l&apos;&eacute;tudiant(e) n&apos;est pas apte &agrave; programmer une application de qualit&eacute; ni &agrave; valider le fonctionnement de l&apos;application. Les apprentissages de programmation ne sont pas int&eacute;gr&eacute;s.</p></td>
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
	
	    <h2>Objectif #3 : L&apos;&eacute;tudiant(e) agit de fa&ccedil;on professionnelle dans son milieu de travail.</h2>
	   <legend>Autonomie dans l&apos;accomplissement de ses t&acirc;ches (/10)</legend>
        <table>
		  <tr>
			<th><p>Crit&egrave;res</p></th>
			<th><p>Description</p></th>
			<th><p>Cote</p></th>
		  </tr>
	      <tr>
		    <td><p>Sup&eacute;rieur</p></td>
			<td><p>L&apos;&eacute;tudiant(e) fait preuve d&apos;une autonomie et d&apos;une aisance dans la r&eacute;alisation de ses activit&eacute;s. Il s&apos;applique et s&apos;ajuste avec aisance dans la planification de ses t&acirc;ches.</p></td>
		    <td><p>9-10</p></td>
		  </tr>
		  <tr>
		    <td><p>Satisfaisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) fait preuve d&apos;une autonomie dans la r&eacute;alisation de ses activit&eacute;s et est r&eacute;aliste dans la planification de ses t&acirc;ches.</p></td>
		    <td><p>7-8</p></td>
		  </tr>
		  <tr>
		    <td><p>Suffisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) a besoin de soutien occasionnel dans la r&eacute;alisation de ses activit&eacute;s et la planification de ses t&acirc;ches.</p></td>
		    <td><p>6</p></td>
		  </tr>
		  <tr>
		    <td><p>Insuffisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) a besoin de soutien r&eacute;gulier dans la gestion de ses activit&eacute;s et ne planifie pas ses t&acirc;ches.</p></td>
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
		<legend>Qualit&eacute; des relations interpersonnelles et communication(/10)</legend>
        <table>
		  <tr>
			<th><p>Crit&egrave;res</p></th>
			<th><p>Description</p></th>
			<th><p>Cote</p></th>
		  </tr>
	      <tr>
		    <td><p>Sup&eacute;rieur</p></td>
			<td><p>L&apos;&eacute;tudiant(e) s&apos;adapte avec aisance &agrave; des situations de travail vari&eacute;es. Il communique de fa&ccedil;on claire et parvient &agrave; vulgariser facilement ses solutions.</p></td>
		    <td><p>9-10</p></td>
		  </tr>
		  <tr>
		    <td><p>Satisfaisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) s&apos;adapte &agrave; des situations de travail vari&eacute;es et communique de fa&ccedil;on ad&eacute;quate ses solutions.</p></td>
		    <td><p>7-8</p></td>
		  </tr>
		  <tr>
		    <td><p>Suffisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) s&apos;adapte avec de l&apos;aide &agrave; des situations de travail vari&eacute;es et r&eacute;ussi &agrave; communiquer avec un soutient minimal ses solutions.</p></td>
		    <td><p>6</p></td>
		  </tr>
		  <tr>
		    <td><p>Insuffisant</p></td>
			<td><p>L&apos;&eacute;tudiant(e) r&eacute;agit avec rigidit&eacute; &agrave; des situations de travail vari&eacute;es et ne r&eacute;ussit pas &agrave; communiquer ad&eacute;quatement ses solutions.</p></td>
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