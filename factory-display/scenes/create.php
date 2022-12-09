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
  

  <link rel="stylesheet" href="/factory-display/assets/css/libs/bootstrap.css">
  <link rel="stylesheet" href="/factory-display/assets/css/scenes/info.css">
  <link rel="stylesheet" href="/factory-display/assets/css/scenes/custom.css">
  <link rel="stylesheet" href="/factory-display/assets/css/libs/font-awesome.css">
  <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
  
</head>

<body>





  <header></header>

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
          <p>Nom de la Scène</p>
          <input type="text" name="scene-name" id="scene-name" placeholder="Votre scène" />
          <hr />
          <p>Description</p>
          <input type="text" name="desc-name" id="desc-name" placeholder="Description" />
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
                  <button class="btn btn-outline-light" id="previewBtn" onclick="runPreview()">Preview</button>
                  <button class="btn btn-outline-light" id="saveBtn" onclick="saveScene()">Sauvegarder</button>
                  <button class="btn btn-outline-light" onclick="downloadScene()">Télécharger</button>
                  <button class="btn btn-outline-light">Charger</button>
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
            <div class="resize-drag news-lg-placeholder"></div>
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
                  <div onclick="appendTextWithHeading()">Lorem, ipsum dolor.</div>
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
                <strong onclick="appendImg()">This is the second item's accordion body.</strong>
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
          <div class="accordion-item">
            <h2 class="accordion-header" id="videoWidgetHeading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#videoWidgetCollapse" aria-expanded="false" aria-controls="videoWidgetCollapse">
                <h4> Vidéos </h4>
              </button>
            </h2>
            <div id="videoWidgetCollapse" class="accordion-collapse collapse" aria-labelledby="videoWidgetHeading" data-bs-parent="#widgets-accordion">
              <div class="accordion-body">
                <strong>This is the seventh item's accordion body.</strong>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="fileWidgetHeading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fileWidgetCollapse" aria-expanded="false" aria-controls="fileWidgetCollapse">
                <h4> Fichier </h4>
              </button>
            </h2>
            <div id="fileWidgetCollapse" class="accordion-collapse collapse" aria-labelledby="fileWidgetHeading" data-bs-parent="#widgets-accordion">
              <div class="accordion-body">
                <strong>This is the eighth item's accordion body.</strong>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="otherWidgetHeading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#otherWidgetCollapse" aria-expanded="false" aria-controls="otherWidgetCollapse">
                <h4> Autres </h4>
              </button>
            </h2>
            <div id="otherWidgetCollapse" class="accordion-collapse collapse" aria-labelledby="otherWidgetHeading" data-bs-parent="#widgets-accordion">
              <div class="accordion-body">
                <strong>This is the ninth item's accordion body.</strong>
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
  $myfile = fopen("../../screens-side/screens/locker-room.html", "w") or die("Unable to open file!");
  $txt = $_COOKIE["code"];
  fwrite($myfile, $txt);
  fclose($myfile);
}

function writeInCafeteria() {
  $myfile = fopen("../../screens-side/screens/cafeteria.html", "w") or die("Unable to open file!");
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

  ?>

<script src='https://unpkg.com/interactjs@1.3.4/dist/interact.js'></script>
<script  src="/factory-display/assets/js/scenes/custom.js"></script>
<script src="/factory-display/assets/js/scenes/interaction.js"></script>
<script src="/factory-display/assets/js/scenes/data.js"></script>
<script src="/factory-display/assets/js/scenes/write.js"></script>
<script src="/factory-display/assets/js/scenes/colors.js"></script>


</body>

</html>
