<?php require('./config.php'); ?>
<?php
$datad = (int) $_GET['d'];
$datap = (int) $_GET['p'];
$datas = (int) $_GET['s'];
$datae = (int) $_GET['e'];

$conn = new mysqli($servername, $username, $password, $db_name);
$conn->set_charset("utf8");
if($datad == 0 && $datap == 0){
    $sql = "SELECT * FROM `products` ORDER BY `id` DESC, `price` DESC LIMIT $datas,$datae";
} else if($datad == 0 && $datap == 1){
    $sql = "SELECT * FROM `products` ORDER BY `id` DESC, `price` LIMIT $datas,$datae";
} else if($datad == 1 && $datap == 0){
    $sql = "SELECT * FROM `products` ORDER BY `id`, `price` DESC LIMIT $datas,$datae";
} else if($datad == 1 && $datap == 1){
    $sql = "SELECT * FROM `products` ORDER BY `id`, `price` LIMIT $datas,$datae";
}
$resultsa = mysqli_query($conn, $sql);
while ($rowa = mysqli_fetch_assoc($resultsa)) {
    $prodid = $rowa['id'];
    $pname = $rowa['name'];
    $pdescription = $rowa['description'];
    $pimages = $rowa['images'];
    $pprice = $rowa['price'];
    $pimages = json_decode($pimages, true);
    ?>
    <div class="catalogcard">
        <a href="./#r=shop#id=<?php echo $prodid; ?>" target="_blank">
            <div class="catalogcardimg"><img src="<?php echo $pimages['logo']; ?>"></div>
            <div class="catalogcardinfo">
                <div class="catalogcardinfoname"><?php echo $pname; ?></div>
                <div class="catalogcardinfoot">
                    <div style="float: left;">
                        <?php
                            $cnt = 0;
                            $rate = 0;
                            $sql = "SELECT * FROM `comments` WHERE `product`='$prodid'";
                            $result = mysqli_query($conn, $sql);
                            while ($rowa = mysqli_fetch_assoc($result)) {
                                $prating = $rowa['rating'];
                                if($prating != ''){
                                    $cnt = $cnt + 1;
                                    $rate = $rate + $prating;
                                }
                            }
                            if($cnt == '0'){$rating = '1';} else {$rating = $rate / $cnt;}
                            if($rating >= 1 && $rating < 2){
                                echo '<i style="color: #DCA3FC;" class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                            } else
                            if($rating >= 2 && $rating < 3){
                                echo '<i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                            } else
                            if($rating >= 3 && $rating < 4){
                                echo '<i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                            } else
                            if($rating >= 4 && $rating < 5){
                                echo '<i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i class="far fa-star"></i>';
                            } else
                            if($rating == 5){
                                echo '<i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i>';
                            }
                        ?>
                    </div>
                    <div style="float: right;">Купить за <b class="filled"><?php echo $pprice; ?>₽</b></div>
                </div>
            </div>
        </a>
    </div>
    <?php
}