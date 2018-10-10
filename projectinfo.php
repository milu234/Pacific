<!DOCTYPE html>
<html>
<head>
  <title>ProjectDashboard</title>
  <meta charset="utf-8">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/projectinfo.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body id="top">
  <?php include('layouts/nav.php') ?>

  <section class="projectinfo">
    
    <div class="row">
      <div class="col-twelve">
        <div class="card-header">
          <h3>Project Information</h3>
        </div>
          <table class="table-common">
            <tr>
              <td class="title"><h6>Project Name</h6></td>
              <td><p></p></td>
            </tr>
            <tr>
              <td class="title"><h6>Languages Used</h6></td>
              <td><p></p></td>
            </tr>
            <tr>
              <td class="title"><h6>Project Description</h6></td>
              <td><p></p></td>
            </tr>         
          </table>         
      </div> 
    </div>

      <div class="row">
        <div class="card col-three">
            <div class="menu">
              <div class="table-header"><h2>Team Members</h2></div>
              <div class="menuitem">Student 1</div>
              <div class="menuitem">Student 2</div>
              <div class="menuitem">Student 3</div>
              <div class="menuitem">Student 4</div>
              <button class="button"><i class="fa fa-plus"></i>&nbsp;ADD MEMBERS</button>
            </div>
          </div>

          <div class="card col-nine">
            <div class="menu">
              <div class="table-header"><h2>Tasks</h2></div>
              <p>Task Alloted</p>
              <h2>Task 1</h2>
              <p>Put The Html file and css in one folder</p>
              <h2>Tasks 2</h2>
              <p>Make The changes and commit</p>
            </div>
          </div>
      </div>       

  
  </section>


<?php include('layouts/footer.php');?>
</body>
</html>
