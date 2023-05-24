<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>RM Masakan Padang</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="src/style/css/imgs/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="src/style/css/imgs/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="src/style/css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="src/style/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="src/style/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="src/style/css/custom.css">

</head>

<body>
	<!-- header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="home.php">
					<p>RM Masakan Padang</p>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="home.php">Beranda</a></li>
						<li class="nav-item active"><a class="nav-link" href="about.php">Tentang Kami</a></li>
						<li class="nav-item"><a class="nav-link" href="pemesanan.php">Pesan</a></li>
						<?php
                        session_start();
                            // Check if the user is logged in
                            if(isset($_SESSION['email'])) {
                                // User is logged in, hide the login menu
                                // $loginMenuStyle = 'display: none;';
                                if($_SESSION['role']==99) {
                                    echo "<li class='nav-item' ><a class='nav-link' href='index.php'>Dashboard</a></li>";
                                } else {
                                    
                                    echo "<li class='nav-item' ><a class='nav-link' href='logout.php'>Logout</a></li>";
                                }
                            } else {
                                // User is not logged in, show the login menu
                                // $loginMenuStyle = '';
                                echo "<li class='nav-item' ><a class='nav-link' href='login.php'>Login</a></li>";
                            }
                        ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	
	
	<!-- header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Tentang Kami</h1>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Tentang Kami -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<img src="src/style/imgs/about-img.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="inner-column">
						<h1><span>RM Masakan Padang</span></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
						<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem pulvinar.</p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservasi</a>
					</div>
				</div>
				<div class="col-md-12">
					<div class="inner-pt">
						<p>Sed tincidunt, neque at egestas imperdiet, nulla sapien blandit nunc, sit amet pulvinar orci nibh ut massa. Proin nec lectus sed nunc placerat semper. Duis hendrerit elit nec sapien porttitor, ut pretium ipsum feugiat. Aenean volutpat porta nisi in gravida. Curabitur pulvinar ligula sed facilisis bibendum. Nullam vitae nulla elit. </p>
						<p>Integer purus velit, eleifend eu magna volutpat, porttitor blandit lectus. Aenean risus odio, efficitur quis erat eget, mattis tristique arcu. Fusce in ante enim. Integer consectetur elit nec laoreet rutrum. Mauris porta turpis nec tellus accumsan pellentesque. Morbi non quam tempus, convallis urna in, cursus mauris. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>No. Telepon</h4>
						<p class="lead">
							+62 22 - 543-0102
						</p>
					</div>
				</div>
				
				<div class="col-md">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Alamat</h4>
						<p class="lead">
							Jl. Cibaduyut No.47, Kb. Lega, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40329
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer-area bg-f">
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2023 <a href="#">RM Masakan Padang</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- JS FILES -->
	<script src="src/style/js/jquery-3.2.1.min.js"></script>
	<script src="src/style/js/popper.min.js"></script>
	<script src="src/style/js/bootstrap.min.js"></script>
    <!-- PLUGINS -->
	<script src="src/style/js/jquery.superslides.min.js"></script>
	<script src="src/style/js/images-loded.min.js"></script>
	<script src="src/style/js/isotope.min.js"></script>
	<script src="src/style/js/baguetteBox.min.js"></script>
	<script src="src/style/js/form-validator.min.js"></script>
    <script src="src/style/js/contact-form-script.js"></script>
    <script src="src/style/js/custom.js"></script>
</body>
</html>