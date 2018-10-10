<!DOCTYPE html>
<html>
<head>
	<title>ProjectDashboard</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/projects.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>

<body id="top">
   <?php
   $active="projects";
    include('../layouts/nav.php') ?>

   <section class="stats">
   		<div class="row">
   			<div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Projects Evaluated</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                           <th>Completion Status</th>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 1</h4></a></td>
                           <td style="width: 25%">
                              <div class="progress-bar green stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 2</h4></a></td>
                           <td>
                              <div class="progress-bar blue stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 3</h4></a></td>
                           <td>
                              <div class="progress-bar blue stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                        </tr>
                     </table>
                  </div>
         </div>
   		</div>
   		<div class="row">
            <div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Projects Not Evaluated</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                           <th>Completion Status</th>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 1</h4></a></td>
                           <td style="width: 25%">
                              <div class="progress-bar green stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 2</h4></a></td>
                           <td>
                              <div class="progress-bar blue stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 3</h4></a></td>
                           <td>
                              <div class="progress-bar blue stripes">
                                  <span style="width: 40%"></span>
                              </div>
                           </td>
                        </tr>
                     </table>
                  </div>
         </div>
         </div>
   </section>
   
   <div class="clearfix"></div>
   <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/main.js"></script>
   <?php include('../layouts/footer.php');?>
</body>
</html>