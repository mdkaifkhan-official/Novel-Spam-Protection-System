<?php 
	include 'db.conn.php';

	$sql  = "SELECT img_name FROM
	         images ORDER BY id DESC";

	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$images = $stmt->fetchAll();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NSPS</title>
	<style>
		body {
			display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #474e5d;
  padding: 0 10px;
		}
		.error {
			color: #a00;
		}
		.gallery img{
            width: 127px;
		}
	</style>
</head>
<body>
	<form method="post" 
	      action="uploads.php"
	      enctype="multipart/form-data">

	    <?php  
            if (isset($_GET['error'])) {
            	echo "<p class='error'>";
            	    echo htmlspecialchars($_GET['error']);
            	echo "</p>";
            }
	    ?>

<style>
			.hlw {	
				position: absolute;
  top: 0.5em;
  left: 0;
  width: 100%;
  margin: 0;
  text-align: center;
  font-size: 55px;
  color: whitesmoke;
}

.doc {	
  position:absolute; left:33%; bottom:280px;
  display: inline-block;
  background-color: #4C4646;
  width: 540px;
  color: red;
  text-align: center;
  border-radius: 10px;
  font-size: 20px;
}
  			
</style>
<div class="doc">Upload Your Original Aadhar Photo of Front Side and Back Side !</div>
<div class="hlw">Novel Spam Protection System</div>

		<input type="file"
		       name="images[]"
		       multiple>
			   
		<button type="submit"
		        name="upload">
		    Upload</button>

			<style>
				
			.hii {
  position:absolute; left:45%; bottom:50px;
  display: inline-block;
  background-color: gray;
  width: 190px;
  color: #ffffff;
  text-align: center;
  border-radius: 10px;
  font-size: 18px;
			}

  .ok {
  position:absolute; left:49%; bottom:220px;
  display: inline-block;
  background-color: gray;
  width: 50px;
  color: #ffffff;
  text-align: center;
  border-radius: 10px;
  font-size: 20px;
}
</style>

			<div class="ok"><a href="indexx.php">Next</a></div>
			<div class="hii">Go to home page- <a href="index.php">Home</a></div>
			