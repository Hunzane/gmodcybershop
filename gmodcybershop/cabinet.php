<?php
    require ('./assets/php/steamauth/steamauth.php');
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
<?php if(!isset($_SESSION['steamid'])) { ?>

<div class="main" style="text-align: center;">
    <div class="centrim">
        <h2 class="head">ERROR</h2><br>
        <div class="order"><b style="cursor: pointer;" onclick="reloadpage()">RELOAD A PAGE</b></div>
    </div>
</div>
<?php } else {
    include ('./assets/php/steamauth/userInfo.php');
    if(isset($_GET['r'])) {
        $query = trim($_GET['r']);
        if($query == 'cmain'){} else
        if($query == 'cupload'){} else
        if($query == 'cpublic'){} else
        if($query == 'cbuys'){} else
        if($query == 'csells'){} else
        if($query == 'crefill'){} else
        if($query == 'cwinthdraw'){} else
        if($query == 'csupport'){} else
        {require_once('./assets/php/dmitrygrc/user/404.php');}
    }
?>	                    
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
        border-left: 1px solid gray;
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
        border-top: 1px solid gray;
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
	            <?php if($query == 'cmain'){ ?>
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
	            </style>
	            <div class="gryadka1-1"> Профиль </div>
	            <div class="gryadka1-0" id="gryadka1-0">
	                <?php echo nl2br($udescription); ?>
	                <div class="gryadka1-0-1" onclick="cabdescedit()"><i class="fas fa-edit"></i></div>
	            </div>
	            <?php } else if($query == 'cupload'){ ?>
	                
	                <style>
	                    .grydikaty{
	                        position: relative;
	                        width: 100%;
	                        height: 100%;
	                    }
	                    .grydikaty1{
	                        width: 380px;
	                        height: 30px;
	                        font-size: 25px;
	                        position: absolute;
	                        top: 0; bottom: 0; right: 0; left: 0;
	                        margin: auto;
	                    }
	                    .grydikaty1 a{
	                        text-decoration: none;
	                        color: darkgray;
	                    }
	                </style>
	            
	                <?php
	                    $sql = "SELECT * FROM `uploads` WHERE `author`='$uid'";
                        $resultsa = mysqli_query($conn, $sql);
                        while ($rowa = mysqli_fetch_assoc($resultsa)) {
                            $upname = $rowa['name'];
                        }
                        if($upname != ''){
                    ?>
                        <div class="grydikaty"><div class="grydikaty1">Ваш аддон на рассмотрении</div></div>
                    <?php } else { ?>
                        <div class="grydikaty"><div class="grydikaty1"><a href="./upload.php" target="_blank">Загрузить сейчас</a></div></div>
                    <?php } ?>
	            
	            <?php } else if($query == 'cpublic'){ ?>
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
                    }
                    .catalog{
                        right: 0; left: 0;
                        margin-left: auto;
                        margin-right: auto;
                        width: calc(100% - 50px);
                        position: relative;
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(300px, 300px));
                        grid-template-rows: 219px;
                        gap: 10px
                    }
                    .catalogcard{
                        width: 300px;
                        height: 219px;
                        display: grid;
                        grid-template-rows: 1fr;
                        grid-template-rows: 169px 50px;
                        background: #181818;
                        border-top-left-radius: 15px;
                        border-top-right-radius: 15px;
                    }
                    .catalogcard a{
                        color: darkgray;
                        text-align: left;
                        text-decoration: none;
                    }
                    .catalogcardimg{
                        border-top-left-radius: 15px;
                        border-top-right-radius: 15px;
                        background: #181818;
                    }
                    .catalogcardimg img{
                        border-top-left-radius: 15px;
                        border-top-right-radius: 15px;
                        width: 300px;
                        height: 169px;
                    }
                    .catalogcardinfo{
                        background: #181818;
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
	            </style>
	            <div class="gryadka1-1"> Публикации </div>
	            <style>
                    .gryadka1-1{
                        text-align: center;
                        font-size: 25px;
                        height: 40px;
                    }
	                .gryadka1-0{
                        height: 530px;
                        width: 100%;
                        font-size: 18px;
                        overflow-x: hidden;
                        overflow-y: auto;
                        text-align: center;
                    }
                    .gryadka1-0-1{
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(300px, 300px));
                        gap: 10px;
                        text-align: left;
                    }
                    .gryadka1-0-2{
                        display: grid;
                        grid-template-columns: 1fr;
                        grid-template-rows: 168px 80px;
                        background: #313131;
                        border-top-right-radius: 5px;
                        border-top-left-radius: 5px;
                    }
                    .gryadka1-0-2-1{
                        width: 300px;
                        height: 168px;
                        background: #313131;
                        border-top-right-radius: 5px;
                        border-top-left-radius: 5px;
                    }
                    .gryadka1-0-2-1-2 img{
                        width: 100%;
                        height: 100%;
                        border-top-right-radius: 5px;
                        border-top-left-radius: 5px;
                    }
                    .gryadka1-0-2-2-1{ padding-top: 3px; }
                    .gryadka1-0-2-2{ text-align: center; }
                    .gryadka1-0-2-2-2{
                        padding: 0;
                        margin-top: 5px;
                        width: 100%;
                        display: grid;
                        grid-template-columns: 150px 150px;
                        height: 50px;
                        font-size: 25px;
                        border-bottom-left-radius: 5px;
                        border-bottom-right-radius: 5px;
                    }
                    .gryadka1-0-2-2-2 div {
                        top: 0; bottom: 0;
                        margin: auto;
                        cursor: pointer;
                    }
                    .gryadka1-0-2-2-2 a{
                        color: darkgray;
                        text-decoration: none;
                    }
                    .huhu{
                        color: darkgray;
                        text-decoration: none;
                    }
	            </style>
	            <div class="gryadka1-0" id="gryadka1-0">
	                <div class="gryadka1-0-1">
	                    <?php
                            $sql = "SELECT * FROM `products` WHERE `author`='$uid' ORDER BY `id` DESC";
                            $resultsa = mysqli_query($conn, $sql);
                            while ($rowa = mysqli_fetch_assoc($resultsa)) {
                                $prodid = $rowa['id'];
                                $pname = $rowa['name'];
                                $pdescription = $rowa['description'];
                                $pimages = $rowa['images'];
                                $pprice = $rowa['price'];
                                $pauthor = $rowa['author'];
                                $pimages = json_decode($pimages, true);
                            ?>
        	                    <div class="gryadka1-0-2">
        	                        <div class="gryadka1-0-2-1">
        	                            <div class="gryadka1-0-2-1-2"><img src="<?php echo $pimages['logo']; ?>"></div>
        	                        </div>
        	                        <div class="gryadka1-0-2-2">
        	                            <div class="gryadka1-0-2-2-1"><?php echo $pname; ?></div>
        	                            <div class="gryadka1-0-2-2-2">
        	                                <div><a class="huhu" href="./#r=shop#id=<?php echo $prodid; ?>" target="_blank"><i class="fas fa-info-circle"></i></a></div>
        	                                <div><a target="_blank" href="./addonedit.php?id=<?php echo $prodid; ?>"><i class="fas fa-edit"></i></a></div>
        	                            </div>
                                    </div>
        	                    </div>
                        <?php } ?>
	                </div>
	            </div>
	            <?php } else if($query == 'cbuys'){ ?>
	            <style>
                    .gryadka1-1{
                        text-align: center;
                        font-size: 25px;
                        height: 40px;
                    }
	                .gryadka1-0{
                        height: 530px;
                        width: 100%;
                        font-size: 18px;
                        overflow-x: hidden;
                        overflow-y: auto;
                        text-align: center;
                    }
                    .gryadka1-0-1{
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(300px, 300px));
                        gap: 10px;
                        text-align: left;
                    }
                    .gryadka1-0-2{
                        display: grid;
                        grid-template-columns: 1fr;
                        grid-template-rows: 168px 80px;
                        background: #313131;
                        border-top-right-radius: 5px;
                        border-top-left-radius: 5px;
                    }
                    .gryadka1-0-2-1{
                        width: 300px;
                        height: 168px;
                        background: #313131;
                        border-top-right-radius: 5px;
                        border-top-left-radius: 5px;
                    }
                    .gryadka1-0-2-1-2 img{
                        width: 100%;
                        height: 100%;
                        border-top-right-radius: 5px;
                        border-top-left-radius: 5px;
                    }
                    .gryadka1-0-2-2-1{ padding-top: 3px; }
                    .gryadka1-0-2-2{ text-align: center; }
                    .gryadka1-0-2-2-2{
                        padding: 0;
                        margin-top: 5px;
                        width: 100%;
                        display: grid;
                        grid-template-columns: 75px 75px 75px 75px;
                        height: 50px;
                        font-size: 25px;
                        border-bottom-left-radius: 5px;
                        border-bottom-right-radius: 5px;
                    }
                    .gryadka1-0-2-2-2 div {
                        top: 0; bottom: 0;
                        margin: auto;
                        cursor: pointer;
                    }
                    .huhu{
                        color: darkgray;
                        text-decoration: none;
                    }
	            </style>
	            <div class="gryadka1-1"> Покупки </div>
	            <div class="gryadka1-0" id="gryadka1-0">
	                <div class="gryadka1-0-1">
	                    <?php
                            $sql = "SELECT * FROM `sells` WHERE `user`='$uid' ORDER BY `ID` DESC";
                            $resultsa = mysqli_query($conn, $sql);
                            while ($rowa = mysqli_fetch_assoc($resultsa)) {
                                $sellsid = $rowa['id'];
                                $sellsproduct = $rowa['product'];
                                
                                $sqla = "SELECT * FROM `products` WHERE `id`='$sellsproduct'";
                                $results = mysqli_query($conn, $sqla);
                                while ($row = mysqli_fetch_assoc($results)) {
                                    $prodid = $row['id'];
                                    $pname = $row['name'];
                                    $pdescription = $row['description'];
                                    $pimages = $row['images'];
                                    $pprice = $row['price'];
                                    $pimages = json_decode($pimages, true);
                                }
                            ?>
        	                    <div class="gryadka1-0-2">
        	                        <div class="gryadka1-0-2-1">
        	                            <div class="gryadka1-0-2-1-2"><img src="<?php echo $pimages['logo']; ?>"></div>
        	                        </div>
        	                        <div class="gryadka1-0-2-2">
        	                            <div class="gryadka1-0-2-2-1"><?php echo $pname; ?></div>
        	                            <div class="gryadka1-0-2-2-2">
        	                                <div><a class="huhu" href="./#r=shop#id=<?php echo $prodid; ?>" target="_blank"><i class="fas fa-info-circle"></i></a></div>
        	                                <div><i class="fas fa-star" onclick="rate('<?php echo $prodid; ?>')"></i></div>
        	                                <div><i class="fas fa-comment" onclick="rate('<?php echo $prodid; ?>')"></i></div>
        	                                <div><a class="huhu" href="./download.php?id=<?php echo $prodid; ?>" target="_blank"><i class="fas fa-download"></i></a></div>
        	                            </div>
                                    </div>
        	                    </div>
                        <?php } ?>
	                </div>
	            </div>
	            <?php } else if($query == 'csells'){ ?>
	            <style>
	                .gryadka1-0{
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(300px, 300px));
                        gap: 10px;
                    }
                    .gryadka1-1{
                        text-align: center;
                        font-size: 25px;
                        height: 40px;
                    }
                    .gryadka1-2{
                        display: grid;
                        grid-template-columns: 100px 140px 50px;
                        height: 56px;
                        width: 300px;
                        background: #313131;
                        border-left: 2px solid gray;
                        border-top-right-radius: 5px;
                        border-bottom-right-radius: 5px;
                        cursor: pointer;
                    }
                    .gryadka1-2-1 img{
                        border-top-right-radius: 5px;
                        border-bottom-right-radius: 5px;
                        width: 100%;
                        height: 100%;
                    }
                    .gryadka1-2-2{
                        top: 0; bottom: 0;
                        margin: auto;
                        text-align: center;
                    }
                    .huhu{
                        color: darkgray;
                        text-decoration: none;
                    }
	            </style>
	            <div class="gryadka1-1"> Продажи </div>
	            <div class="gryadka1-0">
	                <?php
                        $sql = "SELECT * FROM `sells` WHERE `au`='$uid' ORDER BY `ID` DESC";
                        $resultsa = mysqli_query($conn, $sql);
                        while ($rowa = mysqli_fetch_assoc($resultsa)) {
                            $sellsid = $rowa['id'];
                            $sellsproduct = $rowa['product'];
                            $sellsuser = $rowa['user'];
                            $sellsprice = $rowa['price'];
                            
                            $sqla = "SELECT * FROM `products` WHERE `id`='$sellsproduct'";
                            $results = mysqli_query($conn, $sqla);
                            while ($row = mysqli_fetch_assoc($results)) {
                                $prodid = $row['id'];
                                $pname = $row['name'];
                                $pdescription = $row['description'];
                                $pimages = $row['images'];
                                $pprice = $row['price'];
                                $pimages = json_decode($pimages, true);
                            }
                            
                            $sqla = "SELECT * FROM `users` WHERE `id`='$sellsuser'";
                            $results = mysqli_query($conn, $sqla);
                            while ($row = mysqli_fetch_assoc($results)) {
                                $authorlogin = $row['login'];
                            }
                        ?>
                            <a class="huhu" href="./#r=shop#id=<?php echo $prodid; ?>" target="_blank">
                	            <div class="gryadka1-2">
                	                <div class="gryadka1-2-1"><img src="<?php echo $pimages['logo']; ?>"></div>
                	                <div class="gryadka1-2-2"><i class="fas fa-user"></i><br><?php echo $authorlogin; ?></div>
                	                <div class="gryadka1-2-2"><i class="fas fa-coins"></i><br><?php echo $sellsprice; ?>₽</div>
                	            </div>
                            </a>
                    <?php } ?>
        	    </div>
	            <?php } else if($query == 'crefill'){ ?>
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
                        overflow-x: auto;
                        overflow-y: auto;
                        text-align: center;
                    }
                    .pole{
                        padding: 5px;
                        font-size: 21px;
                        color: darkgray;
                        background: #181818;
                        border: 1px solid gray;
                    }
                    .winthdrawi{
                        background: #181818;
                        padding: 5px;
                        border: none;
                        color: darkgray;
                        border-bottom: 1px solid gray;
                        font-size: 25px;
                    }
                    .winthdrawb{
                        background: #181818;
                        padding: 5px;
                        border: none;
                        color: darkgray;
                        border-bottom: 1px solid gray;
                        font-size: 25px;
                    }
	            </style>
	            <div class="gryadka1-1"> Пополнить </div>
	            <div class="gryadka1-0" id="gryadka1-0">
	                <input class="winthdrawi" id="summ" type="number" value="0"/>
	                <button class="winthdrawb" onclick="popolnit()">Пополнить</button>
	            </div>
	            <?php } else if($query == 'cwinthdraw'){ ?>
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
                    }
                    .winthdrawi{
                        background: #181818;
                        padding: 5px;
                        border: none;
                        color: darkgray;
                        border-bottom: 1px solid gray;
                        font-size: 25px;
                        -moz-appearance: none;
                        -webkit-appearance: none;
                        appearance: none;
                        border-radius: 0px;
                    }
                    .winthdrawb{
                        background: #181818;
                        padding: 5px;
                        border: none;
                        color: darkgray;
                        border-bottom: 1px solid gray;
                        font-size: 25px;
                    }
                    .winthdrawg{
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(200px, 200px));
                        grid-auto-rows: 110px;
                        gap: 10px;
                    }
                    .winthdrawgc{
                        background: #181818;
                        width: 200px;
                        height: 110px;
                        border-radius: 5px;
                        padding: 5px;
                    }
                    ::-webkit-input-placeholder {
                        color: gray;
                    }
                    :-moz-placeholder {
                       color: gray;
                       opacity:  1;
                    }
                    ::-moz-placeholder {
                       color: gray;
                       opacity:  1;
                    }
                    :-ms-input-placeholder {
                       color: gray;
                    }
                    ::-ms-input-placeholder {
                       color: gray;
                    }
                    ::placeholder {
                       color: gray;
                    }
	            </style>
	            <div class="gryadka1-1"> Вывод </div>
	            <div class="gryadka1-0">
	                <select class="winthdrawi" id="wallet">
                        <option value="qiwi">Qiwi</option>
                        <option value="yoomoney">YooMoney</option> 
                        <option value="card">Card</option> 
                    </select><br>
	                <input class="winthdrawi" id="number" type="text" placeholder="Кошелек"/><br>
	                <input class="winthdrawi" id="winthdrawi" type="number" value="0"/><br>
	                <div style="color: gray;">Минималка 10 рублей</div>
	                <button class="winthdrawb" onclick="withdraw()">Создать заявку</button>
	                <br><br><div class="gryadka1-1"> Ваши заявки </div>
	                <div class="winthdrawg">
	                <?php
	                    $sql = "SELECT * FROM `withdraw` WHERE `user`='$uid'";
                        $resultsa = mysqli_query($conn, $sql);
                        while ($rowa = mysqli_fetch_assoc($resultsa)) {
                            $wid = $rowa['id'];
                            $wdate = $rowa['date'];
                            $wsum = $rowa['sum'];
                            $wwallet = $rowa['wallet'];
                            $wnumber = $rowa['number'];
                            $wstatus = $rowa['status'];
	                ?>
	                    <div class="winthdrawgc">
	                        <div>Сумма: <?php echo $wsum; ?>₽</div>
	                        <div>Кошелек: <?php echo $wwallet; ?></div>
	                        <div><?php echo substr($wnumber, 0, 25); ?></div>
	                        <div>Статус: <?php if($wstatus == '2'){echo '<b style="color: darkred;">Отклонен</b>';}else if($wstatus == '0'){echo '<b style="color: wheat;">В обработке</b>';}else{echo '<b style="color: darkgreen;">Выполнено</b>';} ?></div>
	                        <div><?php echo $wdate; ?></div>
	                    </div>
	                <?php } ?>
	                </div>
	            </div>
	            <?php } else if($query == 'csupport'){ ?>
	            <style>
                    .gryadka1-1{
                        text-align: center;
                        font-size: 25px;
                        height: 40px;
                        padding: 5px;
                    }
	                .gryadka1-0{
                        height: calc(100% - 50px);
                        width: 100%;
                        font-size: 18px;
                        overflow-x: hidden;
                        overflow-y: auto;
                        text-align: center;
                        position: relative;
                    }
                    .support{
                        width: 100%;
                        height: 100%;
                        overflow-x: hidden;
                        overflow-y: auto;
                        position: relative;
                    }
                    .listcard{
                        width: calc(100% - 10px);
                        height: 50px;
                        padding: 5px;
                        display: grid;
                        grid-template-columns: 1fr;
                        grid-template-rows: repeat(auto-fit, minmax(50px, 50px));
                        background: #181818;
                        border-radius: 10px;
                        text-align: left;
                        border-top: 1px solid #313131;
                        border-bottom: 1px solid #313131;
                    }
	            </style>
                <div class="gryadka1-1">
                    <div style="float: left;">Поддержка</div>
                    <div onclick="ticketsnew()" style="float: right; background: #313131; padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px; border-radius: 10px;"><i class="fas fa-plus-square"></i> Вопрос</div>
                </div>
	            <div class="gryadka1-0">
	                <div class="support" id="support">
	                    <?php
	                        $sql = "SELECT * FROM `tickets` WHERE `author`='$uid' ORDER by `id` DESC";
                            $resultsa = mysqli_query($conn, $sql);
                            while ($rowa = mysqli_fetch_assoc($resultsa)) {
                                $tikid = $rowa['id'];
                                $tiktheme = $rowa['theme'];
                                $tikauthor = $rowa['author'];
                                $tikstatus = $rowa['status'];
                                
                                $sqls = "SELECT * FROM `ticket_messages` WHERE `ticket`='$tikid' ORDER BY `ID` DESC LIMIT 1";
                                $results = mysqli_query($conn, $sqls);
                                while ($row = mysqli_fetch_assoc($results)) {
                                    $tikmsgauthor = $row['author'];
                                    $tikmsgmessage = $row['message'];
                                } ?>
    	                    <div class="listcard" onclick="tikview('<?php echo $tikid; ?>')">
    	                        <div><?php echo $tiktheme; ?></div>
    	                        <div style="margin-top: -20px;">
    	                            <div style="float: left; padding-left: 10px;">
    	                                <i class="fas fa-comment"></i> <?php echo substr($tikmsgmessage, 0, 50); ?>
    	                                <?php if(substr($tikmsgmessage, 0, 50) != $tikmsgmessage ){echo '...';} ?>
    	                            </div>
    	                            <div style="float: right;"><?php if($tikstatus == 1){echo 'Открыт';} else {echo 'Закрыт';} ?></div>
    	                        </div>
                            </div>
                        <?php    }
	                    ?>
	                </div>
	            </div>
	            <?php } ?>
	        </div>
	        
	        <div class="gryadka2">
	            <div class="gryadka2-1"><img src="<?php echo $steamprofile['avatarfull']; ?>"></div>
	            <div class="gryadka2-2">
	                <div><i class="fas fa-coins"></i> Баланс: <?php echo $ubalance; ?>₽</div>
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
	            <div class="gryadka2-3">
	                <div onclick="cabinet('cupload')"><i class="fas fa-upload"></i> Загрузить</div>
	                <div onclick="cabinet('cpublic')"><i class="fas fa-box"></i> Публикации</div>
	                <div onclick="cabinet('cbuys')"><i class="fas fa-shopping-cart"></i> Покупки</div>
	                <div onclick="cabinet('csells')"><i class="fas fa-gavel"></i> Продажи</div>
	                <div onclick="cabinet('crefill')"><i class="fas fa-credit-card"></i> Пополнить</div>
	                <div onclick="cabinet('cwinthdraw')"><i class="fas fa-hand-holding-usd"></i> Вывод</div>
	                <div onclick="cabinet('csupport')"><i class="fas fa-envelope"></i> Поддержка</div>
	                <div><?php logoutbutton(); ?></div>
	            </div>
	        </div>
	    </div>
		
    </div>
</div>
<?php mysqli_close($conn); ?>
<?php } ?>