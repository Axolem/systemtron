<?php
// // Initialize the session
// session_start();

// // Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//    header("location: ../login.php");
//    exit;
// } else {
//    include('../config/db_connect.php');

//    $sql = "SELECT  `first_name`, `last_name`, `email`, `picture`, `created_at`, `modified_at`, `ethnic_group`, 
//    `emplopment_status`, `phone`, `gender`, `code`, `verified` FROM users WHERE email = '".$_SESSION['username']."'";
//    $result = $con->query($sql);

//    if ($result->num_rows > 0) {
//       // output data of each row
//       while ($row = $result->fetch_assoc()) {
//          $name = $row['first_name'];
//          $surname =$row['last_name'];
//          $email = $row['email'];
//          $picture = $row['picture'];
//       }
//    }
// }
include('../config/header.php')
?>
<main class="dash">
   <div class="dash-row">
      <div class="dash-brand">
         B.O.B
      </div>
      <div class="dash-links">
         <img src="person.svg" class="dash-icon">
         <p class="dash-user-name">Axole</p>
         <a href="logout.php" class="dash-btn"><i class="bi bi-box-arrow-right"></i></a>
      </div>
   </div>

   <div class="dash-container">
      <div class="tabs">
         <button class="tablink" onclick="openPage('Home', this, 'red')" id="defaultOpen">Home</button>
         <button class="tablink" onclick="openPage('Tools', this, 'green')">Tools</button>
         <button class="tablink" onclick="openPage('Settings', this, 'blue')">Settings</button>
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
                        <li class="dash-card">
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
                        </li>
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
                           </li>
                           <li class="dash-card">
                              <h3>A Super Wonderful Headline</h3>
                              <iframe width="100%" height="auto" src="https://www.youtube.com/embed/SBF0nZ_Kfag" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              <a href="">Watch on youtube</a>
                           </li>
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

         </div>
      </div>
      <!----------------------------------------------------------------------------------------------------------------
                                 SETTINGS
----------------------------------------------------------------------------->
      <div id="Settings" class="tabcontent">
         <h2 class="dash-h2">Settings</h2>
         <div class="img-holder">
            <img src="../images/SomeDudeBlack-01.png" class="dash-image">
            <form action="handlers/imageUpload.php" method="post">
               <input type="file" id="upload" name='image' hidden />
               <label id="upload-label" for="upload">Choose file</label> <br>
               <button class="dash-btn green" name="submit" type="submit">Upload</button>
            </form>
         </div>


         <div class="personal">
            <h3>Personal details:</h3>
            <form action="handlers/updatePerson.php" method="post">
               <table class="dash-table">
                  <tr>
                     <td><label for="fname">First Name:</label></td>
                     <td><input type="text" name="fname"></td>
                  </tr>
                  <tr>
                     <td><label for="lname">Last Name:</label></td>
                     <td><input type="text" name="lname"></td>
                  </tr>
                  <tr>
                     <td><label for="name">Email:</label></td>
                     <td><input type="text" name="email" disabled></td>
                  </tr>
                  <tr>
                     <td><label for="name">Phone:</label></td>
                     <td><input type="tel" name="phone"></td>
                  </tr>
                  <tr>
                     <td><label for="name">Gender:</label></td>
                     <td> <select name="gender" required value=<?php if (!empty($_GET['gender'])) {
                                                                  echo $_GET['gender'];
                                                               } ?>>
                           <option value="male">Male</option>
                           <option value="female">Female</option>
                           <option value="other">Prefer not to say</option>
                        </select></td>
                  </tr>
                  <tr>
                     <td><label for="name">Colour:</label></td>
                     <td><select name="color" required value=<?php if (!empty($_GET['color'])) {
                                                                  echo $_GET['color'];
                                                               } ?>>
                           <option value="african">African</option>
                           <option value="coloured">Coloured</option>
                           <option value="white">White</option>
                           <option value="indian">Indian</option>
                           <option value="other">Prefer not to say</option>
                        </select></td>
                  </tr>
                  <tr>
                     <td><label for="name">Employment Status:</label></td>
                     <td><input type="text" name="empStatus"></td>
                  </tr>

               </table>
               <h3>Notification Preferences:</h3>
               <table class="dash-table">
                  <tr>
                     <td><label for="phoneN">Recieve phone notifications:</label></td>
                     <td><input type="checkbox" name="phoneN"></td>
                  </tr>
                  <tr>
                     <td><label for="emailN">Recieve email notifications:</label></td>
                     <td><input type="checkbox" name="emailN" checked></td>
                  </tr>
                  <tr>
                     <td><label for="subcribe">Subscribe to newsletters:</label></td>
                     <td><input type="checkbox" name="newsletters" checked></td>
                  </tr>
                  <tr>
                     <td><button class="dash-btn green" name="submit" type="submit">Update!</button></td>
                  </tr>
               </table>
            </form>
            <h3 class="dash-delete">Account Deletion</h3>
            <form class="dash-table" action="handlers/deleteAccount.php" method="post">
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
                     <td><button name="submit" class="dash-btn danger" type="submit">Delete!</button></td>
                  </tr>
               </table>
            </form>
         </div>
      </div>
   </div>
</main>
<script src="dash.js"></script>



<?php include('../config/footer.php'); ?>