# Astrix Media

A business transformation partner website featuring dynamic canvas animations, editorial typography, and high-performance interactive layouts.

## Deploying to Vercel / Netlify (Static HTML)
This project includes a zero-dependency static version (`index.html`) that can be hosted directly on edge platforms:

```bash
npx vercel
```
Or drag this folder directly into [Netlify Drop](https://app.netlify.com/drop).

## Deploying to WordPress
Zip this directory and upload to WordPress under **Appearance → Themes → Add New → Upload Theme**.

### Structure
- `index.html`: Standalone static homepage (zero dependencies)
- `front-page.php`, `header.php`, `footer.php`: WordPress templates
- `style.css`: Design system tokens & typography
- `js/astrix-home.js`: Canvas particles, ecosystem ring, and scroll interaction engine
- `assets/`: Media assets (images, logos, background video)
