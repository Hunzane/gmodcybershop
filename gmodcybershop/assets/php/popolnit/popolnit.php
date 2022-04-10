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
    $summ = $query[summ];
    
    $merchant_id = '123'; //  ID вашего магазина
    $secret_word = '123'; // Секретное слово
    $order_id = $uid; // Номер заказа или ID юзера например
    $order_amount = $summ; // Сумма которую пользователь хочет заплатить
    $sign = md5($merchant_id.':'.$order_amount.':'.$secret_word.':'.$order_id); // Формируем подпись
?>
<form method='get' action='https://www.free-kassa.ru/merchant/cash.php'>
    <input type='hidden' name='m' value='<?php echo $merchant_id?>'>
    <input type='hidden' name='oa' value='<?php echo $order_amount?>'>
    <input type='hidden' name='o' value='<?php echo $order_id?>'>
    <input type='hidden' name='s' value='<?php echo $sign?>'>
    <input type='hidden' name='lang' value='ru'>
    <input class='pole' type='submit' name='pay' value='FreeKassa'>
</form>
<?php } ?>