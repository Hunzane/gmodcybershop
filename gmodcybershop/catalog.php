<?php require('./config.php'); ?>
<?php
    $query = $_POST['myData'];
    $query = json_decode($query, true);
    $querys = $query[serachber];
    if($querys == ''){}else{ $searcher = htmlspecialchars($querys, ENT_QUOTES); }
?>
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
        height: 100%;
        animation: optic 2s ease-in-out;
    }
    .headersearchbargrid{
        width: 500px;
        display: grid;
        grid-template-columns: 510px 38px;
        top: 0;
        bottom: 0;
        left: 0;
        margin: auto;
    }
    .headerheadersearchbatton{
        width: 38px;
        height: 38px;
        top: 0;
        bottom: 0;
        right: 0;
        margin: auto;
    }
    .headerheadersearchbatton button{
        width: 100%;
        height: calc(100% - 1px);
        background: #3A3A3A;
        border: none;
        color: #DCA3FC;
        font-size: 20px;
        border-bottom-right-radius: 10px;
    }
    .headersearchbar input{
        font-size: 20px;
        width: 500px;
        height: 35px;
        padding-left: 5px;
        padding-right: 5px;
        background: #3A3A3A;
        border: none;
        color: darkgray;
        border-bottom-left-radius: 10px;
    }
    .headersearchbar input::-moz-placeholder { color: gray; }
    .headersearchbar input::-webkit-input-placeholder { color: gray; }
    .headerusersearchbaatton{ display: none; }
    .centrim{
        left: 0; right: 0;
        margin: auto;
        position: absolute;
    }
    @media (max-width: 1080px) {
        .headersearchbar input{
            width: 350px;   
        }
        .headersearchbargrid{
            width: 350px;
            grid-template-columns: 350px 38px;
        }
    }
    .catalogct{
        margin-top: 60px;
        position: absolute;
        width: 100%;
    }
    .catalog{
        right: 0; left: 0;
        margin-left: auto;
        margin-right: auto;
        margin-top: 60px;
        width: 100%;
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
        width: 126px;
        height: 20px;
        padding: 5px;
        padding-left: 15px;
    }
    .catalogfilters i{
        color: #DCA3FC;
    }
</style>
<div class="main">
    <div class="centrim">
        <div class="headersearchbargrid">
            <div class="headersearchbar"><input id="serachber" type="text" placeholder="Поиск..." name="searchtext"></div>
            <div class="headerheadersearchbatton" onclick="catalogsearch()"><button type="submit" name="search"><i class="fas fa-search"></i></button></div>
        </div>
    </div>
    <div class="catalogct">
            <div class="catalogfilters">
                <?php if(isset($_GET['p'])) { $price = (int) $_GET['p']; } else {$price = 0;} ?>
                <?php if(isset($_GET['d'])) { $date = (int) $_GET['d']; } else {$date = 0;} ?>
                <?php if($date == 0 && $price == 0){ ?>
                
                    <div style="float: left; margin-left: 5px;" onclick="catalog('0', '1')">Цена<i class="fas fa-sort-amount-up"></i> </div>
                    <div style="float: left; margin-left: 5px;" onclick="catalog('1', '0')">Дата<i class="fas fa-sort-amount-up"></i> </div>
                    
                <?php } else if($date == 0 && $price == 1){ ?>
                
                    <div style="float: left; margin-left: 5px;" onclick="catalog('0', '0')">Цена<i class="fas fa-sort-amount-down"></i> </div>
                    <div style="float: left; margin-left: 5px;" onclick="catalog('1', '1')">Дата<i class="fas fa-sort-amount-up"></i> </div>
                    
                <?php } else if($date == 1 && $price == 0){ ?>
                
                    <div style="float: left; margin-left: 5px;" onclick="catalog('1', '1')">Цена<i class="fas fa-sort-amount-up"></i> </div>
                    <div style="float: left; margin-left: 5px;" onclick="catalog('0', '0')">Дата<i class="fas fa-sort-amount-down"></i> </div>
                    
                <?php } else if($date == 1 && $price == 1){ ?>
                
                    <div style="float: left; margin-left: 5px;" onclick="catalog('1', '0')">Цена<i class="fas fa-sort-amount-down"></i> </div>
                    <div style="float: left; margin-left: 5px;" onclick="catalog('0', '1')">Дата<i class="fas fa-sort-amount-down"></i> </div>
                    
                <?php } ?>
            </div>
        <div class="catalog" id="catalog">
<?php
    $conn = new mysqli($servername, $username, $password, $db_name);
    $conn->set_charset("utf8");
    
    if($searcher != ''){
        $sql = "SELECT * FROM `products` WHERE `name` LIKE '$searcher%' LIMIT 25";
    } else {
        if($date == 0 && $price == 0){
            $sql = "SELECT * FROM `products` ORDER BY `id` DESC, `price` DESC LIMIT 25";
        } else if($date == 0 && $price == 1){
            $sql = "SELECT * FROM `products` ORDER BY `id` DESC, `price` LIMIT 25";
        } else if($date == 1 && $price == 0){
            $sql = "SELECT * FROM `products` ORDER BY `id`, `price` DESC LIMIT 25";
        } else if($date == 1 && $price == 1){
            $sql = "SELECT * FROM `products` ORDER BY `id`, `price` LIMIT 25";
        }
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
    mysqli_close($conn);
?>
        </div>
        <style>
            #loadmorebtn{
                position: relative;
                margin-top: 10px;
                font-size: 20px;
            }
            #loadmorebtn div{
                padding: 7px;
                text-align: center;
                position: absolute;
                left: 0; right: 0;
                margin: auto;
                background: #313131;
                width: 220px;
                border-radius: 3px;
                cursor: pointer;
            }
        </style>
        <div id="loadmorebtn">
            <?php if($date == 0 && $price == 0){ ?>
                <div onclick="loadmorebtn('0', '0', '25', '50')">Загрузить еще...</div>
            <?php } else if($date == 0 && $price == 1){ ?>
                <div onclick="loadmorebtn('0', '1', '25', '50')">Загрузить еще...</div>
            <?php } else if($date == 1 && $price == 0){ ?>
                <div onclick="loadmorebtn('1', '0', '25', '50')">Загрузить еще...</div>
            <?php } else if($date == 1 && $price == 1){ ?>
                <div onclick="loadmorebtn('1', '1', '25', '50')">Загрузить еще...</div>
            <?php } ?>
        </div>
    </div>
</div>