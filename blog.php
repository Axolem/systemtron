<?php include('config/header.php');
include('config/navbar.php');

$country = 'za';
$category = 'business';
//$key = 'a67c0f93a6be4ca19992e28a7a38553f'; 
$key = '93cf96b493b54eb8aa621eb1c73ef5d4';
$url = "https://newsapi.org/v2/top-headlines?country=$country&category=$category&apiKey=$key";

$response = file_get_contents($url);

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
        echo "<a href='$link' target='_blank'><img class='blog-img' src='$pic' alt='News thumbnail'></a>";
        echo "<div class='blog-contents'><a class='blog-link' target='_blank' href='$link'>$title</a>";
        echo "<p class='blog-disc'>$description</p>";
        echo "<div class='row'><p class='category'>Business</p><p>$date</p></div></div></div>";
    }
} else {
    echo '<center><p>0 results, please reload the page.</p></center>';
}
?>

</div>
</div>

<!-- This inserts the footer -->
<?php include('config/footer.php') ?>
<!-- Do not add any content below this line. -->