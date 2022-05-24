<?php include('config/header.php');
include('config/navbar.php');

$url = 'https://newsapi.org/v2/top-headlines?country=za&category=business&apiKey=93cf96b493b54eb8aa621eb1c73ef5d4';
try{
    $response = file_get_contents($url);
}
catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }

if (!empty($response)) {
    $news = json_decode($response);
    echo '<div class="latest-blog">
    <div class="cards">';
    foreach ($news->articles as $story) {
        $pic = $story->urlToImage;
        $title = $story->title;
        $description = $story->description;
        $link = $story->url;
        $date = $story->publishedAt;
        $author = $story->author;
        echo '<div class="card">';
        echo "<a href='$link'><img class='blog-img' src='$pic' alt='News thumbnail'></a>";
        echo "<div class='blog-contents'><a class='blog-link' href='$link'>$title</a>";
        echo "<p class='blog-disc'>$description</p><div class='row'><p class='category'>Business</p><p>$date</p></div></div></div>";
    }
}else{
    echo '<center><p>0 results, please reload the page.</p></center>';
}
?>

</div>
</div>

<!-- This inserts the footer -->
<?php include('config/footer.php') ?>
<!-- Do not add any content below this line. -->