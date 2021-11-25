    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #4060b8">
      <a class="navbar-brand" href="#">
        <img src="./assets/images/logo_blanc.png" width="150px" height="auto"class="d-inline-block align-top" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php if (!isset($_SESSION['id']) && !isset($_SESSION['email']))  { ?>
          <li class="nav-item">
            <a class="nav-link" href="?page=inscription" style="color:white">Inscription</a>
          </li>
          <li>
            <a class="nav-link" href="?page=connexion" style="color:white">Connexion</a>
          </li>
          <?php }else{}?>
        </ul>
      </div>  
    </nav>