<?php
// Крч хуйни что бы пиздец не было
    ini_set( 'date.timezone', 'Europe/Berlin' );

    $merchant_id = '123'; // ID вашего магазина
    $merchant_secret = '123'; // Секретное слово которое сгенерировали 

    function getIP() {
    if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
    return $_SERVER['REMOTE_ADDR'];
    }
    //if (!in_array(getIP(), array('136.243.38.147', '136.243.38.149', '136.243.38.150', '136.243.38.151', '136.243.38.189', '136.243.38.108'))) {
    //die("hacking attempt!");
    //}

    $sign = md5($merchant_id.':'.$_REQUEST['AMOUNT'].':'.$merchant_secret.':'.$_REQUEST['MERCHANT_ORDER_ID']);

    if ($sign != $_REQUEST['SIGN']) {
    die('wrong sign');
    }

	$ids = $_REQUEST['MERCHANT_ORDER_ID'];
    $summa = $_REQUEST['AMOUNT'];
    $summa = $summa / 100 * 95;
    
	require('../../../config.php');
    
    $conn = new mysqli($servername, $username, $password, $db_name);
    $conn->set_charset("utf8");
    
    $sql = "UPDATE `users` SET `balance`= balance + '$summa' WHERE `id`='$ids'";
    mysqli_query($conn, $sql);

    die('YES');