<!DOCTYPE html>
<html>
<head>
    <title>Add Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 15px;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
 
<body>
    <div class="container">
        <h2>Tambah Produk</h2>
        <a href="index.php">Kembali</a>
        <br/><br/>
    
        <form action="add.php" method="post" name="form1">
            <div class="form-group">
                <label>Link Gambar</label>
                <input type="text" name="img">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="price">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok">
            </div>
            <div class="form-group">
                <input type="submit" name="Submit" value="Add">
            </div>
        </form>
        
        <?php
        // Check If form submitted, insert form data into users table.
        if(isset($_POST['Submit'])) {
            $name = $_POST['name'];
            $harga = $_POST['price'];
            $stok = $_POST['stok'];
            $desc = $_POST['deskripsi'];
            $img = $_POST['img'];
            
            // include database connection file
            include_once("config.php");
                    
            // Insert user data into table
            $result = mysqli_query($mysqli, "INSERT INTO tbl_produk(id_produk,nm_produk,deskripsi,rp_harga,stok,img_url) 
                                            VALUES(NULL, '$name','$desc','$harga','$stok','$img')");
            
            // Show message when product added
            header("Location: index.php");
            exit();
        }
        ?>
    </div>
</body>
</html>
