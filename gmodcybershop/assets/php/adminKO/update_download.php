<?php
if(isset($_GET['id'])) {
    $query = (int) $_GET['id'];
    ob_start();
    require ('../steamauth/steamauth.php');
    if(isset($_SESSION['steamid'])) {
        require('../../../config.php');
        
        $conn = new mysqli($servername, $username, $password, $db_name);
        $conn->set_charset("utf8");
        
        $sql = "SELECT * FROM `users` WHERE `steamid`='".$_SESSION['steamid']."'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $utype = $rowa['type'];
        }
        
        if($utype == 'admin'){
            
            $sql = "SELECT * FROM `products_updates` WHERE `id`='$query'";
            $resultsa = mysqli_query($conn, $sql);
            while ($rowa = mysqli_fetch_assoc($resultsa)) {
                $upid = $rowa['id'];
                $upname = $rowa['name'];
                $updescription = $rowa['description'];
                $upimages = $rowa['images'];
                $upprice = $rowa['price'];
                $upfile = $rowa['file'];
                $upauthor = $rowa['author'];
                $upimages = json_decode($upimages, true);
            }
            $url = '../../../uploads/tmp/updates/'.$upfile;
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