<?php
if(isset($_GET['id'])) {
    $query = (int) $_GET['id'];
    require ('../steamauth/steamauth.php');
    if(isset($_SESSION['steamid'])) {
        
        require('../../../config.php');
        
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
            $prodname = $rowa['name'];
        }
        $sql = "SELECT * FROM `sells` WHERE `product`='$prodid' AND `user`='$uid'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $sellsid = $rowa['id'];
        }
        
        if($sellsid != ''){
            
            $sql = "SELECT * FROM `comments` WHERE `product`='$prodid' AND `author`='$uid'";
            $resultsa = mysqli_query($conn, $sql);
            while ($rowa = mysqli_fetch_assoc($resultsa)) {
                $idid = $rowa['id'];
            }
            
                $error='0';
                $query = $_POST['myData'];
                $query = json_decode($query, true);
                $ocenkain = (int) $query[ocenkain];
                $otziv = substr($query[otziv], 0, 1000);
                if($ocenkain == '1'){} else
                if($ocenkain == '2'){} else
                if($ocenkain == '3'){} else
                if($ocenkain == '4'){} else
                if($ocenkain == '5'){} else
                {$error = '1';}
                $datetime = date('Y-m-d H-i-s');
            
            if($idid == ''){
                if($error == '0'){
                    $sqlc = "INSERT INTO `comments` (`id`, `author`, `product`, `comment`, `rating`, `date`) VALUES (NULL, '$uid', '$prodid', '$otziv', '$ocenkain', '$datetime')";
                    mysqli_query($conn, $sqlc);
                }
            } else {
                $sqlc = "UPDATE `comments` SET `comment`='$otziv',`rating`='$ocenkain',`date`='$datetime' WHERE `id`='$idid';";
                mysqli_query($conn, $sqlc);
            }
            
        }
        
        mysqli_close($conn);
        
    }
}
?>