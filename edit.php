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
        $img = $user_data['img_url'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Edit Data</h1>
    <a href="index.php">Back</a>
    
    <form name="update_user" method="post" action="edit.php">
        <table>
            <tr> 
                <td>Link Gambar</td>
                <td><input type="text" name="name" value="<?php echo $img;?>" required></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="name" value="<?php echo $name;?>" required></td>
            </tr>
            <tr> 
                <td>Deskripsi</td>
                <td><textarea name="deskripsi" required><?php echo $desc;?></textarea></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="price" value="<?php echo $harga;?>" required></td>
            </tr>
            <tr> 
                <td>Stok</td>
                <td><input type="text" name="stok" value="<?php echo $stok;?>" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id_produk" value="<?php echo $_GET['id'];?>" required>
                    <input type="submit" name="update" value="Update">
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>
