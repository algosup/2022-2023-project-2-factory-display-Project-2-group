e = true
function changer() {
    if (e) {
        document.getElementById("pass").setAttribute("type", "text");
        document.getElementById("eye").src = "/factory-display/assets/img/icons/oeil_ferme-removebg-preview.png";
        e = false;
    }
    else {
        document.getElementById("pass").setAttribute("type", "password");
        document.getElementById("eye").src = "/factory-display/assets/img/icons/oeil_ouvert-removebg-preview.png";
        e = true;
    }
}
function changer1() {
    if (e) {
        document.getElementById("c_pass").setAttribute("type", "text");
        document.getElementById("eye1").src = "/factory-display/assets/img/icons/oeil_ferme.png";
        e = false;
    }
    else {
        document.getElementById("c_pass").setAttribute("type", "password");
        document.getElementById("eye1").src = "/factory-display/assets/img/icons/oeil_ouvert.png";
        e = true;
    }
}