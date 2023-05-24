<?php
// Create database connection using config file
session_start();
include_once("config.php");

// Check if the user is not logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM tbl_produk ORDER BY id_produk DESC");
$result2 = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi ORDER BY id_transaksi DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>

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
    <header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<p>Dashboard</p>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="home.php">Beranda</a></li>
						<li class="nav-item"><a class="nav-link" href="add.php">Tambah Produk</a></li>
						<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
<!-- <a href="add.php">Tambah Produk</a><br/><br/>
<a href="logout.php">Logout</a><br/><br/> -->
 <br><br>
    <div class="about-section-box">
    <div class="container">
        <table width='80%' border=1>
    
            <tr>
                <th>Tanggal</th> 
                <th>Note User</th> 
                <th>Jumlah</th> 
                <!-- <th>Action</th> -->
            </tr>
            <?php  
            while($user_data2 = mysqli_fetch_array($result2)) {         
                echo "<tr>";
                echo "<td>".$user_data2['tgl_transaksi']."</td>";
                echo "<td>".$user_data2['note_user']."</td>";
                echo "<td>".$user_data2['qty']."</td></tr>";    
                // echo "<td><a href='edit.php?id=$user_data[id_produk]'>Edit</a> | <a href='delete.php?id=$user_data[id_produk]'>Delete</a></td></tr>";        
            }
            ?>
        </table>
    </div>
    </section>

    <div class="about-section-box">
    <div class="container">
        <table width='80%' border=1>
    
            <tr>
                <th>Nama Produk</th> <th>Harga Produk</th> <th>Stok Produk</th> <th>Action</th>
            </tr>
            <?php  
            while($user_data = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$user_data['nm_produk']."</td>";
                echo "<td>".$user_data['rp_harga']."</td>";
                echo "<td>".$user_data['stok']."</td>";    
                echo "<td><a href='edit.php?id=$user_data[id_produk]'>Edit</a> | <a href='delete.php?id=$user_data[id_produk]'>Delete</a></td></tr>";        
            }
            ?>
        </table>
    </div>
    </section>
</body>
</html>
