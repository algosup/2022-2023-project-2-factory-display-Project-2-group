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

    //export all variables to the global scope
    window.el_pos_x = el_pos_x;
    window.el_pos_y = el_pos_y;
    window.el_width = el_width;
    window.type = type;

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

    checkIfElementIsCloseToAnEdge();
    cantGetNegativePosition();

    const json = {
      type: type,
      width: el_width,
      height: el_height,
      x: el_pos_x,
      y: el_pos_y,
      isOnRight: isOnRight,
      isOnLeft: isOnLeft,
      isOnBottom: isOnBottom,
      isOnTop: isOnTop,
    };

    window.el_width = el_width;
    window.type = type;
    window.el_center = el_center;
    window.json = json;
  });
}
document.querySelector("#saveBtn").addEventListener("click", function () {
  console.log(json);
});

function checkIfElementIsCloseToAnEdge() {
  el_pos_x = Math.round(el_pos_x);
  el_pos_y = Math.round(el_pos_y);

  if (
    el_pos_x === ctn_center_x - el_center ||
    el_pos_x === ctn_center_x - el_center - 1 ||
    el_pos_x === ctn_center_x - el_center + 1
  ) {
    console.log("element is close to the right");
    isOnRight = true;
  }
  if (
    el_pos_x === -(ctn_center_x - el_center) ||
    el_pos_x === -(ctn_center_x - el_center) + 1 ||
    el_pos_x === -(ctn_center_x - el_center) - 1
  ) {
    console.log("element is close to the left");
    isOnLeft = true;
  }
  if (
    el_pos_y === ctn_center_y - el_center ||
    el_pos_y === ctn_center_y - el_center - 1 ||
    el_pos_y === ctn_center_y - el_center + 1
  ) {
    console.log("element is close to the bottom");
    isOnBottom = true;
  }
  if (
    el_pos_y === -(ctn_center_y - el_center) ||
    el_pos_y === -(ctn_center_y - el_center) + 1 ||
    el_pos_y === -(ctn_center_y - el_center) - 1
  ) {
    console.log("element is close to the top");
    isOnTop = true;
  }
}

//i need to get the location of the element in percentage in relation to the container
function cantGetNegativePosition() {
  variables();
  if (el_pos_x <= 0) {
    nn_el_pos_x = Math.floor(el_pos_x + ctn_width / 2 - el_center);
    console.log("nn_el_pos_x is now: " + nn_el_pos_x);
  } else if (el_pos_x > 0) {
    nn_el_pos_x = el_pos_x + Math.floor(el_pos_x + ctn_width / 2 - el_center);
    console.log("el_pos_x is now: " + nn_el_pos_x);
  }
  if (el_pos_y <= 0) {
    nn_el_pos_y = Math.floor(el_pos_y + ctn_height / 2 - el_center);
    console.log("el_pos_y is now: " + nn_el_pos_y);
  } else if (el_pos_y > 0) {
    nn_el_pos_y = el_pos_y + Math.floor(el_pos_y + ctn_height / 2 - el_center);
    console.log("el_pos_y is now: " + nn_el_pos_y);
  }

  //get the percentage of the position in relation to the container
  percent_ctn_width_ratio = (ctn_width / 100);
  percent_ctn_width = (ctn_width / percent_ctn_width_ratio);
  if (el_pos_x <= 0) {
    nn_el_pos_x_percent = (percent_ctn_width_ratio * nn_el_pos_x) + (ctn_width / 100);
    console.log("position in percentage is: " + Math.floor(nn_el_pos_x_percent));
  }

  //   el_pos_y_percent = Math.round((el_pos_y / (ctn_height + el_center)) * 100);
  //   console.log("el_pos_x in percentage is now: " + el_pos_x_percent);
  //   console.log("el_pos_y in percentage is now: " + el_pos_y_percent);
}
