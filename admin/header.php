<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">Administration</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($page_name == "index") { echo 'active'; } ?>">
        <a class="nav-link" href="index.php">Accueil</a>
      </li>
      <li class="nav-item <?php if($page_name == "newquestion") { echo 'active'; } ?>">
        <a class="nav-link" href="newquestion.php">Créer une question</a>
      </li>
      <li class="nav-item <?php if($page_name == "newtheme") { echo 'active'; } ?>">
        <a class="nav-link" href="newtheme.php">Créer un thème</a>
      </li>
      <li class="nav-item <?php if($page_name == "managethemes") { echo 'active'; } ?>">
        <a class="nav-link" href="managethemes.php">Gestion des thèmes</a>
      </li>
      <li class="nav-item <?php if($page_name == "managequestions") { echo 'active'; } ?>">
        <a class="nav-link" href="managequestions.php">Gestion des questions</a>
      </li>
      <li class="nav-item <?php if($page_name == "admin-access") { echo 'active'; } ?>">
        <a class="nav-link" href="admin-access.php">Accès à l'administration</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Retour vers le site</a>
      </li>
</ul>
  </div>
</nav>