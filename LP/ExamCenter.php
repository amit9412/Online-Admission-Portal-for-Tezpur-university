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
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
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




	<title>Tezuadmissions</title>
</head>
<body>
    <style>
<style>
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Poppins",sans-serif;
}
    body{ background:         linear-gradient(to right, #7158a4, #2f1a93);
      font-size: 12px;
      font-family: "Poppins",sans-serif;

        color: rgba(0, 0, 0, 0.687);

    

}
        .navbar{
	background-color: #e9e9f4;
	box-shadow: var(--box-shadow);
}
.navbar-nav .nav-link{
	font-weight: 500 ;
	color: rgb(244, 243, 247);
}
.navbar-nav .nav-link.active{
	color: #2f2fa7;

}

.nav .nav-item{
    color:#e9e9f4
}
a:link{
    text-decoration: none;
}
.form{
  font-size: 13px;
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


      
	  <div class="container-fluid">
		<div class="row flex-nowrap">
			<div class="col-md-6  mt-3 col-md-3 col-xl-2 px-sm-1 px-0 ">
				<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 sticky-top ">
					<a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
						<span class="fs-5 d-none d-sm-inline">Account</span>
					</a>
					<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center pt-4 align-items-sm-start" id="menu">
						<li class="nav-item pb-3">
							<a href="personald.php" class="nav-link align-middle px-0">
								<i class="fs-4 bi bi-person-fill text-white"></i> <span class="text-light ms-1 d-none d-sm-inline">Personal Details</span>
							</a>
						</li>
                        <li class="nav-item pb-3">
							<a href="AcademicQ.php" class="nav-link align-middle px-0">
								<i class="fs-4 bi-building text-white"></i> <span class="ms-1 d-none d-sm-inline text-light"> Academic Qualifications</span>
							</a>
						</li>
                        <li class="nav-item pb-3">
							<a href="#" class="nav-link align-middle px-0">
								<i class="fs-4 bi-layout-text-sidebar-reverse text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Program Selection</span>
							</a>
						</li>
                        <li class="nav-item pb-3">
							<a href="#" class="nav-link align-middle px-0">
								<i class="fs-4 bi-layout-text-sidebar-reverse text-light"></i> <span class="ms-1 d-none d-sm-inline text-light">Upload Documents</span>
							</a>
						</li>
						
					</ul>
					<hr>
				</div>
			</div>
            
            

            <div class="mt-5 p-3 " style="width:1050px">
                <div class="d-flex justify-content-between">
                <form class="row gy-2 gx-3 bg-light rounded-2">
                            <h6 class="fw-bold" style="padding-top: 20px; padding-left: 10px;"></h6>
                            <div class="row mb-3"style="padding-top: 20px;">
                            <div class="schoolname col-md-6  mt-3">
                            <p>School/College Name Address</p>
                          </div>
                          <div class="col-md-6  mt-3">
                            <input type="text" class="form-control" placeholder="School Name" required>
                          </div>
                        

                    

                



                              </div>
                              <div class="row mb-3">
                            <div class="save col-md-6  mt-3">
                                <input type="submit" class="btn btn-info" value="Confirm" onclick=to_ProgramSelect()>

                                <script>
                                  function to_ProgramSelect()
                                    {
                                    location.href = "ProgramSelect.php";
                                    } 
                                </script>
                        </div>
                                </div>
                           

            
                        
                    </form>
                </div>
                    </div>
    








      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
    </html>