<?php
    include_once("config.php");
 
    // Check if form is submitted for user update, then redirect to homepage after update
    // if(isset($_POST['approve']))
    // {	
        $id = $_GET['id'];
        
        $status = $_GET['status'];
            
        // update user data
        $result = mysqli_query($mysqli, "UPDATE tbl_transaksi SET status=$status WHERE id_transaksi=$id");
        
        // Redirect to homepage to display updated user in list
        header("Location: index.php");
    // }
?>