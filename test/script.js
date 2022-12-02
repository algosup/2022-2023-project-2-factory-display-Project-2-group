$(".custom-canva").mousedown(function (event) {
  event.preventDefault();
  if (event.which === 3) {
    $(".menuElement").fadeOut("fast");
    $(".menuContainer")
      .show()
      .css({ top: event.pageY + 15, left: event.pageX + 10 });
  }
});

$(".resize-drag").mousedown(function (event) {
  event.preventDefault();
  $(".custom-canva").off("mousedown");
  if (event.which === 3) {
    $(".menuContainer").fadeOut("fast");
    $(".menuElement")
      .show()
      .css({ top: event.pageY + 15, left: event.pageX + 10 });
  }
      $(".custom-canva").on("mousedown");
});

$(document).bind("contextmenu", function(e) {
  return false;
});

$(document).click(function () {
  elIsHovered = $("ul.menuElement").is(":hover");
  if (elIsHovered == false) {
    $(".menuElement").fadeOut("fast");
  }
  ctnIsHovered = $("ul.menuContainer").is(":hover");
  if (ctnIsHovered == false) {
    $(".menuContainer").fadeOut("fast");
  }
});

var previousBtn = document.getElementsByClassName("previous-theme-btn")[0];
var nextBtn = document.getElementsByClassName("next-theme-btn")[0];
var slides = document.getElementsByClassName("slide");

previousBtn.addEventListener("click", function () {
  for (var i = 0; i < slides.length; i++) {
    if (slides[i].classList.contains("showing")) {
      slides[i].classList.remove("showing");
      if (i == 0) {
        slides[slides.length - 1].classList.add("showing");
      } else {
        slides[i - 1].classList.add("showing");
      }
      break;
    }
  }
  updateTheme();
});

nextBtn.addEventListener("click", function () {
  for (var i = 0; i < slides.length; i++) {
    if (slides[i].classList.contains("showing")) {
      slides[i].classList.remove("showing");
      if (i == slides.length - 1) {
        slides[0].classList.add("showing");
      } else {
        slides[i + 1].classList.add("showing");
      }
      break;
    }
  }
  updateTheme();
});

function updateTheme() {
  for (var i = 0; i < slides.length; i++) {
    if (slides[i].classList.contains("showing")) {
      slides[i].style.display = "block";
    } else {
      slides[i].style.display = "none";
    }
  }
}
updateTheme();
