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
		 <?php
			include 'db.php';
			// Query all the projects that are to be evaluated
			$query1 = "SELECT project_name, project_id, project_status from projects where project_evaluation='sent for evaluation'";
			$result1 = mysqli_query($conn, $query1);
			if(mysqli_num_rows($result1) > 0){
				$not_evaluated_projects = "exits";
			}else{
				$not_evaluated_projects = null;
			}
			$query2 = "SELECT project_name, project_id, project_status from projects where project_evaluation='evaluated'";
			$result2 = mysqli_query($conn, $query2);
			if(mysqli_num_rows($result2) > 0){
				$evaluated_projects = "exist";
			}else{
				$evaluated_projects = null;
			}
		  ?>
   		<div class="row">
   			<div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Projects Evaluated</h5>
                     <table class="table-common">
												<?php if($evaluated_projects != null){ ?>
													<tr>
	                           <th>Title</th>
	                           <th>Completion Status</th>
	                        </tr>
													<?php
													while($row=mysqli_fetch_assoc($result2)){
														$link = "projectinfo.php?project_id=".$row['project_id'];
														echo '
														<tr>
														<td><a href="'.$link.'"><h4>'.$row['project_name'].'</h4></a></td>
													 	<td style="width: 25%">
															<div class="progress-bar green stripes">
																	<span style="width: '.$row['project_status'].'%"></span>
															</div>
													  </td>
														</tr>
														';
													}
												}else{
													echo "<h1>No projects have been evaluated.</h1>";
												}?>
                     </table>
                  </div>
         </div>
   		</div>
   		<div class="row">
            <div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Projects Not Evaluated</h5>
                     <table class="table-common">
												<?php if($not_evaluated_projects != null){ ?>
													<tr>
	                           <th>Title</th>
	                           <th>Completion Status</th>
	                        </tr>
													<?php
													while($row=mysqli_fetch_assoc($result1)){
														$link = "projectinfo.php?project_id=".$row['project_id'];
														echo '
														<tr>
														<td><a href="'.$link.'"><h4>'.$row['project_name'].'</h4></a></td>
													 	<td style="width: 25%">
															<div class="progress-bar green stripes">
																	<span style="width: '.$row['project_status'].'%"></span>
															</div>
													  </td>
														</tr>
														';
													}
												}else{
													echo "<h1>All projects have been evaluated</h1>";
												}?>
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
