<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
     <!-- Favicon -->
     <link href="img/TU_logo.jpeg" rel="icon">
  </head>
  <body>
  <?php ?>
  <?php 
      $var_value = $_SESSION['enroll'];
      echo $var_value;
      function GetColumnNames($query){
        require 'db_connection.php';
        $result = mysqli_query($conn, $query);
        $column_names = array();
        while ($row = mysqli_fetch_array($result)) {
            $column_names[] = $row['Field'];
        }
        return $column_names;
      }
      function GetData($query,$table){
        require 'db_connection.php';
        $result = mysqli_query($conn, $query);
        $column_names = array();
        while ($row = mysqli_fetch_array($result)) {
            $column_names[] = $row['Field'];
        }
        $data = array();
        foreach ($column_names as $name) {
            $result = mysqli_query($conn, "SELECT $name FROM $db.$table");
            while ($row = mysqli_fetch_array($result)) {
                $data[$name][] = $row[$name];
            }
        }
        $namee=$data["Name"];
        $_SESSION['namee']=$namee[0];
        return $data;
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
      <a class="nav-link" href="index.html">Home</a>
      <a class="nav-link active" aria-current="page" href="#">Profile</a>
      <a class="nav-link" href="#">Applied</a>
      <a class="nav-link " href="input.php">Edit</a>
    </div>
  </div>
</div>
</nav>
  <!--Nnav_Bar ends-->
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <!--Card-->
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">NAME:<?php echo $_SESSION['namee'];?></h5>
            <h5 class="card-title">ROLL NO:<?php echo $var_value;?></h5>
          </div>
          <div class="card-body">
            <hr>
            <a href="#section2" class="btn">General Information</a><hr>
            <a href="#section1" class="btn">Educational background</a><hr>
            <a href="#section2" class="btn">Work Experience</a><hr>
            <a href="#section2" class="btn">Links</a><hr>
            <a href="#section2" class="btn">Resume</a><hr>
          </div>
        </div>
      </div>
      <!--Card  Ending-->
      <div class="col">
        <!--Main Body-->

        <div class="section one my-5" id="section1">
        <h2>General Information</h2>   
    <div class="container  text-center">
  <div class="row">
    <div class="col">
    <table class="table table-borderless table-sm">
          <!--<tr valign="top">-->
            <?php
            $query="SHOW COLUMNS FROM subha8xr_placement.PersonalInfo";
            $table="PersonalInfo where enroll='$var_value'";
            
            $column_names=GetColumnNames($query);
            $data=GetData($query,$table);
            echo mysqli_num_rows($column_names);
            foreach ($column_names as $name) {
                echo "<tr><th>$name:</th></tr>";
              }
              ?>
          </table>
    </div>
    <div class="col">
    <table class="table table-borderless table-sm">
          
          <?php
            foreach ($data as $column_name => $column_data) {
              foreach ($column_data as $data) {
                  echo "<tr><td>$data</td></tr>";
              }
            }
            ?>
          
          </table>
    </div>
  </div>
</div>
        
          
       
       <!-- <div class="inner_text">
       Full name:<br>
       Dat of Birth:<br>
       Gender:<br>
       Admission Year:<br>
       Year of passing out:<br>
       Department:<br>
       Programme:<br>
       Address:
       <br>
      </div> -->
         <hr class="main">
        </div>
       <div class="section one my-5" id="section1">
          <h2>Educational background</h2><BR>
            <div class="inner_text">
            <h5 class="sub_heading my-4">Class X</h5>
            <hr>
            <div class="container  text-center">
              <div class="row">
                <div class="col">
                  <table class="table table-borderless table-sm">
              <?php
              $query="SHOW COLUMNS FROM subha8xr_placement.Details_ClassX";
              $table="Details_ClassX where enroll='$var_value'";
              
              $column_names=GetColumnNames($query);
              $data=GetData($query,$table);

              foreach ($column_names as $name) {
                  echo "<tr><th>$name:</th></tr>";
                }
                ?>
            </table>
    </div>
    <div class="col">
    <table class="table table-borderless table-sm">
            <?php
              foreach ($data as $column_names => $column_data) {
                foreach ($column_data as $data) {
                    echo "<tr><td>$data</td></tr>";
                }
              }
              ?>
             </table>
    </div>
  </div>
</div>

            <!-- <hr>
            Institute Name:<br>
            Year of Passing out:
            <br>
            CGPA/Percntage:<br>
            Roll no.:<br>
            Marksheet:<br>if uploaded it will show the file name which can be viewd after clicking on it -->
            <h5 class="sub_heading my-4">Class XII</h5><hr>
            <div class="container  text-center">
  <div class="row">
    <div class="col">
    <table class="table table-borderless table-sm">
              <?php
              $query="SHOW COLUMNS FROM subha8xr_placement.Details_ClassXII";
              $table="Details_ClassXII where enroll='$var_value'";
              
              $column_names=GetColumnNames($query);
              $data=GetData($query,$table);

              foreach ($column_names as $name) {
                  echo "<tr><th>$name:</th></tr>";
                }
                ?>
            </table>
    </div>
    <div class="col">
    <table class="table table-borderless table-sm">
            <?php
              foreach ($data as $column_names => $column_data) {
                foreach ($column_data as $data) {
                    echo "<tr><td>$data</td><tr>";
                }
              }
            ?>
            </table>
    </div>
  </div>
</div>
            <!-- <hr>
            // Institute Name:<br>
            // Year of Passing out:
            // <br>
            // CGPA/Percntage:<br>
            // Roll no.:<br>
            // Marksheet:<br> -->
            <h5 class="sub_heading my-4">Graduation</h5><hr>
            <div class="container  text-center">
  <div class="row">
    <div class="col">
    <table class="table table-borderless table-sm">
              <?php
              $query="SHOW COLUMNS FROM subha8xr_placement.Details_Graduate";
              $table="Details_Graduate where enroll='$var_value'";
              
              $column_names=GetColumnNames($query);
              $data=GetData($query,$table);

              foreach ($column_names as $name) {
                  echo "<tr><th>$name:</th></tr>";
                }
                ?>
           </table>
    </div>
    <div class="col">
    <table class="table table-borderless table-sm">
            <?php
              foreach ($data as $column_names => $column_data) {
                foreach ($column_data as $data) {
                    echo "<tr><td>$data</td></tr>";
                }
              }
            ?>
             </table>
    </div>
  </div>
</div>
            <!-- <hr>
            Institute Name:<br>
            Year of Passing out:
            <br>
            CGPA/Percntage:<br>
            Roll no.:<br>
            Marksheet:<br>
            <h5 class="sub_heading my-4">Education gap</h5>
            <hr>
            </div>
          </div>-->
         <hr class="main">
         <div class="section one my-5" id="section2">
          <h2>Work Experience</h2><BR><!-- if it has been added other wise provide button to add one-->
          <div class="container  text-center">
  <div class="row">
    <div class="col">
    <table class="table table-borderless table-sm">
              <?php
              $query="SHOW COLUMNS FROM subha8xr_placement.WorkExperience";
              $table="WorkExperience where enroll='$var_value'";
              
              $column_names=GetColumnNames($query);
              $data=GetData($query,$table);

              foreach ($column_names as $name) {
                  echo "<tr><th>$name:</th></tr>";
                }
                ?>
            </table>
    </div>
    <div class="col">
    <table class="table table-borderless table-sm">
            <?php
              foreach ($data as $column_names => $column_data) {
                foreach ($column_data as $data) {
                    echo "<tr><td>$data</td></tr>";
                }
              }
            ?>
            </table>
    </div>
  </div>
</div>
          
            <!-- <div class="inner_text">
              Company name:<br>
              Job title:<br>
              Position type:<br>
              Start Date:<br>
              End date:<br>
              Job location:<Br>

            </div> -->
        <hr class="main">
        <div class="section one my-5" id="section1">
          <h2>Resume</h2><BR>
            <div class="inner_text">
              <!--file name which is in downloadable form-->
            </div>
            </div>
            
        </div>
      </div>
      <div class="flex-end">
  <button class="btn btn-secondary" onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  </div>
</div>
  <script>
    // Get the button
    let mybutton = document.getElementById("myBtn");
    
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>