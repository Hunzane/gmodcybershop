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
            
            $sql = "SELECT * FROM `products_updates` WHERE `id`='$query' && `description`!='d1z3j51f81'";
            $resultsa = mysqli_query($conn, $sql);
            while ($rowa = mysqli_fetch_assoc($resultsa)) {
                $upid = $rowa['id'];
                $upname = $rowa['name'];
                $updescription = $rowa['description'];
                $upimages = $rowa['images'];
                $upprice = $rowa['price'];
                $upfile = $rowa['file'];
                $upauthor = $rowa['author'];
                $upimages = json_decode($upimages, true);
            }
?>
<style>
    .gd{
        color: darkgray;
    }
    .gd1{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 300px));
        gap: 5px
    }
    .gd1img img{
        width: 300px;
        height: 168px;
    }
</style>
<div class="gd">
    <div><?php echo $upname; ?></div>
    <hr>
    <div class="gd1">
        <div class="gd1img"><img src="<?php echo $upimages['logo']; ?>"></div>
        <div class="gd1img"><img src="<?php echo $upimages['gallery'][1]; ?>"></div>
        <?php if($upimages['gallery'][2] != '-'){ ?>
            <div class="gd1img"><img src="<?php echo $upimages['gallery'][2]; ?>"></div>
        <?php } ?>
        <?php if($upimages['gallery'][3] != '-'){ ?>
            <div class="gd1img"><img src="<?php echo $upimages['gallery'][3]; ?>"></div>
        <?php } ?>
        <?php if($upimages['gallery'][4] != '-'){ ?>
            <div class="gd1img"><img src="<?php echo $upimages['gallery'][4]; ?>"></div>
        <?php } ?>
        <?php if($upimages['gallery'][5] != '-'){ ?>
            <div class="gd1img"><img src="<?php echo $upimages['gallery'][5]; ?>"></div>
        <?php } ?>
        <?php if($upimages['gallery'][6] != '-'){ ?>
            <div class="gd1img"><img src="<?php echo $upimages['gallery'][6]; ?>"></div>
        <?php } ?>
        <?php if($upimages['gallery'][7] != '-'){ ?>
            <div class="gd1img"><img src="<?php echo $upimages['gallery'][7]; ?>"></div>
        <?php } ?>
        <?php if($upimages['gallery'][8] != '-'){ ?>
            <div class="gd1img"><img src="<?php echo $upimages['gallery'][8]; ?>"></div>
        <?php } ?>
        <?php if($upimages['gallery'][9] != '-'){ ?>
            <div class="gd1img"><img src="<?php echo $upimages['gallery'][9]; ?>"></div>
        <?php } ?>
        <?php if($upimages['gallery'][10] != '-'){ ?>
            <div class="gd1img"><img src="<?php echo $upimages['gallery'][10]; ?>"></div>
        <?php } ?>
    </div>
    <hr>
    <div>Описание:<br><?php echo nl2br($updescription); ?></div>
    <hr>
    <div>Цена: <?php echo $upprice; ?></div>
    <hr>
    <div>Аддон: <a href="./assets/php/adminKO/update_download.php?id=<?php echo $upid; ?>">Скачать</a></div>
    <hr>
    <div><b onclick="aupdate_shop_obr('1', '<?php echo $upid; ?>')">Одобрить</b> / <b onclick="aupdate_shop_obr('2','<?php echo $upid; ?>')">Удалить</b></div>
</div>

<?php
        }
        
    }
}
?>