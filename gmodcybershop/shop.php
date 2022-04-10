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
        animation: optic 1s ease-in-out;
        transition: .5s;
    }
    .centrim{
        left: 0; right: 0;
        margin: auto;
        position: absolute;
        width: calc(100vw - 100px);
    }
    
    .gryadka{
        margin-top: 25px;
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 300px;
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
        width: 300px;
        height: 168px;
        border-top-right-radius: 10px;
    }
    .gryadka2-2{
        margin-top: 2px;
        width: 100%;
        height: 104px;
        text-align: center;
    }
    .gryadka2-2 div{
        padding-top: 3px;
        margin-bottom: 4px;
    }
    .gryadka2-3{
        width: 100%;
        height: 260px;
        text-align: center;
        position: relative;
    }
    .gryadka2-3 div{
        right: 0; left: 0; bottom: 0;
        width: 200px;
        height: 25px;
        position: absolute;
        margin: auto;
        padding: 5px;
        background: #313131;
        border-radius: 5px;
        cursor: pointer;
        font-size: 20px;
    }
    .gryadka2-3 a{
        text-decoration: none;
        color: darkgray;
    }
    .gryadka2-1-1{
        margin-top: -3px;
        padding-top: 2px;
        background: #313131;
        width: 100%;
        height: 25px;
        font-size: 18px;
        text-align: center;
    }
    .gryadka1-1{
        width: 100%;
        height: 100%;
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 112px;
    }
    .gryadka1-1-1{
        border-bottom: 5px solid #212121;
        background: #181818;
        border-radius: 10px;
    }
    .gryadka1-1-1 img{
        width: 100%;
        height: 450px;
        object-fit: contain;
        cursor: zoom-in;
    }
    .gryadka1-1-2{
        background: #181818;
        height: calc(100% - 0px);
        overflow-x: scroll;
        overflow-y: hidden;
        display: grid;
        grid-template-columns: repeat(10, 181px);;
        grid-template-rows: 102px;
        gap: 5px;
        border-radius: 10px;
    }
    .gryadka1-1-2 img{
        padding: 3px;
        width: 100%;
        height: calc(100% - 6px);
        border-radius: 5px;
        cursor: pointer;
    }
    @media (max-width: 1080px) {
        .centrim{
            width: calc(100vw - 25px);
        }
        .commenttext{
            width: calc(100% - 30px);
        }
    }
    @media (max-width: 720px) {
        .centrim{
            width: 100vw;
        }
        .gryadka{
            grid-template-columns: 1fr;
            grid-template-rows: 600px 570px;
        }
        .gryadka2-1{
            width: 100%;
            height: 168px;
            position: relative;
            border-top: 3px solid #313131;
        }
        .gryadka2-1 img{
            height: 168px;
            left: 0; right: 0;
            margin: auto;
            position: absolute;
        }
        .gryadka2-1-1{
            margin-top: 0px;
            background: #313131;
        }
    }
    .buywindow{
        position: absolute;
        top: 0; bottom: 0; right: 0; left: 0;
        margin: auto;
        display: none;
    }
</style>

<?php
    if(isset($_GET['id'])) {
        $query = (int) $_GET['id'];
    }
?>

<?php require ('./assets/php/steamauth/steamauth.php'); ?>
<?php 
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
        $pdate = $rowa['date'];
        $pimages = json_decode($pimages, true);
    }
    $sql = "SELECT * FROM `sells` WHERE `product`='$query'";
    $resultsa = mysqli_query($conn, $sql);
    while ($rowa = mysqli_fetch_assoc($resultsa)) {
        $sellsuser = $rowa['user'];
    }
    $userip = $_SERVER['REMOTE_ADDR'];
    $datenow = date("d.m.y");
    $sql = "SELECT * FROM `views` WHERE `product`='$prodid' AND `ip`='$userip' ORDER BY `ID` DESC LIMIT 1";
    $resultsa = mysqli_query($conn, $sql);
    while ($rowa = mysqli_fetch_assoc($resultsa)) {
        $viewid = $rowa['id'];
        $viewproduct = $rowa['product'];
        $viewip = $rowa['ip'];
        $viewdate = $rowa['date'];
    }
    if($viewdate == '' or $viewdate < $datenow){
        $sqlc = "INSERT INTO `views` (`id`, `product`, `ip`, `date`) VALUES (NULL, '$prodid', '$userip', '$datenow')";
        mysqli_query($conn, $sqlc);
    } else {}

    $res = $conn->query("SELECT count(*) FROM `views` WHERE `product` = '$prodid'");
    $row = $res->fetch_row();
    $count = $row[0];
    
    $sql = "SELECT * FROM `users` WHERE `id`='$pauthor'";
    $resultsa = mysqli_query($conn, $sql);
    while ($rowa = mysqli_fetch_assoc($resultsa)) {
        $authorid = $rowa['id'];
        $authorlogin = $rowa['login'];
    }
    
    $res = $conn->query("SELECT count(*) FROM `sells` WHERE `product` = '$prodid'");
    $row = $res->fetch_row();
    $count_buys = $row[0];
?>
<div class="main" id="main">
    <div class="centrim">
        
	    <div class="gryadka">
	        <div class="gryadka1">
	            <div class="gryadka1-1">
	                
	                <div class="gryadka1-1-1" id="gryadka1-1-1">
	                    <a href='<?php echo $pimages[gallery][1]; ?>'><img src="<?php echo $pimages[gallery][1]; ?>"></a>
	                </div>
	                <div class="gryadka1-1-2">
	                    <div onclick="var data = `<a href='<?php echo $pimages[gallery][1]; ?>'><img src='<?php echo $pimages[gallery][1]; ?>'></a>`; document.getElementById ('gryadka1-1-1').innerHTML = data;"><img src="<?php echo $pimages[gallery][1]; ?>"></div>
	                <?php if($pimages[gallery][2] != "-"){ ?>
                        <div onclick="var data = `<a href='<?php echo $pimages[gallery][2]; ?>'><img src='<?php echo $pimages[gallery][2]; ?>'></a>`; document.getElementById ('gryadka1-1-1').innerHTML = data;"><img src="<?php echo $pimages[gallery][2]; ?>"></div>
                    <?php } if($pimages[gallery][3] != "-"){ ?>
                        <div onclick="var data = `<a href='<?php echo $pimages[gallery][3]; ?>'><img src='<?php echo $pimages[gallery][3]; ?>'></a>`; document.getElementById ('gryadka1-1-1').innerHTML = data;"><img src="<?php echo $pimages[gallery][3]; ?>"></div>
                    <?php } if($pimages[gallery][4] != "-"){ ?>
                        <div onclick="var data = `<a href='<?php echo $pimages[gallery][4]; ?>'><img src='<?php echo $pimages[gallery][4]; ?>'></a>`; document.getElementById ('gryadka1-1-1').innerHTML = data;"><img src="<?php echo $pimages[gallery][4]; ?>"></div>
                    <?php } if($pimages[gallery][5] != "-"){ ?>
                        <div onclick="var data = `<a href='<?php echo $pimages[gallery][5]; ?>'><img src='<?php echo $pimages[gallery][5]; ?>'></a>`; document.getElementById ('gryadka1-1-1').innerHTML = data;"><img src="<?php echo $pimages[gallery][5]; ?>"></div>
                    <?php } if($pimages[gallery][6] != "-"){ ?>
                        <div onclick="var data = `<a href='<?php echo $pimages[gallery][6]; ?>'><img src='<?php echo $pimages[gallery][6]; ?>'></a>`; document.getElementById ('gryadka1-1-1').innerHTML = data;"><img src="<?php echo $pimages[gallery][6]; ?>"></div>
                    <?php } if($pimages[gallery][7] != "-"){ ?>
                        <div onclick="var data = `<a href='<?php echo $pimages[gallery][7]; ?>'><img src='<?php echo $pimages[gallery][7]; ?>'></a>`; document.getElementById ('gryadka1-1-1').innerHTML = data;"><img src="<?php echo $pimages[gallery][7]; ?>"></div>
                    <?php } if($pimages[gallery][8] != "-"){ ?>
                        <div onclick="var data = `<a href='<?php echo $pimages[gallery][8]; ?>'><img src='<?php echo $pimages[gallery][8]; ?>'></a>`; document.getElementById ('gryadka1-1-1').innerHTML = data;"><img src="<?php echo $pimages[gallery][8]; ?>"></div>
                    <?php } if($pimages[gallery][9] != "-"){ ?>
                        <div onclick="var data = `<a href='<?php echo $pimages[gallery][9]; ?>'><img src='<?php echo $pimages[gallery][9]; ?>'></a>`; document.getElementById ('gryadka1-1-1').innerHTML = data;"><img src="<?php echo $pimages[gallery][9]; ?>"></div>
                    <?php } if($pimages[gallery][10] != "-"){ ?>
                        <div onclick="var data = `<a href='<?php echo $pimages[gallery][10]; ?>'><img src='<?php echo $pimages[gallery][10]; ?>'></a>`; document.getElementById ('gryadka1-1-1').innerHTML = data;"><img src="<?php echo $pimages[gallery][10]; ?>"></div>
                    <?php } ?>
	                </div>
	                
                </div>
	        </div>
	        
	        <div class="gryadka2">
	            <div class="gryadka2-1"><img src="<?php echo $pimages[logo]; ?>"></div>
	            <div class="gryadka2-1-1"><?php echo $pname; ?></div>
	            <div class="gryadka2-2">
	                <div><i class="fas fa-eye"></i> Просмотров: <?php echo $count; ?></div>
	                <div><i class="fas fa-shopping-bag"></i> Покупок: <?php echo $count_buys; ?></div>
	                <div><i class="fas fa-clock"></i> Опубликован: <?php echo $pdate; ?></div>
	                <div style="cursor: pointer;" onclick="prof('prof', '<?php echo $authorid; ?>')"><i class="fas fa-user"></i> Автор: <?php echo $authorlogin; ?></div>
	                <?php
	                    $cnt = 0;
                        $rate = 0;
                        $sql = "SELECT * FROM `comments` WHERE `product`='$query'";
                        $result = mysqli_query($conn, $sql);
                        while ($rowa = mysqli_fetch_assoc($result)) {
                            $prating = $rowa['rating'];
                            if($prating != ''){
                                $cnt = $cnt + 1;
                                $rate = $rate + $prating;
                            }
                        }
                        if($cnt == '0'){$rating = '0';} else {$rating = $rate / $cnt;}
	                ?>
	                <div><i class="fas fa-star"></i> Рейтинг: <?php echo $rating; ?></div>
	            </div>
	            <div class="gryadka2-3">
	                <?php if(!isset($_SESSION['steamid'])) { ?>
	                    <div><i class="fas fa-key"></i> <?php loginbutton(); ?> </div>
	                <?php } else { ?>
	                    <?php if($sellsuser == $uid){ ?>
	                        <div onclick="cabinet('cbuys')"><i class="fas fa-shopping-cart"></i> Приобретено</div>
	                    <?php } else if($pauthor == $uid) { ?>
	                        <div><i class="fas fa-shopping-cart"></i> Это ваш аддон</div>
	                    <?php } else { ?>
	                        <div onclick="buy('<?php echo $prodid; ?>')"><i class="fas fa-shopping-cart"></i> <?php echo $pprice; ?>₽</div>
	                    <?php } ?>
	                <?php } ?>
	            </div>
	        </div>
	    </div>
		
		<style>
		    .gryadka3{
		        width: 100%;
		        height: 100%;
		        padding: 5px;
		    }
		    .gryadka3-1{
		        color: white;
		        font-size: 25px;
		    }
		    .gryadka3-2{
		        margin-top: 10px;
		        margin-left: 10px;
		    }
		    .gryadka3-hr{
		        border-top: 1px solid #414141;
		        width: 100%;
		        height: 2px;
		    }
		    .comments{
		        margin-top: 10px;
		        margin-left: 10px;
		        width: 100%;
		        height: 100%;
		        display: grid;
		        grid-template-columns: 1fr;
		        grid-template-rows: repeat(1fr);
		        gap: 10px;
		    }
		    .comment{
		        padding: 5px;
		        display: grid;
		        grid-template-columns: 69px 1fr;
		    }
		    .comment img{
		        border-radius: 255px;
		        height: 64px;
		        width: 64px;
		    }
		    .commenttext{
		        padding: 5px;
		        background: #212121;
		        border-radius: 5px;
		    }
		    .commenttexthr{
		        margin-top: 2px;
		        margin-bottom: 2px;
		        width: 100%;
		        height: 2px;
		        border-top: 1px solid #505050;
		    }
		    .commenttextcom{
		        padding-top: 4px;
		        padding-left: 5px;
		    }
		</style>
		
		<div class="gryadka3">
		    <div class="gryadka3-1">Описание</div>
		    <div class="gryadka3-2"><?php echo nl2br($pdescription); ?></div>
		</div>
		    <div class="gryadka3-hr"></div>
		<div class="gryadka3">
		    <div class="gryadka3-1">Отзывы</div>
            <div class="comments">
                <?php
                    $sql = "SELECT * FROM `comments` WHERE `product`='$prodid'";
                    $resultsa = mysqli_query($conn, $sql);
                    while ($rowa = mysqli_fetch_assoc($resultsa)) {
                        $commentsid = $rowa['id'];
                        $commentsauthor = $rowa['author'];
                        $commentsproduct = $rowa['product'];
                        $commentscomment = $rowa['comment'];
                        $commentsdate = $rowa['date'];
                        $commentrating = $rowa['rating'];
                        
                        $sqla = "SELECT * FROM `users` WHERE `id`='$commentsauthor'";
                        $results = mysqli_query($conn, $sqla);
                        while ($row = mysqli_fetch_assoc($results)) {
                            $commentauthorid = $row['id'];
                            $commentauthorlogin = $row['login'];
                            $commentauthorava = $row['avatar'];
                        }
                    ?>
                    <?php if(!empty($commentauthorlogin)) { ?>
                        <div class="comment">
                            <div style="cursor: pointer;" onclick="prof('prof', '<?php echo $commentauthorid; ?>')"><img src="<?php echo $commentauthorava ?>"></div>
                            <div class="commenttext"><?php echo $commentauthorlogin; ?>
                            <?php
                                if($commentrating >= 1 && $commentrating < 2){
                                    echo '<i style="color: #DCA3FC;" class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                                } else
                                if($commentrating >= 2 && $commentrating < 3){
                                    echo '<i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                                } else
                                if($commentrating >= 3 && $commentrating < 4){
                                    echo '<i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                                } else
                                if($commentrating >= 4 && $commentrating < 5){
                                    echo '<i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i class="far fa-star"></i>';
                                } else
                                if($commentrating == 5){
                                    echo '<i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star"></i>';
                                }
                            ?>
                            <div class="commenttexthr"></div><div class="commenttextcom"><?php echo nl2br($commentscomment); ?></div></div>
                        </div>
                    <?php } ?>
                <?php } mysqli_close($conn); ?>
                
                <?php if(empty($commentauthorlogin)) { ?>
                    <div class="comment">
                        <div><img src="./assets/img/favicon/apple-touch-icon.png"></div>
                        <div class="commenttext">GmodCyberShop<div class="commenttexthr"></div><div class="commenttextcom">Никто еще не оставил коментарии к этому аддону.</div></div>
                    </div>
                <?php } ?>
            </div>
		</div>
		
    </div>
</div>

<div class="buywindow" id="buywindow"></div>