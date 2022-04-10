<?php 
if(isset($_GET['r'])) {
    $query = $_GET['r'];
} else { $query = 'amain'; }
ob_start();
require ('../steamauth/steamauth.php');
if(isset($_SESSION['steamid'])) {
    require('../../../config.php');
    $conn = new mysqli($servername, $username, $password, $db_name);
    $conn->set_charset("utf8");
    $sql = "SELECT * FROM `users` WHERE `steamid`='".$_SESSION['steamid']."'";
    $resultsa = mysqli_query($conn, $sql);
    while ($rowa = mysqli_fetch_assoc($resultsa)) {
        $utype = $rowa['type'];
    }
    if($utype == 'admin'){
?>
<style>
    .main{
        width: 100%;
        height: 100%;
        position: relative;
        color: darkgray;
    }
    .mainct{
        height: 100%;
        width: calc(100% - 100px);
        position: absolute;
        left: 0; right: 0;
        margin: auto;
    }
    .gryd{
        height: 600px;
        margin-top: 15px;
        padding: 5px;
        border-radius: 5px;
        display: grid;
        grid-template-columns: 200px 1fr;
        background: #212121;
    }
    .gryd-1{
        padding: 5px;
        border-right: 2px solid #181818;
        position: relative;
    }
    .gryd-1-1{
        position: relative;
        width: 100%;
        height: 40px;
        margin-top: 5px;
        background: #313131;
        border-radius: 5px;
    }
    .gryd-1-b{
        font-size: 25px;
        text-align: center;
        width: 100%; height: 30px;
        top: 0; left: 0; right: 0; bottom: 0;
        position: absolute;
        margin: auto;
        cursor: pointer;
    }
    .gryd-2{
        overflow-y: auto;
        padding: 5px;
        font-size: 20px;
    }
</style>
<div class="main">
    <div class="mainct">
        <div class="gryd">
            <div class="gryd-1">
                <div class="gryd-1-1" onclick="admin('amain')"><div class="gryd-1-b">Главная</div></div>
                <div class="gryd-1-1" onclick="admin('ausers')"><div class="gryd-1-b">Пользователи</div></div>
                <div class="gryd-1-1" onclick="admin('atickets')"><div class="gryd-1-b">Тикеты</div></div>
                <div class="gryd-1-1" onclick="admin('auploads')"><div class="gryd-1-b">Загрузки</div></div>
                <div class="gryd-1-1" onclick="admin('aupdates')"><div class="gryd-1-b">Обновления</div></div>
                <div class="gryd-1-1" onclick="admin('apartners')"><div class="gryd-1-b">Партнеры</div></div>
                <div class="gryd-1-1" onclick="admin('awithdraw')"><div class="gryd-1-b">Вывод</div></div>
            </div>
            <div class="gryd-2">
                <?php if($query == 'amain'){ ?>
                
                    <?php
                        $res = $conn->query("SELECT count(*) FROM `users`");
                        $row = $res->fetch_row();
                        $count = $row[0];
                    ?>
                    Клиентов: <?php echo $count; ?><br>
                    <?php
                        $res = $conn->query("SELECT count(*) FROM `products`");
                        $row = $res->fetch_row();
                        $count = $row[0];
                    ?>
                    Аддонов: <?php echo $count; ?><br>
                    <?php
                        $res = $conn->query("SELECT count(*) FROM `sells`");
                        $row = $res->fetch_row();
                        $count = $row[0];
                    ?>
                    Продаж: <?php echo $count; ?><br>
                    
                <?php } else if($query == 'ausers'){ ?>
                
                    <style>
                        .ryndyk{
                            width: 100%; height: 600px;
                            display: grid;
                            grid-template-columns: 200px 1fr;
                        }
                        .userlist{
                            height: 600px;
                            width: 100%;
                            overflow-y: auto;
                            overflow-x: auto;
                            display: grid;
                            grid-template-columns: 1fr;
                            grid-template-rows: repeat(auto-fit, minmax(45px, 45px));
                            row-gap: 10px;
                            position: relative;
                            border-right: 2px solid #181818;
                        }
                        .userlistuser{
                            width: calc(100% - 15px);
                            padding: 5px;
                            display: grid;
                            grid-template-columns: 45px 1fr;
                            grid-template-rows: 40px;
                            height: calc(100% - 10px);
                            background: #313131;
                            position: relative;
                            border-radius: 5px;
                            cursor: pointer;
                        }
                        .userlistuser img{
                            width: 40px; height: 40px;
                            position: relative;
                            border-radius: 255px;
                        }
                        .userlistusertext{
                            position: relative;
                            bottom: 0; top: 0;
                            margin: auto;
                            font-size: 16px;
                        }
                        .userinfo{
                            padding: 5px;
                        }
                    </style>
                    <div class="ryndyk">
                        <div class="userlist">
                            <?php
                                $sql = "SELECT * FROM `users`";
                                $resultsa = mysqli_query($conn, $sql);
                                while ($rowa = mysqli_fetch_assoc($resultsa)) {
                                    $uiid = $rowa['id'];
                                    $uisteamid = $rowa['steamid'];
                                    $uilogin = $rowa['login'];
                                    $uiavatar = $rowa['avatar'];
                                    $uiurl = $rowa['url'];
                                    $uidescription = $rowa['description'];
                                    $uibalance = $rowa['balance'];
                                    $uitype = $rowa['type'];
                            ?>
                                <div class="userlistuser" onclick="userinfo('<?php echo $uiid; ?>')">
                                    <div><img src="<?php echo $uiavatar; ?>"></div>
                                    <div class="userlistusertext"><?php echo substr($uilogin, 0, 16); ?><br><?php echo substr($uilogin, 15, 26); ?></div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="userinfo" id="userinfo">
                            
                        </div>
                    </div>
                    
                <?php } else if($query == 'atickets'){ ?>
                
                    <style>
                        .ryndyk{
                            width: 100%; height: 600px;
                            display: grid;
                            grid-template-columns: 300px 1fr;
                        }
                        .userlist{
                            height: 600px;
                            width: 100%;
                            overflow-y: auto;
                            overflow-x: auto;
                            display: grid;
                            grid-template-columns: 1fr;
                            grid-template-rows: repeat(auto-fit, minmax(45px, 45px));
                            row-gap: 10px;
                            position: relative;
                            border-right: 2px solid #181818;
                        }
                        .userlistuser{
                            width: calc(100% - 15px);
                            padding: 5px;
                            display: grid;
                            grid-template-columns: 45px 1fr;
                            grid-template-rows: 40px;
                            height: calc(100% - 10px);
                            background: #313131;
                            position: relative;
                            border-radius: 5px;
                            cursor: pointer;
                        }
                        .userlistusertext{
                            width: 290px;
                            height: 100%;
                            position: relative;
                            bottom: 0; top: 0;
                            margin: auto;
                            font-size: 16px;
                        }
                        .userinfo{
                            padding: 5px;
                        }
                    </style>
                    <div class="ryndyk">
                        <div class="userlist">
                            <?php
                                $sql = "SELECT * FROM `tickets` ORDER BY `id` DESC";
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
                                    }
                            ?>
                                <div class="userlistuser" onclick="atikview('<?php echo $tikid; ?>')">
                                    <div class="userlistusertext"><div style="float: left;"><?php echo substr($tiktheme, 0, 40); ?></div><div style="float: right; margin-right: 5px;"><?php if($tikstatus == 1){echo 'Открыт';} else {echo 'Закрыт';} ?></div><br><div><i class="fas fa-comment"></i> <?php echo substr($tikmsgmessage, 0, 40); ?></div></div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="userinfo" id="userinfo">
                            
                        </div>
                    </div>
                
                <?php } else if($query == 'auploads'){ ?>
                    <style>
                        .ryndyk{
                            width: 100%; height: 500px;
                            display: grid;
                            grid-template-columns: repeat(auto-fit, minmax(300px, 300px));
                            grid-template-rows: 210px;
                            gap: 5px;
                        }
                        .ryndykcard{
                            width: 300px;
                            height: 210px;
                            background: #313131;
                            border-top-left-radius: 5px;
                            border-top-right-radius: 5px;
                        }
                        .ryndykcard-1 img{
                            border-top-left-radius: 5px;
                            border-top-right-radius: 5px;
                            width: 100%;
                            height: 168px;
                        }
                        .ryndykcard-2{
                            padding: 5px;
                        }
                        .userinfo{
                            width: calc(100% - 300px);
                            height: 600px;
                        }
                    </style>
                    <div class="userinfo" id="userinfo">
                        <div class="ryndyk">
                            <?php
                                $sql = "SELECT * FROM `uploads` ORDER BY `id` DESC";
                                $resultsa = mysqli_query($conn, $sql);
                                while ($rowa = mysqli_fetch_assoc($resultsa)) {
                                    $pubid = $rowa['id'];
                                    $pubname = $rowa['name'];
                                    $pubdescription = $rowa['description'];
                                    $pubimages = $rowa['images'];
                                    $pubprice = $rowa['price'];
                                    $pubfile = $rowa['file'];
                                    $pubauthor = $rowa['author'];
                                    $pubimages = json_decode($pubimages, true);
                            ?>
                                <div class="ryndykcard" onclick="ashop(<?php echo $pubid; ?>)">
                                    <div class="ryndykcard-1"><img src="<?php echo $pubimages['logo']; ?>.jpg"></div>
                                    <div class="ryndykcard-2"><?php echo substr($pubname, 0, 25); ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else if($query == 'aupdates'){ ?>
                    <style>
                        .ryndyk{
                            width: 100%; height: 500px;
                            display: grid;
                            grid-template-columns: repeat(auto-fit, minmax(300px, 300px));
                            grid-template-rows: 210px;
                            gap: 5px;
                        }
                        .ryndykcard{
                            width: 300px;
                            height: 210px;
                            background: #313131;
                            border-top-left-radius: 5px;
                            border-top-right-radius: 5px;
                        }
                        .ryndykcard-1 img{
                            border-top-left-radius: 5px;
                            border-top-right-radius: 5px;
                            width: 100%;
                            height: 168px;
                        }
                        .ryndykcard-2{
                            padding: 5px;
                        }
                        .userinfo{
                            width: calc(100% - 300px);
                            height: 600px;
                        }
                    </style>
                    <div class="userinfo" id="userinfo">
                        <div class="ryndyk">
                            <?php
                                $sql = "SELECT * FROM `products_updates` ORDER BY `id` DESC";
                                $resultsa = mysqli_query($conn, $sql);
                                while ($rowa = mysqli_fetch_assoc($resultsa)) {
                                    $pubid = $rowa['id'];
                                    $pubname = $rowa['name'];
                                    $pubdescription = $rowa['description'];
                                    $pubimages = $rowa['images'];
                                    $pubprice = $rowa['price'];
                                    $pubfile = $rowa['file'];
                                    $pubauthor = $rowa['author'];
                                    $pubimages = json_decode($pubimages, true);
                            ?>
                                <div class="ryndykcard" onclick="aupdate_shop(<?php echo $pubid; ?>)">
                                    <div class="ryndykcard-1"><img src="<?php echo $pubimages['logo']; ?>"></div>
                                    <div class="ryndykcard-2"><?php echo substr($pubname, 0, 25); ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else if($query == 'apartners'){ ?>
                    <style>
                        .ryndyk{
                            padding-top: 20px;
                            width: 100%; height: 500px;
                            display: grid;
                            grid-template-columns: repeat(auto-fit, minmax(128px, 128px));
                            grid-template-rows: 205px;
                            gap: 5px;
                        }
                        .ryndykcard{
                            width: 128px;
                            height: 205px;
                            text-align: center;
                        }
                        .ryndykcard-1 img{
                            width: 128px;
                            height: 128px;
                            border-radius: 255px;
                        }
                        .ryndykcard-2{
                            padding: 5px;
                        }
                        .userinfo{
                            width: calc(100% - 20px);
                            height: 600px;
                        }
                        .ryndykcard-3{
                            color: darkred;
                            background: #313131;
                            border-radius: 5px;
                            padding: 5px;
                        }
                    </style>
                    <div class="userinfo" id="userinfo">
                        <div onclick="apartneradd()" style="float: left; background: #313131; border-radius: 5px; padding: 5px;">Добавить</div>
                        <div class="ryndyk">
                            <?php
                                $sql = "SELECT * FROM `partners` ORDER BY `id` DESC";
                                $resultsa = mysqli_query($conn, $sql);
                                while ($rowa = mysqli_fetch_assoc($resultsa)) {
                                    $partnerid = $rowa['id'];
                                    $partnername = $rowa['name'];
                                    $partnerurl = $rowa['url'];
                                    $partnerava = $rowa['ava'];
                            ?>
                                <div class="ryndykcard">
                                    <div class="ryndykcard-1"><img src="./uploads/partners/<?php echo $partnerava; ?>"></div>
                                    <div class="ryndykcard-2"><?php echo substr($partnername, 0, 20); ?></div>
                                    <div class="ryndykcard-3" onclick="apartnerdel('2', '<?php echo $partnerid; ?>')">Удалить</div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else if($query == 'awithdraw'){ ?>
                <style>
                        .winthdrawg{
                            text-align: center;
                            display: grid;
                            grid-template-columns: repeat(auto-fit, minmax(220px, 220px));
                            grid-auto-rows: 140px;
                            gap: 10px;
                        }
                        .winthdrawgc{
                            background: #181818;
                            width: 220px;
                            height: 140px;
                            border-radius: 5px;
                            padding: 5px;
                        }
                        .userinfo{
                            width: calc(100% - 300px);
                            height: 600px;
                        }
                        .sbc b{
                            cursor: pointer;
                        }
                    </style>
                    <div class="userinfo" id="userinfo">
                        <div class="winthdrawg">
    	                <?php
    	                    $sql = "SELECT * FROM `withdraw` ORDER BY `id` DESC";
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
    	                        <?php if($wstatus == '0'){ ?>
    	                        <div class="sbc"><b onclick="awithdraw('1', '<?php echo $wid; ?>')">Готово</b> | <b onclick="awithdraw('2', '<?php echo $wid; ?>')">Отклонить</b></div>
    	                        <?php } ?>
    	                    </div>
    	                <?php } ?>
    	                </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php mysqli_close($conn); }} ?>