var moveBtn = document.createElement("div");
moveBtn.classList.add("move");
moveBtn.innerHTML = '<i class="fa-solid fa-up-down-left-right"></i>';

var deleteBtn = document.createElement("div");
deleteBtn.classList.add("delete");
deleteBtn.innerHTML = '<i class="fa-solid fa-trash"></i>';

var resizeBtn = document.createElement("div");
resizeBtn.classList.add("resize");
resizeBtn.innerHTML = '<i class="fa-solid fa-expand"></i>';

var date = document.createElement("div");
date.className = "resize-drag date-placeholder";

var clock = document.createElement("div");
clock.className = "resize-drag clock-placeholder";

var date_hour = document.createElement("div");
date_hour.className = "resize-drag date-hour-placeholder";

var news_lg = document.createElement("div");
news_lg.className = "resize-drag news-lg-placeholder";

var weather_sm = document.createElement("div");
weather_sm.className = "resize-drag weather-sm-placeholder";


function appendPlaceholder(img) {
  var resizeContainer = document.querySelector(".resize-container");
  resizeContainer.appendChild(img);
  retrieveElementsDatas();
}

function appendImg() {
  var source = prompt("Enter Image URL");
  var placeholder = document.createElement("div");

  placeholder.className = "resize-drag img-placeholder";
  placeholder.style.backgroundImage = `url(${source})`;
  placeholder.setAttribute("data-source", source);

  appendPlaceholder(placeholder);
}

function appendText(color, size) {
  var text = prompt("Enter Text");
  var placeholder = document.createElement("div");
  var p = document.createElement("p");
  p.textContent = text;

  switch (color) {
    case "white":
      p.style.color = "#fff";
      placeholder.setAttribute("data-color", "white");
      break;
    case "black":
      p.style.color = "#000";
      placeholder.setAttribute("data-color", "black");
      break;
    case "red":
      p.style.color = "#ED1A1A";
      placeholder.setAttribute("data-color", "red");
      break;
    case "orange":
      p.style.color = "#ED7F1A";
      placeholder.setAttribute("data-color", "orange");
      break;
    case "blue":
      p.style.color = "#1A94ED";
      placeholder.setAttribute("data-color", "blue");
      break;
    default:
      p.style.color = "#fff";
      placeholder.setAttribute("data-color", "white");
      break;
  }

  switch (size) {
    case "small":
      p.style.fontSize = "1.5rem";
      placeholder.setAttribute("data-size", "small");
      break;
    case "medium":
      p.style.fontSize = "2rem";
      placeholder.setAttribute("data-size", "medium");
      break;
    case "large":
      p.style.fontSize = "2.5rem";
      placeholder.setAttribute("data-size", "large");
      break;
    case "extra-large":
      p.style.fontSize = "3rem";
      placeholder.setAttribute("data-size", "extra-large");
      break;
    default:
      p.style.fontSize = "2rem";
      placeholder.setAttribute("data-size", "medium");
      break;
  }

  placeholder.className = "resize-drag text-placeholder";
  placeholder.setAttribute("data-text", text);

  appendPlaceholder(placeholder);
  placeholder.append(p);
}

function appendsBtns() {
  var selectedElements = document.querySelectorAll(".selected");
  selectedElements.forEach((element) => {
    element.prepend(moveBtn);
    element.prepend(deleteBtn);
    element.prepend(resizeBtn);
  });
}

function removeBtns() {
  var selectedElements = document.querySelectorAll(".selected");
  selectedElements.forEach((element) => {
    element.removeChild(moveBtn);
    element.removeChild(deleteBtn);
    element.removeChild(resizeBtn);
  });
}




document.querySelectorAll("p").forEach((el) => {
  if (el.classList.contains("selected")) {
    el.classList.remove("selected");
  }
});

