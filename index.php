<?php

$dbh = new PDO("pgsql:host=localhost;dbname=postgres", null, null);

$stmt = $dbh->prepare("SELECT * FROM article");
$stmt->execute();

echo "article list:<br>";
foreach ($stmt->fetchAll() as $article) {
    echo $article ["name"]."-".$article["created_at"]."<br>";
}