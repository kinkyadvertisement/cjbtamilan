<?php
// Simple article loader. Each article is a PHP file in content/ that sets $article array.
function loadArticles() {
    $files = glob(__DIR__ . '/content/*.php');
    $articles = [];
    foreach ($files as $f) {
        // isolate scope
        $article = null;
        include $f; // each content file must set $article = [...]
        if (!is_array($article)) continue;
        // normalize required fields
        if (empty($article['slug'])) {
            $article['slug'] = preg_replace('/[^a-z0-9-_]/i', '-', strtolower($article['title']));
        }
        if (empty($article['date'])) {
            $article['date'] = date('Y-m-d');
        }
        $articles[] = $article;
    }
    // sort newest first
    usort($articles, function($a,$b){
        return strcmp($b['date'],$a['date']);
    });
    return $articles;
}
