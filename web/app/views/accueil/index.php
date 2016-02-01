<body>
    <h3>FIXED TOP SPACER</h3>
    <div class="container">
        <!--Présentation-->
        <div class="row" style="vertical-align: middle;">
            <div class="col-md-9">
                <h2>D&eacute;partement de la Technique en Informatique<br />
                    <small>vous acceuil sur son site de gestion des stages.</small>
                </h2>
                <br />

            </div>
        </div>
        <br>
        <form role="form" id="inscription" class="panel panel-default">
            <div class="panel-heading">
                <div>
                    <h3>Inscription du responsable de projet et de l'entreprise<br /><small>Si vous &ecirc;tes un superviseur de projet et que vous n'avez pas de compte, veuillez vous inscrire ci-dessous.</small></h3>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Courriel</label>
                            <input type="email" class="form-control" id="email" placeholder="superviseur@compagnie.tld" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">T&eacute;l&eacute;phone</label>
                            <input type="text" class="form-control" id="phone" placeholder="450-555-5555" maxlength="12" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="pass">Mot de passe</label>
                        <input type="password" class="form-control" id="pass" required />
                        <label for="word">Entrer de nouveau</label>
                        <input type="password" class="form-control" id="word"required  />
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="last">Nom</label>
                        <input type="text" class="form-control" id="last" placeholder="Bond" required />
                        <label for="first">Pr&eacute;nom</label>
                        <input type="text" class="form-control" id="first"  placeholder="James" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 well form-group">
                        <label for="title">Nom de l'entreprise</label>
                        <input type="text" class="form-control" id="title" placeholder="Nom de l'entreprise" required />
                        <label for="desc">Adresse</label>
                        <textarea class="form-control" id="desc" placeholder="No Rue Ville Region" required></textarea>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cie_postal">Code postal</label>
                                    <input type="text" class="form-control" id="cie_postal" placeholder="A0A0A0" maxlength="6" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cie_phone">T&eacute;l&eacute;phone</label>
                                    <input type="text" class="form-control" id="cie_phone" placeholder="450-555-5555" maxlength="12" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cie_email">Courriel (facultatif)</label>
                                    <input type="email" class="form-control" id="cie_email" placeholder="contact@compagnie.tld" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <button type="submit" formmethod="POST" formaction="">Soumettre</button>
                        </center>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
