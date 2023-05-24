
<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi"></td>
            </tr>
            <tr> 
                <td>Harga</td>
                <td><input type="text" name="price"></td>
            </tr>
            <tr> 
                <td>Stok</td>
                <td><input type="text" name="stok"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $harga = $_POST['price'];
        $stok = $_POST['stok'];
        $desc = $_POST['deskripsi'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO tbl_produk(id_produk,nm_produk,deskripsi,rp_harga,stok) 
                                        VALUES(NULL, '$name','$desc','$harga','$stok')");
        
        // Show message when user added
        echo "Product added successfully. <a href='index.php'>View Data</a>";
    }
    ?>
</body>
</html>
