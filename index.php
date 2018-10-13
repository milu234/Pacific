<!DOCTYPE html>
<?php
   require 'php/includes/User.php';
   session_start();
   if(isset($_SESSION['user']))
      $user = unserialize($_SESSION['user']);
   if(isset($_SESSION['err'])){
      echo "<script>alert('".$_SESSION['err']."');</script>";
      unset($_SESSION['err']);
   }
?>
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Pacific</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/index.css">  
   <link rel="stylesheet" href="css/landing.css">
   <link rel="stylesheet" href="css/registration.css">
   
   <!-- script
   ================================================== -->

   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="images/favicon.png">

</head>

<body id="top">
	<!-- header 
   ================================================== -->
   <header>

   	<div class="row">

   		<div class="logo">
	         <a href="index.html">Pacific</a>
	      </div>

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation">
					<li class="current"><a class="smoothscroll"  href="#intro" title="">Home</a></li>
					<li><a class="smoothscroll"  href="#process" title="">Process</a></li>
					<li><a class="smoothscroll"  href="#about" title="">About Us</a></li>
					<li><a class="smoothscroll"  href="#features" title="">Features</a></li>
					
               <?php if(!isset($_SESSION['user'])) {?>
                  <li class="highlight with-sep"><a onclick="login()" href="#">Login</a></li>				
   					<li class="highlight"><a onclick="signup()" href="#">Sign Up</a></li>	
               <?php } else {?>
                  <li class="highlight"><a href="php/logout.php">Logout</a></li>
                  <li class="highlight"><a href="student/dashboard.php">Dashboard</a></li>
                  <li class="highlight"><a href="#">Welcome,<?php echo $user->email ?></a></li>
               <?php }?>
               
				</ul>
			</nav>

			<a class="menu-toggle" href="#"><span>Menu</span></a>
   		
   	</div>   	
   	
   </header> <!-- /header -->       

<div id="id1" class="modal">
      <form class="modal-content"  action="php/registration.php" method = "POST" onsubmit = "return validate()" >
      <span id="span1" class="close">&times;</span> 
         <div class="container">
            <h5 style="text-align: center; color: #05bca9;">Register</h5>
            <hr>
            <div class="formrow">
               <div class="col-three"><label for="email"><b>Email</b></label></div>
               <div class="col-nine"><input type="text" placeholder="Enter your Email"  name="email" id="email"  required></div>           
            </div>

                <!-- ================== -->
                <div class="formrow">
               <div class="col-three"><label for="confpsw"><b>First Name</b></label></div>
               <div class="col-nine"><input type="password" placeholder="Enter your first name"  name="confpsw" id="conf_pass"  required></div>            
            </div>


            <!-- <div class="formrow">
               <div class="col-three"><label for="confpsw"><b>Confirm Password</b></label></div>
               <div class="col-nine"><input type="password" placeholder="Enter your Password again"  name="confpsw" id="conf_pass"  required></div>            
            </div> -->

            <!-- =================================== -->



            <div class="formrow">
               <div class="col-three"><label for="psw"><b>Password</b></label></div>
               <div class="col-nine"><input type="password" placeholder="Enter your Password"  name="psw" id="pass" required></div>              
            </div>
            <div class="formrow">
               <div class="col-three"><label for="confpsw"><b>Confirm Password</b></label></div>
               <div class="col-nine"><input type="password" placeholder="Enter your Password again"  name="confpsw" id="conf_pass"  required></div>            
            </div>
            <div class="formrow">
               <div class="col-three"><label for="category"><b>I am a</b></label></div>
               <div class="col-nine">
                  <label class="container-radio"><b>Student</b><input type="radio" checked="checked" name="radio" value="student" ><span class="checkmark"></label>
                  <label class="container-radio"><b>Teacher</b><input type="radio" name="radio" value="staff" ><span class="checkmark"></label>
               </div>              
            </div>
            <div class="formrow">
               <div class="col-three"><label for="email"><b>Select Class</b></label></div>
               <div class="col-nine">
                  <select class="round" name = "class_name" required="">
                     <option value="0" disabled>Select Class</option>
                     <option value="D5">D5</option>
                     <option value="D10">D10</option>
                     <option value="D15">D15</option>
                     <option value="D20">D20</option>
                     <option value="Teaching_Staff">Teaching Staff</option>
                  </select>
               </div>              
            </div>
            <br>
            <div class="formrow">
               <div class="col-twelve">
                  <label>
                     <input type="checkbox" checked="" name="remember" style="margin-bottom: 15px">Remember Me
                  </label>
               </div>           
            </div>
            <div class="formrow">
               <div class="col-twelve">
                  <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
               </div>             
            </div>

            <div class="formrow" style="justify-content: center;">
               <div class="col-six" style="text-align: center;">
                  <button type="submit" class="signupbtn">Sign Up</button>
               </div>
               <div class="col-six" style="text-align: center;">
                  <button onclick="document.getElementById('id1').style.display='none'" class="cancelbtn">Cancel</button>
               </div>                           
            </div>

            <div class="clearfix">
              
              
            </div>


         </div>
      </form>
   </div>

   <div id="id2" class="modal">
      <form class="modal-content" method="post" action="php/login.php" >
         <span id="span2" class="close">&times;</span> 
         <div class="container">
            <h5 style="text-align: center; color: #05bca9;">Login</h5>
            <hr>
            <div class="formrow">
               <div class="col-three"><label for="email"><b>Email</b></label></div>
               <div class="col-nine"><input type="text" placeholder="Enter your Email"  name="email" required></div>           
            </div>
            <div class="formrow">
               <div class="col-three"><label for="psw"><b>Password</b></label></div>
               <div class="col-nine"><input type="password" placeholder="Enter your Password"  name="psw" required></div>              
            </div>
            <div class="formrow">
               <div class="col-six" style="text-align: center;">
                  <button type="submit" class="signupbtn">Login</button>
               </div>
               <div class="col-six" style="text-align: center;">
                  <button onclick="document.getElementById('id2').style.display='none'" class="cancelbtn">Cancel</button>
               </div>                           
            </div>
            <div style="text-align: center; "><p>You Don't Have An Account Here ?</p><button onclick="signup()" class="button" href="#">Sign Up Here</button></div>
            
         </div>

         <div class="clearfix">           
           
         </div>
      </form>
   </div>

	<!-- intro section
   ================================================== -->
   <section id="intro">

   	<div class="shadow-overlay"></div>

   	<div class="intro-content">
   		<div class="row">

   			<div class="col-twelve">

	   			<h5>Hello welcome to Pacific.</h5>
	   			<h1>A Platfrom to test the real talent.</h1>

	   			<a class="button stroke smoothscroll" href="#process" title="">Learn More</a>

	   		</div>  
   			
   		</div>   		 		
   	</div> 
	 	

   </section> <!-- /intro -->


   <!-- Process Section
   ================================================== -->
   <section id="process">  

   	<div class="row section-intro">
   		<div class="col-twelve with-bottom-line">

   			<h5>Process</h5>
   			<h1>How it works?</h1>

   			<p class="lead">Create and Post your projects here for Evaluation and solve the real time assignments and get yourself evaluated</p>

   		</div>   		
   	</div>

   	<div class="row process-content">

   		<div class="left-side">

   			<div class="item" data-item="1">

   				<h5>Sign Up</h5>

   				<p>A college Email-Id and Password is Enough</p>
   					
   			</div>

   			<div class="item" data-item="2">

	   			<h5>Upload</h5>

	   			<p>Upload the work or projects that you have done beyond the syllabus and get yourself evluated . Complete the tasks and assignments in given time and be a programmer streak</p>
   					
   			</div>
   				
   		</div> <!-- /left-side -->
   		
   		<div class="right-side">
   				
   			<div class="item" data-item="3">

   				<h5>Create</h5>

   				<p>Create groups and start working on the project for better experience and also get yourself a mentor and get yourself evaluated</p>
   					
   			</div>

   			<div class="item" data-item="4">

   				<h5>Publish</h5>

   				<p>Keep track of all your projects before publishing and also complete the fortnight targets . Get an experience of working in a group and also be better programmer</p>
   					
   			</div>

   		</div> <!-- /right-side -->  		

   	</div> <!-- /process-content --> 

   </section> <!-- /process-->    

<!-- About Us section -->
	<section id="about">
		<div class="row section-intro">
			<div class="col-twelve with-bottom-line">
				<h5 class="about-text">About Us</h5>
				<h1 class="about-text">Our team of creators</h1>
			</div>
		</div>
		<div class="about-content">
			<div class="col-four">
				<image src="images/person1.jpg" class="about-image"/>
				<h3 class="about-text">Milan Hazra</h3>
			</div>	
			<div class="col-four">
				<image src="images/person1.jpg" class="about-image"/>
				<h3 class="about-text">Athul Balakrishnan</h3>
			</div>
			<div class="col-four">
				<image src="images/person1.jpg" class="about-image"/>
				<h3 class="about-text">Walsh Fernandes</h3>
			</div>		
		</div>

   </section> <!-- /features --> 
   <!-- features Section
   ================================================== -->
	<section id="features">

		<div class="row section-intro">
	   		<div class="col-twelve with-bottom-line">

	   			<h5>Our features</h5>
	   			<h1>Pick the suitable account type for you.</h1>

	   			<p class="lead">Lorem ipsum Do commodo in proident enim in dolor cupidatat adipisicing dolore officia nisi aliqua incididunt Ut veniam lorem ipsum Consectetur ut in in eu do.</p>

	   		</div>   		
   		</div>

   		<div class="row features-content">

            <div class="bgrid"> 

            	<div class="features-block">

            		<div class="top-part">

	            		<h3 class="plan-title">Staff</h3>
		               <image src="images/staff.jpg" class="feature-image" width="50" height="50"/>

	            	</div>                

	               <div class="bottom-part">

	            		<ul class="features">
		                  <li><strong>3GB</strong> Storage</li>
		                  <li><strong>10GB</strong> Bandwidth</li>		                  
		                  <li><strong>5</strong> Databases</li>		                  
		                  <li><strong>30</strong> Email Accounts</li>
		               </ul>

		               <a class="button large" href="">Get Started</a>

	            	</div>

            	</div>           	
                        
			   </div> <!-- /features-block -->


            <div class="bgrid">

            	<div class="features-block primary">

            		<div class="top-part">

	            		<h3 class="plan-title">Student</h3>
		               <image src="images/student.jpg" class="feature-image" width="50" height="50"/>

	            	</div>               

	               <div class="bottom-part">

	            		<ul class="features">
		                  <li><strong>5GB</strong> Storage</li>
		                  <li><strong>15GB</strong> Bandwidth</li>		                  
		                  <li><strong>7</strong> Databases</li>		                  
		                  <li><strong>40</strong> Email Accounts</li>
		               </ul>

		               <a class="button large" href="">Get Started</a>

	            	</div>
            		
            	</div>            	                 

			  </div> <!-- /features-block -->
		
	</section> <!-- /features -->
	
   <!-- footer
   ================================================== -->
   <footer>

   	<div class="footer-main">
	      	<div class="copyright">
		        <span>© Copyright Pacific.</span> 	         	
		    </div>
   	</div> <!-- /footer-main -->

   </footer>  

   <script>
      function signup(){
         document.getElementById('id2').style.display='none';
         document.getElementById('id1').style.display='block';
      }

      function login(){
         document.getElementById('id2').style.display='block';
      }
      //Get the modal
      var modal1 = document.getElementById('id1');
      var modal2 = document.getElementById('id2');
      var span1 = document.getElementById("span1");
      var span2 = document.getElementById("span2");

      //When the users click anywhere outside the modal
      span1.onclick = function() {
         modal1.style.display = "none"; 
      }
      span2.onclick = function() {
         document.getElementById('id2').style.display='none';
         console.log("done");
      }
      window.onclick = function(event) {
         if (event.target == modal1){
            modal1.style.display = "none";          
         }
         if (event.target == modal2){
            modal2.style.display='none';          
         }          
         // body...

        }
        //  =======================Form validation==========================================

  function validate(){
			var password = document.getElementById('pass').value;
			var conf_password = document.getElementById('conf_pass').value;
			var email = document.getElementById('email').value;
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      

    // ============================Email not valid====================

    if(email.match(mailformat)){
				
				return true;
			} else{
				alert("Email Id is not valid...");
				return false;
			}

			if(password!=conf_password){
				alert("Password Not Matched");
				return false;
			}
			
			return true;
		}
   </script>
   
   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-1.11.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>

</body>

</html>