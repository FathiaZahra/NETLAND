<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Website Title</title>


  <style>
    *,
*::before,
*::after {
    margin: 1;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --brand-clr: hsl(185, 85%, 40%);
    --bg-primary: hsl(195, 20%, 86%);
    --border-clr: hsl(195, 16%, 82%);
    --accent-blue: hsl(205, 100%, 48%);
    --text-primary: hsl(180, 6%, 38%);
    --text-accent: hsl(195, 2%, 78%);

    --header: 3.5rem;
    --full-width: 100%;
    --padding-space: calc(var(--full-width) - 2rem);
    --max-width: 80rem;
    --min-width: 22.5rem;

    --bd-radius: 0.5em;
    --space-025: 0.25rem;
    --space-05: 0.5rem;
    --space-1: 1rem;
}

a {
    text-decoration: none;
}

body {
    display: flex;
    flex-flow: column;
    min-block-size: 100vh;
    font-family: system-ui;
    background: #fff;
}

.container {
    flex-grow: 1;
    display: grid;
    place-self: center;
    inline-size: clamp(
        var(--min-width),
        var(--padding-space),
        var(--max-width)
    );
}

.site-header {
    --padding: 1rem;
    --header-margin: 5vh;
    --shadow: 0 0.1875em 0.3125em #0003, 0 0.125em 0.5em #0002;
    margin-block: auto;
    block-size: var(--header); /* Updated to block-size instead of min-block-size */
    background-color: #739072;
    outline: 1px solid var(--border-clr);
    border-radius: var(--bd-radius);
    padding-inline: var(--padding);
    box-shadow: var(--shadow);
}

.header__content--flow {
    block-size: inherit;
    display: flex;
    flex-flow: wrap;

    /* Breakpoint 1280px > 720px */
    gap: 0 clamp(3.5rem, -24.14rem + 61.43vw, 25rem);
}

.header__content--flow > * {
    flex-grow: 1;
    height: var(--header);
    width: 100px;
}

.header-content--left {
    display: grid;
    grid-auto-flow: column;
    inline-size: max-content;
    place-content: center;
}

.brand-logo {
    gap: var(--space-05);
    padding: 0.25em 0.75em;
    align-items: center;
    display: inline-flex;
}

.brand-logo > svg {
    fill: var(--brand-clr);
}

.brand-logo img {
  height: 60px;
  width: 60px;
}
.logo-text {
    color: #000;
    padding-right: 30px;
    font-size: 20px;
    font-weight: 500;
}

.nav-toggle {
    aspect-ratio: 1;
    height: 2.25rem;
    display: inline-grid;
    place-content: center;
    background: none;
    border: none;
    visibility: hidden;
    cursor: pointer;
}

.nav-toggle:active {
    scale: 0.9;
}

.toggle--icon {
    width: 1.5rem;
    height: 0.25rem;
    border-radius: 10vh;
    position: relative;
    background-color: #000;
}

.toggle--icon::before,
.toggle--icon::after {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background-color: currentColor;
    translate: 0 var(--bar--top, 0.5rem);
}

.toggle--icon::after {
    --bar--top: -0.5rem;
}

.header-content--right {
    position: relative;
    left: -150px;
    flex-grow: 999;
}

.header-nav {
    display: grid;
    align-items: center;
    block-size: 100%;
}

.nav__list {
    list-style: none;
    display: grid;
    grid-auto-flow: column;
    justify-content: space-evenly;
    grid-auto-rows: 2.25rem;
}

.list-item {
    block-size: 100%;
    padding: 5px;
    width: 90px;
    
}

.nav__link {
    block-size: inherit;
    display: inline-grid;
    place-items: center;
    min-width: 10ch;
    color: #000;
    font-size: 15px;
    font-weight: 500;
    text-transform: uppercase;
    margin-right: 30px;
    
}

.nav__link:focus-within {
    color: var(--accent-blue);
}
.nav__link:hover:not(:focus) {
    border-bottom: 2px solid currentColor;
}
.nav__list:hover .nav__link:not(:focus, :hover) {
    color: var(--text-accent);
}

@media (max-width: 575px) {
    .header-content--left {
        justify-content: space-between;
    }

    .header-content--right {
        height: auto;
    }

    .nav-toggle {
        visibility: visible;
    }

    .nav__list {
        right: 0;
        margin-inline: var(--space-1);
        top: calc(50% + var(--space-1) * 2);
        /* gap: var(--space-05) 0; */
        /* position: fixed; */
        /* width: 10rem; */
        background-color: #fff;
        border-radius: var(--bd-radius);
        border: 1px solid var(--border-clr);
        padding-block: 0.5rem;
        /* grid-auto-flow: row; */
        box-shadow: var(--shadow);
        visibility: hidden;
        opacity: 0;
        overflow: auto;
    }

    .nav__list[aria-expanded="true"] {
        visibility: visible;
        transform-origin: top center;
        opacity: 1;
        transition: visibility 0ms, transform 166ms ease, opacity 166ms linear;
    }
}

@media (max-width: 479px) {
    .header-content--left > * {
        scale: 0.83;
    }
    .nav__list {
        width: calc(var(--full-width) - (var(--space-1) * 2));
    }
}

  </style>
  <body>
    <nav style="padding-left: 30px">
    <div class="container">
      <header class="site-header">
          <div class="header__content--flow">
              <section class="header-content--left">
                  <a href="#" class="brand-logo">
                      <img src="/../foto/logo.png">
                      <span class="logo-text">NETLAND</span>
                  </a>
                  <button class="nav-toggle">
                      <span class="toggle--icon"></span>
                  </button>
              </section>
              <section class="header-content--right">
                  <nav class="header-nav" role="navigation">
                      <ul class="nav__list" aria-expanded="false">
                          <li class="list-item">
                              <a class="nav__link" href="#">Beranda</a>
                          </li>
                          <li class="list-item">
                              <a class="nav__link" href="#">Informasi</a>
                          </li>
                          <li class="list-item">
                            <a class="nav__link" href="#">Akomodasi</a>
                        </li>
                          <li class="list-item">
                              <a class="nav__link" href="http://127.0.0.1:8000/dashboard/ticket">Tiket</a>
                          </li>
                          <li class="list-item">
                              <a class="nav__link" href="#">sewa</a>
                          </li>
                          <li class="list-item">
                              <a class="nav__link" href="#">LogOut</a>
                          </li>
                      </ul>
                  </nav>
              </section>
          </div>
      </header>
  </div>
</nav>
<div class="container mt-4" >@yield('content') @include('layout.flash-message')</div>
  </body>
  <script>
    const container = document.querySelector(".container");
const primaryNav = document.querySelector(".nav__list");
const toggleButton = document.querySelector(".nav-toggle");

toggleButton.addEventListener("click", () => {
    const isExpanded = primaryNav.getAttribute("aria-expanded");
    primaryNav.setAttribute(
        "aria-expanded",
        isExpanded === "false" ? "true" : "false"
    );
});

container.addEventListener("click", (e) => {
    if (!primaryNav.contains(e.target) && !toggleButton.contains(e.target)) {
        primaryNav.setAttribute("aria-expanded", "false");
    }
});

  </script>
</head>

</html>
