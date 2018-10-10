<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/calendar.css">
</head>

<body id="top">
	<?php include('layouts/nav.php') ?>

   <section class="stats">
   		<div class="row">
   			<div class="card col-twelve">
   					<h5 class="add">Basic Statistics</h5>
   					<div class="card-body">
   						<div class="row">
   							<div class="col-three">
   								<div class="card dash-box">
   									<h2><i style="font-size:3rem;" class="fa fa-clipboard" aria-hidden="true">&nbsp;5</i></h2>
   									<h6>Projects Created</h6>
   								</div>
								
							</div>
							<div class="col-three">
								<div class="card dash-box">
   									<h2><i style="font-size:3rem;" class="fa fa-clipboard" aria-hidden="true">&nbsp;2</i></h2></h2>
   									<h6>Projects Submitted</h6>
   								</div>
							</div>
							<div class="col-three">
								<div class="card dash-box">
   									<h2><i style="font-size:3rem;" class="fa fa-tasks" aria-hidden="true">&nbsp;10</i></h2>
   									<h6>Assignments Submitted</h6>
   								</div>
							</div>
							<div class="col-three">
								<div class="card dash-box">
   									<h2><i style="font-size:3rem;" class="fa fa-tasks" aria-hidden="true">&nbsp;5</i></h2>
   									<h6>Assignments Pending</h6>
   								</div>
							</div>
   						</div>
   					</div>
   				  				
   			</div>

   		</div>
   		<div class="row">
   			<div class="col-four" id="cal" class="calendar">
   				calendar

   			</div>
   			<div class="col-eight">
               <div class="container">
                     <h5 class="add">Recent Evaluation Results</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                           <th>Score</th>
                        </tr>
                        <tr>
                           <td><a href="#"><h4>Assignment 1</h4></a></td>
                           <td class="score">50</td>
                        </tr>
                        <tr>
                           <td><a href="#"><h4>Project 1</h4></a></td>
                           <td class="score">50</td>
                        </tr>
                        <tr>
                           <td><a href="#"><h4>Assignment 3</h4></a></td>
                           <td class="score">50</td>
                        </tr>
                     </table>
               </div>
               <br>
					<div class="container">
                     <h5 class="add">Projects</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 1</h4></a></td>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 2</h4></a></td>
                        </tr>
                        <tr>
                           <td><a href="projectinfo.php"><h4>Project 3</h4></a></td>
                        </tr>
                     </table>
               </div>
   				<br>
					<div class="container">
                     <h5 class="add">Assignments</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                        </tr>
                        <tr>
                           <td><a href="#"><h4>Assignment 1</h4></a></td>
                        </tr>
                        <tr>
                           <td><a href="#"><h4>Assignment 2</h4></a></td>
                        </tr>
                        <tr>
                           <td><a href="#"><h4>Assignment 3</h4></a></td>
                        </tr>
                     </table>
               </div>
   				<br>
   			</div>
   			
   			<!-- <div class="col-three"></div> -->
   		</div>
   </section>
	
	
	<?php include('layouts/footer.php') ?>
   <script src="js/jquery-1.11.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/notify.js"></script>
   <script src="js/main.js"></script>
</body>
</html>