var firstView = document.getElementById('first-view');
var secondView = document.getElementById('second-view');

function loadFirstView() {    
    document.getElementById('first-view').style.display = 'block';
    document.getElementById('second-view').style.display = 'none';
    console.log('first view is loaded');
}

function loadSecondView() {
    document.getElementById('first-view').style.display = 'none';
    document.getElementById('second-view').style.display = 'block';
    console.log('second view is loaded');
}

window.onload = function() {
    // loadFirstView();
    loadSecondView();
}