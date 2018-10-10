<!DOCTYPE html>
<html>
<head>
	<title>Pacific | Dashboard</title>
	<meta charset="utf-8">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/projects.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body id="top">
   <?php include('layouts/nav.php') ?>
 

   <section class="stats">
   		<div class="row">
   			<div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Assignments Submitted</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                           <th>Score</th>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 1</h4></a></td>
                           <td class="score">50</td>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 2</h4></a></td>
                           <td class="score">50</td>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 3</h4></a></td>
                           <td class="score">50</td>
                        </tr>
                     </table>
                  </div>
            </div>
   		</div>
   		<div class="row">
            <div class="col-twelve">
                  <div class="container">
                     <h5 class="add">Assignments Pending</h5>                 
                     <table class="table-common">
                        <tr>
                           <th>Title</th>
                           <th>Score</th>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 1</h4></a></td>
                           <td style="width: 25%; text-align: center;"><button >Submit</button></td>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 2</h4></a></td>
                           <td style="width: 25%; text-align: center;"><button>Submit</button></td>
                        </tr>
                        <tr>
                           <td><a href="assignment_info.php"><h4>Assignment 3</h4></a></td>
                           <td style="width: 25%; text-align: center;"><button>Submit</button></td>
                        </tr>
                     </table>
                  </div>
            </div>
         </div>
   </section>
	
   
	
	<?php include('layouts/footer.php') ?>
   <script src="js/jquery-1.11.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>
</body>
</html>