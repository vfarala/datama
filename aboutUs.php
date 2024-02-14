<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>

    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">  
    <link rel="stylesheet" href="aboutUs.css">
    <title>About Us</title>
</head>
<style>
  nav > a {
    border-radius: 5px;
    margin: 10px;
    width: 170px !important;
  }

  nav > a:hover {
      color: black !important;
      font-weight: bold;
      background: #30AFB4;
  }

  nav > .active {
      color: black !important;
      font-weight: bold;
      background: #30AFB4;
  }


</style>
<body onload=display_ct();>
<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand fs-1 text-uppercase" id href="#"><img src="petLogo.png" alt="LOGO" id="logo">Pet Adoption</a>

    <!-- Navbar -->
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item d-flex flex-column" style="display: inline-flex; justify-content: center; align-items: right;">
                    <span style="padding-right: 15px;" class="fs-4 fw-bold text-white">Welcome, <?php echo ucfirst($_SESSION['email']);?></span>
                    <span id='ct7' class="text-white" style="background-color: none"></span>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu"> 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-pic">
                        <img src="https://source.unsplash.com/250x250?girl" alt="Profile Picture">
                    </div>

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="account.php"><i class="fas fa-sliders-h fa-fw"></i>Account</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog fa-fw"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-fw"></i>Log Out</a></li>
                      </ul>
                </li>
            </ul>

    </div>
  </nav>

  <!-- Navigation -->
    <nav class="nav justify-content-center">
      <a class="nav-link text-white fs-5 text-center" href="home.php">Home</a>
      <a class="nav-link text-white fs-5 text-center" href="availablePetsClient.php">Available Pets</a>
      <a class="nav-link text-white active fs-5 text-center" href="aboutUs.php">About Us</a>
      <a class="nav-link text-white fs-5 text-center" href="contactUs.php">Contact Us</a>
    </nav> 

    <!-- Content for Home -->
    <div class="container" style="background: #5CE1E6;">
    
        <header>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="fw-bold">About Us</h3>
            </div>                       
            <nav aria-label="breadcrumb" class="bg-transparent">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">Client</a></li>
                    <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">Main Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">About Us</a></li>
                </ol>
              </nav>
            
        </header>
        
        <div style="background-color: #5CE1E6 !important; padding: 20px;">
            <section id="about" class = "p-4">
                <div class="about-1">
                    <h1>ABOUT US</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit laboriosam velit vel nemo quod ex impedit mollitia, eius harum? Facilis voluptatibus ea quia omnis dolores temporibus, velit ullam odio sed.
                    Culpa ad eius velit non, deserunt accusamus quasi sint eaque exercitationem rem earum architecto aliquid. Delectus illo porro at rem animi. Nulla necessitatibus eveniet aperiam omnis veniam quod unde enim!
                    Dolor in ullam eaque omnis quas nihil aut provident, iure tempore fugiat fugit error labore ad ipsum harum ducimus quos dolorum obcaecati, minus inventore voluptatibus quaerat? Earum debitis dolorum et!
                    Dicta iste sequi numquam, sit minima reiciendis. Illum nemo ducimus quis atque dicta laborum voluptate aliquid ipsam eveniet corporis. Ipsum qui sit voluptates nemo at, dicta est laudantium iure totam.</p>
                </div>
                <div id="about-2">
                    <div class="content-box-lg">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="about-item text-center py-5 rounded-4">
                                        <i class="fa fa-book"></i>
                                        <h3>MISSION</h3>
                                        <hr>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos labore illum explicabo ea natus, officiis excepturi quae necessitatibus veniam culpa nulla, libero laborum dolor atque molestiae pariatur neque modi temporibus.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <div class="about-item text-center py-5 rounded-4">
                                        <i class="fa fa-globe"></i>
                                        <h3>VISION</h3>
                                        <hr>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos labore illum explicabo ea natus, officiis excepturi quae necessitatibus veniam culpa nulla, libero laborum dolor atque molestiae pariatur neque modi temporibus.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="about-item text-center py-5 rounded-4">
                                        <i class="fa fa-pen"></i>
                                        <h3>ACHIEVEMENTS</h3>
                                        <hr>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos labore illum explicabo ea natus, officiis excepturi quae necessitatibus veniam culpa nulla, libero laborum dolor atque molestiae pariatur neque modi temporibus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div>



            </div>
            
        </div>
        <!--
        <footer class="text-center">
            <p>Copyright &copy; 2024 All rights reserved by Pet Adoption</p>
        </footer>  -->
    </div>
    
                
</body>


<!-- JS for live clock and date -->
<script src="liveclock.js"></script>


<!-- JS for profile pic drop down, to account, settings, and logout -->
<script src="account-dropdown"></script>


</html>