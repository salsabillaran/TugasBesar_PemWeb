<?php
// Create database connection using config file
session_start();
include_once("config.php");

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM tbl_produk ORDER BY id_produk DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.php">Tambah Produk</a><br/><br/>
 
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
</body>
</html>
