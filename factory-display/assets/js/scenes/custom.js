interact(".resize-drag")
  .draggable({
    onmove: dragMoveListener,
    allowFrom: ".move",
    restrict: {
      restriction: "parent",
      elementRect: { top: 0, left: 0, bottom: 1, right: 1 },
    },
  })
  .resizable({
    edges: { left: false, right: true, bottom: true, top: false },
    restriction: "parent",
  })
  .on("resizemove", function (event) {
    const target = event.target;
    target.style.width = event.rect.width + "px";
    target.style.width = event.rect.height + "px";
    target.style.width = event.rect.height + "px";
    target.style.height = event.rect.height + "px";
  });

interact(".delete").on("tap", function (event) {
  event.target.parentNode.parentNode.remove();
});

interact(".resize-drag").on("tap", function (event) {
  const target = event.target;
  removeBtns();
  document.querySelectorAll(".resize-drag").forEach((el) => {
    el.classList.remove("selected");
  });
  target.classList.add("selected");
  appendsBtns();
});


function dragMoveListener(event) {
  var target = event.target,
    // keep the dragged position in the data-x/data-y attributes
    x = (parseFloat(target.getAttribute("data-x")) || 0) + event.dx,
    y = (parseFloat(target.getAttribute("data-y")) || 0) + event.dy;

  // translate the element
  target.style.webkitTransform = target.style.transform =
    "translate(" + x + "px, " + y + "px)";

  // update the posiion attributes
  target.setAttribute("data-x", x);
  target.setAttribute("data-y", y);
}

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

