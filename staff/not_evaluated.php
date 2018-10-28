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
	$active="assignments";
	include 'db.php';
	 include('../layouts/nav.php');
	 
	 $id = $_GET['id'];  //Get the class id 
	 $id2 = $_GET['id2']; //Get assignment id
	 
	 $result1 = mysqli_query($conn,"SELECT * from assignments where assignment_id='".$id2."'"); //For assigned by column

	//  $result2 = mysqli_query($conn,"SELECT distinct  u.email,a.assignment_marks from users u,assignments a where a.class_id = u.class_id and u.class_id=$id and u.role_id = 1  ");//for displaying the students of class who are submitting the assignments
	$result2 = mysqli_query($conn,"SELECT distinct  u.email,a.assignment_marks from users u,assignments a where a.class_id = u.class_id and u.class_id=$id and u.role_id = 1 and assignment_id=$id2  ");//for displaying the students of class who are submitting the assignments
	 $result3 = mysqli_query($conn,"SELECT distinct * from assignment_evaluation where assignment_id = $id2 and assignment_marks = 0 "); // for evaluation of the marks
	 $rowcount = mysqli_num_rows($result2);?>

	 <!-- //Get the count -->
	
	<section class="ass_info">
		<div class="row">
			<form>
<!-- ============================================================PHP================================================== -->

		<?php
         // For dipalying the assignment name n the tanle header
        while($rows = mysqli_fetch_assoc($result1))
            { ?>
			 	<div class="table-header"><h5><?php echo $rows['assignment_name']; ?></h5></div>
	   <?php } ?>
<!-- ========================================================PHP ENDS====================================================== -->
			 
				
			</form>
		</div>
		<div class="row">
			<table>
				<tr>
					 <th width="8%">Sr No</th>
					 <!-- ====================Table Headers =================================== -->
					<th>Name</th>
					<th width="20%">Status</th>
					<th width="20%">View Files</th>
					<th width="12%">Score</th>
					<th width="10%">Evaluate</th>
				</tr>
				<!-- ==============================================PHP Starts =========================================== -->
		<?php
			$x=1;
			while($rows = mysqli_fetch_assoc($result2) and $x <= $rowcount and $rows2 = mysqli_fetch_assoc($result3) )
			    {?>
				 <tr>
					
				<!-- For displaying the students who had submitted their work and evaluate -->

				 <td><?php echo $x; $x++; ?></td>	 
			 	<td><a href="#"><h4><?php  echo $rows['email']; ?></h4></a></td>
                <td><a href="#"><h4><?php  echo $rows2['status']; ?></h4></a></td>
				<td><a href="../student/assignments/uploads/pdf/<?php echo $rows2['pdf_file'] ?>" target="_blank" ><h4><?php  echo $rows2['pdf_file']; ?></h4></a></td>
				<!-- For evaluation of the marks pass the id and take the input marks from the user -->
				<td><form method="GET" action="evaluate.php">
					<input type = "text" value = "<?php echo $rows2['assignment_marks']  ?>" name="scoreupdated" ></td>
					<td><input type = "submit" value = "Save" name="score"  >
					<input type="hidden" name="aid" value="<?php echo $rows2['assignment_id']; ?>"/>
					<input type="hidden" name="uid" value="<?php echo $rows2['user_id']; ?>"/>
					<input type="hidden" name="aeid" value="<?php echo $rows2['assignment_evaluation_id']; ?>"/>
				</form></td>
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