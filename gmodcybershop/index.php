<?php 
    ob_start();
    require ('./assets/php/steamauth/steamauth.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta lang="ru">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GmodCyberShop</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
	<script src="./assets/js/main.js"></script>
	<link rel="apple-touch-icon" href="./assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" href="./assets/img/favicon/favicon.ico">
	<script   src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<meta name="description" content="Вы всегда мечтали получать доход со своего аддона? Все это осуществимо с нашей площадкой CyberGmodShop. На нашей площадке ты сможешь без проблем выставить свои работы на продажу, без каких либо оплат.">
</head>
<body>
	<div class="menu">
		<div class="menugrid">
			<div class="menulogo">GmodCyberShop</div>
			<div class="menuitems">
				<input class="menu_input" id="btn1" name="menu" type="radio" onclick="req('main')" /><label class="menu_label" for="btn1">
					<div class="menu_text">Главная</div>
				</label>

				<input class="menu_input" id="btn2" name="menu" type="radio" onclick="req('catalog')" /><label class="menu_label" for="btn2">
				  <div class="menu_text">Каталог</div>
				</label>

				<input class="menu_input" id="btn3" name="menu" type="radio" onclick="req('rules')" /><label class="menu_label" for="btn3">
				  <div class="menu_text">Правила</div>
				</label>

				<input class="menu_input" id="btn4" name="menu" type="radio" onclick="req('partners')" /><label class="menu_label" for="btn4">
				  <div class="menu_text">Партнеры</div>
				</label>

				<input class="menu_input" id="btn5" name="menu" type="radio" onclick="req('aboutus')" /><label class="menu_label" for="btn5">
				  <div class="menu_text">О нас</div>
				</label>
				<input class="menu_input" id="btn6" type="radio" />
			</div>
			<div class="menuuserct">
				<div class="menuuserct-reg">
				    <?php if(!isset($_SESSION['steamid'])) { ?>
				        <button type="sumbit"><?php loginbutton(); ?></button>
				    <?php } else { ?>
				        <button type="sumbit" onclick="cabinet('cmain')">Личный кабинет</button>
				    <?php } ?>
				</div>
				<div class="menuuserct-controlpane"><button type="sumbit">Панель управления</button></div>
			</div>
		</div>
	</div>
	
	<?php if(isset($_SESSION['steamid'])) {
        require('./config.php');
        $conn = new mysqli($servername, $username, $password, $db_name);
        $conn->set_charset("utf8");
        $sql = "SELECT * FROM `users` WHERE `steamid`='".$_SESSION['steamid']."'";
        $resultsa = mysqli_query($conn, $sql);
        while ($rowa = mysqli_fetch_assoc($resultsa)) {
            $utype = $rowa['type'];
        }
        if($utype == 'admin'){ ?>
            <script src="./assets/js/adminKO.js"></script>
            <style>
                .admin{
                    width: 40px;
                    height: 40px;
                    color: darkgray;
                    position: absolute;
                    bottom: 20px;
                    right: 20px;
                    z-index: 1000;
                }
                .admincrown{
                    position: relative;
                    width: 100%;
                    height: 100%;
                }
                .crown{
                    width: 30px;
                    height: 30px;
                    font-size: 25px;
                    top: 0; bottom: 0; right: 0; left: 0;
                    margin: auto;
                    position: absolute;
                }
            </style>
            <div class="admin" onclick="admin('amain')"><div class="admincrown"><div class="crown"><i class="fas fa-skull-crossbones"></i></div></div></div>
    <?php }
	} ?>
	
	<div class="content" id="content">
	    <input type="hidden" id="requa" name="requa" value="" />
	    <script>
	        if(window.location.hash) {
                var hash = window.location.hash.substring(3);
                if(hash == 'main'){
                    document.getElementById('btn1').checked = true; req(hash);
                } else
                if(hash == 'catalog'){
                    document.getElementById('btn2').checked = true; req(hash);
                } else
                if(hash == 'rules'){
                    document.getElementById('btn3').checked = true; req(hash);
                } else
                if(hash == 'partners'){
                    document.getElementById('btn4').checked = true; req(hash);
                } else
                if(hash == 'aboutus'){
                    document.getElementById('btn5').checked = true; req(hash);
                } else
                if(hash == 'cmain'){
                    document.getElementById('btn6').checked = true; cabinet(hash)
                } else
                if(hash == 'cupload'){
                    document.getElementById('btn6').checked = true; cabinet(hash)
                } else
                if(hash == 'cpublic'){
                    document.getElementById('btn6').checked = true; cabinet(hash)
                } else
                if(hash == 'cbuys'){
                    document.getElementById('btn6').checked = true; cabinet(hash)
                } else
                <?php if($utype == 'admin'){ ?>
                    if(hash == 'amain'){
                        document.getElementById('btn6').checked = true; admin(hash)
                    } else
                    if(hash == 'ausers'){
                        document.getElementById('btn6').checked = true; admin(hash)
                    } else
                    if(hash == 'atickets'){
                        document.getElementById('btn6').checked = true; admin(hash)
                    } else
                    if(hash == 'auploads'){
                        document.getElementById('btn6').checked = true; admin(hash)
                    } else
                    if(hash == 'aupdates'){
                        document.getElementById('btn6').checked = true; admin(hash)
                    } else
                    if(hash == 'apartners'){
                        document.getElementById('btn6').checked = true; admin(hash)
                    } else
                    if(hash == 'awithdraw'){
                        document.getElementById('btn6').checked = true; admin(hash)
                    } else
                <?php } ?>
                if(hash == 'csells'){
                    document.getElementById('btn6').checked = true; cabinet(hash)
                } else
                if(hash == 'crefill'){
                    document.getElementById('btn6').checked = true; cabinet(hash)
                } else
                if(hash == 'cwinthdraw'){
                    document.getElementById('btn6').checked = true; cabinet(hash)
                } else
                if(hash == 'csupport'){
                    document.getElementById('btn6').checked = true; cabinet(hash)
                } else {
                    var hash = window.location.hash.substring(3, 7);
                    if(hash == 'shop'){
                        var oidi = window.location.hash.substring(11);
                        document.getElementById('btn6').checked = true; shop(hash, oidi)
                    } else
                    if(hash == 'prof'){
                        var oidi = window.location.hash.substring(11);
                        document.getElementById('btn6').checked = true; prof(hash, oidi)
                    } else
                    { req('main'); }
                }
            } else {
                req('main');
            }
	    </script>
	</div>
	<div class="copy">Developed by <a href="https://dmitrygrc.ru">DmitryGRC</a></div>
</body>
</html>