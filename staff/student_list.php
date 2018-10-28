<!DOCTYPE html>
<html>
<head>
	<title>AssignmentInfo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/assignment_info.css">
	
</head>
<body id="top">

	<?php
	require "../php/includes/db.php";
	$active="assignments";
	 include('../layouts/nav.php');
	 
	 $id = $_GET['id'];  //Get the class id 
	 
	

	 $result2 = mysqli_query($conn,"SELECT distinct  u.email,a.assignment_marks from users u,assignments a where a.class_id = u.class_id and u.class_id=$id and u.role_id = 1 GROUP BY u.email ");//for displaying the students of class who are submitting the assignments
	 
	 $rowcount = mysqli_num_rows($result2); ?> 
	 <!-- //Get the count -->
	
	<section class="ass_info">
		<div class="row">
			<form>
			 
				
			</form>
		</div>
		<div class="row">
			<table>
				<tr>
					 <th width="10%">Sr No</th>
					 <!-- ====================Table Headers =================================== -->
					<th>Name</th>
					
					
					
					
				</tr>
				<!-- ==============================================PHP Starts =========================================== -->
		<?php
			$x=1;
			while($rows = mysqli_fetch_assoc($result2) and $x <= $rowcount  )
			    {?>
				 <tr>
					
				<!-- For displaying the students who had submitted their work and evaluate -->

				 <td><?php echo $x; $x++; ?></td>	 
			 	<td><a href="#"><h4><?php  echo $rows['email']; ?></h4></a></td>
                </tr>	

			 <?php }?>

			 <!-- ====================================================PHP ENDS============================== -->

				
			</table>
		</div>
		
		
	</section>
	<div class="clearfix"></div>
	<script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/main.js"></script>
<?php include('../layouts/footer.php') ?>
<div class="clearfix"></div>
</body>
</html>