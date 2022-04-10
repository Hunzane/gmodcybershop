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
            $pname = $rowa['name'];
            $pdescription = $rowa['description'];
            $pimages = $rowa['images'];
            $pprice = $rowa['price'];
            $pauthor = $rowa['author'];
            $pimages = json_decode($pimages, true);
        }
        $sql = "SELECT * FROM `sells` WHERE `product`='$query'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $sellsuser = $rowa['user'];
        }
        if($ubalance >= $pprice or $pauthor == $uid or $sellsuser == $uid){
            $sql = "SELECT * FROM `settings` WHERE `parameter`='comission'";
            $resultsa = mysqli_query($conn, $sql);
            while ($rowa = mysqli_fetch_assoc($resultsa)) {
                $comission = $rowa['data'];
            }

        $sql = "UPDATE `users` SET `balance`= balance - '$pprice' WHERE `id`='$uid'";
        mysqli_query($conn, $sql);
        
        $comissions = 100 - $comission;
        $authorreward = $pprice / 100 * $comissions; 
        
        $sql = "UPDATE `users` SET `balance`= balance + '$authorreward' WHERE `id`='$pauthor'";
        mysqli_query($conn, $sql);
        
        $datenow = date("d.m.y");
        
        $sqlc = "INSERT INTO `sells` (`id`, `product`, `user`, `au`, `price`, `date`) VALUES (NULL, '$query', '$uid', '$pauthor', '$authorreward', '$datenow')";
        mysqli_query($conn, $sqlc);
?>
<style>
    @keyframes color{
        0%  {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        30% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        31% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        32% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        36% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        37% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        41% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        42% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        85% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        86% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        95% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        96% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        100%{color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
    }
    @keyframes color1{
        0%  {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        30% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        31% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        32% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        36% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        37% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        41% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        42% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        85% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        86% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        95% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        96% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        100%{color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
    }
    @keyframes color2{
        0%  {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        30% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        31% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        32% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        36% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        37% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        41% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        42% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        85% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        86% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        95% {color: #12000a;text-shadow:0px 0px 10px #12000a;}
        96% {color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
        100%{color: #ff005d;text-shadow:0px 0px 10px #ff005d;}
    }
    @keyframes hueRotate{
        0%  {
            filter: hue-rotate(0deg);
        }
        50%  {
            filter: hue-rotate(-30deg);
        }
        100%  {
            filter: hue-rotate(0deg);
        }
    }
    .gryaka{
        width: 100vw;
        height: 100vh;
        position: relative;
    }
    .gryaka-1{
        text-align: center;
        border-radius: 10px;
        position: absolute;
        top: 0; bottom: 0; right: 0; left: 0;
        margin: auto;
        width: 230px;
        height: 230px;
        background: rgba(0, 0, 0, 0.8);
        -webkit-box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 1);
        -moz-box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 1);
        box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 1);
    }
    .gryaka-1-1{
        padding: 5px;
        text-shadow: hueRotate 4s ease-in-out infinite, color 4s ease-in-out infinite;
        animation: hueRotate 4s ease-in-out infinite, color 4s ease-in-out infinite;
        font-size: 40px;
    }
    .wait1{
        animation-delay: 1s;
    }
    .wait2{
        animation-delay: .5s;
    }
    .btn{
        left: 0; right: 0;
        margin: auto;
        background: #323232;
        width: 190px;
        height: 25px;
        padding: 2px;
        font-size: 20px;
        border-radius: 5px;
        text-align: center;
        color: darkgray;
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 1);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 1);
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 1);
        cursor: pointer;
    }
    body{
        background: #181818;
    }
</style>
<div class="gryaka">
    <div class="gryaka-1">
        <div class="gryaka-1-1">СПАСИБО</div>
        <div class="gryaka-1-1 wait1">ЗА</div>
        <div class="gryaka-1-1 wait2">ПОКУПКУ</div>
        <br>
        <div class="btn" onclick="cabinet('cbuys')">Просмотреть товар</div>
    </div>
</div>
<?php
        } else { echo('ERROR'); }
    }
}
?>