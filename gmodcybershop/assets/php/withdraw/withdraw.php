<?php
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
    $sql = "SELECT * FROM `withdraw` WHERE `user`='$uid' AND `status`='0'";
    $resultsa = mysqli_query($conn, $sql);
    while ($rowa = mysqli_fetch_assoc($resultsa)) {
        $wid = $rowa['id'];
    }
    
    $error='0';
    $datetime = date('Y-m-d H-i-s');
    
    $query = $_POST['myData'];
    $filename = './txt.txt';
    $query = json_decode($query, true);
    $wallet = $query[wallet];
    $number = $query[number];
    $winthdrawi = $query[winthdrawi];
    $winthdrawis = $winthdrawi;
    
    $winthdrawi = $winthdrawi;
    $winthdrawi = $winthdrawi / 100 * 95;
    
    if($winthdrawis < 10 or $winthdrawis > $ubalance){$error='1';}
    if($wallet == 'qiwi' or $wallet == 'yoomoney' or $wallet == 'card'){}else{$error='1';}
    
    if($wid == '' && $error == 0){
        $sql = "UPDATE `users` SET `balance`= balance - '$winthdrawis' WHERE `id`='$uid'";
        mysqli_query($conn, $sql);
        $sqlc = "INSERT INTO `withdraw` (`id`, `user`, `sum`, `wallet`, `number`, `date`, `status`) VALUES (NULL, '$uid', '$winthdrawi', '$wallet', '$number', '$datetime', '0')";
        mysqli_query($conn, $sqlc);
    }
    
    mysqli_close($conn);
}
?>