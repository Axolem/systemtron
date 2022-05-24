<?php include('config/header.php');
include('config/navbar.php'); ?>



<section class="background">
  <img src="images/backgrd.jpg" alt="background">
  <div class="welcome">
    <h2>BE YOUR OWN BOSS <br><span>Time is limited Learn here Lead anywhere</span></h2>
  </div>
</section>


<main class="sectionmain">
  <div>
    <h3>Want to start your own business?</h3>
    <p>Be your own boss is the website to be at.<br>-We provide essential tools and information on how one can start and maintain their business.<br>
      -We provide full support and learnership programs on starting your own business with full support from the government.<br>
      -The learnership program includes how to write a business plan and how to grow it once opened, how the funding from the government goes and the registering of the business.<br>
      -We offer various kinds of support programs to anyone whose intrested
    </p>
  </div>

  <div class="home-page-wrapper">
    <h2>Welcome</h2>
    <div class="row row2">
      <img class="homeimage image2" src="images/growth2.jpg" alt="bob-growth2">
      <img class="homeimage image2" src="images/growth.jpg" alt="bob-growth">
    </div>
  </div>


  <div class='home-page-wrapper'>
    <h2>Pride</h2>
    <div class="row row2">
      <p>-We pride ourselves in providing excellence through our programs.<br>
        -Over 90% of our students have completed our modules.<br>
        -Our students stand a greater chance to be great entreprenenurs with successful businesses.<br>
        -We encourage students to engage with thier peers and think creatively and spot opportunities.<br>
      </p>
      <img class="homeimage" src="images/creativ.jpg" alt="bob-creativ">
    </div>
  </div>

  <div class="home-page-wrapper">
    <h2>Flexibility</h2>
    <div class="row row2">
      <img class="homeimage" src="images/creative2.jpg" alt="bob-creative2">
      <p>
        -Be Your Own Boss offers exceptional flexibility providing you with excellent programs.<br>
        -We have a dedicated team that provides easily accesible support that will help .<br>
        -Our programs are aimed at building students.<br>
        -We provide essential skills required for a successful entreprenenurship journey.
      </p>
    </div>
  </div>

  <section class="home4">
    <div class="home3">
      <p>
      <h2>Great Environment , fruitful results </h2>
      </p>
      <p>BOB is diverse and skillfull enough to help anyone of any age.Once in youll never regret it.</p>
      <li><a class="link" href="login.php">Register</a></li>
    </div>
    <img class='hide' src="images/homeimg.jpg" alt="bob-students">
    <img class='hide' src="images/youth.jpg" alt="bob-images">
    <img src="images/hstudents.jpg" alt="bob-image">
  </section>
</main>


<section class="register">
  <div class="home-pop-up">
    <center>
      <h2>Subscribe to our newsletters</h2>
    </center>
    <form class="login-form conf-form " action="manual/subscribe.php" method="post">
      <input type="text" placeholder="Enter name" name="name" required>
      <input type="text" placeholder="Enter Email" name="email" required>
      <br>
      <?php
      if (!empty($_GET['submassage'])) {
        echo "<p class='success'>" . $_GET['submassage'] . "</p> ";
      } ?>
      <input class='button' type="submit" value="Submit">
    </form>
  </div>
</section>

<div class="home-page-wrapper">
  <center><h2>Meet the Team</h2></center>
  <div class="outer-con">
    <div class="inner-con">
      <div class="slider">
        <div class="crad1">
          <img src="images/ofentse.jpeg">
          <h1>Bethuel Ofentse Makgopa</h1>
          <p>221066447</p>
          <div class="icons">
            <a href="https://github.com/" target="_blank"><i class="bi bi-github"></a></i>
          </div>
        </div>
        <div class="crad2">
          <img src="images/NesleyB.jpg">
          <h1>Hlonipho Nersely Bila</h1>
          <p>220080694</p>
          <div class="icons">
            <a href="https://github.com/NesleyB" target="_blank"><i class="bi bi-github"></a></i>
          </div>
        </div>
        <div class="crad3">
          <img src="images/ndzulamo.jpg">
          <h1>Ndzulamo Michelle Yingwani</h1>
          <p>220122253</p>
          <div class="icons">
            <a href="https://github.com/MichelleNdzu" target="_blank"><i class="bi bi-github"></a></i>
          </div>
        </div>
        <div class="crad3">
          <img src="images/20211224_153434.png">
          <h1>Axole Maranjana</h1>
          <p>220023913</p>
          <div class="icons">
            <a href="https://github.com/Axolem" target="_blank"><i class="bi bi-github"></a></i>
          </div>
        </div>
        <div class="crad3">
          <img src="images/Junior2.jpg">
          <h1>Junior Maruping</h1>
          <p>221023858</p>
          <div class="icons">
            <a href="https://github.com/junior-03" target="_blank"><i class="bi bi-github"></a></i>
          </div>
        </div>
        <div class="crad3">
          <img src="images/mypic.jpg">
          <h1>Thatohatsi Gadipedi</h1>
          <p>221028477</p>
          <div class="icons">
            <a href="https://github.com/thatohatsig" target="_blank"><i class="bi bi-github"></a></i>
          </div>
        </div>
      </div>
    </div>
    <div class="btns">
      <button id="btn1"></button>
      <button id="btn2"></button>
      <button id="btn3"></button>
      <button id="btn4"></button>
      <button id="btn5"></button>
      <button id="btn6"></button>
    </div>
  </div>
</div>
<script>
  var btn1 = document.getElementById('btn1');
  var btn2 = document.getElementById('btn2');
  var btn3 = document.getElementById('btn3');
  var btn4 = document.getElementById('btn4');
  var btn5 = document.getElementById('btn5');
  var btn6 = document.getElementById('btn6');
  var slider = document.querySelector('.slider');

  btn1.onclick = function() {
    slider.style.marginLeft = "0";
    this.style.background = "aliceblue";
    btn2.style.background = "transparent";
    btn3.style.background = "transparent";
  }

  btn2.onclick = function() {
    slider.style.marginLeft = "-100%";
    this.style.background = "aliceblue";
    btn1.style.background = "transparent";
    btn3.style.background = "transparent";
  }
  btn3.onclick = function() {
    slider.style.marginLeft = "-200%";
    this.style.background = "aliceblue";
    btn1.style.background = "transparent";
    btn3.style.background = "transparent";
  }
  btn4.onclick = function() {
    slider.style.marginLeft = "-300%";
    this.style.background = "aliceblue";
    btn1.style.background = "transparent";
    btn3.style.background = "transparent";
  }
  btn5.onclick = function() {
    slider.style.marginLeft = "-400%";
    this.style.background = "aliceblue";
    btn1.style.background = "transparent";
    btn3.style.background = "transparent";
  }
  btn6.onclick = function() {
    slider.style.marginLeft = "-500%";
    this.style.background = "aliceblue";
    btn1.style.background = "transparent";
    btn3.style.background = "transparent";
  }
</script>

<!-- This inserts the footer -->
<?php include('config/footer.php') ?>
<!-- Do not add any content below this line. -->