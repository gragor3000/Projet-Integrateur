<!--L&apos;&eacute;valuation du stagiaire par le superviseur en lecture-->
<body>
   <h2>Formulaire d&apos;&eacute;valuation</h2>
   <p>
    Nous tenons &agrave; vous rappeler que le pr&eacute;sent projet de fin d&apos;&eacute;tudes est une activit&eacute; p&eacute;dagogique dans le cadre du programme 
	d&apos;Informatique de gestion.
	</p>
	<p>
    Comme pour tous les autres cours, le projet fera donc l&apos;objet d&apos;une &eacute;valuation. Les professeurs d&eacute;sign&eacute;s pour la coordination 
	des projets en demeurent les principaux responsables.
	</p>
	<p>
    Toutefois, une partie de cette &eacute;valuation sera faite en fonction de votre perception de la performance globale du finissant ou de la 
	finissante que vous recevez.
    </p>	
	<p>
	Le pr&eacute;sent document se veut donc un outil visant &agrave; uniformiser et &agrave; faciliter la transmission de 
	l&apos;&eacute;valuation des &eacute;l&egrave;ves.
	</p>
	<p>
	Nous l&apos;utiliserons pour compl&eacute;ter leur &eacute;valuation finale. Nous vous demandons de remplir ce document 
	vers la toute fin du projet, de fa&ccedil;on &agrave; pouvoir en discuter avec le professeur-coordonnateur lors de sa derni&egrave;re visite en milieu 
	de travail.
   </p>
   <h3>Nom de l&apos;&eacute;tudiant : <?=interName?></h3>
   <h3>Nom du supervieur : <?=supName?></h3>
   <h3>Titre : <?=projectTitle?></h3>
   <h3>Nom de l&apos;entreprise : <?=entName?></h3>
   <h3>Date : <?=evaldate?></h3>
   
   <h2>&eacute;valuation du superviseur de stage</h2>
   <p>Trois champs de comp&eacute;tences sont &eacute;valu&eacute;s dans ce formulaire, soient l&apos;analyse des comportements et de l&apos;&eacute;tique n&eacute;cessaires &agrave; l&apos;exercice des fonctions de travail, 
     la conception et le d&eacute;veloppement d&apos;une application etla mise en &oelig;uvre d&apos;une application.
   </p>
   <p>
    Indiquer l&apos;&eacute;tat du d&eacute;veloppement des comp&eacute;tences de l&apos;&eacute;tudiante ou de l&apos;&eacute;tudiant &agrave; partir des crit&egrave;res de performances suivants :
   </p>
   
   <!--Objectif #1-->
   <h3>Analyser le comportement et l&apos;&eacute;thique n&eacute;cessaire &agrave; l&apos;exercice de la profession.</h3>
   <legend>1.	Examiner les habilet&eacute;s et les comportements li&eacute;s &agrave; l&apos;exercice des fonctions de travail.</legend>
   <table>
    <tr>
	 <td>
	  <p><!--Objectif #1-1-->
	   Appliquer les exigences li&eacute;es &agrave; l&apos;&eacute;thique professionnelle.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit1-1" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit1-1" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit1-1" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit1-1" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit1-1" value = 3 />
		<br>
	 </td>
	</tr>
	<tr>
	 <td>
	  <p><!--Objectif #1-2-->
	   Appliquer la r&egrave;glementation mise en place.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit1-2" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit1-2" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit1-2" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit1-2" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit1-2" value = 3 />
		<br>
	 </td>
	</tr>
	<tr>
	 <td>
	  <p><!--Objectif #1-3-->
	   Manifester de la pers&eacute;v&eacute;rance dans les t&acirc;ches &agrave; accomplir.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit1-3" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit1-3" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit1-3" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit1-3" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit1-3" value = 3 />
		<br>
	 </td>
	</tr>
   </table>
   <!--Commentaires objectif #1-->
	<p>Suite &agrave; ces constats avez-vous des commentaires ou des suggestions &agrave; formuler? : </p>
	<textarea rows="4" cols="50" id = "objCrit1" name = "objCrit1"><?=comment1?></textarea>
	<br>
	
	<!--Objectif #2-->
   <h3>Concevoir et d&eacute;velopper une application dans un environnement graphique</h3>
   <legend>1.	&eacute;tablir le cadre g&eacute;n&eacute;ral de l&apos;application.</legend>
   <table>
    <tr>
	 <td>
	  <p><!--Objectif #2-1-->
	   Pr&eacute;ciser l&apos;id&eacute;e directrice du projet et communiquer de fa&ccedil;on efficace avec toutes les personnes participant au projet.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit2-1" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit2-1" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit2-1" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit2-1" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit2-1" value = 3 />
		<br>
	 </td>
	</tr>
	</table>
	<br>
  <legend>2.	Programmer l&apos;application.</legend>
   <table>
    <tr>
	 <td>
	  <p><!--Objectif #2-2-->
	   Valider correctement le fonctionnement du programme.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit2-2" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit2-2" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit2-2" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit2-2" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit2-2" value = 3 />
		<br>
	 </td>
	</tr>
	<tr>
	 <td>
	  <p><!--Objectif #2-3-->
	   Archiver toute l&apos;information relative au programme.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit2-3" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit2-3" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit2-3" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit2-3" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit2-3" value = 3 />
		<br>
	 </td>
	</tr>
	</table>
	<br>
		
  <legend>3.	Produire la documentation relative &agrave; l&apos;application.</legend>
   <table>
    <tr>
	 <td>
	  <p><!--Objectif #2-4-->
	   Cr&eacute;er l&apos;aide en ligne appropri&eacute;e.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit2-4" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit2-4" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit2-4" value = 2 />
		<br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit2-4" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit2-4" value = 3 />
	    <br>
	 </td>
	</tr>
	<tr>
	 <td>
	  <p><!--Objectif #2-5-->
	   R&eacute;diger de fa&ccedil;on claire et compl&egrave;te les instructions d&apos;utilisation de l&apos;application.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit2-5" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit2-5" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit2-5" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit2-5" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit2-5" value = 3 />
		<br>
	 </td>
	</tr>
	</table>
	<br>
	
	<!--Commentaires objectif #2-->
	<p>Suite &agrave; ces constats avez-vous des commentaires ou des suggestions &agrave; formuler? : </p>
	<textarea rows="4" cols="50" id = "objCrit2" name = "objCrit2"><?=comment2?></textarea>
	<br>
	
	<!--Objectif #3-->
   <h3>Mettre en &oelig;uvre d&apos;une application</h3>
	<legend>1.	Planifier la mise en &oelig;uvre.</legend>
   <table>
    <tr>
	 <td>
	  <p><!--Objectif #3-1-->
	   Choisir la strat&eacute;gie de mise en &oelig;uvre appropri&eacute;e au contexte et d&eacute;terminer les ressources humaines et mat&eacute;rielles 
	   n&eacute;cessaires &agrave; la mise en &oelig;uvre.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit3-1" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit3-1" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit3-1" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit3-1" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit3-1" value = 3 />
		<br>
	 </td>
	</tr>
	<tr>
	 <td>
	  <p><!--Objectif #3-2-->
	   D&eacute;terminer les &eacute;tapes et les proc&eacute;dures de la mise en &oelig;uvreet &eacute;tablir un &eacute;ch&eacute;ancier r&eacute;aliste des travaux.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit3-2" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit3-2" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit3-2" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit3-2" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit3-2" value = 3 />
		<br>
	 </td>
	</tr>
	<tr>
	 <td>
	  <p><!--Objectif #3-3-->
	   Communiquer de fa&ccedil;on efficace l&apos;information pertinente aux personnes en cause.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit3-3" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit3-3" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit3-3" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit3-3" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit3-3" value = 3 />
		<br>
	 </td>
	</tr>
   </table>
   <br>
   <legend>2.	Mettre en place l&apos;environnement.</legend>
   <table>
    <tr>
	 <td>
	  <p><!--Objectif #3-4-->
	   Adapter l&apos;environnement mat&eacute;riel aux exigences de l&apos;application, installer et configurer correctement l&apos;application.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit3-4" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit3-4" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit3-4" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit3-4" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit3-4" value = 3 />
		<br>
	 </td>
	</tr>
	</table>
	<br>
	<legend>3.	Valider la qualit&eacute; de la mise en &oelig;uvre.</legend>
   <table>
    <tr>
	 <td>
	  <p><!--Objectif #3-5-->
	   Ex&eacute;cuter rigoureusement les tests de fonctionnement de l&apos;application dans le contexte de production et solutionner efficacement des probl&egrave;mes.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit3-5" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit3-5" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit3-5" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit3-5" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit3-5" value = 3 />
		<br>
	 </td>
	</tr>
	<tr>
	 <td>
	  <p><!--Objectif #3-6-->
	   G&eacute;rer le stress.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit3-6" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit3-6" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit3-6" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit3-6" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit3-6" value = 3 />
		<br>
	 </td>
	</tr>
	</table>
	<br>
	<legend>4.	Assurer le suivi de la mise en &oelig;uvre.</legend>
   <table>
    <tr>
	 <td>
	  <p><!--Objectif #3-7-->
	   Communiquer de l&apos;information pertinente aux personnes en cause.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit3-7" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit3-7" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit3-7" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit3-7" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit3-7" value = 3 />
		<br>
	 </td>
	</tr>
	<tr>
	 <td>
	  <p><!--Objectif #3-8-->
	   Analyser et solutionner les probl&egrave;mes d&eacute;coulant de la mise en &oelig;uvre.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit3-8" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit3-8" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit3-8" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit3-8" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit3-8" value = 3 />
		<br>
	 </td>
	</tr>
	</table>
	<br>
		<legend>5.	Produire le guide d&apos;exploitation.</legend>
   <table>
    <tr>
	 <td>
	  <p><!--Objectif #3-9-->
	   Pr&eacute;senter l&apos;information pertinente sur les caract&eacute;ristiques des installations et des configurations et sur les proc&eacute;dures de mise en production de l&apos;application.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit3-9" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit3-9" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit3-9" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit3-9" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit3-9" value = 3 />
		<br>
	 </td>
	</tr>
	<tr>
	 <td>
	  <p><!--Objectif #3-10-->
	   Appliquer rigoureusement  les r&egrave;gles de r&eacute;daction et pr&eacute;sentation.
	  </p>
	 </td>
	 <td>
	   <label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit3-10" value = 0 checked/>
	   <br>
	   <label>Peu satisfaisant</label><input type = "radio" name = "objCrit3-10" value = 1 />
	   <br>
	   <label>Satisfait</label><input type = "radio" name = "objCrit3-10" value = 2 />
	   <br>
		<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit3-10" value = 3 />
		<br>
		<label>Impossible &agrave; &eacute;valuer</label><input type = "radio" name = "objCrit3-10" value = 3 />
		<br>
	 </td>
	</tr>
	</table>
	<br>
	<!--Commentaires objectif #3-->
	<p>Suite &agrave; ces constats avez-vous des commentaires ou des suggestions &agrave; formuler? : </p>
	<textarea rows="4" cols="50" id = "objCrit3" name = "objCrit3"><?=comment3?></textarea>
	<br>
	<h3>Commentaires</h3>
	<p>Nous aimerions conna&icirc;tre votre opinion sur les points forts et les points &agrave; am&eacute;liorer de l&apos;&eacute;l&egrave;ve.</p>
	<label>- POINTS FORTS</label>
	<br>
	<textarea rows="4" cols="50" id = "objCrit4" name = "objCrit4"><?=comment4?></textarea>
	<br>
	<label>- POINTS &Agrave; AM&Eacute;LIORER</label>
	<br>
	<textarea rows="4" cols="50" id = "objCrit5" name = "objCrit5"><?=comment5?></textarea>
	<br>
	<label>- AUTRES REMARQUES</label>
	<br>
	<textarea rows="4" cols="50" id = "objCrit6" name = "objCrit6"><?=comment6?></textarea>
	<p>- APPR&Eacute;CIATION GLOBALE DU S&Eacute;JOUR DE L&apos;&Eacute;TUDIANT OU DE L&apos;&Eacute;TUDIANTE.</p>	
	<label>Pas du tout satisfaisant</label><input type = "radio" name = "objCrit7" value = 0 checked/>
	<label>Peu satisfaisant</label><input type = "radio" name = "objCrit7" value = 1 />
	<label>Satisfait</label><input type = "radio" name = "objCrit7" value = 2 />
	<label>Tout &agrave; fait satisfaisant</label><input type = "radio" name = "objCrit7" value = 3 />
	<br>
	<p>Si c&apos;&eacute;tait &agrave; refaire,</p>
	<label>reprendriez-vous un finissant ou une finissante ?</label>
    <select id = "objCrit8" name = "objCrit8">
		<option value = "Oui">Oui</option>
		<option value = "Non">Non</option>
	</select>
	<br>
	<label>reprendriez-vous le m&ecirc;me &eacute;tudiant ?</label>
    <select id = "objCrit9" name = "objCrit9">
		<option value = "Oui">Oui</option>
		<option value = "Non">Non</option>
	</select>
	<br>
	<h3>MERCI DE VOTRE PR&Eacute;CIEUSE COLLABORATION</h3>
</body>