<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.1.js" type="text/javascript"></script>
    
    <link rel="stylesheet" href="./login.css">
    <!-- Favicon -->
    <!-- <link href="img/TU_logo.jpeg" rel="icon"> -->

  </head>
  <body class="Home_body">
    <?php require 'db_connection.php' ?>
    <?php
  
    $success = "";
    $error_message = "";
    $logged_in="";
    if(isset($_POST['submit_email'])) {
        $email=$_POST["email"];
        $enroll=$_POST["enroll"];
        
        $_SESSION["email"] = $email;

        if (ValidEmail($email)==1) {
          
          $newQuery="SELECT Email FROM $db.Account WHERE Email='$email'";
          $res=mysqli_query($conn,$newQuery);
          echo mysqli_num_rows($res);
          
          if(mysqli_num_rows($res)==0){
            echo "New Email registered";
            $pw=SendEmail($email);
            $InsertQuery="INSERT INTO $db.Account(enroll,password,Email) VALUES ('$enroll', '$pw', '$email')
                          ";
            $queryExecute=mysqli_query($conn,$InsertQuery);
            // $query2="INSERT INTO $db.Documents(enroll) VALUES ('$enroll');
            //         INSERT INTO $db.PersonalInfo(enroll) VALUES ('$enroll');
            //         INSERT INTO $db.PassOutDetail(enroll) VALUES ('$enroll');
            //         INSERT INTO $db.Programme(enroll) VALUES ('$enroll');
            //         INSERT INTO $db.WorkExperience(enroll) VALUES ('$enroll');";
            // $queryExecute=mysqli_query($conn,$query2);
            $success=1;
          }
          else
          {
            echo "Already registered";
            $pw=SendEmail($email);
            $InsertQuery="UPDATE $db.Account SET password='$pw' WHERE Email='$email'";
            $queryExecute=mysqli_query($conn,$InsertQuery);
            $success=1;
          }
        }
        
    }
    if(isset($_POST["submit_otp"])) {
        $input=$_POST["otp"];
        $email=$_SESSION["email"];
        echo "email is $email";
        $result = mysqli_query($conn,"SELECT * FROM $db.Account WHERE password='$input'");
        echo mysqli_num_rows($result)." Values found";
        if(mysqli_num_rows($result)>0) {
            $success = 2;	
        } else {
            $success =1;
            echo "Invalid OTP!";
        }
    }
    if (isset($_POST["reset_password"])){
      $p1=$_POST["password1"];
      $p2=$_POST["password2"];

      $email=$_SESSION["email"];
      echo "email is $email";
      
      if ($p1==$p2) {
        $InsertQuery="UPDATE $db.Account SET password='$p1' WHERE Email='$email'";
        $queryExecute=mysqli_query($conn,$InsertQuery);
        echo "resetted password";
      }
      else {
        echo "password should be same";
      }
    }
    if (isset($_POST["Login"])){
      $email = $_POST['login_email'];

      $password = $_POST['login_pw'];
      // $sql="SELECT enroll FROM $db.Account WHERE Email='$email'";
      // $enroll=mysqli_query($conn,$sql);
      // echo gettype($enroll);
      $query = "SELECT enroll FROM $db.Account WHERE Email = '$email' AND password = '$password'";
      
      $result = mysqli_query($conn,$query);
      $row = $result -> fetch_row();
      $enroll=$row[0];
      $_SESSION["enroll"]=$enroll;
      $num = mysqli_num_rows($result);
      if($num == 1){
      
        echo "Welcome!";
        $logged_in=1;
        // header('https://kaushikotp.lakeside.systems/PlacementCell/Dashboard.php');
      }
      
      else{
      
      echo "Incorrect email or password";
      
      }
    }
    function email_validation($str) {
        return (!preg_match(
    "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str))
            ? FALSE : TRUE;
    }
    function SendEmail($email) {
            $n = 6;
            
            $otp=generateNumericOTP($n);
            
            $to = "$email";
            $subject = "Account Varification";
        
            $message = "Here's your One Time Password";
            $message .= "$otp";
        
            $header = "From: minorprojectmca3@gmail.com" . "\r\n" ;
            $retval = mail($to,$subject,$message,$header);
            if(isset($retval))//change
            {
                echo "Message sent successfully...";
                echo "otp is $otp";
            }
            else
            {
                echo "Message could not be sent...";
            }
            
            return $otp;
    }
    function generateNumericOTP($n) {
          
        // Take a generator string which consist of
        // all numeric digits
        $generator = "1357902468ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      
        $result = "";
      
        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand()%(strlen($generator))), 1);
        }
      
        // Return result
        return $result;
    }
    function ValidEmail($n){
      $email = $n;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("$email is a valid email address");
            return 1;
        } else {
            echo("$email is not a valid email address");
            return 0;
        }
    }
    
    ?>
    <div class="top">
    <!--Top_section-->
  <div class="container text-center">
      <div class="row">
        <div class="col1">
          <div class="logo">
          <img src="img/TU_logo.png" class="d-block w-100" alt="..." >
          </div>
        </div>
        <div class="col">
          <div class ="text-start">
            <h1>Training and Placement Cell</h1><br>
            <h5>School of engineering, Tezpur University</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
    
         <!--navbar-->
         <nav class="navbar navbar-expand-lg  "  style="background-color:rgb(161, 82, 82); ">
          <div class="container-fluid" >
           
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" style="color: white" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="color: white" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="color: white" href="recruiter.html">For Recruiers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " style="color: white" href="#">People</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " style="color: white" href="#">news and events</a>
                </li>
                <?php 
                  if ($logged_in==1) {
                ?>
                  <li class="nav-item">
                    <a class="nav-link " style="color: white" href="https://kaushikotp.lakeside.systems/PlacementCell/Dashboard.php">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " style="color: white" href="https://kaushikotp.lakeside.systems/PlacementCell/input.php">Upload</a>
                  </li>
                <?php
                  }
                ?>
              </ul>
             
                <div class="nav-item" style="padding:0.2pc ;">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">
                     Sign-up
                  </button>
                </div>
                
                <div class="nav-item" style="padding:0.2pc ;">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Log-in
                  </button>
                </div>
                </div>
            </div>
          
        </nav>
        <!--1st section-->
        <div class="container text-center">
          <div class="row row1 g-5">
            <div class="col-lg-5 ">
             <h1 class="display-5 ">WELCOME TO TEZPUR UNIVERSITY PLACEMENT PORTAL</h1>
            </div>
            <div class="col-lg-7">
              <!--carousel-->
              <div class="carousel">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="img/img1.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="img/img2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="img/img3.jpeg" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
              <!--carousel ends-->
            </div>
          </div>
        </div>
        
   
  <div class="content">
<!--LOGIN MODAL-->
<div id="loginModal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
       <button type="button" class="btn-close btn-close-white"
       data-bs-dismiss="modal"></button>
       <div class="myform bg-dark">
        <h1 class="text-center">Login Form</h1>
        <form name="frmUser" method="post" action="">
          <div>
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="login_email" name="email" class="form-control" id="" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="login_pw" class="form-control" id="">
          </div>
         
          <button type="submit" name="Login" class="btn btn-primary" >
                     Log In
          </button>
        </form>
          </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!--LOGIN MODAL END-->

<!--Signup MODAL-->
<div id="signupModal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
       <button type="button" class="btn-close btn-close-white"
       data-bs-dismiss="modal"></button>
       <div class="myform bg-dark">
        <h1 class="text-center">Sign-up Form</h1>
        <form name="frmUser" method="post" action="">
            <?php
                if ($success==2){
            ?>
            <script type="text/javascript">
                $(document).ready(function(){
                $("#signupModal").modal('show');
            });
            </script>
              <!-- <form name="frmUser" method="post" action=""> -->
              <div>
                  <label for="exampleInputEmail1" class="form-label">Enter Password</label>
                  <input type="password" name="password1" class="form-control" id="" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text"></div>
              </div>
              <div>
                  <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                  <input type="password" name="password2" class="form-control" id="" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text"></div>
              </div>
              <button type="submit" name="reset_password" class="btn btn-primary" >
                      Reset Password
              </button>
              <!-- </form> -->
            <?php
                }
                else{
            ?>
            
            
            <?php
              if ($success==1) 
              {
            ?>
                  <script type="text/javascript">
                      $(document).ready(function(){
                      $("#signupModal").modal('show');
                  });
                  </script>
                  <!-- <form name="frmUser" method="post" action=""> -->
                  <div>
                      <label for="exampleInputEmail1" class="form-label">Enter OTP</label>
                      <div >
                        <input type="text" name="otp" placeholder="One Time Password" class="form-control" >
                      </div>
                      <div id="emailHelp" class="form-text">This will be your default password.</div>
                  </div>
                  <button type="submit" name="submit_otp" class="btn btn-primary" >
                      Submit OTP
                  </button>
                  <!-- </form> -->
            <?php
              
                }
                else 
                {  
            ?>
            <div>
                <label for="exampleInputEmail1" class="form-label">Enrollment no.</label>
                <input type="text" name="enroll" placeholder="eg: CSM21024" class="form-control" >
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div>
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" name="email" placeholder="example@gmail.com" class="form-control" >
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <button type="submit" name="submit_email" class="btn btn-primary" >
                Submit
            </button>
                  
            <?php
                 }
              }
              ?>
            </form>
          </div>
       </div>
      </div>
    </div>
  </div>
</div>
<!--SIGup MODAL END-->
<!-- OTP Model -->
<div id="OTPModal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
       <button type="button" class="btn-close btn-close-white"
       data-bs-dismiss="modal"></button>
       <div class="myform bg-dark">
        <h1 class="text-center">Sign-up Form</h1>
            <div>
                <label for="exampleInputEmail1" class="form-label">Enter OTP</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">This will be your default password.</div>
            </div>
          </div>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal END -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</div>
<hr class="main">
<!--About us block-->
<div class="About-us" id="about">
    <img class="about-img" src="img/img2.jpg" alt="TU">
    <h3 class="sub_heading">About Us</h3>
    <p>The School of Engineering has a dedicated T&P Cell housed in the Dean's building of the Engineering (SoE) premises of Tezpur University, with all the required infrastructure. The cell has exclusive interview room, conference room and ICT facility for conducting online test. Besides producing quality-oriented manpower, Tezpur University also facilitates appropriate utilization of such personnel. Acting as an interface, the Training & Placement Cell of the University facilitates the process of placement of students passing out from the Institute besides collaborating with leading organizations and institutes to provide internship and training programs for the students.<br><br>


      The office liaises with various industrial establishments, corporate houses etc which conduct campus interviews and select graduate and post-graduate students from various disciplines. The Training & Placement Office provides the infra-structural facilities to conduct group discussions, tests and interviews besides catering to other logistics. The Office interacts with many industries in the country, of which nearly 50 companies visit the campus for holding campus interviews. The industries which approach the institute come under the purview of :<br><br>

      
        → PSU's (Public Sector Undertaking)<br>
      
        → Core Engineering industries<br>
      
      → IT & IT enabled services<br>
      
      → Manufacturing Industries<br>
      
      → Management Organizations<br>
      
      → R & D laboratories etc<br>
      
      → Central Government Organization<br>
      
      → Educational Institutes<br>
      <br>
      The placement season runs through the course of the year commencing the second week of July through to June. Pre-Placement Talks are also conducted in this regard as per mutual convenience. Job offers, dates of interviews, selection of candidates etc. are announced through the Training & Placement Office. The Placement Office is assisted by a committee comprising representatives of students from the under-graduation and post-graduation. The committee reviews the inviolable rules included in the guidelines, as per the requirement. Student members are closely co-opted in implementing these policy decisions.<br>    
</div>
<div class="bottom-container text-center" style="background-color:rgb(161, 82, 82);">
  © 2022,<br> T&PC, Tezpur University,<br> Napaam, Assam-784028,<br> India

</div>


</body>
</html>