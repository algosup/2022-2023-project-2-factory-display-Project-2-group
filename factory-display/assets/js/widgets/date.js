var date = new Date();

// Returns the current day of the month
var day = date.getDate();

// Returns the month
var months = new Array();
months[0] = "Janvier";
months[1] = "Février";
months[2] = "Mars";
months[3] = "Avril";
months[4] = "Mai";
months[5] = "Juin";
months[6] = "Juillet";
months[7] = "Août";
months[8] = "Septembre";
months[9] = "Octobre";
months[10] = "Novembre";
months[11] = "Décembre";

var month = months[date.getMonth()];

// Returns the year
var year = date.getFullYear();

document.getElementById("date").innerHTML = month + " " + year;

document.getElementById("day").innerHTML = day;