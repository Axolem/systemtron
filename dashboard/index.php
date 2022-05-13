<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
   header("location: ../login.php");
   exit;
} else {
   include('handlers/connection.php');

   $sql = "SELECT  `id`, `first_name`, `last_name`, `email`, `picture`, `created_at`, `modified_at`, `ethnic_group`, 
   `emplopment_status`, `phone`, `gender`, `code`, `verified` FROM users WHERE email = '" . $_SESSION['username'] . "'";
   $result = $con->query($sql);

   if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
         $id = $row['id'];
         $name = $row['first_name'];
         $surname = $row['last_name'];
         $email = $row['email'];
         $phone = $row['phone'];
         $color = '';
         $gender = '';
         $status = $row['emplopment_status'];
         $picture = $row['picture'];
         $phoneNotes = 'yes';
         $emailNotes = 'no';
         $newsLetters = 'yes';
         $_SESSION['user_id'] = $id;
      }
   }
}
include('../config/header.php')
?>
<main class="dash">
   <div class="dash-row">
      <div class="dash-brand">
         B.O.B
      </div>
      <div class="dash-links">
         <img src="<?php if (!empty($picture)) {
                        echo $picture;
                     } else {
                        echo 'person.svg';
                     }
                     ?> " class="dash-icon">
         <p class="dash-user-name"><?php echo $name . " " . $surname; ?></p>
         <a href="logout.php" class="dash-btn"><i class="bi bi-box-arrow-right"></i>
         </a>
      </div>
   </div>

   <div class="dash-container">
      <div class="tabs">
         <button class="tablink" onclick="openPage('Home', this, 'green')">Home</button>
         <button class="tablink" onclick="openPage('Tools', this, 'green')">Tools</button>
         <button class="tablink" onclick="openPage('Settings', this, 'green')" id="defaultOpen">Settings</button>
      </div>
      <!----------------------------------------------------------------------------------------------------------------
                                 Home
----------------------------------------------------------------------------->
      <div id="Home" class="tabcontent">
         <!-- <h2 class="dash-h2">Home</h2> -->


         <div class="home">
            <!--------------- Start ---------------------->
            <div class="options-wrapper">
               <div class="options-h2">
                  <h2>Starting up<i class="bi bi-play"></i></h2>
               </div>

               <div class="home-main-options">
                  <button class="toggler">
                     <h3 class="dash-h3">Starting a business</h3>
                     <i class="bi bi-plus dash-option-icon"></i>
                  </button>
                  <div class="home-options">
                     <ul class="card-wrapper">
                        <li class="dash-card">
                           <img src='https://images.unsplash.com/photo-1611916656173-875e4277bea6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHw&ixlib=rb-1.2.1&q=80&w=400' alt=''>
                           <h3><a href="https://www.doingbusiness.org.za/doing-business/doing-business-indicators/starting-a-business-indicator/">Starting a Business in SA</a></h3>
                           <p>Doing Business first indicator is Starting a Business. This indicator deals with the number of procedures, time taken and associated costs for starting and operating a business. </p>
                        </li>
                        <li class="dash-card">
                           <img src='https://images.unsplash.com/photo-1474631245212-32dc3c8310c6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YnVzaW5lc3MlMjBpZGVhfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60' alt=''>
                           <h3><a href="">Need a Business Idea?</a></h3>
                           <p>To start one of these home-based businesses, you don't need a lot of funding -- just energy, passion and the drive to succeed.</p>
                        </li>
                        <li class="dash-card">
                           <h3>Read about other startups</h3>
                           <ul class="left-text">
                              <li> <a href="">Discover the top and
                                    emerging startups in Africa</a></li>
                              <li><a href="https://startupstash.com/south-african-startups/">Top South African Startups</a></li>
                              <li><a href="https://airtable.com/shrt9eZsu6AFiMTdW/tblNzQ5j2JhhdJzl0/viw49GMri4nh6h5K3">Funding</a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>


                  <button class="toggler">
                     <h3 class="dash-h3">Ask a mentor</h3>
                     <i class="bi bi-plus dash-option-icon"></i>
                  </button>
                  <div class="home-options">
                     <ul class="card-wrapper">
                        <li class="dash-card">
                           <img src='https://smallbusinesscoach.co.za/wp-content/uploads/2022/03/Small-Business-Coach-Slider-1-scaled.jpg' alt=''>
                           <h3><a href="https://smallbusinesscoach.co.za/start-up-business-coaching/">Start-up Business Coaching</a></h3>
                           <p>IMCSA Accredited Business Coaches (IMC737) to Coach You on Growing Your Start-up to the Next Level</p>
                        </li>
                        <li class="dash-card">
                           <img src='https://vusithembekwayo.com/wp-content/uploads/2019/04/vusi-img-12.png' alt=''>
                           <h3><a href="https://vtonlineshop.com/products/leadership-course">Leadership & Management Courses</a></h3>
                           <p>Many of you have asked that I mentor you. Well, I listened and present you one up… </p>
                        </li>
                        <li class="dash-card">
                           <img src='https://images.unsplash.com/photo-1613230485186-2e7e0fca1253?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHw&ixlib=rb-1.2.1&q=80&w=400' alt=''>
                           <h3><a href="https://intro.co/entrepreneur">More mentors and experts</a></h3>
                           <p>Book world class experts and get 1:1 advice over a video call</p>
                        </li>
                     </ul>
                  </div>


                  <button class="toggler">
                     <h3 class="dash-h3">Elevator pitch</h3>
                     <i class="bi bi-plus dash-option-icon"></i>
                  </button>
                  <div class="home-options">
                     <ul class="card-wrapper">
                        <!-- <li class="dash-card">
                           <h3>Your 30 Second Elevator Pitch! </h3>
                           <iframe width="100%" height="auto" src="https://www.youtube.com/embed/Lb0Yz_5ZYzI" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                           <a href="https://www.youtube.com/embed/Lb0Yz_5ZYzI">Watch on youtube</a>
                        </li>
                        <li class="dash-card">
                           <h3>The Perfect Elevator Pitch</h3>
                           <iframe width="100%" height="auto" src="https://www.youtube.com/embed/r-iETptU7JY" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                           <a href="https://www.youtube.com/embed/r-iETptU7JY">Watch on youtube</a>
                        </li>
                        <li class="dash-card">
                           <img src='https://images.unsplash.com/photo-1556453903-3c0d9dcd09d0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80' alt=''>
                           <h3><a href="https://blog.hubspot.com/sales/elevator-pitch-examples">Lear more about elevator pitch</a></h3>
                           <p>An elevator pitch — also known as elevator speech — can better introduce professionals to your company.</p>
                        </li> -->
                     </ul>
                  </div>
               </div>

               <!--------------- Grow ---------------------->

               <div class="options-wrapper">
                  <div class="options-h2">
                     <h2>Growing a business<i class="bi bi-graph-up-arrow"></i></h2>
                  </div>
                  <div class="home-main-options">
                     <button class="toggler">
                        <h3 class="dash-h3">Growth strategies</h3>
                        <i class="bi bi-plus dash-option-icon"></i>
                     </button>
                     <div class="home-options">
                        <p>Lorem ipsum dolor sit am fuga aucorporis consequuntur!</p>
                     </div>


                     <button class="toggler">
                        <h3 class="dash-h3">Sales</h3>
                        <i class="bi bi-plus dash-option-icon"></i>
                     </button>
                     <div class="home-options">
                        <ul class="card-wrapper">
                           <!-- <li class="dash-card">
                              <h3>A Super Wonderful Headline</h3>
                              <iframe width="100%" height="auto" src="https://www.youtube.com/embed/SBF0nZ_Kfag" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              <a href="">Watch on youtube</a>
                           </li>
                           <li class="dash-card">
                              <h3>A Super Wonderful Headline</h3>
                              <iframe width="100%" height="auto" src="https://www.youtube.com/embed/SBF0nZ_Kfag" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              <a href="">Watch on youtube</a>
                           </li>
                           <li class="dash-card">
                              <h3>A Super Wonderful Headline</h3>
                              <iframe width="100%" height="auto" src="https://www.youtube.com/embed/SBF0nZ_Kfag" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              <a href="">Watch on youtube</a>
                           </li>
                           <li class="dash-card">
                              <h3>A Super Wonderful Headline</h3>
                              <iframe width="100%" height="auto" src="https://www.youtube.com/embed/SBF0nZ_Kfag" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              <a href="">Watch on youtube</a>
                           </li> -->
                        </ul>
                     </div>


                     <button class="toggler">
                        <h3 class="dash-h3">Marketing a business</h3>
                        <i class="bi bi-plus dash-option-icon"></i>
                     </button>
                     <div class="home-options">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ut adipisci, rerum beatae tenetur nostrum amet odio quibusdam fuga autem impedit sequi cupiditate iste dolor excepturi dolorum tempore corporis consequuntur!</p>
                     </div>
                  </div>
               </div>

               <!--------------- Franchise ---------------------->

               <div class="options-wrapper">
                  <div class="options-h2">
                     <h2>Franchise<i class="bi bi-shop"></i></h2>
                  </div>
                  <ul class="card-wrapper">
                     <li class="dash-card">
                        <h3>A Super Wonderful Headline</h3>
                        <iframe width="100%" height="auto" src="ht.com/embed/SBF0nZ_Kfag" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <a href="">Watch on youtube</a>
                     </li>
                     <li class="dash-card">
                        <h3>A Super Wonderful Headline</h3>
                        <iframe width="100%" height="auto" src="httpcom/embed/SBF0nZ_Kfag" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <a href="">Watch on youtube</a>
                     </li>
                     <li class="dash-card">
                        <img src='https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80' alt=''>
                        <h3><a href="https://www.franchisedirect.co.za/the-ultimate-guide-franchising-in-south-africa/">Guide to franchising in SA</a></h3>
                        <p>In this day and age, numerous organizations are prime contender for franchising, paying little mind to their size. </p>
                     </li>
                  </ul>
               </div>

            </div>
         </div>
      </div>
      <!----------------------------------------------------------------------------------------------------------------
                                 Tools
----------------------------------------------------------------------------->
      <div id="Tools" class="tabcontent">
         <h2 class="dash-h2">Tools</h2>
         <div class="tools">
            <div class="row">
               <div class="card__">
                  <div class="card__content">

                     <div class="card__front">
                        <h3 class="card__title">Making A Logo</h3>
                        <p class="card__subtitle">Hover to see more!</p>
                     </div>

                     <div class="card__back">
                        <h4>Making A Logo</h4>
                        <ul class="card__body">
                           <li><a href="https://www.logaster.com/" target="_blank">logaster</a></li>
                           <li><a href="http://www.hipsterlogogenerator.com/" target="_blank">hipster logo generator</a></li>
                           <li><a href="http://www.squarespace.com/logo/" target="_blank">square space</a></li>
                           <li><a href="http://signature-maker.net/" target="_blank">signature maker</a></li>
                           <li><a href="https://www.canva.com/" target="_blank">Canva</Canvas></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card__">
                  <div class="card__content">

                     <div class="card__front">
                        <h3 class="card__title">generating invoices</h3>
                        <p class="card__subtitle">Hover to see more!</p>
                     </div>

                     <div class="card__back">
                        <h4>generating invoices</h4>
                        <ul class="card__body">
                           <li><a href="http://invoiceto.me/" target="_blank">invoice to me</a></li>
                           <li><a href="https://www.free-invoice-generator.com/" target="_blank">free invoice generator</a></li>
                           <li><a href="http://slimvoice.co/" target="_blank">slimvoice</a></li>
                           <li><a href="https://www.waveapps.com/" target="_blank">Wave</a></li>
                           <li><a href="http://invoice.to/" target="_blank">invoice.to</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card__">
                  <div class="card__content">

                     <div class="card__front">
                        <h3 class="card__title">Build a website</h3>
                        <p class="card__subtitle">Hover to see more!</p>
                     </div>

                     <div class="card__back">
                        <h4>Build a website</h4>
                        <ul class="card__body">
                           <li><a href="http://html5up.net/" target="_blank">HTML templates</a></li>
                           <li><a href="https://wordpress.org/" target="_blank">wordpress</a></li>
                           <li><a href="https://https://www.shopify.com/" target="_blank">shopify</a></li>
                           <li><a href="http://www.landingharbor.com/" target="_blank">Landing habor</a></li>
                           <li><a href="https://www.000webhost.com/" target="_blank">website hosting</a></li>
                           <li><a href="https://unsplash.com/" target="_blank">Images</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card__">
                  <div class="card__content">

                     <div class="card__front">
                        <h3 class="card__title">SEO</h3>
                        <p class="card__subtitle">Hover to see more!</p>
                     </div>

                     <div class="card__back">
                        <h4>SEo</h4>
                        <ul class="card__body">
                           <li><a href="http://seositecheckup.com/" target="_blank">seo site checkup</a></li>
                           <li><a href="http://www.similarweb.com/" target="_blank">similarweb</a></li>
                           <li><a href="https://www.xml-sitemaps.com/" target="_blank">sitemap generator</a></li>
                           <li><a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">wordpress seo</a></li>
                           <li><a href="http://www.google.com/analytics" target="_blank">Google analytics</a></li>
                           <li><a href="http://www.browseo.net/" target="_blank">browseo</a></li>
                           <li><a href="http://nibbler.silktide.com/" target="_blank">nibbler - test websites</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="card__">
                  <div class="card__content">

                     <div class="card__front">
                        <h3 class="card__title">emails management</h3>
                        <p class="card__subtitle">Hover to see more!</p>
                     </div>

                     <div class="card__back">
                        <h4>send marketing emails</h4>
                        <ul class="card__body">
                           <li><a href="https://gmass.co/" target="_blank">Gmass</a></li>
                           <li><a href="https://www.hellobar.com/" target="_blank">hellobar</a></li>
                           <li><a href="http://mailchimp.com/" target="_blank">mailchimp</a></li>
                           <li><a href="http://mandrill.com/" target="_blank">manddrill</a></li>
                           <li><a href="https://www.sendinblue.com/" target="_blank">send in blue</a></li>
                           <li><a href="https://www.streak.com/" target="_blank">streak</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card__">
                  <div class="card__content">

                     <div class="card__front">
                        <h3 class="card__title">Legal stuff</h3>
                        <p class="card__subtitle">Hover to see more!</p>
                     </div>

                     <div class="card__back">
                        <h4>legal documents</h4>
                        <ul class="card__body">
                           <li><a href="http://www.500.co/kiss/" target="_blank">kiss</a></li>
                           <li><a href="http://www.docracy.com/" target="_blank">Docracy</a></li>
                           <li><a href="http://www.shakelaw.com/" target="_blank">shake</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card__">
                  <div class="card__content">

                     <div class="card__front">
                        <h3 class="card__title">productivity</h3>
                        <p class="card__subtitle">Hover to see more!</p>
                     </div>

                     <div class="card__back">
                        <h4>Productivity & task management</h4>
                        <ul class="card__body">
                           <li><a href="https://trello.com/" target="_blank">trello</a></li>
                           <li><a href="https://evernote.com/" target="_blank">evernote</a></li>
                           <li><a href="https://www.dropbox.com/" target="_blank">Dropbox</a></li>
                           <li><a href="https://slack.com/" target="_blank">slack</a></li>
                           <li><a href="https://free.gotomeeting.com/" target="_blank">goto mettings - Web meetings</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card__">
                  <div class="card__content">

                     <div class="card__front">
                        <h3 class="card__title">Learn More</h3>
                        <p class="card__subtitle">Hover to see more!</p>
                     </div>

                     <div class="card__back">
                        <h4>Business Courses</h4>
                        <ul class="card__body">
                           <li><a href="https://www.coursera.org/" target="_blank">coursera</a></li>
                           <li><a href="http://startuptalks.tv/" target="_blank">start-up talks</a></li>
                           <li><a href="https://hackdesign.org/" target="_blank">hack design</a></li>
                           <li><a href="https://www.udacity.com/course/ep245" target="_blank">The learn launchpad</a></li>
                           <li><a href="http://rocketship.fm/" target="_blank">rocketship</a></li>
                           <li><a href="http://closedclub.org/" target="_blank">closed club</a></li>
                           <li><a href="http://launchthisyear.com/" target="_blank">launch this year</a></li>
                           <li><a href="http://www.codecademy.com/" target="_blank">codecademy</a></li>
                           <li><a href="http://www.skillshare.com/classes" target="_blank">skillshare</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>


         <h2 class="more-tools-h2">More Tools</h2>
         <div class="tools">
            <div class="more-tools">
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://smetoolkit.ng/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/07/SME-Toolkit.png" alt="" width="65" height="35"></a></div>
                     <div class="more-tools-link"><a href="https://smetoolkit.ng/" target="_blank" rel="noopener noreferrer">SME Toolkit</a></div>
                     <div class="more-tools-p">
                        <p>SME Toolkit provides SMEs with free online key business management information, interactive tools, and training resources to help them flourish</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://www.hellobonsai.com/best-freelance-tools"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/07/Bonsai.png" alt="" width="80" height="29"></a></div>
                     <div class="more-tools-link"><a href="https://www.hellobonsai.com/best-freelance-tools" target="_blank" rel="noopener noreferrer">Bonsai</a></div>
                     <div class="more-tools-p">
                        <p>Bonsai helps freelancers flourish and curates the best freelance tools with over a hundred tools used by 10,000+ top freelancers</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://startuplaunchlist.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/07/Startup-Launch-List.png" alt="" width="167" height="23"></a></div>
                     <div class="more-tools-link"><a href="https://startuplaunchlist.com/" target="_blank" rel="noopener noreferrer">Startup Launch List</a></div>
                     <div class="more-tools-p">
                        <p>This platform helps startups preparing to launch with information by curating articles written by​ ​founders, designers, investors and thought leaders.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://search.google.com/test/mobile-friendly"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/07/Mobile-Friendly-Test-e1564606104850.png" alt="" width="115" height="26"></a></div>
                     <div class="more-tools-link"><a href="https://search.google.com/test/mobile-friendly" target="_blank" rel="noopener noreferrer">Mobile-Friendly Test</a></div>
                     <div class="more-tools-p">
                        <p>This tests how easily visitors can use your page on a mobile device by entering a URL to see scores.</p>
                     </div>
                  </div>
               </div>

               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://neilpatel.com/ubersuggest/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/07/Neil-Patel.png" alt="" width="65" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://neilpatel.com/ubersuggest/" target="_blank" rel="noopener noreferrer">Uber Suggest</a></div>
                     <div class="more-tools-p">
                        <p>Ubersuggest by Neilpatel helps you to easily, faster and better use SEO by simply typing in a domain or keyword.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://www.semrush.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/07/SEMrush.png" alt="" width="80" height="51"></a></div>
                     <div class="more-tools-link"><a href="https://www.semrush.com/" target="_blank" rel="noopener noreferrer">SEMrush</a></div>
                     <div class="more-tools-p">
                        <p>SEMrush is a free conventional marketing digital marketing professionals with unlimited access to analytical data, custom reports and team-based projects</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://www.linode.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/07/linode-hosting.jpg" alt="" width="50" height="30"></a></div>
                     <div class="more-tools-link"><a href="https://www.linode.com/" target="_blank" rel="noopener noreferrer">Linode</a></div>
                     <div class="more-tools-p">
                        <p>A Cloud hosting service that deploys SSD cloud server running with your choice of Linux distro, resources, and node location.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://webflow.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/07/5b03bde0971fdd75d75b5591_webflow-e1563886577971.png" alt="" width="59" height="30"></a></div>
                     <div class="more-tools-link"><a href="https://webflow.com/" target="_blank" rel="noopener noreferrer">Webflow</a></div>
                     <div class="more-tools-p">
                        <p>Webflow helps you to easily design, build, host and launch responsive websites visually while writing clean, semantic code for you.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://imagekit.io/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/05/imagekit.io_.jpg" alt="imagekit.io" width="42" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://imagekit.io/" target="_blank" rel="noopener noreferrer">Imagekit</a></div>
                     <div class="more-tools-p">
                        <p>ImageKit boosts your website performance with its free hosting, real-time image optimization, resizing, cropping and super fast delivery.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://globalinnovation.fund/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/05/Global-Innovation-Fund-Logo.jpg" alt="Global Innovation Fund Logo" width="70" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://globalinnovation.fund/" target="_blank" rel="noopener noreferrer">Global Innovation Fund</a></div>
                     <div class="more-tools-p">
                        <p>Global Innovation Fund invests in social innovations that aim to improve lives and opportunities of millions in the developing world.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://mylaw.ng/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/05/MyLaw-logo-e1559052764355.png" alt="" width="75" height="28"></a></div>
                     <div class="more-tools-link"><a href="https://mylaw.ng/" target="_blank" rel="noopener noreferrer">Mylaw</a></div>
                     <div class="more-tools-p">
                        <p>Mylaw.ng is a digital platform where legal services can be accessed from the comfort of any device in Nigeria.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://invoice-generator.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/05/Invoiced-Logo-.png" alt="Invoiced Logo" width="38" height="38"></a></div>
                     <div class="more-tools-link"><a href="https://invoice-generator.com/" target="_blank" rel="noopener noreferrer">Free Invoice Generator by Invoiced</a></div>
                     <div class="more-tools-p">
                        <p>Make attractive, professional invoices in a single click with the&nbsp;invoice&nbsp;generator for absolutely free. No download required.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://www.slideshare.net/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Linkedin-Slideshare.png" alt="" width="80" height="21"></a></div>
                     <div class="more-tools-link"><span class=""><a href="https://www.slideshare.net/" target="_blank" rel="noopener noreferrer">Slideshare</a></span></div>
                     <div class="more-tools-p">
                        <p>SlideShare&nbsp;offers users the ability to upload and share publicly or privately PowerPoint presentations, Word documents, and Adobe PDF Portfolios.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://whereby.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/0x0.png" alt="" width="42" height="34"></a></div>
                     <div class="more-tools-link"><a href="https://whereby.com/" target="_blank" rel="noopener noreferrer">Whereby</a></div>
                     <div class="more-tools-p">
                        <p>Collaborate from anywhere! Easy video meetings with no downloads or login for guests. Free plan available.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://render.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Render-logo.jpg" alt="" width="42" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://render.com/" target="_blank" rel="noopener noreferrer">Render</a></div>
                     <div class="more-tools-p">
                        <p>Render is a modern cloud provider that makes easy to instantly deploy your code in production. Free plan available.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://designsprintkit.withgoogle.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Design-Sprints-Logo.png" alt="" width="81" height="14"></a></div>
                     <div class="more-tools-link"><a href="https://designsprintkit.withgoogle.com/" target="_blank" rel="noopener noreferrer">Design Sprints</a></div>
                     <div class="more-tools-p">
                        <p>Google’s open-source resource for design leaders, product owners, developers or anyone learning about or running Design Sprints.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://quickbooks.intuit.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/quickbooks-logo.png" alt="" width="42" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://quickbooks.intuit.com/" target="_blank" rel="noopener noreferrer">Quickbooks</a></div>
                     <div class="more-tools-p">
                        <p>QuickBooks is a small business &amp; startup management tool that offers accounting, payroll, payments and time-tracking tools.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://usefyi.com/templates/product-management/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/fyi-logo-1-e1556235045120.jpg" alt="" width="36" height="36"></a></div>
                     <div class="more-tools-link"><a href="https://usefyi.com/templates/product-management/" target="_blank" rel="noopener noreferrer">fyi</a></div>
                     <div class="more-tools-p">
                        <p>High quality templates designed to help product managers save time on their day to day efforts.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://www.eventbrite.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Eventbrite.jpg" alt="" width="42" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://www.eventbrite.com/" target="_blank" rel="noopener noreferrer">Eventbrite</a></div>
                     <div class="more-tools-p">
                        <p>Eventbrite&nbsp;is the world’s largest event technology platform. The service allows users to browse, create, and promote local events.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://techcrunch.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Tech-Crunch-Logo.png" alt="" width="42" height="21"></a></div>
                     <div class="more-tools-link"><a href="https://techcrunch.com/" target="_blank" rel="noopener noreferrer">TechCrunch</a></div>
                     <div class="more-tools-p">
                        <p>TechCrunch&nbsp;is a leading technology media platform dedicated to obsessively profiling startups, reviewing new Internet products, and breaking tech news.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://medium.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Medium-Logo.png" alt="" width="40" height="40"></a></div>
                     <div class="more-tools-link"><a href="https://medium.com/" target="_blank" rel="noopener noreferrer">Medium</a></div>
                     <div class="more-tools-p">
                        <p>A platform to read and write big ideas and important stories. Contribute or find new ideas, startups or fresh thinking.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://ifttt.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/ifttt-logo.png" alt="" width="42" height="23"></a></div>
                     <div class="more-tools-link"><a href="https://ifttt.com/" target="_blank" rel="noopener noreferrer">IFTTT</a></div>
                     <div class="more-tools-p">
                        <p>IFTTT&nbsp;(if this, then that) is the easy, free way to get all your apps and devices working together.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://slidebean.com/business-presentation-templates"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Slidebean-logo.png" alt="" width="42" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://slidebean.com/business-presentation-templates" target="_blank" rel="noopener noreferrer">Slidebean</a></div>
                     <div class="more-tools-p">
                        <p>Get tons of templates, from pitch decks to client proposals, investor updates and company profile templates.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><strong><a href="https://startuptracker.io/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Startup-Tracker.png" alt="" width="42" height="42"></a></strong></div>
                     <div class="more-tools-link"><a href="https://startuptracker.io/" target="_blank" rel="noopener noreferrer">Startup Tracker</a></div>
                     <div class="more-tools-p">
                        <p>Startup Tracker&nbsp;is the startup company search engine.&nbsp;The platform aggregates, crawls and crowdsources startup profiles on-demand.</p>
                     </div>
                  </div>
               </div>

               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://invoice.ng/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/logo-dark-1.png" alt="" width="42" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://invoice.ng/" target="_blank" rel="noopener noreferrer">Invoice.ng</a></div>
                     <div class="more-tools-p">
                        <p>Free online invoicinga and billing software for small business owners and freelancers in Nigeria.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://developers.google.com/training/certification/directory/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Google-Developer-Certification.png" alt="" width="42" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://developers.google.com/training/certification/directory/" target="_blank" rel="noopener noreferrer">Google Developers Certification Directory</a></div>
                     <div class="more-tools-p">
                        <p>A global directory of developers who are certified by the Google Developers Certification team including those within Africa.</p>
                     </div>
                  </div>
               </div>

               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="http://www.eworker.co/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/eWorker-Logo-2.png" alt="" width="90" height="25"></a></div>
                     <div class="more-tools-link"><a href="http://www.eworker.co/" target="_blank" rel="noopener noreferrer">eWorker</a></div>
                     <div class="more-tools-p">
                        <p>Hire remote developers. eWorker provides access to talented and vetted developers in Africa.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://www.accounteer.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Accounteer-Logo.jpg" alt="" width="40" height="40"></a></div>
                     <div class="more-tools-link"><a href="https://www.accounteer.com/" target="_blank" rel="noopener noreferrer">Accounteer</a></div>
                     <div class="more-tools-p">
                        <p>Accounteer is an online software to manage your business finances. You can create digital invoices, keep track of expenses, etc.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://republic.co/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/republic.jpg" alt="" width="42" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://republic.co/" target="_blank" rel="noopener noreferrer">Republic</a></div>
                     <div class="more-tools-p">
                        <p>Be an angel investor. Invest as little as $10 in private startups and earn a return if the startup succeeds.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://vc4a.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/VC4A-logo.png" alt="" width="42" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://vc4a.com/" target="_blank" rel="noopener noreferrer">VC4A</a></div>
                     <div class="more-tools-p">
                        <p>VC4A is connecting startup entrepreneurs with the knowledge, support programs, mentors and investors they require to succeed.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://www.hubspot.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Hubspot.png" alt="" width="42" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://www.hubspot.com/" target="_blank" rel="noopener noreferrer">HubSpot</a></div>
                     <div class="more-tools-p">
                        <p>HubSpot offers a full platform of marketing, sales, customer service, and CRM software — free plan available.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://moz.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/moz.png" alt="" width="42" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://moz.com/" target="_blank" rel="noopener noreferrer">MOZ</a></div>
                     <div class="more-tools-p">
                        <p>Drive customers to your website With the all-in-one SEO tracking and research toolset built by industry experts.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><strong><a href="https://hootsuite.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/production_Logo__2__so2twv.png" alt="" width="42" height="42"></a></strong></div>
                     <div class="more-tools-link"><a href="https://hootsuite.com/" target="_blank" rel="noopener noreferrer">Hootsuite</a></div>
                     <div class="more-tools-p">
                        <p>Hootsuite lets you manage your social media account easily from a central platform. Free plan available.</p>
                     </div>
                  </div>
               </div>
               <div class="more-tools-container">
                  <div class="more-tools-wapper">
                     <div><a href="https://buffer.com/"><img class="tools-icons" src="https://startupplug.com.ng/wp-content/uploads/2019/04/Buffer-Logo-1.png" alt="" width="67" height="42"></a></div>
                     <div class="more-tools-link"><a href="https://buffer.com/" target="_blank" rel="noopener noreferrer">Buffer</a></div>
                     <div class="more-tools-p">
                        <p>Buffer makes it easy for businesses and marketing teams to schedule posts, analyze performance, and manage all their accounts.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!----------------------------------------------------------------------------------------------------------------
                                 SETTINGS
----------------------------------------------------------------------------->
      <div id="Settings" class="tabcontent">
         <h2 class="dash-h2">Settings </h2>
         <span> <?php if(isset($_Get['response'])){
            if($_Get['response']==1){
               echo $_GET['msg'];}
            else{echo $_GET['msg'];
         }} ?></span>
         <div class="img-holder">
            <img src="<?php if (!empty($picture)) {
                           echo $picture;
                        } else {
                           echo 'person.svg';
                        }
                        ?> " class="dash-image">
            <form action="handlers/imageUpload.php" method="post" enctype="multipart/form-data">
               <input type="file" id="upload" name='image' hidden />
               <label id="upload-label" for="upload">Choose file</label> <br>
               <button class="dash-btn green" name="uploadfile" type="submit">Upload</button>
            </form>
         </div>


         <div class="personal">
            <h3>Personal details:</h3>
            <form action="handlers/updatePerson.php" method="post">
               <table class="dash-table">
                  <tr>
                     <td><label for="fname">First Name:</label></td>
                     <td><input type="text" name="fname" value="<?php echo $name; ?>"></td>
                  </tr>
                  <tr>
                     <td><label for="lname">Last Name:</label></td>
                     <td><input type="text" name="lname" value="<?php echo $surname; ?>"></td>
                  </tr>
                  <tr>
                     <td><label for="name">Email:</label></td>
                     <td><input type="text" name="email" disabled value="<?php echo $email; ?>"></td>
                  </tr>
                  <tr>
                     <td><label for="name">Phone:</label></td>
                     <td><input type="tel" name="phone" value="<?php if (!empty($phone)) {
                                                                  echo $phone;
                                                               } ?>"></td>
                  </tr>
                  <tr>
                     <td><label for="name">Gender:</label></td>
                     <td> <?php if (!empty($gender)) {
                              echo '<input disabled type="text" name="gender" value="' . $gender . '"></td>';
                           } else {
                              echo ' <select name="gender">
                           <option value="male">Male</option>
                           <option value="female">Female</option>
                           <option value="other">Prefer not to say</option>
                        </select>';
                           } ?></td>
                  </tr>
                  <tr>
                     <td><label for="name">Colour:</label></td>
                     <td> <?php if (!empty($color)) {
                              echo '<input disabled type="text" name="color" value="' . $color . '"></td>';
                           } else {
                              echo ' <select name="color" required value=  >
                           <option value="african">African</option>
                           <option value="coloured">Coloured</option>
                           <option value="white">White</option>
                           <option value="indian">Indian</option>
                           <option value="other">Prefer not to say</option>
                        </select>';
                           } ?>

                     </td>
                  </tr>
                  <tr>
                     <td><label for="name">Employment Status:</label></td>
                     <td><input type="text" name="empStatus" value="<?php if (!empty($status)) {
                                                                        echo $status;
                                                                     } ?>"></td>
                  </tr>

               </table>
               <h3>Notification Preferences:</h3>
               <table class="dash-table">
                  <tr>
                     <td><label for="phoneN">Recieve phone notifications:</label></td>
                     <td><input type="checkbox" name="phoneN" <?php if ($phoneNotes == 'yes') {
                                                                  echo "checked";
                                                               } ?>></td>
                  </tr>
                  <tr>
                     <td><label for="emailN">Recieve email notifications:</label></td>
                     <td><input type="checkbox" name="emailN" <?php if ($emailNotes == 'yes') {
                                                                  echo "checked";
                                                               } ?>></td>
                  </tr>
                  <tr>
                     <td><label for="subcribe">Subscribe to newsletters:</label></td>
                     <td><input type="checkbox" name="newsletters" <?php if ($newsLetters == 'yes') {
                                                                        echo "checked";
                                                                     } ?>></td>
                  </tr>
                  <tr>
                     <td><button class="dash-btn green" name="updatePerson" type="submit">Update!</button></td>
                  </tr>
               </table>
            </form>
            <h3 class="dash-delete">Account Deletion</h3>
            <form class="dash-table" action="handlers/deleteAccount.php" method="POST">
               <table>
                  <tr>
                     <td><label for="email">Confirm Your email:</label></td>
                     <td><input type="email" name="email"></td>
                  </tr>
                  <tr>
                     <p style="font-size: 12px;color: red;">*After successfull account deletion
                        you will be taken to home page. This action can not be reversed!</p>
                  </tr>
                  <tr>
                     <td><button name="delete" class="dash-btn danger" type="submit">Delete!</button></td>
                  </tr>
               </table>
            </form>
         </div>
      </div>
   </div>
</main>
<script src="dash.js"></script>

<?php include('../config/footer.php'); ?>