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

    <link rel="shortcut icon" href="style/imgs/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="style/imgs/apple-touch-icon.png">

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
						<li class="nav-item"><a class="nav-link" href="about.php">Tentang Kami</a></li>
						<li class="nav-item active"><a class="nav-link" href="pemesanan.php">Pesan</a></li>
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
					<h1>Produk Kami</h1>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Tentang Kami -->
	<div class="about-section-box">
    <div class="container">
        <?php
            if($_SESSION['role'] == 0) {
                echo "<h3><a href='index_user.php' style='color:blue;'>Lihat Riwayat Transaksi</a></h1><br><br>";
            }
        ?>
        <?php
        // Establish a database connection
        include_once("config.php");

        // Fetch all products from the "product" table
        $query = "SELECT * FROM tbl_produk";
        $result = mysqli_query($mysqli, $query);

        // Check if any products are found
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="row">';

            // Loop through the products and display them
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id_produk'];
                $name = $row['nm_produk'];
                $price = $row['rp_harga'];
                $stock = $row['stok'];
                $description = $row['deskripsi'];
                $image = $row['img_url']; // Assuming the image URL is stored in the 'image' column

                if (empty($image)) {
                    $image = 'https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png'; // Set a default placeholder URL
                }

                // Generate the HTML code for each product
                echo '<div class="col-lg-4 col-md-6 col-sm-12">';
                echo '<div class="card">';
                echo '<img src="' . $image . '" class="card-img-top" alt="' . $name . '">';
                echo '<div class="card-body">';
                echo '<h3 class="card-title">' . $name . '</h3>';
                echo '<p class="card-text"><strong>Harga:</strong> ' . $price . '</p>';
                echo '<p class="card-text"><strong>Stok:</strong> ' . $stock . '</p>';
                echo '<p class="card-text"><strong>Deskripsi:</strong> ' . $description . '</p>';
                echo '<a href="product_detail.php?id_produk=' . $id . '" class="btn btn-primary">Lihat Detail</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            echo '</div>';

        } else {
            echo 'No products found.';
        }
        ?>
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