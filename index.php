
<?php
 if (isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["usertype"]))  {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $userType = $_POST["usertype"];
   require_once "database.php";
   $sql = "SELECT * FROM users WHERE email = '$email'";
   $result = mysqli_query($conn, $sql);
   $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
   if ($user) {
       if (password_verify($password, $user["PasswordHash"])) {
           session_start();
           $_SESSION["user"] = "yes";
           $_SESSION["email"] = $email;
           
           header("Location: home.php");
           die();
       }else{
        echo "<div class='alert alert-danger'>Password does not match</div>";
       }
   }else{
    echo "<div class='alert alert-danger'>Email does not match</div>";
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Login</title>
</head>

<style>
  #review {
    color: white;
  }

  #review:hover {
    background: #30AFB4;
    color: black;
  }
</style>

<body class="vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-transparent">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand fs-1 text-uppercase" id href="#"><img src="petLogo.png" alt="LOGO" id="logo">Pet Adoption</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Side Bar -->
      <div class="sidebar offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <!-- Sidebar Header -->
        <div class="offcanvas-header text-white border-bottom">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link fs-4" id = "review" aria-current="page" href="#">Reviews</a>
            </li>
        </div>
      </div>
    </div>
  </nav>


  <!-- Login Form -->
  <form action="index.php" method="post" enctype="multipart/form-data">
  <div class="container form-container"  style = "display: flex; justify-content: center; align-items: center;">
    <section>
      <div class="container py-5 h-100">
        <div class="row"> 
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-light text-dark" style="border-radius: 2rem;">
              <div class="card-body p-5 text-center">
    
                <div class="mb-md-5 mt-md-4 text-center">
    
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-dark-50 mb-5">Please enter your email and password</p>

                  <div class="row text-start mb-2">
                    <div class="col-12">
                      <label class="form-label select-label">User Type</label>

                      <select class="form-select" name="usertype">
                        <option selected disabled>Select User Type</option>
                        <option value="1">Admin</option>
                        <option value="2">Client</option>
                        <option value="3">Volunteer</option>
                      </select>
                    </div>
                  </div>

                  <!-- Input for Email -->
    
                  <div class="text-start form-outline mb-2">
                    <label class="form-label" for="typeEmailX">Email</label>
                    <input type="email" id="typeEmailX" name="email" class="form-control form-control" />
                  </div>
    
                  <!-- Input for Password -->

                  <div class="text-start form-outline mb-5">
                    <label class="form-label">Password</label>
                    <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control password" required />
                        <span class="input-group-text togglePassword" id="">
                            <i data-feather="eye-off" style="cursor: pointer"></i>
                        </span>
                    </div>
                  </div>
    
                  
                  <button type="submit" value="Login" name="login" class="btn btn-lg px-5" data-mdb-ripple-init>Login</button></a>
                  

                  <p class="small mb-1 pb-lg-1 py-4"><a class="text-dark-50" href="#!">Forgot password?</a></p>
    
                </div>
    
                
                  <p class="mb-0">Don't have an account? <a href="register.php" class="text-dark-50 fw-bold">Sign Up</a>
                  </p>
                
    
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  

</body>

<script>
  feather.replace({ 'aria-hidden': 'true' });

$(".togglePassword").click(function (e) {
    e.preventDefault();
    var type = $(this).parent().parent().find(".password").attr("type");
    console.log(type);
    if(type == "password"){
        $("svg.feather.feather-eye-off").replaceWith(feather.icons["eye"].toSvg());
        $(this).parent().parent().find(".password").attr("type","text");
    }else if(type == "text"){
        $("svg.feather.feather-eye").replaceWith(feather.icons["eye-off"].toSvg());
        $(this).parent().parent().find(".password").attr("type","password");
    }
});
</script>
</html>