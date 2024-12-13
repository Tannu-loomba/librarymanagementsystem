
<?php
session_start();


# Database Connection File
include "db_conn.php";

 include "php/func-book.php";
 $books = get_all_books($conn);

// # author helper function
 include "php/func-author.php";
 $authors = get_all_author($conn);

// # Category helper function
 include "php/func-categories.php";
 $categories = get_all_categories($conn);

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library Management System</title>
    <link rel="stylesheet" href="navbar.css" />
    <link rel="stylesheet" href="query/queryform.css" />
    <link rel="stylesheet" href="author-cart3/rec-author.css" />
    <link rel="stylesheet" href="author-cart3/details.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   
     <style>
      


.nav-section.active .nav-links {
  display: flex;
  
}


     </style>
  </head>
  <body>
    <header class="header">
      <div class="logo">Online Book Store</div>
      <form action="search.php"
           method="get" 
           style="width: 100%; max-width: 30rem" class="form-control">
      <div class="search-bar">
        <input type="text" placeholder="Search for books..."   name="key" >
        <button   id="basic-addon2">Search</button>
        </div>
        </form>
      <div class="nav-section">
          <ul class="nav-links">
              <li><a href="index.php">Home</a></li>
              <li><a href="#recommended-container">All Books</a></li>
              <div class="category-dropdown">
                <li class="dropbtn">Categories</li>
                <div class="category-dropdown-content">
                <?php foreach ($categories as $category ) {?>
				  
          <a href="category.php?id=<?=$category['id']?>"
             class="list-group-item list-group-item-action">
             <?=$category['name']?></a>
       <?php }  ?>
                
                 </div>
                 </div>
                 <li><a href="#about-section">About Us</a></li>               
              <li><a href="#whole-card-container">Contact</a></li>
            
          </ul>
      </div>
     
      <div class="auth-buttons">
        <i id="menu-btn" class="fas fa-bars"></i>   
          <div class="dropdown">
          <button class="login-btn" onclick="location.href='#'">Login</button>
          <div class="dropdown-content">
          
              <a href="adminlogin.php"> Admin</a> 
              <a href="login.php" id="login-user"> User</a>
            </div>
          </div>
          <button onclick="location.href='signup.php'">Sign Up</button>
      </div>
  </header>
    <div class="next-section">
      <div class="left-section">
        <h1 style="margin-left: 2vw;">Explore the wide collection of books</h1>
      </div>
      <div class="right-section">
        <img src="images/book-image.png" alt="Library Image" />
       
        <!-- Image of the library goes here -->
      </div>
    </div>
    <div class="containing-whole-content">
    <!-- all books-->
     <div style="color: #000;" id="recommended-container" class="recommended-container">

      <h3 class="heading">All Books</h3>
      <div class="course-recommended-container">
      <?php $count = 0; ?>
    <?php foreach ($books as $book) { ?>
      <div class="box <?= ($count >= 4) ? 'hidden' : ''; ?>">
        <img src="uploads/cover/<?= $book['cover'] ?>" alt="">
        
        <h3><?= $book['title'] ?></h3>
      
        <p>
          <i><b>By:
              <?php foreach ($authors as $author) {
                if ($author['id'] == $book['author_id']) {
                  echo $author['name'];
                  break;
                }
              } ?>
               <i><b>Category:
              <?php foreach ($categories as $category) {
                if ($category['id'] == $book['category_id']) {
                  echo $category['name'];
                  break;
                }
              } ?>
            </b></i>
        </p>
            </b></i><br> 
             <div class="book-details hidden"> 
          <?= $book['description'] ?><br>
         
            </div> 
        <div class="open-dowl-btns">
        <div class="button-container">
          <a class="btn" href="uploads/files/<?= $book['file'] ?>">Download</a>
        <button style="white-space: nowrap;" class="read-more-btn btn">Read More</button>
        </div>
            </div>
      </div>
      <?php $count++; ?>
    <?php } ?>
    <?php if (count($books) > 4) { ?>
    <button id="seeMoreBtn" class="btn-see-more-btn">See More</button>
  <?php } ?>
</div>
      </div>
     
     
    <!-- recommended container -->
    <div class="book-container">

    <h3 class="heading">Recommended Books For Semester Exams</h3>
  
    <div class="course-book-container"></div>
  
  </div>
  <div class="course-container">
  
      <h1 class="heading">Recommended Books For Web Development</h1>
  
      <div class="box-course-container">
  
          <div class="box">
            <img src="image/icon-1.png" alt="">
              <h3>HTML 5</h3>
              <p>Covering all concepts of html</p>
              <a href="pdfs/htmlpdf.pdf" class="btn">Download</a>
          </div>
  
          <div class="box">
              <img src="image/icon-2.png" alt="">
              <h3>CSS 3</h3>
              <p>>Covering all concepts of CSS</p>
              <a href="pdfs/csspdf.pdf" class="btn">Download</a>
          </div>
  
          <div class="box">
              <img src="image/icon-3.png" alt="">
              <h3>JavaScript</h3>
              <p>Covering all concepts of JavaScript</p>
              <a href="pdfs/jsfille.pdf" class="btn">Download</a>
          </div>
  
          <div class="box">
              <img src="image/icon-4.png" alt="">
              <h3>SASS</h3>
              <p></p>
              <a href="pdfs/csspdf.pdf" class="btn">SAAS</a>
          </div>
  
          <div class="box">
              <img src="image/icon-5.png" alt="">
              <h3>MongoDB</h3>
              <p>Covering all concepts of MongoDB </p>
              <a href="pdfs/csspdf.pdf" class="btn">Download</a>
          </div>
  
          <div class="box">
              <img src="image/icon-6.png" alt="">
              <h3>React.js</h3>
              <p>Covering all Concepts of React.js </p>
              <a href="pdfs/reactjs.pdf" class="btn">Download</a>
          </div>
  
      </div>
  
  </div>
    <?php
    // Include the author section
    include 'author-cart3/rec-authors.html'; ?>
    <script src="author-cart3/rec-author.js"></script>
 
 
    
    <?php
    // Include the author section
    include 'aboutsection/about.html'; ?>
    
     <div id="whole-card-container" class="whole-card-container">
      <div class="thanku-card">
        <h2>Thanks For Visiting<br>Click </h2>
        <button ><a href="#footer">Scroll</a></button>
      </div>
      <footer id="footer">
        <div class="col col1">
          <h3>Connect with Us</h3>
          <p>Made by <span style="color: #BA6573;">❤</span>  Developers Team</p>
          <div class="thanku-card-social">
            <a href="https://www.instagram.com/prerna_arora34" target="_blank" class="link"><img src="https://assets.codepen.io/9051928/codepen_1.png" alt="" /></a>
            <a href="https://www.linkedin.com/in/prerna-arora-7ba365283/" target="_blank" class="link"><i class="fa-brands fa-linkedin"></i></a>
            <a href="https://www.youtube.com/channel/UCcC-evGNnSH0Fnz9b8-XooQ" target="_blank" class="link"><img src="https://assets.codepen.io/9051928/youtube_1.png" alt="" /></a>
          </div>
          <p style="color: #818181; font-size: smaller">2024 Prerna Arora</p>
        </div>
        <div class="col col2">
          <p>"Unlock the power of code and creativity with our online book haven, designed to fuel the minds of IT enthusiasts with a plethora of resources and insights."</p><br>
          <p>"Navigate through our virtual library shelves, where the language of technology speaks volumes - empowering IT students to innovate, learn, and conquer."</p>
        </div>
        <div class="col col3">
          <div class="query">
            <form action="submit_query.php" method="post">
              <h1>For Query</h1>
              <label for="Enter your e-mail">E-mail</label>
              <input type="text" name="email">
              <label for="Enter query or description">Query</label>
              <input type="text" name="query">
              <button class="course-btn">submit</button>
            </form>
          </div>
        </div>
        <div class="backdrop"></div>
      </footer>
     </div>
     </div>
     
      
   <script src="recommend.js"></script> 
   <script>
    //  see more button
document.addEventListener("DOMContentLoaded", function () {
  var seeMoreBtn = document.getElementById("seeMoreBtn");
  var hiddenItems = document.querySelectorAll(".box.hidden");

  if (seeMoreBtn) {
    seeMoreBtn.addEventListener("click", function () {
      hiddenItems.forEach(function (item) {
        item.classList.remove("hidden");
      });

      seeMoreBtn.style.display = "none"; // Hide the "See More" button after clicking
    });
  }
});
// Select all read more buttons and book details
const readMoreButtons = document.querySelectorAll('.read-more-btn');
const bookDetails = document.querySelectorAll('.book-details');

// Loop through each read more button and attach event listeners
readMoreButtons.forEach((button, index) => {
    button.addEventListener('click', function() {
        // Toggle the 'hidden' class on the corresponding book details element
        bookDetails[index].classList.toggle('hidden');

        // Change the button text based on the visibility of the corresponding book details
        if (bookDetails[index].classList.contains('hidden')) {
            button.textContent = 'Read More';
        } else {
            button.textContent = 'Read Less';
        }
    });
});
let navbar = document.querySelector('.header .nav-section');
document.querySelector('#menu-btn').onclick = () =>{
  navbar.classList.toggle('active');
  
}
   </script>
  </body>
</html>

             
             
          
