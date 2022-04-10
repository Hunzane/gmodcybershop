<?php
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
            height: 400px;
        }
        .otprav{
            padding: 5px;
            font-size: 23px;
            background: #181818;
            cursor: pointer;
        }
    </style>
    <div class="g1">
        <textarea id="otziv" maxlength="1000"><?php echo $udescription; ?></textarea>
        <div class="otprav" onclick="cabdesceditobr()">Сохранить</div>
    </div>
    
<?php mysqli_close($conn); } ?>