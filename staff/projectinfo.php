<!DOCTYPE html>
<html>
<head>
  <title>ProjectDashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/projectinfo.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
</head>

<body id="top">
  <?php
  $active="projects";
  include('../layouts/nav.php') 
  ?>

  <section class="projectinfo">
    
    <div class="row">
      <div class="col-twelve">
        <div class="table-header">
          <h3 class="add">Project Information</h3>
        </div>
          <table class="table-common">
            <tr>
              <td class="title"><h5>Project Name</h5></td>
              <td><p></p></td>
            </tr>
            <tr>
              <td class="title"><h5>Languages Used</h5></td>
              <td><p></p></td>
            </tr>
            <tr>
              <td class="title"><h5>Project Description</h5></td>
              <td><p></p></td>
            </tr>         
          </table>         
      </div> 
    </div>
    <br>
      <div class="row">        
          <div class="card col-twelve">
            <div class="menu">
              <div class="table-header"><h2 class="add">Tasks Performed By Each Student</h2></div>
              <button class="collapsible">Student 1<i style="float: right;" class="fa fa-plus"></i></button>
              <div class="content">
                <p>Task Performed by student 1</p>
              </div>
              <button class="collapsible">Student 2<i style="float: right;" class="fa fa-plus"></i></button>
              <div class="content">
                <p>Task Performed by student 2</p>
              </div>
              <button class="collapsible">Student 3<i style="float: right;" class="fa fa-plus"></i></button>
              <div class="content">
                <p>Task Performed by student 3</p>
              </div>

            </div>
          </div>
      </div>       
      <br>
      <div style="text-align: center;" class="row">
        <button style="background-color: #24b3ab;" class="button">Mark as Evaluated</button>
      </div>
  
  </section>

  <script>
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        content.style.display = "block";
      }
    });
  }
  </script>


<?php include('../layouts/footer.php');?>
    <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/main.js"></script>
</body>
</html>
