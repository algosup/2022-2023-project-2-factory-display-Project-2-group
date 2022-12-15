<?php
@include '../assets/php/login/config_db.php';

session_start();

// check if the user is logged in with $_SESSION['logged_in']
if (isset($_SESSION['logged_in'])) {
    $success[] = "Vous êtes connecté en tant que " . $_SESSION['name'] . ".";

}
else {
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
  <link rel="icon" type="image/favicon" href="/factory-display/assets/img/icons/favicon.png">
  <title>Nouvelle Scène</title>
  <script src="/factory-display/assets/js/section/header.js"></script>
  <script src="/factory-display/assets/js/section/footer.js"></script>
  <script src="/factory-display/assets/js/scenes/dynamic.js"></script>
  <script src="/factory-display/assets/js/scenes/info.js" defer></script>
  <script src="/factory-display/assets/js/libs/bootstrap.js"></script>
  <script src="/factory-display/assets/js/libs/jquery.js"></script>
  <!-- <script src="/factory-display/assets/js/scenes/custom.js"></script> -->
  <script src="/factory-display/assets/js/scenes/themes.js"></script>
  <script src="/factory-display/assets/js/init.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  

  <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">
  <link rel="stylesheet" href="/factory-display/assets/css/scenes/info.css">
  <link rel="stylesheet" href="/factory-display/assets/css/scenes/custom.css">
  <link rel="stylesheet" href="/factory-display/assets/css/libs/font-awesome.css">
  <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
<link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>

  
</head>

<body onload="loadFirstView()">
<header>
        <?php
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == "user") {
                @include '../assets/headers/header-user.html';
            } else
                if ($_SESSION['role'] == "admin") {
                @include '../assets/headers/header-admin.html';
            }
        }
        ?>
    </header>
    
  <div class="d-flex justify-content-center">
    <h1 id="global-title">Nouvelle scène</h1>
  </div>
  <br> 
<div id="first-view">
  <div class="row global-container">
    <div class="col">
      <div class="row sub-container">
        <div class="row">
          <h2> Informations</h2>
        </div>
        <div class="row">
          <form name="form" method="get">
            <p>Nom de la Scène</p>
            <input type="text" name="scene-name" id="scene-name" placeholder="Votre scène" />
            <hr />
            <p>Description</p>
            <input type="text" name="desc-name" id="desc-name" placeholder="Description" />
            <hr />
        </form>
        </div>
      </div>

    </div>
    <div class="col">
      <div class="row sub-container">
        <div class="row">
          <h2>Orientation</h2>
        </div>
        <div class="row btnContainer">
          <button id="landBtn">
            <div id="landscape">
              <i class="fa-solid fa-image"></i>
              <p>Paysage</p>
            </div>
          </button>
          <button id="portBtn">
            <div id="portrait">
              <i class="fa-solid fa-image-portrait"></i>
              <p>Portrait</p>
            </div>
          </button>
        </div>
      </div>
    </div>
  </div>
  <button id="nextBtn" onclick="getName()">
    <div id="next">
      <i class="fa-solid fa-arrow-right"></i>
      <p>Suivant</p>
    </div>
  </button>
</div>

<div id="second-view">
  <div class="container global-container">
    <div class="col">
      <div class="row">
        <div class="col properties-bar">
          <h3>Réglages</h3>
          <br>
          <div class="accordion" id="settings-accordion">
            <div class="accordion-item">
              <h2 class="accordion-header" id="fileSettingHeading">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#fileSettingCollapse" aria-expanded="true" aria-controls="fileSettingCollapse">
                  Fichier
                </button>
              </h2>
              <div id="fileSettingCollapse" class="accordion-collapse collapse show" aria-labelledby="fileSettingHeading" data-bs-parent="#settings-accordion">
                <div class="accordion-body no-padding">
                  <button class="btn btn-outline-light" id="previewBtn" onclick="runPreview()">Prévisualiser</button>
                  <button class="btn btn-outline-light" id="saveBtn" onclick="saveScene()">Sauvegarder</button>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="publishSettingHeading">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#publishSettingCollapse" aria-expanded="true" aria-controls="publishSettingCollapse">
                  Publier
                </button>
              </h2>
              <div id="publishSettingCollapse" class="accordion-collapse collapse" aria-labelledby="publishSettingHeading" data-bs-parent="#settings-accordion">
                <div class="accordion-body no-padding">
                  <button class="btn btn-outline-light" onclick="publishScene('locker-room')">Publier au Vestiaires</button>
                  <button class="btn btn-outline-light" onclick="publishScene('cafeteria')">Publier à la Cafeteria</button>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="colorSettingHeading">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#colorSettingCollapse" aria-expanded="true" aria-controls="colorSettingCollapse">
                  Couleurs
                </button>
              </h2>
              <div id="colorSettingCollapse" class="accordion-collapse collapse" aria-labelledby="colorSettingHeading" data-bs-parent="#settings-accordion">
                <div class="accordion-body no-padding">
                  <button class="btn btn-outline-light select-color"> <img src="/factory-display/assets/img/themes/theme-1.png" alt="Thème 1"> </button>
                  <button class="btn btn-outline-light select-color"> <img src="/factory-display/assets/img/themes/theme-2.png" alt="Thème 2"> </button>
                  <button class="btn btn-outline-light select-color"> <img src="/factory-display/assets/img/themes/theme-3.png" alt="Thème 3"> </button>
                  <button class="btn btn-outline-light select-color"> <img src="/factory-display/assets/img/themes/theme-4.png" alt="Thème 4"> </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row custom-canva">
          <div class="resize-container">
          </div>
        </div>
      </div>

      <div class="row widgets-storer">
        <div class="accordion" id="widgets-accordion">
          <div class="accordion-item">
            <h2 class="accordion-header" id="textWidgetHeading">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#textWidgetCollapse" aria-expanded="true" aria-controls="textWidgetCollapse">
                <h4> Texte </h4>
              </button>
            </h2>
            <div id="textWidgetCollapse" class="accordion-collapse collapse" aria-labelledby="textWidgetHeading" data-bs-parent="#widgets-accordion">
              <div class="accordion-body">
                  <div onclick="appendText('white','small')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_white.png" style="filter: drop-shadow(0 0 0.2rem black); width:60px;" alt=""></div>
                  <div onclick="appendText('white','medium')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_white.png" style="filter: drop-shadow(0 0 0.2rem black); width:80px;" alt=""></div>
                  <div onclick="appendText('white','large')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_white.png" style="filter: drop-shadow(0 0 0.2rem black); width:100px;" alt=""></div>
                  <div onclick="appendText('white','extra-large')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_white.png" style="filter: drop-shadow(0 0 0.2rem black); width:120px;" alt=""></div>
                  <div onclick="appendText('black','small')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_black.png" style="width:60px;" alt=""></div>
                  <div onclick="appendText('black','medium')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_black.png" style="width:80px;" alt=""></div>
                  <div onclick="appendText('black','large')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_black.png" style="width:100px;" alt=""></div>
                  <div onclick="appendText('black','extra-large')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_black.png" style="width:120px;" alt=""></div>
                  <br>
                  <div onclick="appendText('orange','small')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_orange.png" style="width:60px;" alt=""></div>
                  <div onclick="appendText('orange','medium')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_orange.png" style="width:80px;" alt=""></div>
                  <div onclick="appendText('orange','large')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_orange.png" style="width:100px;" alt=""></div>
                  <div onclick="appendText('orange','extra-large')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_orange.png" style="width:120px;" alt=""></div>
                  <br>
                  <div onclick="appendText('red','small')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_red.png" style="width:60px;" alt=""></div>
                  <div onclick="appendText('red','medium')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_red.png" style="width:80px;" alt=""></div>
                  <div onclick="appendText('red','large')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_red.png" style="width:100px;" alt=""></div>
                  <div onclick="appendText('red','extra-large')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_red.png" style="width:120px;" alt=""></div>
                  <br>
                  <div onclick="appendText('blue','small')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_blue.png" style="width:60px;" alt=""></div>
                  <div onclick="appendText('blue','medium')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_blue.png" style="width:80px;" alt=""></div>
                  <div onclick="appendText('blue','large')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_blue.png" style="width:100px;" alt=""></div>
                  <div onclick="appendText('blue','extra-large')"><img src="/factory-display/assets/img/widgets/placeholder/text/txt_blue.png" style="width:120px;" alt=""></div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="imageWidgetHeading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#imageWidgetCollapse" aria-expanded="false" aria-controls="imageWidgetCollapse">
                <h4> Images </h4>
              </button>
            </h2>
            <div id="imageWidgetCollapse" class="accordion-collapse collapse" aria-labelledby="imageWidgetHeading" data-bs-parent="#widgets-accordion">
              <div class="accordion-body">
                <div onclick="appendImg()"><img src="/factory-display/assets/img/widgets/placeholder/img_url/chain_link.png" style="width:150px;" alt=""></div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="hourWidgetHeading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hourWidgetCollapse" aria-expanded="false" aria-controls="hourWidgetCollapse">
                <h4> Heure </h4>
              </button>
            </h2>
            <div id="hourWidgetCollapse" class="accordion-collapse collapse" aria-labelledby="hourWidgetHeading" data-bs-parent="#widgets-accordion">
              <div class="accordion-body">
                <div onclick="appendPlaceholder(clock)" class="widget-sm-placeholder" id="clock-placeholder"></div>
                <div onclick="appendPlaceholder(date_hour)" class="widget-sm-placeholder" id="date-hour-placeholder"></div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="dateWidgetHeading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dateWidgetCollapse" aria-expanded="false" aria-controls="dateWidgetCollapse">
                <h4> Date </h4>
              </button>
            </h2>
            <div id="dateWidgetCollapse" class="accordion-collapse collapse" aria-labelledby="dateWidgetHeading" data-bs-parent="#widgets-accordion">
              <div class="accordion-body">
                <div onclick="appendPlaceholder(date)" class="widget-sm-placeholder" id="date-placeholder"></div>
                <div onclick="appendPlaceholder(date_hour)" class="widget-sm-placeholder" id="date-hour-placeholder"></div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="weatherWidgetHeading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#weatherWidgetCollapse" aria-expanded="false" aria-controls="weatherWidgetCollapse">
                <h4> Météo </h4>
              </button>
            </h2>
            <div id="weatherWidgetCollapse" class="accordion-collapse collapse" aria-labelledby="weatherWidgetHeading" data-bs-parent="#widgets-accordion">
              <div class="accordion-body">
                <div onclick="appendPlaceholder(weather_sm)" class="widget-sm-placeholder" id="weather-sm-placeholder"></div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="newsWidgetHeading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#newsWidgetCollapse" aria-expanded="false" aria-controls="newsWidgetCollapse">
                <h4> Actualités </h4>
              </button>
            </h2>
            <div id="newsWidgetCollapse" class="accordion-collapse collapse" aria-labelledby="newsWidgetHeading" data-bs-parent="#widgets-accordion">
              <div class="accordion-body">
                <div onclick="appendPlaceholder(news_lg)" class="widget-lg-placeholder" id="news-lg-placeholder"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="tooSmall">
  <h1> Veuillez agrandir votre fenêtre </h1>
  <h2> pour une meilleure éxperience nous avons expressement bloquer cette page tant que votre fenêtre ne sera pas agrandi </h2>
</div>

<footer></footer>

<?php

function writeInLockers() {
  $myfile = fopen("../../screens-side/screens/locker-room.html", "w");
  $txt = $_COOKIE["code"];
  fwrite($myfile, $txt);
  fclose($myfile);
}

function writeInCafeteria() {
  $myfile = fopen("../../screens-side/screens/cafeteria.html", "w");
  $txt = $_COOKIE["code"];
  fwrite($myfile, $txt);
  fclose($myfile);
}

if (isset($_GET['locker-room'])) {
  writeInLockers();
}

if (isset($_GET['cafeteria'])) {
  writeInCafeteria();
}

function saveAs() {
  $name = $_COOKIE["name"];
  $myfile = fopen("../../screens-side/saved-scenes/" . $name . ".html", "w");
  $txt = $_COOKIE["code"];
  fwrite($myfile, $txt);
  fclose($myfile);
  // header("location:manage.php");
  echo '<script>swal("👍" ,  "Votre scène à bien été sauvegarder, vous allez être redirigé vers la position de la sauvegarde !" ,  "success",{button:false,timer:3000,});setTimeout(() => {window.location.href = "manage.php";}, 3000);</script>';
}

if (isset($_GET['request-save'])) {
  saveAs();
}

  ?>

<script src='https://unpkg.com/interactjs@1.3.4/dist/interact.js'></script>
<script  src="/factory-display/assets/js/scenes/custom.js"></script>
<script src="/factory-display/assets/js/scenes/interaction.js"></script>
<script src="/factory-display/assets/js/scenes/data.js"></script>
<script src="/factory-display/assets/js/scenes/write.js"></script>
<script src="/factory-display/assets/js/scenes/colors.js"></script>


</body>

</html>
