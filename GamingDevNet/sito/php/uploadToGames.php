<?php
//upload file zip
if($_FILES["zip_file"]["name"]) {
	$filename = $_FILES["zip_file"]["name"];
	$source = $_FILES["zip_file"]["tmp_name"];
	$type = $_FILES["zip_file"]["type"];
	
	$name = explode(".", $filename);
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			break;
		} 
	}
    
    $continue = strcmp(strtolower($name[1]), 'zip');
	if($continue == -1) {
        $messageZip = "The file you are trying to upload is not a .zip file. Please try again.";
    }
    else{

        $target_path = "../games/".$filename;  // change this to the correct site path
       
        if(move_uploaded_file($source, $target_path)) {
            
            $zip = new ZipArchive();
            $x = $zip->open($target_path);
            if ($x === true) {
                $oldmask = umask(0); //setto la maschera a 0 per avere permessi file a 777
                $zip->extractTo("../games/"); // change this to the correct site path
                $zip->close();
                
                unlink($target_path);
                umask($oldmask); //rimetto la maschera nel formato di default ovvero 0022
            }
            $messageZip = "Your .zip file was uploaded and unpacked.";

        } else {	
            $messageZip = "There was a problem with the upload. Please try again.";
        }

    }
}

//upload icona del gioco
if($_FILES["formicon"]["name"]) {

    $target_dir = "../avatars/";
    $target_file = $target_dir . basename($_FILES["formicon"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["formicon"]["tmp_name"]);
        if($check !== false) {
            $messageIcon = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $messageIcon = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $messageIcon = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["formicon"]["size"] > 5000000) {
        $messageIcon = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $messageIcon = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $messageIcon = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["formicon"]["tmp_name"], $target_file)) {
            $messageIcon = "The file ". basename( $_FILES["formicon"]["name"]). " has been uploaded.";
        } else {
            $messageIcon = "Sorry, there was an error uploading your file.";
        }
    }
}
  
    include "session.php";

    $stmt = $conn->prepare("INSERT INTO videogame (gamename, descrgame, genre, gamefolder, iconfolder, userid) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $gamename, $descrgame, $genre, $gamefolder, $iconfolder, $userid);

    $gamename = $_POST["gamename"];
    $descrgame = $_POST["comment"];
    $genre = $_POST["genre"];
    $gamefolder = $_FILES["zip_file"]["name"];
    $iconfolder = $_FILES["formicon"]["name"];
    $userid = $_SESSION['id'];
    $stmt->execute();

    $stmt->close();
    $conn->close();


        echo '<!DOCTYPE html>
    <html lang="it">
    <head>
        
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     
        <title>GamingDevNet - Response Message</title>
    </head>
    <body>
        
       ';
       
       include "navbar.php";
       echo '
        
        <h1 class="display-1 font-weight-bold text-danger text-center">   
        
        '.$messageIcon.'
        
        </h1>

        <h1 class="display-1 font-weight-bold text-danger text-center">   
        
        '.$messageZip.'
        
        </h1>
        
        
       
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>';
    header('refresh:1;url= ../index.php');

?>
