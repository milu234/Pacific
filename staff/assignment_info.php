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
	 
	 $result2 = mysqli_query($conn,"SELECT * from assignments where assignment_id = '".$id."' "); ?>

	<section class="ass_info">
		<div class="row">
			<form>
			 <div class="table-header"><h5>Assignment 1</h5></div>
			 
			 <?php
			 
			 while($rows = mysqli_fetch_assoc($result2))
			 {
			 	?>
			 <p class="card-body"><?php echo $rows['description_of_assignment']; ?></p>

			 <?php } ?>
	
			</form>
		</div>
		<div class="row">
			<table>
				<tr>
					<th width="10%">Sr No</th>
					<th>Name</th>
					<th width="20%">Score</th>
				</tr>
				<tr>
					<td>1</td>
					<td>Athul Balakrishnan</td>
					<td class="score">40</td>
				</tr>
				<tr>
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
				</tr>

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