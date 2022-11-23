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

function appendPlaceholder(img) {
  var resizeContainer = document.querySelector(".resize-container");
  resizeContainer.appendChild(img);
  retrieveElementsDatas();
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

