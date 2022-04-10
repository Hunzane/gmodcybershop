<?php
if(isset($_GET['id'])) {
    $query = (int) $_GET['id'];
    $typ = (int) $_GET['typ'];
    require ('../steamauth/steamauth.php');
    if(isset($_SESSION['steamid'])) {
        
        require('../../../config.php');
        
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
            $pprice = $rowa['price'];
            $pauthor = $rowa['author'];
            $prodfile = $rowa['file'];
            $prodname = $rowa['name'];
        }
        $sql = "SELECT * FROM `sells` WHERE `product`='$prodid' AND `user`='$uid'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $sellsid = $rowa['id'];
        }
        
        if($sellsid != ''){
?>
    
    <style>
        .g1{
            width: 100%;
            height: 100%;
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
        textarea{
            margin-top: 10px;
            background: #181818;
            border: none;
            padding: 10px;
            border-bottom: 2px solid gray;
            color: darkgray;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            font-size: 20px;
            width: 100%;
            resize: none;
            height: 200px;
        }
        .otprav{
            padding: 5px;
            font-size: 23px;
            background: #181818;
            cursor: pointer;
        }
    </style>
    <div class="g1">
        <div><?php echo $prodname; ?></div><br>
        <div>Оценка: <b id="ocenka"><i onclick="stars('1')" style="color: #DCA3FC;" class="fas fa-star"></i><i onclick="stars('2')" class="far fa-star"></i><i onclick="stars('3')" class="far fa-star"></i><i onclick="stars('4')" class="far fa-star"></i><i onclick="stars('5')" class="far fa-star"></i></b><input id="ocenkain" type="hidden" value="1"></div><br>
        <textarea placeholder="Отзыв" id="otziv" maxlength="1000"></textarea>
        <div class="otprav" onclick="rateobr('<?php echo $query; ?>')">Отправить</div>
    </div>
    
<?php
        }
        
        mysqli_close($conn);
        
    }
}
?>