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
	 include('../layouts/nav.php');
	 $conn = mysqli_connect('localhost','root','','pacific');
	 $id = $_GET['id'];
	 $id2 = $_GET['id2'];
	 

	   
	 $result1 = mysqli_query($conn,"SELECT * from assignments where assignment_id='".$id2."'");
	 $result2 = mysqli_query($conn,"SELECT distinct a.status, u.email,a.assignment_marks from users u,assignments a where a.class_id = u.class_id and u.class_id=$id and u.role_id = 1 ");
	 
	 $rowcount = mysqli_num_rows($result2); ?>
	
	<section class="ass_info">
		<div class="row">
			<form>
			<?php
                                //include('../php/create_assignments.php');
                               
                              while($rows = mysqli_fetch_assoc($result1))
                              {
                        ?>
			 <div class="table-header"><h5><?php echo $rows['assignment_name']; ?></h5></div>
							  <?php } ?>
			 
				
			</form>
		</div>
		<div class="row">
			<table>
				<tr>
					 <th width="10%">Sr No</th>
					<th>Name</th>
					
					
					<th width="20%">Score</th>
					<th width="20%">Stauts</th>
				</tr>
				
				<?php
	$x=1;

			 while($rows = mysqli_fetch_assoc($result2) and $x <= $rowcount )
			 {
			 	?>
				 <tr>
				 <td><?php echo $x; $x++; ?></td>	 
			 
			 
			 
			 <td><a href="#"><h4><?php  echo $rows['email']; ?></h4></a></td>
                            <td><a href="#"><h4><?php  echo $rows['assignment_marks']; ?></h4></a></td>
							<td><a href="#"><h4><?php  echo $rows['status']; ?></h4></a></td>
				</tr>	

			 <?php } ?>

				
				<!-- <tr>
					<td>2</td>
					<td>Athul Balakrishnan</td>
					<td class="score">40</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Athul Balakrishnan</td>
					<td class="score">40</td>
				</tr>
				<tr>
					<td>4</td>
					<td>Athul Balakrishnan</td>
					<td class="score">40</td>
				</tr>
				<tr>
					<td>5</td>
					<td>Athul Balakrishnan</td>
					<td class="score">40</td>
				</tr>
				<tr>
					<td>6</td>
					<td>Athul Balakrishnan</td>
					<td class="score">40</td>
				</tr>
				<tr>
					<td>7</td>
					<td>Athul Balakrishnan</td>
					<td class="score">40</td>
				</tr>
				<tr>
					<td>8</td>
					<td>Athul Balakrishnan</td>
					<td class="score">40</td>
				</tr> -->

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