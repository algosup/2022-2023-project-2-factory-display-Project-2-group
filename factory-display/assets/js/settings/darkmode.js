var theme = 0;

// document.getElementById("toggle-mode").addEventListener("click", function() {
    function testTheme() {
    theme++;
    if (theme > 1) {
        theme = 0;
    }
    console.log("darkmode.js: theme = " + theme);
        
    }
// });

function darkMode() {
    document.body.classList.add("dark-mode");
}

function lightMode() {   
    document.body.classList.remove("dark-mode");
}

if(localStorage.getItem('theme').value === 'dark') {
    darkMode();
    console.log("localStorage: dark")
} else {
    lightMode();
    console.log("localStorage: light")
}

while (true) {
if(theme === 0){
    localStorage.setItem('theme', 'light')
} else if (theme === 1){
    localStorage.setItem('theme', 'dark')
} else {
    console.log("darkmode.js: ERROR")
}
}