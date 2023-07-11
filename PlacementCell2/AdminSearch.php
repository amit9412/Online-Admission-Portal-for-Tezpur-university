<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin's Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    
    
    <!-- Favicon -->
    <link href="img/TU_logo.jpeg" rel="icon">
  </head>
  <body>
    <?php require 'db_connection.php' ?>
    <?php
        $result="";
        if(isset($_POST["submit_Search"])){
          $Name=$_POST["Name"];
          $Department=$_POST["Department"];
          $Programme=$_POST["Programme"];
          $X=$_POST["X_marks"];
          $XII=$_POST["XII_marks"];
          $Graduation=$_POST["Graduation_Marks"];
          $Current=$_POST["Current_CGPA"];
          $Resume=$_POST["Resume"];
          $CGPA_=$_POST["CGPA_"];
          $Prog_=$_POST["Prog_"];
          
        }
        $sql = "SELECT  subha8xr_placement.PersonalInfo.Name,
        subha8xr_placement.Programme.DeptNo,
        subha8xr_placement.Programme.PName as Programme,
        subha8xr_placement.Details_ClassX.Parcentage as ClassX,
        subha8xr_placement.Details_ClassXII.Parcentage as ClassXII,
        subha8xr_placement.Details_Graduate.Parcentage as Graduate,
        subha8xr_placement.Programme.CGPA as CGPA
              FROM subha8xr_placement.PersonalInfo
              JOIN subha8xr_placement.Programme
              ON subha8xr_placement.PersonalInfo.enroll = subha8xr_placement.Programme.enroll
              JOIN subha8xr_placement.Details_ClassX
              ON subha8xr_placement.PersonalInfo.enroll = subha8xr_placement.Details_ClassX.enroll
              JOIN subha8xr_placement.Details_ClassXII
              ON subha8xr_placement.PersonalInfo.enroll = subha8xr_placement.Details_ClassXII.enroll
              JOIN subha8xr_placement.Details_Graduate
              ON subha8xr_placement.PersonalInfo.enroll = subha8xr_placement.Details_Graduate.enroll
              where subha8xr_placement.Programme.PName like '$Prog_' and subha8xr_placement.Programme.CGPA > '$CGPA_';
                ";
        $result = $conn->query($sql);
        $arr=$result -> fetch_array(MYSQLI_ASSOC);
        //echo "$arr";

        if(isset($_POST['DownloadCSV'])){

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
            <a class="nav-link "  href="index.html">Home</a>
            <a class="nav-link active" aria-current="page" href="#">Profile</a>
            <a class="nav-link " href="#">Edit</a>
          </div>
        </div>
      </div>
    </nav>
    <!--Nnav_Bar ends-->
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <!--card-->
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">NAME</h5>
            <div class="inner_text">
              Full name:<br>
              Dat of Birth:<br>
              Gender:<br>
              Year of joining:<br>
              phone no:<br>
              Address:
              <br>
             </div>
          </div>
        </div>
        <!--card ends-->
        <!--Attributes -->
        <!--Its mandatory to mention the attributes for getting the required table-->
        <div class="container Att ">
          Attrubutes needed<br><br>
          
          <form name="frmUser" method="post" action="">

          <input type="checkbox" class="btn-check" id="Name" name="Name" autocomplete="off" checked='on' >
          <label class="btn btn-outline-secondary btn-sm" for="Name">Name</label>

          <input type="checkbox" class="btn-check" id="Department" name="Department" autocomplete="off" >
          <label class="btn btn-outline-secondary btn-sm" for="Department">Department</label>

          <input type="checkbox" class="btn-check" id="Programme" name="Programme" autocomplete="off" checked='on' >
          <label class="btn btn-outline-secondary btn-sm" for="Programme">Programme</label>

          <input type="checkbox" class="btn-check" id="X_marks" name="X_marks" autocomplete="off" >
          <label class="btn btn-outline-secondary btn-sm" for="X_marks">X_marks</label>

          <input type="checkbox" class="btn-check" id="XII_marks" name="XII_marks" autocomplete="off" >
          <label class="btn btn-outline-secondary btn-sm" for="XII_marks">XII_marks</label>

          <input type="checkbox" class="btn-check" id="Graduation_Marks" name="Graduation_Marks" autocomplete="off" >
          <label class="btn btn-outline-secondary btn-sm" for="Graduation_Marks">Graduation_Marks</label>

          <input type="checkbox" class="btn-check" id="Current_CGPA" name="Current_CGPA" autocomplete="off" checked='on'>
          <label class="btn btn-outline-secondary btn-sm" for="Current_CGPA">Current_CGPA</label>

          <?php 
          // echo "checked='$Name'"
          //  echo "checked='$Department'"
          //  echo "checked='$Programme'"
          //  echo "checked='$X'"
          //  echo "checked='$XII'"
          //  echo "checked='$Graduation'"
          //  echo "checked='$Current'"
           ?>
          <!-- <input type="checkbox" class="btn-check" id="Resume" name="Resume" autocomplete="off" >
          <label class="btn btn-outline-primary" for="Resume">Resume</label><br> -->
          
          <!-- <button type="submit" class="btn btn-outline-info" name="submit_Search">Search</button><br>
          </form> -->

        </div>
      </div>
      <!--Searching area-->
        <div class="col-8">
          Search using:<br><br>
          <div class="container">
            <div class="row">
          <div class="col">
            <label for="dropdown" id="dropdown-label">Programme:</label>
            <select name="Prog_">
              <option value="%">All</option>
              <option value="MCA">MCA</option> 
              <option value="MBA">MBA</option>
              <option value="MCJ">MCJ</option> 
            </select>
            <br>
          </div>
          <div class="col">
            <label for="dropdown" id="dropdown-label">CGPA:</label>
            <select name="CGPA_">
              <option value="0">All</option>
              <option value="5">More than 5</option> 
              <option value="6">More than 6</option>
              <option value="7">More than 7</option> 
              <option value="8">More than 8</option>
            </select>
            
          </div>
          <div class="col">
            <button type="submit" class="btn btn-outline-info" name="submit_Search">Search</button><br>
          </div>
          </form>
        </div>
      </div>
      <?php
        $serialized_array = serialize($arr);
        $serialized_array = str_replace('"', '&quot;', $serialized_array);
        //echo $serialized_array;
      ?>
      <form name="frmUser" method="post" action="csv.php">
        <input type="hidden" name="array" value="<?php echo "$serialized_array"?>" >
        <button type="submit" class="btn btn-outline-success" name="DownloadCSV">Download as CSV file</button>
      </form>
      <br>
        <?php
        if ($result->num_rows > 0) {
          ?>
        <table class="table table-borderless table-sm">
        <tr>
        <?php
              if ($Name=="on") {
                echo "<th>Name</th>";
              }
              if ($Department=="on") {
                echo "<th>Department</th>";
              }
              if ($Programme=="on") {
                echo "<th>Programme</th>";
              }
              if ($X=="on") {
                echo "<th>X</th>";
              }
              if ($XII=="on") {
                echo "<th>XII</th>";
              }
              if ($Graduation=="on") {
                echo "<th>Graduation</th>";
              }
              if ($Current=="on") {
                echo "<th>Current</th>";
              }
              // if ($Resume=="on") {
              //   echo "<th>Resume</th>";
              // }
          ?>
          
          <?php 
            echo "Rows Found";
            echo $result->num_rows; 
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                if ($Name=="on") {
                    echo "<td>".$row["Name"]."</td>";
                }
                if ($Department=="on") {
                  echo "<td>".$row["DeptNo"]."</td>";
                }
                if ($Programme=="on") {
                  echo "<td>".$row["Programme"]."</td>";
                }
                if ($X=="on") {
                  echo "<td>".$row["ClassX"]."</td>";
                }
                if ($XII=="on") {
                  echo "<td>".$row["ClassXII"]."</td>";
                }
                if ($Graduation=="on") {
                  echo "<td>".$row["Graduate"]."</td>";
                }
                if ($Current=="on") {
                  echo "<td>".$row["CGPA"]."</td>";
                }
                // if ($Resume=="on") {
                //   echo "<td>".$row["Name"]."</td>";
                // }
                echo "</tr>";
              }
              echo "</table>";
            } else {
              echo "0 results";
            }
          ?>
          
          </tr>
          </table>
          <?php
          } else {
          echo "0 results";
        }
        ?>
        </div>
        
        <!--searching area ends-->
        

        
            </div>
            </div>
            
            <!--top button ONLY when we have a table-->
      <div class="flex-end">
  <button class="btn btn-secondary" onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
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