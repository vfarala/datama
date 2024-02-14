<?php
session_start();
include 'database.php';
var_dump($_POST);

$errors = array();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST["update"])) {
    // Retrieve form data
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $contact_number = $_POST["contact_number"];
    $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
    $date_of_birth = $_POST["date_of_birth"];
    $occupation = $_POST["occupation"];
    $owned_pet = isset($_POST["owned_pet"]) ? $_POST["owned_pet"] : "";
    $identification_number = $_POST["identification_number"];
    $salary = $_POST["salary"];
    $sex = $_POST["Sex"];
    $city = $_POST["City"];
    $street = $_POST["Street"];
    $barangay = $_POST["Barangay"];

    // Validation
    if (empty($firstname) || empty($lastname) || empty($age) || empty($contact_number) || empty($date_of_birth) || empty($occupation) || empty($identification_number) || empty($salary) || empty($sex) || empty($city) || empty($street) || empty($barangay)) {
        $errors[] = "All fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (!is_numeric($age) || $age <= 0) {
        $errors[] = "Age must be a positive number.";
    }

    if (!is_numeric($contact_number)) {
        $errors[] = "Contact number must be a numeric value.";
    }

    if (!is_numeric($identification_number)) {
        $errors[] = "Identification number must be a numeric value.";
    }

    if (!is_numeric($salary) || $salary < 0) {
        $errors[] = "Salary must be a non-negative number.";
    }

    // Proceed with database operation if there are no validation errors
    if (empty($errors)) {
        // Construct SQL query
        $sql = "SELECT * FROM users INNER JOIN client_data ON users.Email = client_data.Email WHERE users.Email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Update existing records
            $update_users_sql = "UPDATE users SET FirstName = ?, MiddleName = ?, LastName = ? WHERE Email = ?";
            $update_client_data_sql = "UPDATE client_data SET AGE = ?, CONTACT_NUMBER = ?, date_of_birth = ?, occupation = ?, owned_pet = ?, identification_number = ?, salary = ?, sex = ?, city = ?, street = ?, barangay = ? WHERE Email = ?";

            $stmt_update_users = $conn->prepare($update_users_sql);
            $stmt_update_users->bind_param("ssss", $firstname, $middlename, $lastname, $email);
            $stmt_update_users->execute();

            $stmt_update_client_data = $conn->prepare($update_client_data_sql);
            $stmt_update_client_data->bind_param("ssssssdsssss", $age, $contact_number, $date_of_birth, $occupation, $owned_pet, $identification_number, $salary, $sex, $city, $street, $barangay, $email);
            $stmt_update_client_data->execute();

            echo "Records updated successfully!";
        } else {
            // If no records exist, insert new records
            $insert_users_sql = "INSERT INTO users (FirstName, MiddleName, LastName, Email) VALUES (?, ?, ?, ?)";
            $insert_client_data_sql = "INSERT INTO client_data (AGE, CONTACT_NUMBER, date_of_birth, occupation, owned_pet, identification_number, salary, sex, city, street, barangay, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt_insert_users = $conn->prepare($insert_users_sql);
            $stmt_insert_users->bind_param("ssss", $firstname, $middlename, $lastname, $email);
            $stmt_insert_users->execute();

            $stmt_insert_client_data = $conn->prepare($insert_client_data_sql);
            $stmt_insert_client_data->bind_param("ssssssdsssss", $age, $contact_number, $date_of_birth, $occupation, $owned_pet, $identification_number, $salary, $sex, $city, $street, $barangay, $email);
            $stmt_insert_client_data->execute();

            echo "Records inserted successfully!";
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }

    // Close prepared statements
    $stmt->close();
    $stmt_update_users->close();
    $stmt_update_client_data->close();
    $stmt_insert_users->close();
    $stmt_insert_client_data->close();
}

// Close database connection
$conn->close();
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
    
    <link rel="stylesheet" href="account.css">
    <title>Account</title>
</head>
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
        
        <div class="container" style="padding: 10px; margin-top: 10px;">
            <h1>Edit Profile</h1>
              <hr>
            <div class="row-cols-lg-1">
              <!-- left column -->
              <div class="col-md-3">
                <div class="text-center">
                  <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                  <h6 class="mt-3 mb-3">Upload a different photo...</h6>
                  
                  <input type="file" class="form-control">
                </div>
              </div>
              
              <!-- edit form column -->
              <div class="col-md-10 personal-info">
                <div class="alert alert-info alert-dismissable mt-3">
                  <a class="panel-close close" data-dismiss="alert" style="text-decoration: none; float: right;" id="close">×</a> 
                  <i class="fa fa-exclamation-circle" style="color: red;"></i>
                    Please fill out information.
                </div>
                <h3 style="padding-bottom: 10px; padding-top: 10px;">Personal Information</h3>
                
                <form class="form-horizontal" role="form" style="font-size: 15px;">
                  <div class="form-group row">
                        <label class="col-lg-2 control-label">First name:</label>
                        <div class="col-lg-2">
                        <input class="form-control" type="text" placeholder="Juan" name="firstname" style="font-size: 15px;">
                        </div>

                        <label class="col-lg-2 control-label">Middle name:</label>
                        <div class="col-lg-2">
                        <input class="form-control" type="text" placeholder="Dela" name="middlename" style="font-size: 15px;">
                        </div>

                        <label class="col-lg-2 control-label">Last name:</label>
                        <div class="col-lg-2">
                        <input class="form-control" type="text" placeholder="Cruz" name="lastname" style="font-size: 15px;">
                        </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-2 control-label">Age:</label>
                    <div class="col-lg-2">
                    <input class="form-control" type="text" name="age" style="font-size: 15px;">
                    </div>

                    <label class="col-lg-2 control-label">Contact Number:</label>
                    <div class="col-lg-2">
                    <input class="form-control" type="text" name="contact_number" style="font-size: 15px;">
                    </div>

                    <label class="col-lg-2 control-label">Email Address:</label>
                    <div class="col-lg-2">
                    <input class="form-control" type="text" placeholder="jdcruz@gmail.com" name="email" style="font-size: 15px;">
                    </div>

                  </div>

                  <div class="form-group row">
                    <label class="col-lg-2 control-label">Date of Birth:</label>
                    <div class="col-lg-2">
                      <input class="form-control" type="date" name="date_of_birth" style="font-size: 15px;">
                    </div>

                    <label class="col-lg-2 control-label">Occupation:</label>
                    <div class="col-lg-2">
                      <input class="form-control" type="text" name="Occupation" style="font-size: 15px;">
                    </div>

                    <label class="col-lg-2 control-label">Owned a pet before?</label>
                    <div class="col-lg-2">

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="owned_pet" id="owned_yes" value="Yes" style="font-size: 15px;">
                        <label class="form-check-label" for="owned_yes">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="owned_pet" id="owned_no" value="No" style="font-size: 15px;">
                        <label class="form-check-label" for="owned_no">No</label>
                      </div>
                    </div>
                  </div>

                  

                <div class="form-group row">
                    <label class="col-lg-2 control-label">Identification Number:</label>
                    <div class="col-lg-2">
                    <input class="form-control" type="text" name="identification_number" style="font-size: 15px;">
                    </div>

                    <label class="col-lg-2 control-label">Salary:</label>
                    <div class="col-lg-2">
                    <input class="form-control" type="text" name="salary" style="font-size: 15px;">
                    </div>

                    <label class="col-lg-2 control-label">Sex:</label>
                    <div class="col-lg-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Sex" id="sex" value="option1" style="font-size: 15px;">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Sex" id="sex" value="option2" style="font-size: 15px;">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                          </div>
                    </div>
                </div>
                <hr>

                    
                <h3 style="padding-bottom: 10px; padding-top: 10px;">Address</h3>

                    <div class="form-group row">
                        <label class="col-lg-2 control-label">City:</label>
                        <div class="col-lg-2">
                        <input class="form-control" type="text" name="City" value="Manila">
                        </div>

                        <label class="col-lg-2 control-label">Street:</label>
                        <div class="col-lg-2">
                        <input class="form-control" type="text" name="Street" value="Sampaloc Street">
                        </div>

                        <label class="col-lg-2 control-label">Barangay:</label>
                        <div class="col-lg-2">
                        <input class="form-control" type="text" name="Barangay" value="Tondo">
                        </div>
                    </div>
                    <hr>
                    <!-- 
                      <h3 style="padding-bottom: 10px; padding-top: 10px;">Change Password</h3>
                   
                  <div class="form-group row password">
                    <label class="col-md-2 control-label">Password:</label>
                    <div class="col-md-2">
                      <input class="form-control password" type="password">
                    </div>
                    <label class="col-md-2 control-label">Confirm password:</label>
                    <div class="col-md-2">
                      <input class="form-control" type="password">
                    </div>
                  </div>
                  <div class="form-group row">
                    -->
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="container mt-1">
                       <button type="submit" name="update" value="Update" class="btn btn-primary mr-2">Save Changes</button>
                        <a href="home.php" class="btn btn-secondary">Cancel</a>
                    </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
   
</body>

<!-- JS for live clock and date -->
<script src="liveclock.js"></script>

<!-- JS for profile pic drop down, to account, settings, and logout -->
<script src="account-dropdown"></script>
</html>