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

	 $result2 = mysqli_query($conn,"SELECT * from assignments where assignment_id='".$id."'");
	 $allowedExts=array("pdf");
	 if(isset($_POST['submit'])){
	
	
	
		$a_id = $_GET['id'];
		
		 
		 $temp=explode(".",$_FILES['pdf_file']['name']);
		 $extension=end($temp);
		 $upload_pdf = $_FILES["pdf_file"]["name"];
		 
		 
		  move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"assignments/uploads/pdf/".$_FILES["pdf_file"]["name"]);
		  $queryfile = mysqli_query($conn,"INSERT into `assignment_evaluation`(assignment_marks,assignment_comments,assignment_id,user_id,`pdf_file`) values (0,'',$a_id,$user->id,'".$upload_pdf."') ");
		  
	   if($queryfile){
		  	 echo "File Upload";
		   } else{
		  	 echo "Upload Error!!";
		   }

	 }
	

	 
	 ?>

	<section class="ass_info">
		<div class="row">
			
			 <div class="table-header"><h5>Assignment 1</h5></div>
			<form method="post"  enctype="multipart/form-data" >
			 <input type = "file" id = "main-input" class="form-control form-input form-style-base" accept = "application/pdf" name="pdf_file" >
			 <h4  class = "form-input fake-styled-btn text-center truncate"><span class ="margin" >Choose File</span></h4>
			 <input type = "submit" class="btn btn-info" name="submit">
			</form>
			 <br>
			 <?php
			 
			 while($rows = mysqli_fetch_assoc($result2))
			 {
			 	?>
			 <p class="card-body"><?php echo $rows['description_of_assignment']; ?></p>

			 <?php } ?>
			
		</div>

		<div class="row">
			<div class="sec-widget" data-widget="e3d5627b55668a242d472ad134681e63"></div>
		</div>
		
	</section>



 <script>
SEC_HTTPS = true;
SEC_BASE = "compilers.widgets.sphere-engine.com"; 
(function(d, s, id){ SEC = window.SEC || (window.SEC = []);
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; 
  js.src = (SEC_HTTPS ? "https" : "http") + "://" + SEC_BASE + "/static/sdk/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);   
}(document, "script", "sphere-engine-compilers-jssdk"));
</script> 
	<script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/main.js"></script>
<?php include('../layouts/footer.php') ?>

</body>
</html>