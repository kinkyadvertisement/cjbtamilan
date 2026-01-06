<?php
require_once __DIR__ . '/functions.php';
$slug = isset($_GET['slug']) ? preg_replace('/[^a-z0-9-_]/i', '', $_GET['slug']) : '';
$articles = loadArticles();
$article = null;
foreach ($articles as $a) {
    if ($a['slug'] === $slug) { $article = $a; break; }
}
if (!$article) {
    http_response_code(404);
    include __DIR__ . '/header.php';
    echo '<main class="container"><h1>Article not found</h1><p>The article you requested could not be found.</p><p><a href="index.php">Back to home</a></p></main>';
    include __DIR__ . '/footer.php';
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo htmlspecialchars($article['title']); ?> — Playful Jobs</title>
  <meta name="description" content="<?php echo htmlspecialchars($article['excerpt']); ?>">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>
<main class="container article-main">
  <article class="post-full">
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <p class="meta"><?php echo htmlspecialchars($article['date']); ?></p>
    <div class="article-content">
      <?php
      // content is trusted HTML from the article file — sanitize as needed before publishing publicly
      echo $article['content'];
      ?>
    </div>
  </article>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
