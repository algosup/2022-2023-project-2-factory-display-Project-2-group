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

function displayHeader() {
  const headerCode = document.querySelector("header");
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
                    <a id="container" href="#" aria-current="page">Accueil</a>
                </div>
                <div class="dropdown">
                    <div class="main-content">
                        <a id="container" href="#">Scènes <i class="fa fa-caret-down"></i></a>
                    </div>
                    <article class="dropdown-content">
                        <a id="" href="#">Nouvelle scène</a>
                        <a id="" href="#">Gérer mes scènes</a>
                        <a id="" href="#">Voir mes scènes</a>
                    </article>
                </div>
                <div class="dropdown">
                    <div class="main-content">
                        <a id="container" href="#">Mon Espace <i class="fa fa-caret-down"></i></a>
                    </div>
                    <article class="dropdown-content">
                        <a id="" href="#">Paramètres</a>
                        <a id="" href="#">Mon compte</a>
                        <a id="" href="/factory-display/settings/account.html">Connexion</a>
                    </article>
                </div>
            </div>
        </div>

        <div class="nav-authentication">
            <a href="#" class="sign-user" aria-label="Sign in page">
                <img src="/factory-display/assets/images/user-icon.svg" alt="user-icon">
            </a>
            <div class="sign-btns">
                <button type="button"> <a href="/factory-display/settings/account.html" class="link-btn"> Connexion</a></button>
                <button type="button">Inscription</button>
            </div>
        </div>
    </nav>

`;

  navbarToggle();
}
