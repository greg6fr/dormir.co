<?php
  session_start();
  $a = '<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="http://localhost/index.php"><img src="../assets/images/logo.png" class="card-img-top"
      alt="Dormir.co" width="340" height="60" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">';
        $nav = isset($_SESSION['email']) ? '<ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://localhost/voir-profil.php/?success="">Mon profil</a>
          </li>
          
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gérer vos annonces
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="http://localhost/add-annonce.php">Insérer une annonce</a></li>
            <li><a class="dropdown-item" href="http://localhost/voir-mes-annonces.php">Voir mes annonces</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="http://localhost/voir-les-annonces.php">Voir toutes les annonces</a></li>
          </ul>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/voir-mes-favories.php">Mes favoris</a>
          </li>

        </ul>' : '<ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>';
    $button = isset($_SESSION['email']) ? '<a class="btn btn-outline-danger" href="../back-end/deconnexion.php">Deconnexion</a>' : '
      <a class="btn btn-outline-success m-1" href="/inscription.php">Inscription</a>
      <a class="btn btn-success m-1" href="/login.php">Connexion</a>
    ';
    $b = '</div>
    </div>
  </nav>';

  echo $a.$nav.$button.$b;
?>