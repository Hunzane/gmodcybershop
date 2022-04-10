<?php
if(isset($_GET['id'])) {
    $query = (int) $_GET['id'];
    require ('./assets/php/steamauth/steamauth.php');
    
?>
<?php if(!isset($_SESSION['steamid'])) { ?>

    <style>
        .gryaka{
            width: 100%;
            height: 100%;
            position: relative;
        }
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
        .gryaka-1{
            padding: 5px;
            width: 170px;
            height: 150px;
            top: 0; right: 0; left: 0; bottom: 0;
            margin: auto;
            position: absolute;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            -webkit-box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 1);
            -moz-box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 1);
            box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 1);
        }
        .gryaka-1-1{
            text-align: center;
            font-size: 50px;
            animation: hueRotate 4s ease-in-out infinite, color 4s ease-in-out infinite;
        }
        .gryaka-1-2{
            text-align: center;
            color: darkgray;
            font-size: 20px;
        }
        .gryaka-1-2 a{
            color: gray;
        }
    </style>
    
    <div class="gryaka">
        <div class="gryaka-1">
            <div class="gryaka-1-1">
                ERROR
            </div>
            <div class="gryaka-1-2">
                <br>Необходимо<br><a href="?login">авторизоваться</a><br>для покупки.
            </div>
        </div>
    </div>

<?php } else { ?>
    <?php require('./config.php');
        
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
    ?>
    <style>
        .gryaka{
            width: 100%; height: 100%;
            position: relative;
        }
        .gryaka-1-1-1-close{
            background: red;
            width: 16px;
            height: 16px;
            position: absolute;
            top: 5px;
            left: 5px;
            margin: auto;
            border-radius: 25px;
            -webkit-box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 1);
            -moz-box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 1);
            box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 1);
            color: black;
            text-align: center;
            font-size: 15px;
            cursor: pointer;
        }
        .gryaka-1{
            background: #212121;
            width: 360px; height: 340px;
            top: 0; right: 0; left: 0; bottom: 0;
            margin: auto;
            position: absolute;
            text-align: center;
            color: darkgray;
            border-radius: 5px;
            -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 1);
            -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 1);
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 1);
        }
        .gryaka-1-1{
            width: 100%; height: 100%;
            display: grid;
            grid-template-columns: 1fr;
            grid-auto-rows: 202px 25px 20px 20px;
        }
        .gryaka-1-1-1 img{
            width: 360px; height: 202px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .gryaka-1-1-2{
            padding-top: 2px;
            padding-bottom: 2px;
            font-size: 18px;
            width: 100%;
            height: calc(100% - 4px);
            background: #313131;
        }
        .gryaka-1-1-3{
            margin-top: 8px;
            padding-top: 4px;
        }
        .gryaka-1-1-4{
            position: absolute;
            right: 0; left: 0; bottom: 15px;
            margin: auto;
            width: 200px;
            height: 30px;
            background: #313131;
            border-radius: 5px;
            font-size: 20px;
            padding-top: 4px;
            cursor: pointer;
        }
        .closeback{
            width: 100%;
            height: 100%;
            position: absolute;
        }
    </style>
    <div class="gryaka">
        <div class="closeback" onclick="closebuy()"> </div>
        <div class="gryaka-1">
            <div class="gryaka-1-1">
                <div class="gryaka-1-1-1"><img src="<?php echo $pimages[logo]; ?>"><div onclick="closebuy()" class="gryaka-1-1-1-close">×</div></div>
                <div class="gryaka-1-1-2"><?php echo $pname; ?></div>
                <div class="gryaka-1-1-3"><i class="fas fa-money-bill"></i> Цена: <?php echo $pprice; ?>₽</div>
                <div class="gryaka-1-1-3"><i class="fas fa-coins"></i> Баланс: <?php echo $ubalance; ?>₽</div>
                <?php if($ubalance >= $pprice){ ?>
                    <div class="gryaka-1-1-4" onclick="buyconfirm('<?php echo $query; ?>')"><i class="fas fa-wallet"></i> Оплатить</div>
                <?php } else { ?>
                    <div class="gryaka-1-1-4" onclick="cabinet('crefill')"><i class="fas fa-wallet"></i> Нет денег</div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php }?>
<?php
} else {
?>

<style>
    .gryaka{
        width: 100%;
        height: 100%;
        position: relative;
    }
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
    .gryaka-1{
        padding: 5px;
        width: 170px;
        height: 150px;
        top: 0; right: 0; left: 0; bottom: 0;
        margin: auto;
        position: absolute;
    }
    .gryaka-1-1{
        text-align: center;
        font-size: 50px;
        animation: hueRotate 4s ease-in-out infinite, color 4s ease-in-out infinite;
    }
    .gryaka-1-2{
        text-align: center;
        color: darkgray;
        font-size: 20px;
    }
    .gryaka-1-2 a{
        color: gray;
    }
</style>

<div class="gryaka">
    <div class="gryaka-1">
        <div class="gryaka-1-1">
            ERROR
        </div>
        <div class="gryaka-1-2">
            <br>Необходимо<br><a href="?login">авторизоваться</a><br>для покупки.
        </div>
    </div>
</div>

<?php } ?>