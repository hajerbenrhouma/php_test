<?php
require_once "Article.php";

class ArticleAggregator implements ArrayAccess {

public  string  $className = 'ArticleAggregator'; // cette ligne de doit pas être modifiée ni supprimée
public $articles = [];

private function db_connection($servername, $dbname, $username, $password){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

public function appendDatabase($dbHost, $dbUser, $dbPassword, $dbName){
    $conn = $this->db_connection($dbHost, $dbName, $dbUser, $dbPassword);
    $stmt = $conn->prepare("SELECT * FROM articles");
    $stmt->execute();
    foreach ($stmt->fetchAll() as $value) {
        $article = new Article();
        $article->id = $value['id'];
        $article->title = $value['title'];
        $article->description = $value['description'];
        $this[] = $article;
    }
}

public function  appendRss($rss){
    $content = file_get_contents($rss);
    $a = new SimpleXMLElement($content);
     
    foreach($a->channel->item as $entry) {
        $article = new Article();
        $article->title = (string)$entry->title;
        $article->description = (string)$entry->description;
        $this[] = $article;
    }
}

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->articles[] = $value;
        } else {
        $this->articles[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->articles[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->articles[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->articles[$offset]) ? $this->articles[$offset] : null;
    }

}
