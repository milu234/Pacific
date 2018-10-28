<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/assignment_info.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome-free-5.4.2-web/css/fontawesome.min.css">
       

</head>

<body id="top">

    <?php 
    include '../php/includes/db.php';
	require '../php/includes/User.php';
	session_start();
	if(isset($_SESSION['user']))
	   $user = unserialize($_SESSION['user']);
	if(isset($_SESSION['err'])){
	   echo "<script>alert('".$_SESSION['err']."');</script>";
	   unset($_SESSION['err']);
    }
    
    $result2= mysqli_query($conn,"SELECT u.name ,u.user_id, c.class_name,r.role_name from users as u ,class as c , role as r where u.role_id = r.role_id and u.class_id = c.class_id and u.role_id != 3");
    $rowcount = mysqli_num_rows($result2);
	
    ?>
    

    <div id="notif-box">
      <span id="notif-close" onclick="closeNotif()" style="float:right;margin:5px 5px 0 0">&times;</span>
      <p id="notif-box-content"></p>
   </div>

    <header>

        <div class="row">

            <div class="logo">
                <a href="dashboard.php">Pacific</a>
            </div>

            <nav id="main-nav-wrap ">
                    <ul class="main-navigation">
                        
						<li class="highlight"><a href="#features" title=""><i class="fa fa-user-circle-o"></i>Hi , <?php echo $user->name ?></a></li>

                        <li><a href="../php/import.php">Import</a></li> 
                        <!-- ================================View users========================================== -->

                    <li><a href="viewusers.php">View Users</a></li> 
						<!-- <li class="highlight"><a href="#features" title=""><i class="fa fa-user-circle-o"></i>Hi , <?php echo $user->name ?></a></li> -->

						<li class="highlight"><a href="../php/logout.php" title="">Logout</a></li>
                    </ul>
            </nav>

            <a class="menu-toggle" href="#"><span>Menu</span></a>
        </div>
    </header>

    
	
   <div id="notif-box">
      <span id="notif-close" onclick="closeNotif()" style="float:right;margin:5px 5px 0 0">&times;</span>
      <p id="notif-box-content"></p>
   </div>

   <section class="stats">
        <div class="row">

        <table>
				<tr>
					 <th width="10%">Sr No</th>
					 <!-- ====================Table Headers =================================== -->
					<th>Name</th>
					<th width="20%">Class</th>
					<th width="20%">Roles</th>
                    <th width="20%">Action</th>

					
				</tr>
				<!-- ==============================================PHP Starts =========================================== -->
		<?php
			$x=1;
			while($rows = mysqli_fetch_assoc($result2) and $x <= $rowcount )
			    {?>
				 <tr>
					
				<!-- For displaying the students who had submitted their work and evaluate -->

				<td><?php echo $x; $x++; ?></td>	  
			 	<td><a href="#"><h4><?php  echo $rows['name']; ?></h4></a></td>
                <td><a href="#"><h4><?php  echo $rows['class_name']; ?></h4></a></td>
                <td><a href="#"><h4><?php  echo $rows['role_name']; ?></h4></a></td>
                <form action="delete.php" method = "GET">
                <td><a href="edit.php?edit=<?php echo $rows['user_id'];  ?>"><h4><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></h4></a>
                </td>
                </form>
                
				
				<!-- For evaluation of the marks pass the id and take the input marks from the user -->
				
				</form></td>
				</tr>	

			 <?php }?>

			 <!-- ====================================================PHP ENDS============================== -->

				
			</table>
            
             </div>
        </div>
   </section>
   <div class="clearfix"></div>
	<script type="text/javascript">
      var status1 = "<?php echo $_SESSION['user_created']; ?>";
      var status2 = "<?php echo $_SESSION['user_imported']; ?>";
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
      if(status1 == "1"){
         setTimeout(showNotif, 500);
         setTimeout(closeNotif, 5000);
      }
      if(status2 == "1"){
         setTimeout(showNotif, 500);
         setTimeout(closeNotif, 5000);
      }
   </script>
	<?php 
      // clear the session var so that the message does not reappear everytime the page reloads
      if(isset($_SESSION['user_created']))
         unset($_SESSION['user_created']);
    if(isset($_SESSION['user_imported']))
         unset($_SESSION['user_imported']);
   ?>
	
   <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/notify.js"></script>
   <script src="../js/main.js"></script>
   <?php include('../layouts/footer.php') ?>
</body>
</html>