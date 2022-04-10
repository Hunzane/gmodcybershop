<?php
if(isset($_GET['id'])) {
    $query = (int) $_GET['id'];
    require ('./assets/php/steamauth/steamauth.php');
    if(isset($_SESSION['steamid'])) {
        
        require('./config.php');
        
        $conn = new mysqli($servername, $username, $password, $db_name);
        $conn->set_charset("utf8");
        
        $sql = "SELECT * FROM `users` WHERE `steamid`='".$_SESSION['steamid']."'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $uid = $rowa['id'];
            $ubalance = $rowa['balance'];
            $udescription = $rowa['description'];
        }
        $sql = "SELECT * FROM `products` WHERE `id`='$query'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $prodid = $rowa['id'];
            $pprice = $rowa['price'];
            $pauthor = $rowa['author'];
            $prodfile = $rowa['file'];
        }
        $sql = "SELECT * FROM `sells` WHERE `product`='$prodid'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $sellsid = $rowa['id'];
        }
        
        if($sellsid != ''){
            $url = '../storage/'.$prodfile;
            clearstatcache();
        
            if(file_exists($url)) {
                
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($url).'"');
                header('Content-Length: ' . filesize($url));
                header('Pragma: public');
                
                flush(); 
                
                readfile($url,true);
                
                die();
                header('Location: ./');
            } else{ }
        } else { header('Location: ./'); }
    } else { header('Location: ./'); }
} else { header('Location: ./'); }
?>