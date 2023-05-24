<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id_produk'];
    
    $name = $_POST['name'];
        $harga = $_POST['price'];
        $stok = $_POST['stok'];
        $desc = $_POST['deskripsi'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE tbl_produk SET nm_produk='$name', deskripsi='$desc', rp_harga='$harga', stok='$stok' WHERE id_produk=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tbl_produk WHERE id_produk=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['nm_produk'];
        $harga = $user_data['rp_harga'];
        $stok = $user_data['stok'];
        $desc = $user_data['deskripsi'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Deskripsi</td>
                <td><textarea name="deskripsi"><?php echo $desc;?></textarea></td>
            </tr>
            <tr> 
                <td>Harga</td><td><input type="text" name="price" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>Stok</td>
                <td><input type="text" name="stok" value=<?php echo $stok;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_produk" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
