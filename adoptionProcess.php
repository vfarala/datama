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
    <link rel="stylesheet" href="adoptionProcess.css">
    <title>Adoption Process</title>
</head>
<body onload=display_ct();>
<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand fs-1 text-uppercase" id href="#"><img src="petLogo.png" alt="LOGO" id="logo">Pet Adoption</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <!-- Navbar -->
    <div class="sidebar offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <!-- Sidebar Header -->
        <div class="offcanvas-header text-white border-bottom">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item d-flex flex-column" style="display: inline-flex; justify-content: center; align-items: right;">
                    <span style="padding-right: 15px;" class="fs-3">Welcome, <?php echo isset($_SESSION['email']) ? ucfirst($_SESSION['email']) : 'User'; ?></span>
                    <span id='ct7' style="background-color: none"></span>
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
                        <li><a class="dropdown-item" href="account.php"><i class="fas fa-sliders-h fa-fw"></i> Account</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog fa-fw"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a></li>
                      </ul>
                </li>
            </ul>
        </div>
      </div>
    </div>
  </nav>

    <!-- JS for live clock and date -->
    <script>
    function display_ct7() {
        var x = new Date()
        var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
        hours = x.getHours( ) % 12;
        hours = hours ? hours : 12;
        hours = hours.toString().length==1? 0+hours.toString() : hours;
    
        var minutes=x.getMinutes().toString()
        minutes=minutes.length==1 ? 0+minutes : minutes;
    
        var seconds=x.getSeconds().toString()
        seconds=seconds.length==1 ? 0+seconds : seconds;
    
        var month=(x.getMonth() +1).toString();
        month=month.length==1 ? 0+month : month;
    
        var dt=x.getDate().toString();
        dt=dt.length==1 ? 0+dt : dt;
    
        var x1=month + "/" + dt + "/" + x.getFullYear(); 
        x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
        document.getElementById('ct7').innerHTML = x1;
        display_c7();
    }

    function display_c7(){
        var refresh=1000; // Refresh rate in milli seconds
        mytime=setTimeout('display_ct7()',refresh)
    }
    
    display_c7()
    </script>


    <!-- JS for profile pic drop down, to account, settings, and logout -->
    <script>
    document.querySelectorAll('.dropdown-toggle').forEach(item => {
        item.addEventListener('click', event => {
        
            if(event.target.classList.contains('dropdown-toggle') ){
            event.target.classList.toggle('toggle-change');
            }
            else if(event.target.parentElement.classList.contains('dropdown-toggle')){
            event.target.parentElement.classList.toggle('toggle-change');
            }
        })
    });
    </script>


    <!-- Sidenav -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 sidenav">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 sidebar-panel">
                    
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="home.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="adoptionProcess.php" class="nav-link align-middle px-0 active">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Adoption Process</span> </a>    
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Available Pets</span></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">About Us</span></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Contact Us</span></a>
                        </li>
                        
                    </ul>
                    
                </div>
            </div>
            <div class="col content">

                <!-- Content for Adoption Process -->
                <div class="container">
                    <header>
                        <h3>Adoption Process</h3>
                        <nav aria-label="breadcrumb" class="bg-transparent">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Adoption Process</a></li>
                              <li class="breadcrumb-item"><a href="#1b">Transaction Form</a></li>
                            </ol>
                          </nav>
                    </header>
                </div>
                <div id="exTab3" class="container">    
                    <ul class="nav nav-pills" style="text-align: center;">
                        <li>
                            <a href="#1b" data-toggle="tab">Transaction Form</a>
                        </li>
                        <li>
                            <a href="#2b" data-toggle="tab">Transaction History</a>
                        </li>
                    </ul>

                    <div class="tab-content clearfix bg-transparent">
			                   
                        <div class="tab-pane" id="1b">
                            <h1>Transaction Form</h1>
                            
                            <p>We applied clearfix to the tab-content to rid of the gap between the tab and the content</p>
                        </div>
                        <div class="tab-pane" id="2b">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi quis sunt fugit illum, quod dolorem impedit dolore aperiam reprehenderit eius quae, voluptatum perferendis excepturi minima officiis veniam maiores ducimus? Molestias.</p>
                        </div>
                        
                    </div>
                </div>



            </div>

            
        </div>
    </div>

    
    
  

</body>

<!-- JS for date picker -->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</html>