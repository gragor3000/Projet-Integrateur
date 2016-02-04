<head>
    <meta charset="windows-1252">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CEGEP Joliette | 420.AA | Outil de Gestion des Stages</title>

    <!--BOOTSTRAP 3.3.6 et JQUERY 2.2.0-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!--OUTILS MAISON-->
    <link rel="stylesheet" href="../../../public/css/default.css">
    <script src="../../../public/js/scripts.js"></script>
</head>
<body>
    <h3>FIXED TOP SPACER</h3>
    <div class="container">
        <!--PRÉSENTATION-->
        <div class="row" style="vertical-align: middle;">
            <div class="col-md-9">
                <h2>D&eacute;partement de la Technique en Informatique<br />
                    <small>vous acceuille sur son site de gestion des stages.</small>
                </h2>
            </div>
        </div>
        <br />
		<!--FORMULAIRE D'INSCRIPTION D'ENTREPRISE-->
        <form role="form" class="panel panel-default">
            <div class="panel-heading">
                <div>
                    <h3>Inscription d'une entreprise</h3>
                </div>
            </div>
            <div class="panel-body row">
			<div class="col-md-4 col-md-offset-1 ">
				<p>Veuillez inscrire l'entreprise, les informations requises doivent concerner l'entreprise dans le but de pouvoir contacter l'entreprise dans le futur. La soumission du projet permettra d'entrer les informations du superviseur de projet.</p><p>Un courriel avec un nom d'utilisateur et un mot de passe vous sera transmis aussit&ocirc;t l'inscription autoris&eacute; et celui-ci sera utilis&eacute; par tous les superviseurs de projet de l'entreprise. Vous pouvez n&eacute;anmoins sugg&eacute;rer un nom d'utilisateur.</p>
			</div>
			<div class="col-md-5 col-md-offset-1">
                <div class="row">
                    <div class="col-md-8 form-group">
                        <label for="name">Nom de l'entreprise</label>
                        <input type="text" class="form-control" id="name" maxlength="32" name="name" required />
                    </div>
					<div class="col-md-4 form-group">
						<label for="user">Nom d'utilisateur</label>
						<input type="text" class="form-control" id="user" maxlength="16" name="user" required />
                    </div>
                </div>				
				<div class="row">
                    <div class="col-md-5 form-group">
						<label for="phone">T&eacute;l&eacute;phone</label>
						<input type="text" pattern-"^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"
						class="form-control" id="phone" placeholder="(450) 555-5555 #12345" maxlength="25" name="phone" required />
                    </div>
					<div class="col-md-7 form-group">
						<label for="email">Courriel</label>
						<input type="email" class="form-control" id="email" placeholder="superviseur@compagnie.tld" name="email" required />
                    </div>
                </div>
				<div class="row">
					<div class="col-md-7 form-group">
						<label for="address">Adresse</label>
                        <input type=text" class="form-control" id="address" maxlength="128" name="address" required></textarea>
					</div>
					<div class="col-md-5">
                        <div class="form-group">
                            <label for="email">Ville</label>
                            <input type="text" class="form-control" id="city" maxlength="64" name="city" required />
                        </div>
                    </div>
				</div>
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <button type="submit" formmethod="POST" formaction="#">Soumettre</button>
                        </center>
                    </div>
                </div>
			</div>
            </div>
        </form>
    </div>
</body>
