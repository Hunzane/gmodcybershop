<?php
require ('../steamauth/steamauth.php');
require ('../../../config.php');

if(isset($_SESSION['steamid'])) {
    if(isset($_POST['myData'])) {
        $query = $_POST['myData'];
        $query = json_decode($query, true);
        
        $conn = new mysqli($servername, $username, $password, $db_name);
        $conn->set_charset("utf8");
        
        $sql = "SELECT * FROM `users` WHERE `steamid`='".$_SESSION['steamid']."'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $uid = $rowa['id'];
            $ubalance = $rowa['balance'];
            $udescription = $rowa['description'];
        }
        
        $theme = substr($query[theme], 0, 50);
        $msg = substr($query[msg], 0, 1000);
        
        if($theme == '' or $msg == ''){} else {
            
            $sqlc = "INSERT INTO `tickets` (`id`, `theme`, `author`, `status`) VALUES (NULL, '$theme', '$uid', '1')";
            mysqli_query($conn, $sqlc);
            
            $tikid = mysqli_insert_id($conn);
            $datetime = date('Y-m-d H-i-s');
            
            $sqlc = "INSERT INTO `ticket_messages` (`id`, `ticket`, `author`, `message`, `date`) VALUES (NULL, '$tikid', '$uid', '$msg', '$datetime')";
            mysqli_query($conn, $sqlc);
        
        }
        
        mysqli_close($conn);
        
    }
}
?>