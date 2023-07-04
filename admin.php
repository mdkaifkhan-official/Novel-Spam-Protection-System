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
	      action="upload.php"
	      enctype="multipart/form-data">

	    <?php  
            if (isset($_GET['error'])) {
            	echo "<p class='error'>";
            	    echo htmlspecialchars($_GET['error']);
            	echo "</p>";
            }
	    ?>
		
	</form>
    <?php if ($stmt->rowCount() > 0) { ?>
	<div class="gallery">
		<h4>All Images</h4>
		<?php foreach ($images as $image) { ?>
		   <img src="upload/<?=$image['img_name']?>">
		<?php } ?>
	</div>
	<?php } ?>

<style>
	.not {
  position:absolute; right:30px; top:20px;
}
</style>
<h3>
<div class="not"><button onclick="location.href='index.php'"> LogOut </button></div>
</h3>

</body>
</html>