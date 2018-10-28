<?php
        include 'db.php';
            if(isset($_SESSION['user']))
            $user = unserialize($_SESSION['user']);
        
            require_once("../php/functions.php");
            header('Content-Type: text/html; charset=utf-8');
            $authUrl = getAuthorizationUrl("", "");
    ?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/projects.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <title>Document</title>
</head>
<body>

    
    <?php
   $active="dashboard";
    include('../layouts/nav.php');
    ?>       

    <section class="container">
        <div class="row">
            <div class="card col-three">
                <form method="post" action="" enctype="multipart/form-data" id="myform">
                    <div class='preview'>
                        <img 
                        src="<?php 
                        if($user->image_path!=null)
                        echo "$user->image_path";
                        else
                        echo "uploads/person.png" 
                        ?>"
                        id="img" class="profile-photo">
                    </div>
                    <div >
                        <input type="file" id="file" name="file" />
                        <input type="button" class="button" value="Upload" id="but_upload">
                    </div>
                </form>
            </div>
            <div class="col-nine">
                <div class="profile-data">
                    <form id="form" class="form-admin" method="Post">
                        <div class="row">
                            <div class="col-three">
                                <label for="name" class="form-label">Name</label>
                            </div>
                            <div class="col-nine">
                                <input type="text" class="form-control" value="<?php echo "$user->name"?>" name="name" id="name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-three">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="col-nine">
                                <label  class="form-control label" name="email" id="email"><?php echo "$user->email"?></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-three"><label for="role">User Role</label></div>
                            <div class="col-nine">
                            <label class="form-control label" name="email" id="email"><?php echo "$user->role"?></label>
                            </div>              
                        </div>
                        
                        <div class="row">
                            <div class="col-three"><label for="email">Class</label></div>
                            <div class="col-nine">
                            <label class="form-control label" name="email" id="email"><?php echo "$user->class"?></label>
                            </div>              
                        </div>
                        <br>
                        <div class="row" style="text-align:center">
                        <div class="col-twelve"><button type="submit" class="button-class">Save</button></div>
                        <a href=<?php echo "'" . $authUrl . "'" ?>>Authorize</a>
                                       
                        </div>                  
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="space_filler">
    </section>

    <div class="clearfix"></div>

    
    <?php include('../layouts/footer.php') ?>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

        $("#but_upload").click(function(){

            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file',files);

            $.ajax({
                url: 'upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        $("#img").attr("src",response); 
                        $(".preview img").show(); // Display image element
                    }else{
                        alert('file not uploaded');
                    }
                },
            });
        });
        });
    </script>
   
   <script src="../js/plugins.js"></script>
   <script src="../js/notify.js"></script>
   <script src="../js/main.js"></script>
</body>
</html>