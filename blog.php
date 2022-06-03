<?php include('config/header.php');
include('config/navbar.php');

$queryString = http_build_query([
    'access_key' => '9739c1895252101f3bd3bd97b6173cc8',
    'categories' => 'business',
    'languages' => 'en',
    'countries' => 'za, us, ch'
]);

$ch = curl_init(sprintf('%s?%s', 'http://api.mediastack.com/v1/news', $queryString));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);

curl_close($ch);

$apiResult = json_decode($json);

if (!empty($apiResult)) {
    echo '<div class="latest-blog">
    <div class="cards">';
    foreach ($apiResult->data as $story) {
        $pic = $story->image;
        $title = $story->title;
        $description = $story->description;
        $link = $story->url;
        $date = $story->published_at;
        $author = $story->author;
        echo '<div class="card">';
        echo "<a href='$link' target='_blank'><img class='blog-img' src='$pic' alt='News thumbnail'></a>";
        echo "<div class='blog-contents'><a class='blog-link' target='_blank' href='$link'>$title</a>";
        echo "<p class='blog-disc'>$description</p>";
        echo "<div class='row'><p class='category'>Business</p><p>$date</p></div></div></div>";
    }
}else{
    echo '<center><p>0 results</p></center>';
}
?>

</div>
</div>

<!-- This inserts the footer -->
<?php include('config/footer.php') ?>
<!-- Do not add any content below this line. -->