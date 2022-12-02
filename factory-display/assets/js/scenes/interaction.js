interact(".resize-drag")
  .draggable({
    onmove: dragMoveListener,
    // allowFrom: ".move",
    restrict: {
      restriction: "parent",
      elementRect: { top: 0, left: 0, bottom: 1, right: 1 },
    },
  })
  .resizable({
    edges: { left: false, right: true, bottom: true, top: false },
  })
  .on("resizemove", function (event) {
    var height = event.rect.height;
    var width = event.rect.width;
    if (height <= ctn_height) {
      if (event.target.classList.contains("news-lg-placeholder")) {
        const target = event.target;
        target.style.width = height * 2 + "px";
        target.style.height = height + "px";
      }else{
      const target = event.target;
      target.style.width = event.rect.height + "px";
      target.style.height = event.rect.height + "px";
      }
    }
    // if (height < 100) {
    //   const target = event.target;
    //   target.style.width = "100px";
    //   target.style.height = "100px";
    // }
    retrieveElementsDatas();
  });

interact(".delete").on("tap", function (event) {
  event.target.parentNode.parentNode.remove();
});

// interact(".resize-drag").on("doubletap", function (event) {
//   event.target.remove();
// });

interact(".resize-drag").on("tap", function (event) {
  const target = event.target;
  removeBtns();
  document.querySelectorAll(".resize-drag").forEach((el) => {
    el.classList.remove("selected");
  });
  if (target.classList.contains("text-heading")) {
    target.parentNode.parentNode.classList.add("selected");
  } else {
    target.classList.add("selected");
  }
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

