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

    $query = $_POST['myData'];
    $query = json_decode($query, true);
    $otziv = htmlspecialchars($query[otziv], ENT_QUOTES);

    $sqlc = "UPDATE `users` SET `description`='$otziv' WHERE `id`='$uid';";
    mysqli_query($conn, $sqlc);

    mysqli_close($conn);
}
?>