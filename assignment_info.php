<!DOCTYPE html>
<html>
<head>
	<title>AssignmentInfo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/assignment_info.css">
	
</head>
<body id="top">

	<?php include('layouts/nav.php') ?>

	<section class="ass_info">
		<div class="row">
			<form>
			 <div class="table-header"><h5>Assignment 1</h5></div>
			 <p class="card-body">hello this is the place for question</p>
			</form>
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

<?php include('layouts/footer.php') ?>

</body>
</html>