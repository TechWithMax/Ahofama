# GitHub Copilot Instructions — Ahofama repo

Summary
- Small static site with Bootstrap + jQuery assets and SCSS sources. Pages live at project root (`index.html`, `about.html`, etc.).
- Assets: CSS in `css/`, SCSS sources in `scss/`, JS in `js/`, third-party libs in `lib/`, images in `img/`.
- `include/` contains PHP include files (header/footer/topbar/navbar) that are currently empty; if you use server-side templating, run a PHP server.

Big picture (why/how)
- This is primarily a frontend-focused site (static HTML/CSS/JS). The presence of `include/*.php` and `database/` suggests optional PHP server-side pieces or future backend work.
- SCSS is present (e.g. `scss/bootstrap.scss`) and the compiled CSS used by the site is under `css/` (e.g. `css/style.css`).

Quick local workflow (commands)
- Static preview (no PHP):
  - python3 -m http.server 8000
  - or use any static server (serve, live-server)
- PHP preview (renders includes):
  - php -S localhost:8000 -t .
- Compile SCSS (recommended):
  - sass scss:css --no-source-map --style=compressed
  - or compile individual files: `sass scss/bootstrap.scss css/bootstrap.min.css --style=compressed`

Project-specific conventions
- Edit SCSS and compile to `css/` rather than directly patching vendor CSS files. Commit both source and compiled outputs when you change styling.
- `js/main.js` contains most custom behavior (nav active state, carousels, counters). Update this file for behavioral changes; avoid editing files in `lib/` unless you deliberately upgrade vendor libs.
- Navigation active state uses localStorage (see `js/main.js`) — keep this in mind when testing link highlighting.
- Carousels use Owl Carousel (`lib/owlcarousel/`). Search for `.categories-carousel` and `.testimonial-carousel` to find related code.

Files & places to inspect for common tasks (examples)
- Tweak hero/header layout: `index.html`, `css/style.css`, `scss/` sources.
- Change shared header/footer: update `include/header.php` / `include/footer.php` and test with `php -S` to render includes.
- Fix JS behavior (carousels, counters, back-to-top): `js/main.js`.
- Add images: `img/` and reference them with relative URLs (e.g., `../img/...` in SCSS).

What to watch out for
- Several files/folders are empty or stubs (`include/*.php`, `database/`, `docs/`) — confirm intended behavior before adding backend logic.
- No package.json / no build scripts — if you add toolchain (Node, npm scripts), include a short README entry and keep builds reproducible with a simple `npm run build` or `Makefile`.
- No automated tests or CI configuration present in the repository.

PR guidance for AI agents
- Keep UI changes small and visual; include before/after screenshots for CSS changes.
- When modifying styles, prefer changing `scss/` and show the compiled diff in `css/` in the same PR.
- If adding JS behavior, keep changes in `js/main.js` or add new modular files under `js/` and update HTML to include them.

When you find incomplete areas
- If you detect an empty include or missing behavior, add a small issue with reproduction steps and a suggested small patch (e.g., "render header via PHP include and add test page using `php -S`").

If anything above is unclear or you'd like more detail (deploy steps, proposed npm workflow, or a starter GitHub Actions CI), tell me which section you'd like me to expand. 
