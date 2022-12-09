<?php
@include '../assets/php/login/config_db.php';

session_start();

// check if the user is logged in with $_SESSION['logged_in']
if (isset($_SESSION['logged_in'])) {
  $success[] = "Vous êtes connecté en tant que " . $_SESSION['name'] . ".";

} else {
  // redirect to the login page
  header('location:/factory-display/settings/account.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
  <title>Scènes</title>
  <script src="/factory-display/assets/js/section/header.js"></script>
  <script src="/factory-display/assets/js/section/footer.js"></script>
  <script src="/factory-display/assets/js/init.js"></script>

  <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">
  <link rel="stylesheet" href="/factory-display/assets/css/libs/font-awesome.css">
  <link rel="stylesheet" href="/factory-display/assets/css/scenes/homepage.css">
  <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">

  <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
</head>

<body id="testbody">
  <header>
    <?php
        if (isset($_SESSION['role'])) {
          if ($_SESSION['role'] == "user") {
            @include './assets/headers/header-user.html';
          } else
            if ($_SESSION['role'] == "admin") {
              @include './assets/headers/header-admin.html';
            }
        }
        ?>
  </header>
  <div class="scenescontainer">
    <div class="scenesrow scenescol-container">
      <div class="scenescol">
        <div class="scenesrow">
          <div class="scnesrow">
            <h2 style="color:#FF6600"> Voir les Écrans</h2>
          </div>
          <div id="cadre-2" class="scenesrow">
            <p>Ici vous pouvez visualiser le contenu de la totalité de vos écrans en temps réel, mais vous ne pouvez pas
              les modifier à partir d'ici. </p>
            <p class="scenestxt-red"><i class="fa-solid fa-thumbs-down"></i>&nbsp; Ici vous ne pourrez pas interagir
              avec les scènes.</p>
            <a href="/factory-display/scenes/view.php"><button class="scenesbtn btn-outline-primary">Continuer <i
                  class="fa-solid fa-circle-arrow-right"></i></button></a>
          </div>
        </div>
      </div>
      <div class="scenescol">
        <div class="scenesrow">
          <div class="scenesrow">
            <h2 style="color:#FF6600">Créer une Scène</h2>
          </div>
          <div class="scenesrow">
            <p>Ici vous pouvez créer et personnaliser une nouvelle scènes, vous pouvez y placer différents widgets, et
              définir comment vous voulez votre future scène.</p>
            <p class="scenestxt-white"><br><i class="fa-solid fa-thumbs-up"></i>&nbsp; Ici vous pourrez créer et
              personaliser vos scènes.</p>
            <a href="/factory-display/scenes/create.php"><button class="scenesbtn btn-outline-primary">Continuer <i
                  class="fa-solid fa-circle-arrow-right"></i></button></a>
          </div>
        </div>
      </div>
      <div class="scenescol">
        <div class="scenesrow">
          <div class="scenesrow">
            <h2 style="color:#FF6600"> Gérer mes Écrans</h2>
          </div>
          <div id="Cadre-2" class="scenesrow">
            <p>Ici vous pouvez définir quelle scène vous désirez sur quelle écrans, contrôler l'état de l'écran(on/off),
              envoyez des notifications sur un écran, etc...</p>
            <p class="scenestxt-green"><i class="fa-solid fa-thumbs-up"></i>&nbsp; Ici vous pourrez interagir avec les
              scènes.</p>
            <a href="/factory-display/scenes/manage.php"><button class="scenesbtn btn-outline-primary">Continuer <i
                  class="fa-solid fa-circle-arrow-right"></i></button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>