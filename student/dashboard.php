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
  <style>
   #notif-box{
      /*position is fixed so that the notif box appears anywhere in the window*/
      position:fixed;
      width:200px;
      height: 90px;
      top:50px;
      left:-400px;
      opacity: 0;
      transition:opacity ease-in-out 1000ms, left ease-in-out 1000ms;
      background-color: green;
      color:white;
      border-radius: 4px;
      font-family: Arial;
      z-index: 1000;
   }
   #notif-close{
      cursor: pointer;
      float:right;
      margin-right: 5px;
      margin-top: 2px;
   }
   #notif-box-content{
      margin:7px;
   }
   </style>
</head>

<body id="top">

	
   <div id="notif-box">
      <span id="notif-close" onclick="closeNotif()" style="float:right;margin:5px 5px 0 0">&times;</span>
      <p id="notif-box-content"></p>
   </div>
   
   <?php
   $active="dashboard";
    include('../layouts/nav.php');
    $conn = mysqli_connect('localhost','root','','pacific');
    $result2 = mysqli_query($conn,"SELECT u.email,a.assignment_id,a.assignment_name,a.assignment_marks,a.date_of_submission,a.user_id from users u,assignments a   where a.class_id = u.class_id and u.user_id = $user->id ");
    $result3 = mysqli_query($conn,"SELECT u.email  from users u , assignments a where a.user_id = u.user_id  ");
//      $id = $_GET['assignment_id'];
    
    ?>

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
                           <th>Marks</th>
                           <th>Deadline</th>
                            <th>Assigned By</th>
                        </tr>
                        <?php
                                //include('../php/create_assignments.php');
                               
                              while($rows = mysqli_fetch_assoc($result2) and $rows2 = mysqli_fetch_assoc($result3) )
                              {
                        ?>
                        <tr>
                           <td><a href="assignment_info.php?id=<?php echo $rows['assignment_id']; ?>"><h4><?php  echo $rows['assignment_name']; ?></h4></a></td>
                           <td><a href="assignment_info.php"><h4><?php  echo $rows['assignment_marks']; ?></h4></a></td>
                           <td><a href="assignment_info.php"><h4><?php  echo $rows['date_of_submission']; ?></h4></a></td>
                            <td><a href="assignment_info.php"><h4><?php  echo $rows2['email']; ?></h4></a></td>
                        </tr>
                      <?php  }?>
                     </table>
               </div>
   				<br>
   			</div>
   			
   			<!-- <div class="col-three"></div> -->
   		</div>
   </section>
	<script type="text/javascript">
      var status = "<?php echo $_SESSION['login_success']; ?>";
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
      // clear the session var so that the message does not reappear everytime the page reloads
      if(isset($_SESSION['login_success']))
         unset($_SESSION['login_success']);
   ?>
	<?php include('../layouts/footer.php') ?>
   <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/notify.js"></script>
   <script src="../js/main.js"></script>
</body>
</html>