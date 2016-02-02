<!--Les journaux de bord pour les stagiaires-->
<body>
   <h2>Journal de bord de <?=name?> pour le <?php date()?></h2>
  <form role="form" id="logbook" class="panel panel-default">
   <br>
   <label>Commentaires : </label>
   <br>
   <input type="textarea" class="form-control" id="comment" name = "comment" required />
   <br>
   <button type="submit" formmethod="POST" formaction="">Enregistrer</button>
  </form>
</body>