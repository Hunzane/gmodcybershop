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
        }
        
        $tikid = $query[id];
        $msg = substr($query[msg], 0, 1000);
        
        $sql = "SELECT * FROM `tickets` WHERE `id`='$tikid'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $tikid = $rowa['id'];
            $tiktheme = $rowa['theme'];
            $tikauthor = $rowa['author'];
            $tikstatus = $rowa['status'];
        }
        
        if($tikauthor != $uid or $tikstatus == '0' or $msg == ''){} else {
            
            $datetime = date('Y-m-d H-i-s');
            
            $sqlc = "INSERT INTO `ticket_messages` (`id`, `ticket`, `author`, `message`, `date`) VALUES (NULL, '$tikid', '$uid', '$msg', '$datetime')";
            mysqli_query($conn, $sqlc);
        
        }
        
        mysqli_close($conn);
        
    }
}
?>