interact('.resize-drag')
  .draggable({
    onmove: dragMoveListener,
    allowFrom: '.handle'
  })
  .resizable({
    edges: { left: false, right: false, bottom: true, top: false },
  })
  .on('resizemove', function (event) {
    const target = event.target;
    target.style.height = event.rect.height + 'px';
  });

 function dragMoveListener (event) {
    var target = event.target,
        // keep the dragged position in the data-x/data-y attributes
        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

    // translate the element
    target.style.webkitTransform =
    target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)';

    // update the posiion attributes
    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
  }