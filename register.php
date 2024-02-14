<?php
if (isset($_POST["submit"])) {
  $firstName = $_POST["firstname"];
  $middleName = $_POST["middlename"];
  $lastName = $_POST["lastname"];
  $userType = $_POST["usertype"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];

  $passwordHash = password_hash($password, PASSWORD_DEFAULT);
  
  $errors = array();
  if (empty($firstName) OR empty($middleName) OR empty($lastName) OR empty($userType) OR empty($email) OR empty($password) OR empty($confirmPassword)) {
    array_push($errors,"All fields are required");
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Email is not valid");
  }
  if (strlen($password)<8) {
    array_push($errors,"Password must be at least 8 characters long");
  }
  if ($password!==$confirmPassword) {
    array_push($errors,"Password does not match");
  }
  require_once "database.php";
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  $rowCount = mysqli_num_rows($result);
  if ($rowCount>0) {
    array_push($errors,"Email already exists!");
  }
  if (count($errors)>0) {
    foreach ($errors as $error) {
      echo "<div class='alert alert-danger'>$error</div>";
    }
  } else {
    
    $sql = "INSERT INTO users (FirstName, MiddleName, LastName, UserType, Email, PasswordHash) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
    if ($prepareStmt) {
      mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $middleName, $lastName, $userType, $email, $passwordHash);
      mysqli_stmt_execute($stmt);
      echo "<div class='alert alert-success'>You are registered successfully</div>";
    }else{
      die("Something went wrong");
     }
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
    <link rel="stylesheet" href="reg.css">
    <title>Registration</title>
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

<body>

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
              <a class="nav-link fs-4" id= "review" aria-current="page" href="#">Reviews</a>
            </li>
        </div>
      </div>
    </div>
  </nav>

    <!-- Registration Form -->
  
   

    <form action="register.php" method="post" enctype="multipart/form-data">
    <div class="container form-container"   style = "display: flex; justify-content: center; align-items: center;">
      <section>
        <div class="container h-100">
          <div class="row">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-light text-dark" style="border-radius: 2rem;">
                <div class="card-body text-start">
      
                  <div class="mb-md-5 mt-md-4 text-center">
      
                    <h2 class="fw-bold mb-5 text-uppercase">Create an Account</h2>

                    <div class="text-start form-outline mb-2">
                      <label class="form-label" for="fname">First Name</label>
                      <input type="text" id="fname" name="firstname" class="form-control form-control" /> 
                    </div>

                    <div class="text-start form-outline mb-2">
                      <label class="form-label" for="mname">Middle Name</label>
                      <input type="text" id="mname" name="middlename" class="form-control form-control" /> 
                    </div>

                    <div class="text-start form-outline mb-2">
                      <label class="form-label" for="lname">Last Name</label>
                      <input type="text" id="lname" name="lastname" class="form-control form-control" /> 
                    </div>

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
      
                    <div class="text-start form-outline form-white mb-2">
                      <label class="form-label" for="typeEmailX">Email</label>
                      <input type="email" id="typeEmailX" name="email" class="form-control form-control" />
                    </div>
      
                    <!-- Input for Password -->
  
                    <div class="text-start form-outline mb-2">
                      <label class="form-label">Password</label>
                      <div class="input-group mb-3">
                          <input class="form-control password" id="password" class="form-control" type="password" name="password" required />
                          <span class="input-group-text togglePassword" id="">
                              <i data-feather="eye-off" style="cursor: pointer"></i>
                          </span>
                      </div>
  
                    <div class="text-start form-outline mb-4">
                      <label class="form-label" for="confirmPassword">Confirm Password</label>
                      <div class="input-group mb-3">
                        <input class="form-control password" id="confirmPassword" class="form-control" type="password" name="confirmPassword" required />
                        <span class="input-group-text togglePassword" id="">
                            <i data-feather="eye-off" style="cursor: pointer"></i>
                        </span>
                    </div>
                    </div>

                    <div class="d-flex justify-content-center">
                      <button type="submit" name="submit" class="btn btn-lg px-5" data-mdb-ripple-init>Register</button>
                    </div>
  
                    <div>
                      <p class="text-center text-muted mb-0 p-3">Already have an account? <a href="index.php" class="text-dark-50 fw-bold">Login</a>
                      </p>
                    </div> 

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    </form>
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