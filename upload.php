<?php 

if (isset($_POST['upload'])) {
	include 'db.conn.php';

	$images = $_FILES['images'];
    $num_of_imgs = count($images['name']);

    for ($i=0; $i < $num_of_imgs; $i++) { 
    	
    	$image_name = $images['name'][$i];
    	$tmp_name   = $images['tmp_name'][$i];
    	$error      = $images['error'][$i];
    	if ($error === 0) {
    		
    		$img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array('jpg', 'jpeg', 'png');

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                
                $sql  = "INSERT INTO images (img_name)
                         VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$new_img_name]);
                move_uploaded_file($tmp_name, $img_upload_path);

	            header("Location: index.php");


			}else {
    	     	$em = "You can't upload files of this type";

	            header("Location: index.php?error=$em");
			}

   
    	}else {
    		$em = "Unknown Error Occurred while uploading";
	        header("Location: index.php?error=$em");
    	}
    }	
}