<?php
//session_start();
require_once("library.php");
require '../vendor/autoload.php';
    $client = new MongoDB\Client;
    $database=$client->Admission_portal;
    $collection = $database->account;
$email = $_SESSION["email"];
if(isset($_POST['createAccount'])){
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $phno = $_POST['phno'];
    $dob = $_POST['dob'];
    $temp  = $_POST['password1'];
    $options = array('cost' => 10);
    $pass = password_hash($temp, PASSWORD_BCRYPT, $options);

    $document = array(
            
        "First Name"    => $fname,
        "Middle Name"   => $mname,
        "Last Name"     => $lname,
        "Contact No"    => $phno,
        "Date of Birth" => $dob,
        "Email"         => $email,
        "Password"      => $pass
    );
    $collection->insertOne($document);
    header("Location: accountcreated.php");
$query = $database->otp->deleteOne(['Email' => $email]);
}
else {
  echo '<script>alert("Account Creation failed")</script>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1" />

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" href="style.css"> -->
<!-- Stylesheet -->
<link rel="stylesheet" href="../LP/css/bootstrap.min.css">
<link rel="stylesheet" href="../LP/css/bootstrap-select.min.css">


<!-- JavaScript -->
<script src="../LP/js/jquery.min.js"></script>
<script src="../LP/js/bootstrap.min.js"></script>
<script src="../LP/js/bootstrap-select.js"></script>
<script src="../LP/js/password.js"></script>




	<title>Tezuadmissions</title>
</head>
<body>
    <style>
    body{ background:         linear-gradient(to right, #7158a4, #2f1a93);
  font: 300 16px/22px "Lato", "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
  text-align: center;
        color: rgba(0, 0, 0, 0.687);

}
        .navbar{
	background-color: #e9e9f4;
	box-shadow: var(--box-shadow);
}
.navbar-nav .nav-link{
	font-weight: 500 ;
	color: rgb(57, 34, 186);
}
.navbar-nav .nav-link.active{
	color: #2f2fa7;
}

.btn{
    border-radius: 5px;
    background:         linear-gradient(to right, #7158a4, #2f1a93);
    color: aliceblue;
  cursor: pointer;
  display: inline-block;
  font-weight: 400;
  letter-spacing: .5px;
  margin: 0;
  text-transform: uppercase;
}

a:link{
    text-decoration: none;
}
        </style>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
		<div class="container">
		  <a class="navbar-brand" href="#">
			<img src="images/Tezpur-University.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
			<span class="text-black-50">
			TEZPUR UNIVERSITY</span></a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse " id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0">

			  <li class="nav-item">
				<a class="nav-link text-black-50" href="landingpage.html">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link text-black-50" href="#prospectus">Prospectus</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link text-black-50" href="#hta">How to apply</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link text-black-50" href="#faq">FAQ</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link text-black-50" href="#contactus">Contact Us</a>
			  </li>
			  
			  
			</ul>
		  </div>
		</div>
	  </nav>
      <div class="container py-4">
        <div class="row  align-items-center">
          <div class="col d-flex justify-content-center">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded" style=" width: 500px ;
                background: hsl(0, 0%, 100%);
                backdrop-filter: blur(30px);
                ">
                <div class="img signup col d-flex justify-content-center">
                    <img src="images/undraw_Mobile_login_re_9ntv.png" alt="" class="col-md-5 ">
                </div>
              <div class="card-body p-5 shadow-5 text-center">
                <h2 class="fw-bold mb-5">Sign up now</h2>
                <form method="post">
                  <!-- Email input -->
                  <div class="row mb-3"style="padding-top: 5px; text-align:left;">
                    <div class=" form-outline mb-4">
                        <p>First Name</p>
                        <input type="text" id="FirstName" class="form-control" name="fname"  required>
                      </div>

                      <div class=" form-outline mb-4">
                        <p>Middle Name</p>
                        <input type="text" id="MiddleName" class="form-control" name="mname" >
                      </div>

                      <div class=" form-outline mb-4">
                        <p>Last Name</p>
                        <input type="text" id="LastName" class="form-control" name="lname"  required>
                      </div>

                      <div class="form-outline mb-4">
                        <p>Phone Number</p>
                        <input type="text" id="Phno" class="form-control" name="phno" required>
                      </div>

                      <div class="form-outline mb-4">
                        <p>DOB</p>
                        <input placeholder="Date Of Birth" type="date" id="startDate" class="form-control" name="dob"  required>
                        <span id="startDateSelected"></span>
                      </div>

                      <div class=" form-outline mb-4">
                        <p>Enter Password</p>
                        <input type="password" id="Password" class="form-control" name="password1" required>
                      </div>

                      <div class=" form-outline mb-4">
                        <p>Confirm Password</p>
                        <input type="password" id="Password" class="form-control" name="password2" required>
                      </div>
                 </div>
                   
            
    
                  <!-- Submit button -->
                  <div class="otp">
                   <p>Ready for your journey in Tezpur University?</p>
                   <input type="submit" class="btn btn-info" name="createAccount" value="Create Account">

                   
                  </div>
                  
                
                   
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
    </html>

