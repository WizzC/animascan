<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animascan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
</head>


<body style="background-color: black;">

  <nav class="navbar navbar-expand-lg fs-3" style="background-color: #BA5C12;">
    <div class="container-fluid">
      <a class="navbar-brand" aria-current="page"  href="<?= URL ?>accueil"><img src="/public/image/logoAnimascan.png" ></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
          if (isset($_SESSION['email'])) { ?>
            <a class="nav-link active" aria-current="page" href="<?= URL ?>logout">Deconnexion</a>
          <?php } elseif (isset($_SESSION['email']) == null) { ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= URL ?>connexion">Connexion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= URL ?>inscription">Inscription</a>
            </li>
          <?php }
          ?>
          </ul>
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            admin
          </a>
          <ul class="dropdown-menu ">
             <li class="nav-item ">
            <a class="nav-link active dropdown-item bg-white" aria-current="page" href="<?= URL ?>listeAnime">listeAnime</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active dropdown-item bg-white" aria-current="page" href="<?= URL ?>listeScan">listeScan</a>
          </li>
          </ul>
        </li>
      </ul>
          
    </div>
  </nav>

  <div class="container d-flex  justify-content-center">
    <h1 class="rounded border border-dark p-2 m-5 text-center text-black w-25" style="background-color: #BA5C12;"><?= $titre ?></h1>

  </div>
  <?= $content ?>

  <footer class="">
    <div class="d-flex justify-content-center  mt-5 p-1" style="background-color: #BA5C12;">
      <a href="/https://twitter.com/_Wizz_Fr">
        <img src="/public/image/Twitter.png" style="height: 50px;"></a>
      <a href="/https://www.instagram.com/clem.clr_/">
        <img src="/public/image/instagram.png" style="height: 50px;"></a>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>