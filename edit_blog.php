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

	if (isset($_GET['command'])) {
		
	}
   if (isset($_GET['id'])) {
        $_SESSION['edit_id']=$_GET['id'];
   }


   if (isset($_POST['save'])) {
     $edit_text = $_POST['text_for_edit'];
     $id_to_be_edited = $_SESSION['edit_id'];

     $update_command = "UPDATE postingdetails SET Post= '$edit_text' WHERE id = $id_to_be_edited";

     $update_query = mysqli_query($connection, $update_command);

     if ($update_query) {
        $edit_info ="Your Post has been sucessfully edited";
        $_SESSION['edit_info']= $edit_info ;
     }
   }
   
   else if (isset($_POST['cancel'])) {
    unset($_SESSION['id']);
    if (!isset($_SESSION['id'])) {
        header("location:homepage.php");
    }
    }

   if (isset($_POST['ok'])) {
       unset($_SESSION['edit_info']);

       if (!isset($_SESSION['edit_info'])) {
        header("location:homepage.php");
       }
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
						<textarea id="textarea1" class="input shadow" name="text_for_edit" rows="10" cols="100" placeholder="Your text here ">
					</textarea>
					</div>
				</div>
				<div class="col-md-3">
				</div>
			</div>
			<br>
			<br>
			<button type="submit" name="cancel" class="btn btn-secondary">Cancel</button> 	

			<button type="submit" name="save" class="btn btn-success">Save</button>
	</section>
	</form>

	<?php
	if (isset($_SESSION['edit_info'])) {
	?>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
			<div class="box">
				<div class="popup">
					<img src="CSS/Images/404-tick.png">
					<h2>Sucessfull!</h2>
					<p><?php echo $_SESSION['edit_info']; ?></p>
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