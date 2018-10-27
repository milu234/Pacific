<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
  <link rel="stylesheet" type="text/css" href="../css/calendar.css">
</head>

<body id="top">
	<?php
   $active="dashboard";
   include('../layouts/nav.php');
   $conn = mysqli_connect('localhost','root','','pacific');

//    $result2 = mysqli_query($conn,"SELECT class_id,assignment_name,date_of_submission,assignment_id,assignment_marks from assignments where user_id = ".$user->id." ");
   $result2 = mysqli_query($conn,"SELECT distinct c.class_name, a.class_id,a.assignment_name,a.date_of_submission,a.assignment_marks,a.assignment_id from assignments as a,class as c where a.user_id = $user->id and c.class_id = a.class_id  ");
   $rowcount = mysqli_num_rows($result2);
   $result4 = mysqli_query($conn,"SELECT distinct  c.class_name, a.class_id,a.assignment_name,a.date_of_submission,a.assignment_marks,a.assignment_id from assignments as a,class as c,assignment_evaluation as ae where a.user_id = $user->id and c.class_id = a.class_id   ");
   $rowcount2 = mysqli_num_rows($result4);
	 $user = unserialize($_SESSION['user']);
	 $query = "SELECT * from project_evaluation p, projects p1 where p.project_id=p1.project_id and user_id=$user->id";
	 $result5 = mysqli_query($conn, $query);
	 $numberOfEvaluatedProjects = mysqli_num_rows($result5);
	 ?>
	 <!-- Notification box -->
	 <div id="notif-box">
      <span id="notif-close" onclick="closeNotif()" style="float:right;margin:5px 5px 0 0">&times;</span>
      <p id="notif-box-content"></p>
   </div>
	 <!-- Notification ends here -->
   <section class="stats">
   		<div class="row">
   			<div class="card col-twelve">
   					<h5 class="add">Basic Statistics</h5>
   					<div class="card-body">
   						<div class="row">
   							<div class="col-three">
   								<div class="card dash-box">
   									<h2><i style="font-size:3rem;" class="fa fa-clipboard" aria-hidden="true">&nbsp;5</i></h2>
   									<h6>Projects Evaluated</h6>
   								</div>

							</div>
							<div class="col-three">
								<div class="card dash-box">
   									<h2><i style="font-size:3rem;" class="fa fa-tasks" aria-hidden="true">&nbsp;<?php  echo $rowcount;?></i></h2>
   									<h6>Assignments Created</h6>
   								</div>
							</div>
                     <div class="col-three">
                        <div class="card dash-box">
                              <h2><i style="font-size:3rem;" class="fa fa-tasks" aria-hidden="true">&nbsp;<?php echo $rowcount2; ?></i></h2>
                              <h6>Assignments Evaluated</h6>
                           </div>
                     </div>
							<div class="col-three">
								<div class="card dash-box">
   									<h2><i style="font-size:3rem;" class="fa fa-newspaper-o" aria-hidden="true">&nbsp;<?php echo $rowcount-$rowcount2  ?></i></h2>
   									<h6>Correction Pending</h6>
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
                        </tr>
                        <tr>
                           <td><a href="#"><h4>Assignment 1</h4></a></td>
                        </tr>
                        <tr>
                           <td><a href="#"><h4>Project 1</h4></a></td>
                        </tr>
                        <tr>
                           <td><a href="#"><h4>Assignment 3</h4></a></td>
                        </tr>
                     </table>
               </div>
               <br>
					<div class="container">
                     <h5 class="add">Projects Evaluated</h5>
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                        </tr>
												<?php if($numberOfEvaluatedProjects > 0){
													while($evaluatedProjects = mysqli_fetch_assoc($result5)) {
														$link = "http://".$_SERVER['HTTP_HOST']."/Pacific/staff/projectinfo.php?project_id=".$evaluatedProjects['project_id'];
														echo
														 "<tr>
																<td>
																	<a href='$link'><h4>".$evaluatedProjects['project_name']."</h4></a>
																</td>
															</tr>";
													}
												}else{
													echo "No projects evaluated.";
												}?>
                     </table>
               </div>
   				<br>
					<div class="container">
                     <h5 class="add">Assignments</h5>
                     <table class="table-common">
                        <tr>
                           <th>Title</th>

                           <th>Marks</th>
                           <th>Class Assigned</th>
                           <th>Deadline</th>

                        </tr>

                        <!-- <tr>
                           <th>Deadline</th>
                        </tr> -->

                        <!-- ============================================================ -->
                        <?php
                                //include('../php/create_assignments.php');

                              while($rows = mysqli_fetch_assoc($result2))
                              {
                        ?>
                        <tr>
                           <td><a href="assignment_info.php?id=<?php echo $rows['class_id'] ; ?>&id2=<?php echo $rows['assignment_id']; ?>"><h4><?php  echo $rows['assignment_name']; ?></h4></a></td>
                            <td><a href="assignment_info.php"><h4><?php  echo $rows['assignment_marks']; ?></h4></a></td>
                            <td><a href="student_list.php?id=<?php echo $rows['class_id']; ?>"><h4><?php  echo $rows['class_name']; ?></h4></a></td>

                            <td><a href="assignment_info.php"><h4><?php  echo $rows['date_of_submission']; ?></h4></a></td>


                        </tr>
                      <?php  }


                      ?>


                        <!-- ===================================================================== -->
                     </table>
               </div>
   				<br>
   			</div>

   			<!-- <div class="col-three"></div> -->
   		</div>
   </section>


	<?php include('../layouts/footer.php') ?>
   <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/notify.js"></script>
   <script src="../js/main.js"></script>
	 <script type="text/javascript">
       var status = "<?php if(isset($_SESSION['login_success'])){
			 									echo $_SESSION['login_success'];}
												elseif(isset($_SESSION['show_notif'])){
													echo $_SESSION['show_notif'];
												}
												else{}
									?>";
       function closeNotif() {
          document.getElementById('notif-box').style.opacity = 0;
          document.getElementById('notif-box').style.left = "-400px"
       }
       function showNotif(){
          document.getElementById('notif-box').style.backgroundColor = "<?php echo $_SESSION['notif-box-color']; ?>";
          document.getElementById('notif-box-content').innerHTML = "<?php echo $_SESSION['notif-box-message']?>";
          document.getElementById('notif-box').style.opacity = 1;
          document.getElementById('notif-box').style.left = "10px";
       }
       if(status == "1"){
          setTimeout(showNotif, 500);
          setTimeout(closeNotif, 5000);
       }
    </script>
		<?php
		if(isset($_SESSION['login_success']))
			 unset($_SESSION['login_success']);
		elseif (isset($_SESSION['show_notif'])){
			unset($_SESSION['show_notif']);
		}
		else{}
		?>
</body>
</html>
