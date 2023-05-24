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

$id_user = $_SESSION['id_user'];
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM tbl_produk ORDER BY id_produk DESC");
$result2 = mysqli_query($mysqli, "SELECT  tbl_user.email, tbl_user.nohp, 
                                    tbl_transaksi.tgl_transaksi, tbl_transaksi.id_transaksi, tbl_transaksi.status,
                                     tbl_transaksi.note_user, tbl_transaksi.qty, tbl_transaksi.rp_total,
                                     tbl_produk.nm_produk, tbl_produk.rp_harga 
                                     FROM tbl_transaksi 
                                     INNER JOIN tbl_user ON tbl_transaksi.id_user = tbl_user.id_user
                                     INNER JOIN tbl_produk ON tbl_transaksi.id_produk = tbl_produk.id_produk
                                     WHERE tbl_transaksi.id_user = $id_user
                                     ORDER BY id_transaksi DESC");
?>
 
<html>
<head>    
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="src/style/css/bootstrap.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="src/style/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="src/style/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="src/style/css/custom.css">
    <style>
        .status-processed {
            display: inline-block;
            padding: 5px 10px;
            background-color: #EAD63D;
            color: black;
            font-weight: bold;
            border-radius: 5px;
        }
        .status-done {
            display: inline-block;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }
        .status-invalid {
            display: inline-block;
            padding: 5px 10px;
            background-color: #F01818;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
</head>
 
<body>
    <header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index_user.php">
					<p>Dashboard</p>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="home.php">Beranda</a></li>
						<!-- <li class="nav-item"><a class="nav-link" href="add.php">Tambah Produk</a></li> -->
						<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
    
 <br><br>

    <div class="about-section-box">
    <div class="container">
 <h1>Data Transaksi</h1>
        <table width='100%' border=1>
    
            <tr>
                <!-- <th>Pemesan</th>
                <th>No. Kontak</th> -->
                <th>Tanggal</th> 
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th> 
                <th>Total Bayar</th>
                <th>Note</th> 
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php  
            while($user_data2 = mysqli_fetch_array($result2)) {         
                echo "<tr>";
                // echo "<td>".$user_data2['email']."</td>";
                // echo "<td>".$user_data2['nohp']."</td>";
                echo "<td>".$user_data2['tgl_transaksi']."</td>";
                echo "<td>".$user_data2['nm_produk']."</td>";
                echo "<td>".$user_data2['rp_harga']."</td>";
                echo "<td>".$user_data2['qty']."</td>";    
                echo "<td>".$user_data2['rp_total']."</td>";  
                echo "<td>".$user_data2['note_user']."</td>";  
                if($user_data2['status']==0) {
                    
                    echo "<td><p class='status-processed'>Diproses</p></td>";  
                    echo "<td><a href='approve.php?id=$user_data2[id_transaksi]&status=1'>Selesai</a> | <a href='approve.php?id=$user_data2[id_transaksi]&status=2'>Batal</a></td></tr>";
                } else if($user_data2['status']==1) {
                    
                    echo "<td><p class='status-done'>Selesai</p></td>";  
                    echo "<td></td>";
                } else {
                    echo "<td><p class='status-invalid'>Batal</p></td>"; 
                    echo "<td></td>"; 
                }
                        
            }
            ?>
        </table>
    </div>
    </section>

    
    </section>
</body>
</html>
