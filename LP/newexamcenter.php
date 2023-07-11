<?php
require_once("library.php");
if(!chkLogin())
{
  header("Location: signin.php");
}
require '../vendor/autoload.php';
    $client = new MongoDB\Client;
    $database=$client->Admission_portal;
    $collection = $database->personalDetails;
    $email = $_SESSION["email"];
    $name = $_SESSION["uname"];
if(empty($query)){
  if (isset($_POST['ExamcenterSubmit'])) {
    $document=array(
      'Email'=>$email,
    'Questionpapermode' => $_POST['Questionpapermode'],
    'citypreference1' => $_POST['citypreference1'],
    'citypreference2' => $_POST['citypreference2'],
    'citypreference3' => $_POST['citypreference3']
    );
    $collection->insertOne($document);
  }
  else
  {
    echo "Some Error Occoured";
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
<script src="../LP/js/password.js"></script>


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
     
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-black-80" href="logoutpage.html">Logout<i class="bi bi-box-arrow-right ps-2"></i></a>
         </li>
      </ul>
    
      </div>
    </div>
  </nav>

<div class=" container-fluid">
		<div class="row flex-nowrap">
			<div class=" col-sm-auto  pt-0 bg-white shadow p-3 mb-5 bg-body rounded ">
				<div class=" d-flex flex-column  align-items-sm-start px-3 pt-2  min-vh-100 sticky ">
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
							<a href="newprogramselect.html" class="nav-link align-middle px-0">
								<i class="fs-4 bi-window-stack"></i> <span class="ms-1 d-none d-sm-inline ">Program Selection</span>
							</a>
						</li>
                        <li class="nav-item pb-3">
							<a href="newDocumentUpload.php" class="nav-link align-middle px-0">
								<i class="fs-4 bi-file-earmark-arrow-up "></i> <span class="ms-1 d-none d-sm-inline ">Upload Documents</span>
							</a>
						</li>
						<li class="nav-item pb-3">
							<a href="PDFGenerator.php" class="nav-link align-middle px-0">
								<i class="fs-4 bi-download "></i> <span class="ms-1 d-none d-sm-inline ">Download Application Form</span>
							</a>
						</li>
						
					</ul>
					<hr>
				</div>
			</div>

      <!--body-->
      <div class="mt-4 ps-4 pe-5 " style="width:1030px;">
        <div class="d-flex justify-content-between">
          

          <form class="form form-horizontal hr row gy-2 gx-3 bg-light rounded-2 shadow" method="post">
            <h5 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">Exam Center Selection </h5><!--i think its only for people that will guve TUEE-->

            <div class="row pt-2">
              <div class=" col-md-6  mt-3">
                 <p>Question Paper Mode</p> 
                 </div>
               <div class="col-md-4  mt-3 ">
                   <select class=" form-select" id="Questionpapermode" name="Questionpapermode">
                      <option selected>Select Mode</option>
                      <option value="Online">Online</option>
                      <option value="Offline">Offline</option>
                   </select>
               </div>
           </div>

           <div class="row pt-2">
            <div class=" col-md-6  mt-3">
               <p>Select your City Preference 1</p> 
               </div>
             <div class="col-md-4  mt-3 ">
                 <select class=" form-select" id="citypreference1" name="citypreference1" >
                    <option selected>Select Option 1</option>
                    <option value="Agartala">Agartala</option>
                    <option value="Barpeta Road">Barpeta Road</option>
                    <option value="Bhubaneswar">Bhubaneswar</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Dibrugarh">Dibrugarh</option>
                    <option value="Diphu">Diphu</option>
                    <option value="Goalpara">Goalpara</option>
                    <option value="Guwahati">Guwahati</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Imphal">Imphal</option>
                    <option value="Itanagar">Itanagar</option>
                    <option value="Jorhat">Jorhat</option>
                    <option value="Kokrajhar">Kokrajhar</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Lucknow">Lucknow</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="North Lakhimpur">North Lakhimpur</option>
                    <option value="Patna">Patna</option>
                    <option value="Shillong">Shillong</option>
                    <option value="Silchar">Silchar</option>
                    <option value="Siliguri">Siliguri</option>
                    <option value="Tezpur">Tezpur</option>
                 </select>
             </div>
         </div>

         <div class="row pt-2">
          <div class=" col-md-6  mt-3">
             <p>Select your City Preference 2</p> 
             </div>
           <div class="col-md-4  mt-3 ">
               <select class=" form-select" id="citypreference2" name="citypreference2">
                  <option selected>Select Option 2</option>
                  <option value="Agartala">Agartala</option>
                  <option value="Barpeta Road">Barpeta Road</option>
                  <option value="Bhubaneswar">Bhubaneswar</option>
                  <option value="Chennai">Chennai</option>
                  <option value="Delhi">Delhi</option>
                  <option value="Dibrugarh">Dibrugarh</option>
                  <option value="Diphu">Diphu</option>
                  <option value="Goalpara">Goalpara</option>
                  <option value="Guwahati">Guwahati</option>
                  <option value="Hyderabad">Hyderabad</option>
                  <option value="Imphal">Imphal</option>
                  <option value="Itanagar">Itanagar</option>
                  <option value="Jorhat">Jorhat</option>
                  <option value="Kokrajhar">Kokrajhar</option>
                  <option value="Kolkata">Kolkata</option>
                  <option value="Lucknow">Lucknow</option>
                  <option value="Mumbai">Mumbai</option>
                  <option value="North Lakhimpur">North Lakhimpur</option>
                  <option value="Patna">Patna</option>
                  <option value="Shillong">Shillong</option>
                  <option value="Silchar">Silchar</option>
                  <option value="Siliguri">Siliguri</option>
                  <option value="Tezpur">Tezpur</option>
               </select>
           </div>
       </div>

       <div class="row pt-2">
        <div class=" col-md-6  mt-3">
           <p>Select your City Preference 3</p> 
           </div>
         <div class="col-md-4  mt-3 ">
             <select class=" form-select" id="citypreference3" name="citypreference3" >
                <option selected>Select Option 3</option>
                <option value="Agartala">Agartala</option>
                <option value="Barpeta Road">Barpeta Road</option>
                <option value="Bhubaneswar">Bhubaneswar</option>
                <option value="Chennai">Chennai</option>
                <option value="Delhi">Delhi</option>
                <option value="Dibrugarh">Dibrugarh</option>
                <option value="Diphu">Diphu</option>
                <option value="Goalpara">Goalpara</option>
                <option value="Guwahati">Guwahati</option>
                <option value="Hyderabad">Hyderabad</option>
                <option value="Imphal">Imphal</option>
                <option value="Itanagar">Itanagar</option>
                <option value="Jorhat">Jorhat</option>
                <option value="Kokrajhar">Kokrajhar</option>
                <option value="Kolkata">Kolkata</option>
                <option value="Lucknow">Lucknow</option>
                <option value="Mumbai">Mumbai</option>
                <option value="North Lakhimpur">North Lakhimpur</option>
                <option value="Patna">Patna</option>
                <option value="Shillong">Shillong</option>
                <option value="Silchar">Silchar</option>
                <option value="Siliguri">Siliguri</option>
                <option value="Tezpur">Tezpur</option>
             </select>
         </div>
     </div>

     <div class="row mb-3">
      <div class="save col-md-5  mt-3 pt-5">
          <input type="submit" class="btn btn-info" value="Save and proceed" name="ExamcenterSubmit">
      </div>
  </div>

           

           </form>
        </div>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>