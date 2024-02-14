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
    <link rel="stylesheet" href="availablePetsClient.css">
    <title>Available Pets</title>
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
<body onload=display_ct(); style = "Overflow-X: hidden;">
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
      <a class="nav-link text-white active fs-5 text-center" href="availablePetsClient.php">Available Pets</a>
      <a class="nav-link text-white fs-5 text-center" href="aboutUs.php">About Us</a>
      <a class="nav-link text-white fs-5 text-center" href="contactUs.php">Contact Us</a>
    </nav> 

    <!-- Content for Home -->
    <div class="container" style="background: #5CE1E6;">
    
        <header>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="fw-bold">Available Pets</h3>
                <h4 class="fw-bold text-white">Pet Availables</h4>
            </div>                       
            <nav aria-label="breadcrumb" class="bg-transparent">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">Client</a></li>
                    <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">Main Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">Available Pets</a></li>
                </ol>
              </nav>
            
        </header>
        
        <div class="container"  style="padding: 10px;">
            <div class="row justify-content-center mt-4">
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="input-group rounded">
                    
                        <div class="input-group">
                        
                            <span class="input-group-text" id="search-addon" style="height: 40px;">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" style="height: 40px;" />
                            <button class="btn btn-primary rounded-end" type="button" id="search-button" style="margin-top: 0; height: 40px;">Search</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected disabled>Species</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                        <option value="6">Six</option>
                        <option value="7">Seven</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected disabled>Breed</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                        <option value="6">Six</option>
                        <option value="7">Seven</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="laman p-4">
            <div class="laman-container">

                <h1 class="fw-bold text-white">Dogs</h1>
                <div class="slider-wrapper">
                    <button id="prev-slide" class="slide-button material-symbols-rounded" style="z-index: 1;">chevron_left</button>

                    <div class="image-list">
                        
                        <a href="home.php" class="image-link" data-info="Corgi">
                            <img src="corgi.png" alt="corgi" class="image-item" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>
                        <a href="#" class="image-link" data-info="Golden Retriever">
                            <img src="golden.png" alt="golden" class="image-item" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>
                        <a href="#" class="image-link" data-info="Great Dane">
                            <img src="greatdane.png" alt="greatdane" class="image-item" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>
                        <a href="#" class="image-link" data-info="Labrador">
                            <img src="labrador.png" alt="labrador" class="image-item" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>
                        <a href="#" class="image-link" data-info="Pug">
                            <img src="pug.png" alt="pug" class="image-item" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>
                        <a href="#" class="image-link" data-info="Shih Tzu">
                            <img src="shihtzu.png" alt="shihtzu" class="image-item" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>

                    </div>

                    <button id="next-slide" class="slide-button material-symbols-rounded">chevron_right</button>
                </div>
                
                <div class="slider-scrollbar">
                    <div class="scrollbar-track">
                        <div class="scrollbar-thumb">

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Cat Slider -->
        <div class="laman">
            <div class="laman-container">

                <h1 class="fw-bold text-white">Cats</h1>
                <div class="slider-wrapper-cat">
                    <button id="prev-slide-cat" class="slide-button-cat material-symbols-rounded" style="z-index: 1;">chevron_left</button>

                    <div class="image-list-cat">
                        <a href="#" class="image-link" data-info="persian">
                            <img src="persian.png" alt="persian" class="image-item-cat" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>

                        <a href="#" class="image-link" data-info="persian">
                            <img src="siamese.png" alt="siamese" class="image-item-cat" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>

                        <a href="#" class="image-link" data-info="persian">
                            <img src="mainecoon.png" alt="mainecoon" class="image-item-cat" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>

                        <a href="#" class="image-link" data-info="persian">
                            <img src="ragdoll.png" alt="ragdoll" class="image-item-cat" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>

                        <a href="#" class="image-link" data-info="persian">
                            <img src="bengal.png" alt="bengal" class="image-item-cat" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>

                        <a href="#" class="image-link" data-info="persian">
                            <img src="sphynx.png" alt="sphynx" class="image-item-cat" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>
                                
                    </div>

                    <button id="next-slide-cat" class="slide-button-cat material-symbols-rounded">chevron_right</button>
                </div>

                <div class="slider-scrollbar-cat">
                    <div class="scrollbar-track-cat">
                        <div class="scrollbar-thumb-cat"></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bird Slider -->
        <div class="laman">
            <div class="laman-container">

                <h1 class="fw-bold text-white">Birds</h1>
                <div class="slider-wrapper-bird">
                    <button id="prev-slide-bird" class="slide-button-bird material-symbols-rounded" style="z-index: 1;">chevron_left</button>

                    <div class="image-list-bird">
                        <a href="#" class="image-link" data-info="persian">
                            <img src="parrot.png" alt="parrot" class="image-item-bird" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>

                        <a href="#" class="image-link" data-info="persian">
                            <img src="canary.png" alt="canary" class="image-item-bird" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>
                        
                        <a href="#" class="image-link" data-info="persian">
                            <img src="owl.png" alt="owl" class="image-item-bird" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>
                        
                        <a href="#" class="image-link" data-info="persian">
                            <img src="lovebird.png" alt="eagle" class="image-item-bird" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>
                        
                        <a href="#" class="image-link" data-info="persian">
                            <img src="hummingbird.png" alt="hummingbird" class="image-item-bird" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>

                        <a href="#" class="image-link" data-info="persian">
                            <img src="duck.png" alt="penguin" class="image-item-bird" style="border-radius: 20px;">
                            <div class="hover-text">View More</div>
                        </a>

                        
                        
                    </div>

                    <button id="next-slide-bird" class="slide-button-bird material-symbols-rounded">chevron_right</button>
                </div>

                <div class="slider-scrollbar-bird">
                    <div class="scrollbar-track-bird">
                        <div class="scrollbar-thumb-bird"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
                
                
</body>

<!-- JS for date picker -->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!-- JS for dog slider -->
<script src="dogslider.js"></script>

<!-- JS for cat slider -->
<script src="catslider.js">
    
</script>

<!-- JS for bird slider -->
<script src="birdslider.js"></script>

<!-- JS for live clock and date -->
<script src="liveclock.js"></script>


<!-- JS for profile pic drop down, to account, settings, and logout -->
<script src="account-dropdown"></script>


</html>