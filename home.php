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
    <link rel="stylesheet" href="home.css">
    <title>Main Dashboard</title>
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
      <a class="nav-link text-white active fs-5 text-center" href="home.php">Home</a>
      <a class="nav-link text-white fs-5 text-center" href="availablePetsClient.php">Available Pets</a>
      <a class="nav-link text-white fs-5 text-center" href="aboutUs.php">About Us</a>
      <a class="nav-link text-white fs-5 text-center" href="contactUs.php">Contact Us</a>
    </nav>

    <!-- Content for Home -->
    <div class="container">
        <header>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="fw-bold">Home</h3>
                <h4 class="fw-bold text-white">Pet Availables</h4>
            </div>                       
            <nav aria-label="breadcrumb" class="bg-transparent">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">Client</a></li>
                  <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">Main Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">Home</a></li>
                </ol>
              </nav>
            
        </header>



        <div class="row row-cols-3 gx-2 p-4" style="background: #5CE1E6;">
            <div class="col">
              <div class="card">
                <img src="golden.png" class="card-img-top" alt="Hollywood Sign on The Hill">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-center fs-2">Mimzy</h5>
                    <table class="table">
                        <tbody>
                          <tr>
                            <th scope="row">Species</th>
                            <td>Canis lupus</td>
                          </tr>
                          <tr>
                            <th scope="row">Breed</th>
                            <td>Golden Retriever</td>
                          </tr>
                          <tr>
                            <th scope="row">Condition</th>
                            <td>Good Condition</td>
                          </tr>
                          <tr>
                            <th scope="row">Age</th>
                            <td>3 months old</td>
                          </tr>
                          <tr>
                            <th scope="row">Height</th>
                            <td>58 cm</td>
                          </tr>
                          <tr>
                            <th scope="row">Weight</th>
                            <td>1 kg</td>
                          </tr>
                          <tr>
                            <th scope="row">Gender</th>
                            <td>Female</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="labrador.png" class="card-img-top" alt="Palm Springs Road">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-center fs-2">Stolas</h5>
                    <table class="table">
                        <tbody>
                          <tr>
                            <th scope="row">Species</th>
                            <td>Canis lupus</td>
                          </tr>
                          <tr>
                            <th scope="row">Breed</th>
                            <td>Labrador Retriever</td>
                          </tr>
                          <tr>
                            <th scope="row">Condition</th>
                            <td>Good Condition</td>
                          </tr>
                          <tr>
                            <th scope="row">Age</th>
                            <td>2 years old</td>
                          </tr>
                          <tr>
                            <th scope="row">Height</th>
                            <td>57 cm</td>
                          </tr>
                          <tr>
                            <th scope="row">Weight</th>
                            <td>30 kg</td>
                          </tr>
                          <tr>
                            <th scope="row">Gender</th>
                            <td>Male</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="corgi.png" class="card-img-top" alt="Los Angeles Skyscrapers">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-center fs-2">Angel</h5>
                    <table class="table">
                        <tbody>
                          <tr>
                            <th scope="row">Species</th>
                            <td>Canis lupus</td>
                          </tr>
                          <tr>
                            <th scope="row">Breed</th>
                            <td>Pembroke Welsh Corgi</td>
                          </tr>
                          <tr>
                            <th scope="row">Condition</th>
                            <td>Good Condition</td>
                          </tr>
                          <tr>
                            <th scope="row">Age</th>
                            <td>3 years old</td>
                          </tr>
                          <tr>
                            <th scope="row">Height</th>
                            <td>30 cm</td>
                          </tr>
                          <tr>
                            <th scope="row">Weight</th>
                            <td>14 kg</td>
                          </tr>
                          <tr>
                            <th scope="row">Gender</th>
                            <td>Male</td>
                          </tr>
                        </tbody>
                      </table>
                      
                </div>
                  
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="shihtzu.png" class="card-img-top" alt="Skyscrapers">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-center fs-2">Niffty</h5>
                    <table class="table">
                        <tbody>
                          <tr>
                            <th scope="row">Species</th>
                            <td>Canis lupus</td>
                          </tr>
                          <tr>
                            <th scope="row">Breed</th>
                            <td>Shih Tzu</td>
                          </tr>
                          <tr>
                            <th scope="row">Condition</th>
                            <td>Good Condition</td>
                          </tr>
                          <tr>
                            <th scope="row">Age</th>
                            <td>3 years old</td>
                          </tr>
                          <tr>
                            <th scope="row">Height</th>
                            <td>24 cm</td>
                          </tr>
                          <tr>
                            <th scope="row">Weight</th>
                            <td>6 kg</td>
                          </tr>
                          <tr>
                            <th scope="row">Gender</th>
                            <td>Female</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="greatdane.png" class="card-img-top" alt="Skyscrapers">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-center fs-2">Blitz</h5>
                    <table class="table">
                        <tbody>
                          <tr>
                            <th scope="row">Species</th>
                            <td>Canis lupus</td>
                          </tr>
                          <tr>
                            <th scope="row">Breed</th>
                            <td>Great Dane</td>
                          </tr>
                          <tr>
                            <th scope="row">Condition</th>
                            <td>Good Condition</td>
                          </tr>
                          <tr>
                            <th scope="row">Age</th>
                            <td>3 years old</td>
                          </tr>
                          <tr>
                            <th scope="row">Height</th>
                            <td>108 cm</td>
                          </tr>
                          <tr>
                            <th scope="row">Weight</th>
                            <td>70 kg</td>
                          </tr>
                          <tr>
                            <th scope="row">Gender</th>
                            <td>Male</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="pug.png" class="card-img-top" alt="Skyscrapers">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-center fs-2">Alastor</h5>
                    <table class="table">
                        <tbody>
                          <tr>
                            <th scope="row">Species</th>
                            <td>Canis lupus</td>
                          </tr>
                          <tr>
                            <th scope="row">Breed</th>
                            <td>Pug</td>
                          </tr>
                          <tr>
                            <th scope="row">Condition</th>
                            <td>Good Condition</td>
                          </tr>
                          <tr>
                            <th scope="row">Age</th>
                            <td>3 years old</td>
                          </tr>
                          <tr>
                            <th scope="row">Height</th>
                            <td>33 cm</td>
                          </tr>
                          <tr>
                            <th scope="row">Weight</th>
                            <td>8 kg</td>
                          </tr>
                          <tr>
                            <th scope="row">Gender</th>
                            <td>Male</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
          </div>

          




    </div>
                
                
</body>

<!-- JS for live clock and date -->
<script src="liveclock.js"></script>


<!-- JS for profile pic drop down, to account, settings, and logout -->
<script src="account-dropdown"></script>

</html>