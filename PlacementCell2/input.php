<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-$width, initial-scale=1">
	<title>Profile Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./login.css">
    <!-- Favicon -->
    <link href="img/TU_logo.png" rel="icon">
  </head>
  <body>
<?php require 'db_connection.php' ?>
<?php
  $enroll = $_SESSION['enroll'];
  if(isset($_FILES['profilePic'])){
    UploadImage("profilePic",$enroll);
  }
  if(isset($_POST['General_Info'])){
    updateData("PersonalInfo","Name",$_POST["name"],$enroll);
    updateData("PersonalInfo","DOB",$_POST["DoB"],$enroll);
    updateData("PersonalInfo","Gender",$_POST["gender"],$enroll);
    updateData("PersonalInfo","Address",$_POST["Address"],$enroll);
    updateData("PersonalInfo","State",$_POST["state"],$enroll);
    updateData("Programme","DName",$_POST["Dept"],$enroll);
    updateData("Programme","PName",$_POST["Prog"],$enroll);
    updateData("PersonalInfo","Batch",$_POST["Batch"],$enroll);
    updateData("PersonalInfo","PhoneNo",$_POST["PhoneNo"],$enroll);
  }
  if(isset($_POST['ClassX'])){
    updateData("Details_ClassX","Institution",$_POST["Institution"],$enroll);
    updateData("Details_ClassX","RollNo",$_POST["RollNo"],$enroll);
    updateData("Details_ClassX","PassOutYear",$_POST["PassOutYear"],$enroll);
    updateData("Details_ClassX","Parcentage",$_POST["Parcentage"],$enroll);
    
    UploadImage("ClassX_File",$enroll);
  }
  if(isset($_POST['ClassXII'])){
    updateData("Details_ClassXII","Institution",$_POST["Institution"],$enroll);
    updateData("Details_ClassXII","RollNo",$_POST["RollNo"],$enroll);
    updateData("Details_ClassXII","PassOutYear",$_POST["PassOutYear"],$enroll);
    updateData("Details_ClassXII","Parcentage",$_POST["Parcentage"],$enroll);
    
    UploadImage("ClassXII_File",$enroll);
  }
  if(isset($_POST['Graduation'])){
    updateData("Details_Graduate","Institution",$_POST["Institution"],$enroll);
    updateData("Details_Graduate","RollNo",$_POST["RollNo"],$enroll);
    updateData("Details_Graduate","PassOutYear",$_POST["PassOutYear"],$enroll);
    updateData("Details_Graduate","Parcentage",$_POST["Parcentage"],$enroll);
    
    UploadImage("Graduation_File",$enroll);
  }
  if(isset($_POST['Resume'])){    
    UploadImage("Resume_File",$enroll);
  }
  function updateData($tableName,$Column,$data,$enroll){
    require 'db_connection.php';
    $temp="UPDATE $db.$tableName
      SET $db.$tableName.$Column = '$data' 
      WHERE $db.$tableName.enroll = '$enroll'";
    //echo $temp;
    $queryExecute=mysqli_query($conn,$temp);
      
  }
  function UploadImage($name,$enroll){
    $targetfolder = $targetfolder . basename( $_FILES[$name]['name']) ;
    $extension  = pathinfo( $_FILES["$name"]["name"], PATHINFO_EXTENSION );
    $basename   = "$name$enroll" . "." . $extension;
    $targetfolder = "Uploads/{$basename}"; 
    $file_type=$_FILES[$name]['type'];
    if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {
      if(move_uploaded_file($_FILES[$name]['tmp_name'], $targetfolder))
        {
          echo "The file ". basename( $_FILES[$name][$name]). " is uploaded";
        }
        else {
          echo "Problem uploading file";
        }
    }
    else {
      echo "You may only upload PDFs, JPEGs or GIF files.<br>";
    }
  }
  ?>
 <!--Nav Bar-->
 <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">

	<div class="container-fluid">
	  <a class="navbar-brand" href="#">
		<img src="img/TU_logo.png" alt="Bootstrap" width="30" height="24">
	  </a>
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
		  <a class="nav-link "  href="indexv2.php">Home</a>
		  <a class="nav-link" href="Dashboardv2.php">Profile</a>
		  <a class="nav-link" href="#">Applied</a>
		  <a class="nav-link active" aria-current="page" href="input.html">Edit</a>
		</div>
	  </div>
	</div>
  </nav>
  <!--Nnav_Bar ends-->
<div class="input">
  <!--Form Starts-->
  <br>
<div class="sec p-5 m-1">
<form action="" method="post" enctype="multipart/form-data">
Profile picture:
  <input type="file" name="profilePic" size="50" />
  <br />
  <input type="submit" value="Upload" class="btn btn-primary" />
</form>
<!-- <br><input type='file'value='$file_name'><br><br> -->
</div>
<br>
<h2>General Information</h2>
<div class="sec p-5 m-1">
  <!--<h2>General Information</h2>
  Student ID: $student_id<br><br> -->
  <!-- <input type='hidden' name='student_id' value='$student_id'> -->
  <form name="frmUser" method="post" action="">
  Student ID: $student_id<br><br>
  <input type='hidden' name='student_id' value='$enroll'>
      Name: <input type='text' name='name' value='somthing'>
      Date of Birth: <input type='date' name='DoB' value='somthing' ><br><br>
      Gender: <select name='gender'>
        <option value='Female'>Female</option>
        <option value='Male'>Male</option>
        <option value='Other'>Other</option>
        </select>
      Address:<input type='text' name='Address' value='somthing' >
      State:<select name="state">
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
        </select><br><br>
      Department:<select name="Dept">
        <option value="CSE">CSE</option>
        <option value="DOE">DOE</option>
        <option value="MCJ">MCJ</option>
      </select>
      Programme:<select name="Prog">
        <option value="MCA">MCA</option>
        <option value="MTech">MTech</option>
        <option value="MBA">MBA</option>
      </select><br><br>
      Batch: <input type='year' name='Batch' value='somthing' >
      Phone no.:<input type='text' name='PhoneNo'value='somthing'  ><br><br>
      <button type="submit" name="General_Info" class="btn btn-primary" >
          Upload
      </button>
    </form>
</div>
<h2>Educational background</h2>
<div class="sec p-5 m-1">
<form name="frmUser" method="post" action="" enctype="multipart/form-data">
   
    
  <h4>Class X</h4>
    Institute Name:<input type='text' name='Institution'value='somthing'  >
    Roll no.:<input type='text' name='RollNo' value='somthing' ><br><br>
    Year of Passing out:<input type='year' name='PassOutYear'value='somthing'  >
    CGPA/Percntage:<input type='number' name='Parcentage' value='$num'><br><br>

    Marksheet:<input type="file" name="ClassX_File" size="50" /><br><br><br>
    <button type="submit" name="ClassX" class="btn btn-primary" >
        Upload
    </button>
    <hr>
</form>
</div>
<div class="sec p-5 m-1">
<form name="frmUser" method="post" action="" enctype="multipart/form-data">
   
    <br>
  <h4>Class XII</h4>
    Institute Name:<input type='text' name='Institution' value='somthing' >
    Roll no.:<input type='text' name='RollNo' value='somthing' ><br><br>
    Year of Passing out:<input type='year' name='PassOutYear' value='somthing' >
    CGPA/Percntage:<input type='number' name='Parcentage' value='$num'><br><br>

    Marksheet:<input type="file" name="ClassXII_File" size="50" /><br><br><br>
    <button type="submit" name="ClassXII" class="btn btn-primary" >
        Upload
    </button>
    
</form>
</div>
<div class="sec p-5 m-1">
<form name="frmUser" method="post" action="" enctype="multipart/form-data">
    
    <br>
  <h4>Graduation</h4>
    Institute Name:<input type='text' name='Institution' value='somthing' >
    Roll no.:<input type='text' name='RollNo' value='somthing' ><br><br>
    Year of Passing out:<input type='year' name='PassOutYear' value='somthing' >
    CGPA/Percntage:<input type='number' name='Parcentage' value='$num'><br><br>

    Marksheet:<input type="file" name="Graduation_File" size="50" /><br><br><br>
    <button type="submit" name="Graduation" class="btn btn-primary" >
        Upload
    </button>
    
</form>
</div>
<h2>Resume</h2>
<div class="sec p-5 m-1">
<form name="frmUser" method="post" action="" enctype="multipart/form-data">
    
    <br>
    File:<input type="file" name="Resume_File" size="50" /><br><br><br>
    <button type="submit" name="Resume" class="btn btn-primary" >
        Upload
    </button>
    
</form>
</div>


  <div class="row">
    <div class="col">
      
  <h2>Work Experience </h2>
  </div>
  <div class="col">
    <button type="button" class="btn btn-info " >+Add New</button><!--the below part should be only visible if the user clicks on this button-->
 </div></div>
  
  <!--<div class="sec p-5 m-2">
     Company name:<input type='text' name='name' >
  Job title:<input type='text' name='name' value='$name'><br><br>
  Position type:<input type='text' name='name' value='$name'>
  Start Date:<input type='date' name='name' value='$name'>
  End date:<input type='date' name='name' value='$name'><br><br>
  Job location:<input type='text' name='name' value='$name'><Br> -->
   
   





	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</div>
  </body>
</html>