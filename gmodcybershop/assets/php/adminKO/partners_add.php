<?php 
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
        ::-webkit-scrollbar {
    		width: 7px;
    	}
    	::-webkit-scrollbar {
    		background: transparent;
    		width: 2px;
    		height: 7px;
    		border-radius: 5px;
    	}
    	::-webkit-scrollbar-thumb {
    		background-color: #555;
    		box-shadow: inset 0 0 2px #333;
    		border-radius: 5px;
    	}
    	::-webkit-scrollbar-corner {
    		background: transparent;
    		border-radius: 5px;
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
        input{
            padding: 5px;
            background: #181818;
            color: darkgray;
            font-size: 20px;
            width: 100%;
            border: none;
            border-bottom: 2px solid #313131;
        }
    </style>

    <form action="./assets/php/adminKO/partners_proc.php?t=1" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Название/Логин">
        <input type="text" name="link" placeholder="Ссылка">
        <input type="file" name="ava" placeholder="Аватарка квадратная">
        <input type="submit" name="otprav">
    </form>
    <div>Картинка - jpg</div>
    <div>Ссылка - https://...</div>

<?php        
    }
    mysqli_close($conn);
}
?>