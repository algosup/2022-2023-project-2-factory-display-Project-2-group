e = true
function changer() {
    if (e) {
        document.getElementById("pass").setAttribute("type", "text");
        document.getElementById("eye").src = "/factory-display/assets/img/icons/oeil_ferme.png";
        e = false;
    }
    else {
        document.getElementById("pass").setAttribute("type", "password");
        document.getElementById("eye").src = "/factory-display/assets/img/icons/oeil_ouvert.png";
        e = true;
    }
}