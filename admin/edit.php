<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>

<body id="top">

    <?php
     
	require '../php/includes/User.php';
	session_start();
	if(isset($_SESSION['user']))
	   $user = unserialize($_SESSION['user']);
	if(isset($_SESSION['err'])){
	   echo "<script>alert('".$_SESSION['err']."');</script>";
	   unset($_SESSION['err']);
    }
    include '../php/includes/db.php';
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $result = mysqli_query($conn,"SELECT * from users where user_id = $id");
        
    }
	
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
                        
						<li class="highlight"><a href="dashboard.php" title=""><i class="fa fa-user-circle-o"></i>Hi , <?php echo $user->name ?></a></li>

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
               <h5 class="add">Add User</h5>
               <div class="card">
               <?php
                                while($rows=mysqli_fetch_assoc($result))
                                { ?>
                    <form class="form-admin" action="update.php" method="GET">
                        <div class="row">
                            <div class="col-three">
                                <label for="name" class="form-label">Name</label>
                            </div>
                            <div class="col-nine">
                               
                                <input type="text" value="<?php echo $rows['name'] ?>" class="form-control" name="name" id="name"  required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-three">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="col-nine">
                                <input type="text"  value="<?php echo $rows['email'] ?>" class="form-control" name="email" id="email"  >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-three"><label for="psw">Password</label></div>
                            <div class="col-nine"><input type="password" class="form-control" placeholder="Enter Password"  name="psw" id="pass" required></div>              
                        </div> 

                         <div class="row">
                            <div class="col-three"><label for="role">User Role</label></div>
                            <div class="col-nine">
                                <label class="container-radio">Student<input type="radio" class="form-control" checked="checked" name="radio" value="student" ><span class="checkmark"></label>
                                <label class="container-radio">Teacher<input type="radio" class="form-control" name="radio" value="staff" ><span class="checkmark"></label>
                            </div>              
                        </div>
                        
                        <div class="row">
                            <div class="col-three"><label for="email">Select Class</label></div>
                            <div class="col-nine">
                                <select name = "class_name" class="form-control" required="">
                                    <option value="0" disabled>Select Class</option>
                                    <option value="D5">D5</option>
                                    <option value="D10">D10</option>
                                    <option value="D15">D15</option>
                                    <option value="D20">D20</option>
                                    <option value="Teaching_Staff">Teaching Staff</option>
                                </select>
                            </div>              
                        </div> -->
                        <br>
                        <div class="row" style="text-align:center">
                            <button type="submit" class="button-class" name="update">Update User</button> 
                            <input type="hidden" name="uid" value="<?php echo $rows['user_id']; ?>"/>           
                        </div>                  
                    </form>
                                <?php } ?>

                    
                    </form>
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