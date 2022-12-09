setInterval(function () {
  document.getElementById("do-time").innerHTML = formatTime();
}, 1000);

function formatTime() {
  var d = new Date() + 3600000;
  minutes =
    d.getMinutes().toString().length == 1
      ? "0" + d.getMinutes()
      : d.getMinutes();
  hours =
    d.getHours().toString().length == 1 ? "0" + d.getHours() : d.getHours();
  months = [
    "Janvier",
    "Février",
    "Mars",
    "Avril",
    "Mai",
    "Juin",
    "Juillet",
    "Août",
    "Septembre",
    "Octobre",
    "Novembre",
    "Décembre",
  ];
  days = [
    "Dimanche",
    "Lundi",
    "Mardi",
    "Mercredi",
    "Jeudi",
    "Vendredi",
    "Samedi",
  ];
  return (
    "<h2>" +
    hours +
    "<span>:" +
    minutes +
    "</span></h2><h3>" +
    days[d.getDay()] +
    "<span>" +
    d.getDate() +
    " " +
    months[d.getMonth()] +
    "</span>" +
    d.getFullYear() +
    "</h3>"
  );
}
