	<?php 
	require '../php/includes/User.php';
	session_start();
	if(isset($_SESSION['user']))
	   $user = unserialize($_SESSION['user']);
	if(isset($_SESSION['err'])){
	   echo "<script>alert('".$_SESSION['err']."');</script>";
	   unset($_SESSION['err']);
	}
	
	?>
	<header>

	<div class="row">

		<div class="logo">
         <a href="dashboard.php">Pacific</a>
      </div>

   	<nav id="main-nav-wrap ">
			<ul class="main-navigation">
				<?php

				// $var = $user->email;
				
					if($active=="dashboard"){
						echo '<li class="current"><a href="dashboard.php" title="">Dashboard</a></li>
						<li><a href="projects.php" title="">Projects</a></li>
						<li><a href="assignments.php" title="">Assignments</a></li>
						<li class="highlight with-sep"><a href="#features" title=""><i class="fa fa-user-circle-o"></i>Hi , '.$user->name.' </a></li>
						<li class="highlight"><a href="profile.php">My Profile</a></li>
						<li class="highlight"><a href="../php/logout.php">Logout</a></li>';  
					} 
					if($active=="projects"){
						echo '<li><a href="dashboard.php" title="">Dashboard</a></li>
						<li class="current"><a href="projects.php" title="">Projects</a></li>
						<li><a href="assignments.php" title="">Assignments</a></li>
						<li class="highlight with-sep"><a href="#features" title=""><i class="fa fa-user-circle-o"></i>hi , '.$user->name.'</a></li>
						<li class="highlight"><a href="profile.php">My Profile</a></li>
						<li class="highlight"><a href="../php/logout.php" title="">Logout</a></li>';
					} 
					if($active=="assignments"){
						echo '<li><a href="dashboard.php" title="">Dashboard</a></li>
						<li><a href="projects.php" title="">Projects</a></li>
						<li class="current"><a href="assignments.php" title="">Assignments</a></li>
						<li class="highlight with-sep"><a href="#features" title=""><i class="fa fa-user-circle-o"></i>hi , '.$user->name.'</a></li>
						<li class="highlight"><a href="profile.php">My Profile</a></li>
						<li class="highlight"><a href="../php/logout.php" title="">Logout</a></li>';
					} 
				?>


											
			</ul>
		</nav>

		<a class="menu-toggle" href="#"><span>Menu</span></a>
		
	</div>   	
	
</header> 
