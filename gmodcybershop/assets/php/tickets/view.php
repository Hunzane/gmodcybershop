<?php
require ('../steamauth/steamauth.php');
require ('../../../config.php');

if(isset($_GET['id'])) {
    $query = (int) $_GET['id'];
    
    if(isset($_SESSION['steamid'])) {
        
        $conn = new mysqli($servername, $username, $password, $db_name);
        $conn->set_charset("utf8");
        
        $sql = "SELECT * FROM `users` WHERE `steamid`='".$_SESSION['steamid']."'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $uid = $rowa['id'];
            $uavatar = $rowa['avatar'];
            $ulogin = $rowa['login'];
            $ubalance = $rowa['balance'];
            $udescription = $rowa['description'];
        }
        
        $sql = "SELECT * FROM `tickets` WHERE `id`='$query'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $tikid = $rowa['id'];
            $tiktheme = $rowa['theme'];
            $tikauthor = $rowa['author'];
            $tikstatus = $rowa['status'];
        }
        
        if($tikauthor == $uid){ ?>

<style>
    .tikmsgct{
        width: 100%;
        height: 470px;
        overflow-y: auto;
    }
    .msgau{
        margin-top: 10px;
        padding: 5px;
        display: grid;
        grid-template-columns: 68px 1fr;
        position: relative;
    }
    .msgadu{
        margin-top: 10px;
        padding: 5px;
        display: grid !important;
        grid-template-columns: 1fr 68px;
        position: relative;
    }
    .msgau-1{
        width: 100%;
        height: 100%;
        position: relative;
    }
    .msgau-1 img{
        border-radius: 255px;
        width: 60px;
        height: 60px;
        position: relative;
        top: 0;
        bottom: 0;
        margin: auto;
    }
    .msgau-2{
        width: calc(100% - 20px);
        height: 100%;
        background: #313131;
        padding: 5px;
        text-align: left;
        border-radius: 10px;
    }
    .msgau-2 img{
        border-radius: 255px;
        width: 60px;
        height: 60px;
        position: relative;
        top: 0;
        bottom: 0;
        margin: auto;
    }
    .replyct{
        background: #313131;
        width: calc(100% - 10px);
        height: 40px;
        display: grid;
        grid-template-columns: 1fr 42px 40px;
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
    .inputko{
        background: #181818;
        border: none;
        padding: 5px;
        color: darkgray;
        font-size: 16px;
        width: calc(100% - 10px);
        height: 30px;
        resize: none;
    }
    .btn-1{
        width: 100%;
        height: 100%;
        position: relative;
        background: #313131;
        border-right: 2px solid #181818;
        cursor: pointer;
    }
    .btn-1-1{
        width: 25px;
        height: 25px;
        font-size: 25px;
        top: 0; bottom: 0;
        right: 0; left: 0;
        position: absolute;
        margin: auto;
    }
    .btn-2{
        width: 100%;
        height: 100%;
        position: relative;
        background: #313131;
        border-right: 2px solid #181818;
        cursor: pointer;
    }
    .btn-2-1{
        width: 25px;
        height: 25px;
        font-size: 25px;
        top: 0; bottom: 0;
        right: 0; left: 0;
        position: absolute;
        margin: auto;
    }
</style>

<div class="replyct">
    <div><textarea class="inputko" type="text" id="messsage" placeholder="Сообщение"></textarea></div>
    <div class="btn-1" onclick="tiksendmsg('<?php echo $tikid; ?>')"><div class="btn-1-1"><i class="fas fa-comment-alt"></i></div></div>
    <div class="btn-2" onclick="tikview('<?php echo $tikid; ?>')"><div class="btn-2-1"><i class="fas fa-sync"></i></div>
</div>

<div class="tikmsgct">
    <?php
        $sqls = "SELECT * FROM `ticket_messages` WHERE `ticket`='$tikid' ORDER BY `id` DESC";
        $results = mysqli_query($conn, $sqls);
        while ($row = mysqli_fetch_assoc($results)) {
            $tikmsgauthor = $row['author'];
            $tikmsgmessage = $row['message'];
            $tikmsgdate = $row['date'];
            
        if($tikmsgauthor == $uid){ ?>
            
            <div class="msgau">
                <div class="msgau-1"><img src="<?php echo $uavatar; ?>"></div>
                <div class="msgau-2"><div style="color: white;"><div style="float: right;"><?php echo $tikmsgdate; ?></div><?php echo $ulogin; ?></div><?php echo preg_replace( "#\r?\n#", "<br />", $tikmsgmessage ); ?></div>
            </div>
            
        <?php } else { ?>
        
            <?php
                $sql = "SELECT * FROM `users` WHERE `id`='$tikmsgauthor'";
                $resultsa = mysqli_query($conn, $sql);
                while ($rowa = mysqli_fetch_assoc($resultsa)) {
                    $tima = $rowa['avatar'];
                    $timl = $rowa['login'];
                }
            ?>
        
            <div class="msgadu">
                <div class="msgau-2" style="text-align: left;"><div style="color: red; float: left;"><?php echo $timl; ?></div><div style="float: right;"><?php echo $tikmsgdate; ?></div><br><?php echo preg_replace( "#\r?\n#", "<br />", $tikmsgmessage ); ?></div>
                <div class="msgau-1"><img src="<?php echo $tima; ?>"></div>
            </div>
        
    <?php } } ?>
    
</div>
            
        <?php } else {echo('Access Denied');}
    } else {echo('Access Denied');}
mysqli_close($conn); } else {echo('Access Denied');}
?>