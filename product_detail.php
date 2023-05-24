<?php
// include database connection file
    include_once("config.php");

    // Fetch product data
    $id = $_GET['id_produk'];
    $result = mysqli_query($mysqli, "SELECT * FROM tbl_produk WHERE id_produk=$id");

    while($user_data = mysqli_fetch_array($result))
    {
        $name = $user_data['nm_produk'];
        $harga = $user_data['rp_harga'];
        $stok = $user_data['stok'];
        $desc = $user_data['deskripsi'];
        $img = $user_data['img_url'];
    }

    
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail</title>
    <link rel="stylesheet" href="src/style/css/deatil.css" />
  </head>
  <body>
    <!-- Navbar start -->
    <nav>
      <div class="nav-container">
        <a href="/home">
          <p>Rumah Makan Padang</p>
        </a>
        <ul>
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
    </nav>
    <!-- Navbar end -->

    <!-- content start -->
    <div class="container">
      <div class="img-produk">
        <div class="thumbnail">
            <img src="<?php echo $img; ?>" alt="" />
        </div>
      </div>
      <div class="desc-produk">
      <h1><?php echo $name; ?></h1>
        <div class="harga">
            <h1><?php echo "Rp$harga"; ?></h1>
            <h4><?php echo "Stok : $stok"; ?></h4>
        </div>
        <div class="deskripsi">
          <h3>Deskripsi</h3>
          <p><?php echo $desc; ?></p>
        </div>
      </div>
      <form action="insert_trx.php" method="post" class="pesanan">
        <h2>Atur pesanan</h2>
        <div class="jumlah">
          <label for="">JUMLAH PESANAN</label>
          <input type="number"name="qty" id="qtyInput"/>
        </div><br>
        <div class="note">
            <label for="">CATATAN PESANAN</label>
            <input type="text" placeholder="Tambahkan catatan pesanan" name="note" />
        </div>
        <!-- <div class="btn-chart">
          <button type="submit" name="keranjang" id="keranjang">Tambah Ke Kerangjang</button>
        </div> -->
        <div class="btn-beli">
            <input type="hidden" name="id_produk" value=<?php echo $id;?>>
            <input type="hidden" name="harga" value=<?php echo $harga;?>>
          <button type="submit" name="beli" id="beli">Beli Sekarang</button>
          <!-- <input type="submit" name="beli" value="Beli"> -->
        </div>
      </form>
    </div>
    <!-- content end -->
  </body>
</html>
