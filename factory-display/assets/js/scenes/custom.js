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
  })
  .on("resizemove", function (event) {
    const target = event.target;
    target.style.width = event.rect.height + "px";
    target.style.height = event.rect.height + "px";
    retrieveElementsDatas();
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
  retrieveElementsDatas();
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

function retrieveElementsDatas() {
  var elements = document.querySelectorAll(".resize-drag");
  var rsz_container = document.querySelector(".resize-container");
  var ctn_width = rsz_container.offsetWidth;
  var ctn_height = rsz_container.offsetHeight;
  var ctn_center_x = Math.floor(ctn_width / 2);
  var ctn_center_y = Math.floor(ctn_height / 2);
  elements.forEach((element) => {
    var el_pos_x = element.getAttribute("data-x");
    var el_pos_y = element.getAttribute("data-y");
    var el_width = element.offsetWidth;
    var type = element.className.split(" ")[1];

    type = type.replace("-placeholder", "");

    if (el_pos_x === null && el_pos_y === null) {
      el_pos_x = 0;
      el_pos_y = 0;
    }
    el_width = Math.round(el_width);
    el_pos_x = Math.round(el_pos_x);
    el_pos_y = Math.round(el_pos_y);

    el_center = Math.round(el_width / 2);

    var el_height = el_width;

    console.log("---------------------------------------------");
    console.log("container width: " + ctn_width);
    console.log("container height: " + ctn_height);
    console.log("element width: " + el_width);
    console.log("element height: " + el_height);
    console.log("position in X is: " + el_pos_x);
    console.log("position in Y is: " + el_pos_y);
    console.log("type is: " + type);

    if (
      el_pos_x === ctn_center_x - el_center ||
      el_pos_x === ctn_center_x - el_center - 1 ||
      el_pos_x === ctn_center_x - el_center + 1
    ) {
      console.log("element is close to the right");
    }

    if (
      el_pos_x === -(ctn_center_x - el_center) ||
      el_pos_x === -(ctn_center_x - el_center) + 1 ||
      el_pos_x === -(ctn_center_x - el_center) - 1
    ) {
      console.log("element is close to the left");
    }

    if (
      el_pos_y === ctn_center_y - el_center ||
      el_pos_y === ctn_center_y - el_center - 1 ||
      el_pos_y === ctn_center_y - el_center + 1
    ) {
      console.log("element is close to the bottom");
    }

    if (
      el_pos_y === -(ctn_center_y - el_center) ||
      el_pos_y === -(ctn_center_y - el_center) + 1 ||
      el_pos_y === -(ctn_center_y - el_center) - 1  
    ) {
      console.log("element is close to the top");
    }

    
  });
}
