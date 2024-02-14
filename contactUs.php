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
    <title>Contact Us</title>
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

  #fcf-form {
        margin: 0 auto; /* This will center the div horizontally */
        max-width: 600px; /* Adjust the max-width as per your design */
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
      <a class="nav-link text-white fs-5 text-center" href="aboutUs.php">About Us</a>
      <a class="nav-link text-white active fs-5 text-center" href="contactUs.php">Contact Us</a>
    </nav> 

    <!-- Content for Home -->
    <div class="container" style="background: #5CE1E6;">
    
        <header>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="fw-bold">Contact Us</h3>
            </div>                       
            <nav aria-label="breadcrumb" class="bg-transparent">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">Client</a></li>
                    <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">Main Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class = "text-white" style = "text-decoration: none;">Contact Us</a></li>
                </ol>
              </nav>
            
        </header>

        <?php
            if (isset($_POST['Email'])) {

                // EDIT THE 2 LINES BELOW AS REQUIRED
                $email_to = "you@yourdomain.com";
                $email_subject = "New form submissions";

                function problem($error)
                {
                    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
                    echo "These errors appear below.<br><br>";
                    echo $error . "<br><br>";
                    echo "Please go back and fix these errors.<br><br>";
                    die();
                }

                // validation expected data exists
                if (
                    !isset($_POST['Name']) ||
                    !isset($_POST['Email']) ||
                    !isset($_POST['Message'])
                ) {
                    problem('We are sorry, but there appears to be a problem with the form you submitted.');
                }

                $name = $_POST['Name']; // required
                $email = $_POST['Email']; // required
                $message = $_POST['Message']; // required

                $error_message = "";
                $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

                if (!preg_match($email_exp, $email)) {
                    $error_message .= 'The Email address you entered does not appear to be valid.<br>';
                }

                $string_exp = "/^[A-Za-z .'-]+$/";

                if (!preg_match($string_exp, $name)) {
                    $error_message .= 'The Name you entered does not appear to be valid.<br>';
                }

                if (strlen($message) < 2) {
                    $error_message .= 'The Message you entered do not appear to be valid.<br>';
                }

                if (strlen($error_message) > 0) {
                    problem($error_message);
                }

                $email_message = "Form details below.\n\n";

                function clean_string($string)
                {
                    $bad = array("content-type", "bcc:", "to:", "cc:", "href");
                    return str_replace($bad, "", $string);
                }

                $email_message .= "Name: " . clean_string($name) . "\n";
                $email_message .= "Email: " . clean_string($email) . "\n";
                $email_message .= "Message: " . clean_string($message) . "\n";

                // create email headers
                $headers = 'From: ' . $email . "\r\n" .
                    'Reply-To: ' . $email . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                @mail($email_to, $email_subject, $email_message, $headers);
            ?>

                <!-- include your success message below -->

                Thank you for contacting us. We will be in touch with you very soon.

            <?php
            }
            ?>
        
        <div class="container">
            <div class="bg-info p-4">
                <div class="fcf-body p-4">

                    <div id="fcf-form">
                        <h3 class="fcf-h3">Contact us</h3>

                        <form id="fcf-form-id" class="fcf-form-class" method="post" action="contact-form-process.php">

                            <div class="mb-3">
                                <label for="Name" class="form-label">Your name</label>
                                <input type="text" id="Name" name="Name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="Email" class="form-label">Your email address</label>
                                <input type="email" id="Email" name="Email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="Message" class="form-label">Your message</label>
                                <textarea id="Message" name="Message" class="form-control" rows="6" maxlength="3000" required></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" id="fcf-button" class="btn btn-primary btn-lg btn-block">Send Message</button>
                            </div>

                        </form>
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