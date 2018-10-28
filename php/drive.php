<?php

require_once '../vendor/google-api-php-client/src/Google/Client.php';
require_once '../vendor/google-api-php-client/src/Google/Service/Oauth2.php';
require_once '../vendor/google-api-php-client/src/Google/Service/Drive.php';
$conn = mysqli_connect('localhost','root','','pacific');
if(isset($_SESSION['user']))
    $user = unserialize($_SESSION['user']);
session_start();
header('Content-Type: text/html; charset=utf-8');
// Init the variables
$driveInfo = "";
$folderName = "";
$folderDesc = "";
// Get the file path from the variable
$file_tmp_name = $_FILES["pdf_file"]["tmp_name"];
// Get the client Google credentials
$credentials = $_COOKIE["credentials"];
// Get your app info from JSON downloaded from google dev console
$json = json_decode(file_get_contents("../conf/GoogleClientId.json"), true);
$CLIENT_ID = $json['web']['client_id'];
$CLIENT_SECRET = $json['web']['client_secret'];
$REDIRECT_URI = $json['web']['redirect_uris'][0];
// Create a new Client
$client = new Google_Client();
$client->setClientId($CLIENT_ID);
$client->setClientSecret($CLIENT_SECRET);
$client->setRedirectUri($REDIRECT_URI);
$client->addScope(
	"https://www.googleapis.com/auth/drive", 
	"https://www.googleapis.com/auth/drive.appfolder");
// Refresh the user token and grand the privileges
$client->setAccessToken($credentials);
$service = new Google_Service_Drive($client);
// Set the file metadata for drive
$mimeType = $_FILES["pdf_file"]["type"];
$title = $_FILES["pdf_file"]["name"];
$description = "Uploaded from your very first google drive application!";
// Get the folder metadata
if (!empty($_POST["folderName"]))
	$folderName = $_POST["folderName"];
if (!empty($_POST["folderDesc"]))
	$folderDesc = $_POST["folderDesc"];
// Call the insert function with parameters listed below
$driveInfo = insertFile($service, $title, $description, $mimeType, $file_tmp_name, $folderName, $folderDesc);
/**
* Get the folder ID if it exists, if it doesnt exist, create it and return the ID
*
* @param Google_DriveService $service Drive API service instance.
* @param String $folderName Name of the folder you want to search or create
* @param String $folderDesc Description metadata for Drive about the folder (optional)
* @return Google_Drivefile that was created or got. Returns NULL if an API error occured
*/
function getFolderExistsCreate($service, $folderName, $folderDesc) {
	// List all user files (and folders) at Drive root
	$files = $service->files->listFiles();
	$found = false;
	// Go through each one to see if there is already a folder with the specified name
	foreach ($files['items'] as $item) {
		if ($item['title'] == $folderName) {
			$found = true;
			return $item['id'];
			break;
		}
	}
	// If not, create one
	if ($found == false) {
		$folder = new Google_Service_Drive_DriveFile();
		//Setup the folder to create
		$folder->setTitle($folderName);
		if(!empty($folderDesc))
			$folder->setDescription($folderDesc);
		$folder->setMimeType('application/vnd.google-apps.folder');
		//Create the Folder
		try {
			$createdFile = $service->files->insert($folder, array(
				'mimeType' => 'application/vnd.google-apps.folder',
				));
			// Return the created folder's id
			return $createdFile->id;
		} catch (Exception $e) {
			print "An error occurred: " . $e->getMessage();
		}
	}
}
/**
 * Insert new file in the Application Data folder.
 *
 * @param Google_DriveService $service Drive API service instance.
 * @param string $title Title of the file to insert, including the extension.
 * @param string $description Description of the file to insert.
 * @param string $mimeType MIME type of the file to insert.
 * @param string $filename Filename of the file to insert.
 * @return Google_DriveFile The file that was inserted. NULL is returned if an API error occurred.
 */
function insertFile($service, $title, $description, $mimeType, $filename, $folderName, $folderDesc) {
	$file = new Google_Service_Drive_DriveFile();
	// Set the metadata
	$file->setTitle($title);
	$file->setDescription($description);
	$file->setMimeType($mimeType);
	// Setup the folder you want the file in, if it is wanted in a folder
	if(isset($folderName)) {
		if(!empty($folderName)) {
			$parent = new Google_Service_Drive_ParentReference();
			$parent->setId(getFolderExistsCreate($service, $folderName, $folderDesc));
			$file->setParents(array($parent));
		}
	}
	try {
		// Get the contents of the file uploaded
		$data = file_get_contents($filename);
		// Try to upload the file, you can add the parameters e.g. if you want to convert a .doc to editable google format, add 'convert' = 'true'
		$createdFile = $service->files->insert($file, array(
			'data' => $data,
			'mimeType' => $mimeType,
			'uploadType'=> 'multipart'
			));
		// Return a bunch of data including the link to the file we just uploaded
		return $createdFile;
	} catch (Exception $e) {
		print "An error occurred: " . $e->getMessage();
	}
}

function shareFile($role,$userEmail,$fileId){
    $userPermission = new Google_Service_Drive_Permission(array(
        'type' => 'user',
        'role' => $role,
        'emailAddress' => $userEmail
      ));
      
      $request = $service->permissions->create(
        $fileId, $userPermission, array('fields' => 'id')
      );
}
    $allowedExts=array("pdf"); 							//accept only pdf
    $a_id = $_GET['id'];  								//Get assignment id
    $temp=explode(".",$_FILES['pdf_file']['name']);		//take the file name
    $extension=end($temp); 								//Filter the extension
    $upload_pdf = $_FILES["pdf_file"]["name"];			//accept the files
    move_uploaded_file($_FILES["pdf_file"]["tmp_name"],"../student/assignments/uploads/pdf/".$_FILES["pdf_file"]["name"]);  //Give the path
    $queryfile = mysqli_query($conn,"INSERT into `assignment_evaluation`(assignment_marks,assignment_comments,assignment_id,user_id,`pdf_file`) values (0,'',$a_id,$user->id,'".$upload_pdf."') ");
    header('location:http://localhost:8080/pacific/student/assignment_info.php')
?>