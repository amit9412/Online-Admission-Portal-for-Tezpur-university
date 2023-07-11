<?php
require_once("library.php");
require 'vendor/autoload.php'; 
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->Admission_portal->account;
global $email;
if(chkLogin()){
$email = $_SESSION["email"];
if(isset($_POST['newpassconfirm'])){
$temp  = $_POST['password'];
$options = array('cost' => 10);
$pass = password_hash($temp, PASSWORD_BCRYPT, $options);
$updateResult = $collection->updateOne(
  [ 'Email' => $email ],
  [ '$set' => [ 'Password' => $pass ]]  );
  removeall();
  echo ("<script LANGUAGE='JavaScript'>
  window.alert('password Succesfully Updated');
  window.location.href='signin.php';
  </script>");
        } 
        
      }
      else{
          echo '<script>alert("Some Error Occured!!! Please try Again Later")</script>';
        header("Location: forgotpwpage1.php");
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
a:link{
    text-decoration: none;
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
                <div class="img signup col d-flex justify-content-center p-5">
                    <img src="images/undraw_forgot_password_re_hxwm.svg" alt="" class="col-lg-6 ">
                </div>
              <div class="card-body p-3 shadow-5 ">
                <h2 class="fw-bold mb-5 text-center">Forgot Password?</h2>

                <form method="POST" >
                <div class="form-group">
        <div class="form-group">
          <label class="" for="newpassword">New Password</label>
          <div class="input-group">

            <input name="password" type="password" class="form-control form-control-sm" id="password" placeholder="New Password"  onkeyup='check();' required >
            
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="sr-only" for="confirmpassword">Confirm Password</label>
        <div class="input-group">

          <input name="confirm_password" type="password" class="form-control form-control-sm" id="confirm_password" placeholder="Confirm Password" onkeyup='check();' required >
          
        </div>
        <span id='message'></span>
        <script type="text/javascript">
                               var check = function() {
                                if (document.getElementById('password').value ==
                                  document.getElementById('confirm_password').value) {
                                  document.getElementById('message').style.color = 'green';
                                  document.getElementById('password').style.borderColor = 'green';
                                  document.getElementById('confirm_password').style.borderColor = 'green';
                                  document.getElementById('message').innerHTML = 'Password Matched';
                                } else {
                                  document.getElementById('message').style.color = 'red';
                                  document.getElementById('password').style.borderColor = 'red';
                                  document.getElementById('confirm_password').style.borderColor = 'red';
                                  document.getElementById('message').innerHTML = 'Password Not Matched';
                                }
                              }
                              </script>
      </div>
      <div class="newpwd">
      <button id="submitBtn" class="btn btn-md btn-primary btn-block" type="submit" name="newpassconfirm" >Update
                </button>
              </form>
              </div>
</div>
</div>
              </div></div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
    </html>
    