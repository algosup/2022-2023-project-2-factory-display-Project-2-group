const landscapeBtn = document.querySelector(".landscape");
const portraitBtn = document.querySelector(".portrait");

portraitBtn.addEventListener("click", () => {
  setOrientation("portrait");
});

landscapeBtn.addEventListener("click", () => {
  setOrientation("landscape");
});

function setOrientation(orientationValue) {
  switch (orientationValue) {
    case "portrait":
      portraitBtn.classList.add("active-orientation");
      landscapeBtn.classList.remove("active-orientation");
      portraitBtn.classList.remove("inactive-orientation");
      landscapeBtn.classList.add("inactive-orientation");
      console.log("portrait");
      break;
    case "landscape":
      landscapeBtn.classList.add("active-orientation");
      portraitBtn.classList.remove("active-orientation");
      landscapeBtn.classList.remove("inactive-orientation");
      portraitBtn.classList.add("inactive-orientation");
      console.log("landscape");
      break;
    default:
      console.log("default");
      break
  }
}
