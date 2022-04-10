<?php 
if(isset($_GET['id'])) {
    $query = (int) $_GET['id'];
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
            $sql = "SELECT * FROM `users` WHERE `id`='$query'";
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
            }
?>
    ID: <?php echo $uiid; ?><br>
    SteamID: <?php echo $uisteamid; ?><br>
    Логин: <?php echo $uilogin; ?><br>
    Баланс: <?php echo $uibalance; ?>₽<br>
    Аддоны:
    <style>
        .ctct{
            width: 100%;
            height: 470px;
            overflow-x: hidden;
            overflow-y: auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 300px));
            grid-template-rows: 228px;
            gap: 10px;
        }
        .catalogcard{
            background: #181818;
            width: 300px;
            height: 228px;
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
            padding-bottom: 6px;
        }
    </style>
    <div class="ctct">
        <?php
        $sql = "SELECT * FROM `products` WHERE `author`='$uiid' ORDER BY `ID` DESC";
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
                        <div style="float: left;"><i style="color: #DCA3FC;" class="fas fa-star"></i><i style="color: #DCA3FC;" class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>
                        <div style="float: right;">Цена <b class="filled"><?php echo $pprice; ?>₽</b></div>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
<?php mysqli_close($conn); }}} ?>