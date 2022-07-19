<?php

require_once "ArticleAggregator.php";

$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'php_test';
$rss = 'https://www.lemonde.fr/rss/une.xml';

$a = new ArticleAggregator();

$a->appendDatabase($dbHost, $dbUser, $dbPassword, $dbName);

$a->appendRss($rss);
//j'ai ajouté $a->articles en attendant que je trouve la methode magique qui se comporte comme toArray ... malheureusement pas assez de temps !
foreach ($a->articles as $article) {
    echo "<h2>$article->title</h2>";
    echo "<p>$article->description</p>"; 
}
