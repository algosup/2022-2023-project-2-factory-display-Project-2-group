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
  var placeholder = document.createElement("div");
  placeholder.className = "resize-drag img-placeholder";
  var source = prompt("Enter Image URL");
  placeholder.style.backgroundImage = `url(${source})`;
  appendPlaceholder(placeholder);
}

function appendsBtns() {
  var selectedElements = document.querySelectorAll(".selected");
  selectedElements.forEach((element) => {
    element.appendChild(moveBtn);
    element.appendChild(deleteBtn);
    element.appendChild(resizeBtn);
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

function appendTextWithHeading() {
  let text = prompt("Enter yout Text");
  if (text) {
    var placeholder = document.createElement("div");
    placeholder.className = "resize-drag text-heading-placeholder";
    var textHeadingCtn = document.createElement("div");
    textHeadingCtn.className = "text-heading-ctn";
    var textHeading = document.createElement("div");
    textHeading.className = "text-heading";
    textHeading.innerHTML = `<h1>${text}</h1>`;
    textHeadingCtn.appendChild(textHeading);
    placeholder.appendChild(textHeadingCtn);
    appendPlaceholder(placeholder);
  } else {
    alert("Please enter text");
  }
}


document.querySelectorAll("h1").forEach((el) => {
  if (el.classList.contains("selected")) {
    el.classList.remove("selected");
  }
});