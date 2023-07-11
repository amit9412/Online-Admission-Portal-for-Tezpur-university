<?php
require_once("library.php");
if(!chkLogin())
{
  header("Location: signin.php");
}
require '../vendor/autoload.php';
    $client = new MongoDB\Client;
    $database=$client->Admission_portal;
    $collection = $database->academicDetails;
    $email = $_SESSION["email"];
if (isset($_POST['acadmicQSubmit'])) {
  $resultstatus10=$_POST['10resultstatus'];
  $passyear10=$_POST['10passyear'];
  $qualifyingexam10=$_POST['qualifyingexam'];
  $placeofschooling10=$_POST['10placeofschooling'];
  $BoardName10=$_POST['10BoardName'];
  $otherBoardname10=$_POST['10otherBoardname'];
  $schoolname10=$_POST['10schoolname'];
  $schoolpincode10=$_POST['10schoolpincode'];
  $rollno10=$_POST['10rollno'];
  $resultstatus12 = $_POST['12resultstatus'];
  $ResultMode12=$_POST['12ResultMode'];
  $resultstatus12=$_POST['12resultstatus'];
  $passyear12=$_POST['12passyear'];
  $qualifyingexam12=$_POST['12qualifyingexam'];
  $placeofschooling12=$_POST['12placeofschooling'];
  $BoardName12=$_POST['12BoardName'];
  $otherBoardname12=$_POST['12otherBoardname'];
  $schoolname12=$_POST['12schoolname'];
  $schoolpincode12=$_POST['12schoolpincode'];
  $rollno12=$_POST['12rollno'];
  $ResultMode12=$_POST['12ResultMode'];
  $uniname=$_POST['uniname'];
  $unicoursename=$_POST['unicoursename'];
  $unipercentage=$_POST['unipercentage'];
  $document=array(
    'Email'=>$email,
    '10Result Status' => $resultstatus10,
    '10Passing Year' => $passyear10,
    '10Qualifying Exam' => $qualifyingexam10,
    '10Place Of Schooling' => $placeofschooling10,
    '10Board Name' => $BoardName10,
    '10Other Board Name' => $otherBoardname10,
    '10School Name' => $schoolname10,
    '10School Pincode' => $schoolpincode10,
    '10Roll No' => $rollno10,
    '12Result Status' => $resultstatus12,
    '12Passing Year' => $passyear12,
    '12Qualifying Exam' => $qualifyingexam12,
    '12Place Of Schooling' => $placeofschooling12,
    '12Board Name' => $BoardName12,
    '12Other Board Name' => $otherBoardname12,
    '12School Name' => $schoolname12,
    '12School Pincode' => $schoolpincode12,
    '12Roll No' => $rollno12,
    'University Name'=>$uniname,
    'University Course'=>$unicoursename,
    'University Percentage'=>$unipercentage
  );
  $collection->insertOne($document);
  header("Location: newexamcenter.php");
}
else
{
  //echo "Some Error Occoured";
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
          

          <form class="form form-horizontal hr row gy-2 gx-3 bg-light rounded-2 shadow"method="post" >
            <h5 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">Qualification Details   (Class 10th OR Equivalent)</h5>

            <div class="row"style="padding-top: 20px;">
                <div class="col-md-4 mt-3">
                    <div class="form-outline">
                        <select class="select form-select" id="10resultstatus" name="10resultstatus">
                          <option selected>Select Status</option>
                          <option value="passed">Passed</option>
                          <option value="Ongoing">Ongoing</option>
                          <option value="other">Other</option>
                        </select>
                        <label class="form-label select-label" for="10resultstatus">Result Status</label>
                    </div>
                </div>

                <div class=" col-md-4 mt-3">
                    <div class="form-outline">
                        <select class="select form-select" id="10passyear" name="10passyear">
                            <option selected>Select Year</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2011">2021</option>
                            <option value="2033">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <label class="form-label select-label" for="10passyear">Passing Year</label>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-outline">
                        <input type="text" id="qualifyingexam" class="form-control " value="10th" name="qualifyingexam"/>
                        <label class="form-label" for="qualifyingexam">Qualifying Exam</label>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-outline">
                        <select class="select form-select" id="10placeofschooling" name="10placeofschooling">
                            <option selected>Select Place</option>
                            <option value="Rural">Rural</option>
                            <option value="Urban">Urban</option>
                        </select>
                        <label class="form-label" for="10placeofschooling">Place of Schooling</label>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-outline">
                        <select class="select form-select" name="10BoardName" id="10BoardName" onchange="showDiv(this)">
                            <option selected>Select Board</option>
                            <option value="CBSE">CBSE</option>
                            <option value="ICSE">ICSE</option>
                            <option value="State Board">State Board</option>
                        </select>
                        <label class="form-label" for="10BoardName">Board Name</label> 
                    </div>
                </div>
                <div id="hidden_div" class="col-md-4 mt-3" style="display:none;">
                    <input type="text" class="form-control" id="10otherBoardname"  required>
                    <label class="form-label" for="10otherBoardName">Please specify State Board Name</label>
                </div>
                <script type="text/javascript">
                    function showDiv(select){
                        if(select.value==3){
                        document.getElementById('hidden_div').style.display = "block";
                        } else{
                        document.getElementById('hidden_div').style.display = "none";
                        }
                        } 
                </script>
            </div>

            <div class="row">
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                    <input type="text" id="10schoolname" name="10schoolname" class="form-control "placeholder="School Name"/>
                    <label class="form-label" for="10schoolname">School/College Name Address</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                    <input type="number" id="10schoolpincode" name="10schoolpincode" class="form-control "placeholder="School Pincode"/>
                    <label class="form-label" for="10schoolpincode">School/College Pincode</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                    <input type="number" id="10rollno" name="10rollno" class="form-control "placeholder="Roll No."/>
                    <label class="form-label" for="10rollno">Roll No.</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <select class="form-select form-select" id="10ResultMode" name="10ResultMode" onchange="showDiv()">
                    <option selected>Select Mode</option>
                    <option value="Grade">Grade</option>
                    <option value="Percentage">Percentage</option>
                  </select>
                  <label class="form-label" for="10ResultMode">Result Mode</label>
                </div>
              </div>
            </div>

            <!--class12th-->
            <h5 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">Qualification Details   (Class 12th OR Equivalent)</h5>

            <div class="row"style="padding-top: 20px;">
                <div class="col-md-4 mt-3">
                    <div class="form-outline">
                        <select class="select form-select" id="12resultstatus" name="12resultstatus">
                          <option selected>Select Status</option>
                          <option value="Passed">Passed</option>
                          <option value="Ongoing">Ongoing</option>
                          <option value="Other">Other</option>
                        </select>
                        <label class="form-label select-label" for="12resultstatus">Result Status</label>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-outline">
                        <select class="select form-select" id="12passyear" name="12passyear">
                            <option selected>Select Year</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2011">2021</option>
                            <option value="2033">2022</option>
                            <option value="2023">2023</option>
    
                        </select>
                        <label class="form-label select-label" for="12passyear">Passing Year</label>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-outline">
                        <input type="text" id="12qualifyingexam" name="12qualifyingexam" class="form-control " value="12th"/>
                        <label class="form-label" for="12qualifyingexam">Qualifying Exam</label>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-outline">
                        <select class="select form-select" id="12placeofschooling" name="12placeofschooling">
                            <option selected>Select Place</option>
                            <option value="Rural">Rural</option>
                            <option value="Urban">Urban</option>
                        </select>
                        <label class="form-label" for="12placeofschooling">Place of Schooling</label>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-outline">
                        <select class="select form-select" id="12BoardName" name="12BoardName" onchange="showDiv(this)">
                            <option selected>Select Board</option>
                            <option value="CBSE">CBSE</option>
                            <option value="ICSE">ICSE</option>
                            <option value="Other">Other</option>
                        </select>
                        <label class="form-label" for="12BoardName">Board Name</label> 
                    </div>
                </div>
                <div id="hidden_div" class="col-md-4 mt-3" style="display:none;">
                    <input type="text" class="form-control" id="12otherBoardname" name="12otherBoardname" required>
                    <label class="form-label" for="12otherBoardName">Please specify Other Board Name</label>
                </div>
                <script type="text/javascript">
                    function showDiv(select){
                        if(select.value==3){
                        document.getElementById('hidden_div').style.display = "block";
                        } else{
                        document.getElementById('hidden_div').style.display = "none";
                        }
                        } 
                </script>
            </div>

            <div class="row">
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                    <input type="text" id="12schoolname" name="12schoolname" class="form-control "placeholder="School Name"/>
                    <label class="form-label" for="12schoolname">School/College Name Address</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                    <input type="number" id="12schoolpincode" name="12schoolpincode" class="form-control "placeholder="School Pincode"/>
                    <label class="form-label" for="12schoolpincode">School/College Pincode</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                    <input type="number" id="12rollno" name="12rollno" class="form-control "placeholder="Roll No."/>
                    <label class="form-label" for="12rollno">Roll No.</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <select class="form-select form-select" id="12ResultMode" name="12ResultMode" onchange="showDiv()">
                    <option selected>Select Mode</option>
                    <option value="Grade">Grade</option>
                    <option value="Percentage">Percentage</option>
                  </select>
                  <label class="form-label" for="12ResultMode">Result Mode</label>
                </div>
              </div>
            </div>

            <!--Programme selection-->
            <h5 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">Qualification Details   (Degree) If Applicable</h5>

            <div class="row"style="padding-top: 20px;">
            <div class="row">

            <div class="col-md-4 mt-3">
                <div class="form-outline">
                    <input type="text" id="uniname" name="uniname" class="form-control "placeholder="University Name"/>
                    <label class="form-label" for="uniname">University Name</label>
                </div>
              </div>
              
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                    <input type="text" id="unicoursename" name="unicoursename" class="form-control "placeholder="Course Name"/>
                    <label class="form-label" for="unicoursename">Course Name</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                    <input type="char" id="unipercentage" name="unipercentage" class="form-control "placeholder="Percentage"/>
                    <label class="form-label" for="unipercentage">Percentage Obtained</label>
                </div>
              </div>
            </div>

            </div>

            <div class="row mb-3">
              <div class="save col-md-6  mt-3">
                  <input type="submit" class="btn btn-info" value="Save and proceed" name="acadmicQSubmit">

                  <script>
                    function to_newprogram()
                      {
                      location.href = "newprogramselect.php";
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