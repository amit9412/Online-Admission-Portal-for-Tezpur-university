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
$criteria = array("Email"=> $email);
$query = $collection->findOne($criteria);
if(empty($query)){

  if (isset($_POST['personalDetail_submit'])) {

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $nationality = $_POST['nationality'];
    $category = $_POST['category'];
    $fname = $_POST['fathername'];
    $fatherqualification = $_POST['fatherqualification'];
    $fatheroccupation = $_POST['fatheroccupation'];
    $mothername = $_POST['mothername'];
    $motherqualification = $_POST['motherqualification'];
    $motheroccupation = $_POST['motheroccupation'];
    $pwd = $_POST['PWD'];
    $twin = $_POST['twin'];
    $premise1 = $_POST['premises1'];
    $sublocality1 = $_POST['sublocality1'];
    $locality1 = $_POST['locality1'];
    $country1 = $_POST['country1'];
    $stateUT1 = $_POST['stateUT1'];
    $District1 = $_POST['District1'];
    $pincode1 = $_POST['pincode1'];
    $premise2 = $_POST['premises2'];
    $sublocality2 = $_POST['sublocality2'];
    $locality2 = $_POST['locality2'];
    $country2 = $_POST['country2'];
    $stateUT2 = $_POST['stateUT2'];
    $District2 = $_POST['District2'];
    $pincode2 = $_POST['pincode2'];
    $bpl = $_POST['BPL'];
    $KashmiriMigrant = $_POST['KashmiriMigrant'];
    $Wardofexs = $_POST['Wardofexs'];
    $NCC = $_POST['NCC'];
    $sports = $_POST['Sports'];
    $Wardofuni = $_POST['Wardofuni'];

    $document = array(
      'Email' => $email,
      'First Name' => $fname,
      'Middle Name' => $mname,
      'Last Name' => $lname,
      'Date of Birth' => $dob,
      'Gender' => $gender,
      'Nationality' => $nationality,
      'Category' => $category,
      'Father Name' => $fname,
      'Father Qualification' => $fatherqualification,
      'Father Occupation' => $fatheroccupation,
      'Mother Name' => $mothername,
      'Mother Qualification' => $motherqualification,
      'Mother Occupation' => $motheroccupation,
      'PWD' => $pwd,
      'Twin' => $twin,
      'Present Address' => array(
        'premises' => $premise1,
        'sublocality' => $sublocality1,
        'locality' => $locality1,
        'country' => $country1,
        'StateUT' => $stateUT1,
        'district' => $District1,
        'pincode' => $pincode1
      ),
      'Current Address' => array(
        'premises' => $premise2,
        'sublocality' => $sublocality2,
        'locality' => $locality2,
        'country' => $country2,
        'StateUT' => $stateUT2,
        'district' => $District2,
        'pincode' => $pincode2
      ),
      'BPL' => $bpl,
      'Kashmiri Migrant' => $KashmiriMigrant,
      'NCC' => $NCC,
      'Sports' => $sports,
      'Wards of Staff' => $Wardofuni,
      'Wards of ex-servicemen' => $Wardofexs
    );
    $collection->insertOne($document);
    header("Location: newAcademicQ.php");
  }
}
else{
  header("Location: newAcademicQ.php");
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
							<a href="DocumentUpload.php" class="nav-link align-middle px-0">
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

      <!--body-->
      <div class="mt-4 ps-4 pe-5 " style="width:1030px;">
        <div class="d-flex justify-content-between">
          

          <form class="form form-horizontal hr row gy-2 gx-3 bg-light rounded-2 shadow" method="post" >
            <h5 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">Students Personal Details</h5>

            <div class="row"style="padding-top: 20px;">
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="fname" class="form-control " name="fname"/>
                  <label class="form-label" for="fname">First name</label>
                </div>
              </div>
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="mname" class="form-control"name="mname" />
                  <label class="form-label" for="mname">Middle name</label>
                </div>
              </div>
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="lname" class="form-control "name="lname" />
                  <label class="form-label" for="lname">Last name</label>
                </div>
              </div>
            </div>

            <div class="row "style="padding-top: 20px;">
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input id="startDate" class="form-control" type="date" name="dob"/>
                    <span id="startDateSelected"></span>
                    <label class="form-label" for="dob">Date of Birth</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <select class="select form-select" id="gender" name="gender">
                    <option selected>Select Option</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                  <label class="form-label select-label" for="gender">Gender</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <select class="select form-select" id="nationality" name="nationality">
                    <option selected>Select Nationality</option>
                    <option value="indian">Indian</option>
                    <option value="non-Indian">Non-Indian</option>
                  </select>
                  <label class="form-label select-label" for="nationality">Nationality</label>
                </div>
              </div>
            </div>

            <div class="row "style="padding-top: 20px;">
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <select class="form-select " id="category" name="category">
                    <option selected>Select Category</option>
                    <option value="General">General</option>
                    <option value="OBC">OBC</option>
                    <option value="OBC-NCL">OBC-NCL</option>
                    <option value="ST-Hills">ST-HILLS</option>
                    <option value="ST-Plain">ST-PLAIN</option>
                    <option value="SC">SC</option>
                  </select>
                  <label class="form-label select-label" for="category">Category</label>
                </div>
              </div>
            </div>

            <div class="row "style="padding-top: 20px;">
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="fathername" class="form-control " name="fathername" />
                  <label class="form-label" for="fname">Fathers name</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <select class="form-select " id="fatherqualification" name="fatherqualification">
                    <option selected>Select Qualification</option>
                      <option value="Metric">Matric</option>
                      <option value="High_School">High school</option>
                      <option value="Graduation">Graduation</option>
                      <option value="post_graduation">Post Graduation</option>
                    </select>
                  </select>
                  <label class="form-label select-label" for="fatherqualification">Fathers Qualification</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <select class="form-select " id="fatheroccupation" name="fatheroccupation">
                    <option selected>Select Occupation</option>
                      <option value="public">Public</option>
                      <option value="private">Private</option>
                      <option value="Buisness_man">Business-man</option>
                      <option value="Other">Other</option>
                    </select>
                  </select>
                  <label class="form-label select-label" for="fatheroccupation">Fathers Occupation</label>
                </div>
              </div>
            </div>

            <div class="row "style="padding-top: 20px;">
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="mothername" class="form-control " name="mothername" />
                  <label class="form-label" for="mothername">Mothers name</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <select class="form-select " id="motherqualification" name="motherqualification">
                    <option selected>Select Qualification</option>
                      <option value="Metric">Matric</option>
                      <option value="Highschool">High school</option>
                      <option value="graduation">Graduation</option>
                      <option value="post_Graduation">Post Graduation</option>
                    </select>
                  </select>
                  <label class="form-label select-label" for="motherqualification">Mothers Qualification</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <select class="form-select " id="motheroccupation" name="motheroccupation">
                    <option selected>Select Occupation</option>
                      <option value="public">Public</option>
                      <option value="private">Private</option>
                      <option value="Buisness_women">Business-women</option>
                      <option value="Other">Other</option>
                    </select>
                  </select>
                  <label class="form-label select-label" for="motheroccupation">Mothers Occupation</label>
                </div>
              </div>
            </div>

            <div class="row "style="padding-top: 20px;">
              <div class=" col-md-8  mt-3">
                <p>Are you a PwBD Candidate with
                  benchmark disability 40% or more/severe where percentage is
                  not defined?</p>
                  
              </div>
              <div class="col-md-4  mt-3 ">
                  <select class=" form-select" id="PWD" name="PWD">
                      <option selected>Select Option</option>
                      <option value="yes">yes</option>
                      <option value="no">No</option>
                    </select>
              </div>
            </div>

            <div class="row "style="padding-top: 20px;">
              <div class=" col-md-8  mt-3">
                <p>Are you a twin?</p>
                  
              </div>
              <div class="col-md-4  mt-3 ">
                  <select class=" form-select" id="twin" name="twin">
                      <option selected>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
              </div>
            </div>

            <br>

            <!--Present address-->
            <h5 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">Present Address Information</h5>

            <div class="row"style="padding-top: 20px;">
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="premises1" name ="premises1" class="form-control " />
                  <label class="form-label" for="premises1">Premises No./Name</label>
                </div>
              </div>
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="sublocality1" name="sublocality1" class="form-control" />
                  <label class="form-label" for="sublocality1">Sub Locality</label>
                </div>
              </div>
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="locality1" name="locality1" class="form-control " />
                  <label class="form-label" for="locality1">Locality</label>
                </div>
              </div>
            </div>

            <div class="row"style="padding-top: 20px;">
              <div class="col-md-4  mt-3 ">
                <div class="form-outline">
                  <select class=" form-select" id="country1" name="country1">
                    <option>Select Country</option>
                    <option value="AF">Afghanistan</option>
                    <option value="AX">Aland Islands</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AS">American Samoa</option>
                    <option value="AD">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antarctica</option>
                    <option value="AG">Antigua and Barbuda</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AW">Aruba</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaijan</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">Bahrain</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbados</option>
                    <option value="BY">Belarus</option>
                    <option value="BE">Belgium</option>
                    <option value="BZ">Belize</option>
                    <option value="BJ">Benin</option>
                    <option value="BM">Bermuda</option>
                    <option value="BT">Bhutan</option>
                    <option value="BO">Bolivia</option>
                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                    <option value="BA">Bosnia and Herzegovina</option>
                    <option value="BW">Botswana</option>
                    <option value="BV">Bouvet Island</option>
                    <option value="BR">Brazil</option>
                    <option value="IO">British Indian Ocean Territory</option>
                    <option value="BN">Brunei Darussalam</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="KH">Cambodia</option>
                    <option value="CM">Cameroon</option>
                    <option value="CA">Canada</option>
                    <option value="CV">Cape Verde</option>
                    <option value="KY">Cayman Islands</option>
                    <option value="CF">Central African Republic</option>
                    <option value="TD">Chad</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CX">Christmas Island</option>
                    <option value="CC">Cocos (Keeling) Islands</option>
                    <option value="CO">Colombia</option>
                    <option value="KM">Comoros</option>
                    <option value="CG">Congo</option>
                    <option value="CD">Congo, Democratic Republic of the Congo</option>
                    <option value="CK">Cook Islands</option>
                    <option value="CR">Costa Rica</option>
                    <option value="CI">Cote D'Ivoire</option>
                    <option value="HR">Croatia</option>
                    <option value="CU">Cuba</option>
                    <option value="CW">Curacao</option>
                    <option value="CY">Cyprus</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="DK">Denmark</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="DO">Dominican Republic</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egypt</option>
                    <option value="SV">El Salvador</option>
                    <option value="GQ">Equatorial Guinea</option>
                    <option value="ER">Eritrea</option>
                    <option value="EE">Estonia</option>
                    <option value="ET">Ethiopia</option>
                    <option value="FK">Falkland Islands (Malvinas)</option>
                    <option value="FO">Faroe Islands</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="GF">French Guiana</option>
                    <option value="PF">French Polynesia</option>
                    <option value="TF">French Southern Territories</option>
                    <option value="GA">Gabon</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="DE">Germany</option>
                    <option value="GH">Ghana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GR">Greece</option>
                    <option value="GL">Greenland</option>
                    <option value="GD">Grenada</option>
                    <option value="GP">Guadeloupe</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GG">Guernsey</option>
                    <option value="GN">Guinea</option>
                    <option value="GW">Guinea-Bissau</option>
                    <option value="GY">Guyana</option>
                    <option value="HT">Haiti</option>
                    <option value="HM">Heard Island and Mcdonald Islands</option>
                    <option value="VA">Holy See (Vatican City State)</option>
                    <option value="HN">Honduras</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HU">Hungary</option>
                    <option value="IS">Iceland</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IR">Iran, Islamic Republic of</option>
                    <option value="IQ">Iraq</option>
                    <option value="IE">Ireland</option>
                    <option value="IM">Isle of Man</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italy</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japan</option>
                    <option value="JE">Jersey</option>
                    <option value="JO">Jordan</option>
                    <option value="KZ">Kazakhstan</option>
                    <option value="KE">Kenya</option>
                    <option value="KI">Kiribati</option>
                    <option value="KP">Korea, Democratic People's Republic of</option>
                    <option value="KR">Korea, Republic of</option>
                    <option value="XK">Kosovo</option>
                    <option value="KW">Kuwait</option>
                    <option value="KG">Kyrgyzstan</option>
                    <option value="LA">Lao People's Democratic Republic</option>
                    <option value="LV">Latvia</option>
                    <option value="LB">Lebanon</option>
                    <option value="LS">Lesotho</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libyan Arab Jamahiriya</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lithuania</option>
                    <option value="LU">Luxembourg</option>
                    <option value="MO">Macao</option>
                    <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                    <option value="MG">Madagascar</option>
                    <option value="MW">Malawi</option>
                    <option value="MY">Malaysia</option>
                    <option value="MV">Maldives</option>
                    <option value="ML">Mali</option>
                    <option value="MT">Malta</option>
                    <option value="MH">Marshall Islands</option>
                    <option value="MQ">Martinique</option>
                    <option value="MR">Mauritania</option>
                    <option value="MU">Mauritius</option>
                    <option value="YT">Mayotte</option>
                    <option value="MX">Mexico</option>
                    <option value="FM">Micronesia, Federated States of</option>
                    <option value="MD">Moldova, Republic of</option>
                    <option value="MC">Monaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="ME">Montenegro</option>
                    <option value="MS">Montserrat</option>
                    <option value="MA">Morocco</option>
                    <option value="MZ">Mozambique</option>
                    <option value="MM">Myanmar</option>
                    <option value="NA">Namibia</option>
                    <option value="NR">Nauru</option>
                    <option value="NP">Nepal</option>
                    <option value="NL">Netherlands</option>
                    <option value="AN">Netherlands Antilles</option>
                    <option value="NC">New Caledonia</option>
                    <option value="NZ">New Zealand</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Niger</option>
                    <option value="NG">Nigeria</option>
                    <option value="NU">Niue</option>
                    <option value="NF">Norfolk Island</option>
                    <option value="MP">Northern Mariana Islands</option>
                    <option value="NO">Norway</option>
                    <option value="OM">Oman</option>
                    <option value="PK">Pakistan</option>
                    <option value="PW">Palau</option>
                    <option value="PS">Palestinian Territory, Occupied</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="RE">Reunion</option>
                    <option value="RO">Romania</option>
                    <option value="RU">Russian Federation</option>
                    <option value="RW">Rwanda</option>
                    <option value="BL">Saint Barthelemy</option>
                    <option value="SH">Saint Helena</option>
                    <option value="KN">Saint Kitts and Nevis</option>
                    <option value="LC">Saint Lucia</option>
                    <option value="MF">Saint Martin</option>
                    <option value="PM">Saint Pierre and Miquelon</option>
                    <option value="VC">Saint Vincent and the Grenadines</option>
                    <option value="WS">Samoa</option>
                    <option value="SM">San Marino</option>
                    <option value="ST">Sao Tome and Principe</option>
                    <option value="SA">Saudi Arabia</option>
                    <option value="SN">Senegal</option>
                    <option value="RS">Serbia</option>
                    <option value="CS">Serbia and Montenegro</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leone</option>
                    <option value="SG">Singapore</option>
                    <option value="SX">Sint Maarten</option>
                    <option value="SK">Slovakia</option>
                    <option value="SI">Slovenia</option>
                    <option value="SB">Solomon Islands</option>
                    <option value="SO">Somalia</option>
                    <option value="ZA">South Africa</option>
                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                    <option value="SS">South Sudan</option>
                    <option value="ES">Spain</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="SD">Sudan</option>
                    <option value="SR">Suriname</option>
                    <option value="SJ">Svalbard and Jan Mayen</option>
                    <option value="SZ">Swaziland</option>
                    <option value="SE">Sweden</option>
                    <option value="CH">Switzerland</option>
                    <option value="SY">Syrian Arab Republic</option>
                    <option value="TW">Taiwan, Province of China</option>
                    <option value="TJ">Tajikistan</option>
                    <option value="TZ">Tanzania, United Republic of</option>
                    <option value="TH">Thailand</option>
                    <option value="TL">Timor-Leste</option>
                    <option value="TG">Togo</option>
                    <option value="TK">Tokelau</option>
                    <option value="TO">Tonga</option>
                    <option value="TT">Trinidad and Tobago</option>
                    <option value="TN">Tunisia</option>
                    <option value="TR">Turkey</option>
                    <option value="TM">Turkmenistan</option>
                    <option value="TC">Turks and Caicos Islands</option>
                    <option value="TV">Tuvalu</option>
                    <option value="UG">Uganda</option>
                    <option value="UA">Ukraine</option>
                    <option value="AE">United Arab Emirates</option>
                    <option value="GB">United Kingdom</option>
                    <option value="US">United States</option>
                    <option value="UM">United States Minor Outlying Islands</option>
                    <option value="UY">Uruguay</option>
                    <option value="UZ">Uzbekistan</option>
                    <option value="VU">Vanuatu</option>
                    <option value="VE">Venezuela</option>
                    <option value="VN">Viet Nam</option>
                    <option value="VG">Virgin Islands, British</option>
                    <option value="VI">Virgin Islands, U.s.</option>
                    <option value="WF">Wallis and Futuna</option>
                    <option value="EH">Western Sahara</option>
                    <option value="YE">Yemen</option>
                    <option value="ZM">Zambia</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
                <label class="form-label" for="country1">Country</label>
                </div>
              </div>

              <div class="col-md-4  mt-3 ">
                <div class="form-outline">
                  <select class=" form-select" id="stateUT1" name="stateUT1">
                  <option>Select State/UT</option>
                  <option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
                  </select>
                  <label class="form-label" for="stateUT1">State/ Union Territory</label>
                </div>
              </div>

              <div class="col-md-4  mt-3 ">
                <div class="form-outline">
                  <input type="text" class=" form-control" id="District1" name="District1"/>
                  <label class="form-label" for="District1">District</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="pincode1" class="form-control " name="pincode1" />
                  <label class="form-label" for="pincode1">Pincode</label>
                </div>
            </div>

            <br>

            <!--Permament address-->
            <h5 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">Permanent Address Information</h5>

            <div class="row"style="padding-top: 20px;">
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="premises2" class="form-control " name="premises2"/>
                  <label class="form-label" for="premises2">Premises No./Name</label>
                </div>
              </div>
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="sublocality2" class="form-control" name="sublocality2" />
                  <label class="form-label" for="sublocality2">Sub Locality</label>
                </div>
              </div>
              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="locality2" class="form-control " name="locality2" />
                  <label class="form-label" for="locality2">Locality</label>
                </div>
              </div>
            </div>

            <div class="row"style="padding-top: 20px;">
              <div class="col-md-4  mt-3 ">
                <div class="form-outline">
                  <select class=" form-select" id="country2" name="country2">
                    <option>Select Country</option>
                    <option value="AF">Afghanistan</option>
                    <option value="AX">Aland Islands</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AS">American Samoa</option>
                    <option value="AD">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antarctica</option>
                    <option value="AG">Antigua and Barbuda</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AW">Aruba</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaijan</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">Bahrain</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbados</option>
                    <option value="BY">Belarus</option>
                    <option value="BE">Belgium</option>
                    <option value="BZ">Belize</option>
                    <option value="BJ">Benin</option>
                    <option value="BM">Bermuda</option>
                    <option value="BT">Bhutan</option>
                    <option value="BO">Bolivia</option>
                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                    <option value="BA">Bosnia and Herzegovina</option>
                    <option value="BW">Botswana</option>
                    <option value="BV">Bouvet Island</option>
                    <option value="BR">Brazil</option>
                    <option value="IO">British Indian Ocean Territory</option>
                    <option value="BN">Brunei Darussalam</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="KH">Cambodia</option>
                    <option value="CM">Cameroon</option>
                    <option value="CA">Canada</option>
                    <option value="CV">Cape Verde</option>
                    <option value="KY">Cayman Islands</option>
                    <option value="CF">Central African Republic</option>
                    <option value="TD">Chad</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CX">Christmas Island</option>
                    <option value="CC">Cocos (Keeling) Islands</option>
                    <option value="CO">Colombia</option>
                    <option value="KM">Comoros</option>
                    <option value="CG">Congo</option>
                    <option value="CD">Congo, Democratic Republic of the Congo</option>
                    <option value="CK">Cook Islands</option>
                    <option value="CR">Costa Rica</option>
                    <option value="CI">Cote D'Ivoire</option>
                    <option value="HR">Croatia</option>
                    <option value="CU">Cuba</option>
                    <option value="CW">Curacao</option>
                    <option value="CY">Cyprus</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="DK">Denmark</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="DO">Dominican Republic</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egypt</option>
                    <option value="SV">El Salvador</option>
                    <option value="GQ">Equatorial Guinea</option>
                    <option value="ER">Eritrea</option>
                    <option value="EE">Estonia</option>
                    <option value="ET">Ethiopia</option>
                    <option value="FK">Falkland Islands (Malvinas)</option>
                    <option value="FO">Faroe Islands</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="GF">French Guiana</option>
                    <option value="PF">French Polynesia</option>
                    <option value="TF">French Southern Territories</option>
                    <option value="GA">Gabon</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="DE">Germany</option>
                    <option value="GH">Ghana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GR">Greece</option>
                    <option value="GL">Greenland</option>
                    <option value="GD">Grenada</option>
                    <option value="GP">Guadeloupe</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GG">Guernsey</option>
                    <option value="GN">Guinea</option>
                    <option value="GW">Guinea-Bissau</option>
                    <option value="GY">Guyana</option>
                    <option value="HT">Haiti</option>
                    <option value="HM">Heard Island and Mcdonald Islands</option>
                    <option value="VA">Holy See (Vatican City State)</option>
                    <option value="HN">Honduras</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HU">Hungary</option>
                    <option value="IS">Iceland</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IR">Iran, Islamic Republic of</option>
                    <option value="IQ">Iraq</option>
                    <option value="IE">Ireland</option>
                    <option value="IM">Isle of Man</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italy</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japan</option>
                    <option value="JE">Jersey</option>
                    <option value="JO">Jordan</option>
                    <option value="KZ">Kazakhstan</option>
                    <option value="KE">Kenya</option>
                    <option value="KI">Kiribati</option>
                    <option value="KP">Korea, Democratic People's Republic of</option>
                    <option value="KR">Korea, Republic of</option>
                    <option value="XK">Kosovo</option>
                    <option value="KW">Kuwait</option>
                    <option value="KG">Kyrgyzstan</option>
                    <option value="LA">Lao People's Democratic Republic</option>
                    <option value="LV">Latvia</option>
                    <option value="LB">Lebanon</option>
                    <option value="LS">Lesotho</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libyan Arab Jamahiriya</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lithuania</option>
                    <option value="LU">Luxembourg</option>
                    <option value="MO">Macao</option>
                    <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                    <option value="MG">Madagascar</option>
                    <option value="MW">Malawi</option>
                    <option value="MY">Malaysia</option>
                    <option value="MV">Maldives</option>
                    <option value="ML">Mali</option>
                    <option value="MT">Malta</option>
                    <option value="MH">Marshall Islands</option>
                    <option value="MQ">Martinique</option>
                    <option value="MR">Mauritania</option>
                    <option value="MU">Mauritius</option>
                    <option value="YT">Mayotte</option>
                    <option value="MX">Mexico</option>
                    <option value="FM">Micronesia, Federated States of</option>
                    <option value="MD">Moldova, Republic of</option>
                    <option value="MC">Monaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="ME">Montenegro</option>
                    <option value="MS">Montserrat</option>
                    <option value="MA">Morocco</option>
                    <option value="MZ">Mozambique</option>
                    <option value="MM">Myanmar</option>
                    <option value="NA">Namibia</option>
                    <option value="NR">Nauru</option>
                    <option value="NP">Nepal</option>
                    <option value="NL">Netherlands</option>
                    <option value="AN">Netherlands Antilles</option>
                    <option value="NC">New Caledonia</option>
                    <option value="NZ">New Zealand</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Niger</option>
                    <option value="NG">Nigeria</option>
                    <option value="NU">Niue</option>
                    <option value="NF">Norfolk Island</option>
                    <option value="MP">Northern Mariana Islands</option>
                    <option value="NO">Norway</option>
                    <option value="OM">Oman</option>
                    <option value="PK">Pakistan</option>
                    <option value="PW">Palau</option>
                    <option value="PS">Palestinian Territory, Occupied</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="RE">Reunion</option>
                    <option value="RO">Romania</option>
                    <option value="RU">Russian Federation</option>
                    <option value="RW">Rwanda</option>
                    <option value="BL">Saint Barthelemy</option>
                    <option value="SH">Saint Helena</option>
                    <option value="KN">Saint Kitts and Nevis</option>
                    <option value="LC">Saint Lucia</option>
                    <option value="MF">Saint Martin</option>
                    <option value="PM">Saint Pierre and Miquelon</option>
                    <option value="VC">Saint Vincent and the Grenadines</option>
                    <option value="WS">Samoa</option>
                    <option value="SM">San Marino</option>
                    <option value="ST">Sao Tome and Principe</option>
                    <option value="SA">Saudi Arabia</option>
                    <option value="SN">Senegal</option>
                    <option value="RS">Serbia</option>
                    <option value="CS">Serbia and Montenegro</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leone</option>
                    <option value="SG">Singapore</option>
                    <option value="SX">Sint Maarten</option>
                    <option value="SK">Slovakia</option>
                    <option value="SI">Slovenia</option>
                    <option value="SB">Solomon Islands</option>
                    <option value="SO">Somalia</option>
                    <option value="ZA">South Africa</option>
                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                    <option value="SS">South Sudan</option>
                    <option value="ES">Spain</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="SD">Sudan</option>
                    <option value="SR">Suriname</option>
                    <option value="SJ">Svalbard and Jan Mayen</option>
                    <option value="SZ">Swaziland</option>
                    <option value="SE">Sweden</option>
                    <option value="CH">Switzerland</option>
                    <option value="SY">Syrian Arab Republic</option>
                    <option value="TW">Taiwan, Province of China</option>
                    <option value="TJ">Tajikistan</option>
                    <option value="TZ">Tanzania, United Republic of</option>
                    <option value="TH">Thailand</option>
                    <option value="TL">Timor-Leste</option>
                    <option value="TG">Togo</option>
                    <option value="TK">Tokelau</option>
                    <option value="TO">Tonga</option>
                    <option value="TT">Trinidad and Tobago</option>
                    <option value="TN">Tunisia</option>
                    <option value="TR">Turkey</option>
                    <option value="TM">Turkmenistan</option>
                    <option value="TC">Turks and Caicos Islands</option>
                    <option value="TV">Tuvalu</option>
                    <option value="UG">Uganda</option>
                    <option value="UA">Ukraine</option>
                    <option value="AE">United Arab Emirates</option>
                    <option value="GB">United Kingdom</option>
                    <option value="US">United States</option>
                    <option value="UM">United States Minor Outlying Islands</option>
                    <option value="UY">Uruguay</option>
                    <option value="UZ">Uzbekistan</option>
                    <option value="VU">Vanuatu</option>
                    <option value="VE">Venezuela</option>
                    <option value="VN">Viet Nam</option>
                    <option value="VG">Virgin Islands, British</option>
                    <option value="VI">Virgin Islands, U.s.</option>
                    <option value="WF">Wallis and Futuna</option>
                    <option value="EH">Western Sahara</option>
                    <option value="YE">Yemen</option>
                    <option value="ZM">Zambia</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
                <label class="form-label" for="country2">Country</label>
                </div>
              </div>

              <div class="col-md-4  mt-3 ">
                <div class="form-outline">
                  <select class=" form-select" id="stateUT2" name="stateUT2">
                  <option>Select State/UT</option>
                  <option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
                  </select>
                  <label class="form-label" for="stateUT2">State/ Union Territory</label>
                </div>
              </div>

              <div class="col-md-4  mt-3 ">
                <div class="form-outline">
                  <input type="text" class=" form-control" id="District2" name="District2">
                  
                  <label class="form-label" for="District2">District</label>
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-outline">
                  <input type="text" id="pincode2" class="form-control " name="pincode2"/>
                  <label class="form-label" for="pincode2">Pincode</label>
                </div>
            </div>
             <br>
            <!--Other Quaotas and Categories-->
           
            <h5 class="fw-bold" style="padding-top: 20px; padding-left: 10px;">Other Quaotas and Categories</h5>

            <div class="row"style="padding-top: 20px;">
              <div class=" col-md-8  mt-3">
                <p>Do you belong to Below Poverty Line?</p> 
              </div>
              <div class="col-md-4  mt-3 ">
                  <select class=" form-select" id="BPL" name="BPL">
                      <option selected>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
              </div>
            </div>

            <div class="row"style="padding-top: 20px;">
              <div class=" col-md-8  mt-3">
                <p>Are you a Kashmiri Migrant?</p> 
              </div>
              <div class="col-md-4  mt-3 ">
                  <select class=" form-select" id="KashmiriMigrant" name="KashmiriMigrant">
                      <option selected>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
              </div>
            </div>

            <div class="row"style="padding-top: 20px;">
              <div class=" col-md-8  mt-3">
                <p>Ward of Ex-Servicemen?</p> 
              </div>
              <div class="col-md-4  mt-3 ">
                  <select class=" form-select" id="Wardofexs" name="Wardofexs">
                      <option selected>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
              </div>
            </div>

            <div class="row"style="padding-top: 20px;">
              <div class=" col-md-8  mt-3">
                <p>Do you have NCC Quota?</p> 
              </div>
              <div class="col-md-4  mt-3 ">
                  <select class=" form-select" id="NCC" name="NCC">
                      <option selected>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
              </div>
            </div>

            <div class="row"style="padding-top: 20px;">
              <div class=" col-md-8  mt-3">
                <p>Do you have Sports Quota?</p> 
              </div>
              <div class="col-md-4  mt-3 ">
                  <select class=" form-select" id="Sports"  name="Sports">
                      <option selected>Select Option</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
              </div>
            </div>

            <div class="row"style="padding-top: 20px;">
              <div class=" col-md-8  mt-3">
                <p>Are you a ward of university Employee?</p> 
              </div>
              <div class="col-md-4  mt-3 ">
                  <select class=" form-select" id="Wardofuni" name="Wardofuni">
                      <option selected>Select Option</option>
                      <option value="Yes">Yes</option>
                      <option value="NO">No</option>
                    </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="save col-md-6  mt-3">
                  <input type="submit" class="btn btn-info" value="Save and proceed" name ="personalDetail_submit">

              </div>
          </div>
          </form>
        </div>
      </div>
        

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>