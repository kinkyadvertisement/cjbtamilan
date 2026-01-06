<?php
require_once __DIR__ . '/functions.php';
$articles = loadArticles(); // sorted by date desc
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Playful Jobs — Find Opportunities</title>
  <meta name="description" content="News, guides and the latest listings — clear, practical articles.">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include __DIR__ . '/header.php'; ?>
<main class="container">
  <section class="hero">
    <h1>Discover new opportunities</h1>
    <p class="lead">News, guides and listings — rewritten clearly and presented for easy reading.</p>
  </section>

  <section class="content-list">
    <?php if (empty($articles)): ?>
      <p>No articles yet. Add files to the <code>content/</code> folder.</p>
    <?php else: ?>
      <?php foreach ($articles as $a): ?>
        <article class="post">
          <h2><a href="article.php?slug=<?php echo urlencode($a['slug']); ?>"><?php echo htmlspecialchars($a['title']); ?></a></h2>
          <p class="meta"><?php echo htmlspecialchars($a['date']); ?></p>
          <p class="excerpt"><?php echo htmlspecialchars($a['excerpt']); ?></p>
          <a class="read-more" href="article.php?slug=<?php echo urlencode($a['slug']); ?>">Read full article →</a>
        </article>
      <?php endforeach; ?>
    <?php endif; ?>
  </section>
</main>
<?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
