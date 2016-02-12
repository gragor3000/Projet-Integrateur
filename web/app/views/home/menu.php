<div class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><span>420.AA | Gestion de Stage</span></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-ex-collapse">
			<form class="navbar-form navbar-right" role="connection">
				<div class="form-group">
					<input type="text" name="logUser" class="form-control" placeholder="Nom de compte" required />
					<input type="password" name="logPass" class="form-control" placeholder="Mot de passe" required />
				</div>
				<button type="submit" class="btn btn-primary" formmethod="post" formaction="/home/login">
					<i class="fa fa-fw fa-sign-in"></i>
				</button>
			</form>
		</div>
	</div>
</div>