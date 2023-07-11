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
            	<a class="nav-link text-black-80" href="logoutpage.php">Logout<i class="bi bi-box-arrow-right ps-2"></i></a>
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
							<a href="newprogramselect.php" class="nav-link align-middle px-0">
								<i class="fs-4 bi-window-stack"></i> <span class="ms-1 d-none d-sm-inline ">Program Selection</span>
							</a>
						</li>
                        <li class="nav-item pb-3">
							<a href="newDocumentUpload.php" class="nav-link align-middle px-0">
								<i class="fs-4 bi-file-earmark-arrow-up "></i> <span class="ms-1 d-none d-sm-inline ">Upload Documents</span>
							</a>
						</li>
						<li class="nav-item pb-3">
							<a href="#" class="nav-link align-middle px-0">
								<i class="fs-4 bi-download "></i> <span class="ms-1 d-none d-sm-inline ">Download Application Form</span>
							</a>
						</li>
						
					</ul>
					<hr>
				</div>
			</div>

            

            <div class="mt-5 p-3 " style="width:1050px">
                <div class="d-flex justify-content-between">
                <form class="row gy-2 gx-3 bg-light rounded-2">
				<h6 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">UNIVERSITY/PROGRAMME SELECTION</h6>
                        <div class="row mb-3"style="padding-top: 20px;">
                        <div class="universityname col-md-6  mt-3">
                      <p>Select University Name</p>
                    </div>
                            <div class="col-md-6  mt-3 ">
                        <select class="form-select form-select" onchange="showDiv3(this)">
                            <option selected>Select University</option>
                            <option value="ASSAM UNIVERSITY">ASSAM UNIVERSITY</option>
                            <option value="UNIVERSITY OF DELHI">UNIVERSITY OF DELHI</option>
                            <option value="NORTH EASTERN HILL UNIVERSITY">NORTH EASTERN HILL UNIVERSITY</option>
                            <option value="TEZPUR UNIVERSITY">TEZPUR UNIVERSITY</option>
                            <option value="MIZORAM UNIVERSITY">MIZORAM UNIVERSITY</option>
                            <option value="NAGALAND UNIVERSITY">NAGALAND UNIVERSITY</option>
                            <option value="MANIPUR UNIVERSITY">MANIPUR UNIVERSITY</option>
                            <option value="UNIVERSITY OF ALLAHABAD">UNIVERSITY` OF ALLAHABAD</option>
                            <option value="RAJIV GANDHI UNIVERSITY">RAJIV GANDHI UNIVERSITY</option>
                            <option value="TRIPURA UNIVERSITY">TRIPURA UNIVERSITY</option>
                            <option value="SIKKIM UNIVERSITY">SIKKIM UNIVERSITY</option>
                            <option value="BANARAS HINDU UNIVERSITY">BANARAS HINDU UNIVERSITY</option>
                            <option value="JAWAHARLAL NEHRU UNIVERSITY">JAWAHARLAL NEHRU UNIVERSITY</option>
                            <option value="JAMIA MILLIA ISLAMIA">JAMIA MILLIA ISLAMIA</option>
                            <option value="UNIVERSITY OF HYDERABAD">UNIVERSITY OF HYDERABAD</option>
                            <option value="PONDICHERRY UNIVERSITY">PONDICHERRY UNIVERSITY</option>
                            <option value="INDIRA GANDHI NATIONAL OPEN UNIVERSITY (IGNOU)">INDIRA GANDHI NATIONAL OPEN UNIVERSITY (IGNOU)</option>

                          </select>
                          <div id="hidden_div" class="Programmename col-md-6  mt-3 " style="display:none;">
                                      <input type="text" class="form-control" placeholder="Programme Name"  required>
                                    </div>
                                    <script type="text/javascript">
                                        function showDiv3(select){
                                           if(select.value==2){
                                             document.getElementById('hidden_div').style.display = "block";
                                           } else{
                                             document.getElementById('hidden_div').style.display = "none";
                                          }
                                          } 
                                        </script>
                                        </div>

					<h6 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">TEST PAPER/ SUBJECT SELECTION</h6>
					<div class="row mb-3"style="padding-top: 20px;">
                    <div class="row mb-3">
                        <div class="langugae1IA col-md-6  mt-3">
                          <p>Select Language from Section IA</p>
                        </div>
						<div class="col-md-6  mt-3 ">
                        <select class="form-select form-select">
                            <option selected>Select Language</option>
                            <option value="English">English</option>
                            <option value="Hindi">Hindi</option>
							<option value="Assamese">Assamese</option>
							<option value="Bengali">Bengali</option>
							<option value="Gujarati">Gujarati</option>
							<option value="Kannada">Kannada</option>
							<option value="Malayalam">Malayalam</option>
							<option value="Marathi">Marathi</option>
							<option value="Odia">Odia</option>
							<option value="Punjabi">Punjabi</option>
							<option value="Tamil">Tamil</option>
							<option value="Telugu">Telugu</option>
							<option value="Urdu">Urdu</option>
                          </select>
                    </div>

					<div class="domains1 col-md-6  mt-3">
                                      <p>Domain Specific Subject 1</p>
                                    </div>
                                    <div class="col-md-6  mt-3">
                                      <input type="text" class="form-control" placeholder="Domain Specific Subject 1" required>
                                    </div>
					
					<div class="domains2 col-md-6  mt-3">
                                      <p>Domain Specific Subject 2</p>
                                    </div>
                                    <div class="col-md-6  mt-3">
                                      <input type="text" class="form-control" placeholder="Domain Specific Subject 2" required>
                                    </div>
							
					<div class="TestIII col-md-6  mt-3">
                          <p>Do you want to apply for General Test Section III?</p>
                        </div>
						<div class="col-md-6  mt-3 ">
                        <select class="form-select form-select">
                            <option selected>Select </option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
										</select>
						</div>

						<div class="additionallangugae1IA col-md-6  mt-3">
                          <p>Select Additional Language from Section IA+IB</p>
                        </div>
						<div class="col-md-6  mt-3 ">
                        <select class="form-select form-select">
                            <option selected>Select Language</option>
                            <option value="English">English</option>
                            <option value="Hindi">Hindi</option>
							<option value="Assamese">Assamese</option>
							<option value="Bengali">Bengali</option>
							<option value="Gujarati">Gujarati</option>
							<option value="Kannada">Kannada</option>
							<option value="Malayalam">Malayalam</option>
							<option value="Marathi">Marathi</option>
							<option value="Odia">Odia</option>
							<option value="Punjabi">Punjabi</option>
							<option value="Tamil">Tamil</option>
							<option value="Telugu">Telugu</option>
							<option value="Urdu">Urdu</option>
                            <option value="Bodo">Bodo</option>
                            <option value="Chinese">Chinese</option>
							<option value="Dogri">Dogri</option>
							<option value="French">French</option>
							<option value="German">German</option>
							<option value="Italian">Italian</option>
							<option value="Japanese">Japanese</option>
							<option value="Kashmiri">Kashmiri</option>
							<option value="Konkani">Konkani</option>
							<option value="Maithili">Maithili</option>
							<option value="Manipuri">Manipuri</option>
							<option value="Nepali">Nepali</option>
							<option value="Persian">Persian</option>
							<option value="Russian">Russian</option>
							<option value="NOT APPLICABLE">NOT APPLICABLE</option>
                          </select>
                    </div>

					<div class="additionallangugae2IA col-md-6  mt-3">
                          <p>Select Additional Language from Section IA+IB in lieu of Domain Specific Subjects</p>
                        </div>
						<div class="col-md-6  mt-3 ">
                        <select class="form-select form-select" onchange="showDivadd(this)">
                            <option selected>Select Language</option>
                            <option value="English">English</option>
                            <option value="Hindi">Hindi</option>
							<option value="Assamese">Assamese</option>
							<option value="Bengali">Bengali</option>
							<option value="Gujarati">Gujarati</option>
							<option value="Kannada">Kannada</option>
							<option value="Malayalam">Malayalam</option>
							<option value="Marathi">Marathi</option>
							<option value="Odia">Odia</option>
							<option value="Punjabi">Punjabi</option>
							<option value="Tamil">Tamil</option>
							<option value="Telugu">Telugu</option>
							<option value="Urdu">Urdu</option>
                            <option value="Bodo">Bodo</option>
                            <option value="Chinese">Chinese</option>
							<option value="Dogri">Dogri</option>
							<option value="French">French</option>
							<option value="German">German</option>
							<option value="Italian">Italian</option>
							<option value="Japanese">Japanese</option>
							<option value="Kashmiri">Kashmiri</option>
							<option value="Konkani">Konkani</option>
							<option value="Maithili">Maithili</option>
							<option value="Manipuri">Manipuri</option>
							<option value="Nepali">Nepali</option>
							<option value="Persian">Persian</option>
							<option value="Russian">Russian</option>
							<option value="NOT APPLICABLE">NOT APPLICABLE</option>

                          </select>
                    </div>

					<div class="domains3 col-md-6  mt-3">
                                      <p>Domain Specific Subject 3</p>
                                    </div>
                                    <div class="col-md-6  mt-3">
                                      <input type="text" class="form-control" placeholder="Domain Specific Subject 3" required>
                                    </div>
					
					<div class="domains4 col-md-6  mt-3">
                                      <p>Domain Specific Subject 4</p>
                                    </div>
                                    <div class="col-md-6  mt-3">
                                      <input type="text" class="form-control" placeholder="Domain Specific Subject 4" required>
                                    </div>

					<div class="domains5 col-md-6  mt-3">
                                      <p>Domain Specific Subject 5</p>
                                    </div>
                                    <div class="col-md-6  mt-3">
                                      <input type="text" class="form-control" placeholder="Domain Specific Subject 5" required>
                                    </div>
					<div  id="hidden_div" class="adddomain col-md-6  mt-3" style="display:none;">
					<div class="col-md-6 mt-3">
                                      <p>Domain Specific Subject 6</p>
                                    </div>
                                    <div class="col-md-6  mt-3">
                                      <input type="text" class="form-control" placeholder="Domain Specific Subject 6" required>
                                    </div>
									<script type="text/javascript">
                                        function showDivadd(select){
                                           if(select.value==3){
                                             document.getElementById('hidden_div').style.display = "block";
                                           } else{
                                             document.getElementById('hidden_div').style.display = "none";
                                          }
                                          } 
                                        </script>
										</div>

					<h6 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">EXAM CENTER DETAILS</h6>
					<div class="row mb-3"style="padding-top: 20px;">
                    <div class="row mb-3">
                        <div class="Questinmedium col-md-6  mt-3">
                          <p>Question Paper Medium </p>
                        </div>
						<div class="col-md-6  mt-3 ">
                        <select class="form-select form-select">
                            <option selected>Select Medium</option>
                            <option value="1">Online</option>
                            <option value="2">Offline</option>
										</select>
										</div>

										</div>
						<div class="row mb-3">
                        <div class="citycenter col-md-6  mt-3">
                          <p>Center City Preference 1 </p>
                        </div>
						<div class="col-md-6  mt-3 ">
                        <select class="form-select form-select">
                            <option selected>Select City 1</option>
                            <option value="Itanagar/Naharlagun">Itanagar/Naharlagun</option>
                            <option value="Ananthpur">Ananthpur</option>
							<option value="Chirala">Chirala</option>
                            <option value="Guntur">Guntur</option>
							<option value="Kakinada">Kakinada</option>
                            <option value="Kurnool">Kurnool</option>
                            <option value="Nellore">Nellore</option>
							<option value="Rajahmundry">Rajahmundry</option>
							<option value="Tirupati">Tirupati</option>
                            <option value="Vijaywada">Vijaywada</option>
							<option value="Vishakhapatnam">Vishakhapatnam</option>
                            <option value="Vizianagaram">Vizianagaram</option>
                            <option value="Dibrugarh">Dibrugarh</option>
							<option value="Guwahati">Guwahati</option>
							<option value="Jorhat">Jorhat</option>
                            <option value="Silchar (Assam University)">Silchar (Assam University)</option>
							<option value="Tezpur">Tezpur</option>
                            <option value="Aarah">Aarah</option>
                            <option value="Bhagalpur">Bhagalpur</option>
							<option value="Darbhanga">Darbhanga</option>
							<option value="Gaya">Gaya</option>
                            <option value="Muzaffarpur">Muzaffarpur</option>
							<option value="Patna">Patna</option>
                            <option value="Purnia">Purnia</option>
                            <option value="Samastipur">Samastipur</option>
							<option value="Nagar">Nagar</option>
							<option value="Bilaspur">Bilaspur</option>
                            <option value="Raipur">Raipur</option>
							<option value="Mohali">Mohali</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Ahmedabad">Ahmedabad</option>
							<option value="Anand">Anand</option>
							<option value="Bhuj">Bhuj</option>
						</select>
					</div>

				</div>

				<div class="row mb-3">
                        <div class="citycenter2 col-md-6  mt-3">
                          <p>Center City Preference 2 </p>
                        </div>
						<div class="col-md-6  mt-3 ">
                        <select class="form-select form-select">
                            <option selected>Select City 2</option>
                            <option value="Itanagar/Naharlagun">Itanagar/Naharlagun</option>
                            <option value="Ananthpur">Ananthpur</option>
							<option value="Chirala">Chirala</option>
                            <option value="Guntur">Guntur</option>
							<option value="Kakinada">Kakinada</option>
                            <option value="Kurnool">Kurnool</option>
                            <option value="Nellore">Nellore</option>
							<option value="Rajahmundry">Rajahmundry</option>
							<option value="Tirupati">Tirupati</option>
                            <option value="Vijaywada">Vijaywada</option>
							<option value="Vishakhapatnam">Vishakhapatnam</option>
                            <option value="Vizianagaram">Vizianagaram</option>
                            <option value="Dibrugarh">Dibrugarh</option>
							<option value="Guwahati">Guwahati</option>
							<option value="Jorhat">Jorhat</option>
                            <option value="Silchar (Assam University)">Silchar (Assam University)</option>
							<option value="Tezpur">Tezpur</option>
                            <option value="Aarah">Aarah</option>
                            <option value="Bhagalpur">Bhagalpur</option>
							<option value="Darbhanga">Darbhanga</option>
							<option value="Gaya">Gaya</option>
                            <option value="Muzaffarpur">Muzaffarpur</option>
							<option value="Patna">Patna</option>
                            <option value="Purnia">Purnia</option>
                            <option value="Samastipur">Samastipur</option>
							<option value="Nagar">Nagar</option>
							<option value="Bilaspur">Bilaspur</option>
                            <option value="Raipur">Raipur</option>
							<option value="Mohali">Mohali</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Ahmedabad">Ahmedabad</option>
							<option value="Anand">Anand</option>
							<option value="Bhuj">Bhuj</option>
						</select>
					</div>

				</div>
				<div class="row mb-3">
                        <div class="citycenter3 col-md-6  mt-3">
                          <p>Center City Preference 3 </p>
                        </div>
						<div class="col-md-6  mt-3 ">
                        <select class="form-select form-select">
                            <option selected>Select City 3</option>
                            <option value="Itanagar/Naharlagun">Itanagar/Naharlagun</option>
                            <option value="Ananthpur">Ananthpur</option>
							<option value="Chirala">Chirala</option>
                            <option value="Guntur">Guntur</option>
							<option value="Kakinada">Kakinada</option>
                            <option value="Kurnool">Kurnool</option>
                            <option value="Nellore">Nellore</option>
							<option value="Rajahmundry">Rajahmundry</option>
							<option value="Tirupati">Tirupati</option>
                            <option value="Vijaywada">Vijaywada</option>
							<option value="Vishakhapatnam">Vishakhapatnam</option>
                            <option value="Vizianagaram">Vizianagaram</option>
                            <option value="Dibrugarh">Dibrugarh</option>
							<option value="Guwahati">Guwahati</option>
							<option value="Jorhat">Jorhat</option>
                            <option value="Silchar (Assam University)">Silchar (Assam University)</option>
							<option value="Tezpur">Tezpur</option>
                            <option value="Aarah">Aarah</option>
                            <option value="Bhagalpur">Bhagalpur</option>
							<option value="Darbhanga">Darbhanga</option>
							<option value="Gaya">Gaya</option>
                            <option value="Muzaffarpur">Muzaffarpur</option>
							<option value="Patna">Patna</option>
                            <option value="Purnia">Purnia</option>
                            <option value="Samastipur">Samastipur</option>
							<option value="Nagar">Nagar</option>
							<option value="Bilaspur">Bilaspur</option>
                            <option value="Raipur">Raipur</option>
							<option value="Mohali">Mohali</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Ahmedabad">Ahmedabad</option>
							<option value="Anand">Anand</option>
							<option value="Bhuj">Bhuj</option>
						</select>
					</div>

				</div>

				<div class="row mb-3">
                        <div class="citycenter4 col-md-6  mt-3">
                          <p>Center City Preference 4</p>
                        </div>
						<div class="col-md-6  mt-3 ">
                        <select class="form-select form-select">
                            <option selected>Select City 4</option>
                            <option value="Itanagar/Naharlagun">Itanagar/Naharlagun</option>
                            <option value="Ananthpur">Ananthpur</option>
							<option value="Chirala">Chirala</option>
                            <option value="Guntur">Guntur</option>
							<option value="Kakinada">Kakinada</option>
                            <option value="Kurnool">Kurnool</option>
                            <option value="Nellore">Nellore</option>
							<option value="Rajahmundry">Rajahmundry</option>
							<option value="Tirupati">Tirupati</option>
                            <option value="Vijaywada">Vijaywada</option>
							<option value="Vishakhapatnam">Vishakhapatnam</option>
                            <option value="Vizianagaram">Vizianagaram</option>
                            <option value="Dibrugarh">Dibrugarh</option>
							<option value="Guwahati">Guwahati</option>
							<option value="Jorhat">Jorhat</option>
                            <option value="Silchar (Assam University)">Silchar (Assam University)</option>
							<option value="Tezpur">Tezpur</option>
                            <option value="Aarah">Aarah</option>
                            <option value="Bhagalpur">Bhagalpur</option>
							<option value="Darbhanga">Darbhanga</option>
							<option value="Gaya">Gaya</option>
                            <option value="Muzaffarpur">Muzaffarpur</option>
							<option value="Patna">Patna</option>
                            <option value="Purnia">Purnia</option>
                            <option value="Samastipur">Samastipur</option>
							<option value="Nagar">Nagar</option>
							<option value="Bilaspur">Bilaspur</option>
                            <option value="Raipur">Raipur</option>
							<option value="Mohali">Mohali</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Ahmedabad">Ahmedabad</option>
							<option value="Anand">Anand</option>
							<option value="Bhuj">Bhuj</option>
						</select>
					</div>

				</div>


				</div>
                                        </div>
                              </div>
                              <div class="row mb-3">
                            <div class="save col-md-6  mt-3">
                                <input type="submit" class="btn btn-info" value="Confirm" onclick=to_DocumentUpload()>

                                <script>
                                  function to_DocumentUpload()
                                    {
                                    location.href = "DocumentUpload.php";
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