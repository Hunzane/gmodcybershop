<?php
if(isset($_GET['id'])) {
    $query = (int) $_GET['id'];
    $typ = (int) $_GET['typ'];
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
            if($typ == 1){
                $sql = "UPDATE `withdraw` SET `status`='1' WHERE `id`='$query'";
                mysqli_query($conn, $sql);
                echo('OK');
            } else
            if($typ == 2){
                $sql = "UPDATE `withdraw` SET `status`='2' WHERE `id`='$query'";
                mysqli_query($conn, $sql);
                echo('OK');
            }
        }
        
    }
}
?>