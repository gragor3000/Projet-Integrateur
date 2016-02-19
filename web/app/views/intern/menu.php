    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span>420.AA | Gestion de Stage | Stagiaire</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-user"></i> <?= $_SESSION['name']; ?> <i class="fa fa-caret-down"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="public/index.php/intern/index"><i class="fa fa-fw fa-briefcase"></i> Projet de stage</a>
                </li>
                <li>
                  <a href="public/index.php/intern/log"><i class="fa fa-fw fa-book"></i> Journal de Bord</a>
                </li>
                <li>
                  <a href="public/index.php/intern/info"><i class="fa fa-fw fa-pencil"></i> �valuations</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="public/index.php/intern/pass"><i class="fa fa-fw fa-key"></i> Changer de mot de passe</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href=""><i class="fa fa-fw fa-sign-out"></i> D�connexion</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>