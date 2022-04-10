<style>
    @keyframes optic {   
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    .main{
        position: relative;
        font-family: Montserrat-Regular;
        color: darkgray;
        width: 100%;
        height: 600px;
        animation: optic 1s ease-in-out;
    }
    .centrim{
        left: 0; right: 0;
        margin: auto;
        position: absolute;
        width: calc(100vw - 100px);
    }
    @media (max-width: 1080px) {
        .centrim{
            width: calc(100vw - 25px);
        }
    }
</style>
<?php
if(isset($_GET['id'])) {
    $hui = (int) $_GET['id'];
	require('./config.php');
    
    $conn = new mysqli($servername, $username, $password, $db_name);
    $conn->set_charset("utf8");
                    
    $sql = "SELECT * FROM `users` WHERE `id`='$hui'";
    $resultsa = mysqli_query($conn, $sql);
    while ($rowa = mysqli_fetch_assoc($resultsa)) {
        $uid = $rowa['id'];
        $uavatar = $rowa['avatar'];
        $udescription = $rowa['description'];
        $ulogin = $rowa['login'];
    }
?>
<style>
    @media (max-width: 720px) {
        .centrim{
            width: 100vw;
        }
    }
    .gryadka{
        margin-top: 25px;
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 184px;
        height: 100%;
    }
    .gryadka1{
        height: 570px;
        padding: 5px;
        background: #212121;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    .gryadka2{
        height: 580px;
        border-left: 2px solid #181818;
        background: #212121;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    .gryadka2-1 img{
        width: 184px;
        height: 184px;
        border-top-right-radius: 10px;
    }
    .gryadka2-2{
        width: 100%;
        height: 104px;
        text-align: center;
    }
    .gryadka2-2 div{
        padding-top: 3px;
        margin-bottom: 4px;
    }
    .gryadka2-3{
        padding-top: 5px;
        padding-left: 5px;
        padding-right: 5px;
        width: calc(100% - 10px);
        text-align: center;
    }
    .gryadka2-3 div{
        padding: 5px;
        margin-top: 4px;
        background: #313131;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        cursor: pointer;
    }
    .gryadka2-3 button{
        padding: 0;
        color: darkgray;
        font-size: 16px;
    }
</style>
<div class="main">
    <div class="centrim">
	    
	    <div class="gryadka">
	        <div class="gryadka1">
	            <style>
                    .gryadka1-1{
                        text-align: center;
                        font-size: 25px;
                        height: 40px;
                    }
	                .gryadka1-0{
                        height: calc(100% - 40px);
                        width: 100%;
                        font-size: 18px;
                        overflow-x: hidden;
                        overflow-y: auto;
                        text-align: center;
                        position: relative;
                    }
                    .gryadka1-0-1{
                        position: absolute;
                        right: 0;
                        bottom: 0;
                    }
                    .catalog{
                        right: 0; left: 0;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 30px;
                        width: calc(100% - 50px);
                        position: relative;
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(300px, 300px));
                        grid-template-rows: 219px;
                        gap: 10px
                    }
                    .catalogcard{
                        background: #212121;
                        width: 300px;
                        height: 219px;
                        display: grid;
                        grid-template-rows: 1fr;
                        grid-template-rows: 169px 50px;
                        border-top-left-radius: 15px;
                        border-top-right-radius: 15px;
                    }
                    .catalogcard a{
                        color: darkgray;
                        text-decoration: none;
                    }
                    .catalogcardimg{
                        border-top-left-radius: 15px;
                        border-top-right-radius: 15px;
                        background: #212121;
                    }
                    .catalogcardimg img{
                        border-top-left-radius: 15px;
                        border-top-right-radius: 15px;
                        width: 300px;
                        height: 169px;
                    }
                    .catalogcardinfo{
                        background: #212121;
                        height: 50px;
                        border-bottom-left-radius: 15px;
                        border-bottom-right-radius: 15px;
                        display: grid;
                        grid-template-columns: 1fr;
                        grid-template-rows: 20px 20px;
                    }
                    .catalogcardinfoname{
                        padding-top: 2px;
                        padding-right: 5px;
                        padding-left: 5px;
                    }
                    .catalogcardinfoot{
                        padding-top: 7px;
                        padding-right: 5px;
                        padding-left: 5px;
                    }
                    .filled{
                        color: #DCA3FC;
                    }
                    .catalogfilters{
                        right: 0;
                        left: 0;
                        margin: auto;
                        position: absolute;
                        border-radius: 10px;
                        width: 220px;
                        height: 20px;
                        padding: 5px;
                    }
                    .catalogfilters i{
                        color: #DCA3FC;
                    }
                    .publc{
                        width: 100%;
                        height: 60px;
                        position: relative;
                    }
                    .publ{
                        font-size: 25px;
                        width: 165px;
                        height: 30px;
                        bottom: 0;
                        right: 0;
                        left: 0;
                        position: absolute;
                        margin: auto;
                        color: darkgray;
                    }
	            </style>
	            <div class="gryadka1-1"> <?php echo $ulogin; ?> </div>
	            <div class="gryadka1-0" id="gryadka1-0">
	                <?php echo nl2br($udescription); ?>
	            </div>
	        </div>
	        
	        <div class="gryadka2">
	            <div class="gryadka2-1"><img src="<?php echo $uavatar; ?>"></div>
	            <div class="gryadka2-2">
	                    <?php
	                        $res = $conn->query("SELECT count(*) FROM `sells` WHERE `user` = '$uid'");
                            $row = $res->fetch_row();
                            $count_buys = $row[0];
	                    ?>
	                <div><i class="fas fa-shopping-cart"></i> Покупок: <?php echo $count_buys; ?></div>
	                    <?php
	                        $res = $conn->query("SELECT count(*) FROM `sells` WHERE `au` = '$uid'");
                            $row = $res->fetch_row();
                            $count_buys = $row[0];
	                    ?>
	                <div><i class="fas fa-hand-holding-usd"></i> Продаж: <?php echo $count_buys; ?></div>
	                    <?php
                            $cnt = 0;
                            $rate = 0;
                            $sqla = "SELECT * FROM `products` WHERE `author`='$uid'";
                            $results = mysqli_query($conn, $sqla);
                            while ($row = mysqli_fetch_assoc($results)) {
                                $prodid = $row['id'];
                                
                                $sql = "SELECT * FROM `comments` WHERE `product`='$prodid'";
                                $result = mysqli_query($conn, $sql);
                                while ($rowa = mysqli_fetch_assoc($result)) {
                                    $prating = $rowa['rating'];
                                    if($prating != ''){
                                        $cnt = $cnt + 1;
                                        $rate = $rate + $prating;
                                    }
                                }
                            }
                            if($cnt == '0'){$rating = '0';} else {$rating = $rate / $cnt;}
	                    ?>
	                <div><i class="fas fa-star"></i> Рейтинг: <?php echo $rating; ?></div>
	            </div>
	        </div>
	    </div>
    </div>
</div>
<div class="footdog">
    <div class="publc"><div class="publ">Публикации</div></div>
    
    <div class="catalog">
        <?php
            $sql = "SELECT * FROM `products` WHERE `author`='$uid' ORDER BY `id` DESC";
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
        <?php } ?>
    </div>
</div>

<?php mysqli_close($conn); ?>
<?php } ?>