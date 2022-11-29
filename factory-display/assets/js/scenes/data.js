function getName() {
  var name = document.querySelector("#scene-name").value;
  var desc = document.querySelector("#desc-name").value;
  console.log(name + " : " + desc);

  selectOrientation();

  window.name = name;
  window.desc = desc;
}

function selectOrientation(orientationSelected) {
  if (orientationSelected === "portrait") {
    console.log("portrait");
  } else if (orientationSelected === "landscape") {
    console.log("landscape");
  }
}

function variables() {
  var elements = document.querySelectorAll(".resize-drag");
  var rsz_container = document.querySelector(".resize-container");
  var ctn_width = rsz_container.offsetWidth;
  var ctn_height = rsz_container.offsetHeight;
  var ctn_center_x = Math.floor(ctn_width / 2);
  var ctn_center_y = Math.floor(ctn_height / 2);
  var isOnRight = false;
  var isOnLeft = false;
  var isOnBottom = false;
  var isOnTop = false;

  window.elements = elements;
  window.rsz_container = rsz_container;
  window.ctn_width = ctn_width;
  window.ctn_height = ctn_height;
  window.ctn_center_x = ctn_center_x;
  window.ctn_center_y = ctn_center_y;
  window.isOnRight = isOnRight;
  window.isOnLeft = isOnLeft;
  window.isOnBottom = isOnBottom;
  window.isOnTop = isOnTop;
}

function retrieveElementsDatas() {
  variables();

  elements.forEach((element) => {
    var el_pos_x = element.getAttribute("data-x");
    var el_pos_y = element.getAttribute("data-y");
    var el_width = element.offsetWidth;
    var type = element.className.split(" ")[1];

    window.el_pos_x = el_pos_x;
    window.el_pos_y = el_pos_y;
    window.el_width = el_width;

    type = type.replace("-placeholder", "");
    window.type = type;

    if (el_pos_x === null && el_pos_y === null) {
      el_pos_x = 0;
      el_pos_y = 0;
    }
    el_width = Math.round(el_width);
    el_pos_x = Math.round(el_pos_x);
    el_pos_y = Math.round(el_pos_y);

    el_center = Math.round(el_width / 2);

    checkIfElementIsCloseToAnEdge();

    window.el_width = el_width;
    window.type = type;
    window.el_center = el_center;
    window.element = element;
    percent();
  });
}

function checkIfElementIsCloseToAnEdge() {
  el_pos_x = Math.round(el_pos_x);
  el_pos_y = Math.round(el_pos_y);

  if (el_pos_x === ctn_width - el_width) {
    isOnRight = true;
  }
  if (el_pos_x === 0) {
    isOnLeft = true;
  }
  if (el_pos_y === ctn_height - el_width) {
    isOnBottom = true;
  }
  if (el_pos_y === 0) {
    isOnTop = true;
  }
}

function percent() {
  ratio_X = ctn_width / 100;
  ctn_width_percent = ctn_width / ratio_X;
  ratio_Y = ctn_height / 100;
  ctn_height_percent = ctn_height / ratio_Y;
  el_width_percent = Math.round(el_width / ratio_X);
  el_height_percent = Math.round(el_width / ratio_Y);

  var parentPos = rsz_container.getBoundingClientRect(),
    childPos = element.getBoundingClientRect(),
    relativePos = {};

  (relativePos.top = Math.round(childPos.top - parentPos.top)),
    (relativePos.right = Math.round(childPos.right - parentPos.right) * -1),
    (relativePos.bottom = Math.round(childPos.bottom - parentPos.bottom) * -1),
    (relativePos.left = Math.round(childPos.left - parentPos.left));

  relativePos.top = Math.round(relativePos.top / ratio_Y);
  relativePos.right = Math.round(relativePos.right / ratio_X);
  relativePos.bottom = Math.round(relativePos.bottom / ratio_Y);
  relativePos.left = Math.round(relativePos.left / ratio_X);

  var values = {
    type: type,
    margin_top: relativePos.top,
    height: el_height_percent,
    margin_bottom: relativePos.bottom,
    margin_left: relativePos.left,
    width: el_width_percent,
    margin_right: relativePos.right,
    isOnRight: isOnRight,
    isOnLeft: isOnLeft,
    isOnBottom: isOnBottom,
    isOnTop: isOnTop,
  };

  window.values = values;
  element.setAttribute("data-values", JSON.stringify(values));
}

function createHtmlTag() {
  var htmlString = [];
  elements.forEach((element) => {
    var values = JSON.parse(element.getAttribute("data-values"));
    console.log("VALUES", values);

    var iframe = document.createElement("iframe");
    iframe.setAttribute(
      "src",
      "/factory-display/widgets/" + values.type + ".html"
    );
    iframe.setAttribute(
      "style",
      "width: " +
        values.height +
        "vh;height: " +
        values.height +
        "vh;margin-top: " +
        values.margin_top +
        "vh; margin-bottom: " +
        values.margin_bottom +
        "vh; margin-left: " +
        values.margin_left +
        "vw; margin-right: " +
        values.margin_right +
        "vw;"
    );
    htmlString.push(iframe.outerHTML);
  });
  console.log(htmlString);
  window.htmlString = htmlString;
  writeTheSceneFile();
}

var theme = 1;
document.getElementsByClassName("select-color")[0].addEventListener("click", function () {themeOne()});
document.getElementsByClassName("select-color")[1].addEventListener("click", function () {themeTwo()});
document.getElementsByClassName("select-color")[2].addEventListener("click", function () {themeThree()});
document.getElementsByClassName("select-color")[3].addEventListener("click", function () {themeFour()});

if (theme === 1) {
  themeOne();
} else if (theme === 2) {
  themeTwo();
} else if (theme === 3) {
  themeThree();
} else if (theme === 4) {
  themeFour();
}

function themeOne (){
  theme = 1;
  document.getElementById("clock-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/clock/clock_theme-1.png')";
  document.getElementById("date-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date/date_theme-1.png')";
  document.getElementById("date-hour-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date_hour/date-hour_theme-1.png')";


  if (document.getElementsByClassName("custom-canva")[0].querySelector(".clock-placeholder") !== null) {
  document.getElementsByClassName("clock-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/clock/clock_theme-1.png')";
}
  if (document.getElementsByClassName("custom-canva")[0].querySelector(".date-placeholder") !== null) {
  document.getElementsByClassName("date-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date/date_theme-1.png')";
}
  if (document.getElementsByClassName("custom-canva")[0].querySelector(".date-hour-placeholder") !== null) {
  document.getElementsByClassName("date-hour-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date_hour/date-hour_theme-1.png')";
}
  
  document.getElementsByClassName("custom-canva")[0].style.backgroundColor = "#3e3e3e";
  console.log("theme 1 loaded");
}

function themeTwo (){
  theme = 2;
  document.getElementById("clock-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/clock/clock_theme-2.png')";
  document.getElementById("date-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date/date_theme-2.png')";
  document.getElementById("date-hour-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date_hour/date-hour_theme-2.png')";
  if (document.getElementsByClassName("custom-canva")[0].querySelector(".clock-placeholder") !== null) {
    document.getElementsByClassName("clock-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/clock/clock_theme-2.png')";
  }
  if (document.getElementsByClassName("custom-canva")[0].querySelector(".date-placeholder") !== null) {
    document.getElementsByClassName("date-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date/date_theme-2.png')";
  }
  if (document.getElementsByClassName("custom-canva")[0].querySelector(".date-hour-placeholder") !== null) {
    document.getElementsByClassName("date-hour-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date_hour/date-hour_theme-2.png')";
  }
  document.getElementsByClassName("custom-canva")[0].style.backgroundColor = "#000000";
  console.log("theme 2 loaded");
}

function themeThree (){
  theme = 3;
  document.getElementById("clock-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/clock/clock_theme-3.png')";
  document.getElementById("date-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date/date_theme-3.png')";
  document.getElementById("date-hour-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date_hour/date-hour_theme-3.png')";
  if (document.getElementsByClassName("custom-canva")[0].querySelector(".clock-placeholder") !== null) {
    document.getElementsByClassName("clock-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/clock/clock_theme-3.png')";
  }
  if (document.getElementsByClassName("custom-canva")[0].querySelector(".date-placeholder") !== null) {
    document.getElementsByClassName("date-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date/date_theme-3.png')";
  }
  if (document.getElementsByClassName("custom-canva")[0].querySelector(".date-hour-placeholder") !== null) {
    document.getElementsByClassName("date-hour-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date_hour/date-hour_theme-3.png')";
  }
  document.getElementsByClassName("custom-canva")[0].style.backgroundColor = "#333333";
  console.log("theme 3 loaded");
}

function themeFour (){
  theme = 4;
  document.getElementById("clock-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/clock/clock_theme-4.png')";
  document.getElementById("date-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date/date_theme-4.png')";
  document.getElementById("date-hour-placeholder").style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date_hour/date-hour_theme-4.png')";
  if (document.getElementsByClassName("custom-canva")[0].querySelector(".clock-placeholder") !== null) {
    document.getElementsByClassName("clock-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/clock/clock_theme-4.png')";
  }
  if (document.getElementsByClassName("custom-canva")[0].querySelector(".date-placeholder") !== null) {
    document.getElementsByClassName("date-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date/date_theme-4.png')";
  }
  if (document.getElementsByClassName("custom-canva")[0].querySelector(".date-hour-placeholder") !== null) {
    document.getElementsByClassName("date-hour-placeholder")[0].style.backgroundImage = "url('/factory-display/assets/img/widgets/placeholder/date_hour/date-hour_theme-4.png')";
  }
  document.getElementsByClassName("custom-canva")[0].style.backgroundColor = "#e3e3e3";
  console.log("theme 4 loaded");
}






function writeTheSceneFile() {

  const headContent = `
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <title>Document</title>
      <style>
        body {
          display: flex;
          padding: 0;
          margin: 0;
          height: 100vh;
          width: 100vw;
          background-color: var(--bg-color);
          overflow: hidden;
        }
  
        body::backdrop {
          background-color: var(--bg-color);
        }
        iframe {
          width: 100%;
          height: 100%;
          border: none;
          position: absolute;
        }
      </style>
      <link
        rel="stylesheet"
        href="/factory-display/assets/css/themes/theme`+theme+`.css"
      />
    </head>
    <body onload="setColors()">
`;

  const footContent = `
<script>
document.getElementsByTagName("body")[0].addEventListener("click", function() {
    document.getElementsByTagName("body")[0].requestFullscreen();
});

function setColors() {
  //apply theme colors to all iframe elements
  var iframes = document.getElementsByTagName("iframe");
  for (var i = 0; i < iframes.length; i++) {
      var cssLink = document.createElement("link");
      cssLink.href = "/factory-display/assets/css/themes/theme`+theme+`.css";
      cssLink.rel = "stylesheet";
      cssLink.type = "text/css";
      iframes[i].contentWindow.document.head.appendChild(cssLink);
  }

}

</script>
</body>
</html>
`;

  const dynamicContent = htmlString.join("");
  const globalContent = headContent + dynamicContent + footContent;
  console.log(globalContent);


  var previewWindow = window.open("", "previewWindow", "width=1920,height=1080");
  previewWindow.document.write(globalContent);
  previewWindow.document.close();
}