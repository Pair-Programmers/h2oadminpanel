<?php
 date_default_timezone_set("Asia/Karachi");	
	SESSION_START();
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) { // 30mins
    	session_unset();
    	session_destroy();
	}
	$_SESSION['LAST_ACTIVITY'] = time();
    if($_SESSION["login"]==true){
	}
	else{
		echo "<script> window.location.assign('index.php')</script>";
	}
include("include/conn.php"); 
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<title>MMT</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<?php include('include/header.php')?>
			<?php include('include/sidebar.php')?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Employee</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Edit Riders</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
 <?php
                if(isset($_GET['id'])){
        $edit = $_GET['id'];
    $query = "SELECT employees.id, `username`, employees.name, `phone`, `email`, designation.dname ,`area`,`password`, designation.d_id FROM `employees`, designation WHERE  employees.designation_id = designation.d_id AND employees.id ='$edit'";
    $result = mysqli_query($conn , $query);
    $array = array('6' => 'Sales Representative','2'=>'Manager','3'=>'Assistant','4'=>'Marketing Representative','5'=>'Sales Manager');

    while ($_row = mysqli_fetch_array($result))
    {
    	$id = $_row['id'];
    	$code = $_row['username'];
        $name = $_row['name'];
        $phone = $_row['phone'];
        $email = $_row['email'];
        $designation = $_row['d_id'];
        $area = $_row['area'];
        $password = $_row['password'];
                
    }
     
    }
    ?>
					<!-- start: page -->
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Update Employee Detail</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" action="" method="post" enctype="multipart/form-data">
											
											<div class="form-group">
												<label class="col-md-3 control-label">Code</label>
												<div class="col-md-6">
													<input readonly="true" type="text" id="code" name="code" value="<?php echo $code;?>" class="form-control" >
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" >Full Name</label>
												<div class="col-md-6">
													<input class="form-control" id="name" name="name" value="<?php echo $name;?>" type="text" >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label">Phone</label>
												<div class="col-md-6">
													<input type="text" id="phone" name="phone" value="<?php echo $phone;?>" class="form-control" >
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" >Email</label>
												<div class="col-md-6">
													<input class="form-control" id="email" name="email" value="<?php echo $email;?>" type="email" >
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label">Designation</label>
												<div class="col-md-6">
													<select type="text" class="form-control" id="designation" name="designation">
														<<?php 

	foreach($array as $value=>$name)
	{
		
    	if($value == $designation){
         	echo "<option selected='selected' value='".$value."'>".$name."</option>";
    	}
    	
    	else
    	{
        	 echo "<option value='".$value."'>".$name."</option>";
    	}
	} 

														 ?>
													 </select>
													
												</div>
												
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" >Area</label>
												<div class="col-md-6">
													<input class="form-control" id="area" name="area" value="<?php echo $area;?>" type="text" >
												</div>
											</div>
						
											
											<div class="form-btn">
												<div class="col-md-6">
												  <span class="input-group-btn">
								                     <button class="btn btn-primary" type="Update" name="Update" style="margin-left:50%;">Update</button>
													  <input type="hidden" name="hidA" id="hidB" value="<?php echo $id; ?>">
												  </span>
												</div>
											</div>
											</form>

						           </section>
							</div>
						</div>
					</div>
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>
<?php

if (isset($_POST['Update']))
{
	$username = $_POST['code'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $area = $_POST['area'];
    //$password = $_POST['password'];  

$sql = "Update employees set name='$name', phone = '$phone', email = '$email', designation_id = '$designation', area = '$area' where id = '$username' ";

$run_query = mysqli_query($conn,$sql);
if($run_query){
	
    echo "<script>alert('Record updated')</script>";
	echo "<script>window.open('employeslist.php' , '_self')</script>";
}
else {
    echo "Error updating record: " . mysqli_error($conn);
}

}

else{
    echo "Error in If cond";
}
?>
