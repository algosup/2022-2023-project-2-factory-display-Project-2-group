function navbarToggle() {
    const hamburgerToggler = document.querySelector(".hamburger");
    const navLinksContainer = document.querySelector(".navlinks-container");

    const toggleNav = () => {
        hamburgerToggler.classList.toggle("open");

        const ariaToggle =
            hamburgerToggler.getAttribute("aria-expanded") === "true"
                ? "false"
                : "true";
        hamburgerToggler.setAttribute("aria-expanded", ariaToggle);

        navLinksContainer.classList.toggle("open");
    };
    hamburgerToggler.addEventListener("click", toggleNav);

    new ResizeObserver((entries) => {
        if (entries[0].contentRect.width <= 900) {
            navLinksContainer.style.transition = "transform 0.3s ease-out";
        } else {
            navLinksContainer.style.transition = "none";
        }
    }).observe(document.body);
}

function displayHeader(status) {
    // Status are : admin, user, guest
    headerCode = document.querySelector("header");
    switch (status) {
        case "admin":
            // Display admin header
            headerCode.innerHTML = `
        <nav>
        <a href="#" class="nav-icon" aria-label="visit homepage" aria-current="page">
            <img src="/factory-display/assets/images/jacobi-icon.png" alt="icon jacobi">
            <span>Jacobi</span>
        </a>

        <div class="main-navlinks">
            <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="navlinks-container">
                <div class="main-content">
                    <a id="container" href="/factory-display/index.html" aria-current="page">Accueil</a>
                </div>
                <div class="dropdown">
                    <div class="main-content">
                        <a id="container" href="/factory-display/scenes/index.html">Scènes </a>
                    </div>
                    <article class="dropdown-content">
                        <a id="" href="/factory-display/scenes/create.html">Nouvelle scène</a>
                        <a id="" href="/factory-display/scenes/manage.html">Gérer mes scènes</a>
                        <a id="" href="/factory-display/scenes/view.html">Voir mes scènes</a>
                    </article>
                </div>
                <div class="dropdown">
                    <div class="main-content">
                        <a id="container" href="/factory-display/settings/index.html">Mon Espace</a>
                    </div>
                    <article class="dropdown-content">
                        <a id="" href="/factory-display/settings/parametre.html">Paramètres</a>
                        <a id="" href="/factory-display/settings/compte.html">Mon compte</a>
                    </article>
                </div>
            </div>
        </div>
      </nav>
      `;
            break;
        case "user":
            // Display user header
            headerCode.innerHTML = `
        <nav>
        <a href="#" class="nav-icon" aria-label="visit homepage" aria-current="page">
            <img src="/factory-display/assets/images/jacobi-icon.png" alt="icon jacobi">
            <span>Jacobi</span>
        </a>

        <div class="main-navlinks">
            <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="navlinks-container">
                <div class="main-content">
                    <a id="container" href="/factory-display/index.html" aria-current="page">Accueil</a>
                </div>
                <div class="dropdown">
                    <div class="main-content">
                        <a id="container" href="/factory-display/scenes/index.html">Scènes</a>
                    </div>
                    <article class="dropdown-content">
                        <a id="" href="/factory-display/scenes/view.html">Voir les scènes</a>
                    </article>
                </div>
                <div class="dropdown">
                    <div class="main-content">
                        <a id="container" href="/factory-display/settings/index.html">Mon Espace </a>
                    </div>
                    <article class="dropdown-content">
                        <a id="" href="/factory-display/settings/parametre.html">Paramètres</a>
                        <a id="" href="/factory-display/settings/compte.html">Mon compte</a>
                    </article>
                </div>
            </div>
        </div>
      </nav>
      `;
            break;
        case "guest":
            // Display guest header
            headerCode.innerHTML = `
        <nav>
        <a href="#" class="nav-icon" aria-label="visit homepage" aria-current="page">
            <img src="/factory-display/assets/images/jacobi-icon.png" alt="icon jacobi">
            <span>Jacobi</span>
        </a>

        <div class="main-navlinks">
            <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="navlinks-container">
                <div class="main-content">
                    <a class="container" href="/factory-display/index.html" aria-current="page">Accueil</a>
                </div>
                <div class="main-content">
                    <a class="container" href="/factory-display/scenes/index.html">Scènes </a>
                </div>
                <div class="main-content">
                    <a class="container" href="/factory-display/settings/index.html">Mon Espace </a>    
                </div>
            </div>
        </div>

        <div class="nav-authentication">
            <a href="#" class="sign-user" aria-label="Sign in page">
                <img src="/factory-display/assets/images/user-icon.svg" alt="user-icon">
            </a>
            <div class="sign-btns">
                <button type="button"> <a href="/factory-display/settings/account.html" class="link-btn"> Connexion </a></button>
                <button type="button"><a href="/factory-display/settings/inscription.html" class="link-btn"> Inscription </a></button>            
            </div>
        </div>
      </nav>
      `;
            break;
        default:
            // Display guest header
            break;
    }

    navbarToggle();

}