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

