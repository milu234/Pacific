<?php

$conn = mysqli_connect("localhost","root","","pacific");
require_once('../vendor/php-excel-reader/excel_reader2.php');
require_once('../vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{

  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            include 'includes/utils.php';

            foreach ($Reader as $Row)
            {

                $name = "";
                if(isset($Row[0])) {
                    $name = mysqli_real_escape_string($conn,$Row[0]);
                }

                $email = "";
                if(isset($Row[1])) {
                    $email = mysqli_real_escape_string($conn,$Row[1]);
                }

                $password = "";
                $password_hash="";
                if(isset($Row[2])) {
                    $password = mysqli_real_escape_string($conn,$Row[2]);
                    $password_hash = password_hash($password_hash,PASSWORD_BCRYPT);
                }

                $role_id='';
                $role="";
                if(isset($Row[3])) {
                    $role = mysqli_real_escape_string($conn,$Row[3]);
                    $role_id = getRoleId($role);
                }

                $class_id='';
                $class="";
                if(isset($Row[4])) {
                    $class = mysqli_real_escape_string($conn,$Row[4]);
                    $class_id = getClassId($class);
                }

                if (!empty($name) || !empty($email) || !empty($password_hash) || !empty($role_id) || !empty($class_id)) {
                    $query = "insert into users(name,email,password,role_id,class_id) values('".$name."','".$email."','".$password_hash."',".$role_id.",".$class_id.")";
                    $result = mysqli_query($conn, $query);
                    $_SESSION['user_imported'] = True;
                    $_SESSION['notif-box-color'] = "green";
                    $_SESSION['notif-box-message'] = "Data successfully imported";
                    header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/admin/dashboard.php");

                    // if (! empty($result)) {
                    //     $type = "success";
                    //     $message = "Excel Data Imported into the Database";
                    // } else {
                    //     $type = "error";
                    //     $message = "Problem in Importing Excel Data";
                    // }
                }
             }

         }
  }
  else
  {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>
