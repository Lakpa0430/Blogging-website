<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>Text Editor</title>
	<!--Bootstrap Cdn -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- fontawesome cdn For Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
      <link rel="stylesheet" href="CSS/create_blog.css">
	<!--Internal CSS start-->

	<!--Internal CSS End-->
</head>
<!--Body start-->
<style>
	.btn{
		padding-left: 50px;
	}
</style>

<body>
	<?php
	session_start();
	?>

	<?php
	$server = "localhost";
	$username = "Lakpa";
	$password = "Sherpa@1123";
	$database = "signup";


	$connection = mysqli_connect("$server", "$username", "$password", "$database");



	if (!$connection) {
		die(mysqli_connect_error());
	}
	if (isset($_FILES['image'])) {

		$_SESSION['selected_img'] = $_FILES['image'];

		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_size = $_FILES['image']['size'];

		$img_ex = pathinfo($file_name, PATHINFO_EXTENSION);
		$img_ex_lc = strtolower($img_ex);
		$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
		$img_upload_path = 'Upload/' . $new_img_name;
		move_uploaded_file($file_tmp, $img_upload_path);


		$_SESSION['File_unique_id'] = $new_img_name;
	}

	if (isset($_POST['post']) && !empty($_SESSION['selected_img'])) {

		$new_img_name = $_SESSION['File_unique_id'];
		$text = $_POST['text_for_post'];



		$insert_command = "INSERT INTO postingdetails(Images, Post)VALUES('$new_img_name', '$text')";
		$insert_query = mysqli_query($connection, $insert_command);


		if ($insert_query) {
			$info = "Your details has been posted";
			$_SESSION['info'] = $info;
		}
	}else if (isset($_POST['cancel'])) {
		$_SESSION['selected_img']=NULL;
		header("location:homepage.php");
	}

	if (isset($_POST['ok'])) {
		$_SESSION['info'] = NULL;

		if (!isset($_SESSION['info'])) {
			header("location:homepage.php");
		}
	}




	if (isset($_GET['command'])) {
		
	}
	?>
	<section class="">
		<h1 class="shadow-sm">TEXT EDITOR</h1>
		<div class="flex-box">
			<div class="row">
				<div class="col">
					<button type="button" onclick="f1()" class=" shadow-sm btn btn-outline-secondary buttons" data-toggle="tooltip" data-placement="top" title="Bold Text">
						Bold</button>

					<button type="button" onclick="f2()" class="shadow-sm btn btn-outline-success buttons" data-toggle="tooltip" data-placement="top" title="Italic Text">
						Italic</button>
					<button type="button" onclick="f3()" class=" shadow-sm btn btn-outline-primary buttons" data-toggle="tooltip" data-placement="top" title="Left Align">
						<i class="fas fa-align-left"></i></button>
					<button type="button" onclick="f4()" class="btn shadow-sm btn-outline-secondary buttons" data-toggle="tooltip" data-placement="top" title="Center Align">
						<i class="fas fa-align-center"></i></button>
					<button type="button" onclick="f5()" class="btn shadow-sm btn-outline-primary buttons" data-toggle="tooltip" data-placement="top" title="Right Align">
						<i class="fas fa-align-right"></i></button>
					<button type="button" onclick="f6()" class="btn shadow-sm btn-outline-secondary buttons" data-toggle="tooltip" data-placement="top" title="Uppercase Text">
						Upper Case</button>
					<button type="button" onclick="f7()" class="btn shadow-sm btn-outline-primary buttons" data-toggle="tooltip" data-placement="top" title="Lowercase Text">
						Lower Case</button>
					<button type="button" onclick="f8()" class="btn shadow-sm btn-outline-primary buttons" data-toggle="tooltip" data-placement="top" title="Capitalize Text">
						Capitalize</button>
					<button type="button" onclick="f9()" class="btn shadow-sm btn-outline-primary side buttons" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
						Clear Text</button>
				</div>
			</div>
		</div>
		<br>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
			<div class="row">
				<div class="col-md-3 col-sm-3">
				</div>
				<div class="col-md-6 col-sm-9">
					<div class="flex-box">
						<textarea id="textarea1" class="input shadow" name="text_for_post" rows="10" cols="100" placeholder="Your text here ">
					</textarea>
					</div>
				</div>
				<div class="col-md-3">
				</div>
			</div>
			<br>
			<br>
			<button type="submit" name="cancel" class="btn btn-secondary">Cancel</button> 	
			<button type="submit" name="post" class="btn btn-success">Post</button>
	</section>
	</form>

	<?php
	if (isset($_SESSION['info'])) {
	?>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
			<div class="box">
				<div class="popup">
					<img src="CSS/Images/404-tick.png">
					<h2>Sucessfull!</h2>
					<p><?php echo $_SESSION['info']; ?></p>
					<button class="popup-btn" type="submit" name="ok">Ok</button>
				</div>
			</div>
		</form>
	<?php
	}
	?>


	<!--External JavaScript file-->
	<script src="Js/create_blog.js"></script>
</body>

</html>