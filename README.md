# Playful Jobs — PHP site (simple)

This is a minimal PHP website template that lists articles from the `content/` folder.

How it works
- `index.php` — homepage, lists articles.
- `article.php` — displays a single article using the `?slug=` parameter.
- `functions.php` — loads article files from `content/*.php`.
- `content/` — place article files here (each sets `$article` array).
- `header.php`, `footer.php`, `styles.css` — templates and styles.

Add an article
1. Create a new PHP file in `content/` (e.g. `content/my-article.php`).
2. In that file set `$article = [ 'title' => '...', 'slug' => 'my-article', 'date'=>'YYYY-MM-DD', 'excerpt'=>'short text', 'content' => '<p>Full HTML content</p>' ];`
3. The article will appear on the homepage automatically.

Deploy
- Needs a PHP web server (Apache, Nginx + PHP-FPM, or similar). GitHub Pages does not support PHP.
- To run locally, use PHP built-in server:
  php -S localhost:8000
  then open http://localhost:8000

Notes & next steps
- Content files contain HTML in `content[].content`. If you prefer Markdown, I can add a tiny parser.
- I can: translate the sample article to Tamil, rewrite a specific article you provide, add pagination, search, contact form, or integrate with a simple admin UI.
- If you want these files committed to your repo `kinkyadvertisement/cjbtamilan`, confirm and I will push them (I will not push without explicit permission).
