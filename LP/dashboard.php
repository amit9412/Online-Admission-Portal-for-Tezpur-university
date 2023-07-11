
<?php
require_once("library.php");
if(!chkLogin())
{
	header("Location: signin.php");
}
require '../vendor/autoload.php';
    $client = new MongoDB\Client;
    $database=$client->Admission_portal;
    $collection = $database->dashboardData;
$email = $_SESSION["email"];
$name = $_SESSION["uname"];
$criteria = array("Email"=> $email);
$query = $collection->findOne($criteria);
        //var_dump($query);
if ((empty($query))) {
		if (isset($_POST['proceed_reg'])) {
			$entrace_exam = $_POST['entrance_exam'];
			$degree_level = $_POST['degree_level'];
			$degree_name = $_POST['degree_name'];
	
			$document = array(
				"Email" => $email,
				"Entrance exam" => $entrace_exam,
				"Degree level" => $degree_level,
				"Degree name" => $degree_name
			);
			$collection->insertOne($document);
			header("Location: newpersonaldetails.php");
		}
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
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!--<link rel="stylesheet" href="style.css"> -->
<!-- Stylesheet -->
<link rel="stylesheet" href="../LP/css/bootstrap.min.css">
<link rel="stylesheet" href="../LP/css/bootstrap-select.min.css">


<!-- JavaScript -->
<script src="../LP/js/jquery.min.js"></script>
<script src="../LP/js/bootstrap.min.js"></script>
<script src="../LP/js/bootstrap-select.js"></script>

<title>Tezuadmissions</title>
</head>
<body>
    <style>
         .navbar{
	background-color: #ffffff;
	box-shadow: var(--box-shadow);
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
body {
    background-color: #eae6f1;
    color:black;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

    
    font-size: 15px;

}
.sidebar{
    background-color: #efe9f6;
    font-size: small;
}


span{
    color: rgb(99, 98, 98);
}
i{
    color: rgb(99, 98, 98);
}
form{
  color:rgb(72, 72, 72);
}
h5{
  color:#402880;
}
.navbar-brand{
  color:#402880;
}
</style>
<!--navbar-->  
<nav class="navbar navbar-expand-lg navbar-light sticky-top border border-bottom">
   
    <div class="container">
       
      <a class="navbar-brand" href="#">
        <img src="images/Tezpur-University.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        <span class="fw-bold text-black-50">
        Tezpur University</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
     
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link text-black-80" href="landingpage.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black-80" href="#prospectus">Prospectus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black-80" href="#hta">How to apply</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black-80" href="#faq">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black-80" href="#contactus">Contact Us</a>
          </li>
          
          
        </ul>
    
      </div>
    </div>
  </nav>

<div class=" container-fluid">
		<div class="row flex-nowrap">
			<div class=" col-sm-auto  pt-0 bg-white shadow p-3 mb-5 bg-body rounded ">
				<div class=" d-flex flex-column  align-items-sm-start px-3 pt-2  min-vh-100 sticky ">
				<div class=" text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">John Smith</h5>
</div>

					<a href="dashboard2.php" class="pt-3 text-decoration-none">
						<span class="fs-5 d-none d-sm-inline">HOME</span><i class="list fs-4 bi-list "></i>
					</a>
					<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center pt-4 align-items-sm-start" id="menu">
					<li class="pd nav-item pb-3">
							<a href="newpersonaldetails.php" class="nav-link align-middle px-0">
								<i class="fs-4 bi bi-person "></i> <span class=" ms-1 d-none d-sm-inline">Personal Details</span>
							</a>
						</li>
           <li class="aq nav-item pb-3">
							<a href="newAcademicQ.php" class="nav-link align-middle px-0">
								<i class="fs-4 bi-mortarboard"></i> <span class="ms-1 d-none d-sm-inline "> Academic Qualifications</span>
							</a>
						</li>
                        <li class="nav-item pb-3">
							<a href="newprogramselect.php" class="nav-link align-middle px-0">
								<i class="fs-4 bi-window-stack"></i> <span class="ms-1 d-none d-sm-inline ">Program Selection</span>
							</a>
						</li>
                        <li class="nav-item pb-3">
							<a href="newDocumentUpload.php" class="nav-link align-middle px-0">
								<i class="fs-4 bi-file-earmark-arrow-up "></i> <span class="ms-1 d-none d-sm-inline ">Upload Documents</span>
							</a>
						</li>
						
					</ul>
					<hr>
				</div>
			</div>

      <!--body-->
      <div class="mt-5 p-5 " style="width:1180px">
        <div class="d-flex justify-content-between">
          

            <form class="form form-horizontal hr row gy-2 gx-3 bg-light rounded-2 shadow"method="post">
                <h3 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">Welcome,<strong>
                    <?php echo $_SESSION['uname']; ?>
                </strong> </h3>
				 
				<div class="row pt-2">
             		<div class=" col-md-5  mt-3">
                		<p>Which exam have you recently given?</p> 
              			</div>
              		<div class="col-md-4  mt-3 ">
                 		 <select class=" form-select" id="Wardofuni" name="entrance_exam">
                      		<option selected>Select Option</option>
                      		<option value="TUEE">TUEE</option>
                      		<option value="CUET(UG)">CUET(UG)</option>
							<option value="CUET(PG)">CUET(PG)</option>
							<option value="JEE">JEE</option>
							<option value="GATE">GATE</option>
                    	</select>
              		</div>
            	</div>

				<div class="row pt-2">
					<div class=" col-md-5  mt-3">
                		<p>Which degree are you applying for?</p> 
              		</div>
              		<div class="col-md-4  mt-3 ">
                 		 <select class=" form-select" id="Wardofuni" name="degree_level">
                      		<option selected>Select Option</option>
                      		<option value="UG">UG</option>
                      		<option value="PG">PG</option>
							<option value="PHD">PHD</option>
                    	</select>
              		</div>

    			</div>

				<div class="row pt-2">
					<div class=" col-md-5  mt-3">
                		<p>Which Course are you applying for?</p> 
              		</div>
              		<div class="col-md-4  mt-3 ">
                 		 <select class=" form-select" id="Wardofuni" name="degree_name">
                      		<option selected>Select Option</option>
                      		<option value="Btech(CSE)">Btech(CSE)</option>
                      		<option value="Btech(ECE)">Btech(ECE)</option>
							<option value="Btech(Civil)">Btech(Civil)</option>
							<option value="Integrated Bcom">Integrated Bcom</option>
                      		<option value="Integrated Bsc">Integrated Bsc</option>
							<option value="MCA">MCA</option>
							<option value="MBA">MBA</option>
							<option value="Mcom">Mcom</option>
							<option value="MA">MA</option>
							<option value="PHD(CSE)">PHD(CSE)</option>
							<option value="PHD(ECE)">PHD(ECE)</option>
							<option value="PHD(Mech)">PHD(Mech)</option>
							<option value="PHD(Civil)">PHD(Civil)</option>
                    	</select>
              		</div>

    			</div>

				<div class="row pt-4">
					<div class=" col-md-5  mt-3">
                		<p>Proceed with your application</p> 
              		</div>
					<div class="col">
              		<input type="submit" class="btn btn-info" value="Proceed" name="proceed_reg" >
					</div>
                  
              </div>
    			</div>
			</form>
        </div>
      </div>
        

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
		
