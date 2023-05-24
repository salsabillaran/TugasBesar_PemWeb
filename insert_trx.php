<?php
    include_once("config.php");
    // Check if form is submitted for user update, then redirect to homepage after update
    session_start();
    if(isset($_POST['beli']))
    {    
        // if(isset($_SESSION['email'])) {
            $harga = $_POST['harga'];
            $id = $_POST['id_produk'];
            $date = date('Y/m/d', strtotime('today'));
            $qty = $_POST['qty'];
            $rpTotal = $qty * $harga;
            $note = $_POST['note'];
            $id_user = $_SESSION['id_user'];

            $result = mysqli_query($mysqli, "INSERT INTO tbl_transaksi(id_transaksi,tgl_transaksi,rp_total,note_user,status,id_method,id_user,id_produk,qty) 
                                            VALUES(NULL, '$date',$rpTotal,'$note',0,1,$id_user, $id,$qty)");
            // Redirect to homepage to display updated user in list
            header("Location: home.php");
        // }
    }
?>